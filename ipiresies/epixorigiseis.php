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
  
  <style>
    .under-construction-section {
      min-height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 80px 32px;
      background: linear-gradient(135deg, #f8fafc 0%, #e8f4f8 100%);
    }
    
    .construction-container {
      max-width: 700px;
      text-align: center;
    }
    
    .construction-icon {
      font-size: 80px;
      margin-bottom: 24px;
      animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }
    
    .construction-title {
      font-size: clamp(32px, 5vw, 48px);
      color: #1a202c;
      margin: 0 0 16px;
      font-weight: 800;
    }
    
    .construction-subtitle {
      font-size: clamp(18px, 3vw, 24px);
      color: var(--brand);
      margin: 0 0 24px;
      font-weight: 600;
    }
    
    .construction-description {
      font-size: 18px;
      color: #4a5568;
      line-height: 1.7;
      margin: 0 0 40px;
    }
    
    .dots-container {
      display: flex;
      gap: 12px;
      justify-content: center;
      margin: 40px 0;
    }
    
    .dot {
      width: 16px;
      height: 16px;
      background: var(--brand);
      border-radius: 50%;
      animation: wave 1.4s ease-in-out infinite;
    }
    
    .dot:nth-child(2) {
      animation-delay: 0.2s;
    }
    
    .dot:nth-child(3) {
      animation-delay: 0.4s;
    }
    
    @keyframes wave {
      0%, 60%, 100% {
        transform: scale(1);
        opacity: 0.7;
      }
      30% {
        transform: scale(1.3);
        opacity: 1;
      }
    }
    
    .coming-soon-badge {
      display: inline-block;
      padding: 8px 20px;
      background: linear-gradient(135deg, var(--brand) 0%, #1e3a8a 100%);
      color: white;
      border-radius: 25px;
      font-weight: 600;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 32px;
      box-shadow: 0 4px 15px rgba(41, 128, 185, 0.3);
    }
    
    .contact-cta {
      margin-top: 48px;
      padding: 40px;
      background: #1a202c;
      border-radius: 16px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }
    
    .contact-cta p {
      font-size: 16px;
      color: #ffffff;
      margin-bottom: 20px;
    }
    
    .contact-cta .btn {
      display: inline-block;
      padding: 14px 32px;
      background: var(--brand);
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(41, 128, 185, 0.2);
    }
    
    .contact-cta .btn:hover {
      background: #1f5f8b;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(41, 128, 185, 0.3);
    }
  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <main class="main-content">
    <section class="under-construction-section">
      <div class="construction-container">
        <div class="coming-soon-badge">Coming Soon</div>
        
        <div class="construction-icon">💰</div>
        
        <h1 class="construction-title">Επιχορηγήσεις</h1>
        <h2 class="construction-subtitle">ΕΣΠΑ & Ευρωπαϊκά Προγράμματα</h2>
        
        <p class="construction-description">
          Η σελίδα βρίσκεται υπό κατασκευή.
        </p>
        
        <div class="dots-container">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
        
        <div class="contact-cta">
          <p>Θέλετε να ενημερωθείτε πρώτοι;</p>
          <a class="btn" href="/epikoinonia/contact">Επικοινωνήστε μαζί μας</a>
        </div>
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





