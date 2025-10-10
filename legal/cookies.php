<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Πολιτική Cookies - Nerally</title>
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/site-config-inline.php'; ?>
  <style>
    /* Hero Section - Exact copy from company.php */
    .hero-animated {
      height: 170px;
      background: #000;
      color: #f6f8fb;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, "Helvetica Neue", Arial;
      overflow: hidden;
      position: sticky;
      top: 0;
      z-index: 50;
      border-bottom: 1px solid #333;
    }

    .hero-animated .stage {
      position: relative;
      z-index: 1;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: flex-start;
    }
    
    .hero-animated .stack {
      display: flex;
      flex-direction: column;
      gap: 0.8rem;
      align-items: flex-start;
      padding: 1.5rem 2.5rem;
      max-width: min(1200px, 92vw);
    }
    
    .hero-animated .headline {
      font-weight: 900;
      letter-spacing: .045em;
      line-height: 1.05;
      text-align: left;
      font-size: clamp(1.8rem, 5.5vw, 3.5rem);
      text-shadow: 0 0 24px rgba(255,255,255,.22);
      white-space: nowrap;
    }
    
    .hero-animated .headline b {
      background: linear-gradient(90deg, var(--brand), #3498db);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    
    .hero-animated .row {
      display: flex;
      align-items: baseline;
      gap: clamp(.4rem, 1.2vw, .8rem);
      opacity: 1;
    }
    
    .hero-animated .left {
      font-weight: 900;
      letter-spacing: .045em;
      line-height: 1;
      font-size: clamp(1.2rem, 3.8vw, 2.8rem);
      text-shadow: 0 0 14px rgba(255,255,255,.22);
    }
    
    .hero-animated .right {
      font-weight: 900;
      letter-spacing: .045em;
      line-height: 1;
      font-size: clamp(1.2rem, 3.8vw, 2.8rem);
      min-width: 8ch;
      text-align: left;
      color: #e8f6ff;
    }
    
    .hero-animated .flip {
      display: inline-block;
      transform-origin: 50% 80%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      transform-style: preserve-3d;
      will-change: transform, opacity;
    }
    
    .hero-animated .flip.enter {
      animation: flipIn .7s cubic-bezier(.2,.8,.2,1) forwards;
    }
    
    @keyframes flipIn {
      0% { transform: rotateX(90deg); opacity: 0; filter: blur(6px); }
      60% { opacity: 1; }
      100% { transform: rotateX(0); opacity: 1; filter: blur(0); }
    }

    .hero-animated .gap {
      display: inline-block;
      width: 0;
      vertical-align: baseline;
    }
    
    .hero-animated .gap.g1 { width: 3ch; }
    .hero-animated .gap.g2 { width: 2ch; }
    
    .hero-animated .rise {
      display: inline-block;
      transform: translateY(.9em);
      opacity: 0;
      animation: riseIn .7s ease forwards;
    }
    
    @keyframes riseIn {
      to { transform: translateY(0); opacity: 1; }
    }

    @media (max-width: 768px) {
      .hero-animated {
        height: 120px;
      }
      .hero-animated .stack {
        padding: 1rem 1.5rem;
        gap: 0.6rem;
      }
      .hero-animated .headline {
        font-size: clamp(1.4rem, 4.5vw, 2.5rem);
      }
      .hero-animated .left,
      .hero-animated .right {
        font-size: clamp(1rem, 3.2vw, 2rem);
      }
    }

    /* Legal page styling - similar to careers */
    .legal-page .main-content { margin-top: 0; }
    
    /* Legal section */
    .legal-section {
      position: relative;
      padding: 48px 0 64px;
    }
    
    .legal-bg { 
      position: absolute; 
      inset: 0; 
      z-index: 0; 
      background: #f4f6fb; 
    }
    
    .legal-grid { 
      position: relative; 
      z-index: 1;
      display: grid; 
      grid-template-columns: 280px 1fr; 
      gap: 40px; 
      align-items: start;
    }
    
    /* Sidebar */
    .legal-sidebar {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.06);
      padding: 24px 16px;
      position: sticky;
      top: 200px;
    }
    
    .legal-brand {
      font-weight: 800;
      font-size: 22px;
      margin: 0 0 18px;
      letter-spacing: -0.02em;
      color: #111827;
    }
    
    .legal-hint {
      color: #6b7280;
      font-size: 13px;
      margin-bottom: 18px;
    }
    
    .legal-nav {
      display: grid;
      gap: 10px;
    }
    
    .legal-btn {
      display: block;
      appearance: none;
      border: 1px solid #e5e7eb;
      background: #fff;
      color: #111827;
      padding: 12px 14px;
      border-radius: 12px;
      font-weight: 700;
      text-align: left;
      cursor: pointer;
      text-decoration: none;
      transition: border-color .15s ease, box-shadow .15s ease, transform .08s ease;
    }
    
    .legal-btn:hover { 
      border-color: #93c5fd; 
      transform: translateY(-1px); 
    }
    
    .legal-btn.active {
      border-color: var(--brand);
      box-shadow: 0 0 0 3px rgba(41,128,185,0.15);
    }

    /* Main content */
    .legal-main {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.06);
      padding: 28px 28px 56px;
    }
    
    .legal-header {
      display: flex;
      align-items: baseline;
      gap: 12px;
      flex-wrap: wrap;
      margin-bottom: 10px;
    }
    
    .legal-header h1 {
      font-size: clamp(22px, 3vw, 32px);
      margin: 0;
      letter-spacing: -0.01em;
      color: var(--brand);
    }
    
    .legal-meta {
      color: #6b7280;
      font-size: 13px;
    }
    
    .legal-doc {
      margin-top: 18px;
    }
    
    .legal-doc pre { 
      white-space: pre-wrap; 
      word-wrap: break-word; 
      margin: 0; 
      line-height: 1.65; 
      font-family: ui-monospace, "SFMono-Regular", Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
      font-size: 14.5px;
      color: #0b1222;
    }
    
    /* Styled headings */
    .legal-heading {
      color: var(--brand) !important;
      font-weight: 700;
    }
    
    .legal-footer {
      color: #6b7280;
      font-size: 13px;
      margin-top: 18px;
    }

    @media (max-width: 900px) {
      .legal-grid { 
        grid-template-columns: 1fr; 
      }
      .legal-sidebar { 
        position: static; 
        top: auto; 
      }
    }

  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <!-- Hero Section with Text Animation (LEGAL variant) -->
  <div class="hero-animated">
    <main class="stage">
      <div class="stack">
        <div id="headline" class="headline" aria-live="polite"></div>
        <div class="row" id="row">
          <div class="left">NERA</div>
          <div class="right"><span id="flip" class="flip">LLY</span></div>
        </div>
      </div>
    </main>
  </div>

  <!-- Main Content -->
  <main class="main-content legal-page" style="margin-top:0;">
    <section class="legal-section">
      <div class="legal-bg"></div>
      <div class="container">
        <div class="legal-grid">
          
          <!-- Sidebar -->
          <aside class="legal-sidebar">
            <h2 class="legal-brand">Nerally • Legal</h2>
            <div class="legal-hint">Επιλέξτε ενότητα:</div>
            <div class="legal-nav">
              <a href="/legal/terms.php" class="legal-btn">Όροι Χρήσης</a>
              <a href="/legal/privacy.php" class="legal-btn">Πολιτική Προστασίας Προσωπικών Δεδομένων</a>
              <a href="/legal/cookies.php" class="legal-btn active">Πολιτική Cookies</a>
            </div>
            <div class="legal-footer">© <span id="year"></span> Nerally</div>
          </aside>

          <!-- Main Content -->
          <div class="legal-main">
            <header class="legal-header">
              <h1>Πολιτική Cookies</h1>
              <span class="legal-meta">Προβολή πλήρους κειμένου</span>
            </header>
            
            <div class="legal-doc">
              <pre>Πολιτική Cookies

Τι είναι τα cookies;
Τα cookies είναι μικρά αρχεία κειμένου που αποθηκεύονται στον υπολογιστή ή την κινητή συσκευή σας όταν επισκέπτεστε μία ιστοσελίδα. Χρησιμοποιούμε τον όρο "cookies" ως ένα συγκεντρωτικό όρο για να περιγράψουμε τεχνικές όπως cookies, Flash cookies και web beacons.

Γιατί χρησιμοποιούμε cookies;
Χρησιμοποιούμε cookies για να:
• Εξασφαλίσουμε την ασφάλεια των ιστοσελίδων μας
• Διατηρήσουμε τις προτιμήσεις σας
• Αναλύσουμε τη χρήση των ιστοσελίδων μας
• Βελτιώσουμε τη λειτουργικότητα και την απόδοση
• Προσφέρουμε εξατομικευμένο περιεχόμενο και διαφημίσεις

Τύποι cookies που χρησιμοποιούμε:

1. Απαραίτητα cookies (Strictly Necessary):
Αυτά τα cookies είναι απαραίτητα για τη λειτουργία της ιστοσελίδας και δεν μπορούν να απενεργοποιηθούν στα συστήματά μας. Συνήθως τίθενται μόνον ως απάντηση σε ενέργειές σας που ισοδυναμούν με αίτημα για υπηρεσίες, όπως ο καθορισμός των προτιμήσεων απορρήτου, η σύνδεση ή η συμπλήρωση φορμών.

Όνομα: cookieConsent
Σκοπός: Αποθηκεύει την επιλογή σας για τη συναίνεση cookies
Διάρκεια: 365 ημέρες
Τύπος: Πρώτου μέρους

2. Απόδοσης cookies (Performance):
Αυτά τα cookies μας επιτρέπουν να μετράμε και να βελτιώνουμε την απόδοση της ιστοσελίδας μας. Μας βοηθούν να γνωρίζουμε ποιες σελίδες είναι οι πιο δημοφιλείς και οι λιγότερο δημοφιλείς και να δούμε πώς κινούνται οι επισκέπτες στην ιστοσελίδα.

Όνομα: _ga
Σκοπός: Google Analytics - διακρίνει τους χρήστες
Διάρκεια: 2 χρόνια
Τύπος: Τρίτου μέρους

Όνομα: _ga_*
Σκοπός: Google Analytics - αποθηκεύει μοναδικό αναγνωριστικό session
Διάρκεια: 2 χρόνια
Τύπος: Τρίτου μέρους

3. Λειτουργικότητας cookies (Functionality):
Αυτά τα cookies επιτρέπουν στην ιστοσελίδα να παρέχει βελτιωμένη λειτουργικότητα και εξατομίκευση. Μπορεί να τεθούν από εμάς ή από τρίτους παρόχους των οποίων τις υπηρεσίες έχουμε προσθέσει στις σελίδες μας.

Όνομα: language
Σκοπός: Αποθηκεύει την προτίμηση γλώσσας
Διάρκεια: 30 ημέρες
Τύπος: Πρώτου μέρους

4. Στοχευμένων διαφημίσεων cookies (Targeting):
Αυτά τα cookies μπορεί να τεθούν μέσα από την ιστοσελίδα μας από τους εταίρους διαφήμισής μας. Μπορεί να χρησιμοποιηθούν από αυτές τις εταιρείες για να δημιουργήσουν ένα προφίλ των ενδιαφερόντων σας και να σας δείξουν σχετικές διαφημίσεις σε άλλες ιστοσελίδες.

Session cookies vs Persistent cookies:
• Session cookies: Διαγράφονται όταν κλείνετε τον περιηγητή
• Persistent cookies: Παραμένουν στη συσκευή σας για καθορισμένο χρονικό διάστημα

Πώς να διαχειριστείτε τα cookies:
Μπορείτε να ελέγξετε και/ή να διαγράψετε cookies όπως επιθυμείτε. Για περισσότερες λεπτομέρειες, δείτε το aboutcookies.org. Μπορείτε να διαγράψετε όλα τα cookies που βρίσκονται ήδη στον υπολογιστή σας και μπορείτε να ρυθμίσετε τους περισσότερους περιηγητές ώστε να εμποδίζουν την τοποθέτησή τους.

Πώς να απενεργοποιήσετε τα cookies:
Στους περισσότερους περιηγητές, μπορείτε να:
• Αλλάξετε τις ρυθμίσεις σας για να μπλοκάρετε τα cookies
• Διαγράψετε όλα τα cookies
• Επιτρέψετε cookies μόνο από συγκεκριμένες ιστοσελίδες
• Μπλοκάρετε cookies τρίτων μερών
• Διαγράψετε όλα τα cookies όταν κλείνετε τον περιηγητή

Παρακαλούμε σημειώστε ότι εάν επιλέξετε να μπλοκάρετε τα cookies, ορισμένες λειτουργίες της ιστοσελίδας μας ενδέχεται να μην λειτουργούν σωστά.

Αλλαγές στην πολιτική cookies:
Ενδέχεται να ενημερώνουμε την παρούσα πολιτική cookies περιστασιακά. Θα σας ειδοποιήσουμε για τυχόν αλλαγές δημοσιεύοντας την νέα πολιτική cookies σε αυτή τη σελίδα.

Επικοινωνία:
Εάν έχετε ερωτήσεις σχετικά με τη χρήση των cookies, παρακαλούμε επικοινωνήστε μαζί μας στο:
Email: info@nerally.gr

Τελευταία ενημέρωση: Δεκέμβριος 2024
</pre>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </main>
  
  <!-- Footer -->
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/chat-widget.js"></script>
  <script src="../app.js"></script>
  <script>
    // Set current year
    document.getElementById('year').textContent = new Date().getFullYear();
    
    // Style legal headings
    document.addEventListener('DOMContentLoaded', function() {
      const legalDoc = document.querySelector('.legal-doc pre');
      if (legalDoc) {
        let content = legalDoc.innerHTML;
        // Match headings with Greek letters and colons
        content = content.replace(/^([Α-Ωα-ωάέήίόύώ\s?]+:)/gm, '<span class="legal-heading">$1</span>');
        // Match numbered headings
        content = content.replace(/^(\d+(?:\.\s*[Α-ΩΆΈΉΊΌΎΏ\s]*)+)/gm, '<span class="legal-heading">$1</span>');
        legalDoc.innerHTML = content;
      }
    });

    // Hero animation controller for legal
    (function(){
      const headline = document.getElementById('headline');
      const flipEl = document.getElementById('flip');
      if (!headline || !flipEl) return;
      
      const wait = (ms) => new Promise(resolve => setTimeout(resolve, ms));
      
      function flipTo(text) {
        flipEl.classList.remove('enter');
        void flipEl.offsetWidth; // restart animation
        flipEl.textContent = text;
        flipEl.classList.add('enter');
      }
      
      (async function run(){
        headline.textContent = 'NERALLY';
        await wait(1000);
        headline.innerHTML = 'N' + '<span class="gap g1"></span>' + 'ER' + '<span class="gap g2"></span>' + 'ALLY';
        await wait(1200);
        headline.querySelector('.g1').innerHTML = '<span class="rise">EW&nbsp;</span>';
        await wait(500);
        headline.querySelector('.g2').innerHTML = '<span class="rise">A&nbsp;</span>';
        await wait(1200);
        headline.innerHTML = '<b>NEW ERA</b> ALLY';
        
        const words = ['COOKIES','ΠΟΛΙΤΙΚΗ','PRIVACY','GDPR'];
        let i = 0;
        flipTo(words[i++ % words.length]);
        setInterval(() => flipTo(words[i++ % words.length]), 1900);
      })();
    })();
  </script>
</body>
</html>