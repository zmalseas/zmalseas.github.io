<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nerally - Ομάδα</title>
  <meta name="description" content="Γνωρίστε την ομάδα επαγγελματιών της Nerally. Έμπειροι σύμβουλοι, λογιστές, μηχανικοί και ειδικοί που συνεργάζονται για την επιτυχία σας." />
  <meta name="keywords" content="ομάδα Nerally, επαγγελματίες, λογιστές, σύμβουλοι, μηχανικοί" />
  <link rel="canonical" href="https://nerally.gr/etairia/team.php" />
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/cookie-consent.css">

  <script type="application/ld+json"<?php echo isset($nonce_attr) ? $nonce_attr : ''; ?>>
  <?php
  $schema = [
    "@context" => "https://schema.org",
    "@type" => "AboutPage",
    "name" => "Η Ομάδα της Nerally",
    "url" => "https://nerally.gr/etairia/team.php",
    "description" => "Γνωρίστε την ομάδα επαγγελματιών της Nerally. Έμπειροι σύμβουλοι, λογιστές, μηχανικοί και ειδικοί που συνεργάζονται για την επιτυχία σας.",
    "mainEntity" => [
      "@type" => "Organization",
      "name" => "Nerally",
      "url" => "https://nerally.gr"
    ]
  ];
  echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
  ?>
  </script>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    /* Hero Section - από company.php */
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

    @media(max-width:768px){
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

    /* Team page styles - ΑΚΡΙΒΩΣ από το template */
    :root{--bg:#f6f9fc;--card:#ffffff;--ink:#0f172a;--muted:#5b6b7a;--line:#dee6ef;--shadow:0 12px 28px rgba(15,23,42,.08);--radius:16px}
    html,body{margin:0;padding:0;background:var(--bg);color:var(--ink);font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif}
    .wrap{max-width:1140px;margin:0 auto;padding:56px 20px 96px}
    .eyebrow{color:var(--brand);font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:8px}
    h2{font-size:2rem;line-height:1.2;color:var(--brand);margin:0 0 8px}
    .lead{font-weight:600;margin:0 0 24px}
    p{color:var(--muted);line-height:1.75;margin:0 0 14px}
    .section{margin-top:48px}
    .divider{height:3px;width:48px;background:var(--brand);border-radius:8px;margin:0 0 18px}

    /* Cards */
    .cards{display:grid;gap:22px}
    @media(min-width:800px){.cards.cols-3{grid-template-columns:repeat(3,1fr)}}
    .card{background:var(--card);border:1px solid var(--line);border-radius:var(--radius);box-shadow:var(--shadow);padding:20px;text-align:center;transition:transform .3s}
    .card:hover{transform:translateY(-4px)}
    .avatar{width:120px;height:120px;border-radius:50%;object-fit:cover;margin:4px auto 12px;border:3px solid #e5effd}
    .role{font-size:.92rem;color:var(--muted);margin-top:2px}
    .badge{display:inline-block;margin-top:8px;padding:4px 8px;border-radius:999px;background:#f1f6ff;border:1px solid #dbeafe;font-size:.8rem}
    .profile-link{display:inline-block;margin-top:10px;font-size:.92rem;color:var(--brand);text-decoration:none;font-weight:700}

    /* Category headers - styled like company.php h2 */
    @keyframes fadeSlideIn {
      from {opacity:0; transform: translateY(20px);}
      to {opacity:1; transform: translateY(0);}
    }
    .cat {
      margin: 48px 0 20px;
    }
    .cat h3 {
      margin: 0 0 20px;
      font-size: clamp(24px, 2.4vw, 34px);
      line-height: 1.15;
      color: var(--brand);
      position: relative;
      opacity: 0;
      animation: fadeSlideIn 0.8s ease forwards;
    }
    .cat h3::after {
      content: "";
      display: block;
      width: 60px;
      height: 4px;
      background: var(--brand);
      margin-top: 10px;
      border-radius: 4px;
    }
    .cat .bar {
      display: none; /* Αφαιρούμε το παλιό bar element */
    }

    /* Modal */
    .modal{display:none;position:fixed;inset:0;background:rgba(2,6,23,.6);align-items:center;justify-content:center;z-index:50;padding:20px}
    .modal-card{background:var(--card);border:1px solid var(--line);border-radius:20px;box-shadow:var(--shadow);max-width:640px;width:100%;overflow:hidden}
    .modal-header{display:flex;align-items:center;gap:16px;padding:18px 22px;border-bottom:1px solid var(--line);background:linear-gradient(180deg,#f7fbff,#ffffff)}
    .modal-header img{width:72px;height:72px;border-radius:16px;object-fit:cover;border:3px solid #e5effd}
    .modal-header h3{margin:0;color:var(--brand)}
    .modal-body{padding:18px 22px;color:var(--muted)}
    .modal-footer{display:flex;justify-content:flex-end;gap:10px;padding:16px 22px;border-top:1px solid var(--line)}
    .btn{padding:10px 14px;border-radius:10px;border:1px solid var(--line);background:#fff;font-weight:700;cursor:pointer}
    .btn.primary{background:var(--brand);color:#fff;border-color:var(--brand)}
    .close-x{position:absolute;top:14px;right:16px;font-size:22px;color:#0f172a;cursor:pointer}
    .hidden{display:none !important}

    /* Team grid styles */
    .team-grid{display:grid;gap:20px}
    @media(min-width:900px){.team-grid.cols-3{grid-template-columns:repeat(3,1fr)}}
    .team-card{background:var(--card);border:1px solid var(--line);border-radius:16px;box-shadow:var(--shadow);padding:18px;text-align:center;transition:transform .25s}
    .team-card:hover{transform:translateY(-4px)}
    .team-card .avatar{width:120px;height:120px;border-radius:50%;object-fit:cover;margin:6px auto 10px;border:3px solid #e5effd}
    .team-card h4{margin:8px 0 4px;color:var(--brand)}
    .team-card .role{color:var(--muted);margin:0 0 8px}
    .contact{display:flex;justify-content:center;gap:12px;align-items:center;margin-top:10px}
    .contact a{display:inline-flex;align-items:center;gap:8px;padding:8px 10px;border:1px solid var(--line);border-radius:12px;text-decoration:none;color:var(--ink);font-weight:700;font-size:12px}
    .icon{width:18px;height:18px;display:inline-block}
    .social{display:flex;justify-content:center;gap:10px;margin-top:8px}
    .social a{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border:1px solid var(--line);border-radius:999px;text-decoration:none}
    .social a:hover{background:#f1f6ff}
  </style>
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <!-- Hero Section -->
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
  <main class="wrap">
    <h2 style="margin: 0 0 20px; font-size: clamp(26px, 2.6vw, 38px); line-height: 1.15; color: var(--brand); position: relative; opacity: 0; animation: fadeSlideIn 0.8s ease forwards;">Η ομάδα μας</h2>
    <style>
      h2::after {
        content: "";
        display: block;
        width: 60px;
        height: 4px;
        background: var(--brand);
        margin-top: 10px;
        border-radius: 4px;
      }
    </style>
    <p class="lead">Στη Nerally, πιστεύουμε πως η επιτυχία μιας επιχείρησης εξαρτάται από τους ανθρώπους που βρίσκονται γύρω της. Για αυτό και η δική μας ομάδα αποτελεί την καρδιά της φιλοσοφίας μας. Είμαστε μια ομάδα επαγγελματιών που προερχόμαστε από διαφορετικούς κλάδους, φέρνοντας μαζί μας εμπειρία, γνώση και εξειδίκευση, αλλά πάνω απ' όλα, κοινό όραμα.</p>

    <!-- Λογιστική (3 μέλη) -->
    <div class="cat"><div class="bar"></div><h3>Λογιστική</h3></div>
    <div class="team-grid cols-3">
      <article class="team-card">
        <img class="avatar" src="/images/team-xristos.jpg" alt="Χρήστος Γκουτούλας" loading="lazy" decoding="async">
        <h4>Χρήστος Γκουτούλας</h4>
        <p class="role">Λογιστής – Φοροτεχνικός</p>
        <div class="social">
          <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
          <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
        </div>
      </article>
      <article class="team-card">
        <img class="avatar" src="/images/team-aris.jpg" alt="Άρης Χαραλαμπίδης" loading="lazy" decoding="async">
        <h4>Άρης Χαραλαμπίδης</h4>
        <p class="role">Λογιστής – Φοροτεχνικός</p>
        <div class="social">
          <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
          <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
        </div>
      </article>
      <article class="team-card">
        <img class="avatar" src="/images/team-ioannis.webp" alt="Ιωάννης Λάμπης" loading="lazy" decoding="async">
        <h4>Ιωάννης Λαμπής</h4>
        <p class="role">Μισθοδοσία – Εργατικά</p>
        <div class="social">
          <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
          <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
        </div>
      </article>
    </div>

    <!-- Consulting (1) -->
    <div class="cat"><div class="bar"></div><h3>Consulting</h3></div>
    <div class="team-grid cols-3">
      <article class="team-card">
        <img class="avatar" src="/images/team-xaralambos.jpg" alt="Χαράλαμπος Ζυγκιρίδης" loading="lazy" decoding="async">
        <h4>Χαράλαμπος Ζυγκιρίδης</h4>
        <p class="role">Σύμβουλος Επιχειρήσεων</p>
        <div class="social">
          <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
          <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
        </div>
      </article>
    </div>

    <!-- Επιχορηγήσεις (placeholder) -->
    <div class="cat"><div class="bar"></div><h3>Επιχορηγήσεις</h3></div>
    <div class="team-grid cols-3">
      <article class="team-card">
        <img class="avatar" src="/images/placeholder-grants.jpg" alt="Προσθήκη σύντομα" loading="lazy" decoding="async">
        <h4>—</h4>
        <p class="role">Προσθήκη σύντομα</p>
        <div class="contact"><a href="tel:"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.11 5.18 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.72c.12.9.3 1.77.57 2.6a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.83.27 1.7.45 2.6.57A2 2 0 0 1 22 16.92z"/></svg>—</a></div>
        <div class="social">
          <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
          <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
        </div>
      </article>
    </div>

    <!-- Social Media Management (1) -->
    <div class="cat"><div class="bar"></div><h3>Social Media Management</h3></div>
    <div class="team-grid cols-3">
      <article class="team-card">
        <img class="avatar" src="/images/team-sotiris.jpg" alt="Σωτήρης Θυμιανίδης" loading="lazy" decoding="async">
        <h4>Σωτήρης Θυμιανίδης</h4>
        <p class="role">Social Media Manager</p>
        <div class="social">
          <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
          <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
        </div>
      </article>
    </div>

    <!-- Σύμβουλος Μηχανικός & Επιχορηγήσεις (1) -->
    <div class="cat"><div class="bar"></div><h3>Σύμβουλος Μηχανικός</h3></div>
    <div class="team-grid cols-3">
      <article class="team-card">
        <img class="avatar" src="/images/team-anastasios.jpg" alt="Αναστάσιος Αβραμίδης" loading="lazy" decoding="async">
        <h4>Αναστάσιος Αβραμίδης</h4>
        <p class="role">Σύμβουλος Μηχανικός</p>
        <div class="social">
          <a aria-label="LinkedIn" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8.98h5V24H0zM8.5 8.98H13v2.05h.07c.63-1.2 2.17-2.46 4.47-2.46 4.78 0 5.66 3.15 5.66 7.25V24h-5v-6.67c0-1.59-.03-3.63-2.21-3.63-2.21 0-2.55 1.73-2.55 3.52V24h-5z"/></svg></a>
          <a aria-label="Instagram" href="#" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
        </div>
      </article>
    </div>

  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  
  <script src="/js/navigation.js"></script>
  <script src="/js/cookie-consent.js"></script>
  <script src="/js/chat-widget.js"></script>
  <script<?php echo isset($nonce_attr) ? $nonce_attr : ''; ?>>
    // Hero animation controller
    (function(){
      const headline = document.getElementById('headline');
      const flipEl = document.getElementById('flip');
      if (!headline || !flipEl) return;
      
      const wait = (ms) => new Promise(resolve => setTimeout(resolve, ms));
      
      function flipTo(text) {
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
        
        const words = ['TEAM','ΟΜΑΔΑ','EXPERTS','ΣΥΜΒΟΥΛΟΙ','CONSULTING','ΣΥΝΕΡΓΑΣΙΑ'];
        let i = 0;
        flipTo(words[i++ % words.length]);
        setInterval(() => flipTo(words[i++ % words.length]), 1900);
      })();
    })();
  </script>
</body>
</html>