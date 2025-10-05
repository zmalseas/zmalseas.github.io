<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nerally — Σύμμαχος Νέας Εποχής | Εταιρεία</title>
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/cookie-consent.css">
  <link rel="stylesheet" href="/css/legal-modal.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    /* Company page specific styles - using our brand colors */
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
    .company-section p{line-height:1.8;font-size:18px;margin:0 0 18px;color:#111827}

    .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
    @media(max-width:1000px){.grid-2{grid-template-columns:1fr;gap:30px}}

    .highlight{font-size:20px;font-weight:600;color:var(--brand);margin:26px 0;line-height:1.6}

    .values{display:flex;flex-wrap:wrap;justify-content:space-between;gap:24px;margin-top:30px;overflow-x:hidden;padding-bottom:10px}
    .value{
      flex:1 1 calc(25% - 24px);
      min-width:220px;
      padding:28px;
      border:1px solid var(--muted);
      border-radius:var(--radius-xl);
      background:#f9fbff;
      transition:all 0.35s ease;
      display:flex;
      flex-direction:column;
      align-items:center;
      text-align:center;
      position:relative;
      cursor:default;
      box-shadow:var(--shadow-sm);
    }
    .value:hover{
      background:#fff;
      box-shadow:var(--shadow-xl);
      transform:translateY(-6px) scale(1.02);
    }
    .value-icon{margin-bottom:12px;transition:transform .3s ease, stroke .3s ease}
    .value:hover .value-icon{transform:scale(1.15);stroke:var(--brand-dark)}
    .value-icon svg{width:46px;height:46px;stroke:var(--brand);fill:none;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
    .value h3{margin:0 0 8px;font-size:18px;color:var(--brand)}
    .value p{margin:0;font-size:16px;color:#374151}

    .why{display:grid;grid-template-columns:1fr 1fr;gap:40px;margin-top:10px}
    @media(max-width:900px){.why{grid-template-columns:1fr}}
    .why ul{list-style:none;margin:0;padding:0;display:grid;gap:14px}
    .why li{display:flex;gap:14px;align-items:flex-start;font-size:17px;line-height:1.6}
    .check{flex:0 0 26px;height:26px;border-radius:8px;background:var(--brand);color:#fff;display:grid;place-items:center;font-weight:800;font-size:16px;box-shadow:0 4px 10px rgba(41,128,185,.3)}

    /* Hero Section with background image */
    .hero {
      background: linear-gradient(rgba(41, 128, 185, 0.85), rgba(41, 128, 185, 0.85)), url('../images/etairia.webp');
      background-size: cover;
      background-position: center;
      color:white;
      text-align:center;
      padding:100px 20px;
      border-radius:0 0 40px 40px;
      box-shadow:var(--shadow-lg);
    }
    .hero img {
      width:120px;
      margin-bottom:20px;
      filter:drop-shadow(0 4px 6px rgba(0,0,0,0.2));
    }
    .hero h1 {
      font-size:clamp(32px,4vw,50px);
      margin:10px 0;
      font-weight:700;
    }
    .hero p {
      font-size:20px;
      max-width:700px;
      margin:0 auto;
      opacity:0.9;
    }
    
    /* Quote section */
    .quote{margin-top:20px;padding:24px;background:#fff;border:1px solid var(--muted);border-radius:var(--radius-xl);box-shadow:var(--shadow-md)}
    .quote blockquote{margin:0;font-size:20px;line-height:1.7;color:var(--brand)}
    .quote cite{display:block;margin-top:6px;font-size:14px;color:#64748b}
    
    .quote-box{background:radial-gradient(circle at top left,#eef4ff,#fff);border-radius:var(--radius-xl);padding:40px;box-shadow:var(--shadow-md)}
    .quote-box p{font-size:18px;color:var(--brand);margin:0}
    .quote-box p:last-child{color:#475569}
  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <header class="hero">
    <img src="../images/logo.png" alt="Nerally Logo">
    <h1>Nerally — Σύμμαχος Νέας Εποχής</h1>
    <p>Σύγχρονες λύσεις, ενιαία υποστήριξη, μία ομάδα δίπλα σε κάθε επιχείρηση.</p>
  </header>

  <main class="company-container">

    <section class="company-section">
      <p style="font-size:14px;color:#64748b;margin-bottom:10px;text-transform:uppercase;letter-spacing:1px;">Ποιοι είμαστε</p>
      <h2>Εταιρεία</h2>
      <div class="grid-2">
        <div>
          <p class="highlight">Το όνομά μας αποτυπώνει τη φιλοσοφία μας: να είμαστε στο πλευρό κάθε επιχείρησης.</p>
          <p>Η νέα εποχή επιτάσσει πολλά: σωστή λογιστική οργάνωση και φορολογικό σχεδιασμό, ασφαλή ψηφιακή παρουσία και στρατηγική προβολή στα social media, τεχνολογική προστασία και συμμόρφωση, καθώς και πρόσβαση σε νέες χρηματοδοτήσεις. Πρόκειται για τομείς που συχνά δυσκολεύουν τον επαγγελματία — και δεν είναι υποχρεωμένος να τα ξέρει όλα.</p>
          <p><strong>Εκεί ερχόμαστε εμείς.</strong> Η Nerally συγκεντρώνει μια ομάδα έμπειρων και καταρτισμένων επαγγελματιών από διαφορετικούς κλάδους και λειτουργεί ως οικοσύστημα συνεργασίας. Ο καθένας μας φέρνει τη δική του εξειδίκευση, όμως όλοι μαζί δημιουργούμε ένα κοινό πλαίσιο: αναλαμβάνουμε όσα επιβαρύνουν τον επαγγελματία, ώστε εκείνος να μπορεί να επικεντρωθεί στη δουλειά του με ασφάλεια και σιγουριά.</p>
        </div>
        <div class="quote-box">
          <p style="margin-bottom:12px"><em>«Σύμμαχοι της νέας εποχής»</em></p>
          <p>Στόχος μας είναι να δίνουμε χώρο στον επαγγελματία να αναπνέει, αναλαμβάνοντας όλα όσα τον βαραίνουν.</p>
        </div>
      </div>
    </section>

    <section class="company-section">
      <div class="grid-2">
        <div>
          <h2>Η Αποστολή μας</h2>
          <p>Να στεκόμαστε στο πλευρό κάθε επιχείρησης ως σύμμαχοι της νέας εποχής, προσφέροντας υποστήριξη, εξειδίκευση και λύσεις που απλοποιούν την καθημερινότητα και ενισχύουν την ανάπτυξη.</p>
        </div>
        <div>
          <h2>Το Όραμά μας</h2>
          <p>Να αποτελούμε τον βασικό στρατηγικό συνεργάτη κάθε επιχείρησης που θέλει να εξελίσσεται, να καινοτομεί και να διασφαλίζει τη βιωσιμότητά της σε ένα απαιτητικό επιχειρηματικό περιβάλλον.</p>
        </div>
      </div>
    </section>

    <section class="company-section">
      <h2>Οι Αξίες μας</h2>
      <div class="values">
        <div class="value"><div class="value-icon" aria-hidden="true">
          <svg viewBox="0 0 48 48" role="img">
            <circle cx="15" cy="18" r="4"/>
            <circle cx="33" cy="18" r="4"/>
            <path d="M6 34 c0-6 6-10 9-10 h18 c3 0 9 4 9 10"/>
          </svg>
        </div><h3>Συνεργασία</h3><p>Μαζί επιτυγχάνουμε περισσότερα.</p></div>
        <div class="value"><div class="value-icon" aria-hidden="true">
          <svg viewBox="0 0 48 48">
            <path d="M24 6 l14 6 v9 c0 9 -7 15 -14 21 c-7 -6 -14 -12 -14 -21 v-9 z"/>
            <polyline points="17,25 22,30 31,20"/>
          </svg>
        </div><h3>Αξιοπιστία</h3><p>Σχέσεις εμπιστοσύνης με διαφάνεια και συνέπεια.</p></div>
        <div class="value"><div class="value-icon" aria-hidden="true">
          <svg viewBox="0 0 40 40">
            <circle cx="20" cy="15" r="8"/>
            <path d="M16 23 v3 a4 4 0 0 0 8 0 v-3"/>
            <path d="M16 30 h8"/>
          </svg>
        </div><h3>Εξειδίκευση</h3><p>Έμπειροι επαγγελματίες με αποδεδειγμένη τεχνογνωσία.</p></div>
        <div class="value"><div class="value-icon" aria-hidden="true">
          <svg viewBox="0 0 40 40">
            <path d="M6 30 h28"/>
            <polyline points="8,26 16,20 22,24 32,14"/>
            <path d="M27 14 h5 v5"/>
          </svg>
        </div><h3>Ανάπτυξη</h3><p>Στρατηγικές που οδηγούν σε πραγματικά και μετρήσιμα αποτελέσματα.</p></div>
      </div>
    </section>

    <section class="company-section">
      <h2>Γιατί Εμάς</h2>
      <div class="why">
        <ul>
          <li><span class="check">✓</span><span><strong>Ένας συνεργάτης, όλες οι λύσεις:</strong> από λογιστικά και μισθοδοσία έως marketing, cyber security και τεχνικές υπηρεσίες.</span></li>
          <li><span class="check">✓</span><span><strong>Ολιστική προσέγγιση:</strong> δεν βλέπουμε μεμονωμένα τις ανάγκες — σχεδιάζουμε στρατηγικά για το σύνολο της επιχείρησης.</span></li>
          <li><span class="check">✓</span><span><strong>Εμπειρία & τεχνογνωσία:</strong> ομάδα με πολυετή εμπειρία σε διαφορετικούς κλάδους.</span></li>
        </ul>
        <ul>
          <li><span class="check">✓</span><span><strong>Ασφάλεια & εμπιστοσύνη:</strong> συμμόρφωση, προστασία δεδομένων και ξεκάθαρη επικοινωνία.</span></li>
          <li><span class="check">✓</span><span><strong>Στρατηγική ανάπτυξης:</strong> δεν καλύπτουμε μόνο τα βασικά — βοηθάμε την επιχείρηση να εξελιχθεί και να ξεχωρίσει.</span></li>
        </ul>
      </div>
    </section>

    <section class="company-section">
      <div class="quote">
        <blockquote>«Η επιτυχία δεν είναι ατομική υπόθεση — είναι <span style="color:var(--brand);font-weight:bold">συνεργασία</span>. Εμείς αναλαμβάνουμε την πολυπλοκότητα, για να εστιάσετε σε ό,τι έχει αξία.»</blockquote>
        <cite>Η ομάδα της Nerally</cite>
      </div>
    </section>

  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  
  <script src="/js/legal-modal.js"></script>
  <script src="/js/cookie-consent.js"></script>
  <script src="../app.js"></script>
</body>
</html>





