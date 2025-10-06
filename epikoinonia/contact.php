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
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/site-config-inline.php'; ?>
  <style>
    /* Reuse company hero animation styles */
    .hero-animated { height: 170px; background:#000; color:#f6f8fb; overflow:hidden; position: sticky; top:0; z-index:50; border-bottom:1px solid #333; }
    .hero-animated .stage{position:relative;z-index:1;height:100%;display:flex;align-items:center;justify-content:flex-start}
    .hero-animated .stack{display:flex;flex-direction:column;gap:.8rem;align-items:flex-start;padding:1.5rem 2.5rem;max-width:min(1200px,92vw)}
    .hero-animated .headline{font-weight:900;letter-spacing:.045em;line-height:1.05;text-align:left;font-size:clamp(1.8rem,5.5vw,3.5rem);text-shadow:0 0 24px rgba(255,255,255,.22);white-space:nowrap}
    .hero-animated .headline b{background:linear-gradient(90deg,var(--brand),#3498db);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
    .hero-animated .row{display:flex;align-items:baseline;gap:clamp(.4rem,1.2vw,.8rem)}
    .hero-animated .left,.hero-animated .right{font-weight:900;letter-spacing:.045em;line-height:1;font-size:clamp(1.2rem,3.8vw,2.8rem)}
    .hero-animated .right{min-width:10ch;text-align:left;color:#e8f6ff}
    .hero-animated .flip{display:inline-block;transform-origin:50% 80%;-webkit-backface-visibility:hidden;backface-visibility:hidden;transform-style:preserve-3d;will-change:transform,opacity}
    .hero-animated .flip.enter{animation:flipIn .7s cubic-bezier(.2,.8,.2,1) forwards}
    @keyframes flipIn{0%{transform:rotateX(90deg);opacity:0;filter:blur(6px)}60%{opacity:1}100%{transform:rotateX(0);opacity:1;filter:blur(0)}}
    .hero-animated .gap{display:inline-block;width:0;vertical-align:baseline}
    .hero-animated .gap.g1{width:3ch}.hero-animated .gap.g2{width:2ch}
    .hero-animated .rise{display:inline-block;transform:translateY(.9em);opacity:0;animation:riseIn .7s ease forwards}
    @keyframes riseIn{to{transform:translateY(0);opacity:1}}
    @media(max-width:768px){.hero-animated{height:120px}.hero-animated .stack{padding:1rem 1.5rem;gap:.6rem}.hero-animated .headline{font-size:clamp(1.4rem,4.5vw,2.5rem)}.hero-animated .left,.hero-animated .right{font-size:clamp(1rem,3.2vw,2rem)}}

    /* Company-like section title for the form */
    @keyframes fadeSlideIn { from {opacity:0; transform: translateY(20px);} to {opacity:1; transform: translateY(0);} }
    .form-header h2{ margin:0 0 10px; font-size:clamp(26px,2.6vw,38px); line-height:1.15; color:var(--brand); position:relative; opacity:0; animation: fadeSlideIn .8s ease forwards; }
    .form-header h2::after{ content:""; display:block; width:60px; height:4px; background:var(--brand); margin-top:10px; border-radius:4px }
    .modern-form .recaptcha-info{ font-size:10px; margin:8px 0 0; padding:6px 0 0; border:none; color:#6b7280; text-align:center }
  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body class="contact-page">
  
  <!-- Include header directly -->
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <!-- Hero Section with Text Animation (CONTACT variant) -->
  <div class="hero-animated">
    <div class="stage">
      <div class="stack">
        <div class="headline" id="headline-contact">NERALLY</div>
        <div class="row">
          <div class="left"></div>
          <div class="right" id="flip-contact">ΕΠΙΚΟΙΝΩΝΙΑ</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <main class="main-content contact-page" style="margin-top:0; background: linear-gradient(to bottom, #ffffff, #f4f6fb, #f0f2f5);">
    <!-- Contact Section with new layout -->
    <section class="contact-section" style="padding: 4rem 0;">
      <div class="container" style="max-width: min(1200px, 92%);">
        <div class="contact-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2.5rem; align-items: start;">
          
          <!-- Left content -->
          <div class="contact-left" style="padding-right: 1rem;">
            <div class="contact-intro" style="margin-bottom: 2rem;">
              <div class="intro-title-row" style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                <svg class="intro-icon" style="height: 2rem; width: 2rem; color: #1f2937;" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                  <polyline points="7 10 12 5 17 10"></polyline>
                  <line x1="12" y1="5" x2="12" y2="19"></line>
                </svg>
                <h2 class="intro-title" style="font-size: clamp(1.8rem, 3.5vw, 2.5rem); font-weight: 600; color: #1f2937; margin: 0; letter-spacing: -0.025em;">Φόρμα Επικοινωνίας</h2>
              </div>
              <p class="intro-text" style="color: #6b7280; font-size: 1rem; line-height: 1.625; margin: 0;">Είστε επιχείρηση ή επαγγελματίας και θέλετε να συνεργαστούμε; Επικοινωνήστε μαζί μας για συνεργασίες, προτάσεις ή πληροφορίες σχετικά με τις υπηρεσίες μας.</p>
            </div>

            <!-- Contact info card -->
            <div class="contact-info-card" style="padding: 1.5rem; border-radius: 1rem; border: 1px solid #e5e7eb; background: white; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); transition: box-shadow 0.3s ease;">
              <h3 style="font-size: 1rem; font-weight: 600; margin: 0 0 0.75rem 0; color: #1f2937;">Στοιχεία Επικοινωνίας</h3>
              <ul class="contact-info-list" style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                <li class="contact-info-item" style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.875rem; color: #374151;">
                  <svg class="contact-icon" style="height: 1rem; width: 1rem; margin-top: 0.125rem; flex-shrink: 0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.86 19.86 0 0 1 3.1 4.18 2 2 0 0 1 5.05 2h3a2 2 0 0 1 2 1.72c.12.81.3 1.6.57 2.36a2 2 0 0 1-.45 2.11L9 9a16 16 0 0 0 6 6l.81-1.17a2 2 0 0 1 2.11-.45c.76.27 1.55.45 2.36.57A2 2 0 0 1 22 16.92z"/>
                  </svg>
                  Τηλ.: <a href="tel:+306946365798" style="color: inherit; text-decoration: underline; text-decoration-color: #d1d5db;">+30 694 636 5798</a>
                </li>
                <li class="contact-info-item" style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.875rem; color: #374151;">
                  <svg class="contact-icon" style="height: 1rem; width: 1rem; margin-top: 0.125rem; flex-shrink: 0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                  </svg>
                  Email: <a href="mailto:info@nerally.gr" style="color: inherit; text-decoration: underline; text-decoration-color: #d1d5db;">info@nerally.gr</a>
                </li>
                <li class="contact-info-item" style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.875rem; color: #374151;">
                  <svg class="contact-icon" style="height: 1rem; width: 1rem; margin-top: 0.125rem; flex-shrink: 0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                  </svg>
                  Διεύθυνση: Εξ αποστάσεως σε όλη την Ελλάδα
                </li>
              </ul>
            </div>
          </div>

          <!-- Right: Contact Form -->
          <div class="contact-right">
            <form id="contactForm" class="contact-form" action="../contact-handler.php" method="POST" style="background: white; border: 1px solid #e5e7eb; border-radius: 1rem; padding: 2rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); transition: box-shadow 0.3s ease; max-width: 32rem; margin: 0 auto; width: 100%;">
              <h3 class="form-title" style="font-size: 1.5rem; font-weight: 600; text-align: center; margin: 0 0 1rem 0; color: #1f2937;">Φόρμα Επικοινωνίας</h3>

              <div class="form-group" style="margin-bottom: 1.25rem;">
                <label for="name" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem; color: #1f2937;">Ονοματεπώνυμο</label>
                <input type="text" id="name" name="name" autocomplete="name" placeholder="π.χ. Μαρία Παπαδοπούλου" required style="width: 100%; border: 1px solid #d1d5db; border-radius: 0.75rem; padding: 0.625rem 1rem; font-size: 1rem; outline: none; transition: all 0.2s ease; box-sizing: border-box;">
              </div>

              <div class="form-group" style="margin-bottom: 1.25rem;">
                <label for="email" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem; color: #1f2937;">Email</label>
                <input type="email" id="email" name="email" autocomplete="email" placeholder="name@domain.gr" required style="width: 100%; border: 1px solid #d1d5db; border-radius: 0.75rem; padding: 0.625rem 1rem; font-size: 1rem; outline: none; transition: all 0.2s ease; box-sizing: border-box;">
              </div>

              <div class="form-group" style="margin-bottom: 1.25rem;">
                <label for="phone" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem; color: #1f2937;">Τηλέφωνο</label>
                <input type="tel" id="phone" name="phone" autocomplete="tel" placeholder="69xxxxxxxx" required style="width: 100%; border: 1px solid #d1d5db; border-radius: 0.75rem; padding: 0.625rem 1rem; font-size: 1rem; outline: none; transition: all 0.2s ease; box-sizing: border-box;">
              </div>

              <div class="form-group" style="margin-bottom: 1.25rem;">
                <label for="message" style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem; color: #1f2937;">Μήνυμα</label>
                <textarea id="message" name="message" rows="5" placeholder="Γράψε εδώ το μήνυμά σου…" required style="width: 100%; border: 1px solid #d1d5db; border-radius: 0.75rem; padding: 0.625rem 1rem; font-size: 1rem; outline: none; transition: all 0.2s ease; box-sizing: border-box; resize: vertical; min-height: 120px;"></textarea>
              </div>

              <div class="form-checkboxes" style="margin-bottom: 1.25rem; display: flex; flex-direction: column; gap: 0.75rem;">
                <label class="checkbox-wrapper" style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.875rem; color: #374151; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1rem; cursor: pointer;">
                  <input type="checkbox" id="privacy" name="privacy" required style="margin-top: 0.125rem; height: 1rem; width: 1rem; border-radius: 0.25rem; border: 1px solid #d1d5db; cursor: pointer;">
                  <span>Συμφωνώ με την <a href="#privacy" data-legal-open="privacy" class="privacy-link" style="text-decoration: underline; color: inherit;"><strong>Πολιτική Απορρήτου*</strong></a></span>
                </label>

                <label class="checkbox-wrapper" style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.875rem; color: #374151; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1rem; cursor: pointer;">
                  <input type="checkbox" id="newsletter" name="newsletter" style="margin-top: 0.125rem; height: 1rem; width: 1rem; border-radius: 0.25rem; border: 1px solid #d1d5db; cursor: pointer;">
                  <span>Θέλω να λαμβάνω ενημερώσεις και προσφορές</span>
                </label>
              </div>

              <div class="form-actions" style="display: flex; justify-content: flex-end;">
                <button type="submit" class="submit-button" style="display: inline-flex; align-items: center; gap: 0.5rem; border-radius: 0.75rem; background: #1f2937; color: white; padding: 0.625rem 1.5rem; border: none; cursor: pointer; font-size: 1rem; font-weight: 500; transition: background-color 0.2s ease;">
                  <svg class="submit-icon" style="height: 1rem; width: 1rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 2L11 13"/>
                    <path d="M22 2l-7 20-4-9-9-4 20-7z"/>
                  </svg>
                  Αποστολή Μηνύματος
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>
  
  <!-- Footer -->
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  <script src="../js/contact-form.js"></script>
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/legal-modal.js"></script>
  <script src="../app.js"></script>
  <script>
    // Hero animation controller for contact
    (function(){
      const headline = document.getElementById('headline-contact');
      const flipEl = document.getElementById('flip-contact');
      if (!headline || !flipEl) return;
      const wait = (ms) => new Promise(r=>setTimeout(r,ms));
      function flipTo(text){
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
        const words = ['ΕΠΙΚΟΙΝΩΝΙΑ','ΣΥΝΕΡΓΑΣΙΑ','ΑΞΙΟΠΙΣΤΙΑ','ΣΤΗΡΙΞΗ'];
        let i = 0; flipTo(words[i++ % words.length]);
        setInterval(()=> flipTo(words[i++ % words.length]), 1900);
      })();
    })();
  </script>
</body>
</html>