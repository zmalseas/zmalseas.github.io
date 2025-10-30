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

    /* Additional sections styling */
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
    
    .distinction-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin: 24px 0;
    }
    
    .distinction-box {
      background: white;
      border: 2px solid #e6ecff;
      border-radius: 12px;
      padding: 20px;
      text-align: left;
    }
    
    .distinction-box h4 {
      margin: 0 0 12px;
      font-size: 17px;
      color: var(--brand);
      font-weight: 700;
    }
    
    .distinction-box p {
      margin: 0;
      font-size: 15px;
      line-height: 1.6;
      color: #4a5568;
    }
    
    /* Reporting section - centered with 2 columns on desktop */
    .reporting-container {
      max-width: 900px;
      margin: 24px auto;
    }
    
    .reporting-box {
      background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
      border: 1px solid #e6ecff;
      border-radius: 14px;
      padding: 24px;
      box-shadow: 0 4px 16px rgba(0,0,0,.04);
    }
    
    .reporting-box h4 {
      margin: 0 0 16px;
      font-size: 19px;
      color: var(--brand);
      font-weight: 700;
    }
    
    .reporting-box ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }
    
    .reporting-box li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      color: #111827;
      line-height: 1.6;
    }
    
    .reporting-box li span {
      color: #111827;
    }
    
    .reporting-box li strong {
      color: #111827;
      font-weight: 600;
    }
    
    @media(max-width:768px) {
      .section-grid {
        grid-template-columns: 1fr;
      }
      .distinction-grid {
        grid-template-columns: 1fr;
      }
      .reporting-box ul {
        grid-template-columns: 1fr;
      }
    }

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

        <h3 style="margin-top:48px;">Αναλυτικές Υπηρεσίες</h3>
        
        <div class="section-grid">
          <div class="section-box">
            <h4>Οργάνωση – Εκτίμηση μισθοδοσίας</h4>
            <ul>
              <li>
                <span class="blue-check">✓</span>
                <span>Καταγραφή προσωπικού, συμβάσεων & στοιχείων αμοιβών.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span>Έλεγχος ορθής εφαρμογής συλλογικής σύμβασης.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span>Σχεδιασμός πολιτικών υπερωριών, βαρδιών, bonus, παροχών.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span>Διασύνδεση με λογιστήριο & οικονομική διεύθυνση.</span>
              </li>
            </ul>
          </div>

          <div class="section-box">
            <h4>Μηνιαία/περιοδική μισθοδοσία</h4>
            <ul>
              <li>
                <span class="blue-check">✓</span>
                <span>Υπολογισμός μισθών, ημερομισθίων, υπερωριών & επιδομάτων.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span>Υποβολή ΑΠΔ & λοιπών αρχείων σε ΕΦΚΑ/Εργάνη.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span>Έκδοση αναλυτικών αποδείξεων & αρχείου τραπεζών.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span>Διαχείριση αδειών, ασθενειών, επιδομάτων μητρότητας.</span>
              </li>
            </ul>
          </div>

          <div class="section-box">
            <h4>Μεταβολές προσωπικού</h4>
            <ul>
              <li>
                <span class="blue-check">✓</span>
                <span>Προσλήψεις: απαιτήσεις, στοιχεία & αποζημιώσεις.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span>Αλλαγές ωραρίων, εξαιρέσεων, αποδοχών.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span>Υποβολές στο ΕΡΓΑΝΗ (έντυπα Ε3, Ε4, κ.λπ.).</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span>Ενημέρωση για προγράμματα/επιδότηση εργασίας.</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="reporting-container">
          <div class="reporting-box">
            <h4>Reporting & συμμόρφωση</h4>
            <ul>
              <li>
                <span class="blue-check">✓</span>
                <span><strong>Μισθολογικά reports</strong> για διοίκηση, ορκωτούς, τράπεζες.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span><strong>Κοστολόγηση προσωπικού</strong> ανά τμήμα/έργο.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span><strong>Προετοιμασία φακέλων</strong> για ελέγχους ΣΕΠΕ/ΕΦΚΑ.</span>
              </li>
              <li>
                <span class="blue-check">✓</span>
                <span><strong>Αρχειοθέτηση & ασφάλεια</strong> προσωπικών δεδομένων (GDPR).</span>
              </li>
            </ul>
          </div>
        </div>

        <h3 style="margin-top:48px;">Πού διαφοροποιούμαστε;</h3>
        <div class="distinction-grid">
          <div class="distinction-box">
            <h4>Προλαβαίνουμε, δεν «σβήνουμε φωτιές».</h4>
            <p>Παρακολουθούμε καθημερινά τις προθεσμίες και τις αλλαγές, ώστε να μην εκπροσωπούμε σε κρίσεις – με ενιαία γνώμη επικοινωνίας.</p>
          </div>
          <div class="distinction-box">
            <h4>Μιλάμε με τους ανθρώπους σας.</h4>
            <p>Μπορούμε να απαντάμε απευθείας σε εργαζομένους/συνεταίρους για θέματα μισθού, αδειών ή κρατήσεων – με ενιαία γραμμή επικοινωνίας.</p>
          </div>
          <div class="distinction-box">
            <h4>Διαφάνεια κόστους.</h4>
            <p>Δίνουμε κάθε είδους του συνολικού μισθολογικού κόστους ανά μήνα και βοηθάμε στον προϋπολογισμό.</p>
          </div>
          <div class="distinction-box">
            <h4>Τεχνολογία & αυτοματισμοί.</h4>
            <p>Λειτουργούμε με ψηφιακή υποδομή, αποστολή αποδείξεων σε πλατφόρμα και διασύνδεση με τραπεζικό σύστημα.</p>
          </div>
        </div>

        <div class="callout" style="margin-top:40px;")>
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
