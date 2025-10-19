<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Social Media - Nerally | Σύμμαχος Νέας Εποχής</title>
  <meta name="description" content="Στρατηγική και διαχείριση social media, δημιουργία περιεχομένου και βίντεο που αναδεικνύουν την επιχείρησή σας." />
  <meta name="keywords" content="social media, digital marketing, content creation, video production, online presence, Nerally" />
  <meta name="author" content="Nerally" />
  <link rel="canonical" href="https://nerally.gr/ipiresies/social-media.php" />
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://nerally.gr/ipiresies/social-media.php" />
  <meta property="og:title" content="Social Media - Nerally | Σύμμαχος Νέας Εποχής" />
  <meta property="og:description" content="Στρατηγική και διαχείριση social media, δημιουργία περιεχομένου και βίντεο που αναδεικνύουν την επιχείρησή σας." />
  <meta property="og:image" content="https://nerally.gr/images/logo.png" />
  <meta property="og:locale" content="el_GR" />
  
  <!-- Twitter -->
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:url" content="https://nerally.gr/ipiresies/social-media.php" />
  <meta property="twitter:title" content="Social Media - Nerally | Σύμμαχος Νέας Εποχής" />
  <meta property="twitter:description" content="Στρατηγική και διαχείριση social media, δημιουργία περιεχομένου και βίντεο που αναδεικνύουν την επιχείρησή σας." />
  <meta property="twitter:image" content="https://nerally.gr/images/logo.png" />
  
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/cookie-consent.css">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    /* Social Media page styles - using company page style as template but with our brand colors */
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
        <h2>Social Media & Ψηφιακή Παρουσία</h2>

        <div class="split">
          <div>
            <p>Στη σημερινή ψηφιακή εποχή, μια ισχυρή παρουσία στα social media δεν είναι πολυτέλεια — είναι επιχειρηματική αναγκαιότητα. Στη <strong>Nerally</strong>, συνδυάζουμε την επιχειρηματική κατανόηση με την ψηφιακή εμπειρία για να δημιουργήσουμε στρατηγικές που μετατρέπουν τα social media από απλό μέσο επικοινωνίας σε ισχυρό εργαλείο ανάπτυξης.</p>
          </div>
          <aside class="callout">
            <div class="quote">«Η ταυτότητα στο ψηφιακό περιβάλλον είναι το νέο business card»</div>
            <p class="muted">Δημιουργούμε περιεχόμενο που εκφράζει την προσωπικότητα της επιχείρησής σας και συνδέεται με το κοινό σας.</p>
          </aside>
        </div>

        <h3>Η προσέγγισή μας</h3>
        <p class="muted">Κάθε επιχείρηση έχει τη δική της ιστορία. Αντί να εφαρμόσουμε γενικευμένες συνταγές, <strong>μελετάμε τον κλάδο σας, κατανοούμε τους στόχους σας</strong> και σχεδιάζουμε προσαρμοσμένες στρατηγικές. Από το πρώτο post μέχρι τις πιο σύνθετες καμπάνιες, στόχος μας είναι να δημιουργήσουμε μια <strong>αυθεντική ψηφιακή ταυτότητα</strong> που αντικατοπτρίζει την αξία της επιχείρησής σας.</p>

        <h3>Υπηρεσίες Social Media</h3>
        <div class="services">
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Στρατηγικός σχεδιασμός</strong> και ανάλυση ανταγωνισμού για κάθε πλατφόρμα.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Δημιουργία περιεχομένου</strong> (posts, stories, reels) προσαρμοσμένου στη brand identity.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Διαχείριση λογαριασμών</strong> Facebook, Instagram, LinkedIn, TikTok, YouTube.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Community management</strong> και άμεση απάντηση σε μηνύματα/σχόλια.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Προγραμματισμός δημοσιεύσεων</strong> και ημερολόγιο περιεχομένου.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Διαφημιστικές καμπάνιες</strong> (Facebook/Instagram Ads, LinkedIn Ads).</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Influencer collaborations</strong> και partnerships στον κλάδο σας.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Αναλυτικά στοιχεία</strong> και μηνιαίες αναφορές επίδοσης.</p>
          </div>
        </div>

        <h3>Δημιουργία Βίντεο</h3>
        <p>Το βίντεο είναι το μέσο που κυριαρχεί στα social media. Παράγουμε <strong>επαγγελματικό οπτικοακουστικό περιεχόμενο</strong> που τραβά την προσοχή και μεταδίδει το μήνυμά σας αποτελεσματικά:</p>

        <div class="services">
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Promotional videos</strong> για προϊόντα και υπηρεσίες.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Behind-the-scenes content</strong> που δημιουργεί προσωπική σύνδεση.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Educational content</strong> και tutorials για τον κλάδο σας.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Short-form content</strong> (Instagram Reels, TikTok videos, YouTube Shorts).</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Corporate interviews</strong> και testimonials πελατών.</p>
          </div>
          <div class="service">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Event coverage</strong> και live streaming για εκδηλώσεις.</p>
          </div>
        </div>

        <h3>Γιατί να επιλέξετε τη Nerally;</h3>
        <div class="features">
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Επιχειρηματική νοοτροπία:</strong> Κατανοούμε τους στόχους σας πέρα από το marketing.</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Προσαρμοσμένες στρατηγικές:</strong> Όχι copy-paste λύσεις, αλλά ψηφιακή παρουσία που σας αντιπροσωπεύει.</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Δημιουργική ομάδα:</strong> Content creators, video editors και strategic thinkers.</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Συνεχής βελτιστοποίηση:</strong> Αναλύουμε, μαθαίνουμε και προσαρμόζουμε τη στρατηγική.</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Διαφάνεια στα αποτελέσματα:</strong> Λεπτομερείς αναφορές και insights κάθε μήνα.</p>
          </div>
          <div class="feature">
            <span class="check" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <p><strong>Ολοκληρωμένη υποστήριξη:</strong> Από τη στρατηγική μέχρι την τεχνική υλοποίηση.</p>
          </div>
        </div>

        <h3>Το στόχος μας</h3>
        <p>Να μετατρέψουμε τα social media από «ακόμη μία υποχρέωση» σε <strong>τον ισχυρότερο σύμμαχό σας</strong> για την προβολή, την ανάπτυξη πελατολογίου και τη δημιουργία μιας αξιόπιστης ψηφιακής ταυτότητας που θα συνοδεύει την επιχείρησή σας στη νέα εποχή.</p>

        <div class="callout" style="margin-top:14px;">
          <div class="quote">«Κάθε post είναι μια ευκαιρία να δείξετε ποιοι είστε. Κάθε βίντεο, μια γέφυρα με τους μελλοντικούς σας πελάτες.»</div>
          <p class="muted" style="margin:0;"><em>Η creative ομάδα της Nerally</em></p>
        </div>
      </div>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

  <script src="/js/navigation.js"></script>
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/chat-widget.js"></script>
  <script src="../app.js" defer></script>

  <script>
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

      const words = ['LLY', 'SOCIAL', 'CONTENT', 'STRATEGY', 'CREATIVE', 'VIDEO', 'DIGITAL', 'BRANDING', 'COMMUNITY', 'GROWTH'];
      let i = 0;
      flipTo(words[i++ % words.length]);
      setInterval(() => flipTo(words[i++ % words.length]), 1900);
    })();
  </script>
</body>
</html>





