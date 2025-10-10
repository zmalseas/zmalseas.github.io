<a class="skip-link" href="#main-content">Μετάβαση στο περιεχόμενο</a>
<?php if (is_file(__DIR__.'/env-boot.php')) { include __DIR__.'/env-boot.php'; } ?>
<header class="site-header">
  <div class="header-row">
      <a class="brand" href="/" aria-label="Nerally Home">
        <img src="/images/logo.png" alt="Nerally logo" width="36" height="36" />
        <span class="name">Nerally</span>
      </a>

      <nav class="primary" aria-label="Κύρια πλοήγηση">
        <ul class="nav-links">
          <li class="nav-item"><a href="/"><span class="text">Αρχική</span></a></li>
          
          <li class="nav-item dropdown">
            <a href="#"><span class="text">Η Εταιρεία</span><span class="caret">▾</span></a>
            <div class="submenu" role="menu">
              <a href="/etairia/company.html">Ποιοι Είμαστε <span class="sm-arrow">›</span></a>
              <a href="/etairia/team.html">Ομάδα <span class="sm-arrow">›</span></a>
              <a href="/etairia/join-us.html">Θέσεις Εργασίας <span class="sm-arrow">›</span></a>
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a href="#"><span class="text">Υπηρεσίες</span><span class="caret">▾</span></a>
            <div class="submenu" role="menu">
              <a href="/ipiresies/logistiki.html">Λογιστική <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/misthodosia.html">Μισθοδοσία <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/assurance.html">Assurance <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/consulting.html">Consulting <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/cyber-security.html">Cyber Security <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/social-media.html">Social Media <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/epixorigiseis.html">Επιχορηγήσεις <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/symvoulos-mixanikos.html" style="white-space: nowrap;">Σύμβουλος Μηχανικός <span class="sm-arrow">›</span></a>
            </div>
          </li>

          <li class="nav-item"><a href="/arthra/"><span class="text">Άρθρα</span></a></li>
          
          <li class="nav-item dropdown">
            <a href="#"><span class="text">Εφαρμογές</span><span class="caret">▾</span></a>
            <div class="submenu" role="menu">
              <a href="/efarmoges/rent-tax-calculator.php">Φόρος Ενοικίων <span class="sm-arrow">›</span></a>
              <a href="/efarmoges/income-tax-calculator.php">Φόρος Εισοδήματος <span class="sm-arrow">›</span></a>
            </div>
          </li>
          
          <li class="nav-item"><a href="/epikoinonia/contact.html"><span class="text">Επικοινωνία</span></a></li>
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
      <img src="/images/logo.png" alt="Nerally logo" />
      <span class="title">Nerally</span>
    </a>
  </div>

  <div class="menu-wrap">
    <div class="menu-list">
      <a class="menu-toggle" href="/index.html">Αρχική</a>
      
      <div class="menu-item">
        <button class="menu-toggle">Η Εταιρεία <span class="exp-caret">▾</span></button>
        <div class="menu-sub">
          <a href="/etairia/company.html">Ποιοι Είμαστε</a>
          <a href="/etairia/team.html">Ομάδα</a>
          <a href="/etairia/join-us.html">Θέσεις Εργασίας</a>
        </div>
      </div>
      
      <div class="menu-item">
        <button class="menu-toggle">Υπηρεσίες <span class="exp-caret">▾</span></button>
        <div class="menu-sub">
          <a href="/ipiresies/logistiki.html">Λογιστική</a>
          <a href="/ipiresies/misthodosia.html">Μισθοδοσία</a>
          <a href="/ipiresies/assurance.html">Assurance</a>
          <a href="/ipiresies/consulting.html">Consulting</a>
          <a href="/ipiresies/cyber-security.html">Cyber Security</a>
          <a href="/ipiresies/social-media.html">Social Media</a>
          <a href="/ipiresies/epixorigiseis.html">Επιχορηγήσεις</a>
          <a href="/ipiresies/symvoulos-mixanikos.html" style="white-space: nowrap;">Σύμβουλος Μηχανικός</a>
        </div>
      </div>
      
  <a class="menu-toggle" href="/arthra/">Άρθρα</a>
      
      <div class="menu-item">
        <button class="menu-toggle">Εφαρμογές <span class="exp-caret">▾</span></button>
        <div class="menu-sub">
          <a href="/efarmoges/rent-tax-calculator.html">Φόρος Ενοικίων</a>
          <a href="/efarmoges/income-tax-calculator.html">Φόρος Εισοδήματος</a>
        </div>
      </div>
      
      <a class="menu-toggle" href="/epikoinonia/contact.html">Επικοινωνία</a>
    </div>
    
    <!-- Footer in overlay -->
    <div class="overlay-footer">
      <div class="overlay-footer-content">
        <div class="legal-links">
          <a href="/legal/privacy.php" class="legal-link">Πολιτική Απορρήτου</a>
          <a href="/legal/terms.php" class="legal-link">Όροι Χρήσης</a>
          <a href="/legal/cookies.php" class="legal-link">Cookies</a>
          <a href="/legal/privacy.php" class="legal-link">GDPR</a>
        </div>
        
        <div class="social-section">
          <span class="connect-text">Connect with us</span>
          <div class="social-links">
            <a href="#" class="social-link tiktok" aria-label="TikTok">
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path fill="currentColor" d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
              </svg>
            </a>
            <a href="#" class="social-link instagram" aria-label="Instagram">
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path fill="currentColor" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/>
              </svg>
            </a>
            <a href="#" class="social-link linkedin" aria-label="LinkedIn">
              <svg viewBox="0 0 24 24" width="20" height="20">
                <path fill="currentColor" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/>
              </svg>
            </a>
          </div>
        </div>
        
        <div class="copyright">
          <p>© <span id="overlay-year"></span> Nerally. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// Set year for overlay footer
document.addEventListener('DOMContentLoaded', function() {
  const overlayYear = document.getElementById("overlay-year");
  if (overlayYear) {
    overlayYear.textContent = new Date().getFullYear();
  }
});
</script>
