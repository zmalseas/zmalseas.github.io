<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!doctype html>
<html lang="el">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nerally — Επιχορηγήσεις</title>
  <meta name="description" content="Υποβολή σε προγράμματα επιχορηγήσεων." />
  <meta name="keywords" content="επιχορηγήσεις, ΕΣΠΑ, προγράμματα χρηματοδότησης, ευρωπαϊκά κονδύλια, Nerally" />
  <link rel="canonical" href="https://nerally.gr/ipiresies/epixorigiseis.php" />
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />

  <?php
  $serviceData = [
    'name' => 'Επιχορηγήσεις ΕΣΠΑ',
    'description' => 'Έλεγχος επιλεξιμότητας, προετοιμασία φακέλου, υποβολή σε προγράμματα επιχορηγήσεων ΕΣΠΑ και διαχείριση του έργου μέχρι την ολοκλήρωση. Πλήρης υποστήριξη για την αξιοποίηση ευρωπαϊκών κονδυλίων.',
    'url' => 'https://nerally.gr/ipiresies/epixorigiseis.php',
    'serviceType' => 'Consulting'
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
        <h1>Επιχορηγήσεις</h1>
        <p>Αναζήτηση, προετοιμασία φακέλου και διαχείριση έργου.</p>
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





