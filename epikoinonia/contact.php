<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Επικοινωνία - Nerally</title>
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />
  <link rel="stylesheet" href="/css/legal-modal.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/site-config-inline.php'; ?>
  <style>
    /* Hero Section - Exact copy from company.php */
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

    /* Use existing contact page classes and minimal overrides */
    .contact-page .main-content { margin-top: 0; }
    .contact-form textarea { resize: vertical; min-height: 120px; }

  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <!-- Hero Section with Text Animation (CONTACT variant) -->
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
  <section class="relative overflow-hidden" style="min-height: 100vh; background: linear-gradient(to bottom, white, #fafafa, #f5f5f5);">
    <div class="relative max-w-6xl mx-auto px-4 py-16">
      <div class="grid md:grid-cols-2 gap-10 items-start">

        <!-- Left content -->
        <div class="space-y-8">
          <div class="flex items-center gap-3">
            <svg class="h-8 w-8 text-neutral-800" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 5 17 10"></polyline><line x1="12" y1="5" x2="12" y2="19"></line></svg>
            <h2 class="text-3xl md:text-4xl font-semibold tracking-tight">Φόρμα Επικοινωνίας</h2>
          </div>
          <p class="text-neutral-600 text-base leading-relaxed">
            Είστε επιχείρηση ή επαγγελματίας και θέλετε να συνεργαστούμε; Επικοινωνήστε μαζί μας για συνεργασίες, προτάσεις ή πληροφορίες σχετικά με τις υπηρεσίες μας.
          </p>

          <!-- Contact info card -->
          <div class="p-6 rounded-2xl border border-neutral-200 bg-white shadow-lg hover:shadow-xl transition">
            <h3 class="text-base font-semibold mb-3">Στοιχεία Επικοινωνίας</h3>
            <ul class="space-y-2 text-sm text-neutral-700">
              <li class="flex items-start gap-3"><svg class="h-4 w-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.86 19.86 0 0 1 3.1 4.18 2 2 0 0 1 5.05 2h3a2 2 0 0 1 2 1.72c.12.81.3 1.6.57 2.36a2 2 0 0 1-.45 2.11L9 9a16 16 0 0 0 6 6l.81-1.17a2 2 0 0 1 2.11-.45c.76.27 1.55.45 2.36.57A2 2 0 0 1 22 16.92z"/></svg> Τηλ.: <a href="tel:+306946365798" class="underline decoration-neutral-300 hover:decoration-neutral-500">+30 694 636 5798</a></li>
              <li class="flex items-start gap-3"><svg class="h-4 w-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg> Email: <a href="mailto:info@nerally.gr" class="underline decoration-neutral-300 hover:decoration-neutral-500">info@nerally.gr</a></li>
              <li class="flex items-start gap-3"><svg class="h-4 w-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Διεύθυνση: Εξ αποστάσεως σε όλη την Ελλάδα</li>
              <li class="flex items-start gap-3"><svg class="h-4 w-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Ώρες: Δευ–Παρ 09:00–17:00</li>
            </ul>

            <!-- Social media -->
            <div class="mt-6">
              <h4 class="font-semibold text-sm mb-2">Connect with us</h4>
              <div class="flex gap-4 text-neutral-600">
                <a href="#" aria-label="LinkedIn" class="hover:text-[#0077B5] transition"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
                <a href="#" aria-label="Instagram" class="hover:text-[#E4405F] transition"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3H7c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3h10z"/><circle cx="12" cy="12" r="3.5"/><circle cx="17.5" cy="6.5" r="1.5"/></svg></a>
                <a href="#" aria-label="TikTok" class="hover:text-[#010101] transition"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2c1.1 1.8 3.3 3 5.5 3v3.1c-1.3 0-2.5-.4-3.5-1v7.9a5.5 5.5 0 1 1-5.5-5.5v3a2.5 2.5 0 1 0 2.5 2.5V2z"/></svg></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Right: Contact Form -->
        <form id="contactForm" class="space-y-5 bg-white border border-neutral-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition w-full max-w-lg mx-auto" action="../contact-handler.php" method="POST">
          <h3 class="text-2xl font-semibold text-center mb-4">Φόρμα Επικοινωνίας</h3>

          <div>
            <label class="block text-sm font-medium mb-1">Ονοματεπώνυμο</label>
            <input type="text" name="name" autocomplete="name" class="w-full border border-neutral-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-neutral-300" placeholder="π.χ. Μαρία Παπαδοπούλου" required>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" autocomplete="email" class="w-full border border-neutral-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-neutral-300" placeholder="name@domain.gr" required>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Τηλέφωνο</label>
            <input type="tel" name="phone" autocomplete="tel" class="w-full border border-neutral-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-neutral-300" placeholder="69xxxxxxxx" required>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Μήνυμα</label>
            <textarea rows="5" name="message" class="w-full border border-neutral-300 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-neutral-300" placeholder="Γράψε εδώ το μήνυμά σου…" required></textarea>
          </div>

          <div class="space-y-3">
            <label class="flex items-start gap-3 text-sm text-neutral-700 bg-neutral-50 border border-neutral-200 rounded-xl p-4">
              <input type="checkbox" name="privacy" class="mt-1 h-4 w-4 rounded border-neutral-300" required>
              <span>Συμφωνώ με την <a href="#privacy" data-legal-open="privacy" class="font-bold underline">Πολιτική Απορρήτου*</a></span>
            </label>

            <label class="flex items-start gap-3 text-sm text-neutral-700 bg-neutral-50 border border-neutral-200 rounded-xl p-4">
              <input type="checkbox" name="newsletter" class="mt-1 h-4 w-4 rounded border-neutral-300">
              <span>Θέλω να λαμβάνω ενημερώσεις και προσφορές</span>
            </label>
          </div>

          <!-- Feedback message placeholder -->
          <div id="feedback" class="hidden text-sm font-medium text-center py-2 rounded-xl"></div>

          <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-neutral-900 text-white px-6 py-2.5 hover:bg-black transition-colors">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2L11 13"/><path d="M22 2l-7 20-4-9-9-4 20-7z"/></svg>
              Αποστολή Μηνύματος
            </button>
          </div>
          
          <div class="text-xs text-neutral-500 text-center mt-4">
            Αυτός ο ιστότοπος προστατεύεται από το reCAPTCHA και ισχύουν η 
            <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" class="underline">Πολιτική Απορρήτου</a> και οι 
            <a href="https://policies.google.com/terms" target="_blank" rel="noopener" class="underline">Όροι Χρήσης</a> της Google.
          </div>
        </form>
      </div>
    </div>
  </section>
  
  <!-- Footer -->
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  <script src="../js/contact-form.js"></script>
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/legal-modal.js"></script>
  <script src="../app.js"></script>
  <script>
    // Hero animation controller for contact - copy from company.php
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
        
        const words = ['ΕΠΙΚΟΙΝΩΝΙΑ','ΣΥΝΕΡΓΑΣΙΑ','ΥΠΟΣΤΗΡΙΞΗ','ΑΞΙΟΠΙΣΤΙΑ'];
        let i = 0;
        flipTo(words[i++ % words.length]);
        setInterval(() => flipTo(words[i++ % words.length]), 1900);
      })();
    })();

    // Feedback function for contact form
    function showFeedback() {
      const feedback = document.getElementById('feedback');
      feedback.classList.remove('hidden');
      feedback.textContent = '✅ Το μήνυμά σας στάλθηκε επιτυχώς!';
      feedback.classList.add('bg-green-100', 'text-green-800');
      setTimeout(() => feedback.classList.add('hidden'), 4000);
    }
  </script>
</body>
</html>