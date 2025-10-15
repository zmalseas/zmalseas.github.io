<!DOCTYPE html><!DOCTYPE html><!DOCTYPE html>

<html lang="el">

<head><html lang="el"><html lang="el">

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0"><head><head>

  <title>Ομάδα — Nerally</title>

  <link rel="icon" type="image/png" href="../images/logo.png" />  <meta charset="UTF-8">  <meta charset="UTF-8">

  <link rel="stylesheet" href="../main.css">

  <link rel="stylesheet" href="/css/cookie-consent.css">  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>Ομάδα — Nerally</title>  <title>Η Ομάδα μας - Nerally</title>

  <style>

    /* Hero Section - Exact copy from company.php */  <link rel="icon" type="image/png" href="../images/logo.png" />  <link rel="icon" type="image/png" href="../images/logo.png" />

    .hero-animated {

      height: 170px;  <link rel="stylesheet" href="../main.css">  <link rel="stylesheet" href="../main.css">

      background: #000;

      color: #f6f8fb;  <link rel="stylesheet" href="/css/cookie-consent.css">  <link rel="stylesheet" href="/css/cookie-consent.css">

      font-family: Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, "Helvetica Neue", Arial;

      overflow: hidden;  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

      position: sticky;

      top: 0;    

      z-index: 50;

      border-bottom: 1px solid #333;  <style>  <!-- GTM loads via cookie-consent.js after analytics consent -->

    }

    /* Hero Section - Exact copy from company.php */</head>

    .hero-animated .stage {

      position: relative;    .hero-animated {<body>

      z-index: 1;

      height: 100%;      height: 170px;  

      display: flex;

      align-items: center;      background: #000;  

      justify-content: flex-start;

    }      color: #f6f8fb;  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

    

    .hero-animated .stack {      font-family: Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, "Helvetica Neue", Arial;

      display: flex;

      flex-direction: column;      overflow: hidden;  <main class="main-content">

      gap: 0.8rem;

      align-items: flex-start;      position: sticky;    <div class="container">

      padding: 1.5rem 2.5rem;

      max-width: min(1200px, 92vw);      top: 0;      <div class="page-header">

    }

          z-index: 50;        <h1>Η Ομάδα μας</h1>

    .hero-animated .headline {

      font-weight: 900;      border-bottom: 1px solid #333;        <p>Γνωρίστε τους ειδικούς που κάνουν τη διαφορά</p>

      letter-spacing: .045em;

      line-height: 1.05;    }      </div>

      text-align: left;

      font-size: clamp(1.8rem, 5.5vw, 3.5rem);

      text-shadow: 0 0 24px rgba(255,255,255,.22);

      white-space: nowrap;    .hero-animated .stage {      <div class="content-section">

    }

          position: relative;        <h2>Έμπειροι Επαγγελματίες</h2>

    .hero-animated .headline b {

      background: linear-gradient(90deg, var(--brand), #3498db);      z-index: 1;        <p>Η ομάδα της Nerally αποτελείται από έμπειρους επαγγελματίες με εξειδίκευση σε διάφορους τομείς:</p>

      -webkit-background-clip: text;

      -webkit-text-fill-color: transparent;      height: 100%;

      background-clip: text;

    }      display: flex;        <div class="team-grid">

    

    .hero-animated .row {      align-items: center;          <div class="team-member">

      display: flex;

      align-items: baseline;      justify-content: flex-start;            <h3>Πιστοποιημένοι Λογιστές</h3>

      gap: clamp(.4rem, 1.2vw, .8rem);

      opacity: 1;    }            <p>Με πολυετή εμπειρία στη λογιστική και φορολογία</p>

    }

                  </div>

    .hero-animated .left {

      font-weight: 900;    .hero-animated .stack {

      letter-spacing: .045em;

      line-height: 1;      display: flex;          <div class="team-member">

      font-size: clamp(1.2rem, 3.8vw, 2.8rem);

      text-shadow: 0 0 14px rgba(255,255,255,.22);      flex-direction: column;            <h3>Φορολογικοί Σύμβουλοι</h3>

    }

          gap: 0.8rem;            <p>Ειδικοί σε φορολογικά θέματα και νομοθεσία</p>

    .hero-animated .right {

      font-weight: 900;      align-items: flex-start;          </div>

      letter-spacing: .045em;

      line-height: 1;      padding: 1.5rem 2.5rem;

      font-size: clamp(1.2rem, 3.8vw, 2.8rem);

      min-width: 8ch;      max-width: min(1200px, 92vw);          <div class="team-member">

      text-align: left;

      color: #e8f6ff;    }            <h3>Ειδικοί Κυβερνοασφάλειας</h3>

    }

                    <p>Προστασία των δεδομένων σας είναι προτεραιότητά μας</p>

    .hero-animated .flip {

      display: inline-block;    .hero-animated .headline {          </div>

      transform-origin: 50% 80%;

      -webkit-backface-visibility: hidden;      font-weight: 900;

      backface-visibility: hidden;

      transform-style: preserve-3d;      letter-spacing: .045em;          <div class="team-member">

      will-change: transform, opacity;

    }      line-height: 1.05;            <h3>Digital Marketing Experts</h3>

    

    .hero-animated .flip.enter {      text-align: left;            <p>Προώθηση της επιχείρησής σας στο διαδίκτυο</p>

      animation: flipIn .7s cubic-bezier(.2,.8,.2,1) forwards;

    }      font-size: clamp(1.8rem, 5.5vw, 3.5rem);          </div>

    

    @keyframes flipIn {      text-shadow: 0 0 24px rgba(255,255,255,.22);        </div>

      0% { transform: rotateX(90deg); opacity: 0; filter: blur(6px); }

      60% { opacity: 1; }      white-space: nowrap;

      100% { transform: rotateX(0); opacity: 1; filter: blur(0); }

    }    }        <h2>Η Φιλοσοφία μας</h2>



    .hero-animated .gap {            <p>Πιστεύουμε στη συνεχή εκπαίδευση και στην ανάπτυξη των δεξιοτήτων της ομάδας μας, ώστε να μπορούμε να παρέχουμε πάντα τις καλύτερες λύσεις στους πελάτες μας.</p>

      display: inline-block;

      width: 0;    .hero-animated .headline b {      </div>

      vertical-align: baseline;

    }      background: linear-gradient(90deg, var(--brand), #3498db);    </div>

    

    .hero-animated .gap.g1 { width: 3ch; }      -webkit-background-clip: text;  </main>

    .hero-animated .gap.g2 { width: 2ch; }

          -webkit-text-fill-color: transparent;

    .hero-animated .rise {

      display: inline-block;      background-clip: text;  <div id="site-footer"></div>

      transform: translateY(.9em);

      opacity: 0;    }    

      animation: riseIn .7s ease forwards;

    }      <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

    

    @keyframes riseIn {    .hero-animated .row {

      to { transform: translateY(0); opacity: 1; }

    }      display: flex;    <script src="/js/cookie-consent.js"></script>



    @media (max-width: 768px) {      align-items: baseline;    <script src="../app.js"></script>

      .hero-animated {

        height: 120px;      gap: clamp(.4rem, 1.2vw, .8rem);</body>

      }

      .hero-animated .stack {      opacity: 1;</html>

        padding: 1rem 1.5rem;

        gap: 0.6rem;    }

      }

      .hero-animated .headline {    

        font-size: clamp(1.4rem, 4.5vw, 2.5rem);

      }    .hero-animated .left {

      .hero-animated .left,

      .hero-animated .right {      font-weight: 900;

        font-size: clamp(1rem, 3.2vw, 2rem);

      }      letter-spacing: .045em;

    }

      line-height: 1;

    /* Team page styling - adapted from provided HTML with our colors */      font-size: clamp(1.2rem, 3.8vw, 2.8rem);

    .team-page .main-content { margin-top: 0; }      text-shadow: 0 0 14px rgba(255,255,255,.22);

        }

    .wrap {    

      max-width: 1140px;    .hero-animated .right {

      margin: 0 auto;      font-weight: 900;

      padding: 56px 20px 96px;      letter-spacing: .045em;

      background: var(--bg);      line-height: 1;

      color: var(--ink);      font-size: clamp(1.2rem, 3.8vw, 2.8rem);

    }      min-width: 8ch;

          text-align: left;

    .eyebrow {      color: #e8f6ff;

      color: var(--brand);    }

      font-size: 14px;    

      font-weight: 600;    .hero-animated .flip {

      text-transform: uppercase;      display: inline-block;

      letter-spacing: 0.1em;      transform-origin: 50% 80%;

      margin-bottom: 8px;      -webkit-backface-visibility: hidden;

    }      backface-visibility: hidden;

          transform-style: preserve-3d;

    .team-title {      will-change: transform, opacity;

      font-size: 2rem;    }

      line-height: 1.2;    

      color: var(--brand);    .hero-animated .flip.enter {

      margin: 0 0 8px;      animation: flipIn .7s cubic-bezier(.2,.8,.2,1) forwards;

      font-weight: 800;    }

    }    

        @keyframes flipIn {

    .lead {      0% { transform: rotateX(90deg); opacity: 0; filter: blur(6px); }

      font-weight: 600;      60% { opacity: 1; }

      margin: 0 0 24px;      100% { transform: rotateX(0); opacity: 1; filter: blur(0); }

      font-size: 18px;    }

      line-height: 1.6;

    }    .hero-animated .gap {

          display: inline-block;

    .section {      width: 0;

      margin-top: 48px;      vertical-align: baseline;

    }    }

        

    .divider {    .hero-animated .gap.g1 { width: 3ch; }

      height: 3px;    .hero-animated .gap.g2 { width: 2ch; }

      width: 48px;    

      background: var(--brand);    .hero-animated .rise {

      border-radius: 8px;      display: inline-block;

      margin: 0 0 18px;      transform: translateY(.9em);

    }      opacity: 0;

      animation: riseIn .7s ease forwards;

    /* Team intro section */    }

    .team-intro {    

      display: grid;    @keyframes riseIn {

      grid-template-columns: 1.4fr 0.9fr;      to { transform: translateY(0); opacity: 1; }

      gap: 28px;    }

      margin-top: 24px;

    }    @media (max-width: 768px) {

          .hero-animated {

    @media (max-width: 900px) {        height: 120px;

      .team-intro {      }

        grid-template-columns: 1fr;      .hero-animated .stack {

      }        padding: 1rem 1.5rem;

    }        gap: 0.6rem;

          }

    .team-intro p {      .hero-animated .headline {

      color: #5b6b7a;        font-size: clamp(1.4rem, 4.5vw, 2.5rem);

      line-height: 1.75;      }

      margin: 0 0 14px;      .hero-animated .left,

      font-size: 16px;      .hero-animated .right {

    }        font-size: clamp(1rem, 3.2vw, 2rem);

          }

    /* Updated quote styling to match the second format */    }

    .team-quote {

      background: #ffffff;    /* Team page styling - adapted from provided HTML with our colors */

      border: 1px solid #dee6ef;    .team-page .main-content { margin-top: 0; }

      border-radius: 16px;    

      box-shadow: 0 12px 28px rgba(15,23,42,.08);    .wrap {

      padding: 22px;      max-width: 1140px;

    }      margin: 0 auto;

          padding: 56px 20px 96px;

    .team-quote .quote-text {      background: var(--bg);

      font-weight: 700;      color: var(--ink);

      color: var(--brand);    }

      font-size: 16px;    

      margin-bottom: 12px;    .eyebrow {

      line-height: 1.4;      color: var(--brand);

    }      font-size: 14px;

          font-weight: 600;

    .team-quote .quote-caption {      text-transform: uppercase;

      margin: 0;      letter-spacing: 0.1em;

      color: #5b6b7a;      margin-bottom: 8px;

      font-size: 15px;    }

      line-height: 1.6;    

      font-weight: 400;    .team-title {

    }      font-size: 2rem;

      line-height: 1.2;

    /* Team grid */      color: var(--brand);

    .team-grid {      margin: 0 0 8px;

      display: grid;      font-weight: 800;

      gap: 20px;    }

    }    

        .lead {

    @media (min-width: 900px) {      font-weight: 600;

      .team-grid.cols-3 {      margin: 0 0 24px;

        grid-template-columns: repeat(3, 1fr);      font-size: 18px;

      }      line-height: 1.6;

    }    }

        

    .team-card {    .section {

      background: #ffffff;      margin-top: 48px;

      border: 1px solid #dee6ef;    }

      border-radius: 16px;    

      box-shadow: 0 12px 28px rgba(15,23,42,.08);    .divider {

      padding: 18px;      height: 3px;

      text-align: center;      width: 48px;

      transition: transform .25s ease;      background: var(--brand);

    }      border-radius: 8px;

          margin: 0 0 18px;

    .team-card:hover {    }

      transform: translateY(-4px);

    }    /* Team intro section */

        .team-intro {

    .team-card .avatar {      display: grid;

      width: 120px;      grid-template-columns: 1.4fr 0.9fr;

      height: 120px;      gap: 28px;

      border-radius: 50%;      margin-top: 24px;

      object-fit: cover;    }

      margin: 6px auto 10px;    

      border: 3px solid #e5effd;    @media (max-width: 900px) {

    }      .team-intro {

            grid-template-columns: 1fr;

    .team-card h4 {      }

      margin: 8px 0 4px;    }

      font-size: 18px;    

      color: var(--brand);    .team-intro p {

      font-weight: 700;      color: #5b6b7a;

    }      line-height: 1.75;

          margin: 0 0 14px;

    .team-card .role {      font-size: 16px;

      color: #5b6b7a;    }

      margin: 0 0 8px;    

      font-size: 14px;    .team-quote {

    }      background: #ffffff;

          border: 1px solid #dee6ef;

    .contact {      border-radius: 16px;

      display: flex;      box-shadow: 0 12px 28px rgba(15,23,42,.08);

      justify-content: center;      padding: 22px;

      gap: 12px;    }

      align-items: center;    

      margin-top: 10px;    .team-quote .quote-text {

    }      font-weight: 700;

          color: #0f172a;

    .contact a {      font-size: 16px;

      display: inline-flex;      margin-bottom: 8px;

      align-items: center;    }

      gap: 8px;    

      padding: 8px 10px;    .team-quote .quote-caption {

      border: 1px solid #dee6ef;      margin: 8px 0 0;

      border-radius: 12px;      color: #5b6b7a;

      text-decoration: none;      font-size: 14px;

      color: #0f172a;    }

      font-weight: 700;

      font-size: 12px;    /* Team grid */

      transition: all 0.2s ease;    .team-grid {

    }      display: grid;

          gap: 20px;

    .contact a:hover {    }

      border-color: var(--brand);    

      color: var(--brand);    @media (min-width: 900px) {

    }      .team-grid.cols-3 {

            grid-template-columns: repeat(3, 1fr);

    .icon {      }

      width: 18px;    }

      height: 18px;    

      display: inline-block;    .team-card {

    }      background: #ffffff;

          border: 1px solid #dee6ef;

    .social {      border-radius: 16px;

      display: flex;      box-shadow: 0 12px 28px rgba(15,23,42,.08);

      justify-content: center;      padding: 18px;

      gap: 10px;      text-align: center;

      margin-top: 8px;      transition: transform .25s ease;

    }    }

        

    .social a {    .team-card:hover {

      display: inline-flex;      transform: translateY(-4px);

      align-items: center;    }

      justify-content: center;    

      width: 36px;    .team-card .avatar {

      height: 36px;      width: 120px;

      border: 1px solid #dee6ef;      height: 120px;

      border-radius: 999px;      border-radius: 50%;

      text-decoration: none;      object-fit: cover;

      transition: all 0.2s ease;      margin: 6px auto 10px;

    }      border: 3px solid #e5effd;

        }

    .social a:hover {    

      background: #f1f6ff;    .team-card h4 {

      border-color: var(--brand);      margin: 8px 0 4px;

      color: var(--brand);      font-size: 18px;

    }      color: var(--brand);

      font-weight: 700;

    /* Category headers */    }

    .cat {    

      display: flex;    .team-card .role {

      align-items: center;      color: #5b6b7a;

      gap: 10px;      margin: 0 0 8px;

      margin: 34px 0 14px;      font-size: 14px;

    }    }

        

    .cat h3 {    .contact {

      margin: 0;      display: flex;

      font-size: 1.2rem;      justify-content: center;

      color: var(--brand);      gap: 12px;

      font-weight: 700;      align-items: center;

    }      margin-top: 10px;

        }

    .cat .bar {    

      height: 3px;    .contact a {

      width: 32px;      display: inline-flex;

      background: var(--brand);      align-items: center;

      border-radius: 8px;      gap: 8px;

    }      padding: 8px 10px;

  </style>      border: 1px solid #dee6ef;

        border-radius: 12px;

  <!-- GTM loads via cookie-consent.js after analytics consent -->      text-decoration: none;

</head>      color: #0f172a;

<body>      font-weight: 700;

        font-size: 12px;

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>      transition: all 0.2s ease;

    }

  <!-- Hero Section with Text Animation (TEAM variant) -->    

  <div class="hero-animated">    .contact a:hover {

    <main class="stage">      border-color: var(--brand);

      <div class="stack">      color: var(--brand);

        <div id="headline" class="headline" aria-live="polite"></div>    }

        <div class="row" id="row">    

          <div class="left">NERA</div>    .icon {

          <div class="right"><span id="flip" class="flip">LLY</span></div>      width: 18px;

        </div>      height: 18px;

      </div>      display: inline-block;

    </main>    }

  </div>    

    .social {

  <!-- Main Content -->      display: flex;

  <main class="main-content team-page" style="margin-top:0;">      justify-content: center;

    <div class="wrap">      gap: 10px;

      <div class="eyebrow">Ποιοι είμαστε</div>      margin-top: 8px;

      <h2 class="team-title">Ομάδα</h2>    }

      <p class="lead">Η δύναμή μας είναι οι άνθρωποί μας — γιατί πίσω από κάθε επιτυχημένο αποτέλεσμα υπάρχει μια ομάδα που συνεργάζεται, εμπνέεται και εξελίσσεται.</p>    

    .social a {

      <section class="section" style="margin-top:24px;">      display: inline-flex;

        <div class="team-intro">      align-items: center;

          <div>      justify-content: center;

            <p>Στη Nerally, πιστεύουμε πως η επιτυχία μιας επιχείρησης εξαρτάται από τους ανθρώπους που βρίσκονται γύρω της. Για αυτό και η δική μας ομάδα αποτελεί την καρδιά της φιλοσοφίας μας. Είμαστε μια ομάδα επαγγελματιών που προερχόμαστε από διαφορετικούς κλάδους, φέρνοντας μαζί μας εμπειρία, γνώση και εξειδίκευση — αλλά πάνω απ' όλα, κοινό όραμα.</p>      width: 36px;

            <p>Ο καθένας μας έχει διανύσει μια πορεία μέσα στον χώρο του: άλλοι στην επιχειρηματική στρατηγική, άλλοι στο digital marketing, στα οικονομικά, στη νομική καθοδήγηση, στην οργάνωση ή στο σχεδιασμό επιχειρησιακών διαδικασιών. Όλοι όμως μοιραζόμαστε τον ίδιο στόχο: να είμαστε δίπλα στον επαγγελματία, να του προσφέρουμε λύσεις που είναι πρακτικές, εφαρμόσιμες και σύγχρονες.</p>      height: 36px;

            <p>Μας ενώνει η πεποίθηση πως η συνεργασία είναι το κλειδί. Δεν λειτουργούμε ως μεμονωμένοι σύμβουλοι, αλλά ως ένα ενιαίο οικοσύστημα γνώσης. Κάθε έργο είναι μια ευκαιρία να ενώσουμε τις δυνάμεις μας, να ανταλλάξουμε ιδέες, να συνθέσουμε στρατηγικές και να δημιουργήσουμε αξία. Η διαφορετικότητα στις δεξιότητές μας δεν μας χωρίζει — μας συμπληρώνει.</p>      border: 1px solid #dee6ef;

            <p>Η ομάδα της Nerally χαρακτηρίζεται από συνέπεια, δημιουργικότητα και συνεχή εξέλιξη. Παρακολουθούμε τις τάσεις της αγοράς, εξερευνούμε νέες τεχνολογίες, επενδύουμε στη δια βίου μάθηση. Θέλουμε να είμαστε πάντα ένα βήμα μπροστά, ώστε να μπορούμε να καθοδηγούμε αποτελεσματικά τους πελάτες μας στο διαρκώς μεταβαλλόμενο επιχειρηματικό τοπίο.</p>      border-radius: 999px;

            <p>Κάθε μέλος της ομάδας μας αντιμετωπίζει τον ρόλο του με προσωπική ευθύνη και επαγγελματισμό. Δίνουμε αξία στη συνεργασία, στην εμπιστοσύνη και στη διαφάνεια — στοιχεία που θεωρούμε απαραίτητα για κάθε υγιή επαγγελματική σχέση. Όταν αναλαμβάνουμε μια επιχείρηση, τη βλέπουμε σαν δική μας. Εμπλεκόμαστε ουσιαστικά, κατανοούμε τις ανάγκες της, και σχεδιάζουμε μαζί τα επόμενα βήματα.</p>      text-decoration: none;

          </div>      transition: all 0.2s ease;

          <aside class="team-quote">    }

            <div class="quote-text">«Πίσω από κάθε επιχείρηση που εξελίσσεται, υπάρχει μια ομάδα που πιστεύει σε αυτήν.»</div>    

            <p class="quote-caption">Η επιτυχία δεν είναι ατομική — είναι συλλογική.</p>    .social a:hover {

          </aside>      background: #f1f6ff;

        </div>      border-color: var(--brand);

      </section>      color: var(--brand);

    }

      <div class="section"><div class="divider"></div></div>

      <h2 class="team-title">Τα άτομά μας</h2>    /* Category headers */

      <p class="lead">Δείτε ποιος είναι ποιος. Κάντε κλικ σε ένα μέλος για σύντομο προφίλ.</p>    .cat {

      display: flex;

      <!-- Λογιστική (3 μέλη) -->      align-items: center;

      <div class="cat"><div class="bar"></div><h3>Λογιστική</h3></div>      gap: 10px;

      <div class="team-grid cols-3">      margin: 34px 0 14px;

        <article class="team-card">    }

          <img class="avatar" src="/images/team-xristos.jpg" alt="Χρήστος Γκουτούλας">    

          <h4>Χρήστος Γκουτούλας</h4>    .cat h3 {

          <p class="role">Λογιστής – Φοροτεχνικός</p>      margin: 0;

          <div class="contact"><a href="tel:+306946365798"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>694 636 5798</a></div>      font-size: 1.2rem;

          <div class="social">      color: var(--brand);

            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>      font-weight: 700;

            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>    }

          </div>    

        </article>    .cat .bar {

        <article class="team-card">      height: 3px;

          <img class="avatar" src="/images/team-aris.jpg" alt="Άρης Χαραλαμπίδης">      width: 32px;

          <h4>Άρης Χαραλαμπίδης</h4>      background: var(--brand);

          <p class="role">Λογιστής – Φοροτεχνικός</p>      border-radius: 8px;

          <div class="contact"><a href="tel:+30697400944"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>697 400 944</a></div>    }

          <div class="social">  </style>

            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>  

            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>  <!-- GTM loads via cookie-consent.js after analytics consent -->

          </div></head>

        </article><body>

        <article class="team-card">  

          <img class="avatar" src="/images/team-ioannis.jpg" alt="Ιωάννης Λάμπης">  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

          <h4>Ιωάννης Λαμπής</h4>

          <p class="role">Μισθοδοσία – Εργατικά</p>  <!-- Hero Section with Text Animation (TEAM variant) -->

          <div class="contact"><a href="tel:+306951302516"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>695 130 2516</a></div>  <div class="hero-animated">

          <div class="social">    <main class="stage">

            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>      <div class="stack">

            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>        <div id="headline" class="headline" aria-live="polite"></div>

          </div>        <div class="row" id="row">

        </article>          <div class="left">NERA</div>

      </div>          <div class="right"><span id="flip" class="flip">LLY</span></div>

        </div>

      <!-- Consulting (1) -->      </div>

      <div class="cat"><div class="bar"></div><h3>Consulting</h3></div>    </main>

      <div class="team-grid cols-3">  </div>

        <article class="team-card">

          <img class="avatar" src="/images/team-charalampos.jpg" alt="Χαράλαμπος Ζυγκιρίδης">  <!-- Main Content -->

          <h4>Χαράλαμπος Ζυγκιρίδης</h4>  <main class="main-content team-page" style="margin-top:0;">

          <p class="role">Σύμβουλος Επιχειρήσεων</p>    <div class="wrap">

          <div class="contact"><a href="tel:+306945793486"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>694 579 3486</a></div>      <div class="eyebrow">Ποιοι είμαστε</div>

          <div class="social">      <h2 class="team-title">Ομάδα</h2>

            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>      <p class="lead">Η δύναμή μας είναι οι άνθρωποί μας — γιατί πίσω από κάθε επιτυχημένο αποτέλεσμα υπάρχει μια ομάδα που συνεργάζεται, εμπνέεται και εξελίσσεται.</p>

            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>

          </div>      <section class="section" style="margin-top:24px;">

        </article>        <div class="team-intro">

      </div>          <div>

            <p>Στη Nerally, πιστεύουμε πως η επιτυχία μιας επιχείρησης εξαρτάται από τους ανθρώπους που βρίσκονται γύρω της. Για αυτό και η δική μας ομάδα αποτελεί την καρδιά της φιλοσοφίας μας. Είμαστε μια ομάδα επαγγελματιών που προερχόμαστε από διαφορετικούς κλάδους, φέρνοντας μαζί μας εμπειρία, γνώση και εξειδίκευση — αλλά πάνω απ' όλα, κοινό όραμα.</p>

      <!-- Cyber Security (placeholder) -->            <p>Ο καθένας μας έχει διανύσει μια πορεία μέσα στον χώρο του: άλλοι στην επιχειρηματική στρατηγική, άλλοι στο digital marketing, στα οικονομικά, στη νομική καθοδήγηση, στην οργάνωση ή στο σχεδιασμό επιχειρησιακών διαδικασιών. Όλοι όμως μοιραζόμαστε τον ίδιο στόχο: να είμαστε δίπλα στον επαγγελματία, να του προσφέρουμε λύσεις που είναι πρακτικές, εφαρμόσιμες και σύγχρονες.</p>

      <div class="cat"><div class="bar"></div><h3>Cyber Security</h3></div>            <p>Μας ενώνει η πεποίθηση πως η συνεργασία είναι το κλειδί. Δεν λειτουργούμε ως μεμονωμένοι σύμβουλοι, αλλά ως ένα ενιαίο οικοσύστημα γνώσης. Κάθε έργο είναι μια ευκαιρία να ενώσουμε τις δυνάμεις μας, να ανταλλάξουμε ιδέες, να συνθέσουμε στρατηγικές και να δημιουργήσουμε αξία. Η διαφορετικότητα στις δεξιότητές μας δεν μας χωρίζει — μας συμπληρώνει.</p>

      <div class="team-grid cols-3">            <p>Η ομάδα της Nerally χαρακτηρίζεται από συνέπεια, δημιουργικότητα και συνεχή εξέλιξη. Παρακολουθούμε τις τάσεις της αγοράς, εξερευνούμε νέες τεχνολογίες, επενδύουμε στη δια βίου μάθηση. Θέλουμε να είμαστε πάντα ένα βήμα μπροστά, ώστε να μπορούμε να καθοδηγούμε αποτελεσματικά τους πελάτες μας στο διαρκώς μεταβαλλόμενο επιχειρηματικό τοπίο.</p>

        <article class="team-card">            <p>Κάθε μέλος της ομάδας μας αντιμετωπίζει τον ρόλο του με προσωπική ευθύνη και επαγγελματισμό. Δίνουμε αξία στη συνεργασία, στην εμπιστοσύνη και στη διαφάνεια — στοιχεία που θεωρούμε απαραίτητα για κάθε υγιή επαγγελματική σχέση. Όταν αναλαμβάνουμε μια επιχείρηση, τη βλέπουμε σαν δική μας. Εμπλεκόμαστε ουσιαστικά, κατανοούμε τις ανάγκες της, και σχεδιάζουμε μαζί τα επόμενα βήματα.</p>

          <img class="avatar" src="/images/placeholder-cyber.jpg" alt="Προσθήκη σύντομα">          </div>

          <h4>—</h4>          <aside class="team-quote">

          <p class="role">Προσθήκη σύντομα</p>            <div class="quote-text">«Πίσω από κάθε επιχείρηση που εξελίσσεται, υπάρχει μια ομάδα που πιστεύει σε αυτήν.»</div>

          <div class="contact"><a href="tel:"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>—</a></div>            <p class="quote-caption">Η επιτυχία δεν είναι ατομική — είναι συλλογική.</p>

          <div class="social">          </aside>

            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>        </div>

            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>      </section>

          </div>

        </article>      <div class="section"><div class="divider"></div></div>

      </div>      <h2 class="team-title">Τα άτομά μας</h2>

      <p class="lead">Δείτε ποιος είναι ποιος. Κάντε κλικ σε ένα μέλος για σύντομο προφίλ.</p>

      <!-- Επιχορηγήσεις (placeholder) -->

      <div class="cat"><div class="bar"></div><h3>Επιχορηγήσεις</h3></div>      <!-- Λογιστική (3 μέλη) -->

      <div class="team-grid cols-3">      <div class="cat"><div class="bar"></div><h3>Λογιστική</h3></div>

        <article class="team-card">      <div class="team-grid cols-3">

          <img class="avatar" src="/images/placeholder-grants.jpg" alt="Προσθήκη σύντομα">        <article class="team-card">

          <h4>—</h4>          <img class="avatar" src="/images/team-xristos.jpg" alt="Χρήστος Γκουτούλας">

          <p class="role">Προσθήκη σύντομα</p>          <h4>Χρήστος Γκουτούλας</h4>

          <div class="contact"><a href="tel:"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>—</a></div>          <p class="role">Λογιστής – Φοροτεχνικός</p>

          <div class="social">          <div class="contact"><a href="tel:+306946365798"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>694 636 5798</a></div>

            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>          <div class="social">

            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>

          </div>            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>

        </article>          </div>

      </div>        </article>

        <article class="team-card">

      <!-- Social Media Management (1) -->          <img class="avatar" src="/images/team-aris.jpg" alt="Άρης Χαραλαμπίδης">

      <div class="cat"><div class="bar"></div><h3>Social Media Management</h3></div>          <h4>Άρης Χαραλαμπίδης</h4>

      <div class="team-grid cols-3">          <p class="role">Λογιστής – Φοροτεχνικός</p>

        <article class="team-card">          <div class="contact"><a href="tel:+30697400944"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>697 400 944</a></div>

          <img class="avatar" src="/images/team-sotiris.jpg" alt="Σωτήρης Θυμιανίδης">          <div class="social">

          <h4>Σωτήρης Θυμιανίδης</h4>            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>

          <p class="role">Social Media Expert</p>            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>

          <div class="contact"><a href="tel:+306978424022"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>697 842 4022</a></div>          </div>

          <div class="social">        </article>

            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>        <article class="team-card">

            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>          <img class="avatar" src="/images/team-ioannis.jpg" alt="Ιωάννης Λάμπης">

          </div>          <h4>Ιωάννης Λαμπής</h4>

        </article>          <p class="role">Μισθοδοσία – Εργατικά</p>

      </div>          <div class="contact"><a href="tel:+306951302516"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>695 130 2516</a></div>

          <div class="social">

      <!-- Σύμβουλος Μηχανικός & Επιχορηγήσεις (1) -->            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>

      <div class="cat"><div class="bar"></div><h3>Σύμβουλος Μηχανικός & Επιχορηγήσεις</h3></div>            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>

      <div class="team-grid cols-3">          </div>

        <article class="team-card">        </article>

          <img class="avatar" src="/images/team-avramidis.jpg" alt="Αναστάσιος Αβραμίδης">      </div>

          <h4>Αναστάσιος Αβραμίδης</h4>

          <p class="role">Αρχιτέκτονας Μηχανικός</p>      <!-- Consulting (1) -->

          <div class="contact"><a href="tel:+306940420695"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>694 042 0695</a></div>      <div class="cat"><div class="bar"></div><h3>Consulting</h3></div>

          <div class="social">      <div class="team-grid cols-3">

            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>        <article class="team-card">

            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>          <img class="avatar" src="/images/team-charalampos.jpg" alt="Χαράλαμπος Ζυγκιρίδης">

          </div>          <h4>Χαράλαμπος Ζυγκιρίδης</h4>

        </article>          <p class="role">Σύμβουλος Επιχειρήσεων</p>

      </div>          <div class="contact"><a href="tel:+306945793486"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>694 579 3486</a></div>

          <div class="social">

    </div>            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>

  </main>            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>

          </div>

  <!-- Footer -->        </article>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>      </div>

  

  <script src="/js/cookie-consent.js"></script>      <!-- Cyber Security (placeholder) -->

  <script src="/js/chat-widget.js"></script>      <div class="cat"><div class="bar"></div><h3>Cyber Security</h3></div>

  <script>      <div class="team-grid cols-3">

    // Hero animation controller for team        <article class="team-card">

    (function(){          <img class="avatar" src="/images/placeholder-cyber.jpg" alt="Προσθήκη σύντομα">

      const headline = document.getElementById('headline');          <h4>—</h4>

      const flipEl = document.getElementById('flip');          <p class="role">Προσθήκη σύντομα</p>

      if (!headline || !flipEl) return;          <div class="contact"><a href="tel:"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>—</a></div>

                <div class="social">

      const wait = (ms) => new Promise(resolve => setTimeout(resolve, ms));            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>

                  <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>

      function flipTo(text) {          </div>

        flipEl.classList.remove('enter');        </article>

        void flipEl.offsetWidth; // restart animation      </div>

        flipEl.textContent = text;

        flipEl.classList.add('enter');      <!-- Επιχορηγήσεις (placeholder) -->

      }      <div class="cat"><div class="bar"></div><h3>Επιχορηγήσεις</h3></div>

            <div class="team-grid cols-3">

      (async function run(){        <article class="team-card">

        headline.textContent = 'NERALLY';          <img class="avatar" src="/images/placeholder-grants.jpg" alt="Προσθήκη σύντομα">

        await wait(1000);          <h4>—</h4>

        headline.innerHTML = 'N' + '<span class="gap g1"></span>' + 'ER' + '<span class="gap g2"></span>' + 'ALLY';          <p class="role">Προσθήκη σύντομα</p>

        await wait(1200);          <div class="contact"><a href="tel:"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>—</a></div>

        headline.querySelector('.g1').innerHTML = '<span class="rise">EW&nbsp;</span>';          <div class="social">

        await wait(500);            <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>

        headline.querySelector('.g2').innerHTML = '<span class="rise">A&nbsp;</span>';            <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>

        await wait(1200);          </div>

        headline.innerHTML = '<b>NEW ERA</b> ALLY';        </article>

              </div>

        const words = ['TEAM','ΟΜΑΔΑ','EXPERTS','ΣΥΜΒΟΥΛΟΙ','CONSULTING','ΣΥΝΕΡΓΑΣΙΑ'];

        let i = 0;      <!-- Social Media Management (1) -->

        flipTo(words[i++ % words.length]);      <div class="cat"><div class="bar"></div><h3>Social Media Management</h3></div>

        setInterval(() => flipTo(words[i++ % words.length]), 1900);      <div class="team-grid cols-3">

      })();        <article class="team-card">

    })();          <img class="avatar" src="/images/team-sotiris.jpg" alt="Σωτήρης Θυμιανίδης">

  </script>          <h4>Σωτήρης Θυμιανίδης</h4>

</body>          <p class="role">Social Media Expert</p>

</html>          <div class="contact"><a href="tel:+306978424022"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>697 842 4022</a></div>
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