<!DOCTYPE html><!DOCTYPE html>

<html lang="el"><html lang="el">

<head><head>

  <meta charset="UTF-8">  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ομάδα — Nerally</title>  <title>Η Ομάδα μας - Nerally</title>

  <link rel="icon" type="image/png" href="../images/logo.png" />  <link rel="icon" type="image/png" href="../images/logo.png" />

  <link rel="stylesheet" href="../main.css">  <link rel="stylesheet" href="../main.css">

  <link rel="stylesheet" href="/css/cookie-consent.css">  <link rel="stylesheet" href="/css/cookie-consent.css">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    

  <style>  <!-- GTM loads via cookie-consent.js after analytics consent -->

    /* Hero Section - Exact copy from company.php */</head>

    .hero-animated {<body>

      height: 170px;  

      background: #000;  

      color: #f6f8fb;  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

      font-family: Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, "Helvetica Neue", Arial;

      overflow: hidden;  <main class="main-content">

      position: sticky;    <div class="container">

      top: 0;      <div class="page-header">

      z-index: 50;        <h1>Η Ομάδα μας</h1>

      border-bottom: 1px solid #333;        <p>Γνωρίστε τους ειδικούς που κάνουν τη διαφορά</p>

    }      </div>



    .hero-animated .stage {      <div class="content-section">

      position: relative;        <h2>Έμπειροι Επαγγελματίες</h2>

      z-index: 1;        <p>Η ομάδα της Nerally αποτελείται από έμπειρους επαγγελματίες με εξειδίκευση σε διάφορους τομείς:</p>

      height: 100%;

      display: flex;        <div class="team-grid">

      align-items: center;          <div class="team-member">

      justify-content: flex-start;            <h3>Πιστοποιημένοι Λογιστές</h3>

    }            <p>Με πολυετή εμπειρία στη λογιστική και φορολογία</p>

              </div>

    .hero-animated .stack {

      display: flex;          <div class="team-member">

      flex-direction: column;            <h3>Φορολογικοί Σύμβουλοι</h3>

      gap: 0.8rem;            <p>Ειδικοί σε φορολογικά θέματα και νομοθεσία</p>

      align-items: flex-start;          </div>

      padding: 1.5rem 2.5rem;

      max-width: min(1200px, 92vw);          <div class="team-member">

    }            <h3>Ειδικοί Κυβερνοασφάλειας</h3>

                <p>Προστασία των δεδομένων σας είναι προτεραιότητά μας</p>

    .hero-animated .headline {          </div>

      font-weight: 900;

      letter-spacing: .045em;          <div class="team-member">

      line-height: 1.05;            <h3>Digital Marketing Experts</h3>

      text-align: left;            <p>Προώθηση της επιχείρησής σας στο διαδίκτυο</p>

      font-size: clamp(1.8rem, 5.5vw, 3.5rem);          </div>

      text-shadow: 0 0 24px rgba(255,255,255,.22);        </div>

      white-space: nowrap;

    }        <h2>Η Φιλοσοφία μας</h2>

            <p>Πιστεύουμε στη συνεχή εκπαίδευση και στην ανάπτυξη των δεξιοτήτων της ομάδας μας, ώστε να μπορούμε να παρέχουμε πάντα τις καλύτερες λύσεις στους πελάτες μας.</p>

    .hero-animated .headline b {      </div>

      background: linear-gradient(90deg, var(--brand), #3498db);    </div>

      -webkit-background-clip: text;  </main>

      -webkit-text-fill-color: transparent;

      background-clip: text;  <div id="site-footer"></div>

    }    

      <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

    .hero-animated .row {

      display: flex;    <script src="/js/cookie-consent.js"></script>

      align-items: baseline;    <script src="../app.js"></script>

      gap: clamp(.4rem, 1.2vw, .8rem);</body>

      opacity: 1;</html>

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

    /* Team page styling - adapted from provided HTML with our colors */
    .team-page .main-content { margin-top: 0; }
    
    .wrap {
      max-width: 1140px;
      margin: 0 auto;
      padding: 56px 20px 96px;
      background: var(--bg);
      color: var(--ink);
    }
    
    .eyebrow {
      color: var(--brand);
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      margin-bottom: 8px;
    }
    
    .team-title {
      font-size: 2rem;
      line-height: 1.2;
      color: var(--brand);
      margin: 0 0 8px;
      font-weight: 800;
    }
    
    .lead {
      font-weight: 600;
      margin: 0 0 24px;
      font-size: 18px;
      line-height: 1.6;
    }
    
    .section {
      margin-top: 48px;
    }
    
    .divider {
      height: 3px;
      width: 48px;
      background: var(--brand);
      border-radius: 8px;
      margin: 0 0 18px;
    }

    /* Team intro section */
    .team-intro {
      display: grid;
      grid-template-columns: 1.4fr 0.9fr;
      gap: 28px;
      margin-top: 24px;
    }
    
    @media (max-width: 900px) {
      .team-intro {
        grid-template-columns: 1fr;
      }
    }
    
    .team-intro p {
      color: #5b6b7a;
      line-height: 1.75;
      margin: 0 0 14px;
      font-size: 16px;
    }
    
    .team-quote {
      background: #ffffff;
      border: 1px solid #dee6ef;
      border-radius: 16px;
      box-shadow: 0 12px 28px rgba(15,23,42,.08);
      padding: 22px;
    }
    
    .team-quote .quote-text {
      font-weight: 700;
      color: #0f172a;
      font-size: 16px;
      margin-bottom: 8px;
    }
    
    .team-quote .quote-caption {
      margin: 8px 0 0;
      color: #5b6b7a;
      font-size: 14px;
    }

    /* Team grid */
    .team-grid {
      display: grid;
      gap: 20px;
    }
    
    @media (min-width: 900px) {
      .team-grid.cols-3 {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    
    .team-card {
      background: #ffffff;
      border: 1px solid #dee6ef;
      border-radius: 16px;
      box-shadow: 0 12px 28px rgba(15,23,42,.08);
      padding: 18px;
      text-align: center;
      transition: transform .25s ease;
    }
    
    .team-card:hover {
      transform: translateY(-4px);
    }
    
    .team-card .avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin: 6px auto 10px;
      border: 3px solid #e5effd;
    }
    
    .team-card h4 {
      margin: 8px 0 4px;
      font-size: 18px;
      color: var(--brand);
      font-weight: 700;
    }
    
    .team-card .role {
      color: #5b6b7a;
      margin: 0 0 8px;
      font-size: 14px;
    }
    
    .contact {
      display: flex;
      justify-content: center;
      gap: 12px;
      align-items: center;
      margin-top: 10px;
    }
    
    .contact a {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 10px;
      border: 1px solid #dee6ef;
      border-radius: 12px;
      text-decoration: none;
      color: #0f172a;
      font-weight: 700;
      font-size: 12px;
      transition: all 0.2s ease;
    }
    
    .contact a:hover {
      border-color: var(--brand);
      color: var(--brand);
    }
    
    .icon {
      width: 18px;
      height: 18px;
      display: inline-block;
    }
    
    .social {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 8px;
    }
    
    .social a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border: 1px solid #dee6ef;
      border-radius: 999px;
      text-decoration: none;
      transition: all 0.2s ease;
    }
    
    .social a:hover {
      background: #f1f6ff;
      border-color: var(--brand);
      color: var(--brand);
    }

    /* Category headers */
    .cat {
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 34px 0 14px;
    }
    
    .cat h3 {
      margin: 0;
      font-size: 1.2rem;
      color: var(--brand);
      font-weight: 700;
    }
    
    .cat .bar {
      height: 3px;
      width: 32px;
      background: var(--brand);
      border-radius: 8px;
    }
  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <!-- Hero Section with Text Animation (TEAM variant) -->
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
  <main class="main-content team-page" style="margin-top:0;">
    <div class="wrap">
      <div class="eyebrow">Ποιοι είμαστε</div>
      <h2 class="team-title">Ομάδα</h2>
      <p class="lead">Η δύναμή μας είναι οι άνθρωποί μας — γιατί πίσω από κάθε επιτυχημένο αποτέλεσμα υπάρχει μια ομάδα που συνεργάζεται, εμπνέεται και εξελίσσεται.</p>

      <section class="section" style="margin-top:24px;">
        <div class="team-intro">
          <div>
            <p>Στη Nerally, πιστεύουμε πως η επιτυχία μιας επιχείρησης εξαρτάται από τους ανθρώπους που βρίσκονται γύρω της. Για αυτό και η δική μας ομάδα αποτελεί την καρδιά της φιλοσοφίας μας. Είμαστε μια ομάδα επαγγελματιών που προερχόμαστε από διαφορετικούς κλάδους, φέρνοντας μαζί μας εμπειρία, γνώση και εξειδίκευση — αλλά πάνω απ' όλα, κοινό όραμα.</p>
            <p>Ο καθένας μας έχει διανύσει μια πορεία μέσα στον χώρο του: άλλοι στην επιχειρηματική στρατηγική, άλλοι στο digital marketing, στα οικονομικά, στη νομική καθοδήγηση, στην οργάνωση ή στο σχεδιασμό επιχειρησιακών διαδικασιών. Όλοι όμως μοιραζόμαστε τον ίδιο στόχο: να είμαστε δίπλα στον επαγγελματία, να του προσφέρουμε λύσεις που είναι πρακτικές, εφαρμόσιμες και σύγχρονες.</p>
            <p>Μας ενώνει η πεποίθηση πως η συνεργασία είναι το κλειδί. Δεν λειτουργούμε ως μεμονωμένοι σύμβουλοι, αλλά ως ένα ενιαίο οικοσύστημα γνώσης. Κάθε έργο είναι μια ευκαιρία να ενώσουμε τις δυνάμεις μας, να ανταλλάξουμε ιδέες, να συνθέσουμε στρατηγικές και να δημιουργήσουμε αξία. Η διαφορετικότητα στις δεξιότητές μας δεν μας χωρίζει — μας συμπληρώνει.</p>
            <p>Η ομάδα της Nerally χαρακτηρίζεται από συνέπεια, δημιουργικότητα και συνεχή εξέλιξη. Παρακολουθούμε τις τάσεις της αγοράς, εξερευνούμε νέες τεχνολογίες, επενδύουμε στη δια βίου μάθηση. Θέλουμε να είμαστε πάντα ένα βήμα μπροστά, ώστε να μπορούμε να καθοδηγούμε αποτελεσματικά τους πελάτες μας στο διαρκώς μεταβαλλόμενο επιχειρηματικό τοπίο.</p>
            <p>Κάθε μέλος της ομάδας μας αντιμετωπίζει τον ρόλο του με προσωπική ευθύνη και επαγγελματισμό. Δίνουμε αξία στη συνεργασία, στην εμπιστοσύνη και στη διαφάνεια — στοιχεία που θεωρούμε απαραίτητα για κάθε υγιή επαγγελματική σχέση. Όταν αναλαμβάνουμε μια επιχείρηση, τη βλέπουμε σαν δική μας. Εμπλεκόμαστε ουσιαστικά, κατανοούμε τις ανάγκες της, και σχεδιάζουμε μαζί τα επόμενα βήματα.</p>
          </div>
          <aside class="team-quote">
            <div class="quote-text">«Πίσω από κάθε επιχείρηση που εξελίσσεται, υπάρχει μια ομάδα που πιστεύει σε αυτήν.»</div>
            <p class="quote-caption">Η επιτυχία δεν είναι ατομική — είναι συλλογική.</p>
          </aside>
        </div>
      </section>

      <div class="section"><div class="divider"></div></div>
      <h2 class="team-title">Τα άτομά μας</h2>
      <p class="lead">Δείτε ποιος είναι ποιος. Κάντε κλικ σε ένα μέλος για σύντομο προφίλ.</p>

      <!-- Λογιστική (3 μέλη) -->
      <div class="cat"><div class="bar"></div><h3>Λογιστική</h3></div>
      <div class="team-grid cols-3">
        <article class="team-card">
          <img class="avatar" src="/images/team-xristos.jpg" alt="Χρήστος Γκουτούλας">
          <h4>Χρήστος Γκουτούλας</h4>
          <p class="role">Λογιστής – Φοροτεχνικός</p>
          <div class="contact"><a href="tel:+306946365798"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>694 636 5798</a></div>
          <div class="social">
            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
          </div>
        </article>
        <article class="team-card">
          <img class="avatar" src="/images/team-aris.jpg" alt="Άρης Χαραλαμπίδης">
          <h4>Άρης Χαραλαμπίδης</h4>
          <p class="role">Λογιστής – Φοροτεχνικός</p>
          <div class="contact"><a href="tel:+30697400944"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>697 400 944</a></div>
          <div class="social">
            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
          </div>
        </article>
        <article class="team-card">
          <img class="avatar" src="/images/team-ioannis.jpg" alt="Ιωάννης Λάμπης">
          <h4>Ιωάννης Λαμπής</h4>
          <p class="role">Μισθοδοσία – Εργατικά</p>
          <div class="contact"><a href="tel:+306951302516"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>695 130 2516</a></div>
          <div class="social">
            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
          </div>
        </article>
      </div>

      <!-- Consulting (1) -->
      <div class="cat"><div class="bar"></div><h3>Consulting</h3></div>
      <div class="team-grid cols-3">
        <article class="team-card">
          <img class="avatar" src="/images/team-charalampos.jpg" alt="Χαράλαμπος Ζυγκιρίδης">
          <h4>Χαράλαμπος Ζυγκιρίδης</h4>
          <p class="role">Σύμβουλος Επιχειρήσεων</p>
          <div class="contact"><a href="tel:+306945793486"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>694 579 3486</a></div>
          <div class="social">
            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
          </div>
        </article>
      </div>

      <!-- Cyber Security (placeholder) -->
      <div class="cat"><div class="bar"></div><h3>Cyber Security</h3></div>
      <div class="team-grid cols-3">
        <article class="team-card">
          <img class="avatar" src="/images/placeholder-cyber.jpg" alt="Προσθήκη σύντομα">
          <h4>—</h4>
          <p class="role">Προσθήκη σύντομα</p>
          <div class="contact"><a href="tel:"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>—</a></div>
          <div class="social">
            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
          </div>
        </article>
      </div>

      <!-- Επιχορηγήσεις (placeholder) -->
      <div class="cat"><div class="bar"></div><h3>Επιχορηγήσεις</h3></div>
      <div class="team-grid cols-3">
        <article class="team-card">
          <img class="avatar" src="/images/placeholder-grants.jpg" alt="Προσθήκη σύντομα">
          <h4>—</h4>
          <p class="role">Προσθήκη σύντομα</p>
          <div class="contact"><a href="tel:"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>—</a></div>
          <div class="social">
            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
          </div>
        </article>
      </div>

      <!-- Social Media Management (1) -->
      <div class="cat"><div class="bar"></div><h3>Social Media Management</h3></div>
      <div class="team-grid cols-3">
        <article class="team-card">
          <img class="avatar" src="/images/team-sotiris.jpg" alt="Σωτήρης Θυμιανίδης">
          <h4>Σωτήρης Θυμιανίδης</h4>
          <p class="role">Social Media Expert</p>
          <div class="contact"><a href="tel:+306978424022"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>697 842 4022</a></div>
          <div class="social">
            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
          </div>
        </article>
      </div>

      <!-- Σύμβουλος Μηχανικός & Επιχορηγήσεις (1) -->
      <div class="cat"><div class="bar"></div><h3>Σύμβουλος Μηχανικός & Επιχορηγήσεις</h3></div>
      <div class="team-grid cols-3">
        <article class="team-card">
          <img class="avatar" src="/images/team-avramidis.jpg" alt="Αναστάσιος Αβραμίδης">
          <h4>Αναστάσιος Αβραμίδης</h4>
          <p class="role">Αρχιτέκτονας Μηχανικός</p>
          <div class="contact"><a href="tel:+306940420695"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>694 042 0695</a></div>
          <div class="social">
            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
          </div>
        </article>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/chat-widget.js"></script>
  <script>
    // Hero animation controller for team
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
        
        const words = ['TEAM','ΟΜΑΔΑ','EXPERTS','ΣΥΜΒΟΥΛΟΙ','CONSULTING','ΣΥΝΕΡΓΑΣΙΑ'];
        let i = 0;
        flipTo(words[i++ % words.length]);
        setInterval(() => flipTo(words[i++ % words.length]), 1900);
      })();
    })();
  </script>
</body>
</html>