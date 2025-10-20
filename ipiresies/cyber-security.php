<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!doctype html>
<html lang="el">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nerally — Cyber Security</title>
  <meta name="description" content="Υπηρεσίες Κυβερνοασφάλειας Nerally." />
  <meta name="keywords" content="cyber security, κυβερνοασφάλεια, προστασία δεδομένων, information security, Nerally" />
  <link rel="canonical" href="https://nerally.gr/ipiresies/cyber-security.php" />
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />

  <?php
  $serviceData = [
    'name' => 'Cyber Security',
    'description' => 'Προστασία των ψηφιακών σας περιουσιακών στοιχείων με σύγχρονες λύσεις κυβερνοασφάλειας. Ασφάλεια συστημάτων, διαχείριση κινδύνων, συμμόρφωση με πρότυπα ασφαλείας και εκπαίδευση προσωπικού για την αποτροπή κυβερνοεπιθέσεων.',
    'url' => 'https://nerally.gr/ipiresies/cyber-security.php',
    'serviceType' => 'Information Technology'
  ];
  include $_SERVER['DOCUMENT_ROOT'].'/partials/schema-service.php';
  ?>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <main class="main-content">
    <section class="hero">
      <div class="container">
        <h1>Cyber Security</h1>
        <p>Ασφάλεια συστημάτων, συμμόρφωση και εκπαίδευση προσωπικού.</p>
        <a class="btn" href="#contact">Ζήτησε προσφορά</a>
      </div>
    </section>

    <section class="section">
      <div class="container" id="contact">
        <h2>Επικοινωνία</h2>
        <p>Στείλε μας στο <a href="mailto:info@nerally.gr">info@nerally.gr</a>.</p>
      </div>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

    


    <script src="/js/navigation.js"></script>
    <script src="/js/cookie-consent.js"></script>
    <script src="/js/chat-widget.js"></script>
    <script src="../app.js" defer></script>
</body>
</html>





