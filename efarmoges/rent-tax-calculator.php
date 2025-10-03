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

                📊 Δαπάνες μείωσης φόρου από ακίνητα          </h1>  <!-- GTM loads via cookie-consent.js after analytics consent -->

        <h2 style="color: var(--accent); font-size: 20px; margin-bottom: 15px;">

          🛠️ Λειτουργία της Εφαρμογής      </h2>

        </h2>

        <p style="font-size: 14px; line-height: 1.6; margin-bottom: 15px; text-align: justify;">      <p style="font-size: 14px; line-height: 1.6; margin-bottom: 15px; text-align: justify;">          </head>

          Η συγκεκριμένη εφαρμογή, αναπτύχθηκε από την <strong style="color: var(--accent);">Nerally</strong> και καλύπτει τις περιπτώσεις φορολόγησης του εισοδήματος που ένα φυσικό πρόσωπο αποκτά από την μίσθωση της ακίνητης περιουσίας του.

        </p>        Όσα ακίνητα αποφέρουν φορολογητέο εισόδημα, ανεξάρτητα από το είδος και τη χρήση αυτών έχουν έκπτωση <span style="color: var(--accent); font-weight: bold;">5% επί του ακαθάριστου εισοδήματος</span> που θα φορολογηθεί.

        <p style="font-size: 14px; line-height: 1.6; margin-bottom: 10px; text-align: justify;">

          Για ειδικές περιπτώσεις όπως <strong>Βραχυχρόνιες μισθώσεις</strong>, <strong>Υπεκμισθώσεις</strong>, <strong>Εταιρικές Μισθώσεις</strong>, <strong>Ανείσπραχτα ενοίκια</strong>, <strong>Αναγνώριση δαπανών</strong> κ.α. μπορείτε να:      </p>          <h2 style="color: var(--accent); font-size: 20px; margin-bottom: 15px;"><body>

        </p>

        <div style="background: #f8f9fa; padding: 12px; border-radius: 4px; margin-top: 10px;">      <p style="font-size: 14px; line-height: 1.6; margin-bottom: 15px; text-align: justify;">

          <p style="margin: 4px 0; font-size: 14px;">• Διαβάσετε τις σχετικές μελέτες στο blog μας</p>

          <p style="margin: 4px 0; font-size: 14px;">• <a href="/epikoinonia/contact.php" style="color: var(--accent); text-decoration: underline; font-weight: 600;">Επικοινωνήσετε μαζί μας</a> για εξατομικευμένη συμβουλευτική</p>        Η αναγνώριση της έκπτωσης αυτής, γίνεται αυτόματα με την εκκαθάριση της Φορολογικής Δήλωσης του φυσικού προσώπου, άνευ δικαιολογητικών, ως τεκμαρτή αναγνώριση εξόδων που χρειάστηκαν να γίνουν για επισκευή, συντήρηση, ανακαίνιση ή άλλες πάγιες και λειτουργικές δαπάνες.            📋 Εισοδήματα από ενοίκια  

        </div>

      </div>      </p>

      

      <!-- Right Section - Calculator -->      <p style="font-size: 13px; color: #666; font-style: italic; padding: 10px; background: #f8f9fa; border-radius: 4px; margin-bottom: 25px;">          </h2>  

      <div class="calculator-section">

        <div style="max-width: 500px; margin: 0 auto; width: 100%;">        <strong>Σημείωση:</strong> Από την έκπτωση αυτή, εξαιρούνται οι περιπτώσεις που το εισόδημα αποκτήθηκε από υπεκμίσθωση καθώς επίσης και το τεκμαρτό εισόδημα από ιδιοχρησιμοποίηση ακινήτων ή από δωρεάν παραχώρηση της χρήσης ακινήτων σε τρίτους.



          <section class="calc-card">      </p>          <p style="font-size: 14px; line-height: 1.6; margin-bottom: 15px; text-align: justify;">  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

            <div class="calc-header">

              <h2 class="calc-title-in-card">Φόρος Ενοικίων — Υπολογισμός & Κλιμάκια</h2>      

            </div>

                  <h2 style="color: var(--accent); font-size: 20px; margin-bottom: 15px;">            Σύμφωνα με τα όσα προβλέπει ο Κώδικας Φορολογίας Εισοδήματος (Ν.4172/13), εισόδημα από ακίνητη περιουσία, είναι το εισόδημα που προέρχεται από εκμίσθωση ή υπεκμίσθωση καθώς επίσης και το τεκμαρτό εισόδημα από ιδιοχρησιμοποίηση ακινήτων ή από δωρεάν παραχώρηση της χρήσης ακινήτων σε τρίτους.  

            <div class="calc-grid">

              <div>        🛠️ Λειτουργία της Εφαρμογής

                <label class="calc-label" for="count">Αριθμός ακινήτων (1–5)</label>

                <input class="calc-input" id="count" type="number" min="1" max="5" step="1" value="1" />      </h2>          </p>  <main class="main-content">

              </div>

              <div class="calc-muted" style="align-self:end; font-size: 12px;">      <p style="font-size: 14px; line-height: 1.6; margin-bottom: 15px; text-align: justify;">

                Συμπλήρωσε μίσθωμα/μήνες για κάθε ακίνητο και πάτησε <strong>Υπολογισμός</strong>.

              </div>        Η συγκεκριμένη εφαρμογή, αναπτύχθηκε από την <strong style="color: var(--accent);">Nerally</strong> και καλύπτει τις περιπτώσεις φορολόγησης του εισοδήματος που ένα φυσικό πρόσωπο αποκτά από την μίσθωση της ακίνητης περιουσίας του.          <p style="font-size: 14px; line-height: 1.6; margin-bottom: 25px; text-align: justify;">    <div class="calculator-layout">

            </div>

      </p>

            <div id="props" class="calc-grid" style="margin-top:12px;"></div>

      <p style="font-size: 14px; line-height: 1.6; margin-bottom: 10px; text-align: justify;">            Επιπρόσθετα, εισόδημα από ακίνητη περιουσία θεωρείται και κάθε ποσό που προέρχεται από εκμίσθωση ή υπεκμίσθωση ή δωρεάν παραχώρηση χρήσης χώρων τοποθέτησης επιγραφών και κοινόχρηστων χώρων. Επίσης το ποσό της αποζημίωσης για την πρόωρη λήξη της μίσθωσης που καταβλήθηκε από το μισθωτή (ενοικιαστή).      <!-- Left Section - Information -->

            <div class="calc-controls">

              <button id="calcBtn" class="calc-button primary" type="button">Υπολογισμός</button>        Για ειδικές περιπτώσεις όπως <strong>Βραχυχρόνιες μισθώσεις</strong>, <strong>Υπεκμισθώσεις</strong>, <strong>Εταιρικές Μισθώσεις</strong>, <strong>Ανείσπραχτα ενοίκια</strong>, <strong>Αναγνώριση δαπανών</strong> κ.α. μπορείτε να:

              <button id="resetBtn" class="calc-button" type="button">Επαναφορά</button>

            </div>      </p>          </p>      <div class="left-section">

          </section>

      <div style="background: #f8f9fa; padding: 12px; border-radius: 4px; margin-top: 10px;">

          <section class="calc-card">

            <h2 class="results-title">Αποτελέσματα</h2>        <p style="margin: 4px 0; font-size: 14px;">• Διαβάσετε τις σχετικές μελέτες στο blog μας</p>                  <div class="calculator-container" style="max-width: none; width: 100%;">

            <div class="kpis">

              <div class="kpi">        <p style="margin: 4px 0; font-size: 14px;">• <a href="/epikoinonia/contact.php" style="color: var(--accent); text-decoration: underline; font-weight: 600;">Επικοινωνήσετε μαζί μας</a> για εξατομικευμένη συμβουλευτική</p>

                <div class="label">Συνολικά έσοδα</div>

                <div id="gross" class="val">—</div>      </div>          <h2 style="color: var(--accent); font-size: 20px; margin-bottom: 15px;">          <h1 class="page-title" style="color: var(--accent); margin-bottom: 24px;">ΦΟΡΟΛΟΓΙΑ ΕΝΟΙΚΙΩΝ – ΦΥΣΙΚΑ ΠΡΟΣΩΠΑ</h1>

              </div>

              <div class="kpi">    </div>

                <div class="label">Φορολογητέο (95%)</div>

                <div id="taxable" class="val">—</div>                💰 Πώς φορολογούνται τα ενοίκια          

              </div>

              <div class="kpi">    <!-- Right Section - Calculator with Background Image -->

                <div class="label">Φόρος</div>

                <div id="tax" class="val">—</div>    <div style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../images/Foros_enoikiwn_enhanced.webp'); background-size: cover; background-position: center; padding: 40px; display: flex; flex-direction: column; justify-content: center;">          </h2>          

              </div>

            </div>      <div style="max-width: 500px; margin: 0 auto; width: 100%;">



            <div>          <p style="font-size: 14px; line-height: 1.6; margin-bottom: 15px; text-align: justify;">          <div style="width: 100%; background: white; padding: 32px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">

              <div class="brackets-title">Κλιμάκια φόρου</div>

              <div class="calc-row" style="padding:0;">        <section class="calc-card">

                <div class="table-wrapper">

                  <table class="calc-table">          <div class="calc-header">            Τα καθαρά εισοδήματα από ενοίκια, δηλαδή τα ποσά που προκύπτουν από την αφαίρεση των δαπανών που εκπίπτουν από τα ακαθάριστα ποσά εισοδημάτων από ακίνητα, φορολογούνται αυτοτελώς δηλαδή ξεχωριστά από τα υπόλοιπά εισοδήματα του Φυσικού Προσώπου, με κλίμακα στην οποία ισχύουν συντελεστές φόρου:            

                  <thead>

                    <tr>            <h2 class="calc-title-in-card">Φόρος Ενοικίων — Υπολογισμός & Κλιμάκια</h2>

                      <th>Κλιμάκιο</th>

                      <th class="r">Ποσό</th>          </div>          </p>            <h3 style="color: var(--accent); font-size: 1.4em; margin-bottom: 16px; padding-bottom: 8px; border-bottom: 2px solid rgba(var(--accent-rgb), 0.2);">

                      <th class="r">Συντελεστής</th>

                      <th class="r">Φόρος</th>          

                    </tr>

                  </thead>          <div class="calc-grid">                        📋 Εισοδήματα από ενοίκια

                  <tbody id="bracketRows">

                    <tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>            <div>

                  </tbody>

                  <tfoot id="bracketFoot"></tfoot>              <label class="calc-label" for="count">Αριθμός ακινήτων (1–5)</label>          <div style="background: #f8f9fa; padding: 15px; border-radius: 6px; margin-bottom: 25px; border-left: 3px solid var(--accent);">            </h3>

                </table>

                </div>              <input class="calc-input" id="count" type="number" min="1" max="5" step="1" value="1" />

              </div>

              <div class="disclaimer">            </div>            <p style="margin: 5px 0; font-size: 14px;"><strong>Εισόδημα κάτω από 12.000€:</strong> Φορολογείται με συντελεστή <span style="color: var(--accent); font-weight: bold;">15%</span></p>            <p style="line-height: 1.7; margin-bottom: 16px;">

                <p>* Ο υπολογισμός είναι ενδεικτικός και βασίζεται στις ισχύουσες φορολογικές διατάξεις</p>

              </div>            <div class="calc-muted" style="align-self:end; font-size: 12px;">

            </div>

          </section>              Συμπλήρωσε μίσθωμα/μήνες για κάθε ακίνητο και πάτησε <strong>Υπολογισμός</strong>.            <p style="margin: 5px 0; font-size: 14px;"><strong>Εισόδημα 12.001€ - 35.000€:</strong> Φορολογείται με συντελεστή <span style="color: var(--accent); font-weight: bold;">35%</span></p>              Σύμφωνα με τα όσα προβλέπει ο Κώδικας Φορολογίας Εισοδήματος (Ν.4172/13), εισόδημα από ακίνητη περιουσία, είναι το εισόδημα που προέρχεται από εκμίσθωση ή υπεκμίσθωση καθώς επίσης και το τεκμαρτό εισόδημα από ιδιοχρησιμοποίηση ακινήτων ή από δωρεάν παραχώρηση της χρήσης ακινήτων σε τρίτους.

        </div>

      </div>            </div>

    </div>

  </main>          </div>            <p style="margin: 5px 0; font-size: 14px;"><strong>Εισόδημα πάνω από 35.001€:</strong> Φορολογείται με συντελεστή <span style="color: var(--accent); font-weight: bold;">45%</span></p>            </p>



  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

  

  <script src="/js/legal-modal.js"></script>          <div id="props" class="calc-grid" style="margin-top:12px;"></div>          </div>            <p style="line-height: 1.7; margin-bottom: 24px;">

  <script src="/js/cookie-consent.js"></script>

  <script src="../app.js" defer></script>

  <script src="../js/rent-tax-calculator.js" defer></script>

</body>          <div class="calc-controls">                        Επιπρόσθετα, εισόδημα από ακίνητη περιουσία θεωρείται και κάθε ποσό που προέρχεται από εκμίσθωση ή υπεκμίσθωση ή δωρεάν παραχώρηση χρήσης χώρων τοποθέτησης επιγραφών και κοινόχρηστων χώρων. Επίσης το ποσό της αποζημίωσης για την πρόωρη λήξη της μίσθωσης που καταβλήθηκε από το μισθωτή (ενοικιαστή).

</html>
            <button id="calcBtn" class="calc-button primary" type="button">Υπολογισμός</button>

            <button id="resetBtn" class="calc-button" type="button">Επαναφορά</button>          <h2 style="color: var(--accent); font-size: 20px; margin-bottom: 15px;">            </p>

          </div>

        </section>            📊 Δαπάνες μείωσης φόρου από ακίνητα            



        <section class="calc-card">          </h2>            <hr style="border: none; height: 1px; background: rgba(var(--accent-rgb), 0.3); margin: 32px 0;">

          <h2 class="results-title">Αποτελέσματα</h2>

          <div class="kpis">          <p style="font-size: 14px; line-height: 1.6; margin-bottom: 15px; text-align: justify;">          

            <div class="kpi">

              <div class="label">Συνολικά έσοδα</div>            Όσα ακίνητα αποφέρουν φορολογητέο εισόδημα, ανεξάρτητα από το είδος και τη χρήση αυτών έχουν έκπτωση <span style="color: var(--accent); font-weight: bold;">5% επί του ακαθάριστου εισοδήματος</span> που θα φορολογηθεί.          <div class="info-box">

              <div id="gross" class="val">—</div>

            </div>          </p>            <h3>� Πώς φορολογούνται τα ενοίκια</h3>

            <div class="kpi">

              <div class="label">Φορολογητέο (95%)</div>          <p style="font-size: 14px; line-height: 1.6; margin-bottom: 15px; text-align: justify;">            <p style="line-height: 1.7; margin-bottom: 20px;">

              <div id="taxable" class="val">—</div>

            </div>            Η αναγνώριση της έκπτωσης αυτής, γίνεται αυτόματα με την εκκαθάριση της Φορολογικής Δήλωσης του φυσικού προσώπου, άνευ δικαιολογητικών, ως τεκμαρτή αναγνώριση εξόδων που χρειάστηκαν να γίνουν για επισκευή, συντήρηση, ανακαίνιση ή άλλες πάγιες και λειτουργικές δαπάνες.              Τα καθαρά εισοδήματα από ενοίκια, δηλαδή τα ποσά που προκύπτουν από την αφαίρεση των δαπανών που εκπίπτουν από τα ακαθάριστα ποσά εισοδημάτων από ακίνητα, φορολογούνται αυτοτελώς δηλαδή ξεχωριστά από τα υπόλοιπά εισοδήματα του Φυσικού Προσώπου, με κλίμακα στην οποία ισχύουν συντελεστές φόρου:

            <div class="kpi">

              <div class="label">Φόρος</div>          </p>            </p>

              <div id="tax" class="val">—</div>

            </div>          <p style="font-size: 13px; color: #666; font-style: italic; padding: 10px; background: #f8f9fa; border-radius: 4px; margin-bottom: 25px;">            

          </div>

            <strong>Σημείωση:</strong> Από την έκπτωση αυτή, εξαιρούνται οι περιπτώσεις που το εισόδημα αποκτήθηκε από υπεκμίσθωση καθώς επίσης και το τεκμαρτό εισόδημα από ιδιοχρησιμοποίηση ακινήτων ή από δωρεάν παραχώρηση της χρήσης ακινήτων σε τρίτους.            <div style="background: rgba(var(--accent-rgb), 0.05); padding: 20px; border-radius: 8px; border-left: 4px solid var(--accent); margin-bottom: 24px;">

          <div>

            <div class="brackets-title">Κλιμάκια φόρου</div>          </p>              <p style="margin: 8px 0; font-size: 1.1em;"><strong>Εισόδημα κάτω από 12.000€:</strong> Φορολογείται με συντελεστή <span style="color: var(--accent); font-weight: bold;">15%</span></p>

            <div class="calc-row" style="padding:0;">

              <div class="table-wrapper">                        <p style="margin: 8px 0; font-size: 1.1em;"><strong>Εισόδημα 12.001€ - 35.000€:</strong> Φορολογείται με συντελεστή <span style="color: var(--accent); font-weight: bold;">35%</span></p>

                <table class="calc-table">

                <thead>          <h2 style="color: var(--accent); font-size: 20px; margin-bottom: 15px;">              <p style="margin: 8px 0; font-size: 1.1em;"><strong>Εισόδημα πάνω από 35.001€:</strong> Φορολογείται με συντελεστή <span style="color: var(--accent); font-weight: bold;">45%</span></p>

                  <tr>

                    <th>Κλιμάκιο</th>            🛠️ Λειτουργία της Εφαρμογής            </div>

                    <th class="r">Ποσό</th>

                    <th class="r">Συντελεστής</th>          </h2>            

                    <th class="r">Φόρος</th>

                  </tr>          <p style="font-size: 14px; line-height: 1.6; margin-bottom: 15px; text-align: justify;">            <hr style="border: none; height: 1px; background: rgba(var(--accent-rgb), 0.3); margin: 32px 0;">

                </thead>

                <tbody id="bracketRows">            Η συγκεκριμένη εφαρμογή, αναπτύχθηκε από την <strong style="color: var(--accent);">Nerally</strong> και καλύπτει τις περιπτώσεις φορολόγησης του εισοδήματος που ένα φυσικό πρόσωπο αποκτά από την μίσθωση της ακίνητης περιουσίας του.          </div>

                  <tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>

                </tbody>          </p>          

                <tfoot id="bracketFoot"></tfoot>

              </table>          <p style="font-size: 14px; line-height: 1.6; margin-bottom: 10px; text-align: justify;">          <div class="info-box">

              </div>

            </div>            Για ειδικές περιπτώσεις όπως <strong>Βραχυχρόνιες μισθώσεις</strong>, <strong>Υπεκμισθώσεις</strong>, <strong>Εταιρικές Μισθώσεις</strong>, <strong>Ανείσπραχτα ενοίκια</strong>, <strong>Αναγνώριση δαπανών</strong> κ.α. μπορείτε να:            <h3>� Δαπάνες μείωσης φόρου από ακίνητα</h3>

            <div class="disclaimer">

              <p>* Ο υπολογισμός είναι ενδεικτικός και βασίζεται στις ισχύουσες φορολογικές διατάξεις</p>          </p>            <p>

            </div>

          </div>          <div style="background: #f8f9fa; padding: 12px; border-radius: 4px; margin-top: 10px;">              Όσα ακίνητα αποφέρουν φορολογητέο εισόδημα, ανεξάρτητα από το είδος και τη χρήση αυτών έχουν έκπτωση <strong>5% επί του ακαθάριστου εισοδήματος</strong> που θα φορολογηθεί.

        </section>

      </div>            <p style="margin: 4px 0; font-size: 14px;">• Διαβάσετε τις σχετικές μελέτες στο blog μας</p>            </p>

    </div>

  </div>            <p style="margin: 4px 0; font-size: 14px;">• <a href="/epikoinonia/contact.php" style="color: var(--accent); text-decoration: underline; font-weight: 600;">Επικοινωνήσετε μαζί μας</a> για εξατομικευμένη συμβουλευτική</p>            <p>



  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>          </div>              Η αναγνώριση της έκπτωσης αυτής, γίνεται αυτόματα με την εκκαθάριση της Φορολογικής Δήλωσης του φυσικού προσώπου, άνευ δικαιολογητικών, ως τεκμαρτή αναγνώριση εξόδων που χρειάστηκαν να γίνουν για επισκευή, συντήρηση, ανακαίνιση ή άλλες πάγιες και λειτουργικές δαπάνες.

  

  <script src="/js/legal-modal.js"></script>        </div>            </p>

  <script src="/js/cookie-consent.js"></script>

  <script src="../app.js" defer></script>      </div>            <p style="font-size: 0.9em; color: var(--text-secondary);">

  <script src="../js/rent-tax-calculator.js" defer></script>

</body>                    *Από την έκπτωση αυτή, εξαιρούνται οι περιπτώσεις που το εισόδημα αποκτήθηκε από υπεκμίσθωση καθώς επίσης και το τεκμαρτό εισόδημα από ιδιοχρησιμοποίηση ακινήτων ή από δωρεάν παραχώρηση της χρήσης ακινήτων σε τρίτους.

</html>
      <!-- Right Section - Calculator Application -->            </p>

      <div style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../images/Foros_enoikiwn.png'); background-size: cover; background-position: center; padding: 40px; display: flex; flex-direction: column; justify-content: center;">          </div>

        <div style="max-width: 500px; margin: 0 auto; width: 100%;">          

            

          <section class="calc-card">            <h3 style="color: var(--accent); font-size: 1.4em; margin-bottom: 16px; padding-bottom: 8px; border-bottom: 2px solid rgba(var(--accent-rgb), 0.2);">

            <div class="calc-header">              🛠️ Λειτουργία της Εφαρμογής

              <h2 class="calc-title-in-card">Φόρος Ενοικίων — Υπολογισμός & Κλιμάκια</h2>            </h3>

            </div>            <p style="line-height: 1.7; margin-bottom: 16px;">

                          Η συγκεκριμένη εφαρμογή, αναπτύχθηκε από την <strong style="color: var(--accent);">Nerally</strong> και καλύπτει τις περιπτώσεις φορολόγησης του εισοδήματος που ένα φυσικό πρόσωπο αποκτά από την μίσθωση της ακίνητης περιουσίας του.

            <div class="calc-grid">            </p>

              <div>            <p style="line-height: 1.7; margin-bottom: 12px;">

                <label class="calc-label" for="count">Αριθμός ακινήτων (1–5)</label>              Για ειδικές περιπτώσεις όπως <strong>Βραχυχρόνιες μισθώσεις</strong>, <strong>Υπεκμισθώσεις</strong>, <strong>Εταιρικές Μισθώσεις</strong>, <strong>Ανείσπραχτα ενοίκια</strong>, <strong>Αναγνώριση δαπανών</strong> κ.α. μπορείτε να:

                <input class="calc-input" id="count" type="number" min="1" max="5" step="1" value="1" />            </p>

              </div>            <div style="background: rgba(var(--accent-rgb), 0.08); padding: 16px; border-radius: 8px; margin-top: 16px;">

              <div class="calc-muted" style="align-self:end; font-size: 12px;">              <p style="margin: 6px 0; line-height: 1.6;">• Διαβάσετε τις σχετικές μελέτες στο blog μας</p>

                Συμπλήρωσε μίσθωμα/μήνες για κάθε ακίνητο και πάτησε <strong>Υπολογισμός</strong>.              <p style="margin: 6px 0; line-height: 1.6;">• <a href="/epikoinonia/contact.php" style="color: var(--accent); text-decoration: underline; font-weight: 600;">Επικοινωνήσετε μαζί μας</a> για εξατομικευμένη συμβουλευτική</p>

              </div>            </div>

            </div>            

          </div>

            <div id="props" class="calc-grid" style="margin-top:12px;"></div>        </div>

      </div>

            <div class="calc-controls">      

              <button id="calcBtn" class="calc-button primary" type="button">Υπολογισμός</button>      <!-- Right Section - Calculator -->

              <button id="resetBtn" class="calc-button" type="button">Επαναφορά</button>      <div class="right-section">

            </div>        <div class="calculator-container">

          </section>

          <section class="calc-card">

          <section class="calc-card">            <div class="calc-header">

            <h2 class="results-title">Αποτελέσματα</h2>              <h2 class="calc-title-in-card">Φόρος Ενοικίων — Υπολογισμός & Κλιμάκια</h2>

            <div class="kpis">            </div>

              <div class="kpi">            

                <div class="label">Συνολικά έσοδα</div>            <div class="calc-grid">

                <div id="gross" class="val">—</div>              <div>

              </div>                <label class="calc-label" for="count">Αριθμός ακινήτων (1–5)</label>

              <div class="kpi">                <input class="calc-input" id="count" type="number" min="1" max="5" step="1" value="1" />

                <div class="label">Φορολογητέο (95%)</div>              </div>

                <div id="taxable" class="val">—</div>              <div class="calc-muted" style="align-self:end; font-size: 12px;">

              </div>                Συμπλήρωσε μίσθωμα/μήνες για κάθε ακίνητο και πάτησε <strong>Υπολογισμός</strong>.

              <div class="kpi">              </div>

                <div class="label">Φόρος</div>            </div>

                <div id="tax" class="val">—</div>

              </div>            <div id="props" class="calc-grid" style="margin-top:12px;"></div>

            </div>

            <div class="calc-controls">

            <div>              <button id="calcBtn" class="calc-button primary" type="button">Υπολογισμός</button>

              <div class="brackets-title">Κλιμάκια φόρου</div>              <button id="resetBtn" class="calc-button" type="button">Επαναφορά</button>

              <div class="calc-row" style="padding:0;">            </div>

                <div class="table-wrapper">          </section>

                  <table class="calc-table">

                  <thead>          <section class="calc-card">

                    <tr>            <h2 class="results-title">Αποτελέσματα</h2>

                      <th>Κλιμάκιο</th>            <div class="kpis">

                      <th class="r">Ποσό</th>              <div class="kpi">

                      <th class="r">Συντελεστής</th>                <div class="label">Συνολικά έσοδα</div>

                      <th class="r">Φόρος</th>                <div id="gross" class="val">—</div>

                    </tr>              </div>

                  </thead>              <div class="kpi">

                  <tbody id="bracketRows">                <div class="label">Φορολογητέο (95%)</div>

                    <tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>                <div id="taxable" class="val">—</div>

                  </tbody>              </div>

                  <tfoot id="bracketFoot"></tfoot>              <div class="kpi">

                </table>                <div class="label">Φόρος</div>

                </div>                <div id="tax" class="val">—</div>

              </div>              </div>

              <div class="disclaimer">            </div>

                <p>* Ο υπολογισμός είναι ενδεικτικός και βασίζεται στις ισχύουσες φορολογικές διατάξεις</p>

              </div>            <div>

            </div>              <div class="brackets-title">Κλιμάκια φόρου</div>

          </section>              <div class="calc-row" style="padding:0;">

        </div>                <div class="table-wrapper">

      </div>                  <table class="calc-table">

    </div>                  <thead>

  </main>                    <tr>

                      <th>Κλιμάκιο</th>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>                      <th class="r">Ποσό</th>

                        <th class="r">Συντελεστής</th>

  <script src="/js/legal-modal.js"></script>                      <th class="r">Φόρος</th>

  <script src="/js/cookie-consent.js"></script>                    </tr>

  <script src="../app.js" defer></script>                  </thead>

  <script src="../js/rent-tax-calculator.js" defer></script>                  <tbody id="bracketRows">

</body>                    <tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>

</html>                  </tbody>
                  <tfoot id="bracketFoot"></tfoot>
                </table>
                </div>
              </div>
              <div class="disclaimer">
                <p>* Ο υπολογισμός είναι ενδεικτικός και βασίζεται στις ισχύουσες φορολογικές διατάξεις</p>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  

    <script src="/js/legal-modal.js"></script>
    <script src="/js/cookie-consent.js"></script>
    <script src="../app.js" defer></script>
    <script src="../js/rent-tax-calculator.js" defer></script>
</body>
</html>



