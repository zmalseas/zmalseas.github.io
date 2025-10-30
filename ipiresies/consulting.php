<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!doctype html>
<html lang="el">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Συμβουλευτικές Υπηρεσίες — Nerally</title>
  <meta name="description" content="Στρατηγική, χρηματοοικονομικός σχεδιασμός, M&A, εσωτερικός έλεγχος και οργάνωση λογιστηρίου. Συμβουλευτική με εφαρμογή." />
  <meta name="keywords" content="business consulting, συμβουλευτικές υπηρεσίες, στρατηγικός σχεδιασμός, M&A, due diligence, εσωτερικός έλεγχος, Nerally" />
  <link rel="canonical" href="https://nerally.gr/ipiresies/consulting.php" />
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />
  
  <?php
  // Schema Markup for SEO
  $serviceData = [
    'name' => 'Συμβουλευτικές Υπηρεσίες',
    'description' => 'Συμβουλευτικές υπηρεσίες επιχειρηματικής στρατηγικής, χρηματοοικονομικού σχεδιασμού, M&A, εσωτερικού ελέγχου και οργάνωσης λογιστηρίου.',
    'url' => 'https://nerally.gr/ipiresies/consulting.php',
    'serviceType' => 'Business Consulting'
  ];
  include $_SERVER['DOCUMENT_ROOT'].'/partials/schema-service.php';
  ?>

  <style>
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

    /* Page content */
    .page-header {
      padding: 48px 0 32px;
      background: #f3f6f9;
    }

    .page-title-wrapper {
      display: grid;
      grid-template-columns: 1.2fr 1fr;
      gap: 2rem;
      align-items: start;
      margin-bottom: 2rem;
    }

    .page-title-wrapper h1 {
      font-size: clamp(2rem, 4vw, 2.6rem);
      margin: 0 0 0.5rem;
      color: #111827;
    }

    .page-title-wrapper .intro-text {
      color: #5e6a75;
      font-size: 1.05rem;
      line-height: 1.6;
      margin: 0;
    }

    .highlight-box {
      background: white;
      border-left: 4px solid var(--brand);
      padding: 1.25rem 1.5rem;
      border-radius: 0 12px 12px 0;
      box-shadow: 0 10px 25px rgba(22, 48, 68, 0.08);
    }

    .highlight-box strong {
      display: block;
      color: #111827;
      margin-bottom: 0.5rem;
    }

    .highlight-box p {
      margin: 0;
      font-size: 0.93rem;
      color: #5e6a75;
      line-height: 1.5;
    }

    .section {
      padding: 48px 0;
    }

    .section:nth-child(even) {
      background: white;
    }

    .section-title {
      font-size: clamp(1.5rem, 3vw, 1.8rem);
      margin: 0 0 1rem;
      color: #111827;
    }

    .section-intro {
      color: #5e6a75;
      max-width: 900px;
      margin-bottom: 2rem;
      line-height: 1.6;
    }

    .service-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 1.5rem;
      margin-top: 2rem;
    }

    .service-card {
      background: white;
      border-radius: 14px;
      padding: 1.5rem 1.75rem;
      box-shadow: 0 10px 25px rgba(22, 48, 68, 0.08);
      border: 1px solid #e5e7eb;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .section:nth-child(even) .service-card {
      background: #f9fafb;
    }

    .service-pill {
      background: rgba(12, 111, 191, 0.08);
      color: #111827;
      display: inline-block;
      padding: 0.35rem 0.9rem;
      border-radius: 999px;
      font-size: 0.7rem;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .service-card-title {
      font-weight: 600;
      font-size: 1.1rem;
      margin: 0 0 1rem;
      display: flex;
      gap: 0.75rem;
      align-items: center;
      color: #111827;
    }

    .service-chip {
      width: 32px;
      height: 32px;
      background: var(--brand);
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 0.9rem;
      font-weight: 700;
      flex-shrink: 0;
    }

    .service-card ul {
      padding-left: 1.25rem;
      margin: 0;
      flex: 1;
    }

    .service-card ul li {
      margin-bottom: 0.5rem;
      color: #374151;
      line-height: 1.5;
    }

    .blue-check {
      color: var(--brand);
      font-weight: 600;
      margin-right: 0.25rem;
    }

    .footer-highlight {
      background: white;
      border-radius: 12px;
      padding: 2rem 2.5rem;
      border-left: 4px solid rgba(12, 111, 191, 0.3);
      box-shadow: 0 10px 25px rgba(22, 48, 68, 0.08);
      margin-top: 3rem;
    }

    .footer-highlight h3 {
      margin: 0 0 1rem;
      color: #111827;
    }

    .footer-highlight p {
      color: #5e6a75;
      line-height: 1.6;
      margin: 0 0 1rem;
    }

    .footer-highlight p:last-child {
      margin-bottom: 0;
      font-weight: 600;
      color: #111827;
    }

    @media (max-width: 768px) {
      .page-title-wrapper {
        grid-template-columns: 1fr;
      }

      .service-grid {
        grid-template-columns: 1fr;
      }

      .highlight-box {
        max-width: 100%;
      }
    }
  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <!-- Hero Section with Text Animation -->
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
  <main class="main-content" style="margin-top:0;">
    
    <!-- Page Header -->
    <section class="page-header">
      <div class="container">
        <div class="page-title-wrapper">
          <div>
            <h1>Συμβουλευτικές Υπηρεσίες</h1>
            <p class="intro-text">Στη Nerally Consulting βοηθάμε τις επιχειρήσεις να σχεδιάσουν τη στρατηγική τους, να οργανώσουν σωστά τα οικονομικά και διοικητικά τους συστήματα και να πάρουν αποφάσεις βασισμένες σε δεδομένα.</p>
          </div>
          <div class="highlight-box">
            <strong>«Στρατηγική με εφαρμογή»</strong>
            <p>Εργαζόμαστε δίπλα στη διοίκηση ώστε η στρατηγική να μετατρέπεται σε πράξη.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Η προσέγγισή μας -->
    <section class="section">
      <div class="container">
        <h2 class="section-title">Η προσέγγισή μας</h2>
        <p class="section-intro">
          Η συμβουλευτική μας φιλοσοφία βασίζεται στη σύνδεση στρατηγικής, δεδομένων και καθημερινής λειτουργίας.
          Ξεκινάμε από την κατανόηση της επιχειρησιακής πραγματικότητας, εντοπίζουμε τα σημεία βελτίωσης και
          διαμορφώνουμε λύσεις που μπορούν να εφαρμοστούν άμεσα, είτε πρόκειται για ανάπτυξη, είτε για αναδιοργάνωση, είτε για έλεγχο κινδύνων.
        </p>
      </div>
    </section>

    <!-- Τι προσφέρουμε -->
    <section class="section">
      <div class="container">
        <h2 class="section-title">Τι προσφέρουμε</h2>
        
        <div class="service-grid">
          <article class="service-card">
            <div class="service-pill">Επιχειρηματικός & Χρηματοοικονομικός Σχεδιασμός</div>
            <div class="service-card-title">
              <div class="service-chip">1</div>
              Επιχειρηματικά & Στρατηγικά Πλάνα
            </div>
            <ul>
              <li><span class="blue-check">✓</span> Business Plans για επενδύσεις ή χρηματοδότηση</li>
              <li><span class="blue-check">✓</span> Χρηματοοικονομική και λειτουργική αναδιάρθρωση</li>
              <li><span class="blue-check">✓</span> Financial Planning και ανάλυση σεναρίων</li>
              <li><span class="blue-check">✓</span> Μελέτες βιωσιμότητας και σκοπιμότητας</li>
              <li><span class="blue-check">✓</span> Προβλέψεις ταμειακών ροών</li>
            </ul>
          </article>

          <article class="service-card">
            <div class="service-pill">Υποστήριξη Συναλλαγών</div>
            <div class="service-card-title">
              <div class="service-chip">2</div>
              M&A, αποτιμήσεις και due diligence
            </div>
            <ul>
              <li><span class="blue-check">✓</span> Αποτιμήσεις εταιρειών και περιουσιακών στοιχείων</li>
              <li><span class="blue-check">✓</span> Υποστήριξη εξαγορών και συγχωνεύσεων</li>
              <li><span class="blue-check">✓</span> Δομή και χρηματοδότηση συναλλαγών</li>
              <li><span class="blue-check">✓</span> Οικονομικό και επιχειρησιακό due diligence</li>
              <li><span class="blue-check">✓</span> Διαπραγματευτική υποστήριξη με επενδυτές</li>
            </ul>
          </article>

          <article class="service-card">
            <div class="service-pill">Εσωτερικός Έλεγχος & Διακυβέρνηση</div>
            <div class="service-card-title">
              <div class="service-chip">3</div>
              Έλεγχος, πολιτικές και συμμόρφωση
            </div>
            <ul>
              <li><span class="blue-check">✓</span> Σχεδιασμός συστήματος εσωτερικού ελέγχου</li>
              <li><span class="blue-check">✓</span> Risk assessment και προτάσεις βελτίωσης</li>
              <li><span class="blue-check">✓</span> Outsourcing λειτουργίας εσωτερικού ελέγχου</li>
              <li><span class="blue-check">✓</span> Corporate Governance health check</li>
              <li><span class="blue-check">✓</span> Κανονισμοί – διαδικασίες – reporting</li>
            </ul>
          </article>
        </div>
      </div>
    </section>

    <!-- Οργάνωση & Επίβλεψη Εσωτερικού Λογιστηρίου -->
    <section class="section">
      <div class="container">
        <h2 class="section-title">Οργάνωση & Επίβλεψη Εσωτερικού Λογιστηρίου</h2>
        
        <div class="service-grid" style="grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));">
          <article class="service-card">
            <div class="service-card-title">
              <div class="service-chip">4</div>
              Αναδιοργάνωση λογιστικής λειτουργίας
            </div>
            <ul>
              <li><span class="blue-check">✓</span> Χαρτογράφηση υφιστάμενων ροών και ρόλων</li>
              <li><span class="blue-check">✓</span> Καθορισμός αρμοδιοτήτων και εγκρίσεων</li>
              <li><span class="blue-check">✓</span> Διασύνδεση με εμπορικό / ERP / myDATA</li>
              <li><span class="blue-check">✓</span> Πρότυπες φόρμες και οδηγίες εργασίας</li>
            </ul>
          </article>

          <article class="service-card">
            <div class="service-card-title">
              <div class="service-chip">5</div>
              Επόπτευση & περιοδικός έλεγχος
            </div>
            <ul>
              <li><span class="blue-check">✓</span> Εβδομαδιαία ή μηνιαία εποπτεία κινήσεων</li>
              <li><span class="blue-check">✓</span> Έλεγχος συμφωνιών, υποχρεώσεων και προθεσμιών</li>
              <li><span class="blue-check">✓</span> Δείκτες παρακολούθησης κόστους και ρευστότητας</li>
              <li><span class="blue-check">✓</span> Εκπαίδευση προσωπικού λογιστηρίου</li>
            </ul>
          </article>
        </div>

        <div class="footer-highlight">
          <h3>Το όραμά μας</h3>
          <p>
            Να μετατρέπουμε τη συμβουλευτική από μία αποσπασματική υπηρεσία σε έναν σταθερό μηχανισμό υποστήριξης της διοίκησης.
            Η αξία δεν βρίσκεται μόνο στο σχέδιο, αλλά στην υλοποίηση και στη συνεχή παρακολούθηση.
          </p>
          <p>Η ομάδα της Nerally Consulting</p>
        </div>
      </div>
    </section>

  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

  <script src="/js/navigation.js"></script>
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/chat-widget.js"></script>
  <script src="../app.js" defer></script>

  <script<?php echo isset($nonce_attr) ? $nonce_attr : ''; ?>>
    // Hero animation controller
    (function(){
      const headline = document.getElementById('headline');
      const flipEl = document.getElementById('flip');
      if (!headline || !flipEl) return;
      
      const wait = (ms) => new Promise(resolve => setTimeout(resolve, ms));
      
      function flipTo(text) {
        flipEl.classList.remove('enter');
        void flipEl.offsetWidth;
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
        
        const words = ['CONSULTING','ΣΤΡΑΤΗΓΙΚΗ','ΑΝΑΠΤΥΞΗ','ΑΞΙΟΠΙΣΤΙΑ'];
        let i = 0;
        flipTo(words[i++ % words.length]);
        setInterval(() => flipTo(words[i++ % words.length]), 1900);
      })();
    })();
  </script>
</body>
</html>



