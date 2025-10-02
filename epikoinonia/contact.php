<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Επικοινωνία - Nerally</title>
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/legal-modal.css">
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/site-config-inline.php'; ?>
  <!-- GTM loads via cookie-consent.js after analytics consent -->
  <meta name="description" content="Επικοινωνήστε με τη Nerally. Γρήγορη και ασφαλής αποστολή μηνύματος.">
  <meta name="robots" content="index,follow">
  <meta property="og:title" content="Επικοινωνία - Nerally">
  <meta property="og:type" content="website">
</head>
<body class="contact-page">
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <main class="main-content">
    <section class="contact-section">
      <div class="container">
        <div class="contact-grid two-col">
          <!-- Left: Just a heading for now -->
          <div class="contact-left" aria-hidden="false">
            <h2 class="contact-hero">Contact us</h2>
          </div>

          <!-- Right: Contact form -->
          <div class="contact-right">
            <form id="contactForm" class="contact-form" action="/contact-handler.php" method="POST" novalidate>
              <div class="form-row">
                <div class="form-group floating-label">
                  <input type="text" id="name" name="name" required aria-required="true">
                  <label for="name">Ονοματεπώνυμο *</label>
                </div>
                <div class="form-group floating-label">
                  <input type="email" id="email" name="email" required aria-required="true">
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

              <div class="form-group floating-label">
                <textarea id="message" name="message" rows="5" required aria-required="true"></textarea>
                <label for="message">Μήνυμα *</label>
              </div>

              <div class="form-group checkbox-group">
                <label class="checkbox-label">
                  <input type="checkbox" id="privacy" name="privacy" required aria-required="true">
                  <span class="text-content">Συμφωνώ με την <a href="#privacy" data-legal-open="privacy">Πολιτική Απορρήτου</a> *</span>
                </label>
              </div>

              <div class="form-group checkbox-group">
                <label class="checkbox-label">
                  <input type="checkbox" id="newsletter" name="newsletter">
                  <span class="text-content">Θέλω να λαμβάνω ενημερώσεις (newsletter)</span>
                </label>
              </div>

              <div class="recaptcha-info">
                Αυτός ο ιστότοπος προστατεύεται από το reCAPTCHA και ισχύουν η
                <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Πολιτική Απορρήτου</a> και οι
                <a href="https://policies.google.com/terms" target="_blank" rel="noopener">Όροι Υπηρεσίας</a> της Google.
              </div>

              <button type="submit" class="submit-btn">
                <span class="btn-text">Αποστολή Μηνύματος</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/floating-labels-inline.php'; ?>
  <script src="/js/legal-modal.js"></script>
  <script src="/js/contact-form.js"></script>
  <script src="/app.js"></script>
</body>
</html>




