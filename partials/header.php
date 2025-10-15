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
              <a href="/etairia/company.php">Ποιοι Είμαστε <span class="sm-arrow">›</span></a>
              <a href="/etairia/team.php">Ομάδα <span class="sm-arrow">›</span></a>
              <a href="/etairia/join-us.php">Θέσεις Εργασίας <span class="sm-arrow">›</span></a>
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a href="#"><span class="text">Υπηρεσίες</span><span class="caret">▾</span></a>
            <div class="submenu" role="menu">
              <a href="/ipiresies/logistiki.php">Λογιστική <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/misthodosia.php">Μισθοδοσία <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/assurance.php">Assurance <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/consulting.php">Consulting <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/cyber-security.php">Cyber Security <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/social-media.php">Social Media <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/epixorigiseis.php">Επιχορηγήσεις <span class="sm-arrow">›</span></a>
              <a href="/ipiresies/symvoulos-mixanikos.php" style="white-space: nowrap;">Σύμβουλος Μηχανικός <span class="sm-arrow">›</span></a>
            </div>
          </li>

          <li class="nav-item"><a href="/arthra/"><span class="text">Άρθρα</span></a></li>
          
          <li class="nav-item dropdown">
            <a href="#"><span class="text">Εφαρμογές</span><span class="caret">▾</span></a>
            <div class="submenu" role="menu">
              <a href="/efarmoges/rent-tax-calculator.php">Φόρος Ενοικίων <span class="sm-arrow">›</span></a>
              <a href="/efarmoges/income-tax-calculator.php">Φόρος Εισοδήματος <span class="sm-arrow">›</span></a>
              <a href="/efarmoges/vat-calculator.php">Υπολογισμός ΦΠΑ <span class="sm-arrow">›</span></a>
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
  <a class="menu-toggle" href="/">Αρχική</a>
      
      <div class="menu-item">
        <button class="menu-toggle">Η Εταιρεία <span class="exp-caret">▾</span></button>
        <div class="menu-sub">
          <a href="/etairia/company.php">Ποιοι Είμαστε</a>
          <a href="/etairia/team.php">Ομάδα</a>
          <a href="/etairia/join-us.php">Θέσεις Εργασίας</a>
        </div>
      </div>
      
      <div class="menu-item">
        <button class="menu-toggle">Υπηρεσίες <span class="exp-caret">▾</span></button>
        <div class="menu-sub">
          <a href="/ipiresies/logistiki.php">Λογιστική</a>
          <a href="/ipiresies/misthodosia.php">Μισθοδοσία</a>
          <a href="/ipiresies/assurance.php">Assurance</a>
          <a href="/ipiresies/consulting.php">Consulting</a>
          <a href="/ipiresies/cyber-security.php">Cyber Security</a>
          <a href="/ipiresies/social-media.php">Social Media</a>
          <a href="/ipiresies/epixorigiseis.php">Επιχορηγήσεις</a>
          <a href="/ipiresies/symvoulos-mixanikos.php" style="white-space: nowrap;">Σύμβουλος Μηχανικός</a>
        </div>
      </div>
      
  <a class="menu-toggle" href="/arthra/">Άρθρα</a>
      
      <div class="menu-item">
        <button class="menu-toggle">Εφαρμογές <span class="exp-caret">▾</span></button>
        <div class="menu-sub">
          <a href="/efarmoges/rent-tax-calculator.php">Φόρος Ενοικίων</a>
          <a href="/efarmoges/income-tax-calculator.php">Φόρος Εισοδήματος</a>
          <a href="/efarmoges/vat-calculator.php">Υπολογισμός ΦΠΑ</a>
        </div>
      </div>
      
      <a class="menu-toggle" href="/epikoinonia/contact.html">Επικοινωνία</a>
    </div>
    
  </div>
</div>
    
    
