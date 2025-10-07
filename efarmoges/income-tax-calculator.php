<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nerally - Υπολογισμός Φόρου Εισοδήματος</title>
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />
  <link rel="stylesheet" href="/css/legal-modal.css" />
  <style>
    /* Page-local, scoped layout to match rent-tax-calculator */
    :root { 
      --rent-gap: 0; 
      --accent: #2980B9; 
    }
    body { margin: 0; overflow-x: hidden; }
    .rent-wrap { display: grid; grid-template-columns: 1fr 1fr; min-height: calc(100vh - 120px); }
    .rent-left { background:#f4f6fb; padding:40px 32px; overflow:auto; animation: contentFade 0.5s ease-out 0.06s both; }
    .rent-right { 
      padding:40px 24px; display:flex; align-items:center; justify-content:center;
      background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)), url('../images/ForosEisodimatos.webp');
      background-size: cover; background-position: center; 
    }
    .rent-left h1 { color: #000; font-size: 28px; margin: 0 0 20px; text-align: center; }
    .rent-left h1::after { display: none; }
    @keyframes contentFade { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }

    .rent-left h2, .rent-left h3 { color: var(--brand); font-weight: 800; position: relative; margin-bottom: 20px; }
    .rent-left h2 { font-size: clamp(28px, 3vw, 38px); }
    .rent-left h3 { font-size: clamp(20px, 2vw, 24px); margin-top: 40px; }
    .rent-left h2::after, .rent-left h3::after { content: ""; display: block; width: 70px; height: 4px; background: var(--brand); border-radius: 6px; margin-top: 10px; }
    .rent-left p { font-size: 18px; color: #111827; margin-bottom: 22px; line-height: 1.9; }
    .rent-left ul { list-style-type: disc; padding-left: 20px; color: #111827; }
    .rent-left ul li { margin-bottom: 14px; font-size: 17px; }
    .rent-left p strong, .rent-left ul li strong { color: #000; font-weight: 600; }
    .rent-note { font-size: 13px; color: #555; background: #f6f7f8; border-radius: 6px; padding: 10px; margin-top: 6px; }
    .calc-slab { width:100%; max-width:540px; }

    .two-col { display: grid; grid-template-columns: repeat(auto-fit, minmax(420px, 1fr)); gap: 40px; align-items: start; margin-top: 40px; }
    .modern-table { max-width: 500px; margin: 0 auto; border-collapse: separate; border-spacing: 0; background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,.06); overflow: hidden; text-align: center; }
    .modern-table thead th { background: #1f2937; color: #fff; text-align: center; padding: 14px 18px; }
    .modern-table tbody td { padding: 14px 18px; border-top: 1px solid #eef2f7; color: #111827; text-align: center; }
    .modern-table tbody tr:hover td { background: #f9fbff; }

    .quote { background: #fff; border-radius: 12px; padding: 24px 24px 88px 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); margin-top: 40px; font-size: 17px; color: #111827; position: relative; }
    .quote strong { color: var(--brand); }
    .quote a { color: var(--brand); text-decoration: underline; font-weight: 600; }
    .quote .quote-cta { position: absolute; right: 16px; bottom: 16px; display: inline-flex; align-items: center; justify-content: center; padding: 10px 16px; border-radius: 8px; text-decoration: none; background: var(--brand); color: #fff; font-weight: 700; box-shadow: 0 4px 12px rgba(0,0,0,.08); transition: transform .2s ease, box-shadow .2s ease, background .2s ease; }
    .quote .quote-cta:hover { background: #1f5f8b; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(0,0,0,.12); }

    /* Force calculator table text and KPI values to be black */
    .calc-table td { color: #000 !important; }
    .kpi .val { color: #000 !important; }

    @media (max-width: 960px) { 
      .rent-wrap { grid-template-columns: 1fr; display: flex; flex-direction: column; } 
      .rent-right { padding:28px 18px; order: 1; }
      .rent-left { order: 2; }
      .two-col { gap: 20px; }
      .modern-table { margin: 0 auto; max-width: 480px; }
      .quote { padding-bottom: 64px; }
      .quote .quote-cta { position: static; display: inline-flex; margin-top: 12px; }
    }

    @media (min-width: 1024px) { .rent-left { padding: 52px 44px; } .rent-left h3 { margin-top: 52px; } .two-col { gap: 56px; } .rent-left p { margin-bottom: 26px; } .rent-left ul li { margin-bottom: 16px; } }
  </style>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <main class="main-content" style="margin:0; padding:0; max-width:none; width:100%;">
    <section class="rent-wrap">

      <!-- Left: informational content -->
      <article class="rent-left">
        <section id="income-tax-info">
          <h2>Εισόδημα από μισθωτές υπηρεσίες και συντάξεις</h2>
          <p>Σύμφωνα με τον Κώδικα Φορολογίας Εισοδήματος (Ν.4172/2013), εισόδημα από μισθωτή εργασία και συντάξεις θεωρείται το εισόδημα που προκύπτει από:</p>
          <ul>
            <li>την παροχή εξαρτημένης εργασίας με σχέση εργασίας ιδιωτικού ή δημοσίου δικαίου,</li>
            <li>τις αμοιβές ή συντάξεις που καταβάλλονται σε συνταξιούχους του δημόσιου και ιδιωτικού τομέα,</li>
            <li>την παροχή υπηρεσιών βάσει έγγραφης σύμβασης όταν υπάρχει εξάρτηση, ακόμη κι αν ο εργαζόμενος δεν αμείβεται με μισθό,</li>
            <li>τυχόν επιδόματα ή παροχές σε είδος που συνδέονται με τη σχέση εργασίας.</li>
          </ul>

          <div class="two-col">
            <div>
              <h3>Πώς φορολογείται το εισόδημα</h3>
              <p>Η φορολόγηση των μισθωτών και συνταξιούχων γίνεται με βάση προοδευτική κλίμακα, όπως ορίζεται από τον ΚΦΕ, με συντελεστές που εφαρμόζονται ανά εισοδηματικό κλιμάκιο.</p>
              <table class="modern-table">
                <thead>
                  <tr>
                    <th>Εισόδημα (€)</th>
                    <th>Συντελεστής %</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td>0 – 10.000</td><td>9%</td></tr>
                  <tr><td>10.001 – 20.000</td><td>22%</td></tr>
                  <tr><td>20.001 – 30.000</td><td>28%</td></tr>
                  <tr><td>30.001 – 40.000</td><td>36%</td></tr>
                  <tr><td>&gt; 40.000</td><td>44%</td></tr>
                </tbody>
              </table>
            </div>

            <div>
              <h3>Έκπτωση φόρου</h3>
              <p>Η τελική επιβάρυνση μειώνεται μέσω της <strong>έκπτωσης φόρου</strong>, η οποία εξαρτάται από τον αριθμό των τέκνων του φορολογούμενου. Το μέγιστο ποσό έκπτωσης φόρου λαμβάνεται για εισοδήματα έως 12.000€. Για κάθε επόμενα 1.000€ πλέον του ορίου των 12.000€ μειώνεται το εν λόγω ποσό της έκπτωσης κατά 20€.</p>
              <table class="modern-table">
                <thead>
                  <tr><th>Παιδιά</th><th>Έκπτωση (€)</th></tr>
                </thead>
                <tbody>
                  <tr><td>0</td><td>777</td></tr>
                  <tr><td>1</td><td>900</td></tr>
                  <tr><td>2</td><td>1.120</td></tr>
                  <tr><td>3</td><td>1.340</td></tr>
                  <tr><td>4</td><td>1.580</td></tr>
                  <tr><td>5</td><td>1.780</td></tr>
                  <tr><td>6+</td><td>+220€ ανά επιπλέον τέκνο</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <h3>Λειτουργία της εφαρμογής</h3>
          <p>Η συγκεκριμένη εφαρμογή αναπτύχθηκε από τη <a href="/" style="color: var(--brand); text-decoration: underline; font-weight: 600;">Nerally</a> και καλύπτει τις περιπτώσεις φορολόγησης εισοδήματος που αποκτά φυσικό πρόσωπο από μισθωτή εργασία ή/και συντάξεις.</p>
        </section>

        <div class="quote">
          Για ειδικές περιπτώσεις όπως <strong>πολλαπλές πηγές εισοδήματος</strong>, <strong>αναπηρικές απαλλαγές</strong>, <strong>δωρεές/γονικές παροχές</strong> και <strong>έκτακτες παροχές</strong> κ.ά.
          <a class="quote-cta" href="/epikoinonia/contact.php">Επικοινωνήστε μαζί μας</a>
        </div>
      </article>

      <!-- Right: calculator on image background -->
      <section class="rent-right">
        <div class="calc-slab">
          <section class="calc-card">
            <div class="calc-header">
              <h2 class="calc-title-in-card">Φόρος Εισοδήματος — Υπολογισμός & Κλίμακες</h2>
            </div>
            <div class="calc-grid">
              <div>
                <label class="calc-label" for="incomeInput">Ετήσιο εισόδημα (€)</label>
                <input class="calc-input" id="incomeInput" type="text" inputmode="decimal" placeholder="π.χ. 14.944,40" />
              </div>
              <div>
                <label class="calc-label" for="childrenInput">Αριθμός τέκνων</label>
                <input class="calc-input" id="childrenInput" type="number" min="0" max="8" step="1" value="0" inputmode="numeric" />
              </div>
            </div>
            <div class="calc-controls">
              <button id="calcBtn" class="calc-button primary" type="button">Υπολογισμός</button>
              <button id="resetBtn" class="calc-button" type="button">Επαναφορά</button>
            </div>
          </section>

          <section class="calc-card">
            <h2 class="results-title">Αποτελέσματα</h2>
            <div class="kpis">
              <div class="kpi"><div class="label">Αρχικός φόρος κλίμακας</div><div id="kpi-taxBefore" class="val">—</div></div>
              <div class="kpi"><div class="label">Έκπτωση φόρου</div><div id="kpi-credit" class="val">—</div></div>
              <div class="kpi"><div class="label">Τελικός φόρος</div><div id="kpi-finalTax" class="val">—</div></div>
            </div>
            <div>
              <div class="brackets-title">Κλιμάκιο φόρου</div>
              <div class="calc-row" style="padding:0;">
                <div class="table-wrapper">
                  <table class="calc-table">
                    <thead>
                      <tr>
                        <th>Κλιμάκιο</th>
                        <th class="r">Εισόδημα</th>
                        <th class="r">Συντελεστής</th>
                        <th class="r">Φόρος</th>
                      </tr>
                    </thead>
                    <tbody id="incomeBracketRows">
                      <tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>
                    </tbody>
                    <tfoot id="incomeBracketFoot"></tfoot>
                  </table>
                </div>
              </div>
              <div class="disclaimer"><p>* Ο υπολογισμός είναι ενδεικτικός και βασίζεται στις ισχύουσες φορολογικές διατάξεις.</p></div>
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
  <script src="../js/income-tax-calculator.js" defer></script>
</body>
</html>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Υπολογιστής Φόρου Εισοδήματος 2025 - Δωρεάν Online | Nerally</title>
  <meta name="description" content="Δωρεάν online υπολογιστής φόρου εισοδήματος για το 2025. Υπολογίστε εύκολα και γρήγορα τον φόρο που οφείλετε με βάση το εισόδημά σας." />
  <meta name="keywords" content="υπολογιστής φόρου εισοδήματος, φόρος εισοδήματος 2025, online calculator, φορολογία, Nerally" />
  <meta name="author" content="Nerally" />
  <link rel="canonical" href="https://nerally.gr/efarmoges/income-tax-calculator.html" />
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://nerally.gr/efarmoges/income-tax-calculator.html" />
  <meta property="og:title" content="Υπολογιστής Φόρου Εισοδήματος 2025 - Δωρεάν Online | Nerally" />
  <meta property="og:description" content="Δωρεάν online υπολογιστής φόρου εισοδήματος για το 2025. Υπολογίστε εύκολα και γρήγορα τον φόρο που οφείλετε." />
  <meta property="og:image" content="https://nerally.gr/images/logo.png" />
  <meta property="og:locale" content="el_GR" />
  
  <!-- Twitter -->
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:url" content="https://nerally.gr/efarmoges/income-tax-calculator.html" />
  <meta property="twitter:title" content="Υπολογιστής Φόρου Εισοδήματος 2025 - Δωρεάν Online | Nerally" />
  <meta property="twitter:description" content="Δωρεάν online υπολογιστής φόρου εισοδήματος για το 2025. Υπολογίστε εύκολα και γρήγορα τον φόρο που οφείλετε." />
  <meta property="twitter:image" content="https://nerally.gr/images/logo.png" />
  
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="/css/cookie-consent.css">
  <link rel="stylesheet" href="/css/legal-modal.css">
  
  <!-- GTM loads via cookie-consent.js after analytics consent -->
</head>
<body>
  
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <main class="main-content">
    <div class="container">
      <div class="page-header">
        <h1>Υπολογιστής Φόρου Εισοδήματος</h1>
        <p>Υπολογίστε τον φόρο εισοδήματος που οφείλετε για το τρέχον έτος</p>
      </div>

      <div class="content-section">
        <div class="calculator-container">
          <div class="calculator-form">
            <h2>💰 Στοιχεία Εισοδήματος</h2>
            
            <div class="form-group">
              <label for="annual-income">Ετήσιο Εισόδημα (€):</label>
              <input type="number" id="annual-income" placeholder="π.χ. 25000" min="0" step="0.01">
            </div>

            <div class="form-group">
              <label for="marital-status">Οικογενειακή Κατάσταση:</label>
              <select id="marital-status">
                <option value="single">Άγαμος/η</option>
                <option value="married">Έγγαμος/η</option>
                <option value="divorced">Διαζευγμένος/η</option>
              </select>
            </div>

            <div class="form-group">
              <label for="children">Αριθμός Παιδιών:</label>
              <input type="number" id="children" placeholder="0" min="0" max="10">
            </div>

            <div class="form-group">
              <label for="income-type">Τύπος Εισοδήματος:</label>
              <select id="income-type">
                <option value="salary">Μισθός</option>
                <option value="business">Επιχειρηματική Δραστηριότητα</option>
                <option value="freelance">Ελεύθερος Επαγγελματίας</option>
                <option value="pension">Σύνταξη</option>
                <option value="rental">Ενοίκια</option>
              </select>
            </div>

            <div class="form-group">
              <label for="deductions">Εκπτώσεις/Απαλλαγές (€):</label>
              <input type="number" id="deductions" placeholder="π.χ. 2000" min="0" step="0.01">
            </div>

            <button onclick="calculateIncomeTax()" class="calculate-btn">
              🧮 Υπολογισμός Φόρου
            </button>
          </div>

          <div class="results-container" id="results" style="display: none;">
            <h3>📋 Αποτελέσματα Υπολογισμού</h3>
            <div class="result-item">
              <span>Φορολογητέο Εισόδημα:</span>
              <span id="taxable-income" class="result-value"></span>
            </div>
            <div class="result-item">
              <span>Οφειλόμενος Φόρος:</span>
              <span id="total-tax" class="result-value"></span>
            </div>
            <div class="result-item">
              <span>Καθαρό Εισόδημα:</span>
              <span id="net-income" class="result-value"></span>
            </div>
            <div class="result-item">
              <span>Μέσος Συντελεστής:</span>
              <span id="average-rate" class="result-value"></span>
            </div>
            
            <div class="tax-breakdown" id="tax-breakdown">
              <h4>Ανάλυση Φόρου ανά Κλίμακα:</h4>
              <div id="breakdown-details"></div>
            </div>
          </div>
        </div>

        <div class="info-section">
          <h2>📊 Κλίμακες Φορολόγησης Εισοδήματος 2025</h2>
          <div class="tax-table">
            <table>
              <thead>
                <tr>
                  <th>Εισόδημα (€)</th>
                  <th>Συντελεστής</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>0 - 10.000</td>
                  <td>9%</td>
                </tr>
                <tr>
                  <td>10.001 - 20.000</td>
                  <td>22%</td>
                </tr>
                <tr>
                  <td>20.001 - 30.000</td>
                  <td>28%</td>
                </tr>
                <tr>
                  <td>30.001 - 40.000</td>
                  <td>36%</td>
                </tr>
                <tr>
                  <td>40.001+</td>
                  <td>44%</td>
                </tr>
              </tbody>
            </table>
          </div>

          <h3>📅 Σημαντικές Ημερομηνίες</h3>
          <ul>
            <li><strong>Υποβολή Δήλωσης:</strong> Μέχρι 30 Ιουνίου</li>
            <li><strong>Α' Δόση Φόρου:</strong> Μέχρι 31 Ιουλίου</li>
            <li><strong>Β' Δόση Φόρου:</strong> Μέχρι 30 Σεπτεμβρίου</li>
          </ul>

          <div class="warning-box">
            <h4>⚠️ Σημαντική Σημείωση</h4>
            <p>Ο παραπάνω υπολογισμός είναι ενδεικτικός και βασίζεται στις τρέχουσες φορολογικές κλίμακες. Για ακριβή υπολογισμό επικοινωνήστε με τους ειδικούς μας.</p>
          </div>

          <div class="contact-cta">
            <h3>🤝 Χρειάζεστε Φορολογική Συμβουλή;</h3>
            <p>Οι φορολογικοί μας σύμβουλοι είναι εδώ για να σας βοηθήσουν.</p>
            <a href="mailto:info@nerally.gr" class="cta-button">Κλείστε Ραντεβού</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <script>
    function calculateIncomeTax() {
      const annualIncome = parseFloat(document.getElementById('annual-income').value);
      const maritalStatus = document.getElementById('marital-status').value;
      const children = parseInt(document.getElementById('children').value) || 0;
      const incomeType = document.getElementById('income-type').value;
      const deductions = parseFloat(document.getElementById('deductions').value) || 0;

      if (!annualIncome) {
        alert('Παρακαλώ εισάγετε το ετήσιο εισόδημα');
        return;
      }

      // Calculate taxable income
      let taxableIncome = annualIncome - deductions;
      
      // Family allowances
      if (maritalStatus === 'married') {
        taxableIncome -= 1000; // €1000 reduction for married
      }
      
      taxableIncome -= children * 777; // €777 per child

      taxableIncome = Math.max(0, taxableIncome);

      // Tax calculation based on brackets
      let totalTax = 0;
      let breakdown = [];
      
      const brackets = [
        { min: 0, max: 10000, rate: 0.09 },
        { min: 10001, max: 20000, rate: 0.22 },
        { min: 20001, max: 30000, rate: 0.28 },
        { min: 30001, max: 40000, rate: 0.36 },
        { min: 40001, max: Infinity, rate: 0.44 }
      ];

      let remaining = taxableIncome;
      
      for (let bracket of brackets) {
        if (remaining > 0) {
          let taxableInBracket = Math.min(remaining, bracket.max - bracket.min + 1);
          if (taxableIncome > bracket.min) {
            taxableInBracket = Math.min(taxableInBracket, remaining);
            let taxForBracket = taxableInBracket * bracket.rate;
            totalTax += taxForBracket;
            
            if (taxForBracket > 0) {
              breakdown.push({
                range: bracket.max === Infinity ? `${bracket.min.toLocaleString()}+` : `${bracket.min.toLocaleString()} - ${bracket.max.toLocaleString()}`,
                amount: taxableInBracket,
                rate: (bracket.rate * 100).toFixed(0) + '%',
                tax: taxForBracket
              });
            }
            
            remaining -= taxableInBracket;
          }
        }
      }

      const netIncome = annualIncome - totalTax;
      const averageRate = taxableIncome > 0 ? (totalTax / taxableIncome * 100) : 0;

      // Display results
      document.getElementById('taxable-income').textContent = taxableIncome.toLocaleString() + '€';
      document.getElementById('total-tax').textContent = totalTax.toLocaleString() + '€';
      document.getElementById('net-income').textContent = netIncome.toLocaleString() + '€';
      document.getElementById('average-rate').textContent = averageRate.toFixed(2) + '%';
      
      // Display breakdown
      let breakdownHtml = '';
      breakdown.forEach(item => {
        breakdownHtml += `
          <div class="breakdown-item">
            <span>${item.range}€ (${item.rate}): </span>
            <span>${item.tax.toLocaleString()}€</span>
          </div>
        `;
      });
      document.getElementById('breakdown-details').innerHTML = breakdownHtml;
      
      document.getElementById('results').style.display = 'block';
    }
  </script>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  
    <script src="/js/legal-modal.js"></script>
    <script src="/js/cookie-consent.js"></script>
    <script src="../app.js"></script>
</body>
</html>



