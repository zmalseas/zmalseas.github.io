<?php
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
 */
function verifyRecaptcha($token, $secretKey) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secretKey,
        'response' => $token,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
    ];
    
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
            'timeout' => 10
        ]
    ];
    
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    if ($result === false) {
        return false;
    }
    
    $response = json_decode($result, true);
    return $response['success'] ?? false;
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
    
    $body .= '
            <div class="field">
                <strong>💬 Μήνυμα:</strong><br>
                <div style="background: #f8f9fa; padding: 15px; border-left: 4px solid #4a90e2; margin-top: 10px;">
                    ' . nl2br(sanitizeInput($data['message'])) . '
                </div>
            </div>
        </div>
        <div class="footer">
            <p>📅 Ημερομηνία: ' . date('d/m/Y H:i:s') . '</p>
            <p>🌐 IP: ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . '</p>
            <p>🔗 Προέλευση: ' . ($_SERVER['HTTP_REFERER'] ?? 'unknown') . '</p>
        </div>
    </body>
    </html>';
    
    return mail($to, $subject, $body, implode("\r\n", $headers));
}

try {
    // Get IP address
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    
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
    
    // Get JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
        exit;
    }
    
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
    if (!verifyRecaptcha($input['recaptcha_token'], $config['recaptcha']['secret_key'])) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => 'reCAPTCHA verification failed. Παρακαλώ δοκιμάστε ξανά.'
        ]);
        logSecurityEvent('recaptcha_failed', ['ip' => $ip]);
        exit;
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