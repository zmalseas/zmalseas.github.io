<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Επικοινωνία - Nerally</title>
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="../css/contact-modern.css">
  <link rel="stylesheet" href="/css/legal-modal.css">
  <script src="/js/site-config.js"></script>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body class="contact-page">
  
  <!-- Include header directly -->
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <!-- Main Content -->
  <main class="main-content">
    <!-- Simple Page Header -->
    <section class="simple-header">
      <div class="container">
        <h1>Επικοινωνία</h1>
        <p>Επικοινωνήστε μαζί μας για τις λογιστικές και φοροτεχνικές σας ανάγκες</p>
      </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-section">
      <div class="container">
        <div class="contact-grid">
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
                  <div class="contact-icon">🕐</div>
                  <div class="contact-text">
                    <span class="contact-label">Ωράριο</span>
                    <span class="contact-value">Δευτέρα - Παρασκευή<br>9:00 - 17:00</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact Form - Now on Right -->
          <div class="contact-form-area">
            <div class="form-header">
              <h2>Στείλτε μας μήνυμα</h2>
              <p>Συμπληρώστε τη φόρμα και θα σας απαντήσουμε άμεσα</p>
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
                <a href="https://policies.google.com/privacy" target="_blank">Πολιτική Απορρήτου</a> και οι 
                <a href="https://policies.google.com/terms" target="_blank">Όροι Χρήσης</a> της Google.
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
  <script src="/js/legal-modal.js"></script>
  <script src="../app.js"></script>
</body>
</html>




