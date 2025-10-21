<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nerally - Υπολογισμος Φορου Ενοικίων</title>
  <meta name="description" content="Online υπολογισμός φόρου ενοικίων. Υπολογίστε τον φόρο που οφείλετε από εισοδήματα ακινήτων με ακρίβεια και ευκολία." />
  <meta name="keywords" content="φόρος ενοικίων, υπολογισμός φόρου ενοικίων, εισόδημα από ενοίκια, φορολόγηση ακινήτων, Φόρος απο νοίκι, Nerally" />
  <link rel="canonical" href="https://nerally.gr/efarmoges/rent-tax-calculator.php" />
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />

  <script<?php echo isset($nonce_attr) ? $nonce_attr : ''; ?> type="application/ld+json">
  <?php
  $schema = [
    "@context" => "https://schema.org",
    "@type" => "WebApplication",
    "name" => "Υπολογισμός Φόρου Ενοικίων 2025",
    "url" => "https://nerally.gr/efarmoges/rent-tax-calculator.php",
    "description" => "Online Υπολογισμός Φόρου Ενοικίων 2025. Υπολογίστε τον φόρο που οφείλετε από εισοδήματα ακινήτων με ακρίβεια και ευκολία.",
    "applicationCategory" => "FinanceApplication",
    "operatingSystem" => "Any",
    "offers" => [
      "@type" => "Offer",
      "price" => "0",
      "priceCurrency" => "EUR"
    ],
    "provider" => [
      "@type" => "Organization",
      "name" => "Nerally",
      "url" => "https://nerally.gr"
    ]
  ];
  echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
  ?>
  </script>

      <style>
        /* Page-local, scoped layout so global CSS can't break it */
        :root { 
          --rent-gap: 0; 
          --accent: #2980B9; /* Updated to blue color */
        }
        body { 
          margin: 0; 
          overflow-x: hidden; /* Removed horizontal scroll */
        }
  .rent-wrap { display: grid; grid-template-columns: 1fr 1fr; min-height: calc(100vh - 120px); }
  .rent-left { background:#f4f6fb; padding:40px 32px; overflow:auto; animation: contentFade 0.5s ease-out 0.06s both; }
        .rent-right { 
          padding:40px 24px; display:flex; align-items:center; justify-content:center;
          background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)), url('../images/Foros_enoikiwn_enhanced.webp');
          background-size: cover; background-position: center;
        }
        .rent-left h1 {
          color: #000;
          font-size: 28px;
          margin: 0 0 20px;
          text-align: center;
        }
        .rent-left h1::after {
          display: none;
        }
        @keyframes contentFade {
          from { opacity: 0; transform: translateY(8px); }
          to { opacity: 1; transform: translateY(0); }
        }
        
        .rent-left h2, .rent-left h3 { 
          color: var(--brand);
          font-weight: 800;
          position: relative;
          margin-bottom: 20px;
        }
        .rent-left h2 {
          font-size: clamp(28px, 3vw, 38px);
        }
        .rent-left h3 {
          font-size: clamp(20px, 2vw, 24px);
          margin-top: 40px;
        }
        .rent-left h2::after, .rent-left h3::after {
          content: "";
          display: block;
          width: 70px;
          height: 4px;
          background: var(--brand);
          border-radius: 6px;
          margin-top: 10px;
        }
        .rent-left p {
          font-size: 18px;
          color: #111827;
          margin-bottom: 22px;
          line-height: 1.9;
        }
        .rent-left ul {
          list-style-type: disc;
          padding-left: 20px;
          color: #111827;
        }
        .rent-left ul li {
          margin-bottom: 14px;
          font-size: 17px;
        }
        /* Make emphasized words in main text black + lighter bold */
        .rent-left p strong,
        .rent-left ul li strong { color: #000; font-weight: 600; }
        .rent-note { font-size: 13px; color: #555; background: #f6f7f8; border-radius: 6px; padding: 10px; margin-top: 6px; }
        .calc-slab { width:100%; max-width:540px; }

        /* New layout styles from φορος.html */
        .two-col {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(420px, 1fr));
          gap: 40px;
          align-items: start;
          margin-top: 40px;
        }

        .modern-table {
          max-width: 500px;
          margin: 0 auto;
          border-collapse: separate;
          border-spacing: 0;
          background: #fff;
          border: 1px solid #e5e7eb;
          border-radius: 12px;
          box-shadow: 0 8px 20px rgba(0,0,0,.06);
          overflow: hidden;
          text-align: center;
        }

        .modern-table thead th {
          background: #1f2937;
          color: #fff;
          text-align: center;
          padding: 14px 18px;
        }

        .modern-table tbody td {
          padding: 14px 18px;
          border-top: 1px solid #eef2f7;
          color: #111827;
          text-align: center;
        }

        .modern-table tbody tr:hover td {
          background: #f9fbff;
        }

        .quote {
          background: #fff;
          border-radius: 12px;
          padding: 24px 24px 88px 24px; /* leave extra space for bottom-right button */
          box-shadow: 0 4px 20px rgba(0,0,0,0.06);
          margin-top: 40px;
          font-size: 17px;
          color: #111827;
          position: relative;
        }
        
        .quote strong {
          color: var(--brand);
        }
        
        .quote a { color: var(--brand); text-decoration: underline; font-weight: 600; }
        /* CTA button bottom-right inside quote card */
        .quote .quote-cta {
          position: absolute;
          right: 16px; bottom: 16px;
          display: inline-flex; align-items: center; justify-content: center;
          padding: 10px 16px; border-radius: 8px; text-decoration: none;
          background: var(--brand); color: #fff; font-weight: 700; box-shadow: 0 4px 12px rgba(0,0,0,.08);
          transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }
        .quote .quote-cta:hover { background: #1f5f8b; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(0,0,0,.12); }
        

        
        /* Force calculator table text to be black */
        .calc-table td {
          color: #000 !important;
        }
        
        /* Force KPI values to be black */
        .kpi .val {
          color: #000 !important;
        }
        
        @media (max-width: 960px) { 
          .rent-wrap { 
            grid-template-columns: 1fr; 
            display: flex;
            flex-direction: column;
          } 
          .rent-right { 
            padding:28px 18px; 
            order: 1; /* Calculator appears first on mobile */
          }
          .rent-left { 
            order: 2; /* Text appears second on mobile */
          }
          .two-col {
            gap: 20px;
          }
          .modern-table {
            margin: 0 auto;
            max-width: 480px;
          }
          .quote { padding-bottom: 64px; }
          .quote .quote-cta { position: static; display: inline-flex; margin-top: 12px; }
        }

        /* Desktop-only slightly increased spacing */
        @media (min-width: 1024px) {
          .rent-left { padding: 52px 44px; }
          .rent-left h3 { margin-top: 52px; }
          .two-col { gap: 56px; }
          .rent-left p { margin-bottom: 26px; }
          .rent-left ul li { margin-bottom: 16px; }
        }
      </style>
    </head>
    <body>
      <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

      <main class="main-content" style="margin:0; padding:0; max-width:none; width:100%;">
        <section class="rent-wrap">

          <!-- Left: enhanced content with new design -->
          <article class="rent-left">
            <section id="rent-income">
              <h2>Εισοδήματα από ενοίκια</h2>
              <p>Σύμφωνα με τον Κώδικα Φορολογίας Εισοδήματος (Ν.4172/2013), εισόδημα από ακίνητη περιουσία είναι:</p>
              <ul>
                <li>το εισόδημα που προέρχεται από <strong>εκμίσθωση ή υπεκμίσθωση</strong>,</li>
                <li>το <strong>τεκμαρτό εισόδημα</strong> από ιδιοχρησιμοποίηση ακινήτων ή από δωρεάν παραχώρηση της χρήσης τους σε τρίτους,</li>
                <li>κάθε ποσό από εκμίσθωση υπεκείμενο ή δυνάμενο παρεχόμενη χρήση χώρων (τοποθέτηση επιγραφών, κοινόχρηστοι χώροι),</li>
                <li>το ποσό της <strong>αποζημίωσης</strong> για πρόωρη λύση μίσθωσης που καταβάλλεται από τον μισθωτή.</li>
              </ul>

              <div class="two-col">
                <div>
                  <h3>Πώς φορολογούνται τα ενοίκια</h3>
                  <p>Τα καθαρά εισοδήματα από ενοίκια (μετά την αφαίρεση των επιτρεπόμενων δαπανών) φορολογούνται <strong>αυτοτελώς</strong>, δηλαδή ξεχωριστά από τα λοιπά εισοδήματα του φυσικού προσώπου με τις παρακάτω κλίμακες συντελεστών:</p>
                  <table class="modern-table">
                    <thead>
                      <tr>
                        <th>Εισόδημα από Ενοίκια (€)</th>
                        <th>Συντελεστής %</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>&lt; 12.000</td>
                        <td>15%</td>
                      </tr>
                      <tr>
                        <td>12.001 - 35.000</td>
                        <td>35%</td>
                      </tr>
                      <tr>
                        <td>&gt; 35.001</td>
                        <td>45%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div>
                  <h3>Δαπάνες μείωσης φόρου από ακίνητα</h3>
                  <p>Όσα ακίνητα αποφέρουν φορολογητέο εισόδημα, ανεξάρτητα από το είδος και τη χρήση τους, έχουν <strong>έκπτωση 5%</strong> επί του ακαθάριστου εισοδήματος που θα φορολογηθεί.</p>
                  <p><em>Σημείωση: Από την έκπτωση εξαιρούνται:</em></p>
                  <ul>
                    <li>οι περιπτώσεις <strong>υπεκμίσθωσης</strong>,</li>
                    <li>το <strong>τεκμαρτό εισόδημα</strong> από ιδιοχρησιμοποίηση,</li>
                    <li>η <strong>δωρεάν παραχώρηση</strong> χρήσης ακινήτων.</li>
                  </ul>
                </div>
              </div>

              <h3>Λειτουργία της εφαρμογής</h3>
              <p>Η συγκεκριμένη εφαρμογή αναπτύχθηκε από τη <a href="/" style="color: var(--brand); text-decoration: underline; font-weight: 600;">Nerally</a> και καλύπτει τις περιπτώσεις φορολόγησης εισοδήματος που αποκτά φυσικό πρόσωπο από τη μίσθωση ακίνητης περιουσίας.</p>

              <div class="quote">
                Για ειδικές περιπτώσεις όπως <strong>Βραχυχρόνιες μισθώσεις</strong>, <strong>Υπεκμισθώσεις</strong>, <strong>Εταιρικές Μισθώσεις</strong>, <strong>Ανείσπρακτα ενοίκια</strong>, <strong>Αναγνώριση δαπανών</strong> κ.ά.
                <a class="quote-cta" href="/epikoinonia/contact.php">Επικοινωνήστε μαζί μας</a>
              </div>
            </section>
          </article>

          <!-- Right: calculator on image background -->
          <section class="rent-right">
            <div class="calc-slab">
              <section class="calc-card">
                <div class="calc-header">
                  <h2 class="calc-title-in-card">Φόρος Ενοικίων — Υπολογισμός & Κλιμάκια</h2>
                </div>
                <div class="calc-grid">
                  <div>
                    <label class="calc-label" for="count">Αριθμός ακινήτων (1–5)</label>
                    <input class="calc-input" id="count" type="number" min="0" max="5" step="1" value="1" />
                  </div>
                  <div class="calc-muted" style="align-self:end; font-size:12px;">Συμπλήρωσε μίσθωμα/μήνες για κάθε ακίνητο και πάτησε <strong>Υπολογισμός</strong>.</div>
                </div>
                <div id="props" class="calc-grid" style="margin-top:12px;"></div>
                <div class="calc-controls">
                  <button id="calcBtn" class="calc-button primary" type="button">Υπολογισμός</button>
                  <button id="resetBtn" class="calc-button" type="button">Επαναφορά</button>
                </div>
              </section>

              <section class="calc-card">
                <h2 class="results-title">Αποτελέσματα</h2>
                <div class="kpis">
                  <div class="kpi"><div class="label">Συνολικά έσοδα</div><div id="gross" class="val">—</div></div>
                  <div class="kpi"><div class="label">Φορολογητέο (95%)</div><div id="taxable" class="val">—</div></div>
                  <div class="kpi"><div class="label">Φόρος</div><div id="tax" class="val">—</div></div>
                </div>
                <div>
                  <div class="brackets-title">Κλιμάκιο φόρου</div>
                  <div class="calc-row" style="padding:0;">
                    <div class="table-wrapper">
                      <table class="calc-table">
                        <thead>
                          <tr>
                            <th>Κλιμάκιο</th>
                            <th class="r">Ποσό</th>
                            <th class="r">Συντελεστής</th>
                            <th class="r">Φόρος</th>
                          </tr>
                        </thead>
                        <tbody id="bracketRows">
                          <tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>
                        </tbody>
                        <tfoot id="bracketFoot"></tfoot>
                      </table>
                    </div>
                  </div>
                  <div class="disclaimer"><p>* Ο υπολογισμός είναι ενδεικτικός και βασίζεται στις ισχύουσες φορολογικές διατάξεις</p></div>
                </div>
              </section>
            </div>
          </section>

        </section>
      </main>

      <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>


      <script src="/js/navigation.js"></script>
      <script src="/js/cookie-consent.js"></script>
      <script src="/js/chat-widget.js"></script>
      <script src="../app.js" defer></script>
      <script src="../js/rent-tax-calculator.js" defer></script>
    </body>
    </html>