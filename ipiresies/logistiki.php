<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nerally - Λογιστική Εταιρειών</title>
  <meta name="description" content="Ολοκληρωμένες λογιστικές υπηρεσίες για εταιρείες, φοροσχεδιασμός, μισθοδοσία και οικονομικό reporting ." />
  <meta name="keywords" content="λογιστικές υπηρεσίες, φοροτεχνικά, λογιστής, φόροι επιχειρήσεων, λογιστική διαχείριση, Nerally, φόρος, φοροσχεδιασμός" />
  <meta name="author" content="Nerally" />
  <link rel="canonical" href="https://nerally.gr/ipiresies/logistiki.php" />
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://nerally.gr/ipiresies/logistiki.php" />
  <meta property="og:title" content="Λογιστική Εταιρειών - Nerally | Σύμμαχος Νέας Εποχής" />
  <meta property="og:description" content="Ολοκληρωμένες λογιστικές υπηρεσίες για εταιρείες, φοροσχεδιασμός και οικονομικές καταστάσεις που ανοίγουν πόρτες χρηματοδότησης." />
  <meta property="og:image" content="https://nerally.gr/images/logo.png" />
  <meta property="og:locale" content="el_GR" />
  
  <!-- Twitter -->
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:url" content="https://nerally.gr/ipiresies/logistiki.php" />
  <meta property="twitter:title" content="Λογιστική Εταιρειών - Nerally | Σύμμαχος Νέας Εποχής" />
  <meta property="twitter:description" content="Ολοκληρωμένες λογιστικές υπηρεσίες για εταιρείες, φοροσχεδιασμός και οικονομικές καταστάσεις που ανοίγουν πόρτες χρηματοδότησης." />
  <meta property="twitter:image" content="https://nerally.gr/images/logo.png" />
  
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/cookie-consent.css">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    /* Accounting page styles - using company page style as template but with our brand colors */
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

    .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
    @media(max-width:1000px){.grid-2{grid-template-columns:1fr;gap:30px}}

    .highlight{font-size:20px;font-weight:600;color:var(--brand);margin:26px 0;line-height:1.6}

    /* Callout (διακριτικό) */
    .callout{background:linear-gradient(180deg, #ffffff 0%, #f6f9ff 100%);border:1px solid #e6ecff;border-radius:16px;padding:20px 22px;box-shadow:0 8px 24px rgba(0,0,0,.06)}
    .callout .quote{font-style:italic;color:#3b4b6a;margin-bottom:8px}
    .callout p{margin:0;color:#5b6b7b}

    /* Services checklist (διπλή στήλη) */
    .services{display:grid;gap:14px;margin:6px 0 8px;grid-template-columns:1fr}
    @media (min-width:860px){.services{grid-template-columns:1fr 1fr}}
    .service{display:flex;align-items:flex-start;gap:10px}
    .service p{margin:0;color:#111827;line-height:1.6}
    .service strong{color:#111827}
    
    /* Features checklist (διπλή στήλη, χωρίς βαριά κουτιά) */
    .features{display:grid;gap:18px;margin:6px 0 8px;grid-template-columns:1fr}
    @media (min-width:860px){.features{grid-template-columns:1fr 1fr}}
    .feature{display:flex;align-items:flex-start;gap:10px}
    .feature p{margin:0;color:#111827;line-height:1.6}
    .feature strong{color:#111827}
    
    .check{flex:0 0 24px;width:24px;height:24px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#e6f2ff;border:1px solid #cfe3ff;color:var(--brand);margin-top:2px}
    .check svg{width:14px;height:14px}

    /* Split layout */
    .split{display:grid;grid-template-columns:1.3fr .9fr;gap:28px;align-items:start;margin-top:10px}
    @media (max-width:860px){.split{grid-template-columns:1fr}}

    .muted{color:#5b6b7b}

    /* Hero Section - Clean Animation Style */
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

    /* content */
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
    
    @media(max-width:768px){
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
  </style>
  
  <?php
  // Schema Markup for SEO
  $serviceData = [
    'name' => 'Λογιστική Εταιρειών',
    'description' => 'Ολοκληρωμένες λογιστικές υπηρεσίες για εταιρείες: φοροσχεδιασμός, οικονομικές καταστάσεις, λογιστική διαχείριση, φορολογικές δηλώσεις και συμβουλευτικές υπηρεσίες για επιχειρήσεις κάθε μεγέθους.',
    'url' => 'https://nerally.gr/ipiresies/logistiki.php',
    'serviceType' => 'Accounting and Bookkeeping Services',
    'offers' => [
      '@type' => 'Offer',
      'availability' => 'https://schema.org/InStock',
      'priceSpecification' => [
        '@type' => 'PriceSpecification',
        'priceCurrency' => 'EUR',
        'price' => 'Contact for pricing'
      ]
    ]
  ];
  include $_SERVER['DOCUMENT_ROOT'].'/partials/schema-service.php';
  ?>
  
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
        <h2>Λογιστική Εταιρειών</h2>

        <div class="split">
          <div><p>Για πολλούς, η λογιστική περιορίζεται στην εμπρόθεσμη υποβολή δηλώσεων. Για τη <strong>Nerally</strong>, είναι το εργαλείο που αποτυπώνει την πραγματική εικόνα της επιχείρησης και καθοδηγεί κάθε στρατηγικό της βήμα. Με σωστά και έγκαιρα δεδομένα, ο επιχειρηματίας μπορεί να γνωρίζει πού βρίσκεται, να σχεδιάζει το μέλλον του και να αποφεύγει περιττά κόστη και ρίσκα.</p>
          </div>
          <aside class="callout">
            <div class="quote">«Σύμμαχοι της νέας εποχής»</div>
            <p class="muted">Στόχος μας είναι να δίνουμε χώρο στον επαγγελματία να αναπτύσσεται, αναλαμβάνοντας όσα τον βαραίνουν.</p>
          </aside>
        </div>

        <h3>Η προσέγγισή μας</h3>
        <p class="muted">Το ελληνικό πλαίσιο είναι σύνθετο και αλλάζει συνεχώς (myDATA, ηλεκτρονικά βιβλία, πλατφόρμες ΑΑΔΕ). Στη <strong>Nerally</strong> το έχουμε ενσωματώσει σε τεκμηριωμένες διαδικασίες και ελέγχους ποιότητας, ώστε η συμμόρφωση να είναι <strong>σταθερά εξασφαλισμένη</strong>. Έτσι, αφιερώνουμε τον χρόνο μας εκεί όπου δημιουργείται αξία: στον σωστό φοροσχεδιασμό, στο ακριβές reporting και στις οικονομικές καταστάσεις που ανοίγουν πόρτες χρηματοδότησης.</p>
        <p>Έχουμε συγκεντρώσει την <strong>κατάλληλη ομάδα</strong> εξειδικευμένων επαγγελματιών, με εμπειρία στη λογιστική &amp; φορολογία, στον εσωτερικό έλεγχο και στη χρηματοοικονομική ανάλυση. Η συνεχής εκπαίδευση και η τεχνογνωσία μας εξασφαλίζουν σταθερότητα και σιγουριά, ακόμη και στο πιο απαιτητικό περιβάλλον.</p>

        <h3>Τι προσφέρουμε</h3>
        <div class="services">
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Σύσταση/ίδρυση επιχείρησης</strong> (Ατομική, ΙΚΕ, ΕΠΕ, ΑΕ) &amp; επιλογή κατάλληλης νομικής μορφής.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Μετατροπές &amp; μεταβολές</strong> (ΓΕΜΗ/ΔΟΥ), τροποποιήσεις καταστατικών, μεταβιβάσεις.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Τήρηση βιβλίων</strong> απλογραφικών &amp; διπλογραφικών, απογραφή, συμφωνίες, ισοζύγια.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>myDATA &amp; ηλεκτρονικά βιβλία</strong>: διαβίβαση, συμφωνία, αυτοματισμοί.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Υποβολή δηλώσεων</strong> (ΦΠΑ, εισοδήματος, παρακρατούμενοι, ΦΜΥ, τέλη, συγκεντρωτικές).</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Μισθοδοσία &amp; εργατικά</strong>: προσλήψεις/αποχωρήσεις, ΕΡΓΑΝΗ, συμβάσεις, υποχρεώσεις.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Οικονομικές καταστάσεις</strong> (Ισολογισμός, Αποτελέσματα, Προσαρτήματα) &amp; δημοσιεύσεις.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Intrastat &amp; VIES</strong>, ενδοκοινοτικές συναλλαγές.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Υποστήριξη σε ελέγχους</strong>: προετοιμασία φακέλων, παραστάσεις, διευκρινίσεις.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Μηνιαίο/τριμηνιαίο reporting</strong> &amp; dashboards.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Προϋπολογισμοί &amp; ταμειακές ροές</strong> (budgeting &amp; cash flow).</p>
          </div>
        </div>

        <h3>Πού διαφοροποιούμαστε;</h3>
        <div class="features">
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Φοροσχεδιασμός που προλαμβάνει, δεν ακολουθεί.</strong></p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Reporting που "μιλά"</strong> σε διοίκηση, τράπεζες και επενδυτές.</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Οικονομικές καταστάσεις που εμπνέουν εμπιστοσύνη</strong> και διευκολύνουν τη χρηματοδότηση.</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Αφοσιωμένη ομάδα δίπλα σας,</strong> με γνώση του κλάδου σας.</p>
          </div>
        </div>

        <h3>Το όραμά μας</h3>
        <p>Να μετατρέψουμε τη λογιστική από «υποχρέωση» σε <strong>στρατηγικό πλεονέκτημα</strong> και σταθερό μοχλό ανάπτυξης για κάθε επιχείρηση που συνεργάζεται μαζί μας.</p>

        <div class="callout" style="margin-top:14px;">
          <div class="quote">«Η συμμόρφωση είναι σταθερά εξασφαλισμένη — η αξία βρίσκεται στη στρατηγική, στα καθαρά δεδομένα και στην ανάπτυξη.»</div>
          <p class="muted" style="margin:0;"><em>Η ομάδα της Nerally</em></p>
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
    const headline = document.getElementById('headline');
    const row = document.getElementById('row');
    const flipEl = document.getElementById('flip');

    function wait(ms) { return new Promise(r => setTimeout(r, ms)); }
    
    function flipTo(text) {
      flipEl.classList.remove('enter');
      void flipEl.offsetWidth;
      flipEl.textContent = text;
      flipEl.classList.add('enter');
    }

    (async function run() {
      headline.textContent = 'NERALLY';
      await wait(1200);
      headline.innerHTML = 'N' + '<span class="gap g1"></span>' + 'ER' + '<span class="gap g2"></span>' + 'ALLY';
      await wait(1600);
      headline.querySelector('.g1').innerHTML = '<span class="rise">EW&nbsp;</span>';
      await wait(600);
      headline.querySelector('.g2').innerHTML = '<span class="rise">A&nbsp;</span>';
      await wait(1400);
      headline.innerHTML = '<b>NEW ERA</b> ALLY';

      const words = ['LLY', 'ΛΟΓΙΣΤΙΚΗ', 'ΣΥΜΜΟΡΦΩΣΗ', 'ΣΤΡΑΤΗΓΙΚΗ', 'ΑΝΑΠΤΥΞΗ', 'REPORTING', 'ΦΟΡΟΣΧΕΔΙΑΣΜΟΣ', 'ΟΙΚΟΝΟΜΙΚΑ', 'ΑΝΑΛΥΣΗ', 'ΕΛΕΓΧΟΣ'];
      let i = 0;
      flipTo(words[i++ % words.length]);
      setInterval(() => flipTo(words[i++ % words.length]), 1900);
    })();
  </script>
</body>
</html>




