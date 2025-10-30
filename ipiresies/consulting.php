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
    /* Consulting page styles - matching logistiki.php & misthodosia.php */
    .company-container{max-width:1200px;margin:0 auto;padding:0 32px}
    .company-section{padding:80px 0;}

    @keyframes fadeSlideIn {
      from {opacity:0; transform: translateY(20px);}
      to {opacity:1; transform: translateY(0);}
    }
    .company-section h2 {
      margin:0 0 20px;
      font-size:clamp(26px,2.6vw,38px);
      line-height:1.15;
      color:var(--brand);
      position:relative;
      opacity:0;
      animation: fadeSlideIn 0.8s ease forwards;
    }
    .company-section h2::after{
      content:"";
      display:block;
      width:60px;
      height:4px;
      background:var(--brand);
      margin-top:10px;
      border-radius:4px;
    }
    .company-section h3 {
      margin:34px 0 8px;
      font-size:clamp(20px,3.4vw,26px);
      color:var(--brand);
      letter-spacing:-.01em;
    }
    .company-section p{line-height:1.8;font-size:18px;margin:0 0 18px;color:#111827}

    /* Callout (διακριτικό) */
    .callout{background:linear-gradient(180deg, #ffffff 0%, #f6f9ff 100%);border:1px solid #e6ecff;border-radius:16px;padding:20px 22px;box-shadow:0 8px 24px rgba(0,0,0,.06)}
    .callout .quote{font-style:italic;color:#3b4b6a;margin-bottom:8px}
    .callout p{margin:0;color:#5b6b7b}

    /* Split layout */
    .split{display:grid;grid-template-columns:1.3fr .9fr;gap:28px;align-items:start;margin-top:10px}
    @media (max-width:860px){.split{grid-template-columns:1fr}}

    .muted{color:#5b6b7b}

    /* Service grid sections */
    .section-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px;
      margin: 32px 0;
    }
    
    .section-box {
      background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
      border: 1px solid #e6ecff;
      border-radius: 14px;
      padding: 24px;
      box-shadow: 0 4px 16px rgba(0,0,0,.04);
    }
    
    .section-box h4 {
      margin: 0 0 16px;
      font-size: 19px;
      color: var(--brand);
      font-weight: 700;
    }
    
    .section-box ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .section-box li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 12px;
      color: #111827;
      line-height: 1.6;
    }
    
    .section-box li:last-child {
      margin-bottom: 0;
    }
    
    .blue-check {
      flex: 0 0 20px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: var(--brand);
      color: white;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-top: 2px;
      font-size: 12px;
      font-weight: bold;
    }
    
    .service-category {
      font-size: 13px;
      color: var(--brand);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 10px;
      font-weight: 600;
      display: block;
      opacity: 0.8;
    }
    
    /* Quote box at the end */
    .quote-box {
      background: linear-gradient(180deg, #ffffff 0%, #f6f9ff 100%);
      border: 1px solid #e6ecff;
      border-radius: 16px;
      padding: 30px 36px;
      box-shadow: 0 8px 24px rgba(0,0,0,.06);
      margin-top: 48px;
    }
    
    .quote-box .big-quote {
      font-size: 19px;
      font-style: italic;
      color: #3b4b6a;
      line-height: 1.7;
      margin: 0 0 16px;
    }
    
    .quote-box .attribution {
      margin: 0;
      font-size: 16px;
      font-weight: 600;
      color: var(--brand);
    }
    
    @media(max-width:768px) {
      .section-grid {
        grid-template-columns: 1fr;
      }
    }

    /* Hero Section - Matching misthodosia.php */
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

    /* Additional styling for service category */
    .service-category {
      font-size: 0.85rem;
      color: var(--brand);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: 0.75rem;
      font-weight: 600;
    }

    .blue-check {
      color: var(--brand);
      font-weight: 700;
      margin-right: 0.5rem;
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

  <main class="main-content">
    <section class="company-section">
      <div class="company-container">
        <h2>Συμβουλευτικές Υπηρεσίες</h2>

        <div class="split">
          <div>
            <p>Στη Nerally Consulting βοηθάμε τις επιχειρήσεις να σχεδιάσουν τη στρατηγική τους, να οργανώσουν σωστά τα οικονομικά και διοικητικά τους συστήματα και να πάρουν αποφάσεις βασισμένες σε δεδομένα.</p>
            <p>Η συμβουλευτική μας φιλοσοφία βασίζεται στη σύνδεση στρατηγικής, δεδομένων και καθημερινής λειτουργίας. Ξεκινάμε από την κατανόηση της επιχειρησιακής πραγματικότητας, εντοπίζουμε τα σημεία βελτίωσης και διαμορφώνουμε λύσεις που μπορούν να εφαρμοστούν άμεσα, είτε πρόκειται για ανάπτυξη, είτε για αναδιοργάνωση, είτε για έλεγχο κινδύνων.</p>
          </div>
          <aside class="callout">
            <div class="quote">«Στρατηγική με εφαρμογή»</div>
            <p class="muted">Εργαζόμαστε δίπλα στη διοίκηση ώστε η στρατηγική να μετατρέπεται σε πράξη.</p>
          </aside>
        </div>

        <h3>Τι προσφέρουμε</h3>
        <div class="section-grid">
          <div class="section-box">
            <h4>Επιχειρηματικά & Στρατηγικά Πλάνα</h4>
            <p class="service-category">Επιχειρηματικός & Χρηματοοικονομικός Σχεδιασμός</p>
            <ul>
              <li><span class="blue-check">✓</span> Business Plans για επενδύσεις ή χρηματοδότηση</li>
              <li><span class="blue-check">✓</span> Χρηματοοικονομική και λειτουργική αναδιάρθρωση</li>
              <li><span class="blue-check">✓</span> Financial Planning και ανάλυση σεναρίων</li>
              <li><span class="blue-check">✓</span> Μελέτες βιωσιμότητας και σκοπιμότητας</li>
              <li><span class="blue-check">✓</span> Προβλέψεις ταμειακών ροών</li>
            </ul>
          </div>

          <div class="section-box">
            <h4>M&A, αποτιμήσεις και due diligence</h4>
            <p class="service-category">Υποστήριξη Συναλλαγών</p>
            <ul>
              <li><span class="blue-check">✓</span> Αποτιμήσεις εταιρειών και περιουσιακών στοιχείων</li>
              <li><span class="blue-check">✓</span> Υποστήριξη εξαγορών και συγχωνεύσεων</li>
              <li><span class="blue-check">✓</span> Δομή και χρηματοδότηση συναλλαγών</li>
              <li><span class="blue-check">✓</span> Οικονομικό και επιχειρησιακό due diligence</li>
              <li><span class="blue-check">✓</span> Διαπραγματευτική υποστήριξη με επενδυτές</li>
            </ul>
          </div>

          <div class="section-box">
            <h4>Έλεγχος, πολιτικές και συμμόρφωση</h4>
            <p class="service-category">Εσωτερικός Έλεγχος & Διακυβέρνηση</p>
            <ul>
              <li><span class="blue-check">✓</span> Σχεδιασμός συστήματος εσωτερικού ελέγχου</li>
              <li><span class="blue-check">✓</span> Risk assessment και προτάσεις βελτίωσης</li>
              <li><span class="blue-check">✓</span> Outsourcing λειτουργίας εσωτερικού ελέγχου</li>
              <li><span class="blue-check">✓</span> Corporate Governance health check</li>
              <li><span class="blue-check">✓</span> Κανονισμοί – διαδικασίες – reporting</li>
            </ul>
          </div>
        </div>

        <h3 style="margin-top: 3rem;">Οργάνωση & Επίβλεψη Εσωτερικού Λογιστηρίου</h3>
        <div class="section-grid" style="grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));">
          <div class="section-box">
            <h4>Αναδιοργάνωση λογιστικής λειτουργίας</h4>
            <ul>
              <li><span class="blue-check">✓</span> Χαρτογράφηση υφιστάμενων ροών και ρόλων</li>
              <li><span class="blue-check">✓</span> Καθορισμός αρμοδιοτήτων και εγκρίσεων</li>
              <li><span class="blue-check">✓</span> Διασύνδεση με εμπορικό / ERP / myDATA</li>
              <li><span class="blue-check">✓</span> Πρότυπες φόρμες και οδηγίες εργασίας</li>
            </ul>
          </div>

          <div class="section-box">
            <h4>Επόπτευση & περιοδικός έλεγχος</h4>
            <ul>
              <li><span class="blue-check">✓</span> Εβδομαδιαία ή μηνιαία εποπτεία κινήσεων</li>
              <li><span class="blue-check">✓</span> Έλεγχος συμφωνιών, υποχρεώσεων και προθεσμιών</li>
              <li><span class="blue-check">✓</span> Δείκτες παρακολούθησης κόστους και ρευστότητας</li>
              <li><span class="blue-check">✓</span> Εκπαίδευση προσωπικού λογιστηρίου</li>
            </ul>
          </div>
        </div>

        <div class="quote-box" style="margin-top: 3rem;">
          <p class="big-quote">«Να μετατρέπουμε τη συμβουλευτική από μία αποσπασματική υπηρεσία σε έναν σταθερό μηχανισμό υποστήριξης της διοίκησης. Η αξία δεν βρίσκεται μόνο στο σχέδιο, αλλά στην υλοποίηση και στη συνεχή παρακολούθηση.»</p>
          <p class="attribution">— Η ομάδα της Nerally Consulting</p>
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



