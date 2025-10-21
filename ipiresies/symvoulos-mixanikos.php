<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nerally - Σύμβουλος Μηχανικός</title>
  <meta name="description" content="Αρχιτεκτονικός σχεδιασμός, έκδοση αδειών μικρής κλίμακας, μελέτες πυροπροστασίας, επίβλεψη, project management και φωτορεαλιστικές απεικονίσεις. Ολοκληρωμένη τεχνική υποστήριξη από τη μελέτη έως την κατασκευή." />
  <meta name="keywords" content="σύμβουλος μηχανικός, αρχιτεκτονικός σχεδιασμός, άδεια μικρής κλίμακας, μελέτες πυροπροστασίας, επίβλεψη, project management, φωτορεαλισμοί, Nerally" />
  <meta name="author" content="Nerally" />
  <link rel="canonical" href="https://nerally.gr/ipiresies/symvoulos-mixanikos.php" />

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://nerally.gr/ipiresies/symvoulos-mixanikos.php" />
  <meta property="og:title" content="Σύμβουλος Μηχανικός - Nerally | Αρχιτεκτονικός Σχεδιασμός & Δόμηση" />
  <meta property="og:description" content="Αρχιτεκτονικός σχεδιασμός, άδειες, μελέτες, επίβλεψη και project management με διαφάνεια, ακρίβεια και συνέπεια." />
  <meta property="og:image" content="https://nerally.gr/images/logo.png" />
  <meta property="og:locale" content="el_GR" />

  <!-- Twitter -->
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:url" content="https://nerally.gr/ipiresies/symvoulos-mixanikos.php" />
  <meta property="twitter:title" content="Σύμβουλος Μηχανικός - Nerally | Αρχιτεκτονικός Σχεδιασμός & Δόμηση" />
  <meta property="twitter:description" content="Αρχιτεκτονικός σχεδιασμός, άδειες, μελέτες, επίβλεψη και project management με διαφάνεια, ακρίβεια και συνέπεια." />
  <meta property="twitter:image" content="https://nerally.gr/images/logo.png" />

  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/cookie-consent.css">

  <?php
  $serviceData = [
    'name' => 'Σύμβουλος Μηχανικός',
    'description' => 'Αρχιτεκτονικός σχεδιασμός, έκδοση αδειών μικρής κλίμακας, μελέτες πυροπροστασίας και ενεργειακές μελέτες, επίβλεψη έργων, project management και φωτορεαλιστικές απεικονίσεις. Ολοκληρωμένη τεχνική υποστήριξη από τη μελέτη έως την κατασκευή.',
    'url' => 'https://nerally.gr/ipiresies/symvoulos-mixanikos.php',
    'serviceType' => 'Engineering'
  ];
  include $_SERVER['DOCUMENT_ROOT'].'/partials/schema-service.php';
  ?>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    /* Page styles aligned with logistiki.php */
    .company-container{max-width:1200px;margin:0 auto;padding:0 32px}
    .company-section{padding:80px 0;}

    @keyframes fadeSlideIn { from {opacity:0; transform: translateY(20px);} to {opacity:1; transform: translateY(0);} }
    .company-section h2 { margin:0 0 20px; font-size:clamp(26px,2.6vw,38px); line-height:1.15; color:var(--brand); position:relative; opacity:0; animation: fadeSlideIn 0.8s ease forwards; }
    .company-section h2::after{ content:""; display:block; width:60px; height:4px; background:var(--brand); margin-top:10px; border-radius:4px; }
    .company-section h3 { margin:34px 0 8px; font-size:clamp(20px,3.4vw,26px); color:var(--brand); letter-spacing:-.01em; }
    .company-section p{line-height:1.8;font-size:18px;margin:0 0 18px;color:#111827}

    .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
    @media(max-width:1000px){.grid-2{grid-template-columns:1fr;gap:30px}}

    .highlight{font-size:20px;font-weight:600;color:var(--brand);margin:26px 0;line-height:1.6}

    .callout{background:linear-gradient(180deg, #ffffff 0%, #f6f9ff 100%);border:1px solid #e6ecff;border-radius:16px;padding:20px 22px;box-shadow:0 8px 24px rgba(0,0,0,.06)}
    .callout .quote{font-style:italic;color:#3b4b6a;margin-bottom:8px}
    .callout p{margin:0;color:#5b6b7b}

    .services{display:grid;gap:14px;margin:6px 0 8px;grid-template-columns:1fr}
    @media (min-width:860px){.services{grid-template-columns:1fr 1fr}}
    .service{display:flex;align-items:flex-start;gap:10px}
    .service p{margin:0;color:#111827;line-height:1.6}
    .service strong{color:#111827}

    .features{display:grid;gap:18px;margin:6px 0 8px;grid-template-columns:1fr}
    @media (min-width:860px){.features{grid-template-columns:1fr 1fr}}
    .feature{display:flex;align-items:flex-start;gap:10px}
    .feature p{margin:0;color:#111827;line-height:1.6}
    .feature strong{color:#111827}

    .check{flex:0 0 24px;width:24px;height:24px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#e6f2ff;border:1px solid #cfe3ff;color:var(--brand);margin-top:2px}
    .check svg{width:14px;height:14px}

    .split{display:grid;grid-template-columns:1.3fr .9fr;gap:28px;align-items:start;margin-top:10px}
    @media (max-width:860px){.split{grid-template-columns:1fr}}

    .muted{color:#5b6b7b}

    /* Hero Section - Clean Animation Style */
    .hero-animated { height: 170px; background: #000; color: #f6f8fb; font-family: Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, "Helvetica Neue", Arial; overflow: hidden; position: sticky; top: 0; z-index: 50; border-bottom: 1px solid #333; }
    .hero-animated .stage { position: relative; z-index: 1; height: 100%; display: flex; align-items: center; justify-content: flex-start; }
    .hero-animated .stack { display: flex; flex-direction: column; gap: 0.8rem; align-items: flex-start; padding: 1.5rem 2.5rem; max-width: min(1200px, 92vw); }
    .hero-animated .headline { font-weight: 900; letter-spacing: .045em; line-height: 1.05; text-align: left; font-size: clamp(1.8rem, 5.5vw, 3.5rem); text-shadow: 0 0 24px rgba(255,255,255,.22); white-space: nowrap; }
    .hero-animated .headline b { background: linear-gradient(90deg, var(--brand), #3498db); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .hero-animated .row { display: flex; align-items: baseline; gap: clamp(.4rem, 1.2vw, .8rem); opacity: 1; }
    .hero-animated .left { font-weight: 900; letter-spacing: .045em; line-height: 1; font-size: clamp(1.2rem, 3.8vw, 2.8rem); text-shadow: 0 0 14px rgba(255,255,255,.22); }
    .hero-animated .right { font-weight: 900; letter-spacing: .045em; line-height: 1; font-size: clamp(1.2rem, 3.8vw, 2.8rem); min-width: 8ch; text-align: left; color: #e8f6ff; }
    .hero-animated .flip { display: inline-block; transform-origin: 50% 80%; -webkit-backface-visibility: hidden; backface-visibility: hidden; transform-style: preserve-3d; will-change: transform, opacity; }
    .hero-animated .flip.enter { animation: flipIn .7s cubic-bezier(.2,.8,.2,1) forwards; }
    @keyframes flipIn { 0% { transform: rotateX(90deg); opacity: 0; filter: blur(6px); } 60% { opacity: 1; } 100% { transform: rotateX(0); opacity: 1; filter: blur(0); } }
    .hero-animated .gap { display: inline-block; width: 0; vertical-align: baseline; }
    .hero-animated .gap.g1 { width: 3ch; }
    .hero-animated .gap.g2 { width: 2ch; }
    .hero-animated .rise { display: inline-block; transform: translateY(.9em); opacity: 0; animation: riseIn .7s ease forwards; }
    @keyframes riseIn { to { transform: translateY(0); opacity: 1; } }
    @media(max-width:768px){ .hero-animated { height: 120px; } .hero-animated .stack { padding: 1rem 1.5rem; gap: 0.6rem; } .hero-animated .headline { font-size: clamp(1.4rem, 4.5vw, 2.5rem); } .hero-animated .left, .hero-animated .right { font-size: clamp(1rem, 3.2vw, 2rem); } }
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
        <h2>Αρχιτεκτονικός Σχεδιασμός &amp; Δόμηση</h2>

        <div class="split">
          <div>
            <p>Ένας όμορφος και καλοσχεδιασμένος χώρος δεν είναι πολυτέλεια — είναι η βάση μιας επιτυχημένης εμπειρίας για τον πελάτη και ενός λειτουργικού περιβάλλοντος για τον επαγγελματία. Για όσους δεν δραστηριοποιούνται στον χώρο της αρχιτεκτονικής και της δόμησης, ο σχεδιασμός μπορεί να αποδειχθεί δύσκολος και συχνά κοστοβόρος: πολλά συνεργεία, διαφορετικοί προμηθευτές, ασυνεννοησία και υπερκοστολογήσεις.</p>
            <p>Εκεί ερχόμαστε εμείς. Με εμπειρία σε κάθε στάδιο της διαδικασίας — από τη μελέτη και τον σχεδιασμό έως την επίβλεψη και την ολοκλήρωση — αναλαμβάνουμε όλο το έργο με πλήρη διαφάνεια και ξεκάθαρη συμφωνία για το αποτέλεσμα. Σεβόμαστε τον προϋπολογισμό και τις ανάγκες κάθε επιχείρησης, προτείνοντας εξατομικευμένες, ρεαλιστικές και βιώσιμες λύσεις που συνδυάζουν αισθητική και λειτουργικότητα, ώστε να δημιουργήσουμε έναν χώρο που εκφράζει την ταυτότητα και την εικόνα του brand σας, αυξάνει την παραγωγικότητα και αξιοποιεί στο έπακρο κάθε τετραγωνικό.</p>
            <p>Η ομάδα των αρχιτεκτόνων και πολιτικών μηχανικών της <strong>Nerally</strong> συνδυάζει τεχνική ακρίβεια με δημιουργική προσέγγιση, διασφαλίζοντας ότι κάθε έργο είναι πλήρως τεκμηριωμένο, αισθητικά άρτιο και λειτουργικά άψογο.</p>
          </div>
          <aside class="callout">
            <div class="quote">«Σύμμαχοι της νέας εποχής»</div>
            <p class="muted">Στόχος μας είναι να δίνουμε χώρο στον επαγγελματία να αναπτύσσεται, αναλαμβάνοντας όσα τον βαραίνουν — από την ιδέα μέχρι το εργοτάξιο.</p>
          </aside>
        </div>

        <h3>Η προσέγγισή μας</h3>
        <p class="muted">Το σύγχρονο πλαίσιο σχεδιασμού και δόμησης απαιτεί ακρίβεια, γνώση και συνέπεια. Οι συνεχείς αλλαγές στον Νέο Οικοδομικό Κανονισμό (ΝΟΚ), οι διαδικασίες για άδειες μικρής κλίμακας, καθώς και οι προδιαγραφές για ενεργειακή απόδοση και προσβασιμότητα, καθιστούν απαραίτητη μια ολοκληρωμένη και τεκμηριωμένη προσέγγιση.</p>
        <p>Η τεχνογνωσία, η συνεχής εκπαίδευση και η μεθοδικότητά μας δεν είναι απλώς χαρακτηριστικά — είναι στόχος και αρχή, που μας καθοδηγεί στη διαρκή παροχή σταθερών, αξιόπιστων και ποιοτικών αποτελεσμάτων, με σεβασμό στο οικονομικό πλαίσιο κάθε έργου και δέσμευση για υψηλή αξία σε κάθε επένδυση.</p>

        <h3>Τι προσφέρουμε</h3>
        <div class="services">
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Έκδοση άδειας μικρής κλίμακας</strong> και διαχείριση απαιτούμενων δικαιολογητικών.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Project Management</strong> από τον σχεδιασμό μέχρι την ολοκλήρωση του έργου.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Έρευνα &amp; Έλεγχος χωροθέτησης</strong> χώρου με βάση κανονισμούς &amp; λειτουργικές ανάγκες.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Μελέτες Πυροπροστασίας</strong> και συμμόρφωση με απαιτούμενα πρότυπα.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Επίβλεψη εργασιών</strong> και συντονισμός συνεργείων για τήρηση ποιότητας &amp; χρονοδιαγράμματος.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Υπολογισμός κόστους έργου</strong> με διαφάνεια και ρεαλιστικά χρονοδιαγράμματα.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Φωτορεαλιστικές απεικονίσεις</strong> για καθαρή λήψη αποφάσεων πριν την κατασκευή.</p>
          </div>
        </div>

        <h3>Πού διαφοροποιούμαστε</h3>
        <div class="features">
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Ακρίβεια στην τεκμηρίωση και το κανονιστικό πλαίσιο</strong> (ΝΟΚ, προσβασιμότητα, ενεργειακή απόδοση).</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Διαφανής κοστολόγηση</strong> και ρεαλιστικά χρονοδιαγράμματα.</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Ομάδα αρχιτεκτόνων &amp; πολιτικών μηχανικών</strong> με πολυκλαδική εμπειρία.</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Σύγχρονες φωτορεαλιστικές απεικονίσεις</strong> που βοηθούν στη λήψη αποφάσεων πριν την κατασκευή.</p>
          </div>
        </div>

        <h3>Το όραμά μας</h3>
        <p>Να μετατρέπουμε κάθε σχεδιαστική πρόκληση σε ευκαιρία για ανάπτυξη, δημιουργώντας περιβάλλοντα που εμπνέουν, εξυπηρετούν και εξελίσσουν την επιχείρησή σας.</p>

        <div class="callout" style="margin-top:14px;">
          <div class="quote">«Η σταθερότητα και η ποιότητα χτίζονται με σχέδιο, ακρίβεια και συνεργασία — από την ιδέα μέχρι το εργοτάξιο.»</div>
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

      const words = ['LLY','ΑΔΕΙΟΔΟΤΗΣΕΙΣ','ΜΕΛΕΤΕΣ','ΠΥΡΟΠΡΟΣΤΑΣΙΑ','ΕΠΙΒΛΕΨΗ','PROJECT MGMT','ΚΟΣΤΟΛΟΓΗΣΗ','ΝΟΚ','ΠΡΟΣΒΑΣΙΜΟΤΗΤΑ','RENDERS'];
      let i = 0;
      flipTo(words[i++ % words.length]);
      setInterval(() => flipTo(words[i++ % words.length]), 1900);
    })();
  </script>
</body>
</html>





