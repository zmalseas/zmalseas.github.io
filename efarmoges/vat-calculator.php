<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Υπολογιστής ΦΠΑ - Γρήγορος Υπολογισμός Online | Nerally</title>
  <meta name="description" content="Δωρεάν online υπολογιστής ΦΠΑ. Υπολόγισε καθαρή αξία, ΦΠΑ και τελική τιμή με βάση 24%, 13%, 6% ή προσαρμοσμένο συντελεστή." />
  <meta name="keywords" content="υπολογιστής ΦΠΑ, ΦΠΑ 24%, ΦΠΑ 13%, ΦΠΑ 6%, VAT calculator, nerally" />
  <meta name="author" content="Nerally" />
  <link rel="canonical" href="https://nerally.gr/efarmoges/vat-calculator.php" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://nerally.gr/efarmoges/vat-calculator.php" />
  <meta property="og:title" content="Υπολογιστής ΦΠΑ - Γρήγορος Υπολογισμός Online | Nerally" />
  <meta property="og:description" content="Υπολόγισε καθαρή αξία, ΦΠΑ και τελικό ποσό άμεσα για όλους τους βασικούς συντελεστές." />
  <meta property="og:image" content="https://nerally.gr/images/logo.png" />
  <meta property="og:locale" content="el_GR" />
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:url" content="https://nerally.gr/efarmoges/vat-calculator.php" />
  <meta property="twitter:title" content="Υπολογιστής ΦΠΑ - Γρήγορος Υπολογισμός Online | Nerally" />
  <meta property="twitter:description" content="Δωρεάν online υπολογιστής ΦΠΑ για επιχειρήσεις και ιδιώτες." />
  <meta property="twitter:image" content="https://nerally.gr/images/logo.png" />
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />
  <style>
    :root { --accent:#2980B9; }
    body { margin:0; overflow-x:hidden; }
    .rent-wrap { display:grid; grid-template-columns:1fr 1fr; min-height:100vh; }
  .rent-left { background:#f4f6fb; padding:40px 32px; overflow:auto; animation:fadeIn .5s ease-out .06s both; display:flex; flex-direction:column; }
  .vat-text { flex:1 0 auto; }
  .quote-bottom { flex-shrink:0; margin-top:32px; }
    /* Darker overlay & correct colorful image with fallbacks */
    .rent-right { padding:40px 24px; display:flex; align-items:center; justify-content:center; 
      background:
        linear-gradient(rgba(0,0,0,.82), rgba(0,0,0,.82)),
        url('../images/ypologismos_fpa.webp'),
        url('../images/Hero1_enhanced.webp');
      background-size:cover; background-position:center; }
    @keyframes fadeIn { from {opacity:0; transform:translateY(8px);} to {opacity:1; transform:translateY(0);} }
    .rent-left h2, .rent-left h3 { color: var(--brand); font-weight:800; position:relative; margin-bottom:20px; }
    .rent-left h2 { font-size:clamp(28px,3vw,38px); }
    .rent-left h3 { font-size:clamp(20px,2vw,24px); margin-top:40px; }
    .rent-left h2::after, .rent-left h3::after { content:""; display:block; width:70px; height:4px; background:var(--brand); border-radius:6px; margin-top:10px; }
    .rent-left p { font-size:18px; color:#111827; margin-bottom:22px; line-height:1.9; }
    .rent-left ul, .rent-left ol { padding-left:20px; color:#111827; }
    .rent-left ul li, .rent-left ol li { margin-bottom:12px; font-size:16px; }
    .rent-left p strong, .rent-left li strong { color:#000; font-weight:600; }
    .quote { background:#fff; border-radius:12px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,.06); margin-top:40px; font-size:17px; color:#111827; }
    .quote strong { color:var(--brand); }
    .quote a { color: var(--brand); text-decoration: underline; font-weight:600; }
    .quote .quote-cta { display:inline-flex; align-items:center; justify-content:center; padding:10px 16px; border-radius:8px; text-decoration:none; background:var(--brand); color:#fff; font-weight:700; box-shadow:0 4px 12px rgba(0,0,0,.08); transition: transform .2s ease, box-shadow .2s ease, background .2s ease; margin-top:12px; }
    .quote .quote-cta:hover { background:#1f5f8b; transform:translateY(-1px); box-shadow:0 6px 16px rgba(0,0,0,.12); }
    .calc-slab { width:100%; max-width:540px; }
    .vat-card { background:rgba(255,255,255,.9); border-radius:16px; padding:28px 26px 34px; box-shadow:0 8px 24px rgba(0,0,0,.12); backdrop-filter:blur(6px); margin-bottom:28px; }
    .vat-card h2 { margin:0 0 18px; font-size:20px; font-weight:800; letter-spacing:.5px; color:#111; text-align:center; }
    label.vat-label { display:block; font-size:14px; font-weight:600; color:#334155; margin-bottom:6px; }
    .vat-input { width:100%; padding:12px 14px; border:1px solid #cbd5e1; border-radius:10px; font-size:16px; font-weight:500; margin-bottom:14px; background:#fff; color:#111; }
    .seg { display:flex; gap:10px; flex-wrap:wrap; margin-bottom:14px; }
    .seg input[type=radio]{ display:none; }
    .seg label { padding:10px 14px; background:#f1f5f9; border:2px solid #cbd5e1; border-radius:999px; cursor:pointer; color:#334155; user-select:none; font-weight:500; font-size:14px; transition:all .2s; }
    .seg input[type=radio]:checked + label { background:var(--brand); color:#fff; border-color:var(--brand); }
  .calc-controls { display:flex; gap:10px; margin-top:10px; flex-wrap:wrap; }
  .calc-button { border:none; padding:12px 18px; border-radius:10px; font-weight:600; cursor:pointer; font-size:15px; display:inline-flex; align-items:center; justify-content:center; gap:6px; background:#e2e8f0; color:#111827; transition:all .2s ease; }
  .calc-button.primary { background:var(--brand); color:#fff; }
  .calc-button:hover { transform:translateY(-1px); box-shadow:0 4px 12px rgba(0,0,0,.15); }
  /* Stack results vertically */
  .equation { display:flex; flex-direction:column; gap:14px; margin-top:26px; }
  .result-box { width:100%; background:#f1f5f9; border-radius:12px; padding:18px 18px 20px; text-align:center; position:relative; }
  .result-box + .op { display:none; }
  .op { display:none !important; }
    .result-box h3 { margin:0 0 6px; font-size:.75rem; letter-spacing:.5px; font-weight:600; color:#475569; }
    .value { font-weight:700; font-size:1.2rem; color:#0f172a; transition:all .2s ease; user-select:none; }
    .value:hover { background:#f8fafc; border-radius:6px; padding:4px 8px; margin:-4px -8px; transform:scale(1.02); }
    .op { font-size:1.6rem; font-weight:700; color:var(--brand); align-self:center; }
  /* Disclaimer removed per request */
    @media (max-width:960px){ .rent-wrap { grid-template-columns:1fr; display:flex; flex-direction:column; } .rent-right { order:1; padding:28px 18px; } .rent-left { order:2; } }
  </style>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>
  <main class="main-content" style="margin:0; padding:0; max-width:none; width:100%;">
    <section class="rent-wrap">
      <article class="rent-left">
        <section id="vat-info" class="vat-text">

            <h2>Τι είναι ο ΦΠΑ</h2>
            <p>Ο ΦΠΑ (Φόρος Προστιθέμενης Αξίας) είναι ένας φόρος πάνω στην “προστιθέμενη αξία” που δημιουργείται καθώς τα αγαθά και οι υπηρεσίες περνούν μέσα από την εφοδιαστική αλυσίδα μέχρι να φτάσουν στον τελικό καταναλωτή. Το τελικό βάρος του φόρου το επωμίζεται ο καταναλωτής. Τον ΦΠΑ τον εισπράττεται μια επιχείρηση από τον αγοραστή και στη συνέχεια τον αποδίδεται στο κράτος αφού αφαιρεθεί ο ΦΠΑ που η ίδια η επιχείρηση πλήρωσε στους προμηθευτές της. Έτσι, σε κάθε στάδιο της αλυσίδας, το κράτος εισπράττει μέρος του φόρου. Ο ΦΠΑ είναι έμμεση μορφή φορολογίας που χρησιμοποιείται παγκοσμίως.</p>
            <h3>Νομικό πλαίσιο στην Ελλάδα</h3>
            <ul>
              <li>Κώδικας ΦΠΑ: Ν. 2859/2000.</li>
              <li>Βασικοί συντελεστές: 24% (γενικός), 13% (τροφές, ενέργεια, τουρισμός), 6% (φάρμακα, βιβλία, πολιτισμός).</li>
              <li>Μειωμένοι κατά 30% οι συντελεστές σε ορισμένα νησιά του Αιγαίου (Λέρο, Λέσβο, Σάμο, Κω και Χίο).</li>
            </ul>
            <h3>Λειτουργία της εφαρμογής</h3>
            <p>Η εφαρμογή σχεδιάστηκε από τη Nerally για να προσφέρει έναν απλό, γρήγορο και κατανοητό υπολογισμό ΦΠΑ για καθημερινή χρήση.</p>
            <h3>Οδηγίες χρήσης</h3>
            <ol>
              <li>Πληκτρολόγησε το ποσό στο επάνω πεδίο (δέχεται 1.234,56).</li>
              <li>Διάλεξε αν το ποσό είναι Με ΦΠΑ ή Χωρίς ΦΠΑ.</li>
              <li>Επίλεξε συντελεστή (24% προεπιλογή) ή "Άλλος..." για δικό σου %.</li>
              <li>Πάτησε Υπολογισμός για να δεις καθαρή αξία, ΦΠΑ και το τελικό ποσό.</li>
            </ol>
        </section>
        <div class="quote quote-bottom">
          <p>Για περιπτώσεις όπως <strong>δηλώσεις ΦΠΑ & VIES</strong>, <strong>ενδοκοινοτικές συναλλαγές</strong>, <strong>απαλλασσόμενες δραστηριότητες</strong> ή <strong>OSS/IOSS</strong>:</p>
          <a class="quote-cta" href="/epikoinonia/contact.php">Επικοινωνήστε μαζί μας</a>
        </div>
      </article>
      <section class="rent-right">
        <div class="calc-slab">
          <section class="vat-card" aria-labelledby="vat-calc-title">
            <h2 id="vat-calc-title">Υπολογισμός ΦΠΑ</h2>
            <label class="vat-label" for="amount">Ποσό</label>
            <input id="amount" class="vat-input" type="text" inputmode="decimal" placeholder="π.χ. 1.234,56" />
            <label class="vat-label">Το ποσό που δίνω είναι…</label>
            <div class="seg">
              <input type="radio" id="typeGross" name="type" value="gross" checked><label for="typeGross">Με ΦΠΑ</label>
              <input type="radio" id="typeNet" name="type" value="net"><label for="typeNet">Χωρίς ΦΠΑ</label>
            </div>
            <label class="vat-label">Συντελεστής ΦΠΑ</label>
            <div class="seg">
              <input type="radio" id="vat24" name="vat" value="24" checked><label for="vat24">24%</label>
              <input type="radio" id="vat13" name="vat" value="13"><label for="vat13">13%</label>
              <input type="radio" id="vat6" name="vat" value="6"><label for="vat6">6%</label>
              <input type="radio" id="vatCustom" name="vat" value="custom"><label for="vatCustom">Άλλος...</label>
            </div>
            <input type="number" id="customVat" class="vat-input" placeholder="Πληκτρολόγησε % ΦΠΑ" style="display:none;margin-bottom:10px;" min="0" max="99" />
            <div class="calc-controls">
              <button class="calc-button primary" id="calcBtn" type="button" title="Πάτα Enter για γρήγορο υπολογισμό">Υπολογισμός</button>
              <button class="calc-button" id="resetBtn" type="button" title="Πάτα Escape για επαναφορά">Επαναφορά</button>
            </div>
            <div style="font-size:12px; color:#64748b; margin-top:8px; text-align:center;">
              💡 <strong>Συντομεύσεις:</strong> Enter για υπολογισμό, Escape για επαναφορά. Κλικ στα αποτελέσματα για αντιγραφή.
            </div>
            <div class="equation">
              <div class="result-box" id="leftBox"><h3>Ποσό χωρίς ΦΠΑ</h3><div class="value" id="leftOut">—</div></div>
              <div class="op" id="op1">+</div>
              <div class="result-box" id="vatBox"><h3>ΦΠΑ</h3><div class="value" id="vatOut">—</div></div>
              <div class="op">=</div>
              <div class="result-box" id="rightBox"><h3>Ποσό με ΦΠΑ</h3><div class="value" id="rightOut">—</div></div>
            </div>
          </section>
        </div>
      </section>
    </section>
  </main>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>
  <script src="/js/cookie-consent.js"></script>
  <script src="../app.js" defer></script>
  <script src="../js/vat-calculator.js" defer></script>
</body>
</html>
