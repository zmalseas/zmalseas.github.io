<?php
/**
 * Nerally Contact Form Configuration
 * Update these settings as needed
 */

return [
    // reCAPTCHA Settings
    'recaptcha' => [
        'site_key' => getenv('RECAPTCHA_SITE'),
        'secret_key' => getenv('RECAPTCHA_SECRET')
    ],
    
    // Email Settings
    'email' => [
        'to' => 'info@nerally.gr',                       // Where to send emails
        'from' => 'noreply@nerally.gr',                  // From address
        'subject_prefix' => '[Nerally Contact] ',        // Subject prefix
        // SMTP Settings from .env
        'smtp_host' => getenv('SMTP_HOST'),
        'smtp_port' => 465,
        'smtp_username' => getenv('SMTP_USER'),
        'smtp_password' => getenv('SMTP_PASS'),
        'smtp_secure' => 'ssl',
        'use_smtp' => true
    ],
    
    // Security Settings
    'security' => [
        'max_message_length' => 5000,                    // Maximum message length
        'rate_limit_minutes' => 5,                       // Rate limit window in minutes
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
    ]
];
?>