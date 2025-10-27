<?php
/**
 * CSP Nonce Generator
 * Generates a cryptographically secure nonce for Content Security Policy
 * Usage: Include this file at the top of every page, then use $csp_nonce in script tags
 */

// Check if nonce already exists (prevent regeneration on includes)
if (!isset($GLOBALS['csp_nonce'])) {
    // Generate cryptographically secure random nonce
    $csp_nonce = base64_encode(random_bytes(16));
    $GLOBALS['csp_nonce'] = $csp_nonce;
    
    // Set CSP header with nonce for inline scripts ONLY
    // 'self' allows external scripts from same origin
    // Nonce is ONLY for inline <script> tags, NOT for <script src="">
    // This is the correct approach - strict-dynamic breaks normal script loading
    $csp_policy = "default-src 'self'; " .
                  "script-src 'self' 'nonce-{$csp_nonce}' https://www.googletagmanager.com https://www.google-analytics.com https://www.gstatic.com https://www.google.com https://unpkg.com; " .
                  "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net; " .
                  "img-src 'self' data: https:; " .
                  "font-src 'self' https://fonts.gstatic.com https://cdn.jsdelivr.net; " .
                  "connect-src 'self' https://*.google.com https://*.gstatic.com https://*.googletagmanager.com https://*.google-analytics.com; " .
                  "frame-src https://www.googletagmanager.com https://www.google.com; " .
                  "frame-ancestors 'none'; " .
                  "base-uri 'self'; " .
                  "form-action 'self';";
    
    header("Content-Security-Policy: " . $csp_policy);
} else {
    // Use existing nonce
    $csp_nonce = $GLOBALS['csp_nonce'];
}
