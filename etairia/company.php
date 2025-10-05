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
    .why li{display:flex;gap:14px;align-items:flex-start;font-size:17px;line-height:1.6;color:#000}
    .check{flex:0 0 26px;height:26px;border-radius:8px;background:var(--brand);color:#fff;display:grid;place-items:center;font-weight:800;font-size:16px;box-shadow:0 4px 10px rgba(41,128,185,.3)}

    /* Hero Section - Full Animation Style */
    .hero-animated {
      height: 200px;
      background: #09090f;
      color: #f6f8fb;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, "Helvetica Neue", Arial;
      overflow: hidden;
      position: relative;
      border-radius: 0 0 40px 40px;
      box-shadow: var(--shadow-lg);
    }
    
    .hero-animated .bg {
      position: fixed;
      inset: 0;
      z-index: 0;
      overflow: hidden;
    }
    
    .hero-animated svg {
      position: absolute;
      width: 160%;
      height: 160%;
      left: -30%;
      top: -30%;
    }
    
    .hero-animated .layer {
      mix-blend-mode: screen;
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
      background: linear-gradient(90deg, #4cc9f0, #7209b7);
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

    .hero-animated .hint {
      font-size: clamp(.8rem, 1.6vw, .9rem);
      color: #a9b2be;
      text-align: left;
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
        height: 150px;
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
      .hero-animated .hint {
        font-size: clamp(.7rem, 1.4vw, .8rem);
      }
    }
    
    /* Quote section */
    .quote{margin-top:20px;padding:24px;background:#fff;border:1px solid var(--muted);border-radius:var(--radius-xl);box-shadow:var(--shadow-md)}
    .quote blockquote{margin:0;font-size:20px;line-height:1.7;color:#000}
    .quote cite{display:block;margin-top:6px;font-size:14px;color:#64748b}
    
    .quote-box{background:radial-gradient(circle at top left,#eef4ff,#fff);border-radius:var(--radius-xl);padding:40px;box-shadow:var(--shadow-md)}
    .quote-box p{font-size:18px;color:var(--brand);margin:0}
    .quote-box p:last-child{color:#475569}


  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <!-- Hero Section with Full Animation -->
  <div class="hero-animated">
    <div class="bg" aria-hidden="true">
      <!-- Turbulence-based displacement for complex living gradients -->
      <svg class="layer" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMid slice" style="opacity:.9">
        <defs>
          <linearGradient id="sg1" x1="0" x2="1" y1="0" y2="0">
            <stop offset="0" stop-color="#4cc9f0"/>
            <stop offset="1" stop-color="#7209b7"/>
          </linearGradient>
          <filter id="dis1" x="-50%" y="-50%" width="200%" height="200%">
            <feTurbulence type="fractalNoise" baseFrequency="0.005 0.012" numOctaves="2" seed="2" result="turb">
              <animate attributeName="baseFrequency" dur="22s" values="0.004 0.011; 0.006 0.013; 0.0045 0.012; 0.004 0.011" repeatCount="indefinite"/>
            </feTurbulence>
            <feDisplacementMap in="SourceGraphic" in2="turb" scale="60" xChannelSelector="R" yChannelSelector="G"/>
            <feGaussianBlur stdDeviation="14"/>
          </filter>
        </defs>
        <path fill="url(#sg1)" filter="url(#dis1)"
          d="M0,540 C220,520 420,700 720,660 C980,630 1160,500 1420,560 C1520,580 1600,520 1600,520 L1600,900 L0,900 Z"></path>
      </svg>

      <svg class="layer" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMid slice" style="opacity:.8">
        <defs>
          <linearGradient id="sg2" x1="0" x2="1" y1="0" y2="0">
            <stop offset="0" stop-color="#00c2a8"/>
            <stop offset="1" stop-color="#4cc9f0"/>
          </linearGradient>
          <filter id="dis2" x="-50%" y="-50%" width="200%" height="200%">
            <feTurbulence type="fractalNoise" baseFrequency="0.006 0.01" numOctaves="2" seed="7" result="turb">
              <animate attributeName="baseFrequency" dur="28s" values="0.006 0.010; 0.007 0.012; 0.005 0.009; 0.006 0.010" repeatCount="indefinite"/>
            </feTurbulence>
            <feDisplacementMap in="SourceGraphic" in2="turb" scale="80" xChannelSelector="B" yChannelSelector="G"/>
            <feGaussianBlur stdDeviation="18"/>
          </filter>
        </defs>
        <path fill="url(#sg2)" filter="url(#dis2)"
          d="M0,660 C260,640 480,820 760,780 C1040,740 1240,600 1480,640 C1560,660 1600,620 1600,620 L1600,900 L0,900 Z"></path>
      </svg>

      <svg class="layer" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMid slice" style="opacity:.65">
        <defs>
          <linearGradient id="sg3" x1="0" x2="1" y1="0" y2="0">
            <stop offset="0" stop-color="#4cc9f0"/>
            <stop offset="1" stop-color="#00c2a8"/>
          </linearGradient>
          <filter id="dis3" x="-50%" y="-50%" width="200%" height="200%">
            <feTurbulence type="fractalNoise" baseFrequency="0.004 0.012" numOctaves="2" seed="11" result="turb">
              <animate attributeName="baseFrequency" dur="34s" values="0.004 0.012; 0.005 0.014; 0.0035 0.011; 0.004 0.012" repeatCount="indefinite"/>
            </feTurbulence>
            <feDisplacementMap in="SourceGraphic" in2="turb" scale="70" xChannelSelector="R" yChannelSelector="A"/>
            <feGaussianBlur stdDeviation="24"/>
          </filter>
        </defs>
        <path fill="url(#sg3)" filter="url(#dis3)"
          d="M0,760 C240,720 440,880 800,840 C1060,810 1300,700 1500,740 C1560,750 1600,720 1600,720 L1600,900 L0,900 Z"></path>
      </svg>
    </div>

    <main class="stage">
      <div class="stack">
        <div id="headline" class="headline" aria-live="polite"></div>
        <div class="row" id="row">
          <div class="left">NERA</div>
          <div class="right"><span id="flip" class="flip">LLY</span></div>
        </div>
        <div id="hint" class="hint"></div>
      </div>
    </main>
  </div>

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
  <script>
    // Clean animation script without chips
    const headline = document.getElementById('headline');
    const row = document.getElementById('row');
    const flipEl = document.getElementById('flip');
    const hint = document.getElementById('hint');

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

      const words = ['LLY', 'ΑΝΑΠΤΥΞΗ', 'ΟΙΚΟΝΟΜΙΚΑ', 'ΣΤΡΑΤΗΓΙΚΗ', 'ΧΡΗΜΑΤΟΔΟΤΗΣΗ', 'ΑΣΦΑΛΕΙΑ', 'ΚΑΙΝΟΤΟΜΙΑ', 'ΨΗΦΙΑΚΑ', 'ΕΜΠΙΣΤΟΣΥΝΗ'];
      let i = 0;
      flipTo(words[i++ % words.length]);
      setInterval(() => flipTo(words[i++ % words.length]), 1900);

      hint.textContent = 'Σύμμαχος Νέας Εποχής';
    })();
  </script>
</body>
</html>





