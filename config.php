<?php
/**
 * Nerally Contact Form Configuration
 * Update these settings as needed
 */

// Robust env loading for reCAPTCHA keys (fallback to local .env if getenv() empty)
$__manual_env_parse = function($path) {
    $out = [];
    if (!@is_readable($path)) return $out;
    $lines = @file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!$lines) return $out;
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#' || $line[0] === ';') continue;
        $pos = strpos($line, '=');
        if ($pos === false) continue;
        $key = trim(substr($line, 0, $pos));
        $val = trim(substr($line, $pos + 1));
        if ($val !== '' && ($val[0] === '"' || $val[0] === "'")) {
            $q = $val[0];
            if (substr($val, -1) === $q) $val = substr($val, 1, -1);
        }
        if ($key !== '') $out[$key] = $val;
    }
    return $out;
};
$__site = getenv('RECAPTCHA_SITE') ?: '';
$__secret = getenv('RECAPTCHA_SECRET') ?: '';
if (!($__site && $__secret)) {
    $envFile = __DIR__ . '/.env';
    if (@is_file($envFile)) {
        $envArr = @parse_ini_file($envFile, false, INI_SCANNER_RAW);
        if (!is_array($envArr) || (!isset($envArr['RECAPTCHA_SITE']) && !isset($envArr['RECAPTCHA_SECRET']))) {
            $envArr = $__manual_env_parse($envFile);
        }
        if (is_array($envArr)) {
            if (!$__site && !empty($envArr['RECAPTCHA_SITE'])) { $__site = $envArr['RECAPTCHA_SITE']; }
            if (!$__secret && !empty($envArr['RECAPTCHA_SECRET'])) { $__secret = $envArr['RECAPTCHA_SECRET']; }
        }
    }
}

return [
    // reCAPTCHA Settings
    'recaptcha' => [
        'site_key' => $__site,
        'secret_key' => $__secret,
        'min_score' => 0.3,
        'expected_actions' => ['contact_form', 'chat_widget']
    ],
    
    // Email Settings
    'email' => [
        'to' => 'info@nerally.gr',                       // Where to send emails
        'from' => 'noreply@nerally.gr',                  // From address
        'subject_prefix' => '[Nerally Contact] ',        // Subject prefix
        // SMTP Settings from .env
        'smtp_host' => getenv('SMTP_HOST'),
        'smtp_port' => getenv('SMTP_PORT') ?: 587,
        'smtp_username' => getenv('SMTP_USER'),
        'smtp_password' => getenv('SMTP_PASS'),
        'smtp_secure' => getenv('SMTP_SECURE') ?: 'tls',
        // Envelope sender often must match smtp_username. Override via SMTP_ENVELOPE_FROM if needed.
        'smtp_envelope_from' => getenv('SMTP_ENVELOPE_FROM') ?: getenv('SMTP_USER'),
        'use_smtp' => true,
        'allow_mail_fallback' => true
    ],
    
    // Security Settings
    'security' => [
        'max_message_length' => 5000,                    // Maximum message length
        'rate_limit_minutes' => 1,                       // Rate limit window in minutes (reduced for UX)
        'allowed_origins' => [                           // Allowed domains for CORS
            'https://nerally.gr',
            'https://www.nerally.gr'
        ],
        'honeypot_field' => 'website',                   // Hidden field name for bot detection
        'enable_logging' => true                         // Enable security logging
    ],
    
    // Form Field Settings
    'fields' => [
        'required' => ['name', 'email', 'message'],     // Required fields
        'optional' => ['phone', 'company', 'subject'],  // Optional fields
        'max_lengths' => [                               // Maximum field lengths
            'name' => 100,
            'email' => 255,
            'phone' => 20,
            'company' => 200,
            'subject' => 200,
            'message' => 5000
        ]
    ],
    
    // Spam Detection
    'spam_protection' => [
        'enable_honeypot' => true,                       // Enable honeypot protection
        'enable_rate_limiting' => true,                  // Enable rate limiting
        'blocked_words' => [                             // Words that trigger spam detection
            'viagra', 'cialis', 'casino', 'poker',
            'seo', 'backlink', 'loan', 'cryptocurrency'
        ],
        'max_links' => 2                                 // Maximum links allowed in message
    ],

    // Debug Settings
    'debug' => [
        'recaptcha_verbose' => false                     // Extra reCAPTCHA diagnostic logs
    ]
];
?>
