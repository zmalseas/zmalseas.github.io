// Global Site Configuration (no secrets here)
// Attach to window so legacy scripts can read it without modules
(function () {
  if (window.SITE_CONFIG) return;
  window.SITE_CONFIG = {
    BASE_URL: window.location.origin || '',
    GTM_ID: 'GTM-MN565XBX',
    RECAPTCHA_SITE: '6Lcd7dcrAAAAADzfwDc4AG_kN6jKU0-0Fo78NmYx'
  };
})();

