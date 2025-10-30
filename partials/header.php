<?php 
// CSP Nonce for inline scripts security
if (!isset($csp_nonce) && is_file(__DIR__.'/csp-nonce.php')) { 
  include_once __DIR__.'/csp-nonce.php'; 
}
$nonce_attr = isset($csp_nonce) ? ' nonce="'.$csp_nonce.'"' : '';
?>
<a class="skip-link" href="#main-content">Μετάβαση στο περιεχόμενο</a>
<script<?php echo $nonce_attr; ?>>
// Global Site Configuration
(function () {
  if (window.SITE_CONFIG) return;
  window.SITE_CONFIG = {
    BASE_URL: window.location.origin || '',
    GTM_ID: 'GTM-MN565XBX',
    GA4_ID: 'G-84CY5EBJJX',
    RECAPTCHA_SITE: '6Lcd7dcrAAAAADzfwDc4AG_kN6jKU0-0Fo78NmYx'
  };
})();
</script>
<?php if (is_file(__DIR__.'/env-boot.php')) { include __DIR__.'/env-boot.php'; } ?>
<header class="site-header">
  <div class="header-row">
      <a class="brand" href="/" aria-label="Nerally Home">
        <img src="/images/logo.png" alt="Nerally logo" width="36" height="36" loading="eager" decoding="async" />
        <span class="name">Nerally</span>
      </a>

      <nav class="primary" aria-label="Κύρια πλοήγηση">
        <ul class="nav-links">
          <li class="nav-item"><a href="/"><span class="text">Αρχική</span></a></li>
          
          <li class="nav-item dropdown">
            <a href="#"><span class="text">Η Εταιρεία</span><span class="caret">▾</span></a>
            <div class="submenu" role="menu">
              <a href="/etairia/company">Ποιοι Είμαστε <span class="sm-arrow">›</span></a>
              <a href="/etairia/team">Ομάδα <span class="sm-arrow">›</span></a>
              <a href="/etairia/join-us">Θέσεις Εργασίας <span class="sm-arrow">›</span></a>
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a href="#"><span class="text">Υπηρεσίες</span><span class="caret">▾</span></a>
            <div class="submenu" role="menu">
              <a href="/ipiresies/logistiki">Λογιστική Εταιρειών <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/misthodosia">Μισθοδοσία <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/consulting">Consulting <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/epixorigiseis">Επιχορηγήσεις <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/social-media">Social Media Marketing <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/symvoulos-mixanikos" style="white-space: nowrap;">Σύμβουλος Μηχανικός <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/cyber-security">Cyber Security <span class="sm-arrow">›</span></a>
            </div>
          </li>

          <li class="nav-item"><a href="/arthra/"><span class="text">Άρθρα</span></a></li>
          
          <li class="nav-item dropdown">
            <a href="#"><span class="text">Εφαρμογές</span><span class="caret">▾</span></a>
            <div class="submenu" role="menu">
              <a href="/efarmoges/rent-tax-calculator">Φόρος Ενοικίων <span class="sm-arrow">›</span></a>
              <a href="/efarmoges/income-tax-calculator">Φόρος Εισοδήματος <span class="sm-arrow">›</span></a>
              <a href="/efarmoges/vat-calculator">Υπολογισμός ΦΠΑ <span class="sm-arrow">›</span></a>
              <a href="/efarmoges/tekmarto-eisodima-calculator">Τεκμαρτό Εισόδημα Ατομικής <span class="sm-arrow">›</span></a>
            </div>
          </li>
          
          <li class="nav-item"><a href="/epikoinonia/contact"><span class="text">Επικοινωνία</span></a></li>
        </ul>

        <button class="hamburger" aria-label="Άνοιγμα μενού">
          <span class="bar"></span>
        </button>
      </nav>
  </div>
</header>

<!-- Mobile overlay menu -->
<div class="overlay" aria-hidden="true">
  <div class="overlay-header">
    <a href="/">
      <img src="/images/logo.png" alt="Nerally logo" loading="lazy" decoding="async" />
      <span class="title">Nerally</span>
    </a>
    <button class="overlay-close" aria-label="Κλείσιμο μενού">
      <svg viewBox="0 0 24 24" width="24" height="24">
        <path fill="currentColor" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
      </svg>
    </button>
  </div>

  <div class="menu-wrap">
    <div class="menu-list">
      <a class="menu-toggle" href="/index.html">Αρχική</a>
      
      <div class="menu-item">
        <button class="menu-toggle">Η Εταιρεία <span class="exp-caret">▾</span></button>
        <div class="menu-sub">
          <a href="/etairia/company">Ποιοι Είμαστε</a>
          <a href="/etairia/team">Ομάδα</a>
          <a href="/etairia/join-us">Θέσεις Εργασίας</a>
        </div>
      </div>
      
      <div class="menu-item">
        <button class="menu-toggle">Υπηρεσίες <span class="exp-caret">▾</span></button>
        <div class="menu-sub">
          <a href="/ipiresies/logistiki">Λογιστική Εταιρειών</a>
          <a href="/ipiresies/misthodosia">Μισθοδοσία</a>
          <a href="/ipiresies/consulting">Consulting</a>
          <a href="/ipiresies/epixorigiseis">Επιχορηγήσεις</a>
          <a href="/ipiresies/social-media">Social Media Marketing</a>
          <a href="/ipiresies/symvoulos-mixanikos" style="white-space: nowrap;">Σύμβουλος Μηχανικός</a>
          <a href="/ipiresies/cyber-security">Cyber Security</a>
        </div>
      </div>
      
  <a class="menu-toggle" href="/arthra/">Άρθρα</a>
      
      <div class="menu-item">
        <button class="menu-toggle">Εφαρμογές <span class="exp-caret">▾</span></button>
        <div class="menu-sub">
          <a href="/efarmoges/rent-tax-calculator">Φόρος Ενοικίων</a>
          <a href="/efarmoges/income-tax-calculator">Φόρος Εισοδήματος</a>
          <a href="/efarmoges/vat-calculator">Υπολογισμός ΦΠΑ</a>
          <a href="/efarmoges/tekmarto-eisodima-calculator">Τεκμαρτό Εισόδημα Ατομικής</a>
        </div>
      </div>
      
      <a class="menu-toggle" href="/epikoinonia/contact">Επικοινωνία</a>
    </div>
    
  </div>
</div>

