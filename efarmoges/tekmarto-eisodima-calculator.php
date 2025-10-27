<?php 
// CSP Nonce for inline scripts security
require_once __DIR__ . '/../partials/csp-nonce.php';
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nerally - Υπολογισμός Τεκμαρτού Εισοδήματος 2025</title>
  <meta name="description" content="Online υπολογισμός τεκμαρτού εισοδήματος ατομικής επιχείρησης 2025" />
  <meta name="keywords" content="τεκμαρτό εισόδημα, ατομική επιχείρηση, τεκμήριο, φορολογία 2025, Nerally" />
  <meta name="author" content="Nerally" />
  <link rel="canonical" href="https://nerally.gr/efarmoges/tekmarto-eisodima-calculator.php" />
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://nerally.gr/efarmoges/tekmarto-eisodima-calculator.php" />
  <meta property="og:title" content="Nerally - Υπολογισμός Τεκμαρτού Εισοδήματος 2025" />
  <meta property="og:description" content="Online υπολογισμός τεκμαρτού εισοδήματος ατομικής επιχείρησης 2025" />
  <meta property="og:image" content="https://nerally.gr/images/tekmarto.webp" />
  <meta property="og:locale" content="el_GR" />
  
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image" />
  <meta property="twitter:url" content="https://nerally.gr/efarmoges/tekmarto-eisodima-calculator.php" />
  <meta property="twitter:title" content="Nerally - Υπολογισμός Τεκμαρτού Εισοδήματος 2025" />
  <meta property="twitter:description" content="Online υπολογισμός τεκμαρτού εισοδήματος ατομικής επιχείρησης 2025" />
  <meta property="twitter:image" content="https://nerally.gr/images/tekmarto.webp" />
  
  <link rel="icon" type="image/png" href="../images/logo.png" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="/css/cookie-consent.css" />
  <style>
    /* Fix datalist dropdown text color */
    input[list]::-webkit-calendar-picker-indicator {
      filter: invert(0.5);
    }
    
    /* Ensure dropdown options are visible */
    datalist option {
      background-color: white;
      color: #333;
      padding: 8px;
    }
    
    /* Input styling for better visibility */
    input[list] {
      background-color: white;
      color: #333;
    }
  </style>
  <script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
  <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

  <script<?php echo isset($nonce_attr) ? $nonce_attr : ''; ?> type="application/ld+json">
  <?php
  $schema = [
    "@context" => "https://schema.org",
    "@type" => "WebApplication",
    "name" => "Υπολογισμός Τεκμαρτού Εισοδήματος 2025",
    "url" => "https://nerally.gr/efarmoges/tekmarto-eisodima-calculator.php",
    "description" => "Online Υπολογισμός Τεκμαρτού Εισοδήματος ατομικής επιχείρησης 2025.",
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
    /* Page-local, scoped layout */
    :root { 
      --rent-gap: 0; 
      --accent: #2980B9; 
    }
    body { margin: 0; overflow-x: hidden; }
    .rent-wrap { display: grid; grid-template-columns: 1fr 1fr; min-height: calc(100vh - 120px); }
    .rent-left { background:#f4f6fb; padding:40px 32px; overflow:auto; animation: contentFade 0.5s ease-out 0.06s both; }
    .rent-right { 
      padding:40px 24px; display:flex; align-items:center; justify-content:center;
      background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)), url('../images/tekmarto.webp');
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
    .calc-slab { width:100%; max-width:640px; }

    .modern-table { max-width: 500px; margin: 20px auto; border-collapse: separate; border-spacing: 0; background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,.06); overflow: hidden; text-align: center; }
    .modern-table thead th { background: #1f2937; color: #fff; text-align: center; padding: 14px 18px; }
    .modern-table tbody td { padding: 14px 18px; border-top: 1px solid #eef2f7; color: #111827; text-align: center; }
    .modern-table tbody tr:hover td { background: #f9fbff; }

    .quote { background: #fff; border-radius: 12px; padding: 24px 24px 88px 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); margin-top: 40px; font-size: 17px; color: #111827; position: relative; }
    .quote strong { color: var(--brand); }
    .quote a { color: var(--brand); text-decoration: underline; font-weight: 600; }
    .quote .quote-cta { position: absolute; right: 16px; bottom: 16px; display: inline-flex; align-items: center; justify-content: center; padding: 10px 16px; border-radius: 8px; text-decoration: none; background: var(--brand); color: #fff; font-weight: 700; box-shadow: 0 4px 12px rgba(0,0,0,.08); transition: transform .2s ease, box-shadow .2s ease, background .2s ease; }
    .quote .quote-cta:hover { background: #1f5f8b; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(0,0,0,.12); }

    /* Mobile responsive */
    @media (max-width: 992px) {
      .rent-wrap { grid-template-columns: 1fr; }
      .rent-right { min-height: 300px; }
    }

    /* Calculator specific styles */
    #tekmartoApp { font-family: Inter, sans-serif; }
    .card { background: white; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,.08); border: 1px solid #e5e7eb; padding: 20px; margin-bottom: 16px; }
    .card h2 { font-size: 18px; font-weight: 600; margin: 0 0 16px; color: #1f2937; }
    .input-group { display: flex; flex-direction: column; gap: 4px; margin-bottom: 12px; }
    .input-group label { font-size: 14px; color: #374151; }
    .input-group input, .input-group select { width: 100%; border-radius: 12px; border: 1px solid #d1d5db; padding: 10px 12px; font-size: 14px; }
    .input-group input:focus, .input-group select:focus { outline: none; border-color: #6366f1; ring: 2px; ring-color: #6366f1; }
    .grid-2 { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; }
    .grid-3 { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 12px; }
    .toggle { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
    .toggle-btn { position: relative; display: inline-flex; height: 24px; width: 44px; items-center; border-radius: 9999px; cursor: pointer; transition: background-color 0.3s; }
    .toggle-btn.active { background-color: #6366f1; }
    .toggle-btn.inactive { background-color: #d1d5db; }
    .toggle-btn span { display: inline-block; height: 16px; width: 16px; transform: translateX(4px); border-radius: 9999px; background-color: white; transition: transform 0.3s; }
    .toggle-btn.active span { transform: translateX(24px); }
    .toggle label { font-size: 14px; color: #374151; }
    .checkbox { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
    .checkbox input[type="checkbox"] { width: 16px; height: 16px; }
    .checkbox label { font-size: 14px; color: #374151; }
    .result-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 16px; padding: 20px; }
    .result-card h2 { color: white; margin-bottom: 16px; }
    .stat { display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border-radius: 12px; margin-bottom: 8px; }
    .stat.highlight { background-color: white; color: #1f2937; }
    .stat.normal { background-color: rgba(255,255,255,0.1); color: white; }
    .stat-label { font-size: 14px; opacity: 0.9; }
    .stat-value { font-weight: 600; font-size: 16px; }
    .breakdown { background-color: rgba(255,255,255,0.1); border-radius: 12px; padding: 16px; margin-top: 16px; }
    .breakdown p { font-size: 13px; margin-bottom: 4px; }
    .breakdown ul { list-style-type: disc; padding-left: 20px; font-size: 13px; }
    .breakdown ul li { margin-bottom: 4px; }
    .btn-primary { padding: 10px 16px; background-color: #6366f1; color: white; border-radius: 20px; border: none; cursor: pointer; font-weight: 600; box-shadow: 0 2px 8px rgba(99,102,241,0.3); }
    .btn-primary:hover { background-color: #4f46e5; }
    .info-box { background-color: #fef3c7; border: 1px solid: #fbbf24; border-radius: 12px; padding: 12px; margin-top: 8px; }
    .info-box p { font-size: 13px; color: #92400e; margin: 0; }
    .multi-select { position: relative; }
    .multi-select-btn { width: 100%; text-align: left; border-radius: 12px; border: 1px solid #d1d5db; padding: 10px 12px; background: white; cursor: pointer; font-size: 14px; }
    .multi-select-dropdown { position: absolute; z-index: 20; margin-top: 4px; width: 100%; background: white; border: 1px solid #e5e7eb; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.12); padding: 8px; max-height: 240px; overflow-y: auto; }
    .multi-select-item { display: flex; justify-content: space-between; align-items: center; padding: 10px 12px; border-radius: 8px; cursor: pointer; font-size: 14px; }
    .multi-select-item:hover { background-color: #f9fafb; }
    .multi-select-item.selected { background-color: #f3f4f6; }
  </style>

</head>
<body>
<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="rent-wrap">
  <div class="rent-left">
    <h1>Υπολογισμός Τεκμαρτού Εισοδήματος 2025</h1>
    
    <div class="quote">
      <strong>Χρειάζεστε βοήθεια με το τεκμαρτό εισόδημα;</strong><br />
      Οι σύμβουλοι της Nerally είναι εδώ για να σας καθοδηγήσουν σε όλα τα φορολογικά σας ζητήματα.
      <a href="/epikoinonia/contact.php" class="quote-cta">Επικοινωνήστε μαζί μας</a>
    </div>

    <h2>Τι είναι το Τεκμαρτό Εισόδημα;</h2>
    <p>
      Το <strong>τεκμαρτό εισόδημα</strong> είναι ένα ποσό που υπολογίζεται για ατομικές επιχειρήσεις και προστίθεται στο πραγματικό εισόδημα για φορολογικούς σκοπούς. Βασίζεται σε συγκεκριμένα κριτήρια όπως έτη λειτουργίας, προσωπικό και τζίρος.
    </p>

    <h3>Βασικές Παράμετροι 2025</h3>
    <ul>
      <li><strong>Βάση τεκμαρτού:</strong> 14 × 830€ = 11.620€</li>
      <li><strong>Προσαυξήσεις ετών:</strong> Ανάλογα με τα έτη λειτουργίας (7-9 έτη: +1.162€, 10-12 έτη: +1.278,20€, >13 έτη: +1.406,02€)</li>
      <li><strong>Προσαύξηση προσωπικού:</strong> 10% της ετήσιας μισθοδοσίας (μέχρι 15.000€)</li>
      <li><strong>Υπέρβαση τζίρου:</strong> 5% της διαφοράς από τον Μ.Ο. ΚΑΔ</li>
      <li><strong>Ανώτατο όριο:</strong> 50.000€</li>
    </ul>

    <h3>Μειώσεις Τεκμαρτού</h3>
    <ul>
      <li><strong>Νέος επαγγελματίας (1ο-3ο έτος):</strong> 100% μείωση</li>
      <li><strong>Νέος επαγγελματίας (4ο έτος):</strong> Μείωση 2/3</li>
      <li><strong>Νέος επαγγελματίας (5ο έτος):</strong> Μείωση 1/3</li>
      <li><strong>Ειδικές κατηγορίες:</strong> 50% μείωση (πολύτεκνοι, αναπηρία ≥67%, μονογονεϊκή οικογένεια, κ.ά.)</li>
    </ul>

    <h3>Εξαιρέσεις</h3>
    <p>Δεν εφαρμόζεται τεκμαρτό εισόδημα σε:</p>
    <ul>
      <li>Αγροτικές επιχειρηματικές δραστηριότητες</li>
      <li>Ελεύθερους επαγγελματίες με έως 2 συμβάσεις</li>
      <li>Ασφαλιστικούς διαμεσολαβητές (έως 2)</li>
      <li>Άτομα με αναπηρία ≥80%</li>
      <li>Καφενεία σε οικισμούς <500 κατοίκων</li>
    </ul>

    <table class="modern-table">
      <thead>
        <tr>
          <th>Έτη Λειτουργίας</th>
          <th>Προσαύξηση</th>
          <th>Βάση (830€ × 14)</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>1 – 3</td><td>0,00€</td><td>11.620,00 €</td></tr>
        <tr><td>4 – 6</td><td>0,00€</td><td>11.620,00 €</td></tr>
        <tr><td>7 – 9</td><td>1.162,00€</td><td>12.782,00 €</td></tr>
        <tr><td>10 – 12</td><td>1.278,20€</td><td>14.060,20 €</td></tr>
        <tr><td>>13</td><td>1.406,02€</td><td>15.466,22 €</td></tr>
      </tbody>
    </table>
  </div>

  <div class="rent-right">
    <div class="calc-slab" id="tekmartoCalculator"></div>
  </div>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>

<script nonce="<?php echo $csp_nonce; ?>" type="text/babel">
const { useMemo, useState } = React;

const CURRENCY = new Intl.NumberFormat("el-GR", { style: "currency", currency: "EUR" });
const NUMBER_FORMAT = new Intl.NumberFormat("el-GR", { minimumFractionDigits: 2, maximumFractionDigits: 2 });

// ΚΑΔ Data με Μέσους Όρους
const KAD_DATA = [
  { code: "01.61", description: "ΥΠΟΣΤΗΡΙΚΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΓΙΑ ΤΗ ΦΥΤΙΚΗ ΠΑΡΑΓΩΓΗ", avgRevenue: 22811.99 },
  { code: "01.62", description: "ΥΠΟΣΤΗΡΙΚΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΓΙΑ ΤΗ ΖΩΙΚΗ ΠΑΡΑΓΩΓΗ", avgRevenue: 61857.25 },
  { code: "01.63", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΜΕΤΑ ΤΗ ΣΥΓΚΟΜΙΔΗ", avgRevenue: 34020.52 },
  { code: "02.40", description: "ΥΠΟΣΤΗΡΙΚΤΙΚΕΣ ΠΡΟΣ ΤΗ ΔΑΣΟΚΟΜΙΑ ΥΠΗΡΕΣΙΕΣ", avgRevenue: 55936.52 },
  { code: "08.11", description: "ΕΞΟΡΥΞΗ ΔΙΑΚΟΣΜΗΤΙΚΩΝ ΚΑΙ ΟΙΚΟΔΟΜΙΚΩΝ ΛΙΘΩΝ, ΑΣΒΕΣΤΟΛΙΘΟΥ, ΓΥΨΟΥ, ΚΙΜΩΛΙΑΣ ΚΑΙ ΣΧΙΣΤΟΛΙΘΟΥ", avgRevenue: 52673.94 },
  { code: "08.12", description: "ΛΕΙΤΟΥΡΓΙΑ ΦΡΕΑΤΩΝ ΠΑΡΑΓΩΓΗΣ ΑΜΜΟΧΑΛΙΚΟΥ ΚΑΙ ΑΜΜΟΥ· ΕΞΟΡΥΞΗ ΑΡΓΙΛΟΥ ΚΑΙ ΚΑΟΛΙΝΗΣ", avgRevenue: 123223.08 },
  { code: "10.11", description: "ΕΠΕΞΕΡΓΑΣΙΑ ΚΑΙ ΣΥΝΤΗΡΗΣΗ ΚΡΕΑΤΟΣ", avgRevenue: 437115.26 },
  { code: "10.13", description: "ΠΑΡΑΓΩΓΗ ΠΡΟΪΟΝΤΩΝ ΚΡΕΑΤΟΣ ΚΑΙ ΚΡΕΑΤΟΣ ΠΟΥΛΕΡΙΚΩΝ", avgRevenue: 228204.90 },
  { code: "10.31", description: "ΕΠΕΞΕΡΓΑΣΙΑ ΚΑΙ ΣΥΝΤΗΡΗΣΗ ΠΑΤΑΤΩΝ", avgRevenue: 203869.73 },
  { code: "10.32", description: "ΠΑΡΑΓΩΓΗ ΧΥΜΩΝ ΦΡΟΥΤΩΝ ΚΑΙ ΛΑΧΑΝΙΚΩΝ", avgRevenue: 91247.86 },
  { code: "10.39", description: "ΑΛΛΗ ΕΠΕΞΕΡΓΑΣΙΑ ΚΑΙ ΣΥΝΤΗΡΗΣΗ ΦΡΟΥΤΩΝ ΚΑΙ ΛΑΧΑΝΙΚΩΝ", avgRevenue: 137237.85 },
  { code: "10.41", description: "ΠΑΡΑΓΩΓΗ ΕΛΑΙΩΝ ΚΑΙ ΛΙΠΩΝ", avgRevenue: 48706.15 },
  { code: "10.51", description: "ΛΕΙΤΟΥΡΓΙΑ ΓΑΛΑΚΤΟΚΟΜΕΙΩΝ ΚΑΙ ΤΥΡΟΚΟΜΙΑ", avgRevenue: 233484.89 },
  { code: "10.52", description: "ΠΑΡΑΓΩΓΗ ΠΑΓΩΤΩΝ", avgRevenue: 81467.74 },
  { code: "10.61", description: "ΠΑΡΑΓΩΓΗ ΠΡΟΪΟΝΤΩΝ ΑΛΕΥΡΟΜΥΛΩΝ", avgRevenue: 120679.74 },
  { code: "10.71", description: "ΑΡΤΟΠΟΙΙΑ· ΠΑΡΑΓΩΓΗ ΝΩΠΩΝ ΕΙΔΩΝ ΖΑΧΑΡΟΠΛΑΣΤΙΚΗΣ", avgRevenue: 106308.22 },
  { code: "10.72", description: "ΠΑΡΑΓΩΓΗ ΠΑΞΙΜΑΔΙΩΝ ΚΑΙ ΜΠΙΣΚΟΤΩΝ· ΠΑΡΑΓΩΓΗ ΔΙΑΤΗΡΟΥΜΕΝΩΝ ΕΙΔΩΝ ΖΑΧΑΡΟΠΛΑΣΤΙΚΗΣ", avgRevenue: 75466.82 },
  { code: "10.73", description: "ΠΑΡΑΓΩΓΗ ΜΑΚΑΡΟΝΙΩΝ, ΛΑΖΑΝΙΩΝ, ΚΟΥΣΚΟΥΣ ΚΑΙ ΠΑΡΟΜΟΙΩΝ ΑΛΕΥΡΩΔΩΝ ΠΡΟΪΟΝΤΩΝ", avgRevenue: 43771.67 },
  { code: "10.82", description: "ΠΑΡΑΓΩΓΗ ΚΑΚΑΟΥ, ΣΟΚΟΛΑΤΑΣ ΚΑΙ ΖΑΧΑΡΩΤΩΝ", avgRevenue: 97216.90 },
  { code: "10.83", description: "ΕΠΕΞΕΡΓΑΣΙΑ ΤΣΑΓΙΟΥ ΚΑΙ ΚΑΦΕ", avgRevenue: 95204.65 },
  { code: "10.84", description: "ΠΑΡΑΓΩΓΗ ΑΡΤΥΜΑΤΩΝ ΚΑΙ ΚΑΡΥΚΕΥΜΑΤΩΝ", avgRevenue: 229382.38 },
  { code: "10.85", description: "ΠΑΡΑΓΩΓΗ ΕΤΟΙΜΩΝ ΓΕΥΜΑΤΩΝ ΚΑΙ ΦΑΓΗΤΩΝ", avgRevenue: 135509.96 },
  { code: "10.89", description: "ΠΑΡΑΓΩΓΗ ΑΛΛΩΝ ΕΙΔΩΝ ΔΙΑΤΡΟΦΗΣ Π.Δ.Κ.Α.", avgRevenue: 98928.43 },
  { code: "10.91", description: "ΠΑΡΑΓΩΓΗ ΠΑΡΑΣΚΕΥΑΣΜΕΝΩΝ ΖΩΟΤΡΟΦΩΝ ΓΙΑ ΖΩΑ ΠΟΥ ΕΚΤΡΕΦΟΝΤΑΙ ΣΕ ΑΓΡΟΚΤΗΜΑΤΑ", avgRevenue: 476685.56 },
  { code: "11.01", description: "ΑΠΟΣΤΑΞΗ, ΑΝΑΚΑΘΑΡΙΣΜΟΣ ΚΑΙ ΑΝΑΜΙΞΗ ΑΛΚΟΟΛΟΥΧΩΝ ΠΟΤΩΝ", avgRevenue: 16521.00 },
  { code: "11.02", description: "ΠΑΡΑΓΩΓΗ ΟΙΝΟΥ ΑΠΟ ΣΤΑΦΥΛΙΑ", avgRevenue: 76242.67 },
  { code: "13.30", description: "ΤΕΛΕΙΟΠΟΙΗΣΗ (ΦΙΝΙΡΙΣΜΑ) ΥΦΑΝΤΟΥΡΓΙΚΩΝ ΠΡΟΪΟΝΤΩΝ", avgRevenue: 30303.26 },
  { code: "13.91", description: "ΚΑΤΑΣΚΕΥΗ ΠΛΕΚΤΩΝ ΥΦΑΣΜΑΤΩΝ ΚΑΙ ΥΦΑΣΜΑΤΩΝ ΠΛΕΞΗΣ ΚΡΟΣΕ", avgRevenue: 58530.77 },
  { code: "13.92", description: "ΚΑΤΑΣΚΕΥΗ ΕΤΟΙΜΩΝ ΚΛΩΣΤΟΫΦΑΝΤΟΥΡΓΙΚΩΝ ΕΙΔΩΝ, ΕΚΤΟΣ ΑΠΟ ΕΝΔΥΜΑΤΑ", avgRevenue: 52871.94 },
  { code: "13.99", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΥΦΑΝΤΟΥΡΓΙΚΩΝ ΠΡΟΪΟΝΤΩΝ Π.Δ.Κ.Α.", avgRevenue: 37471.42 },
  { code: "14.11", description: "ΚΑΤΑΣΚΕΥΗ ΔΕΡΜΑΤΙΝΩΝ ΕΝΔΥΜΑΤΩΝ", avgRevenue: 14108.87 },
  { code: "14.12", description: "ΚΑΤΑΣΚΕΥΗ ΕΝΔΥΜΑΤΩΝ ΕΡΓΑΣΙΑΣ", avgRevenue: 71227.80 },
  { code: "14.13", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΕΞΩΤΕΡΙΚΩΝ ΕΝΔΥΜΑΤΩΝ", avgRevenue: 66246.12 },
  { code: "14.14", description: "ΚΑΤΑΣΚΕΥΗ ΕΣΩΡΟΥΧΩΝ", avgRevenue: 78208.87 },
  { code: "14.19", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΕΝΔΥΜΑΤΩΝ ΚΑΙ ΕΞΑΡΤΗΜΑΤΩΝ ΕΝΔΥΣΗΣ", avgRevenue: 40136.82 },
  { code: "14.20", description: "ΚΑΤΑΣΚΕΥΗ ΓΟΥΝΙΝΩΝ ΕΙΔΩΝ", avgRevenue: 38649.81 },
  { code: "14.39", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΠΛΕΚΤΩΝ ΕΙΔΩΝ ΚΑΙ ΕΙΔΩΝ ΠΛΕΞΗΣ ΚΡΟΣΕ", avgRevenue: 41774.66 },
  { code: "15.12", description: "ΚΑΤΑΣΚΕΥΗ ΕΙΔΩΝ ΤΑΞΙΔΙΟΥ (ΑΠΟΣΚΕΥΩΝ), ΤΣΑΝΤΩΝ ΚΑΙ ΠΑΡΟΜΟΙΩΝ ΕΙΔΩΝ, ΕΙΔΩΝ ΣΕΛΟΠΟΙΙΑΣ ΚΑΙ ΣΑΓΜΑΤΟΠΟΙΙΑΣ", avgRevenue: 38987.45 },
  { code: "15.20", description: "ΚΑΤΑΣΚΕΥΗ ΥΠΟΔΗΜΑΤΩΝ", avgRevenue: 67744.88 },
  { code: "16.10", description: "ΠΡΙΟΝΙΣΜΑ, ΠΛΑΝΙΣΜΑ ΚΑΙ ΕΜΠΟΤΙΣΜΟΣ ΞΥΛΟΥ", avgRevenue: 128196.74 },
  { code: "16.23", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΞΥΛΟΥΡΓΙΚΩΝ ΠΡΟΪΟΝΤΩΝ ΟΙΚΟΔΟΜΙΚΗΣ", avgRevenue: 48351.36 },
  { code: "16.24", description: "ΚΑΤΑΣΚΕΥΗ ΞΥΛΙΝΩΝ ΕΜΠΟΡΕΥΜΑΤΟΚΙΒΩΤΙΩΝ", avgRevenue: 202082.38 },
  { code: "16.29", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΠΡΟΪΟΝΤΩΝ ΑΠΟ ΞΥΛΟ· ΚΑΤΑΣΚΕΥΗ ΕΙΔΩΝ ΑΠΟ ΦΕΛΛΟ ΚΑΙ ΕΙΔΩΝ ΚΑΛΑΘΟΠΟΙΙΑΣ ΚΑΙ ΣΠΑΡΤΟΠΛΕΚΤΙΚΗΣ", avgRevenue: 23975.46 },
  { code: "17.21", description: "ΚΑΤΑΣΚΕΥΗ ΚΥΜΑΤΟΕΙΔΟΥΣ ΧΑΡΤΙΟΥ ΚΑΙ ΧΑΡΤΟΝΙΟΥ ΚΑΙ ΕΜΠΟΡΕΥΜΑΤΟΚΙΒΩΤΙΩΝ ΑΠΟ ΧΑΡΤΙ ΚΑΙ ΧΑΡΤΟΝΙ", avgRevenue: 147711.16 },
  { code: "17.22", description: "ΚΑΤΑΣΚΕΥΗ ΧΑΡΤΙΝΩΝ ΕΙΔΩΝ ΟΙΚΙΑΚΗΣ ΧΡΗΣΗΣ, ΕΙΔΩΝ ΥΓΙΕΙΝΗΣ ΚΑΙ ΕΙΔΩΝ ΤΟΥΑΛΕΤΑΣ", avgRevenue: 266767.34 },
  { code: "17.23", description: "ΚΑΤΑΣΚΕΥΗ ΕΙΔΩΝ ΧΑΡΤΟΠΩΛΕΙΟΥ (ΧΑΡΤΙΚΩΝ)", avgRevenue: 90153.94 },
  { code: "17.29", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΕΙΔΩΝ ΑΠΟ ΧΑΡΤΙ ΚΑΙ ΧΑΡΤΟΝΙ", avgRevenue: 125212.59 },
  { code: "18.12", description: "ΑΛΛΕΣ ΕΚΤΥΠΩΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 43804.14 },
  { code: "18.13", description: "ΥΠΗΡΕΣΙΕΣ ΠΡΟΕΚΤΥΠΩΣΗΣ ΚΑΙ ΠΡΟΕΓΓΡΑΦΗΣ ΜΕΣΩΝ", avgRevenue: 23280.17 },
  { code: "18.14", description: "ΒΙΒΛΙΟΔΕΤΙΚΕΣ ΚΑΙ ΣΥΝΑΦΕΙΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 27253.46 },
  { code: "18.20", description: "ΑΝΑΠΑΡΑΓΩΓΗ ΠΡΟΕΓΓΕΓΡΑΜΜΕΝΩΝ ΜΕΣΩΝ", avgRevenue: 21329.26 },
  { code: "20.41", description: "ΠΑΡΑΓΩΓΗ ΣΑΠΟΥΝΙΩΝ ΚΑΙ ΑΠΟΡΡΥΠΑΝΤΙΚΩΝ, ΠΡΟΪΟΝΤΩΝ ΚΑΘΑΡΙΣΜΟΥ ΚΑΙ ΣΤΙΛΒΩΣΗΣ", avgRevenue: 65145.37 },
  { code: "20.42", description: "ΠΑΡΑΓΩΓΗ ΑΡΩΜΑΤΩΝ ΚΑΙ ΠΑΡΑΣΚΕΥΑΣΜΑΤΩΝ ΚΑΛΛΩΠΙΣΜΟΥ", avgRevenue: 146893.61 },
  { code: "22.19", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΠΡΟΪΟΝΤΩΝ ΑΠΟ ΕΛΑΣΤΙΚΟ (ΚΑΟΥΤΣΟΥΚ)", avgRevenue: 118220.73 },
  { code: "22.22", description: "ΚΑΤΑΣΚΕΥΗ ΠΛΑΣΤΙΚΩΝ ΕΙΔΩΝ ΣΥΣΚΕΥΑΣΙΑΣ", avgRevenue: 341554.09 },
  { code: "22.23", description: "ΚΑΤΑΣΚΕΥΗ ΠΛΑΣΤΙΚΩΝ ΟΙΚΟΔΟΜΙΚΩΝ ΥΛΙΚΩΝ", avgRevenue: 77431.24 },
  { code: "22.29", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΠΛΑΣΤΙΚΩΝ ΠΡΟΪΟΝΤΩΝ", avgRevenue: 62923.24 },
  { code: "23.12", description: "ΜΟΡΦΟΠΟΙΗΣΗ ΚΑΙ ΚΑΤΕΡΓΑΣΙΑ ΕΠΙΠΕΔΟΥ ΓΥΑΛΙΟΥ", avgRevenue: 97814.39 },
  { code: "23.19", description: "ΚΑΤΑΣΚΕΥΗ ΚΑΙ ΚΑΤΕΡΓΑΣΙΑ ΑΛΛΩΝ ΕΙΔΩΝ ΓΥΑΛΙΟΥ, ΠΕΡΙΛΑΜΒΑΝΟΜΕΝΟΥ ΤΟΥ ΓΥΑΛΙΟΥ ΓΙΑ ΤΕΧΝΙΚΕΣ ΧΡΗΣΕΙΣ", avgRevenue: 19030.78 },
  { code: "23.41", description: "ΚΑΤΑΣΚΕΥΗ ΚΕΡΑΜΙΚΩΝ ΕΙΔΩΝ ΟΙΚΙΑΚΗΣ ΧΡΗΣΗΣ ΚΑΙ ΚΕΡΑΜΙΚΩΝ ΔΙΑΚΟΣΜΗΤΙΚΩΝ ΕΙΔΩΝ", avgRevenue: 33402.77 },
  { code: "23.61", description: "ΚΑΤΑΣΚΕΥΗ ΔΟΜΙΚΩΝ ΠΡΟΪΟΝΤΩΝ ΑΠΟ ΣΚΥΡΟΔΕΜΑ", avgRevenue: 69476.21 },
  { code: "23.62", description: "ΚΑΤΑΣΚΕΥΗ ΔΟΜΙΚΩΝ ΠΡΟΪΟΝΤΩΝ ΑΠΟ ΓΥΨΟ", avgRevenue: 43459.76 },
  { code: "23.63", description: "ΚΑΤΑΣΚΕΥΗ ΕΤΟΙΜΟΥ ΣΚΥΡΟΔΕΜΑΤΟΣ", avgRevenue: 286848.93 },
  { code: "23.69", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΠΡΟΪΟΝΤΩΝ ΑΠΟ ΣΚΥΡΟΔΕΜΑ, ΓΥΨΟ ΚΑΙ ΤΣΙΜΕΝΤΟ", avgRevenue: 48368.17 },
  { code: "23.70", description: "ΚΟΠΗ, ΜΟΡΦΟΠΟΙΗΣΗ ΚΑΙ ΤΕΛΙΚΗ ΕΠΕΞΕΡΓΑΣΙΑ ΛΙΘΩΝ", avgRevenue: 36154.89 },
  { code: "25.11", description: "ΚΑΤΑΣΚΕΥΗ ΜΕΤΑΛΛΙΚΩΝ ΣΚΕΛΕΤΩΝ ΚΑΙ ΜΕΡΩΝ ΜΕΤΑΛΛΙΚΩΝ ΣΚΕΛΕΤΩΝ", avgRevenue: 73939.77 },
  { code: "25.12", description: "ΚΑΤΑΣΚΕΥΗ ΜΕΤΑΛΛΙΚΩΝ ΠΟΡΤΩΝ ΚΑΙ ΠΑΡΑΘΥΡΩΝ", avgRevenue: 69224.37 },
  { code: "25.29", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΜΕΤΑΛΛΙΚΩΝ ΝΤΕΠΟΖΙΤΩΝ, ΔΕΞΑΜΕΝΩΝ ΚΑΙ ΔΟΧΕΙΩΝ", avgRevenue: 94307.23 },
  { code: "25.50", description: "ΣΦΥΡΗΛΑΤΗΣΗ, ΚΟΙΛΑΝΣΗ, ΑΝΙΣΟΠΑΧΗ ΤΥΠΩΣΗ ΚΑΙ ΜΟΡΦΟΠΟΙΗΣΗ ΜΕΤΑΛΛΩΝ ΜΕ ΕΛΑΣΗ· ΚΟΝΙΟΜΕΤΑΛΛΟΥΡΓΙΑ", avgRevenue: 33232.90 },
  { code: "25.61", description: "ΚΑΤΕΡΓΑΣΙΑ ΚΑΙ ΕΠΙΚΑΛΥΨΗ ΜΕΤΑΛΛΩΝ", avgRevenue: 42535.35 },
  { code: "25.62", description: "ΜΕΤΑΛΛΟΤΕΧΝΙΑ", avgRevenue: 37181.64 },
  { code: "25.72", description: "ΚΑΤΑΣΚΕΥΗ ΚΛΕΙΔΑΡΙΩΝ ΚΑΙ ΜΕΝΤΕΣΕΔΩΝ", avgRevenue: 91279.36 },
  { code: "25.73", description: "ΚΑΤΑΣΚΕΥΗ ΕΡΓΑΛΕΙΩΝ", avgRevenue: 60751.98 },
  { code: "25.92", description: "ΚΑΤΑΣΚΕΥΗ ΕΛΑΦΡΩΝ ΜΕΤΑΛΛΙΚΩΝ ΕΙΔΩΝ ΣΥΣΚΕΥΑΣΙΑΣ", avgRevenue: 63303.53 },
  { code: "25.93", description: "ΚΑΤΑΣΚΕΥΗ ΕΙΔΩΝ ΑΠΟ ΣΥΡΜΑ, ΑΛΥΣΙΔΩΝ ΚΑΙ ΕΛΑΤΗΡΙΩΝ", avgRevenue: 75228.54 },
  { code: "25.99", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΜΕΤΑΛΛΙΚΩΝ ΠΡΟΪΟΝΤΩΝ Π.Δ.Κ.Α.", avgRevenue: 56580.29 },
  { code: "26.11", description: "ΚΑΤΑΣΚΕΥΗ ΗΛΕΚΤΡΟΝΙΚΩΝ ΕΞΑΡΤΗΜΑΤΩΝ", avgRevenue: 31865.25 },
  { code: "26.20", description: "ΚΑΤΑΣΚΕΥΗ ΗΛΕΚΤΡΟΝΙΚΩΝ ΥΠΟΛΟΓΙΣΤΩΝ ΚΑΙ ΠΕΡΙΦΕΡΕΙΑΚΟΥ ΕΞΟΠΛΙΣΜΟΥ", avgRevenue: 14720.65 },
  { code: "26.30", description: "ΚΑΤΑΣΚΕΥΗ ΕΞΟΠΛΙΣΜΟΥ ΕΠΙΚΟΙΝΩΝΙΑΣ", avgRevenue: 38050.36 },
  { code: "27.12", description: "ΚΑΤΑΣΚΕΥΗ ΣΥΣΚΕΥΩΝ ΔΙΑΝΟΜΗΣ ΚΑΙ ΕΛΕΓΧΟΥ ΗΛΕΚΤΡΙΚΟΥ ΡΕΥΜΑΤΟΣ", avgRevenue: 96022.44 },
  { code: "27.40", description: "ΚΑΤΑΣΚΕΥΗ ΗΛΕΚΤΡΟΛΟΓΙΚΟΥ ΦΩΤΙΣΤΙΚΟΥ ΕΞΟΠΛΙΣΜΟΥ", avgRevenue: 58568.16 },
  { code: "27.52", description: "ΚΑΤΑΣΚΕΥΗ ΜΗ ΗΛΕΚΤΡΙΚΩΝ ΟΙΚΙΑΚΩΝ ΣΥΣΚΕΥΩΝ", avgRevenue: 162778.63 },
  { code: "28.22", description: "ΚΑΤΑΣΚΕΥΗ ΕΞΟΠΛΙΣΜΟΥ ΑΝΥΨΩΣΗΣ ΚΑΙ ΔΙΑΚΙΝΗΣΗΣ ΦΟΡΤΙΩΝ", avgRevenue: 88989.82 },
  { code: "28.25", description: "ΚΑΤΑΣΚΕΥΗ ΨΥΚΤΙΚΟΥ ΚΑΙ ΚΛΙΜΑΤΙΣΤΙΚΟΥ ΕΞΟΠΛΙΣΜΟΥ ΜΗ ΟΙΚΙΑΚΗΣ ΧΡΗΣΗΣ", avgRevenue: 140229.57 },
  { code: "28.29", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΜΗΧΑΝΗΜΑΤΩΝ ΓΕΝΙΚΗΣ ΧΡΗΣΗΣ Π.Δ.Κ.Α.", avgRevenue: 122840.95 },
  { code: "28.30", description: "ΚΑΤΑΣΚΕΥΗ ΓΕΩΡΓΙΚΩΝ ΚΑΙ ΔΑΣΟΚΟΜΙΚΩΝ ΜΗΧΑΝΗΜΑΤΩΝ", avgRevenue: 97927.24 },
  { code: "28.41", description: "ΚΑΤΑΣΚΕΥΗ ΜΗΧΑΝΗΜΑΤΩΝ ΜΟΡΦΟΠΟΙΗΣΗΣ ΜΕΤΑΛΛΟΥ", avgRevenue: 74646.54 },
  { code: "28.93", description: "ΚΑΤΑΣΚΕΥΗ ΜΗΧΑΝΗΜΑΤΩΝ ΕΠΕΞΕΡΓΑΣΙΑΣ ΤΡΟΦΙΜΩΝ, ΠΟΤΩΝ ΚΑΙ ΚΑΠΝΟΥ", avgRevenue: 101095.19 },
  { code: "28.99", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΜΗΧΑΝΗΜΑΤΩΝ ΕΙΔΙΚΗΣ ΧΡΗΣΗΣ Π.Δ.Κ.Α.", avgRevenue: 79752.74 },
  { code: "29.20", description: "ΚΑΤΑΣΚΕΥΗ ΑΜΑΞΩΜΑΤΩΝ ΓΙΑ ΜΗΧΑΝΟΚΙΝΗΤΑ ΟΧΗΜΑΤΑ· ΚΑΤΑΣΚΕΥΗ ΡΥΜΟΥΛΚΟΥΜΕΝΩΝ ΚΑΙ ΗΜΙΡΥΜΟΥΛΚΟΥΜΕΝΩΝ ΟΧΗΜΑΤΩΝ", avgRevenue: 97370.76 },
  { code: "29.32", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΜΕΡΩΝ ΚΑΙ ΕΞΑΡΤΗΜΑΤΩΝ ΓΙΑ ΜΗΧΑΝΟΚΙΝΗΤΑ ΟΧΗΜΑΤΑ", avgRevenue: 30936.80 },
  { code: "30.11", description: "ΝΑΥΠΗΓΗΣΗ ΠΛΟΙΩΝ ΚΑΙ ΠΛΩΤΩΝ ΚΑΤΑΣΚΕΥΩΝ", avgRevenue: 119429.70 },
  { code: "30.12", description: "ΝΑΥΠΗΓΗΣΗ ΣΚΑΦΩΝ ΑΝΑΨΥΧΗΣ ΚΑΙ ΑΘΛΗΤΙΣΜΟΥ", avgRevenue: 76725.36 },
  { code: "31.01", description: "ΚΑΤΑΣΚΕΥΗ ΕΠΙΠΛΩΝ ΓΙΑ ΓΡΑΦΕΙΑ ΚΑΙ ΚΑΤΑΣΤΗΜΑΤΑ", avgRevenue: 66743.24 },
  { code: "31.02", description: "ΚΑΤΑΣΚΕΥΗ ΕΠΙΠΛΩΝ ΚΟΥΖΙΝΑΣ", avgRevenue: 49162.17 },
  { code: "31.03", description: "ΚΑΤΑΣΚΕΥΗ ΣΤΡΩΜΑΤΩΝ", avgRevenue: 96063.53 },
  { code: "31.09", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΕΠΙΠΛΩΝ", avgRevenue: 41326.44 },
  { code: "32.12", description: "ΚΑΤΑΣΚΕΥΗ ΚΟΣΜΗΜΑΤΩΝ ΚΑΙ ΣΥΝΑΦΩΝ ΕΙΔΩΝ", avgRevenue: 37382.72 },
  { code: "32.13", description: "ΚΑΤΑΣΚΕΥΗ ΚΟΣΜΗΜΑΤΩΝ ΑΠΟΜΙΜΗΣΗΣ ΚΑΙ ΣΥΝΑΦΩΝ ΕΙΔΩΝ", avgRevenue: 17059.68 },
  { code: "32.20", description: "ΚΑΤΑΣΚΕΥΗ ΜΟΥΣΙΚΩΝ ΟΡΓΑΝΩΝ", avgRevenue: 19290.06 },
  { code: "32.30", description: "ΚΑΤΑΣΚΕΥΗ ΑΘΛΗΤΙΚΩΝ ΕΙΔΩΝ", avgRevenue: 21356.85 },
  { code: "32.40", description: "ΚΑΤΑΣΚΕΥΗ ΠΑΙΧΝΙΔΙΩΝ ΚΑΘΕ ΕΙΔΟΥΣ", avgRevenue: 60506.72 },
  { code: "32.50", description: "ΚΑΤΑΣΚΕΥΗ ΙΑΤΡΙΚΩΝ ΚΑΙ ΟΔΟΝΤΙΑΤΡΙΚΩΝ ΟΡΓΑΝΩΝ ΚΑΙ ΠΡΟΜΗΘΕΙΩΝ", avgRevenue: 35512.71 },
  { code: "32.99", description: "ΑΛΛΕΣ ΜΕΤΑΠΟΙΗΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ Π.Δ.Κ.Α.", avgRevenue: 27593.29 },
  { code: "33.11", description: "ΕΠΙΣΚΕΥΗ ΜΕΤΑΛΛΙΚΩΝ ΠΡΟΪΟΝΤΩΝ", avgRevenue: 33260.81 },
  { code: "33.12", description: "ΕΠΙΣΚΕΥΗ ΜΗΧΑΝΗΜΑΤΩΝ", avgRevenue: 26236.46 },
  { code: "33.13", description: "ΕΠΙΣΚΕΥΗ ΗΛΕΚΤΡΟΝΙΚΟΥ ΚΑΙ ΟΠΤΙΚΟΥ ΕΞΟΠΛΙΣΜΟΥ", avgRevenue: 23943.28 },
  { code: "33.14", description: "ΕΠΙΣΚΕΥΗ ΗΛΕΚΤΡΙΚΟΥ ΕΞΟΠΛΙΣΜΟΥ", avgRevenue: 29646.54 },
  { code: "33.15", description: "ΕΠΙΣΚΕΥΗ ΚΑΙ ΣΥΝΤΗΡΗΣΗ ΠΛΟΙΩΝ ΚΑΙ ΣΚΑΦΩΝ", avgRevenue: 59659.90 },
  { code: "33.19", description: "ΕΠΙΣΚΕΥΗ ΑΛΛΟΥ ΕΞΟΠΛΙΣΜΟΥ", avgRevenue: 13111.63 },
  { code: "33.20", description: "ΕΓΚΑΤΑΣΤΑΣΗ ΒΙΟΜΗΧΑΝΙΚΩΝ ΜΗΧΑΝΗΜΑΤΩΝ ΚΑΙ ΕΞΟΠΛΙΣΜΟΥ", avgRevenue: 43097.87 },
  { code: "35.11", description: "ΠΑΡΑΓΩΓΗ ΗΛΕΚΤΡΙΚΟΥ ΡΕΥΜΑΤΟΣ", avgRevenue: 47273.78 },
  { code: "35.13", description: "ΔΙΑΝΟΜΗ ΗΛΕΚΤΡΙΚΟΥ ΡΕΥΜΑΤΟΣ", avgRevenue: 228130.30 },
  { code: "35.14", description: "ΕΜΠΟΡΙΟ ΗΛΕΚΤΡΙΚΟΥ ΡΕΥΜΑΤΟΣ", avgRevenue: 21473.35 },
  { code: "35.30", description: "ΠΑΡΟΧΗ ΑΤΜΟΥ ΚΑΙ ΚΛΙΜΑΤΙΣΜΟΥ", avgRevenue: 84010.34 },
  { code: "36.00", description: "ΣΥΛΛΟΓΗ, ΕΠΕΞΕΡΓΑΣΙΑ ΚΑΙ ΠΑΡΟΧΗ ΝΕΡΟΥ", avgRevenue: 42871.38 },
  { code: "37.00", description: "ΕΠΕΞΕΡΓΑΣΙΑ ΛΥΜΑΤΩΝ", avgRevenue: 58316.00 },
  { code: "38.11", description: "ΣΥΛΛΟΓΗ ΜΗ ΕΠΙΚΙΝΔΥΝΩΝ ΑΠΟΡΡΙΜΜΑΤΩΝ", avgRevenue: 87136.59 },
  { code: "38.12", description: "ΣΥΛΛΟΓΗ ΕΠΙΚΙΝΔΥΝΩΝ ΑΠΟΡΡΙΜΜΑΤΩΝ", avgRevenue: 39067.80 },
  { code: "38.32", description: "ΑΝΑΚΤΗΣΗ ΔΙΑΛΕΓΜΕΝΟΥ ΥΛΙΚΟΥ", avgRevenue: 204426.80 },
  { code: "39.00", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΕΞΥΓΙΑΝΣΗΣ ΚΑΙ ΑΛΛΕΣ ΥΠΗΡΕΣΙΕΣ ΓΙΑ ΤΗ ΔΙΑΧΕΙΡΙΣΗ ΑΠΟΒΛΗΤΩΝ", avgRevenue: 41128.47 },
  { code: "41.10", description: "ΑΝΑΠΤΥΞΗ ΟΙΚΟΔΟΜΙΚΩΝ ΣΧΕΔΙΩΝ", avgRevenue: 17088.85 },
  { code: "41.20", description: "ΚΑΤΑΣΚΕΥΑΣΤΙΚΕΣ ΕΡΓΑΣΙΕΣ ΚΤΙΡΙΩΝ ΓΙΑ ΚΑΤΟΙΚΙΕΣ ΚΑΙ ΜΗ", avgRevenue: 67432.41 },
  { code: "42.11", description: "ΚΑΤΑΣΚΕΥΗ ΔΡΟΜΩΝ ΚΑΙ ΑΥΤΟΚΙΝΗΤΟΔΡΟΜΩΝ", avgRevenue: 151950.65 },
  { code: "42.21", description: "ΚΑΤΑΣΚΕΥΗ ΚΟΙΝΩΦΕΛΩΝ ΕΡΓΩΝ ΣΧΕΤΙΚΩΝ ΜΕ ΜΕΤΑΦΟΡΑ ΥΓΡΩΝ", avgRevenue: 78027.67 },
  { code: "42.22", description: "ΚΑΤΑΣΚΕΥΗ ΚΟΙΝΩΦΕΛΩΝ ΕΡΓΩΝ ΗΛΕΚΤΡΙΚΗΣ ΕΝΕΡΓΕΙΑΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ", avgRevenue: 95173.63 },
  { code: "42.91", description: "ΚΑΤΑΣΚΕΥΗ ΥΔΡΑΥΛΙΚΩΝ ΚΑΙ ΛΙΜΕΝΙΚΩΝ ΕΡΓΩΝ", avgRevenue: 39110.24 },
  { code: "42.99", description: "ΚΑΤΑΣΚΕΥΗ ΑΛΛΩΝ ΕΡΓΩΝ ΠΟΛΙΤΙΚΟΥ ΜΗΧΑΝΙΚΟΥ Π.Δ.Κ.Α.", avgRevenue: 83632.24 },
  { code: "43.11", description: "ΚΑΤΕΔΑΦΙΣΕΙΣ", avgRevenue: 56557.60 },
  { code: "43.12", description: "ΠΡΟΕΤΟΙΜΑΣΙΑ ΕΡΓΟΤΑΞΙΟΥ", avgRevenue: 66451.50 },
  { code: "43.13", description: "ΔΟΚΙΜΑΣΤΙΚΕΣ ΓΕΩΤΡΗΣΕΙΣ", avgRevenue: 88890.25 },
  { code: "43.21", description: "ΗΛΕΚΤΡΙΚΕΣ ΕΓΚΑΤΑΣΤΑΣΕΙΣ", avgRevenue: 36300.93 },
  { code: "43.22", description: "ΥΔΡΑΥΛΙΚΕΣ ΚΑΙ ΚΛΙΜΑΤΙΣΤΙΚΕΣ ΕΓΚΑΤΑΣΤΑΣΕΙΣ ΘΕΡΜΑΝΣΗΣ ΚΑΙ ΨΥΞΗΣ", avgRevenue: 32354.33 },
  { code: "43.29", description: "ΑΛΛΕΣ ΚΑΤΑΣΚΕΥΑΣΤΙΚΕΣ ΕΓΚΑΤΑΣΤΑΣΕΙΣ", avgRevenue: 45365.28 },
  { code: "43.31", description: "ΕΠΙΧΡΙΣΕΙΣ ΚΟΝΙΑΜΑΤΩΝ", avgRevenue: 37454.65 },
  { code: "43.32", description: "ΞΥΛΟΥΡΓΙΚΕΣ ΕΡΓΑΣΙΕΣ", avgRevenue: 35593.01 },
  { code: "43.33", description: "ΕΠΕΝΔΥΣΕΙΣ ΔΑΠΕΔΩΝ ΚΑΙ ΤΟΙΧΩΝ", avgRevenue: 28007.41 },
  { code: "43.34", description: "ΧΡΩΜΑΤΙΣΜΟΙ ΚΑΙ ΤΟΠΟΘΕΤΗΣΗ ΥΑΛΟΠΙΝΑΚΩΝ", avgRevenue: 28881.19 },
  { code: "43.39", description: "ΑΛΛΕΣ ΚΑΤΑΣΚΕΥΑΣΤΙΚΕΣ ΕΡΓΑΣΙΕΣ ΟΛΟΚΛΗΡΩΣΗΣ ΚΑΙ ΤΕΛΕΙΩΜΑΤΟΣ", avgRevenue: 43135.51 },
  { code: "43.91", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΚΑΤΑΣΚΕΥΗΣ ΣΤΕΓΩΝ", avgRevenue: 29319.21 },
  { code: "43.99", description: "ΑΛΛΕΣ ΕΞΕΙΔΙΚΕΥΜΕΝΕΣ ΚΑΤΑΣΚΕΥΑΣΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ Π.Δ.Κ.Α.", avgRevenue: 50926.37 },
  { code: "45.11", description: "ΠΩΛΗΣΗ ΑΥΤΟΚΙΝΗΤΩΝ ΚΑΙ ΕΛΑΦΡΩΝ ΜΗΧΑΝΟΚΙΝΗΤΩΝ ΟΧΗΜΑΤΩΝ", avgRevenue: 151942.16 },
  { code: "45.19", description: "ΠΩΛΗΣΗ ΑΛΛΩΝ ΜΗΧΑΝΟΚΙΝΗΤΩΝ ΟΧΗΜΑΤΩΝ", avgRevenue: 124593.37 },
  { code: "45.20", description: "ΣΥΝΤΗΡΗΣΗ ΚΑΙ ΕΠΙΣΚΕΥΗ ΜΗΧΑΝΟΚΙΝΗΤΩΝ ΟΧΗΜΑΤΩΝ", avgRevenue: 23412.51 },
  { code: "45.31", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΜΕΡΩΝ ΚΑΙ ΕΞΑΡΤΗΜΑΤΩΝ ΜΗΧΑΝΟΚΙΝΗΤΩΝ ΟΧΗΜΑΤΩΝ", avgRevenue: 61526.85 },
  { code: "45.32", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΜΕΡΩΝ ΚΑΙ ΕΞΑΡΤΗΜΑΤΩΝ ΜΗΧΑΝΟΚΙΝΗΤΩΝ ΟΧΗΜΑΤΩΝ ΣΕ ΕΞΕΙΔΙΚΕΥΜΕΝΑ ΚΑΤΑΣΤΗΜΑΤΑ", avgRevenue: 32668.46 },
  { code: "45.40", description: "ΠΩΛΗΣΗ, ΣΥΝΤΗΡΗΣΗ ΚΑΙ ΕΠΙΣΚΕΥΗ ΜΟΤΟΣΙΚΛΕΤΩΝ ΚΑΙ ΤΩΝ ΜΕΡΩΝ ΚΑΙ ΕΞΑΡΤΗΜΑΤΩΝ ΤΟΥΣ", avgRevenue: 70265.87 },
  { code: "46.11", description: "ΕΜΠΟΡΙΚΟΙ ΑΝΤΙΠΡΟΣΩΠΟΙ - ΓΕΩΡΓΙΚΕΣ ΠΡΩΤΕΣ ΥΛΕΣ", avgRevenue: 62207.88 },
  { code: "46.12", description: "ΕΜΠΟΡΙΚΟΙ ΑΝΤΙΠΡΟΣΩΠΟΙ - ΚΑΥΣΙΜΑ & ΜΕΤΑΛΛΑ", avgRevenue: 78034.65 },
  { code: "46.13", description: "ΕΜΠΟΡΙΚΟΙ ΑΝΤΙΠΡΟΣΩΠΟΙ - ΞΥΛΕΙΑ & ΟΙΚΟΔΟΜΙΚΑ ΥΛΙΚΑ", avgRevenue: 58819.89 },
  { code: "46.14", description: "ΕΜΠΟΡΙΚΟΙ ΑΝΤΙΠΡΟΣΩΠΟΙ - ΜΗΧΑΝΗΜΑΤΑ", avgRevenue: 56350.20 },
  { code: "46.15", description: "ΕΜΠΟΡΙΚΟΙ ΑΝΤΙΠΡΟΣΩΠΟΙ - ΕΠΙΠΛΑ & ΕΙΔΗ ΟΙΚΙΑΚΗΣ ΧΡΗΣΗΣ", avgRevenue: 55424.68 },
  { code: "46.16", description: "ΕΜΠΟΡΙΚΟΙ ΑΝΤΙΠΡΟΣΩΠΟΙ - ΕΝΔΥΜΑΤΑ & ΥΠΟΔΗΜΑΤΑ", avgRevenue: 68406.40 },
  { code: "46.17", description: "ΕΜΠΟΡΙΚΟΙ ΑΝΤΙΠΡΟΣΩΠΟΙ - ΤΡΟΦΙΜΑ & ΠΟΤΑ", avgRevenue: 103443.96 },
  { code: "46.18", description: "ΕΜΠΟΡΙΚΟΙ ΑΝΤΙΠΡΟΣΩΠΟΙ - ΑΛΛΑ ΠΡΟΪΟΝΤΑ", avgRevenue: 37122.47 },
  { code: "46.19", description: "ΕΜΠΟΡΙΚΟΙ ΑΝΤΙΠΡΟΣΩΠΟΙ - ΔΙΑΦΟΡΑ ΕΙΔΗ", avgRevenue: 55690.78 },
  { code: "46.21", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΣΙΤΗΡΩΝ, ΣΠΟΡΩΝ ΚΑΙ ΖΩΟΤΡΟΦΩΝ", avgRevenue: 208052.80 },
  { code: "46.22", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΛΟΥΛΟΥΔΙΩΝ ΚΑΙ ΦΥΤΩΝ", avgRevenue: 41394.56 },
  { code: "46.23", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΖΩΝΤΩΝ ΖΩΩΝ", avgRevenue: 223800.58 },
  { code: "46.24", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΔΕΡΜΑΤΩΝ", avgRevenue: 81222.55 },
  { code: "46.31", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΦΡΟΥΤΩΝ ΚΑΙ ΛΑΧΑΝΙΚΩΝ", avgRevenue: 254591.77 },
  { code: "46.32", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΚΡΕΑΤΟΣ ΚΑΙ ΠΡΟΪΟΝΤΩΝ ΚΡΕΑΤΟΣ", avgRevenue: 138307.05 },
  { code: "46.33", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΓΑΛΑΚΤΟΚΟΜΙΚΩΝ ΠΡΟΪΟΝΤΩΝ, ΑΒΓΩΝ ΚΑΙ ΕΛΑΙΩΝ", avgRevenue: 279563.46 },
  { code: "46.34", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΠΟΤΩΝ", avgRevenue: 195190.64 },
  { code: "46.35", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΠΡΟΪΟΝΤΩΝ ΚΑΠΝΟΥ", avgRevenue: 1202704.40 },
  { code: "46.36", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΖΑΧΑΡΗΣ & ΣΟΚΟΛΑΤΑΣ", avgRevenue: 105747.56 },
  { code: "46.37", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΚΑΦΕ, ΤΣΑΓΙΟΥ & ΜΠΑΧΑΡΙΚΩΝ", avgRevenue: 95385.38 },
  { code: "46.38", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΑΛΛΩΝ ΤΡΟΦΙΜΩΝ", avgRevenue: 125616.88 },
  { code: "46.39", description: "ΜΗ ΕΞΕΙΔΙΚΕΥΜΕΝΟ ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΤΡΟΦΙΜΩΝ", avgRevenue: 227211.10 },
  { code: "46.41", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΚΛΩΣΤΟΫΦΑΝΤΟΥΡΓΙΚΩΝ", avgRevenue: 51287.16 },
  { code: "46.42", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΕΝΔΥΜΑΤΩΝ ΚΑΙ ΥΠΟΔΗΜΑΤΩΝ", avgRevenue: 68639.23 },
  { code: "46.43", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΗΛΕΚΤΡΙΚΩΝ ΟΙΚΙΑΚΩΝ ΣΥΣΚΕΥΩΝ", avgRevenue: 46374.31 },
  { code: "46.44", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΠΟΡΣΕΛΑΝΗΣ & ΓΥΑΛΙΚΩΝ", avgRevenue: 62418.61 },
  { code: "46.45", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΑΡΩΜΑΤΩΝ ΚΑΙ ΚΑΛΛΥΝΤΙΚΩΝ", avgRevenue: 51010.30 },
  { code: "46.46", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΦΑΡΜΑΚΕΥΤΙΚΩΝ ΠΡΟΪΟΝΤΩΝ", avgRevenue: 157124.33 },
  { code: "46.47", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΕΠΙΠΛΩΝ & ΦΩΤΙΣΤΙΚΩΝ", avgRevenue: 53731.95 },
  { code: "46.48", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΡΟΛΟΓΙΩΝ ΚΑΙ ΚΟΣΜΗΜΑΤΩΝ", avgRevenue: 36789.90 },
  { code: "46.49", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΑΛΛΩΝ ΕΙΔΩΝ ΟΙΚΙΑΚΗΣ ΧΡΗΣΗΣ", avgRevenue: 60934.40 },
  { code: "46.51", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΗΛΕΚΤΡΟΝΙΚΩΝ ΥΠΟΛΟΓΙΣΤΩΝ", avgRevenue: 48757.92 },
  { code: "46.52", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΗΛΕΚΤΡΟΝΙΚΟΥ & ΤΗΛΕΠΙΚΟΙΝΩΝΙΑΚΟΥ ΕΞΟΠΛΙΣΜΟΥ", avgRevenue: 64197.15 },
  { code: "46.61", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΓΕΩΡΓΙΚΩΝ ΜΗΧΑΝΗΜΑΤΩΝ", avgRevenue: 95313.17 },
  { code: "46.62", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΕΡΓΑΛΕΙΟΜΗΧΑΝΩΝ", avgRevenue: 107464.37 },
  { code: "46.63", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΕΞΟΡΥΚΤΙΚΩΝ ΜΗΧΑΝΗΜΑΤΩΝ", avgRevenue: 173081.72 },
  { code: "46.64", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΜΗΧΑΝΗΜΑΤΩΝ ΚΛΩΣΤΟΫΦΑΝΤΟΥΡΓΙΑΣ", avgRevenue: 52530.55 },
  { code: "46.65", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΕΠΙΠΛΩΝ ΓΡΑΦΕΙΟΥ", avgRevenue: 52898.43 },
  { code: "46.66", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΑΛΛΩΝ ΜΗΧΑΝΩΝ ΓΡΑΦΕΙΟΥ", avgRevenue: 50807.70 },
  { code: "46.69", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΑΛΛΩΝ ΜΗΧΑΝΗΜΑΤΩΝ", avgRevenue: 77529.15 },
  { code: "46.71", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΚΑΥΣΙΜΩΝ", avgRevenue: 177347.70 },
  { code: "46.72", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΜΕΤΑΛΛΩΝ ΚΑΙ ΜΕΤΑΛΛΕΥΜΑΤΩΝ", avgRevenue: 218734.05 },
  { code: "46.73", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΞΥΛΕΙΑΣ & ΟΙΚΟΔΟΜΙΚΩΝ ΥΛΙΚΩΝ", avgRevenue: 103077.08 },
  { code: "46.74", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΣΙΔΗΡΙΚΩΝ & ΥΔΡΑΥΛΙΚΩΝ", avgRevenue: 68712.35 },
  { code: "46.75", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΧΗΜΙΚΩΝ ΠΡΟΪΟΝΤΩΝ", avgRevenue: 222595.69 },
  { code: "46.76", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΑΛΛΩΝ ΕΝΔΙΑΜΕΣΩΝ ΠΡΟΪΟΝΤΩΝ", avgRevenue: 116432.10 },
  { code: "46.77", description: "ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ ΑΠΟΡΡΙΜΜΑΤΩΝ", avgRevenue: 160940.38 },
  { code: "46.90", description: "ΜΗ ΕΞΕΙΔΙΚΕΥΜΕΝΟ ΧΟΝΔΡΙΚΟ ΕΜΠΟΡΙΟ", avgRevenue: 64943.38 },
  { code: "47.11", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ - ΜΗ ΕΞΕΙΔΙΚΕΥΜΕΝΑ (ΤΡΟΦΙΜΑ)", avgRevenue: 141323.18 },
  { code: "47.19", description: "ΑΛΛΟ ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΜΗ ΕΞΕΙΔΙΚΕΥΜΕΝΟ", avgRevenue: 24766.85 },
  { code: "47.21", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΦΡΟΥΤΩΝ ΚΑΙ ΛΑΧΑΝΙΚΩΝ", avgRevenue: 86805.20 },
  { code: "47.22", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΚΡΕΑΤΟΣ", avgRevenue: 149046.58 },
  { code: "47.23", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΨΑΡΙΩΝ", avgRevenue: 78561.71 },
  { code: "47.24", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΨΩΜΙΟΥ & ΑΡΤΟΣΚΕΥΑΣΜΑΤΩΝ", avgRevenue: 57999.50 },
  { code: "47.25", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΠΟΤΩΝ", avgRevenue: 31852.43 },
  { code: "47.26", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΠΡΟΪΟΝΤΩΝ ΚΑΠΝΟΥ", avgRevenue: 142444.99 },
  { code: "47.29", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΑΛΛΩΝ ΤΡΟΦΙΜΩΝ", avgRevenue: 53533.93 },
  { code: "47.30", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΚΑΥΣΙΜΩΝ ΚΙΝΗΣΗΣ", avgRevenue: 669782.39 },
  { code: "47.41", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΗΛΕΚΤΡΟΝΙΚΩΝ ΥΠΟΛΟΓΙΣΤΩΝ", avgRevenue: 26488.18 },
  { code: "47.42", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΤΗΛΕΠΙΚΟΙΝΩΝΙΑΚΟΥ ΕΞΟΠΛΙΣΜΟΥ", avgRevenue: 47777.37 },
  { code: "47.43", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΕΞΟΠΛΙΣΜΟΥ ΗΧΟΥ ΚΑΙ ΕΙΚΟΝΑΣ", avgRevenue: 24806.21 },
  { code: "47.51", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΚΛΩΣΤΟΫΦΑΝΤΟΥΡΓΙΚΩΝ", avgRevenue: 33597.34 },
  { code: "47.52", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΣΙΔΗΡΙΚΩΝ & ΧΡΩΜΑΤΩΝ", avgRevenue: 49014.86 },
  { code: "47.53", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΧΑΛΙΩΝ & ΕΠΕΝΔΥΣΕΩΝ", avgRevenue: 25117.31 },
  { code: "47.54", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΗΛΕΚΤΡΙΚΩΝ ΟΙΚΙΑΚΩΝ ΣΥΣΚΕΥΩΝ", avgRevenue: 51930.61 },
  { code: "47.59", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΕΠΙΠΛΩΝ & ΦΩΤΙΣΤΙΚΩΝ", avgRevenue: 38165.95 },
  { code: "47.61", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΒΙΒΛΙΩΝ", avgRevenue: 34988.99 },
  { code: "47.62", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΕΦΗΜΕΡΙΔΩΝ & ΓΡΑΦΙΚΗΣ ΥΛΗΣ", avgRevenue: 26886.49 },
  { code: "47.63", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΕΓΓΡΑΦΩΝ ΜΟΥΣΙΚΗΣ & ΕΙΚΟΝΑΣ", avgRevenue: 20906.40 },
  { code: "47.64", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΑΘΛΗΤΙΚΟΥ ΕΞΟΠΛΙΣΜΟΥ", avgRevenue: 59481.47 },
  { code: "47.65", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΠΑΙΧΝΙΔΙΩΝ", avgRevenue: 42072.13 },
  { code: "47.71", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΕΝΔΥΜΑΤΩΝ", avgRevenue: 50443.73 },
  { code: "47.72", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΥΠΟΔΗΜΑΤΩΝ", avgRevenue: 44107.70 },
  { code: "47.73", description: "ΦΑΡΜΑΚΕΙΑ", avgRevenue: 292571.17 },
  { code: "47.74", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΙΑΤΡΙΚΩΝ & ΟΡΘΟΠΕΔΙΚΩΝ ΕΙΔΩΝ", avgRevenue: 36322.37 },
  { code: "47.75", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΚΑΛΛΥΝΤΙΚΩΝ", avgRevenue: 18141.18 },
  { code: "47.76", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΛΟΥΛΟΥΔΙΩΝ & ΦΥΤΩΝ", avgRevenue: 61072.59 },
  { code: "47.77", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΡΟΛΟΓΙΩΝ & ΚΟΣΜΗΜΑΤΩΝ", avgRevenue: 37060.75 },
  { code: "47.78", description: "ΑΛΛΟ ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΚΑΙΝΟΥΡΓΙΩΝ ΕΙΔΩΝ", avgRevenue: 46866.00 },
  { code: "47.79", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΜΕΤΑΧΕΙΡΙΣΜΕΝΩΝ ΕΙΔΩΝ", avgRevenue: 30977.30 },
  { code: "47.81", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΣΕ ΥΠΑΙΘΡΙΟΥΣ ΠΑΓΚΟΥΣ (ΤΡΟΦΙΜΑ)", avgRevenue: 39585.19 },
  { code: "47.82", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΣΕ ΥΠΑΙΘΡΙΟΥΣ ΠΑΓΚΟΥΣ (ΕΝΔΥΜΑΤΑ)", avgRevenue: 6546.29 },
  { code: "47.89", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΣΕ ΥΠΑΙΘΡΙΟΥΣ ΠΑΓΚΟΥΣ (ΑΛΛΑ)", avgRevenue: 13063.84 },
  { code: "47.91", description: "ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΜΕ ΑΛΛΗΛΟΓΡΑΦΙΑ / ΔΙΑΔΙΚΤΥΟ", avgRevenue: 30857.33 },
  { code: "47.99", description: "ΑΛΛΟ ΛΙΑΝΙΚΟ ΕΜΠΟΡΙΟ ΕΚΤΟΣ ΚΑΤΑΣΤΗΜΑΤΩΝ", avgRevenue: 54454.94 },
  { code: "49.31", description: "ΑΣΤΙΚΕΣ ΜΕΤΑΦΟΡΕΣ ΕΠΙΒΑΤΩΝ", avgRevenue: 61991.03 },
  { code: "49.32", description: "ΤΑΞΙ", avgRevenue: 18594.84 },
  { code: "49.39", description: "ΑΛΛΕΣ ΧΕΡΣΑΙΕΣ ΜΕΤΑΦΟΡΕΣ ΕΠΙΒΑΤΩΝ", avgRevenue: 64901.58 },
  { code: "49.41", description: "ΟΔΙΚΕΣ ΜΕΤΑΦΟΡΕΣ ΕΜΠΟΡΕΥΜΑΤΩΝ", avgRevenue: 101182.15 },
  { code: "49.42", description: "ΥΠΗΡΕΣΙΕΣ ΜΕΤΑΚΟΜΙΣΗΣ", avgRevenue: 35984.06 },
  { code: "50.10", description: "ΘΑΛΑΣΣΙΕΣ & ΑΚΤΟΠΛΟΪΚΕΣ ΜΕΤΑΦΟΡΕΣ ΕΠΙΒΑΤΩΝ", avgRevenue: 47089.39 },
  { code: "50.30", description: "ΕΣΩΤΕΡΙΚΕΣ ΠΛΩΤΕΣ ΜΕΤΑΦΟΡΕΣ ΕΠΙΒΑΤΩΝ", avgRevenue: 45368.39 },
  { code: "52.10", description: "ΑΠΟΘΗΚΕΥΣΗ", avgRevenue: 45045.41 },
  { code: "52.21", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΣΥΝΑΦΕΙΣ ΜΕ ΧΕΡΣΑΙΕΣ ΜΕΤΑΦΟΡΕΣ", avgRevenue: 30997.19 },
  { code: "52.22", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΣΥΝΑΦΕΙΣ ΜΕ ΠΛΩΤΕΣ ΜΕΤΑΦΟΡΕΣ", avgRevenue: 19742.46 },
  { code: "52.24", description: "ΔΙΑΚΙΝΗΣΗ ΦΟΡΤΙΩΝ", avgRevenue: 80484.00 },
  { code: "52.29", description: "ΑΛΛΕΣ ΥΠΟΣΤΗΡΙΚΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΜΕΤΑΦΟΡΩΝ", avgRevenue: 131863.92 },
  { code: "53.10", description: "ΤΑΧΥΔΡΟΜΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 16276.23 },
  { code: "53.20", description: "ΑΛΛΕΣ ΤΑΧΥΔΡΟΜΙΚΕΣ & ΤΑΧΥΜΕΤΑΦΟΡΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 19341.28 },
  { code: "55.10", description: "ΞΕΝΟΔΟΧΕΙΑ ΚΑΙ ΠΑΡΟΜΟΙΑ ΚΑΤΑΛΥΜΑΤΑ", avgRevenue: 88982.87 },
  { code: "55.20", description: "ΚΑΤΑΛΥΜΑΤΑ ΔΙΑΚΟΠΩΝ", avgRevenue: 35255.19 },
  { code: "55.30", description: "ΧΩΡΟΙ ΚΑΤΑΣΚΗΝΩΣΗΣ", avgRevenue: 57147.98 },
  { code: "55.90", description: "ΑΛΛΑ ΚΑΤΑΛΥΜΑΤΑ", avgRevenue: 32243.37 },
  { code: "56.10", description: "ΕΣΤΙΑΤΟΡΙΑ ΚΑΙ ΥΠΗΡΕΣΙΕΣ ΦΑΓΗΤΟΥ", avgRevenue: 98477.32 },
  { code: "56.21", description: "ΥΠΗΡΕΣΙΕΣ ΤΡΟΦΟΔΟΣΙΑΣ ΓΙΑ ΕΚΔΗΛΩΣΕΙΣ", avgRevenue: 54797.72 },
  { code: "56.29", description: "ΑΛΛΕΣ ΥΠΗΡΕΣΙΕΣ ΕΣΤΙΑΣΗΣ", avgRevenue: 19641.86 },
  { code: "56.30", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΠΑΡΟΧΗΣ ΠΟΤΩΝ", avgRevenue: 43524.90 },
  { code: "58.11", description: "ΕΚΔΟΣΗ ΒΙΒΛΙΩΝ", avgRevenue: 38798.69 },
  { code: "58.13", description: "ΕΚΔΟΣΗ ΕΦΗΜΕΡΙΔΩΝ", avgRevenue: 40024.12 },
  { code: "58.14", description: "ΕΚΔΟΣΗ ΠΕΡΙΟΔΙΚΩΝ", avgRevenue: 35640.01 },
  { code: "58.19", description: "ΑΛΛΕΣ ΕΚΔΟΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 24126.49 },
  { code: "58.29", description: "ΕΚΔΟΣΗ ΛΟΓΙΣΜΙΚΟΥ", avgRevenue: 24793.86 },
  { code: "59.11", description: "ΠΑΡΑΓΩΓΗ ΚΙΝΗΜΑΤΟΓΡΑΦΙΚΩΝ ΤΑΙΝΙΩΝ & VIDEO", avgRevenue: 27522.27 },
  { code: "59.12", description: "ΣΥΝΟΔΕΥΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΠΑΡΑΓΩΓΗΣ ΤΑΙΝΙΩΝ", avgRevenue: 22333.21 },
  { code: "59.14", description: "ΠΡΟΒΟΛΗ ΚΙΝΗΜΑΤΟΓΡΑΦΙΚΩΝ ΤΑΙΝΙΩΝ", avgRevenue: 60452.13 },
  { code: "59.20", description: "ΗΧΟΓΡΑΦΗΣΕΙΣ ΚΑΙ ΜΟΥΣΙΚΕΣ ΕΚΔΟΣΕΙΣ", avgRevenue: 16405.92 },
  { code: "60.10", description: "ΡΑΔΙΟΦΩΝΙΚΕΣ ΕΚΠΟΜΠΕΣ", avgRevenue: 21417.80 },
  { code: "60.20", description: "ΤΗΛΕΟΠΤΙΚΕΣ ΕΚΠΟΜΠΕΣ", avgRevenue: 28440.31 },
  { code: "61.10", description: "ΕΝΣΥΡΜΑΤΕΣ ΤΗΛΕΠΙΚΟΙΝΩΝΙΕΣ", avgRevenue: 26469.60 },
  { code: "61.20", description: "ΑΣΥΡΜΑΤΕΣ ΤΗΛΕΠΙΚΟΙΝΩΝΙΕΣ", avgRevenue: 67562.34 },
  { code: "61.90", description: "ΑΛΛΕΣ ΤΗΛΕΠΙΚΟΙΝΩΝΙΕΣ", avgRevenue: 29393.89 },
  { code: "62.01", description: "ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ ΗΛΕΚΤΡΟΝΙΚΩΝ ΣΥΣΤΗΜΑΤΩΝ", avgRevenue: 26572.93 },
  { code: "62.02", description: "ΣΥΜΒΟΥΛΟΙ ΗΛΕΚΤΡΟΝΙΚΩΝ ΥΠΟΛΟΓΙΣΤΩΝ", avgRevenue: 27716.77 },
  { code: "62.03", description: "ΔΙΑΧΕΙΡΙΣΗ ΗΛΕΚΤΡΟΝΙΚΩΝ ΣΥΣΤΗΜΑΤΩΝ", avgRevenue: 25614.24 },
  { code: "62.09", description: "ΑΛΛΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΤΕΧΝΟΛΟΓΙΑΣ ΠΛΗΡΟΦΟΡΙΑΣ", avgRevenue: 21794.35 },
  { code: "63.11", description: "ΕΠΕΞΕΡΓΑΣΙΑ ΔΕΔΟΜΕΝΩΝ", avgRevenue: 23013.42 },
  { code: "63.12", description: "ΔΙΚΤΥΑΚΕΣ ΠΥΛΕΣ (WEB PORTALS)", avgRevenue: 21264.88 },
  { code: "63.91", description: "ΠΡΑΚΤΟΡΕΙΑ ΕΙΔΗΣΕΩΝ", avgRevenue: 23732.29 },
  { code: "63.99", description: "ΑΛΛΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΥΠΗΡΕΣΙΩΝ ΠΛΗΡΟΦΟΡΙΑΣ", avgRevenue: 18258.49 },
  { code: "64.19", description: "ΑΛΛΟΙ ΟΡΓΑΝΙΣΜΟΙ ΧΡΗΜΑΤΙΚΗΣ ΔΙΑΜΕΣΟΛΑΒΗΣΗΣ", avgRevenue: 7700.02 },
  { code: "64.92", description: "ΑΛΛΕΣ ΠΙΣΤΩΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 23793.12 },
  { code: "65.11", description: "ΑΣΦΑΛΕΙΕΣ ΖΩΗΣ", avgRevenue: 20667.37 },
  { code: "65.12", description: "ΑΣΦΑΛΕΙΕΣ ΕΚΤΟΣ ΑΠΟ ΖΩΗΣ", avgRevenue: 17007.98 },
  { code: "66.12", description: "ΣΥΝΑΛΛΑΓΕΣ ΣΥΜΒΑΣΕΩΝ ΧΡΕΟΓΡΑΦΩΝ", avgRevenue: 39851.01 },
  { code: "66.19", description: "ΑΛΛΕΣ ΧΡΗΜΑΤΟΠΙΣΤΩΤΙΚΕΣ ΥΠΗΡΕΣΙΕΣ", avgRevenue: 24251.15 },
  { code: "66.22", description: "ΑΣΦΑΛΙΣΤΙΚΟΙ ΠΡΑΚΤΟΡΕΣ & ΜΕΣΙΤΕΣ", avgRevenue: 25279.36 },
  { code: "66.29", description: "ΑΛΛΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΑΣΦΑΛΙΣΕΩΝ", avgRevenue: 27174.11 },
  { code: "68.10", description: "ΑΓΟΡΑΠΩΛΗΣΙΑ ΑΚΙΝΗΤΩΝ", avgRevenue: 163667.85 },
  { code: "68.20", description: "ΕΚΜΙΣΘΩΣΗ & ΔΙΑΧΕΙΡΙΣΗ ΑΚΙΝΗΤΩΝ", avgRevenue: 28794.06 },
  { code: "68.31", description: "ΜΕΣΙΤΙΚΑ ΓΡΑΦΕΙΑ ΑΚΙΝΗΤΩΝ", avgRevenue: 15123.41 },
  { code: "68.32", description: "ΔΙΑΧΕΙΡΙΣΗ ΑΚΙΝΗΤΗΣ ΠΕΡΙΟΥΣΙΑΣ", avgRevenue: 27132.86 },
  { code: "69.10", description: "ΝΟΜΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 23720.85 },
  { code: "69.20", description: "ΛΟΓΙΣΤΙΚΕΣ & ΦΟΡΟΛΟΓΙΚΕΣ ΥΠΗΡΕΣΙΕΣ", avgRevenue: 26964.05 },
  { code: "70.21", description: "ΔΗΜΟΣΙΕΣ ΣΧΕΣΕΙΣ & ΕΠΙΚΟΙΝΩΝΙΑ", avgRevenue: 23612.07 },
  { code: "70.22", description: "ΕΠΙΧΕΙΡΗΜΑΤΙΚΕΣ ΣΥΜΒΟΥΛΕΣ", avgRevenue: 28719.31 },
  { code: "71.11", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΑΡΧΙΤΕΚΤΟΝΩΝ", avgRevenue: 20552.66 },
  { code: "71.12", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΜΗΧΑΝΙΚΩΝ", avgRevenue: 29877.15 },
  { code: "71.20", description: "ΤΕΧΝΙΚΕΣ ΔΟΚΙΜΕΣ & ΑΝΑΛΥΣΕΙΣ", avgRevenue: 30970.18 },
  { code: "72.11", description: "ΕΡΕΥΝΑ ΒΙΟΤΕΧΝΟΛΟΓΙΑΣ", avgRevenue: 15368.31 },
  { code: "72.19", description: "ΕΡΕΥΝΑ ΦΥΣΙΚΩΝ ΕΠΙΣΤΗΜΩΝ", avgRevenue: 16979.80 },
  { code: "72.20", description: "ΕΡΕΥΝΑ ΚΟΙΝΩΝΙΚΩΝ ΕΠΙΣΤΗΜΩΝ", avgRevenue: 18332.00 },
  { code: "73.11", description: "ΔΙΑΦΗΜΙΣΤΙΚΑ ΓΡΑΦΕΙΑ", avgRevenue: 24212.88 },
  { code: "73.12", description: "ΠΑΡΟΥΣΙΑΣΗ ΣΤΑ ΜΕΣΑ ΕΝΗΜΕΡΩΣΗΣ", avgRevenue: 16924.35 },
  { code: "73.20", description: "ΕΡΕΥΝΑ ΑΓΟΡΑΣ & ΔΗΜΟΣΚΟΠΗΣΕΙΣ", avgRevenue: 11356.89 },
  { code: "74.10", description: "ΕΙΔΙΚΕΥΜΕΝΟ ΣΧΕΔΙΟ", avgRevenue: 18716.33 },
  { code: "74.20", description: "ΦΩΤΟΓΡΑΦΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 13979.65 },
  { code: "74.30", description: "ΜΕΤΑΦΡΑΣΗ & ΔΙΕΡΜΗΝΕΙΑ", avgRevenue: 13997.21 },
  { code: "74.90", description: "ΑΛΛΕΣ ΕΠΑΓΓΕΛΜΑΤΙΚΕΣ & ΤΕΧΝΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 20676.87 },
  { code: "75.00", description: "ΚΤΗΝΙΑΤΡΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 27025.03 },
  { code: "77.11", description: "ΕΝΟΙΚΙΑΣΗ ΑΥΤΟΚΙΝΗΤΩΝ", avgRevenue: 44990.48 },
  { code: "77.12", description: "ΕΝΟΙΚΙΑΣΗ ΦΟΡΤΗΓΩΝ", avgRevenue: 36322.88 },
  { code: "77.21", description: "ΕΝΟΙΚΙΑΣΗ ΑΘΛΗΤΙΚΩΝ ΕΙΔΩΝ", avgRevenue: 24200.54 },
  { code: "77.22", description: "ΕΝΟΙΚΙΑΣΗ ΒΙΝΤΕΟΚΑΣΕΤΩΝ", avgRevenue: 5984.70 },
  { code: "77.29", description: "ΕΝΟΙΚΙΑΣΗ ΑΛΛΩΝ ΕΙΔΩΝ ΟΙΚΙΑΚΗΣ ΧΡΗΣΗΣ", avgRevenue: 24715.19 },
  { code: "77.31", description: "ΕΝΟΙΚΙΑΣΗ ΓΕΩΡΓΙΚΩΝ ΜΗΧΑΝΗΜΑΤΩΝ", avgRevenue: 12934.29 },
  { code: "77.32", description: "ΕΝΟΙΚΙΑΣΗ ΜΗΧΑΝΗΜΑΤΩΝ ΚΑΤΑΣΚΕΥΩΝ", avgRevenue: 52143.89 },
  { code: "77.33", description: "ΕΝΟΙΚΙΑΣΗ ΜΗΧΑΝΗΜΑΤΩΝ ΓΡΑΦΕΙΟΥ", avgRevenue: 30038.28 },
  { code: "77.34", description: "ΕΝΟΙΚΙΑΣΗ ΕΞΟΠΛΙΣΜΟΥ ΠΛΩΤΩΝ ΜΕΤΑΦΟΡΩΝ", avgRevenue: 38125.84 },
  { code: "77.39", description: "ΕΝΟΙΚΙΑΣΗ ΑΛΛΩΝ ΜΗΧΑΝΗΜΑΤΩΝ", avgRevenue: 33783.08 },
  { code: "78.10", description: "ΓΡΑΦΕΙΑ ΕΥΡΕΣΗΣ ΕΡΓΑΣΙΑΣ", avgRevenue: 32302.99 },
  { code: "78.30", description: "ΥΠΗΡΕΣΙΕΣ ΔΙΑΘΕΣΗΣ ΑΝΘΡΩΠΙΝΟΥ ΔΥΝΑΜΙΚΟΥ", avgRevenue: 80220.96 },
  { code: "79.11", description: "ΤΑΞΙΔΙΩΤΙΚΑ ΠΡΑΚΤΟΡΕΙΑ", avgRevenue: 135293.92 },
  { code: "79.12", description: "ΓΡΑΦΕΙΑ ΟΡΓΑΝΩΜΕΝΩΝ ΤΑΞΙΔΙΩΝ", avgRevenue: 145915.54 },
  { code: "79.90", description: "ΑΛΛΕΣ ΥΠΗΡΕΣΙΕΣ ΚΡΑΤΗΣΕΩΝ", avgRevenue: 25783.14 },
  { code: "80.10", description: "ΙΔΙΩΤΙΚΗ ΠΡΟΣΤΑΣΙΑ", avgRevenue: 58711.30 },
  { code: "80.20", description: "ΣΥΣΤΗΜΑΤΑ ΠΡΟΣΤΑΣΙΑΣ", avgRevenue: 24090.93 },
  { code: "80.30", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΕΡΕΥΝΑΣ", avgRevenue: 14088.63 },
  { code: "81.10", description: "ΒΟΗΘΗΤΙΚΕΣ ΥΠΗΡΕΣΙΕΣ", avgRevenue: 13448.78 },
  { code: "81.21", description: "ΓΕΝΙΚΟΣ ΚΑΘΑΡΙΣΜΟΣ ΚΤΙΡΙΩΝ", avgRevenue: 35439.85 },
  { code: "81.22", description: "ΑΛΛΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΚΑΘΑΡΙΣΜΟΥ", avgRevenue: 22934.05 },
  { code: "81.29", description: "ΑΛΛΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΚΑΘΑΡΙΣΜΟΥ", avgRevenue: 22980.18 },
  { code: "81.30", description: "ΥΠΗΡΕΣΙΕΣ ΤΟΠΙΟΥ", avgRevenue: 28161.44 },
  { code: "82.11", description: "ΔΙΟΙΚΗΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΓΡΑΦΕΙΟΥ", avgRevenue: 12779.20 },
  { code: "82.19", description: "ΦΩΤΟΤΥΠΙΕΣ & ΓΡΑΜΜΑΤΕΙΑΚΗ ΥΠΟΣΤΗΡΙΞΗ", avgRevenue: 13918.25 },
  { code: "82.30", description: "ΟΡΓΑΝΩΣΗ ΣΥΝΕΔΡΙΩΝ & ΕΚΘΕΣΕΩΝ", avgRevenue: 44223.25 },
  { code: "82.91", description: "ΓΡΑΦΕΙΑ ΕΙΣΠΡΑΞΗΣ & ΟΙΚΟΝΟΜΙΚΩΝ ΠΛΗΡΟΦΟΡΙΩΝ", avgRevenue: 8620.43 },
  { code: "82.92", description: "ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΣΥΣΚΕΥΑΣΙΑΣ", avgRevenue: 70260.90 },
  { code: "82.99", description: "ΑΛΛΕΣ ΥΠΗΡΕΣΙΕΣ ΠΡΟΣ ΕΠΙΧΕΙΡΗΣΕΙΣ", avgRevenue: 40727.61 },
  { code: "84.11", description: "ΓΕΝΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΔΗΜΟΣΙΑΣ ΔΙΟΙΚΗΣΗΣ", avgRevenue: 20340.74 },
  { code: "84.12", description: "ΡΥΘΜΙΣΗ ΥΓΕΙΑΣ & ΕΚΠΑΙΔΕΥΣΗΣ", avgRevenue: 10218.07 },
  { code: "84.13", description: "ΡΥΘΜΙΣΗ ΕΠΙΧΕΙΡΗΜΑΤΙΚΩΝ ΔΡΑΣΤΗΡΙΟΤΗΤΩΝ", avgRevenue: 61554.15 },
  { code: "84.25", description: "ΠΥΡΟΣΒΕΣΤΙΚΗ", avgRevenue: 138636.14 },
  { code: "85.10", description: "ΠΡΟΣΧΟΛΙΚΗ ΕΚΠΑΙΔΕΥΣΗ", avgRevenue: 68772.84 },
  { code: "85.20", description: "ΠΡΩΤΟΒΑΘΜΙΑ ΕΚΠΑΙΔΕΥΣΗ", avgRevenue: 93924.02 },
  { code: "85.31", description: "ΓΕΝΙΚΗ ΔΕΥΤΕΡΟΒΑΘΜΙΑ ΕΚΠΑΙΔΕΥΣΗ", avgRevenue: 23143.18 },
  { code: "85.41", description: "ΜΕΤΑΔΕΥΤΕΡΟΒΑΘΜΙΑ ΜΗ ΤΡΙΤΟΒΑΘΜΙΑ ΕΚΠΑΙΔΕΥΣΗ", avgRevenue: 7346.78 },
  { code: "85.42", description: "ΤΡΙΤΟΒΑΘΜΙΑ ΕΚΠΑΙΔΕΥΣΗ", avgRevenue: 11899.33 },
  { code: "85.51", description: "ΑΘΛΗΤΙΚΗ & ΨΥΧΑΓΩΓΙΚΗ ΕΚΠΑΙΔΕΥΣΗ", avgRevenue: 15888.12 },
  { code: "85.52", description: "ΠΟΛΙΤΙΣΤΙΚΗ ΕΚΠΑΙΔΕΥΣΗ", avgRevenue: 17975.65 },
  { code: "85.53", description: "ΣΧΟΛΕΣ ΟΔΗΓΩΝ", avgRevenue: 14748.15 },
  { code: "85.59", description: "ΑΛΛΗ ΕΚΠΑΙΔΕΥΣΗ", avgRevenue: 19164.38 },
  { code: "85.60", description: "ΕΚΠΑΙΔΕΥΤΙΚΕΣ ΥΠΟΣΤΗΡΙΚΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 15104.13 },
  { code: "86.10", description: "ΝΟΣΟΚΟΜΕΙΑΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 29369.14 },
  { code: "86.21", description: "ΓΕΝΙΚΑ ΙΑΤΡΙΚΑ ΕΠΑΓΓΕΛΜΑΤΑ", avgRevenue: 36149.42 },
  { code: "86.22", description: "ΕΙΔΙΚΑ ΙΑΤΡΙΚΑ ΕΠΑΓΓΕΛΜΑΤΑ", avgRevenue: 44337.40 },
  { code: "86.23", description: "ΟΔΟΝΤΙΑΤΡΙΚΑ ΕΠΑΓΓΕΛΜΑΤΑ", avgRevenue: 32477.04 },
  { code: "86.90", description: "ΑΛΛΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΑΝΘΡΩΠΙΝΗΣ ΥΓΕΙΑΣ", avgRevenue: 20573.96 },
  { code: "88.10", description: "ΚΟΙΝΩΝΙΚΗ ΜΕΡΙΜΝΑ ΓΙΑ ΗΛΙΚΙΩΜΕΝΟΥΣ", avgRevenue: 16551.01 },
  { code: "88.91", description: "ΒΡΕΦΟΝΗΠΙΑΚΟΙ & ΠΑΙΔΙΚΟΙ ΣΤΑΘΜΟΙ", avgRevenue: 98638.93 },
  { code: "88.99", description: "ΑΛΛΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΚΟΙΝΩΝΙΚΗΣ ΜΕΡΙΜΝΑΣ", avgRevenue: 12460.89 },
  { code: "90.01", description: "ΤΕΧΝΕΣ ΤΟΥ ΘΕΑΜΑΤΟΣ", avgRevenue: 12490.28 },
  { code: "90.02", description: "ΥΠΟΣΤΗΡΙΚΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΘΕΑΜΑΤΟΣ", avgRevenue: 26839.80 },
  { code: "90.03", description: "ΚΑΛΛΙΤΕΧΝΙΚΗ ΔΗΜΙΟΥΡΓΙΑ", avgRevenue: 13079.76 },
  { code: "90.04", description: "ΕΚΜΕΤΑΛΛΕΥΣΗ ΑΙΘΟΥΣΩΝ ΘΕΑΜΑΤΩΝ", avgRevenue: 24493.73 },
  { code: "91.01", description: "ΒΙΒΛΙΟΘΗΚΕΣ & ΑΡΧΕΙΟΦΥΛΑΚΕΙΑ", avgRevenue: 50518.10 },
  { code: "91.02", description: "ΜΟΥΣΕΙΑ", avgRevenue: 16423.18 },
  { code: "91.03", description: "ΙΣΤΟΡΙΚΟΙ ΧΩΡΟΙ & ΚΤΙΡΙΑ", avgRevenue: 21160.89 },
  { code: "92.00", description: "ΤΥΧΕΡΑ ΠΑΙΧΝΙΔΙΑ & ΣΤΟΙΧΗΜΑΤΑ", avgRevenue: 78570.45 },
  { code: "93.11", description: "ΑΘΛΗΤΙΚΕΣ ΕΓΚΑΤΑΣΤΑΣΕΙΣ", avgRevenue: 22082.77 },
  { code: "93.13", description: "ΕΓΚΑΤΑΣΤΑΣΕΙΣ ΓΥΜΝΑΣΤΙΚΗΣ", avgRevenue: 20069.95 },
  { code: "93.19", description: "ΑΛΛΕΣ ΑΘΛΗΤΙΚΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ", avgRevenue: 15242.30 },
  { code: "93.21", description: "ΠΑΡΚΑ ΑΝΑΨΥΧΗΣ", avgRevenue: 48871.66 },
  { code: "93.29", description: "ΑΛΛΕΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ ΔΙΑΣΚΕΔΑΣΗΣ", avgRevenue: 22252.14 },
  { code: "95.11", description: "ΕΠΙΣΚΕΥΗ ΗΛΕΚΤΡΟΝΙΚΩΝ ΥΠΟΛΟΓΙΣΤΩΝ", avgRevenue: 16035.65 },
  { code: "95.12", description: "ΕΠΙΣΚΕΥΗ ΕΞΟΠΛΙΣΜΟΥ ΕΠΙΚΟΙΝΩΝΙΑΣ", avgRevenue: 14548.55 },
  { code: "95.21", description: "ΕΠΙΣΚΕΥΗ ΗΛΕΚΤΡΟΝΙΚΩΝ ΕΙΔΩΝ", avgRevenue: 13271.56 },
  { code: "95.22", description: "ΕΠΙΣΚΕΥΗ ΟΙΚΙΑΚΩΝ ΣΥΣΚΕΥΩΝ", avgRevenue: 25043.96 },
  { code: "95.23", description: "ΕΠΙΔΙΟΡΘΩΣΗ ΥΠΟΔΗΜΑΤΩΝ", avgRevenue: 8354.34 },
  { code: "95.24", description: "ΕΠΙΣΚΕΥΗ ΕΠΙΠΛΩΝ", avgRevenue: 11115.55 },
  { code: "95.25", description: "ΕΠΙΣΚΕΥΗ ΡΟΛΟΓΙΩΝ & ΚΟΣΜΗΜΑΤΩΝ", avgRevenue: 5050.80 },
  { code: "95.29", description: "ΕΠΙΣΚΕΥΗ ΑΛΛΩΝ ΕΙΔΩΝ", avgRevenue: 8083.14 },
  { code: "96.01", description: "ΠΛΥΣΙΜΟ & ΚΑΘΑΡΙΣΜΑ ΡΟΥΧΩΝ", avgRevenue: 32578.97 },
  { code: "96.02", description: "ΚΟΜΜΩΤΗΡΙΑ & ΚΕΝΤΡΑ ΑΙΣΘΗΤΙΚΗΣ", avgRevenue: 17045.23 },
  { code: "96.03", description: "ΓΡΑΦΕΙΑ ΚΗΔΕΙΩΝ", avgRevenue: 44471.87 },
  { code: "96.04", description: "ΦΥΣΙΚΗ ΕΥΕΞΙΑ", avgRevenue: 12052.28 },
  { code: "96.09", description: "ΑΛΛΕΣ ΠΡΟΣΩΠΙΚΕΣ ΥΠΗΡΕΣΙΕΣ", avgRevenue: 10228.34 }
];

function clampMoney(n) {
  if (!isFinite(n)) return 0;
  return Math.max(0, Math.round((n + Number.EPSILON) * 100) / 100);
}

function parseNumber(v) {
  if (v === "" || v === null || v === undefined) return 0;
  const n = typeof v === "number" ? v : parseFloat(String(v).replace(/\./g, '').replace(",", "."));
  return isNaN(n) ? 0 : n;
}

function formatNumber(v) {
  if (!v || v === 0) return '';
  return NUMBER_FORMAT.format(v);
}

function getInputValue(value, isFocused) {
  if (isFocused) {
    return value || '';
  }
  return formatNumber(value);
}

function daysInYear(year) {
  const start = new Date(year, 0, 1);
  const end = new Date(year + 1, 0, 1);
  return Math.round((end - start) / (1000 * 60 * 60 * 24));
}

const REDUCTION_OPTIONS = [
  { value: "largeFamily", label: "Πολύτεκνος/Ορφανό" },
  { value: "disability67", label: "Αναπηρία ≥67%" },
  { value: "singleParentMinor", label: "Μονογονεϊκή" },
  { value: "parentChildDisability67", label: "Τέκνο ≥67%" },
  { value: "taxiOwnerUnder25", label: "ΤΑΞΙ <25%" },
  { value: "villageUnder500", label: "Οικισμός <500" },
  { value: "communityUnder1500", label: "Κοινότητα <1.500" },
  { value: "islandUnder3100", label: "Νησί <3.100" },
];

function App() {
  const [state, setState] = useState({
    yearsInOperationGroup: "1-3",
    hasStaff: false,
    payrollTotal: 0,
    highestGrossSalary: 0,
    turnover: 0,
    selectedKAD: "",
    newProYear: "none",
    specialReductions: [],
    otherIncome: {
      employment: 0,
      pension: 0,
      agricultural: 0,
    },
    exceptions: {
      agriculturalBusiness: false,
      freelancingUpTo2Contracts: false,
      insuranceBrokerUpTo2: false,
      disability80: false,
      cafeUnder500: false,
    },
    hasPartialYear: false,
    startDate: "",
    endDate: "",
  });

  const [focusedInput, setFocusedInput] = useState(null);

  const set = (k, v) => setState((s) => ({ ...s, [k]: v }));
  const setDeep = (group, k, v) => setState((s) => ({ ...s, [group]: { ...s[group], [k]: v } }));

  // Get average revenue for selected KAD
  const selectedKADData = KAD_DATA.find(kad => kad.code === state.selectedKAD);
  const avgKAD = selectedKADData ? selectedKADData.avgRevenue : 0;

  const result = useMemo(() => {
    const ex = state.exceptions;
    const isExempt =
      ex.agriculturalBusiness ||
      ex.freelancingUpTo2Contracts ||
      ex.insuranceBrokerUpTo2 ||
      ex.disability80 ||
      ex.cafeUnder500;

    const breakdown = [];

    if (isExempt) {
      return {
        exempt: true,
        breakdown: [
          "Εξαίρεση από τον προσδιορισμό τεκμαρτού εισοδήματος βάσει επιλεγμένης κατηγορίας.",
        ],
      };
    }

    const baseAnnual = 14 * 830;
    let base = baseAnnual;

    const yearsGroup = state.yearsInOperationGroup;
    let yearsAdd = 0;
    if (yearsGroup === "7-9") yearsAdd = 1162;
    else if (yearsGroup === "10-12") yearsAdd = 1278.2;
    else if (yearsGroup === ">13") yearsAdd = 1406.02;

    base += yearsAdd;

    if (state.hasPartialYear && state.startDate) {
      const year = 2025;
      const totalDays = daysInYear(year);
      const start = new Date(state.startDate);
      const end = state.endDate ? new Date(state.endDate) : new Date(year, 11, 31);
      const millis = Math.max(0, Math.min(end.getTime(), new Date(year, 11, 31).getTime()) - Math.max(start.getTime(), new Date(year, 0, 1).getTime()));
      const days = Math.ceil(millis / (1000 * 60 * 60 * 24)) + 1;
      const ratio = Math.min(1, Math.max(0, days / totalDays));
      base = base * ratio;
      breakdown.push(`Αναλογία έτους: ${Math.round(ratio * 100)}%`);
    }

    breakdown.push(`Βάση: ${CURRENCY.format(clampMoney(baseAnnual))}`);
    if (yearsAdd > 0) breakdown.push(`Προσαύξηση ετών (${yearsGroup}): ${CURRENCY.format(clampMoney(yearsAdd))}`);

    let staffIncrease = 0;
    if (state.hasStaff) {
      const payroll = parseNumber(state.payrollTotal);
      staffIncrease = Math.min(payroll * 0.10, 15000);
      base += staffIncrease;
      breakdown.push(`Προσαύξηση προσωπικού: ${CURRENCY.format(clampMoney(staffIncrease))}`);
    }

    const turnover = parseNumber(state.turnover);
    let turnoverIncrease = 0;
    if (turnover > avgKAD && avgKAD > 0) {
      turnoverIncrease = (turnover - avgKAD) * 0.05;
      base += turnoverIncrease;
      breakdown.push(`Προσαύξηση τζίρου > Μ.Ο. ΚΑΔ: ${CURRENCY.format(clampMoney(turnoverIncrease))}`);
    }

    const highest = parseNumber(state.highestGrossSalary);
    if (state.hasStaff && highest > base) {
      const capped = Math.min(highest, 30000);
      breakdown.push(`Κανόνας αποδοχών υπαλλήλου: ${CURRENCY.format(clampMoney(capped))}`);
      base = capped;
    }

    if (base > 50000) {
      breakdown.push(`Ανώτατο όριο 50.000€ (global cap)`);
      base = 50000;
    }

    let afterNewPro = base;
    switch (state.newProYear) {
      case "1":
      case "2":
      case "3":
        breakdown.push("Νέος επαγγελματίας (1ο–3ο): -100%");
        afterNewPro = 0;
        break;
      case "4":
        breakdown.push("Νέος επαγγελματίας (4ο): -2/3");
        afterNewPro = base * (1 / 3);
        break;
      case "5":
        breakdown.push("Νέος επαγγελματίας (5ο): -1/3");
        afterNewPro = base * (2 / 3);
        break;
      default:
        break;
    }

    const hasAny50 = state.specialReductions.length > 0;
    let afterSpecial = afterNewPro;
    if (hasAny50) {
      afterSpecial = afterNewPro * 0.5;
      breakdown.push("Λοιπές μειώσεις: -50%");
    }

    const other = state.otherIncome;
    const cover = parseNumber(other.employment) + parseNumber(other.pension) + parseNumber(other.agricultural);
    let finalImputed = Math.max(0, afterSpecial - cover);
    if (cover > 0) breakdown.push(`Κάλυψη από άλλα εισοδήματα: -${CURRENCY.format(clampMoney(cover))}`);

    finalImputed = Math.min(50000, clampMoney(finalImputed));

    return {
      exempt: false,
      breakdown,
      base: clampMoney(base),
      afterNewPro: clampMoney(afterNewPro),
      afterSpecial: clampMoney(afterSpecial),
      cover: clampMoney(cover),
      finalImputed,
    };
  }, [state]);

  return (
    <>
      <div className="card">
        <h2>Βασικά Στοιχεία</h2>
        <div className="input-group">
          <label>Έτη λειτουργίας</label>
          <select value={state.yearsInOperationGroup} onChange={(e)=>set("yearsInOperationGroup", e.target.value)}>
            <option value="1-3">1–3</option>
            <option value="4-6">4–6</option>
            <option value="7-9">7–9</option>
            <option value="10-12">10–12</option>
            <option value=">13">&gt;13</option>
          </select>
        </div>

        <div className="toggle">
          <div className={`toggle-btn ${state.hasPartialYear ? 'active' : 'inactive'}`} onClick={()=>set("hasPartialYear", !state.hasPartialYear)}>
            <span></span>
          </div>
          <label>Μερικό έτος λειτουργίας;</label>
        </div>

        {state.hasPartialYear && (
          <div className="grid-2">
            <div className="input-group">
              <label>Ημερομηνία έναρξης</label>
              <input type="date" value={state.startDate} onChange={(e)=>set("startDate", e.target.value)} />
            </div>
            <div className="input-group">
              <label>Ημερομηνία διακοπής</label>
              <input type="date" value={state.endDate} onChange={(e)=>set("endDate", e.target.value)} />
            </div>
          </div>
        )}
      </div>

      <div className="card">
        <h2>Προσωπικό</h2>
        <div className="toggle">
          <div className={`toggle-btn ${state.hasStaff ? 'active' : 'inactive'}`} onClick={()=>set("hasStaff", !state.hasStaff)}>
            <span></span>
          </div>
          <label>Απασχολεί προσωπικό;</label>
        </div>

        {state.hasStaff && (
          <div className="grid-2">
            <div className="input-group">
              <label>Ετήσια μισθοδοσία (€)</label>
              <input 
                type="text" 
                value={getInputValue(state.payrollTotal, focusedInput === 'payrollTotal')} 
                onChange={(e)=>set("payrollTotal", parseNumber(e.target.value))} 
                onFocus={()=>setFocusedInput('payrollTotal')}
                onBlur={()=>setFocusedInput(null)}
                placeholder="0,00"
              />
            </div>
            <div className="input-group">
              <label>Υψηλότερες μικτές αποδοχές (€)</label>
              <input 
                type="text" 
                value={getInputValue(state.highestGrossSalary, focusedInput === 'highestGrossSalary')} 
                onChange={(e)=>set("highestGrossSalary", parseNumber(e.target.value))} 
                onFocus={()=>setFocusedInput('highestGrossSalary')}
                onBlur={()=>setFocusedInput(null)}
                placeholder="0,00"
              />
            </div>
          </div>
        )}
      </div>

      <div className="card">
        <h2>Τζίρος & Μ.Ο. ΚΑΔ</h2>
        <div className="input-group">
          <label>Επιλέξτε τον ΚΑΔ σας</label>
          <input 
            list="kad-list" 
            value={selectedKADData ? `${selectedKADData.code} - ${selectedKADData.description}` : state.selectedKAD} 
            onChange={(e)=>{
              const inputValue = e.target.value;
              // Αν ο χρήστης επιλέγει από τη λίστα, πάρε μόνο τον κωδικό
              const selectedOption = KAD_DATA.find(kad => 
                `${kad.code} - ${kad.description}` === inputValue || kad.code === inputValue
              );
              set("selectedKAD", selectedOption ? selectedOption.code : inputValue);
            }}
            onBlur={(e)=>{
              // Όταν κάνει blur, αν έχει γράψει μόνο τον κωδικό, βρες τον ΚΑΔ
              const kod = e.target.value.split(' - ')[0].trim();
              const found = KAD_DATA.find(kad => kad.code === kod);
              if (found) {
                set("selectedKAD", found.code);
              }
            }}
            placeholder="Πληκτρολογήστε ή επιλέξτε ΚΑΔ..."
            style={{width: '100%'}}
          />
          <datalist id="kad-list">
            {KAD_DATA.map(kad => (
              <option key={kad.code} value={`${kad.code} - ${kad.description}`} />
            ))}
          </datalist>
          {avgKAD > 0 && (
            <small style={{marginTop: '4px', color: '#666', display: 'block'}}>
              Μ.Ο. τζίρου: {CURRENCY.format(avgKAD)}
            </small>
          )}
        </div>
        <div className="input-group">
          <label>Ετήσιος τζίρος (€)</label>
          <input 
            type="text" 
            value={getInputValue(state.turnover, focusedInput === 'turnover')} 
            onChange={(e)=>set("turnover", parseNumber(e.target.value))} 
            onFocus={()=>setFocusedInput('turnover')}
            onBlur={()=>setFocusedInput(null)} 
            placeholder="0,00"
          />
        </div>
      </div>

      <div className="card">
        <h2>Μειώσεις</h2>
        <div className="grid-3">
          <div className="input-group">
            <label>Νέος επαγγελματίας</label>
            <select value={state.newProYear} onChange={(e)=>set("newProYear", e.target.value)}>
              <option value="none">Όχι</option>
              <option value="1">1ο έτος</option>
              <option value="2">2ο έτος</option>
              <option value="3">3ο έτος</option>
              <option value="4">4ο έτος</option>
              <option value="5">5ο έτος</option>
            </select>
          </div>

          <MultiSelectDropdown
            label="Λοιπές μειώσεις (-50%)"
            options={REDUCTION_OPTIONS}
            values={state.specialReductions}
            onChange={(vals)=>set("specialReductions", vals)}
          />
        </div>

        <h2 style={{marginTop: '20px'}}>Άλλα Εισοδήματα</h2>
        <div className="grid-3">
          <div className="input-group">
            <label>Μισθωτή εργασία (€)</label>
            <input 
              type="text" 
              value={getInputValue(state.otherIncome.employment, focusedInput === 'employment')} 
              onChange={(e)=>setDeep("otherIncome","employment", parseNumber(e.target.value))} 
              onFocus={()=>setFocusedInput('employment')}
              onBlur={()=>setFocusedInput(null)}
              placeholder="0,00"
            />
          </div>
          <div className="input-group">
            <label>Συντάξεις (€)</label>
            <input 
              type="text" 
              value={getInputValue(state.otherIncome.pension, focusedInput === 'pension')} 
              onChange={(e)=>setDeep("otherIncome","pension", parseNumber(e.target.value))} 
              onFocus={()=>setFocusedInput('pension')}
              onBlur={()=>setFocusedInput(null)}
              placeholder="0,00"
            />
          </div>
          <div className="input-group">
            <label>Αγροτικό (€)</label>
            <input 
              type="text" 
              value={getInputValue(state.otherIncome.agricultural, focusedInput === 'agricultural')} 
              onChange={(e)=>setDeep("otherIncome","agricultural", parseNumber(e.target.value))} 
              onFocus={()=>setFocusedInput('agricultural')}
              onBlur={()=>setFocusedInput(null)}
              placeholder="0,00"
            />
          </div>
        </div>
      </div>

      <div className="card">
        <h2>Εξαιρέσεις</h2>
        <div className="checkbox">
          <input type="checkbox" checked={state.exceptions.agriculturalBusiness} onChange={(e)=>setDeep("exceptions","agriculturalBusiness", e.target.checked)} />
          <label>Αγροτική επιχειρηματική δραστηριότητα</label>
        </div>
        <div className="checkbox">
          <input type="checkbox" checked={state.exceptions.freelancingUpTo2Contracts} onChange={(e)=>setDeep("exceptions","freelancingUpTo2Contracts", e.target.checked)} />
          <label>Μπλοκάκι έως 2 συμβάσεις</label>
        </div>
        <div className="checkbox">
          <input type="checkbox" checked={state.exceptions.insuranceBrokerUpTo2} onChange={(e)=>setDeep("exceptions","insuranceBrokerUpTo2", e.target.checked)} />
          <label>Ασφαλιστικός διαμεσολαβητής (έως 2)</label>
        </div>
        <div className="checkbox">
          <input type="checkbox" checked={state.exceptions.disability80} onChange={(e)=>setDeep("exceptions","disability80", e.target.checked)} />
          <label>Αναπηρία ≥ 80%</label>
        </div>
        <div className="checkbox">
          <input type="checkbox" checked={state.exceptions.cafeUnder500} onChange={(e)=>setDeep("exceptions","cafeUnder500", e.target.checked)} />
          <label>Καφενείο σε οικισμό &lt;500</label>
        </div>
      </div>

      <div className="result-card">
        <h2>Αποτέλεσμα</h2>
        {result.exempt ? (
          <div>
            <p style={{fontSize: '16px', marginBottom: '12px'}}>Εξαιρείται από τον προσδιορισμό τεκμαρτού εισοδήματος.</p>
          </div>
        ) : (
          <div>
            <div className="stat highlight">
              <span className="stat-label">Τελικό Τεκμαρτό Εισόδημα</span>
              <span className="stat-value">{CURRENCY.format(result.finalImputed)}</span>
            </div>
            <div className="stat normal">
              <span className="stat-label">Βάση (μετά cap 50.000€)</span>
              <span className="stat-value">{CURRENCY.format(result.base)}</span>
            </div>
            <div className="stat normal">
              <span className="stat-label">Μετά νέο επαγγελματία</span>
              <span className="stat-value">{CURRENCY.format(result.afterNewPro)}</span>
            </div>
            {state.specialReductions.length > 0 && (
              <div className="stat normal">
                <span className="stat-label">Μετά λοιπές μειώσεις -50%</span>
                <span className="stat-value">{CURRENCY.format(result.afterSpecial)}</span>
              </div>
            )}
            <div className="stat normal">
              <span className="stat-label">Κάλυψη από άλλα</span>
              <span className="stat-value">-{CURRENCY.format(result.cover)}</span>
            </div>

            <div className="breakdown">
              <p><strong>Ανάλυση Βημάτων:</strong></p>
              <ul>
                {result.breakdown.map((b,i)=> (<li key={i}>{b}</li>))}
              </ul>
            </div>
          </div>
        )}
      </div>
    </>
  );
}

function MultiSelectDropdown({ label, options, values, onChange }) {
  const [open, setOpen] = useState(false);

  const toggleValue = (val) => {
    if (values.includes(val)) onChange(values.filter((v) => v !== val));
    else onChange([...values, val]);
  };

  const summary = values.length === 0
    ? "Καμία"
    : values.length <= 2
      ? values.map(v => options.find(o=>o.value===v)?.label).join(", ")
      : `${values.length} επιλεγμένες`;

  return (
    <div className="multi-select">
      <div className="input-group">
        <label>{label}</label>
        <button type="button" className="multi-select-btn" onClick={()=>setOpen(!open)}>
          {summary}
        </button>
      </div>

      {open && (
        <div className="multi-select-dropdown">
          {options.map((opt) => (
            <div
              key={opt.value}
              className={`multi-select-item ${values.includes(opt.value) ? 'selected' : ''}`}
              onClick={()=>toggleValue(opt.value)}
            >
              <span>{opt.label}</span>
              <input type="checkbox" readOnly checked={values.includes(opt.value)} />
            </div>
          ))}
        </div>
      )}
    </div>
  );
}

const root = ReactDOM.createRoot(document.getElementById('tekmartoCalculator'));
root.render(<App />);
</script>

<script<?php echo isset($nonce_attr) ? $nonce_attr : ''; ?> src="/js/cookie-consent.js"></script>
<script<?php echo isset($nonce_attr) ? $nonce_attr : ''; ?> src="/js/chat-widget.js"></script>
</body>
</html>
