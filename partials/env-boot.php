<?php
// Expose safe, non-secret config to the frontend from environment
// Only emits public reCAPTCHA site key; never outputs secrets
$recaptchaSite = getenv('RECAPTCHA_SITE') ?: '';
if ($recaptchaSite) {
    $val = htmlspecialchars($recaptchaSite, ENT_QUOTES, 'UTF-8');
    echo "<script>(function(){window.SITE_CONFIG=window.SITE_CONFIG||{};window.SITE_CONFIG.RECAPTCHA_SITE='".$val."';})();</script>";
}
?>

