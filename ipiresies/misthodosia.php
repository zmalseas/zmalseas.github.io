<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nerally - Υπηρεσίες Μισθοδοσίας</title>
  <meta name="description" content="Ολοκληρωμένες υπηρεσίες μισθοδοσίας, διαχείρισης προσωπικού και εργατικής νομοθεσίας από τη Nerally." />
  <meta name="keywords" content="μισθοδοσία, HR, ανθρώπινο δυναμικό, εργατική νομοθεσία, ασφαλιστικές εισφορές, ΕΡΓΑΝΗ, ΕΦΚΑ, Nerally" />
  <meta name="author" content="Nerally" />
  <link rel="canonical" href="https://nerally.gr/ipiresies/misthodosia.php" />
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://nerally.gr/ipiresies/misthodosia.php" />
  <meta property="og:title" content="Υπηρεσίες Μισθοδοσίας - Nerally | Σύμμαχος Νέας Εποχής" />
  <meta property="og:description" content="Ολοκληρωμένη διαχείριση μισθοδοσίας, εργατικής νομοθεσίας και προσωπικού με ακρίβεια και συμμόρφωση." />
  <meta property="og:image" content="https://nerally.gr/images/logo.png" />
  <meta property="og:locale" content="el_GR" />
  
  <!-- Twitter -->
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:url" content="https://nerally.gr/ipiresies/misthodosia.php" />
  <meta property="twitter:title" content="Υπηρεσίες Μισθοδοσίας - Nerally | Σύμμαχος Νέας Εποχής" />
  <meta property="twitter:description" content="Ολοκληρωμένη διαχείριση μισθοδοσίας, εργατικής νομοθεσίας και προσωπικού με ακρίβεια και συμμόρφωση." />
  <meta property="twitter:image" content="https://nerally.gr/images/logo.png" />
  
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/cookie-consent.css">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    /* Company page styles */
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
    'name' => 'Υπηρεσίες Μισθοδοσίας',
    'description' => 'Ολοκληρωμένη διαχείριση μισθοδοσίας, εργατικής νομοθεσίας και προσωπικού: υπολογισμός αποδοχών, ΕΡΓΑΝΗ, ασφαλιστικές εισφορές, συμβουλευτική σε εργατικά θέματα και πλήρης συμμόρφωση.',
    'url' => 'https://nerally.gr/ipiresies/misthodosia.php',
    'serviceType' => 'Human Resources Services',
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
        <h2>Υπηρεσίες Μισθοδοσίας</h2>

        <div class="split">
          <div>
            <p>Η μισθοδοσία είναι ένα από τα πιο ευαίσθητα και καθοριστικά κομμάτια της λειτουργίας κάθε επιχείρησης. Δεν αφορά απλώς την πληρωμή των εργαζομένων, αλλά αντικατοπτρίζει τη σχέση εμπιστοσύνης ανάμεσα σε εργοδότη και προσωπικό. Ένα μικρό λάθος μπορεί να προκαλέσει σημαντικές συνέπειες – τόσο σε ανθρώπινο όσο και σε οικονομικό επίπεδο.</p>
            <p>Στη <strong>Nerally</strong>, γνωρίζουμε ότι τα λάθη στη μισθοδοσία μπορούν να κοστίσουν ακριβά: από πρόστιμα χιλιάδων ευρώ λόγω παραβάσεων εργατικής νομοθεσίας, μέχρι αχρείαστες επιβαρύνσεις από λανθασμένες εισφορές ή φόρους (ΦΜΥ, ΑΠΔ, ταμεία). Ακόμη και μια μικρή παράλειψη μπορεί να μεταφραστεί σε φορολογική επιβάρυνση για τον εργαζόμενο ή σε απώλεια πόρων για την επιχείρηση.</p>
          </div>
          <aside class="callout">
            <div class="quote">«Σύμμαχοι της νέας εποχής»</div>
            <p class="muted">Στόχος μας είναι να δίνουμε χώρο στον επαγγελματία να αναπτύσσεται, αναλαμβάνοντας όσα τον βαραίνουν.</p>
          </aside>
        </div>

        <p>Η ομάδα μας αναλαμβάνει πλήρως τη διαχείριση και παρακολούθηση της μισθοδοσίας, από τον υπολογισμό έως την υποβολή δηλώσεων και την εκπροσώπηση σε φορείς (ΕΡΓΑΝΗ, ΕΦΚΑ, ΑΑΔΕ). Με εμπειρία σε κάθε μορφή απασχόλησης — πλήρους, μερικής, εκ περιτροπής, τεκμαρτής ή με πρόσθετες αποδοχές — εξασφαλίζουμε ότι κάθε εργαζόμενος αμείβεται δίκαια και σωστά, ενώ η επιχείρησή σας λειτουργεί με ασφάλεια και συμμόρφωση.</p>
        
        <p>Παρέχουμε επίσης συμβουλευτική στην εργατική νομοθεσία, καθοδήγηση στη διαχείριση θεμάτων προσωπικού και προνοούμε για πιθανές διενέξεις, ώστε να αποφύγετε καταγγελίες, δικαστικές εμπλοκές και δυσάρεστες συνέπειες.</p>
        
        <p>Η Nerally στέκεται δίπλα σας ως πραγματικός σύμμαχος: φροντίζουμε τη μισθοδοσία σας να είναι ορθή, έγκαιρη και πλήρως τεκμηριωμένη — γιατί κάθε σωστή πληρωμή είναι και μια πράξη εμπιστοσύνης.</p>

        <h3>Τι προσφέρουμε</h3>
        <div class="services">
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Υπολογισμός &amp; Έκδοση Μισθοδοσίας:</strong> Ορθός υπολογισμός αποδοχών για κάθε μορφή απασχόλησης (πλήρους, μερικής, εκ περιτροπής, τεκμαρτής), προσαρμοσμένος σε κάθε ειδικότητα και κατηγορία εργαζομένου. Κατάθεση όλων των ασφαλιστικών και φορολογικών υποχρεώσεων (ΑΠΔ, ΦΜΥ, ταμεία).</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Συμβουλευτική στην Εργατική Νομοθεσία:</strong> Παρέχουμε συνεχή ενημέρωση και καθοδήγηση στις εργατικές αλλαγές και στις συλλογικές συμβάσεις. Στόχος μας είναι να έχετε την απαιτούμενη ευελιξία εντός του νόμου, με τον πιο αποδοτικό και ασφαλή τρόπο.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Διαχείριση Προσωπικού &amp; ΕΡΓΑΝΗ:</strong> Αναλαμβάνουμε την κατάθεση όλων των απαραίτητων εντύπων (προσλήψεις, αποχωρήσεις, ωράρια, άδειες, ρεπό, ασθένειες) και τη συμμόρφωση με το ΠΣ ΕΡΓΑΝΗ. Διασφαλίζουμε την αποφυγή παραλείψεων και προστίμων.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Εκπροσώπηση &amp; Υποστήριξη:</strong> Σε περίπτωση ελέγχων ή καταγγελιών σε ΣΕΠΕ, ΕΦΚΑ ή άλλους φορείς, παρέχουμε πλήρη υποστήριξη και καθοδήγηση. Στόχος μας είναι να προλαμβάνουμε, όχι να θεραπεύουμε.</p>
          </div>
        </div>

        <div class="callout" style="margin-top:40px;">
          <div class="quote">«Η συμμόρφωση είναι σταθερά εξασφαλισμένη — η αξία βρίσκεται στους ανθρώπους, στα καθαρά δεδομένα και στη συνέπεια που δημιουργεί εμπιστοσύνη.»</div>
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

      const words = ['LLY', 'ΜΙΣΘΟΔΟΣΙΑ', 'ΣΥΜΜΟΡΦΩΣΗ', 'ΕΡΓΑΝΗ', 'ΕΦΚΑ', 'ΕΡΓΑΤΙΚΑ', 'ΑΠΟΔΟΧΕΣ', 'ΑΠΔ', 'ΦΜΥ', 'ΠΡΟΣΩΠΙΚΟ'];
      let i = 0;
      flipTo(words[i++ % words.length]);
      setInterval(() => flipTo(words[i++ % words.length]), 1900);
    })();
  </script>
</body>
</html>
  <meta name="description" content="Ολοκληρωμένες υπηρεσίες μισθοδοσίας, διαχείρισης ανθρώπινου δυναμικού και εργατικής νομοθεσίας από την Nerally." />
  <meta name="keywords" content="μισθοδοσία, HR, ανθρώπινο δυναμικό, εργατική νομοθεσία, ασφαλιστικές εισφορές, Nerally" />
  <meta name="author" content="Nerally" />
  <link rel="canonical" href="https://nerally.gr/ipiresies/misthodosia.php" />
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://nerally.gr/ipiresies/misthodosia.php" />
  <meta property="og:title" content="Υπηρεσίες Μισθοδοσίας & HR - Nerally" />
  <meta property="og:description" content="Ολοκληρωμένες υπηρεσίες μισθοδοσίας, διαχείρισης ανθρώπινου δυναμικού και εργατικής νομοθεσίας." />
  <meta property="og:image" content="https://nerally.gr/images/logo.png" />
  <meta property="og:locale" content="el_GR" />
  
  <!-- Twitter -->
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:url" content="https://nerally.gr/ipiresies/misthodosia.php" />
  <meta property="twitter:title" content="Υπηρεσίες Μισθοδοσίας & HR - Nerally" />
  <meta property="twitter:description" content="Ολοκληρωμένες υπηρεσίες μισθοδοσίας, διαχείρισης ανθρώπινου δυναμικού και εργατικής νομοθεσίας." />
  <meta property="twitter:image" content="https://nerally.gr/images/logo.png" />
  
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />

  <?php
  $serviceData = [
    'name' => 'Υπηρεσίες Μισθοδοσίας & HR',
    'description' => 'Ολοκληρωμένη διαχείριση μισθοδοσίας, ανθρώπινου δυναμικού και εργατικής νομοθεσίας με ακρίβεια και συμμόρφωση. Υπολογισμός μισθοδοσίας, ασφαλιστικές εισφορές, διαχείριση προσωπικού, εργατικές συμβάσεις και πλήρης τήρηση εργατικής νομοθεσίας.',
    'url' => 'https://nerally.gr/ipiresies/misthodosia.php',
    'serviceType' => 'Human Resources'
  ];
  include $_SERVER['DOCUMENT_ROOT'].'/partials/schema-service.php';
  ?>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <main class="main-content">
    <section class="hero">
      <div class="container">
        <h1>Υπηρεσίες Μισθοδοσίας & HR</h1>
        <p>Ολοκληρωμένη διαχείριση μισθοδοσίας, ανθρώπινου δυναμικού και εργατικής νομοθεσίας με ακρίβεια και συμμόρφωση.</p>
        <a class="btn btn-primary" href="#services">Δείτε τις υπηρεσίες μας</a>
      </div>
    </section>

    <section class="section" id="services">
      <div class="container">
        <h2>Οι Υπηρεσίες μας</h2>
        <div class="services-list">
          <div class="service-item">
            <h3>💰 Διαχείριση Μισθοδοσίας</h3>
            <p>Πλήρης διαχείριση της μισθοδοσίας σας με ακρίβεια και έγκαιρη καταβολή μισθών, επιδομάτων και αποζημιώσεων.</p>
            <ul>
              <li>Υπολογισμός μισθών και επιδομάτων</li>
              <li>Διαχείριση υπερωριών και αδειών</li>
              <li>Εκκαθάριση μισθοδοσίας</li>
              <li>Παρακολούθηση εργάσιμων ημερών</li>
            </ul>
          </div>
          
          <div class="service-item">
            <h3>🏛️ Ασφαλιστικές Εργασίες</h3>
            <p>Διαχείριση όλων των ασφαλιστικών υποχρεώσεων και εισφορών για τους εργαζόμενούς σας.</p>
            <ul>
              <li>Υποβολή ΑΠΔ (Αναλυτικές Περιοδικές Δηλώσεις)</li>
              <li>Διαχείριση ασφαλιστικών εισφορών</li>
              <li>Συνταξιοδοτικές διαδικασίες</li>
              <li>Ιατροφαρμακευτική περίθαλψη</li>
            </ul>
          </div>
          
          <div class="service-item">
            <h3>📋 Εργατική Νομοθεσία</h3>
            <p>Συμβουλευτική και υποστήριξη για πλήρη συμμόρφωση με την εργατική νομοθεσία.</p>
            <ul>
              <li>Σύνταξη συμβάσεων εργασίας</li>
              <li>Διαχείριση προσλήψεων και απολύσεων</li>
              <li>Συμμόρφωση με εργατικό δίκαιο</li>
              <li>Διαχείριση επιθεωρήσεων εργασίας</li>
            </ul>
          </div>
          
          <div class="service-item">
            <h3>👥 HR Consulting</h3>
            <p>Στρατηγικές υπηρεσίες ανθρώπινου δυναμικού για τη βελτιστοποίηση της ομάδας σας.</p>
            <ul>
              <li>Σχεδιασμός οργανογράμματος</li>
              <li>Πολιτικές ανθρώπινου δυναμικού</li>
              <li>Αξιολόγηση απόδοσης</li>
              <li>Προγράμματα εκπαίδευσης</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section features-section">
      <div class="container">
        <h2>Γιατί να Επιλέξετε τη Nerally</h2>
        <div class="features-grid">
          <div class="feature-item">
            <div class="feature-icon">✅</div>
            <h3>Πλήρης Συμμόρφωση</h3>
            <p>Εξασφαλίζουμε 100% συμμόρφωση με την ισχύουσα εργατική και ασφαλιστική νομοθεσία.</p>
          </div>
          
          <div class="feature-item">
            <div class="feature-icon">⏰</div>
            <h3>Έγκαιρη Εξυπηρέτηση</h3>
            <p>Όλες οι εργασίες ολοκληρώνονται εγκαίρως και με απόλυτη ακρίβεια.</p>
          </div>
          
          <div class="feature-item">
            <div class="feature-icon">💼</div>
            <h3>Εξειδικευμένη Ομάδα</h3>
            <p>Έμπειροι HR specialists και νομικοί σύμβουλοι στη διάθεσή σας.</p>
          </div>
          
          <div class="feature-item">
            <div class="feature-icon">🔒</div>
            <h3>Απόλυτη Εμπιστευτικότητα</h3>
            <p>Τα στοιχεία της επιχείρησής σας προστατεύονται με απόλυτη ασφάλεια.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section cta-section">
      <div class="container" id="contact">
        <h2>Ξεκινήστε Σήμερα</h2>
        <p>Αναθέστε μας τη διαχείριση της μισθοδοσίας σας και εστιάστε στην ανάπτυξη της επιχείρησής σας.</p>
        <div class="contact-info">
          <p>📧 Email: <a href="mailto:info@nerally.gr">info@nerally.gr</a></p>
          <p>📞 Τηλέφωνο: <a href="tel:+306946365798">+30 694 636 5798</a></p>
        </div>
        <div class="cta-buttons">
          <a href="../epikoinonia/contact.php" class="btn btn-primary">Επικοινωνήστε μαζί μας</a>
          <a href="mailto:info@nerally.gr" class="btn btn-secondary">Στείλτε Email</a>
        </div>
      </div>
    </section>
  </main>

  <!-- Structured Data -->
  <script<?php echo isset($nonce_attr) ? $nonce_attr : ''; ?> type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Υπηρεσίες Μισθοδοσίας & HR",
    "description": "Ολοκληρωμένες υπηρεσίες μισθοδοσίας, διαχείρισης ανθρώπινου δυναμικού και εργατικής νομοθεσίας",
    "provider": {
      "@type": "Organization",
      "name": "Nerally",
      "url": "https://nerally.gr",
      "logo": "https://nerally.gr/images/logo.png"
    },
    "serviceType": "Human Resources Services",
    "areaServed": "Greece",
    "availableLanguage": "Greek"
  }
  </script>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  
  

    <script src="/js/navigation.js"></script>
    <script src="/js/cookie-consent.js"></script>
    <script src="/js/chat-widget.js"></script>
    <script src="../app.js" defer></script>
</body>
</html>





