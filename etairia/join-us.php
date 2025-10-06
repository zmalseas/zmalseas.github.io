<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Αίτηση Θέσης – Nerally</title>
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/cookie-consent.css">
  <link rel="stylesheet" href="/css/legal-modal.css">
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/site-config-inline.php'; ?>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <main class="main-content contact-page">
    <section class="simple-header">
      <div class="container">
        <h1>Κάνε το επόμενο βήμα στην καριέρα σου</h1>
        <p>Συμπλήρωσε τη φόρμα και επισύναψε το βιογραφικό σου (PDF/JPG/PNG έως 5MB)</p>
      </div>
    </section>

    <section class="contact-section">
      <div class="container">
        <div class="contact-grid two-col">
          <!-- Αριστερά: περιεχόμενο -->
          <div class="contact-info-area info-card">
            <h2>Διαθέσιμες Θέσεις</h2>
            <div class="privacy-note">
              <p>Αυτή τη στιγμή <strong>δεν υπάρχουν ανοιχτές θέσεις</strong>. Μπορείς όμως να στείλεις το <strong>βιογραφικό</strong> σου για το αρχείο μας· εφόσον το επιθυμείς, θα μπορούμε να το <strong>προωθήσουμε σε συνεργαζόμενους πελάτες</strong> όταν υπάρξει ανάγκη που ταιριάζει στο προφίλ σου.</p>
            </div>

            <div class="info-card" style="margin-top:20px;">
              <h3>Συχνές Ερωτήσεις</h3>
              <ul class="benefits-list">
                <li>
                  <div class="benefit-icon">�</div>
                  <div class="benefit-text"><strong>Ποια αρχεία γίνονται δεκτά;</strong><span> PDF, JPG ή PNG έως 5MB.</span></div>
                </li>
                <li>
                  <div class="benefit-icon">🔐</div>
                  <div class="benefit-text"><strong>Πώς διαχειριζόμαστε το βιογραφικό;</strong><span> Χρησιμοποιείται μόνο για αξιολόγηση ή, με συναίνεση, προώθηση σε επιλεγμένους πελάτες σύμφωνα με την πολιτική απορρήτου.</span></div>
                </li>
                <li>
                  <div class="benefit-icon">�️</div>
                  <div class="benefit-text"><strong>Εμπιστευτικότητα & Ιδιωτικότητα</strong><span> Τα δεδομένα σου είναι απολύτως εμπιστευτικά και τηρούνται σύμφωνα με τον GDPR.</span></div>
                </li>
              </ul>
            </div>
          </div>

          <!-- Δεξιά: φόρμα -->
          <div class="contact-form-area">
            <div class="form-header">
              <h2>Φόρμα Υποψηφίου</h2>
              <p>Συμπλήρωσε τα στοιχεία και επισύναψε το βιογραφικό σου</p>
            </div>

            <form id="careersForm" class="contact-form" action="/careers-handler.php" method="POST" enctype="multipart/form-data">
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
                  <input type="tel" id="phone" name="phone" required>
                  <label for="phone">Τηλέφωνο *</label>
                </div>
                <div class="form-group floating-label">
                  <input type="text" id="company" name="company">
                  <label for="company">Εταιρεία</label>
                </div>
              </div>

              <div class="form-group floating-label full-width">
                <textarea id="about" name="about" rows="5" required></textarea>
                <label for="about">Σύντομη Περιγραφή *</label>
              </div>

              <div class="form-group">
                <label for="cv">Βιογραφικό (PDF, JPG ή PNG έως 5MB) *</label>
                <input type="file" id="cv" name="cv" accept="application/pdf,image/png,image/jpeg" required>
              </div>

              <div class="form-checkboxes">
                <div class="checkbox-group">
                  <label class="checkbox-label">
                    <input type="checkbox" id="promotion" name="promotion">
                    <span class="checkmark"></span>
                    Προώθηση σε επιλεγμένους πελάτες (προαιρετικό)
                  </label>
                </div>

                <div class="checkbox-group">
                  <label class="checkbox-label">
                    <input type="checkbox" id="privacy" name="privacy" required>
                    <span class="checkmark"></span>
                    Συμφωνώ με την <a href="#privacy" data-legal-open="privacy">Πολιτική Απορρήτου</a> *
                  </label>
                </div>
              </div>

              <button type="submit" class="submit-btn">
                <span class="btn-text">Αποστολή Αίτησης</span>
                <span class="btn-icon">→</span>
              </button>

              <div class="recaptcha-info">
                Αυτός ο ιστότοπος προστατεύεται από το reCAPTCHA και ισχύουν η 
                <a href="https://policies.google.com/privacy" target="_blank">Πολιτική Απορρήτου</a> και οι 
                <a href="https://policies.google.com/terms" target="_blank">Όροι Χρήσης</a> της Google.
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
    
  <script src="/js/legal-modal.js"></script>
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/floating-labels.js"></script>
  <script src="/js/careers-form.js"></script>
  <script src="../app.js"></script>
</body>
</html>





