<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nerally - Careers</title>
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/cookie-consent.css">
  <script<?php echo isset($nonce_attr) ? $nonce_attr : ''; ?> type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Καριέρα στην Nerally",
    "url": "https://nerally.gr/etairia/join-us.php",
    "description": "Γίνε μέλος της ομάδας Nerally. Αναζητούμε ταλαντούχους επαγγελματίες.",
    "mainEntity": {
      "@type": "Organization",
      "name": "Nerally",
      "url": "https://nerally.gr"
    }
  }
  </script>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/site-config-inline.php'; ?>
  <style>
    /* Careers hero animation (based on company.php) */
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
  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <!-- Hero Section with Text Animation (CAREERS variant) -->
  <div class="hero-animated">
    <main class="stage">
      <div class="stack">
        <div id="headline-careers" class="headline" aria-live="polite"></div>
        <div class="row" id="row-careers">
          <div class="left">NERA</div>
          <div class="right"><span id="flip-careers" class="flip">CAREERS</span></div>
        </div>
      </div>
    </main>
  </div>

  <main class="main-content careers-page" style="margin-top:0;">
    <section class="careers-section">
      <div class="careers-bg"></div>
      <div class="container">
        <div class="careers-grid">
          <!-- Αριστερά: περιεχόμενο -->
          <div class="careers-left">
            <div class="careers-intro">
              <h2 class="careers-title">Κάνε το επόμενο βήμα στην καριέρα σου</h2>
              <p class="careers-subtitle">Συμπλήρωσε τη φόρμα δεξιά με τα στοιχεία σου και επισύναψε το <strong>βιογραφικό</strong> σου (PDF/JPG/PNG).</p>
            </div>

            <div class="positions-card">
              <div class="card-header">
                <span class="card-icon" aria-hidden="true"></span>
                <h3>Διαθέσιμες Θέσεις</h3>
              </div>
              <div class="positions-box">
              <p>
                Αυτή τη στιγμή <strong>δεν υπάρχουν ανοιχτές θέσεις εργασίας</strong>.<br>
                Μπορείς να στείλεις το <strong>βιογραφικό σου</strong> για το αρχείο μας.
                Εφόσον το επιθυμείς, θα μπορούμε να το <strong>προωθήσουμε σε συνεργαζόμενους πελάτες</strong>
                όταν υπάρξει ανάγκη που ταιριάζει στο προφίλ σου.
              </p>
              </div>
            </div>

            <div class="careers-card faq-card">
              <h3>Συχνές Ερωτήσεις</h3>
              <div class="faq-list">
                <details class="faq-item">
                  <summary>Ποια αρχεία γίνονται δεκτά;</summary>
                  <p>PDF, JPG ή PNG έως 5MB.</p>
                </details>
                <details class="faq-item">
                  <summary>Πώς διαχειριζόμαστε το βιογραφικό;</summary>
                  <p>Χρησιμοποιείται μόνο για αξιολόγηση ή, με συναίνεση, προώθηση σε επιλεγμένους πελάτες σύμφωνα με την πολιτική απορρήτου.</p>
                </details>
                <details class="faq-item">
                  <summary>Εμπιστευτικότητα & Ιδιωτικότητα</summary>
                  <p>Όλα τα δεδομένα που υποβάλλονται μέσω αυτής της φόρμας είναι <strong>απολύτως εμπιστευτικά</strong>. Δεν δημοσιοποιούνται, δεν κοινοποιούνται χωρίς τη συναίνεσή σου και τηρούνται σύμφωνα με τον <strong>GDPR</strong>.</p>
                </details>
              </div>
            </div>
          </div>

          <!-- Δεξιά: φόρμα -->
          <div class="careers-right">
            <form id="careersForm" class="careers-form careers-card" action="/careers-handler.php" method="POST" enctype="multipart/form-data">
              <h3 class="form-title" style="text-align:center;">Φόρμα Υποψηφίου</h3>

              <div class="form-group">
                <label for="name">Ονοματεπώνυμο</label>
                <input type="text" id="name" name="name" required />
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
              </div>

              <div class="form-group">
                <label for="phone">Τηλέφωνο</label>
                <input type="tel" id="phone" name="phone" required />
              </div>

              <div class="form-group full-width">
                <label for="about">Σύντομη Περιγραφή</label>
                <textarea id="about" name="about" rows="5" required></textarea>
              </div>

              <div class="form-group">
                <label for="cv">Βιογραφικό</label>
                <label for="cv" class="file-dropzone" id="cvDrop">
                  <input type="file" id="cv" name="cv" accept="application/pdf,image/png,image/jpeg" required hidden />
                  <span class="dz-icon" aria-hidden="true">⬆️</span>
                  <span class="dz-title">Σύρε & άφησε ή πάτησε για επιλογή PDF, JPG, PNG — έως 5MB</span>
                  <span class="dz-file" id="cvFileName" aria-live="polite"></span>
                  <button type="button" class="dz-clear" id="cvClear" aria-label="Καθαρισμός αρχείου" title="Καθαρισμός">×</button>
                </label>
              </div>

              <div class="form-checkboxes">
                <label class="checkbox-label careers-check">
                  <input type="checkbox" id="promotion" name="promotion" />
                  <span class="checkmark"></span>
                  <span class="text-content"><strong>Προώθηση σε πελάτες (προαιρετικό):</strong> Ναι, επιθυμώ — εφόσον ταιριάζει στο προφίλ μου — να προωθηθεί το βιογραφικό μου σε επιλεγμένους πελάτες σας για πιθανές ανάγκες στελέχωσης.</span>
                </label>

                <label class="checkbox-label careers-check">
                  <input type="checkbox" id="privacy" name="privacy" required />
                  <span class="checkmark"></span>
                  <span class="text-content">Συμφωνώ με την επεξεργασία των δεδομένων μου και αποδέχομαι την <a href="/legal/privacy.php" target="_blank">πολιτική απορρήτου</a>.</span>
                </label>
              </div>

              <div class="form-actions">
              <button type="submit" class="submit-btn">
                <span class="btn-icon" aria-hidden="true">✉️</span>
                <span class="btn-text">Αποστολή Αίτησης</span>
              </button>
              </div>

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

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
    

  <script src="/js/navigation.js"></script>
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/chat-widget.js"></script>
  <script src="/js/careers-form.js"></script>
  <script src="../app.js"></script>
  <script>
    // Careers hero animation controller
    (function(){
      const headline = document.getElementById('headline-careers');
      const flipEl = document.getElementById('flip-careers');
      if (!headline || !flipEl) return;
      const wait = (ms) => new Promise(r=>setTimeout(r,ms));
      function flipTo(text){
        flipEl.classList.remove('enter');
        void flipEl.offsetWidth;
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
        const words = ['CAREERS','ΕΥΚΑΙΡΙΕΣ','ΑΝΑΠΤΥΞΗ','ΟΜΑΔΑ','ΠΡΟΟΔΟΣ'];
        let i = 0; flipTo(words[i++ % words.length]);
        setInterval(()=> flipTo(words[i++ % words.length]), 1900);
      })();
    })();
  </script>
</body>
</html>





