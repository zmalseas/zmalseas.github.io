<?php
// Simple .env loader (φορτώνει secrets από .env)
$env = @parse_ini_file(__DIR__ . '/.env', false, INI_SCANNER_RAW);
if ($env) foreach ($env as $k => $v) { $_ENV[$k] = $v; putenv("$k=$v"); }
/**
 * Nerally Contact Form Handler
 * Handles contact form submissions with reCAPTCHA verification
 * Version: 1.1
 */

// Load configuration
$config = require_once __DIR__ . '/config.php';

// Security headers
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// CORS handling
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if (in_array($origin, $config['security']['allowed_origins'])) {
    header("Access-Control-Allow-Origin: $origin");
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Max-Age: 86400');
    header('Vary: Origin');
}

/**
 * Resolve client IP behind proxies (Cloudflare/Nginx/etc.).
 */
function getClientIp() {
    $candidates = [
        'HTTP_CF_CONNECTING_IP',
        'HTTP_X_REAL_IP',
        'HTTP_X_FORWARDED_FOR',
        'REMOTE_ADDR'
    ];
    foreach ($candidates as $key) {
        if (!empty($_SERVER[$key])) {
            $val = $_SERVER[$key];
            if ($key === 'HTTP_X_FORWARDED_FOR') {
                $parts = array_map('trim', explode(',', $val));
                $val = $parts[0] ?? $val;
            }
            // basic sanitize
            $val = preg_replace('/[^0-9a-fA-F:\.]/', '', $val);
            if ($val) return $val;
        }
    }
    return 'unknown';
}

/**
 * Simple SMTP sender using stream sockets
 */
function smtpSend($to, $subject, $body, $headers, $config) {
    $crlf = "\r\n";
    $host = $config['email']['smtp_host'] ?? '';
    $port = (int)($config['email']['smtp_port'] ?? 465);
    $user = $config['email']['smtp_username'] ?? '';
    $pass = $config['email']['smtp_password'] ?? '';
    $secure = strtolower($config['email']['smtp_secure'] ?? 'ssl');
    $from = $config['email']['from'] ?? $user;
    // Envelope sender (MAIL FROM) should often match the authenticated user to satisfy SMTP policies
    $envelopeFrom = $config['email']['smtp_envelope_from'] ?? $user ?: $from;

    if (!$host) return false;

    $transport = ($secure === 'ssl' || $port === 465) ? 'ssl://' : '';
    $errno = 0; $errstr = '';
    $socket = @stream_socket_client($transport.$host.':'.$port, $errno, $errstr, 10, STREAM_CLIENT_CONNECT);
    if (!$socket) { return false; }
    stream_set_timeout($socket, 10);

    $read = function() use ($socket) {
        $data = '';
        while ($str = fgets($socket, 515)) {
            $data .= $str;
            if (substr($str, 3, 1) === ' ') break;
        }
        return $data;
    };
    $write = function($cmd) use ($socket, $crlf) { fwrite($socket, $cmd.$crlf); };
    $expect = function($code) use ($read) {
        $resp = $read();
        return (int)substr($resp,0,3) === $code;
    };

    if (!$expect(220)) { fclose($socket); return false; }
    $domain = $_SERVER['SERVER_NAME'] ?? 'localhost';
    $write('EHLO '.$domain);
    if (!$expect(250)) { fclose($socket); return false; }

    if ($secure === 'tls' || $port === 587) {
        $write('STARTTLS');
        if (!$expect(220)) { fclose($socket); return false; }
        if (!@stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) { fclose($socket); return false; }
        $write('EHLO '.$domain);
        if (!$expect(250)) { fclose($socket); return false; }
    }

    if ($user && $pass) {
        $write('AUTH LOGIN');
        if (!$expect(334)) { fclose($socket); return false; }
        $write(base64_encode($user));
        if (!$expect(334)) { fclose($socket); return false; }
        $write(base64_encode($pass));
        if (!$expect(235)) { fclose($socket); return false; }
    }

    $write('MAIL FROM:<'.preg_replace('/[\r\n].*/','',$envelopeFrom).'>');
    if (!$expect(250)) { fclose($socket); return false; }
    $write('RCPT TO:<'.preg_replace('/[\r\n].*/','',$to).'>');
    if (!$expect(250) && !$expect(251)) { fclose($socket); return false; }

    $write('DATA');
    if (!$expect(354)) { fclose($socket); return false; }

    $date = date('r');
    $messageId = '<'.uniqid('', true).'@'.$domain.'>';
    $headerLines = [];
    $headerLines[] = 'Date: '.$date;
    $headerLines[] = 'Message-ID: '.$messageId;
    $headerLines[] = 'To: '.$to;
    $headerLines[] = 'Subject: '.$subject;
    foreach ($headers as $h) { $headerLines[] = $h; }

    $data = implode($crlf, $headerLines).$crlf.$crlf.$body.$crlf.'.';
    $write($data);
    if (!$expect(250)) { fclose($socket); return false; }
    $write('QUIT');
    fclose($socket);
    return true;
}
// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

/**
 * Sanitize input data
 */
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Validate email address
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Verify reCAPTCHA
 * - Adds diagnostics and fallback to recaptcha.net if google.com is unreachable
 */
function verifyRecaptcha($token, $secretKey) {
    $endpoints = [
        'https://www.google.com/recaptcha/api/siteverify',
        'https://www.recaptcha.net/recaptcha/api/siteverify'
    ];

    $postFields = http_build_query([
        'secret' => $secretKey,
        'response' => $token,
        'remoteip' => getClientIp()
    ]);

    $lastError = null;
    foreach ($endpoints as $endpoint) {
        $result = false;
        $httpCode = 0;
        $transport = 'stream';
        $curlErrNo = null;
        $curlErr = null;

        if (function_exists('curl_init')) {
            $transport = 'curl';
            $ch = curl_init($endpoint);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
            // Keep default SSL verification; if host CA store is broken, this can fail
            $result = curl_exec($ch);
            if ($result === false) {
                $curlErrNo = curl_errno($ch);
                $curlErr = curl_error($ch);
            }
            $httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
        } else {
            $context = stream_context_create([
                'http' => [
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => $postFields,
                    'timeout' => 10
                ]
            ]);
            $result = @file_get_contents($endpoint, false, $context);
            // Best-effort HTTP code extraction for streams (not always available)
            if (isset($http_response_header) && is_array($http_response_header)) {
                foreach ($http_response_header as $h) {
                    if (preg_match('/^HTTP\/\S+\s+(\d{3})/', $h, $m)) { $httpCode = (int)$m[1]; break; }
                }
            }
        }

        if ($result !== false && $httpCode === 200) {
            $response = json_decode($result, true) ?: [];
            $response['success'] = $response['success'] ?? false;
            // Attach diagnostics (non-sensitive) for server logs
            $response['_diagnostics'] = [
                'endpoint' => $endpoint,
                'transport' => $transport,
                'http_code' => $httpCode
            ];
            return $response;
        }

        // Save last error for logging and try next endpoint
        $lastError = [
            'success' => false,
            'error' => 'recaptcha_http_error',
            'http_code' => $httpCode,
            'endpoint' => $endpoint,
            'transport' => $transport,
            'curl_errno' => $curlErrNo,
            'curl_error' => $curlErr
        ];
    }

    // All endpoints failed
    return $lastError ?: ['success' => false, 'error' => 'recaptcha_request_failed'];
}

/**
 * Rate limiting check
 */
function checkRateLimit($ip, $minutes = 5) {
    $lockFile = sys_get_temp_dir() . '/contact_rate_' . md5($ip);
    
    if (file_exists($lockFile)) {
        $lastRequest = (int)file_get_contents($lockFile);
        if (time() - $lastRequest < ($minutes * 60)) {
            return false; // Rate limited
        }
    }
    
    file_put_contents($lockFile, time());
    return true;
}

/**
 * Log security events
 */
function logSecurityEvent($event, $details = []) {
    global $config;
    if (empty($config['security']['enable_logging'])) {
        return;
    }
    
    $logFile = __DIR__ . '/logs/security.log';
    $logDir = dirname($logFile);
    
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $logEntry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
        'event' => $event,
        'details' => $details
    ];
    
    file_put_contents($logFile, json_encode($logEntry) . "\n", FILE_APPEND | LOCK_EX);
}

/**
 * Log token events
 */
function logTokenEvent($event, $details = []) {
    global $config;
    if (empty($config['security']['enable_logging'])) {
        return;
    }

    $logFile = __DIR__ . '/logs/token_events.log';
    $logDir = dirname($logFile);

    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }

    $logEntry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
        'event' => $event,
        'details' => $details
    ];

    file_put_contents($logFile, json_encode($logEntry) . "\n", FILE_APPEND | LOCK_EX);
}

/**
 * Send email notification
 */
function sendEmail($data, $config) {
    $to = $config['email']['to'];
    $subject = $config['email']['subject_prefix'] . sanitizeInput($data['subject'] ?? 'Νέο μήνυμα');
    
    // Email headers
    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $config['email']['from'],
        'Reply-To: ' . sanitizeInput($data['email']),
        'X-Mailer: Nerally Contact Form v1.0',
        'X-Priority: 3',
        'X-MSMail-Priority: Normal'
    ];
    
    // Email body
    $body = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .header { background: #4a90e2; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; }
            .field { margin-bottom: 15px; }
            .field strong { color: #4a90e2; }
            .footer { background: #f8f9fa; padding: 15px; text-align: center; font-size: 12px; color: #666; }
        </style>
    </head>
    <body>
        <div class="header">
            <h2>🔔 Νέο μήνυμα από την ιστοσελίδα Nerally</h2>
        </div>
        <div class="content">
            <div class="field">
                <strong>📝 Θέμα:</strong><br>
                ' . sanitizeInput($data['subject'] ?? 'Νέο μήνυμα') . '
            </div>
            <div class="field">
                <strong>👤 Όνομα:</strong><br>
                ' . sanitizeInput($data['name']) . '
            </div>
            <div class="field">
                <strong>📧 Email:</strong><br>
                ' . sanitizeInput($data['email']) . '
            </div>';
    
    if (!empty($data['phone'])) {
        $body .= '
            <div class="field">
                <strong>📞 Τηλέφωνο:</strong><br>
                ' . sanitizeInput($data['phone']) . '
            </div>';
    }
    
    if (!empty($data['company'])) {
        $body .= '
            <div class="field">
                <strong>🏢 Εταιρία:</strong><br>
                ' . sanitizeInput($data['company']) . '
            </div>';
    }
    
    if (!empty($data['service'])) {
        $body .= '\n'
            . '            <div class="field">\n'
            . '                <strong>Service:</strong><br>\n'
            . '                ' . sanitizeInput($data['service']) . '\n'
            . '            </div>';
    }
    
    $body .= '
            <div class="field">
                <strong>💬 Μήνυμα:</strong><br>
                <div style="background: #f8f9fa; padding: 15px; border-left: 4px solid #4a90e2; margin-top: 10px;">
                    ' . nl2br(sanitizeInput($data['message'])) . '
                </div>
            </div>
            <div class="field">
                <strong>Consent:</strong><br>
                Newsletter opt-in: ' . (!empty($data['newsletter']) ? 'Yes' : 'No') . '<br>
                Privacy accepted: ' . (!empty($data['privacy']) ? 'Yes' : 'No') . '
            </div>
        </div>
        <div class="footer">
            <p>📅 Ημερομηνία: ' . date('d/m/Y H:i:s') . '</p>
            <p>🌐 IP: ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . '</p>
            <p>🔗 Προέλευση: ' . ($_SERVER['HTTP_REFERER'] ?? 'unknown') . '</p>
        </div>
    </body>
    </html>';
    
    if (!empty($config['email']['use_smtp'])) {
        $ok = smtpSend($to, $subject, $body, $headers, $config);
        if (!$ok && !empty($config['email']['allow_mail_fallback'])) {
            return mail($to, $subject, $body, implode("\r\n", $headers));
        }
        return $ok;
    }
    return mail($to, $subject, $body, implode("\r\n", $headers));
}

try {
    // Get IP address
    $ip = getClientIp();
    
    // Rate limiting
    if (!checkRateLimit($ip, $config['security']['rate_limit_minutes'])) {
        http_response_code(429);
        echo json_encode([
            'success' => false,
            'error' => 'Πολλά αιτήματα. Παρακαλώ δοκιμάστε ξανά σε λίγα λεπτά.'
        ]);
        logSecurityEvent('rate_limit_exceeded', ['ip' => $ip]);
        exit;
    }
    
    // Read input (accept JSON or form-encoded)
    $rawBody = file_get_contents('php://input');
    $contentType = $_SERVER['CONTENT_TYPE'] ?? $_SERVER['HTTP_CONTENT_TYPE'] ?? '';
    $input = [];
    if (stripos($contentType, 'application/json') !== false) {
        $input = json_decode($rawBody, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            // Fallback to form data
            $input = $_POST ?: [];
        }
    } else {
        $input = $_POST ?: [];
        if (!$input && $rawBody) {
            $tmp = json_decode($rawBody, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($tmp)) {
                $input = $tmp;
            }
        }
    }
    if (!is_array($input)) { $input = []; }
    
    // Check honeypot field (should be empty)
    if (!empty($input[$config['security']['honeypot_field']])) {
        logSecurityEvent('honeypot_triggered', ['ip' => $ip, 'honeypot_value' => $input[$config['security']['honeypot_field']]]);
        // Return success to confuse bots
        echo json_encode(['success' => true, 'message' => 'Το μήνυμά σας στάλθηκε επιτυχώς!']);
        exit;
    }
    
    // Validate required fields
    $requiredFields = ['name', 'email', 'message', 'recaptcha_token'];
    $errors = [];
    
    foreach ($requiredFields as $field) {
        if (empty($input[$field])) {
            $errors[] = "Το πεδίο '$field' είναι υποχρεωτικό.";
        }
    }
    
    // Validate email
    if (!empty($input['email']) && !validateEmail($input['email'])) {
        $errors[] = 'Παρακαλώ εισάγετε έγκυρη διεύθυνση email.';
    }
    
    // Validate message length
    if (!empty($input['message']) && strlen($input['message']) > $config['security']['max_message_length']) {
        $errors[] = 'Το μήνυμα είναι πολύ μεγάλο.';
    }
    
    // Check for common spam patterns
    $spamPatterns = ['/\[url=/i', '/\[link=/i', '/http.*http/i', '/viagra|cialis|casino/i'];
    $content = $input['message'] . ' ' . $input['name'];
    
    foreach ($spamPatterns as $pattern) {
        if (preg_match($pattern, $content)) {
            logSecurityEvent('spam_detected', ['ip' => $ip, 'pattern' => $pattern]);
            $errors[] = 'Το μήνυμα περιέχει μη επιτρεπτό περιεχόμενο.';
            break;
        }
    }
    
    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'errors' => $errors]);
        exit;
    }
    
    // Verify reCAPTCHA
    $recaptcha = verifyRecaptcha($input['recaptcha_token'], $config['recaptcha']['secret_key']);
    $minScore = $config['recaptcha']['min_score'] ?? 0.5;
    $expectedActions = $config['recaptcha']['expected_actions'] ?? [];
    $actionOk = true;
    if (!empty($recaptcha['action']) && !empty($expectedActions)) {
        $actionOk = in_array($recaptcha['action'], $expectedActions, true);
    }

    // Pre-exit debug logging for reCAPTCHA verification
    if (!empty($config['security']['enable_logging'])) {
        $logsDir = __DIR__ . '/logs';
        if (!is_dir($logsDir)) { @mkdir($logsDir, 0755, true); }
        $tokenVal = $input['recaptcha_token'] ?? null;
        $diag = [
            'token_present' => !empty($tokenVal),
            'token_length' => is_string($tokenVal) ? strlen($tokenVal) : null,
            'token_prefix' => is_string($tokenVal) ? substr($tokenVal, 0, 15) : null,
            'verify_response' => $recaptcha,
        ];
        @file_put_contents($logsDir . '/recaptcha_verification_debug.log', json_encode($diag, JSON_PRETTY_PRINT) . "\n", FILE_APPEND | LOCK_EX);
        // minimal headers capture without getallheaders dependency
        $hdrs = [];
        foreach ($_SERVER as $k => $v) {
            if (strpos($k, 'HTTP_') === 0) { $hdrs[$k] = $v; }
        }
        @file_put_contents($logsDir . '/request_headers_debug.log', json_encode($hdrs, JSON_PRETTY_PRINT) . "\n", FILE_APPEND | LOCK_EX);
        @file_put_contents($logsDir . '/form_data_debug.log', json_encode($input, JSON_PRETTY_PRINT) . "\n", FILE_APPEND | LOCK_EX);
    }
    if (empty($recaptcha['success']) || (isset($recaptcha['score']) && $recaptcha['score'] < $minScore) || !$actionOk) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => 'reCAPTCHA verification failed. Παρακαλώ δοκιμάστε ξανά.'
        ]);
        logSecurityEvent('recaptcha_failed', ['ip' => $ip, 'score' => $recaptcha['score'] ?? null, 'action' => $recaptcha['action'] ?? null, 'errors' => $recaptcha['error-codes'] ?? null, 'hostname' => $recaptcha['hostname'] ?? null]);
        exit;
    }
    
    // Ensure logging is enabled based on configuration
    if (!empty($config['security']['enable_logging'])) {
        $logsDir = __DIR__ . '/logs';
        if (!is_dir($logsDir)) {
            if (!mkdir($logsDir, 0755, true)) {
                error_log('Failed to create logs directory');
                exit;
            }
        }

        // Enhanced debugging for log creation
        $logFiles = [
            'recaptcha_verification_debug.log',
            'form_data_debug.log',
            'contact-handler.log',
            'errors.log'
        ];

        foreach ($logFiles as $logFile) {
            $filePath = $logsDir . '/' . $logFile;
            if (!file_exists($filePath)) {
                if (!@file_put_contents($filePath, "Log file initialized\n", FILE_APPEND | LOCK_EX)) {
                    error_log("Failed to create or write to $logFile");
                }
            }
        }

        // Debugging reCAPTCHA verification
        $recaptchaDebugLogFile = $logsDir . '/recaptcha_verification_debug.log';
        if (!@file_put_contents($recaptchaDebugLogFile, json_encode(['token' => $input['recaptcha_token'] ?? null, 'response' => $recaptcha], JSON_PRETTY_PRINT) . "\n", FILE_APPEND | LOCK_EX)) {
            error_log('Failed to write to recaptcha_verification_debug.log');
        }

        // Debugging form data
        $formDataDebugLogFile = $logsDir . '/form_data_debug.log';
        if (!@file_put_contents($formDataDebugLogFile, json_encode($input, JSON_PRETTY_PRINT) . "\n", FILE_APPEND | LOCK_EX)) {
            error_log('Failed to write to form_data_debug.log');
        }

        // Debugging request headers (portable without getallheaders)
        $requestHeadersLogFile = $logsDir . '/request_headers_debug.log';
        $hdrs2 = [];
        foreach ($_SERVER as $k => $v) {
            if (strpos($k, 'HTTP_') === 0) { $hdrs2[$k] = $v; }
        }
        if (!@file_put_contents($requestHeadersLogFile, json_encode($hdrs2, JSON_PRETTY_PRINT) . "\n", FILE_APPEND | LOCK_EX)) {
            error_log('Failed to write to request_headers_debug.log');
        }
    }

    // Send email
    if (sendEmail($input, $config)) {
        // Log successful submission
        logSecurityEvent('contact_form_success', [
            'ip' => $ip,
            'email' => $input['email'],
            'name' => $input['name']
        ]);
        
        echo json_encode([
            'success' => true,
            'message' => 'Το μήνυμά σας στάλθηκε επιτυχώς! Θα επικοινωνήσουμε μαζί σας σύντομα.'
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => 'Σφάλμα κατά την αποστολή. Παρακαλώ δοκιμάστε ξανά ή επικοινωνήστε απευθείας.'
        ]);
        logSecurityEvent('email_send_failed', ['ip' => $ip]);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Εσωτερικό σφάλμα. Παρακαλώ δοκιμάστε ξανά.'
    ]);
    
    logSecurityEvent('exception', [
        'ip' => $ip,
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine()
    ]);
}
?>
