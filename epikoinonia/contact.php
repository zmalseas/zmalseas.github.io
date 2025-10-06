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
    <main class="stage">
      <div class="stack">
        <div id="headline-contact" class="headline" aria-live="polite"></div>
        <div class="row" id="row-contact">
          <div class="left">NERA</div>
          <div class="right"><span id="flip-contact" class="flip">ΕΠΙΚΟΙΝΩΝΙΑ</span></div>
        </div>
      </div>
    </main>
  </div>

  <!-- Main Content -->
  <main class="main-content">
    <!-- Simple Page Header -->
    <section class="simple-header">
      <div class="container">
  <h1>Επικοινωνία</h1>
  <p>Επικοινωνήστε μαζί μας για συνεργασίες, προτάσεις ή πληροφορίες σχετικά με τις υπηρεσίες μας.</p>
      </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-section">
      <div class="container">
  <div class="contact-grid two-col">
          <!-- Contact Info - Now on Left -->
          <div class="contact-info-area">
            <div class="info-card">
              <h2>Γιατί να επιλέξετε τη Nerally;</h2>
              <p>Η Nerally αποτελεί την αξιόπιστη επιλογή σας για ολοκληρωμένες λογιστικές και φοροτεχνικές υπηρεσίες.</p>
              
              <ul class="benefits-list">
                <li>
                  <div class="benefit-icon">🎓</div>
                  <div class="benefit-text">
                    <strong>Εξειδικευμένο προσωπικό</strong>
                    <span>με πιστοποιήσεις και συνεχή εκπαίδευση</span>
                  </div>
                </li>
                <li>
                  <div class="benefit-icon">👥</div>
                  <div class="benefit-text">
                    <strong>Προσωποποιημένη εξυπηρέτηση</strong>
                    <span>για κάθε πελάτη</span>
                  </div>
                </li>
                <li>
                  <div class="benefit-icon">🔒</div>
                  <div class="benefit-text">
                    <strong>Σύγχρονες τεχνολογίες</strong>
                    <span>για ασφάλεια και αποδοτικότητα</span>
                  </div>
                </li>
                <li>
                  <div class="benefit-icon">💡</div>
                  <div class="benefit-text">
                    <strong>Συμβουλευτικές υπηρεσίες</strong>
                    <span>για βέλτιστη φορολογική διαχείριση</span>
                  </div>
                </li>
                <li>
                  <div class="benefit-icon">✨</div>
                  <div class="benefit-text">
                    <strong>Διαφάνεια και αξιοπιστία</strong>
                    <span>σε κάθε συναλλαγή</span>
                  </div>
                </li>
              </ul>
            </div>

            <div class="contact-details-card">
              <h4>Στοιχεία Επικοινωνίας</h4>
              <div class="contact-items">
                <div class="contact-item">
                  <div class="contact-icon">📞</div>
                  <div class="contact-text">
                    <span class="contact-label">Τηλέφωνο</span>
                    <a href="tel:+306946365798" class="contact-value">+30 694 636 5798</a>
                  </div>
                </div>
                <div class="contact-item">
                  <div class="contact-icon">✉️</div>
                  <div class="contact-text">
                    <span class="contact-label">Email</span>
                    <a href="mailto:info@nerally.gr" class="contact-value">info@nerally.gr</a>
                  </div>
                </div>
                <div class="contact-item">
                  <div class="contact-icon">�</div>
                  <div class="contact-text">
                    <span class="contact-label">Τοποθεσία</span>
                    <span class="contact-value">Εξ αποστάσεως σε όλη την Ελλάδα</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact Form - Now on Right -->
          <div class="contact-form-area">
            <div class="form-header">
              <h2>Στείλτε μας μήνυμα</h2>
              <p>Είστε επιχείρηση ή επαγγελματίας και θέλετε να συνεργαστούμε; Πείτε μας λίγα λόγια για το αίτημά σας.</p>
            </div>

            <form id="contactForm" class="modern-form" action="../contact-handler.php" method="POST">
              <div class="form-row">
                <div class="form-group floating-label">
                  <input type="text" id="name" name="name" required>
                  <label for="name">Ονοματεπώνυμο *</label>
                </div>
                <div class="form-group floating-label">
                  <input type="email" id="email" name="email" required>
                  <label for="email">Email *</label>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group floating-label">
                  <input type="tel" id="phone" name="phone">
                  <label for="phone">Τηλέφωνο</label>
                </div>
                <div class="form-group floating-label">
                  <input type="text" id="company" name="company">
                  <label for="company">Εταιρεία</label>
                </div>
              </div>

              <div class="form-group">
                <label for="service">Υπηρεσία Ενδιαφέροντος</label>
                <select id="service" name="service">
                  <option value="">Επιλέξτε υπηρεσία</option>
                  <option value="logistiki">Λογιστική</option>
                  <option value="misthodosia">Μισθοδοσία</option>
                  <option value="assurance">Assurance</option>
                  <option value="consulting">Consulting</option>
                  <option value="cyber-security">Cyber Security</option>
                  <option value="social-media">Social Media</option>
                  <option value="epixorigiseis">Επιχορηγήσεις</option>
                  <option value="symvoulos-mixanikos">Σύμβουλος Μηχανικός</option>
                </select>
              </div>

              <div class="form-group floating-label full-width">
                <textarea id="message" name="message" rows="5" required></textarea>
                <label for="message">Μήνυμα *</label>
              </div>

              <div class="form-checkboxes">
                <div class="checkbox-group">
                  <label class="checkbox-label">
                    <input type="checkbox" id="privacy" name="privacy" required>
                    <span class="checkmark"></span>
                    Συμφωνώ με την <a href="#privacy" data-legal-open="privacy">Πολιτική Απορρήτου</a> *
                  </label>
                </div>

                <div class="checkbox-group">
                  <label class="checkbox-label">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <span class="checkmark"></span>
                    Θέλω να λαμβάνω ενημερώσεις και προσφορές
                  </label>
                </div>
              </div>

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
  <script src="../js/floating-labels.js"></script>
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




