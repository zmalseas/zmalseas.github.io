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

  <main class="main-content careers-page">
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

            <div class="careers-card positions-card">
              <div class="card-header">
                <span class="card-icon" aria-hidden="true">📄</span>
                <h3>Διαθέσιμες Θέσεις</h3>
              </div>
              <p>
                Αυτή τη στιγμή <strong>δεν υπάρχουν ανοιχτές θέσεις εργασίας</strong>.<br>
                Μπορείς να στείλεις το <strong>βιογραφικό σου</strong> για το αρχείο μας·
                εφόσον το επιθυμείς, θα μπορούμε να το <strong>προωθήσουμε σε συνεργαζόμενους πελάτες</strong>
                όταν υπάρξει ανάγκη που ταιριάζει στο προφίλ σου.
              </p>
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
              <h3 class="form-title">Φόρμα Υποψηφίου</h3>

              <div class="form-row">
                <div class="form-group">
                  <label for="name">Ονοματεπώνυμο</label>
                  <input type="text" id="name" name="name" required placeholder="π.χ. Μαρία Παπαδοπούλου" />
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" required placeholder="name@domain.gr" />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="phone">Τηλέφωνο</label>
                  <input type="tel" id="phone" name="phone" required placeholder="69xxxxxxxx" />
                </div>
                <div class="form-group">
                  <label for="company">Εταιρεία (προαιρετικό)</label>
                  <input type="text" id="company" name="company" placeholder="" />
                </div>
              </div>

              <div class="form-group full-width">
                <label for="about">Σύντομη Περιγραφή</label>
                <textarea id="about" name="about" rows="4" required placeholder="Γράψε λίγα λόγια για σένα, εμπειρία, ενδιαφέροντα…"></textarea>
              </div>

              <div class="form-group">
                <label for="cv">Βιογραφικό</label>
                <label for="cv" class="file-dropzone" id="cvDrop">
                  <input type="file" id="cv" name="cv" accept="application/pdf,image/png,image/jpeg" required hidden />
                  <span class="dz-icon" aria-hidden="true">⬆️</span>
                  <span class="dz-title">Σύρε & άφησε ή πάτησε για επιλογή</span>
                  <span class="dz-sub">PDF, JPG, PNG — έως 5MB</span>
                  <span class="dz-file" id="cvFileName" aria-live="polite"></span>
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
                  <span class="text-content">Συμφωνώ με την επεξεργασία των δεδομένων μου και αποδέχομαι την <a href="#privacy" data-legal-open="privacy">πολιτική απορρήτου</a>.</span>
                </label>
              </div>

              <button type="submit" class="submit-btn">
                <span class="btn-icon" aria-hidden="true">✉️</span>
                <span class="btn-text">Αποστολή Αίτησης</span>
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

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
    
  <script src="/js/legal-modal.js"></script>
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/careers-form.js"></script>
  <script src="../app.js"></script>
</body>
</html>





