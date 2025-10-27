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
<?php require_once __DIR__ . '/../partials/chat.html'; ?>

<script nonce="<?php echo $csp_nonce; ?>" type="text/babel">
const { useMemo, useState } = React;

const CURRENCY = new Intl.NumberFormat("el-GR", { style: "currency", currency: "EUR" });

function clampMoney(n) {
  if (!isFinite(n)) return 0;
  return Math.max(0, Math.round((n + Number.EPSILON) * 100) / 100);
}

function parseNumber(v) {
  if (v === "" || v === null || v === undefined) return 0;
  const n = typeof v === "number" ? v : parseFloat(String(v).replace(",", "."));
  return isNaN(n) ? 0 : n;
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
    avgKAD: 0,
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

  const set = (k, v) => setState((s) => ({ ...s, [k]: v }));
  const setDeep = (group, k, v) => setState((s) => ({ ...s, [group]: { ...s[group], [k]: v } }));

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
    const avgKAD = parseNumber(state.avgKAD);
    let turnoverIncrease = 0;
    if (turnover > avgKAD) {
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
              <input type="number" value={state.payrollTotal} onChange={(e)=>set("payrollTotal", parseNumber(e.target.value))} />
            </div>
            <div className="input-group">
              <label>Υψηλότερες μικτές αποδοχές (€)</label>
              <input type="number" value={state.highestGrossSalary} onChange={(e)=>set("highestGrossSalary", parseNumber(e.target.value))} />
            </div>
          </div>
        )}
      </div>

      <div className="card">
        <h2>Τζίρος & Μ.Ο. ΚΑΔ</h2>
        <div className="grid-2">
          <div className="input-group">
            <label>Ετήσιος τζίρος (€)</label>
            <input type="number" value={state.turnover} onChange={(e)=>set("turnover", parseNumber(e.target.value))} />
          </div>
          <div className="input-group">
            <label>Μ.Ο. τζίρου ΚΑΔ (€)</label>
            <input type="number" value={state.avgKAD} onChange={(e)=>set("avgKAD", parseNumber(e.target.value))} />
          </div>
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
            <input type="number" value={state.otherIncome.employment} onChange={(e)=>setDeep("otherIncome","employment", parseNumber(e.target.value))} />
          </div>
          <div className="input-group">
            <label>Συντάξεις (€)</label>
            <input type="number" value={state.otherIncome.pension} onChange={(e)=>setDeep("otherIncome","pension", parseNumber(e.target.value))} />
          </div>
          <div className="input-group">
            <label>Αγροτικό (€)</label>
            <input type="number" value={state.otherIncome.agricultural} onChange={(e)=>setDeep("otherIncome","agricultural", parseNumber(e.target.value))} />
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
