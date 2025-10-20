<?php
// Expose safe, non-secret config to the frontend from environment
// Only emits public reCAPTCHA site key; never outputs secrets
$recaptchaSite = getenv('RECAPTCHA_SITE') ?: '';
if ($recaptchaSite) {
    $val = htmlspecialchars($recaptchaSite, ENT_QUOTES, 'UTF-8');
    $nonce_attr = isset($csp_nonce) ? ' nonce="'.$csp_nonce.'"' : '';
    echo "<script{$nonce_attr}>(function(){window.SITE_CONFIG=window.SITE_CONFIG||{};window.SITE_CONFIG.RECAPTCHA_SITE='".$val."';})();</script>";
}
?>

