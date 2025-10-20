<?php
// Load env
$env = @parse_ini_file(__DIR__ . '/.env', false, INI_SCANNER_RAW);
if ($env) foreach ($env as $k => $v) { $_ENV[$k] = $v; putenv("$k=$v"); }

$config = require __DIR__ . '/config.php';

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if (in_array($origin, $config['security']['allowed_origins'])) {
  header("Access-Control-Allow-Origin: $origin");
  header('Access-Control-Allow-Methods: POST, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type');
  header('Access-Control-Max-Age: 86400');
  header('Vary: Origin');
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['success' => false, 'error' => 'Method not allowed']);
  exit;
}

function getClientIp() {
  $candidates = ['HTTP_CF_CONNECTING_IP','HTTP_X_REAL_IP','HTTP_X_FORWARDED_FOR','REMOTE_ADDR'];
  foreach ($candidates as $key) {
    if (!empty($_SERVER[$key])) {
      $val = $_SERVER[$key];
      if ($key === 'HTTP_X_FORWARDED_FOR') { $parts = array_map('trim', explode(',', $val)); $val = $parts[0] ?? $val; }
      $val = preg_replace('/[^0-9a-fA-F:\\.]/', '', $val);
      if ($val) return $val;
    }
  }
  return 'unknown';
}

function sanitizeInput($data) { return htmlspecialchars(trim((string)$data), ENT_QUOTES, 'UTF-8'); }
function validateEmail($email) { return filter_var($email, FILTER_VALIDATE_EMAIL) !== false; }

function verifyRecaptcha($token, $secretKey) {
  $endpoints = [
    'https://www.google.com/recaptcha/api/siteverify',
    'https://www.recaptcha.net/recaptcha/api/siteverify'
  ];
  $postFields = http_build_query(['secret'=>$secretKey,'response'=>$token,'remoteip'=>getClientIp()]);
  foreach ($endpoints as $endpoint) {
    $result = false; $httpCode = 0;
    if (function_exists('curl_init')) {
      $ch = curl_init($endpoint);
      curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$postFields,CURLOPT_TIMEOUT=>10,CURLOPT_HTTPHEADER=>['Content-Type: application/x-www-form-urlencoded']]);
      $result = curl_exec($ch); $httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
    } else {
      $context = stream_context_create(['http'=>['header'=>"Content-type: application/x-www-form-urlencoded\r\n",'method'=>'POST','content'=>$postFields,'timeout'=>10]]);
      $result = @file_get_contents($endpoint, false, $context);
      if (isset($http_response_header) && is_array($http_response_header)) {
        foreach ($http_response_header as $h) { if (preg_match('/^HTTP\/\S+\s+(\d{3})/',$h,$m)) { $httpCode=(int)$m[1]; break; } }
      }
    }
    if ($result !== false && $httpCode === 200) { $resp = json_decode($result, true) ?: []; $resp['success']=$resp['success']??false; return $resp; }
  }
  return ['success'=>false,'error'=>'recaptcha_request_failed'];
}

function checkRateLimit($ip, $minutes = 5) {
  $lock = sys_get_temp_dir().'/careers_rate_'.md5($ip);
  if (file_exists($lock)) { $last=(int)file_get_contents($lock); if (time()-$last < ($minutes*60)) return false; }
  file_put_contents($lock, time()); return true;
}

function smtpSend($to, $subject, $rawBody, $headers, $config) {
  $crlf = "\r\n";
  $host = $config['email']['smtp_host'] ?? '';
  $port = (int)($config['email']['smtp_port'] ?? 465);
  $user = $config['email']['smtp_username'] ?? '';
  $pass = $config['email']['smtp_password'] ?? '';
  $secure = strtolower($config['email']['smtp_secure'] ?? 'ssl');
  $from = $config['email']['from'] ?? $user;
  $envelopeFrom = $config['email']['smtp_envelope_from'] ?? $user ?: $from;
  if (!$host) return false;
  $transport = ($secure === 'ssl' || $port === 465) ? 'ssl://' : '';
  $errno=0;$errstr='';
  $socket = @stream_socket_client($transport.$host.':'.$port, $errno, $errstr, 10, STREAM_CLIENT_CONNECT);
  if (!$socket) return false; stream_set_timeout($socket, 10);
  $read=function() use ($socket){$data='';while($str=fgets($socket,515)){$data.=$str;if(substr($str,3,1)===' ')break;}return $data;};
  $write=function($cmd) use ($socket,$crlf){fwrite($socket,$cmd.$crlf);};
  $expect=function($code) use ($read){$resp=$read();return (int)substr($resp,0,3)===$code;};
  if(!$expect(220)){fclose($socket);return false;}
  $domain = $_SERVER['SERVER_NAME'] ?? 'localhost';
  $write('EHLO '.$domain); if(!$expect(250)){fclose($socket);return false;}
  if ($secure==='tls' || $port===587){$write('STARTTLS'); if(!$expect(220)){fclose($socket);return false;} if(!@stream_socket_enable_crypto($socket,true,STREAM_CRYPTO_METHOD_TLS_CLIENT)){fclose($socket);return false;} $write('EHLO '.$domain); if(!$expect(250)){fclose($socket);return false;}}
  if ($user && $pass){$write('AUTH LOGIN'); if(!$expect(334)){fclose($socket);return false;} $write(base64_encode($user)); if(!$expect(334)){fclose($socket);return false;} $write(base64_encode($pass)); if(!$expect(235)){fclose($socket);return false;}}
  $write('MAIL FROM:<'.preg_replace('/[\r\n].*/','',$envelopeFrom).'>'); if(!$expect(250)){fclose($socket);return false;}
  $write('RCPT TO:<'.preg_replace('/[\r\n].*/','',$to).'>'); if(!$expect(250) && !$expect(251)){fclose($socket);return false;}
  $write('DATA'); if(!$expect(354)){fclose($socket);return false;}
  $date = date('r'); $messageId = '<'.uniqid('', true).'@'.$domain.'>';
  $headerLines = [];
  $headerLines[] = 'Date: '.$date;
  $headerLines[] = 'Message-ID: '.$messageId;
  $headerLines[] = 'To: '.$to;
  $headerLines[] = 'Subject: '.$subject;
  foreach ($headers as $h) { $headerLines[] = $h; }
  $data = implode($crlf, $headerLines).$crlf.$crlf.$rawBody.$crlf.'.';
  $write($data); if(!$expect(250)){fclose($socket);return false;}
  $write('QUIT'); fclose($socket); return true;
}

try {
  $ip = getClientIp();
  if (!checkRateLimit($ip, $config['security']['rate_limit_minutes'])) {
    http_response_code(429);
    echo json_encode(['success'=>false,'error'=>'Πολλά αιτήματα. Δοκιμάστε ξανά σε λίγο.']);
    exit;
  }

  // Expect multipart/form-data
  $name = sanitizeInput($_POST['name'] ?? '');
  $email = sanitizeInput($_POST['email'] ?? '');
  $phone = sanitizeInput($_POST['phone'] ?? '');
  $about = sanitizeInput($_POST['about'] ?? '');
  $privacy = isset($_POST['privacy']);
  $promotion = isset($_POST['promotion']);
  $recaptchaToken = $_POST['recaptcha_token'] ?? '';
  $honeypot = $_POST[$config['security']['honeypot_field']] ?? '';

  if (!empty($honeypot)) { echo json_encode(['success'=>true,'message'=>'Η αίτηση καταχωρήθηκε.']); exit; }

  // Validate required fields
  $errors = [];
  if (!$name) $errors[] = 'name';
  if (!$email || !validateEmail($email)) $errors[] = 'email';
  if (!$phone) $errors[] = 'phone';
  if (!$about) $errors[] = 'about';
  if (!$privacy) $errors[] = 'privacy';
  if (!isset($_FILES['cv']) || ($_FILES['cv']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) $errors[] = 'cv';

  // File validation (enhanced security)
  $allowedMime = ['application/pdf','image/png','image/jpeg'];
  $allowedExt = ['pdf','png','jpg','jpeg'];
  $dangerousExt = ['php','phtml','php3','php4','php5','pht','exe','sh','bat','cmd','js','html','htm','svg'];
  $maxSize = 5 * 1024 * 1024; // 5MB
  $cvTmp = $_FILES['cv']['tmp_name'] ?? '';
  $cvName = $_FILES['cv']['name'] ?? '';
  $cvSize = (int)($_FILES['cv']['size'] ?? 0);
  
  if ($cvTmp && is_uploaded_file($cvTmp)) {
    $ext = strtolower(pathinfo($cvName, PATHINFO_EXTENSION));
    $fileNameLower = strtolower($cvName);
    
    // CRITICAL: Check for double extensions (e.g., malicious.pdf.php)
    if (preg_match('/\.(' . implode('|', $dangerousExt) . ')($|\.)/i', $fileNameLower)) {
      $errors[] = 'cv_dangerous_extension';
    }
    
    // ALWAYS use finfo_open for MIME detection (more secure than mime_content_type)
    if (!function_exists('finfo_open')) {
      $errors[] = 'cv_finfo_missing'; // Server configuration issue
    } else {
      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $mime = finfo_file($finfo, $cvTmp);
      finfo_close($finfo);
      
      if ($cvSize <= 0 || $cvSize > $maxSize) $errors[] = 'cv_size';
      if (!in_array($ext, $allowedExt, true) || !in_array($mime, $allowedMime, true)) $errors[] = 'cv_type';
    }
  }

  if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success'=>false,'error'=>'Ελέγξτε τα πεδία της φόρμας.','fields'=>$errors]);
    exit;
  }

  // Verify reCAPTCHA
  $recaptcha = verifyRecaptcha($recaptchaToken, $config['recaptcha']['secret_key']);
  if (empty($recaptcha['success']) || (isset($recaptcha['score']) && $recaptcha['score'] < ($config['recaptcha']['min_score'] ?? 0.3))) {
    http_response_code(400);
    echo json_encode(['success'=>false,'error'=>'Αποτυχία επαλήθευσης reCAPTCHA.']);
    exit;
  }

  // Build MIME email with attachment
  $to = $config['email']['to'];
  $subject = '[Nerally Careers] Αίτηση υποψηφίου: '. $name;
  $mixed = 'bnd_mixed_'.md5(uniqid('', true));
  $alt = 'bnd_alt_'.md5(uniqid('', true));

  $plain = "Νέα αίτηση καριέρας\n\n".
           "Όνομα: $name\n".
           "Email: $email\n".
           "Τηλέφωνο: $phone\n".
           "Σχόλια: \n$about\n".
           "Προώθηση σε πελάτες: ".($promotion?'Ναι':'Όχι')."\n".
           "Ημερομηνία: ".date('d/m/Y H:i:s')."\n";

  $html = '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body>'.
          '<div style="background:#2980B9;color:#fff;padding:16px;text-align:center;"><strong>Νέα αίτηση καριέρας</strong></div>'.
          '<div style="padding:16px;">'.
          '<p><strong>Όνομα:</strong> '.sanitizeInput($name).'</p>'.
          '<p><strong>Email:</strong> '.sanitizeInput($email).'</p>'.
          '<p><strong>Τηλέφωνο:</strong> '.sanitizeInput($phone).'</p>'.
          '<p><strong>Σχόλια:</strong><br><div style="background:#f8f9fa;padding:12px;border-left:4px solid #2980B9;">'.nl2br(sanitizeInput($about)).'</div></p>'.
          '<p><strong>Προώθηση σε πελάτες:</strong> '.($promotion?'Ναι':'Όχι').'</p>'.
          '<hr style="border:none;border-top:1px solid #eee;" />'.
          '<p style="color:#666;font-size:12px;">'.date('d/m/Y H:i:s').' — IP: '.($_SERVER['REMOTE_ADDR'] ?? 'unknown').'</p>'.
          '</div></body></html>';

  $body = '';
  $body .= "--$mixed\r\n";
  $body .= "Content-Type: multipart/alternative; boundary=\"$alt\"\r\n\r\n";
  $body .= "--$alt\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: 7bit\r\n\r\n$plain\r\n";
  $body .= "--$alt\r\nContent-Type: text/html; charset=UTF-8\r\nContent-Transfer-Encoding: 7bit\r\n\r\n$html\r\n";
  $body .= "--$alt--\r\n";

  // Attachment
  $cvData = file_get_contents($cvTmp);
  $cvB64 = chunk_split(base64_encode($cvData));
  $safeName = preg_replace('/[^A-Za-z0-9._-]+/','_', $cvName) ?: ('cv_'.date('Ymd_His').'.dat');
  $mime = function_exists('finfo_open') ? (function($cvTmp){$f=finfo_open(FILEINFO_MIME_TYPE);$m=finfo_file($f,$cvTmp);finfo_close($f);return $m;})($cvTmp) : mime_content_type($cvTmp);

  $body .= "--$mixed\r\n";
  $body .= "Content-Type: $mime; name=\"$safeName\"\r\n";
  $body .= "Content-Transfer-Encoding: base64\r\n";
  $body .= "Content-Disposition: attachment; filename=\"$safeName\"\r\n\r\n";
  $body .= $cvB64."\r\n";
  $body .= "--$mixed--\r\n";

  $headers = [
    'MIME-Version: 1.0',
    'Content-Type: multipart/mixed; boundary="'.$mixed.'"',
    'From: '.$config['email']['from'],
    'Reply-To: '.sanitizeInput($email),
    'X-Mailer: Nerally Careers Form v1.0'
  ];

  $sent = false;
  if (!empty($config['email']['use_smtp'])) {
    $sent = smtpSend($to, $subject, $body, $headers, $config);
    if (!$sent && !empty($config['email']['allow_mail_fallback'])) {
      $sent = mail($to, $subject, $body, implode("\r\n", $headers));
    }
  } else {
    $sent = mail($to, $subject, $body, implode("\r\n", $headers));
  }

  if ($sent) {
    echo json_encode(['success'=>true,'message'=>'Η αίτησή σου εστάλη επιτυχώς!']);
  } else {
    http_response_code(500);
    echo json_encode(['success'=>false,'error'=>'Αποτυχία αποστολής email.']);
  }
}
catch (Exception $e) {
  http_response_code(500);
  echo json_encode(['success'=>false,'error'=>'Εσωτερικό σφάλμα.']);
}
?>
