// Logic and UI wiring for Income Tax Calculator, matching provided HTML logic
(function(){
  const taxFmt = new Intl.NumberFormat('el-GR', { style:'currency', currency:'EUR', minimumFractionDigits:0, maximumFractionDigits:0 });
  const pctFmt = v => (v*100).toFixed(0).replace('.',',')+'%';

  // Parse income like "14.944,40" or "14944.40" etc
  function parseIncome(raw){
    if(!raw) return 0;
    const cleaned = String(raw).replace(/€/g,'').replace(/\s+/g,'').replace(/\./g,'').replace(/,/g,'.');
    const n = Number(cleaned);
    return isNaN(n)?0:n;
  }

  const BRACKETS = [
    { upTo: 10000, rate: 0.09 },
    { upTo: 20000, rate: 0.22 },
    { upTo: 30000, rate: 0.28 },
    { upTo: 40000, rate: 0.36 },
    { upTo: Infinity, rate: 0.44 }
  ];

  // Credit by children (6+ => +220 per extra child)
  const CREDITS = { 0:777, 1:900, 2:1120, 3:1340, 4:1580, 5:1780, 6:2000, 7:2220, 8:2440 };

  function calcTax(income){
    let lastCap = 0, remaining = income, totalTax = 0;
    const rows = [];
    for(const {upTo, rate} of BRACKETS){
      if(remaining <= 0) break;
      const bandAmount = Math.max(0, Math.min(income, upTo) - lastCap);
      if(bandAmount > 0){
        const bandTax = bandAmount * rate;
        rows.push({
          range: `${lastCap.toLocaleString('el-GR')} – ${upTo===Infinity?'∞':upTo.toLocaleString('el-GR')}`,
          amount: bandAmount,
          rate,
          tax: bandTax
        });
        totalTax += bandTax;
      }
      remaining -= bandAmount;
      lastCap = upTo;
    }
    return { rows, totalTax };
  }

  function calcCredit(income, children){
    const kids = Math.max(0, Math.min(8, parseInt(children,10)||0));
    const maxCredit = CREDITS[kids] || 0;
    if(income <= 12000) return maxCredit;
    const reduction = ((income - 12000) * 20) / 1000;
    return Math.max(0, maxCredit - reduction);
  }

  // DOM wiring
  function $(id){ return document.getElementById(id); }
  const incomeEl = $('incomeInput');
  const childrenEl = $('childrenInput');
  const calcBtn = $('calcBtn');
  const resetBtn = $('resetBtn');

  const bracketBody = $('incomeBracketRows');
  const bracketFoot = $('incomeBracketFoot');
  const kpiTaxBefore = $('kpi-taxBefore');
  const kpiCredit = $('kpi-credit');
  const kpiFinalTax = $('kpi-finalTax');

  function render(){
    const income = parseIncome(incomeEl.value);
    const kids = Math.max(0, Math.min(8, parseInt(childrenEl.value,10)||0));
    const { rows, totalTax } = calcTax(income);

    if(rows.length === 0){
      bracketBody.innerHTML = '<tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>';
      bracketFoot.innerHTML = '';
    } else {
      bracketBody.innerHTML = rows.map(r => `
        <tr>
          <td>${r.range}</td>
          <td class="r">${taxFmt.format(r.amount)}</td>
          <td class="r">${pctFmt(r.rate)}</td>
          <td class="r">${taxFmt.format(r.tax)}</td>
        </tr>`).join('');
      bracketFoot.innerHTML = `
        <tr>
          <td colspan="3" class="r" style="text-align:right">Σύνολο</td>
          <td class="r">${taxFmt.format(totalTax)}</td>
        </tr>`;
    }

    kpiTaxBefore.textContent = taxFmt.format(totalTax);
    const credit = calcCredit(income, kids);
    kpiCredit.textContent = taxFmt.format(credit);
    kpiFinalTax.textContent = taxFmt.format(Math.max(0, totalTax - credit));
  }

  function reset(){
    incomeEl.value = '';
    childrenEl.value = '0';
    bracketBody.innerHTML = '<tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>';
    bracketFoot.innerHTML = '';
    kpiTaxBefore.textContent = '—';
    kpiCredit.textContent = '—';
    kpiFinalTax.textContent = '—';
    incomeEl.focus();
  }

  calcBtn?.addEventListener('click', render);
  resetBtn?.addEventListener('click', reset);
  childrenEl?.addEventListener('input', () => {
    let v = parseInt(childrenEl.value,10);
    if(isNaN(v)) v = 0;
    if(v > 8) v = 8;
    if(v < 0) v = 0;
    childrenEl.value = String(v);
  });
})();
