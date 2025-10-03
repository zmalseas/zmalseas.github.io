<!DOCTYPE html><!DOCTYPE html><!DOCTYPE html><!DOCTYPE html><!DOCTYPE html><!DOCTYPE html>

<html lang="el">

<head><html lang="el">

  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1" /><head><html lang="el">

  <title>Φόρος Ενοικίων — Υπολογιστής Nerally</title>

  <link rel="icon" type="image/png" href="../images/logo.png" />  <meta charset="UTF-8">

  <link rel="stylesheet" href="../main.css" />

  <link rel="stylesheet" href="/css/cookie-consent.css" />  <meta name="viewport" content="width=device-width, initial-scale=1.0"><head><html lang="el">

  <link rel="stylesheet" href="/css/legal-modal.css" />

  <style>  <title>Φόρος Ενοικίων — Υπολογιστής Nerally</title>

    <!DOCTYPE html>
    <html lang="el">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>ΦΟΡΟΛΟΓΙΑ ΕΝΟΙΚΙΩΝ – ΦΥΣΙΚΑ ΠΡΟΣΩΠΑ | Nerally</title>
      <link rel="icon" type="image/png" href="../images/logo.png" />
      <link rel="stylesheet" href="../main.css" />
      <link rel="stylesheet" href="/css/cookie-consent.css" />
      <link rel="stylesheet" href="/css/legal-modal.css" />
      <style>
        /* Page-local, scoped layout so global CSS can't break it */
        :root { --rent-gap: 0; }
        body { margin: 0; }
        .rent-wrap { display: grid; grid-template-columns: 1fr 1fr; min-height: calc(100vh - 120px); }
        .rent-left { background:#fff; padding:40px 32px; overflow:auto; }
        .rent-right { 
          padding:40px 24px; display:flex; align-items:center; justify-content:center;
          background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)), url('../images/Foros_enoikiwn_enhanced.webp');
          background-size: cover; background-position: center;
        }
        .rent-left h1 { color: var(--accent); font-size: 28px; margin: 0 0 20px; text-align:center; }
        .rent-left h2 { color: var(--accent); font-size: 20px; margin: 22px 0 10px; }
        .rent-left p { font-size: 15px; line-height: 1.7; margin: 0 0 14px; text-align: justify; }
        .rent-note { font-size: 13px; color: #555; background: #f6f7f8; border-radius: 6px; padding: 10px; margin-top: 6px; }
        .calc-slab { width:100%; max-width:540px; }
        @media (max-width: 960px) { .rent-wrap { grid-template-columns: 1fr; } .rent-right{ padding:28px 18px; } }
      </style>
    </head>
    <body>
      <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

      <main class="main-content" style="margin:0; padding:0; max-width:none; width:100%;">
        <section class="rent-wrap">

          <!-- Left: plain white prose, no tables/boxes -->
          <article class="rent-left">
            <h1>ΦΟΡΟΛΟΓΙΑ ΕΝΟΙΚΙΩΝ – ΦΥΣΙΚΑ ΠΡΟΣΩΠΑ</h1>

            <h2>Εισοδήματα από ενοίκια</h2>
            <p>Σύμφωνα με τον Κώδικα Φορολογίας Εισοδήματος (Ν.4172/2013), εισόδημα από ακίνητη περιουσία είναι το εισόδημα που προέρχεται από εκμίσθωση ή υπεκμίσθωση καθώς και το τεκμαρτό εισόδημα από ιδιοχρησιμοποίηση ακινήτων ή από δωρεάν παραχώρηση της χρήσης τους σε τρίτους.</p>
            <p>Επιπρόσθετα, εισόδημα από ακίνητη περιουσία θεωρείται και κάθε ποσό που προέρχεται από εκμίσθωση, υπεκμίσθωση ή δωρεάν παραχώρηση χρήσης χώρων τοποθέτησης επιγραφών και κοινόχρηστων χώρων. Επίσης, ως εισόδημα θεωρείται και το ποσό της αποζημίωσης για την πρόωρη λήξη της μίσθωσης που καταβλήθηκε από τον μισθωτή (ενοικιαστή).</p>

            <h2>Πώς φορολογούνται τα ενοίκια</h2>
            <p>Τα καθαρά εισοδήματα από ενοίκια (μετά την αφαίρεση των επιτρεπόμενων δαπανών) φορολογούνται αυτοτελώς, δηλαδή ξεχωριστά από τα λοιπά εισοδήματα του φυσικού προσώπου, με την ακόλουθη κλίμακα συντελεστών:</p>
            <p><strong>• Κάτω από 12.000€:</strong> 15%<br>
               <strong>• 12.001€ – 35.000€:</strong> 35%<br>
               <strong>• Πάνω από 35.001€:</strong> 45%</p>

            <h2>Δαπάνες μείωσης φόρου από ακίνητα</h2>
            <p>Όσα ακίνητα αποφέρουν φορολογητέο εισόδημα, ανεξάρτητα από το είδος και τη χρήση τους, έχουν έκπτωση <strong>5% επί του ακαθάριστου εισοδήματος</strong> που θα φορολογηθεί.</p>
            <p class="rent-note"><strong>Σημείωση:</strong> Από την έκπτωση αυτή εξαιρούνται οι περιπτώσεις υπεκμίσθωσης, το τεκμαρτό εισόδημα από ιδιοχρησιμοποίηση καθώς και η δωρεάν παραχώρηση χρήσης ακινήτων.</p>

            <h2>Λειτουργία της εφαρμογής</h2>
            <p>Η συγκεκριμένη εφαρμογή αναπτύχθηκε από τη <strong style="color: var(--accent);">Nerally</strong> και καλύπτει τις περιπτώσεις φορολόγησης εισοδήματος που αποκτά φυσικό πρόσωπο από τη μίσθωση ακίνητης περιουσίας.</p>
            <p>Για ειδικές περιπτώσεις όπως <strong>Βραχυχρόνιες μισθώσεις</strong>, <strong>Υπεκμισθώσεις</strong>, <strong>Εταιρικές Μισθώσεις</strong>, <strong>Ανείσπραχτα ενοίκια</strong>, <strong>Αναγνώριση δαπανών</strong> κ.ά., μπορείτε να <a href="/epikoinonia/contact.php" style="color: var(--accent); text-decoration: underline; font-weight: 600;">επικοινωνήσετε μαζί μας</a>.</p>
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
                    <input class="calc-input" id="count" type="number" min="1" max="5" step="1" value="1" />
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
                  <div class="brackets-title">Κλιμάκια φόρου</div>
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

      <script src="/js/legal-modal.js"></script>
      <script src="/js/cookie-consent.js"></script>
      <script src="../app.js" defer></script>
      <script src="../js/rent-tax-calculator.js" defer></script>
    </body>
    </html>