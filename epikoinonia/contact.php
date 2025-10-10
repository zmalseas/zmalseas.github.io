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
  <main class="main-content contact-page">
    <section class="contact-section">
      <div class="container">
        <div class="contact-grid two-col">
          
          <!-- Left content - Contact intro and info -->
          <div class="contact-left">
            <div class="contact-hero-info">
              <div class="contact-hero-title-row">
                <span class="contact-hero-icon" aria-hidden="true">📤</span>
                <h2 class="contact-hero-title">Φόρμα Επικοινωνίας</h2>
              </div>
              <p class="contact-hero-sub">Είστε επιχείρηση ή επαγγελματίας και θέλετε να συνεργαστούμε; Επικοινωνήστε μαζί μας για συνεργασίες, προτάσεις ή πληροφορίες σχετικά με τις υπηρεσίες μας.</p>
            </div>

            <!-- Contact info card -->
            <div class="contact-info-card">
              <h3>Στοιχεία Επικοινωνίας</h3>
              <ul class="contact-list">
                <li class="contact-li">
                  <span class="li-ico">📞</span> Τηλ.: <a href="tel:+306946365798">+30 694 636 5798</a>
                </li>
                <li class="contact-li">
                  <span class="li-ico">✉️</span> Email: <a href="mailto:info@nerally.gr">info@nerally.gr</a>
                </li>
                <li class="contact-li">
                  <span class="li-ico">📍</span> Διεύθυνση: Εξ αποστάσεως σε όλη την Ελλάδα
                </li>
                <li class="contact-li">
                  <span class="li-ico">🕒</span> Ώρες: Δευ–Παρ 09:00–17:00
                </li>
              </ul>

              <!-- Social media -->
              <div style="margin-top: 24px;">
                <h4 style="font-weight: 600; font-size: 14px; margin-bottom: 12px; color: #374151;">Connect with us</h4>
                <div style="display: flex; gap: 16px; color: #6b7280;">
                  <a href="#" aria-label="LinkedIn" style="color: inherit; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#0077B5'" onmouseout="this.style.color='#6b7280'">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                  </a>
                  <a href="#" aria-label="Instagram" style="color: inherit; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#E4405F'" onmouseout="this.style.color='#6b7280'">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3H7c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3h10z"/><circle cx="12" cy="12" r="3.5"/><circle cx="17.5" cy="6.5" r="1.5"/></svg>
                  </a>
                  <a href="#" aria-label="TikTok" style="color: inherit; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#010101'" onmouseout="this.style.color='#6b7280'">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2c1.1 1.8 3.3 3 5.5 3v3.1c-1.3 0-2.5-.4-3.5-1v7.9a5.5 5.5 0 1 1-5.5-5.5v3a2.5 2.5 0 1 0 2.5 2.5V2z"/></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Right: Contact Form -->
          <div class="contact-form-area">
            <form id="contactForm" class="modern-form" action="../contact-handler.php" method="POST">
              <h3 style="text-align: center; margin-bottom: 20px; color: #111827;">Φόρμα Επικοινωνίας</h3>

              <div class="form-group">
                <label for="name">Ονοματεπώνυμο</label>
                <input type="text" id="name" name="name" autocomplete="name" placeholder="π.χ. Μαρία Παπαδοπούλου" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" autocomplete="email" placeholder="name@domain.gr" required>
              </div>

              <div class="form-group">
                <label for="phone">Τηλέφωνο</label>
                <input type="tel" id="phone" name="phone" autocomplete="tel" placeholder="69xxxxxxxx" required>
              </div>

              <div class="form-group">
                <label for="message">Μήνυμα</label>
                <textarea id="message" name="message" rows="5" placeholder="Γράψε εδώ το μήνυμά σου…" required></textarea>
              </div>

              <div class="form-checkboxes">
                <label class="checkbox-label">
                  <input type="checkbox" id="privacy" name="privacy" required>
                  <span class="checkmark"></span>
                  Συμφωνώ με την <a href="#privacy" data-legal-open="privacy">Πολιτική Απορρήτου</a> *
                </label>

                <label class="checkbox-label">
                  <input type="checkbox" id="newsletter" name="newsletter">
                  <span class="checkmark"></span>
                  Θέλω να λαμβάνω ενημερώσεις και προσφορές
                </label>
              </div>

              <!-- Feedback message placeholder -->
              <div id="feedback" style="display: none; text-align: center; padding: 8px; border-radius: 12px; font-size: 14px; font-weight: 500; margin: 16px 0;"></div>

              <button type="submit" class="submit-btn">
                <span class="btn-text">Αποστολή Μηνύματος</span>
                <span class="btn-icon">→</span>
              </button>
              
              <div class="recaptcha-info">
                Αυτός ο ιστότοπος προστατεύεται από το reCAPTCHA και ισχύουν η 
                <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Πολιτική Απορρήτου</a> και οι 
                <a href="https://policies.google.com/terms" target="_blank" rel="noopener">Όροι Χρήσης</a> της Google.
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
      feedback.style.display = 'block';
      feedback.textContent = '✅ Το μήνυμά σας στάλθηκε επιτυχώς!';
      feedback.style.backgroundColor = '#dcfce7';
      feedback.style.color = '#166534';
      feedback.style.border = '1px solid #bbf7d0';
      setTimeout(() => feedback.style.display = 'none', 4000);
    }
  </script>
</body>
</html>