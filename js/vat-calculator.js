// VAT Calculator Logic - Nerally
(function(){
  function $(id){ return document.getElementById(id); }
  const amountEl = $('amount');
  const customVatEl = $('customVat');
  const calcBtn = $('calcBtn');
  const resetBtn = $('resetBtn');
  const leftOut = $('leftOut');
  const vatOut = $('vatOut');
  const rightOut = $('rightOut');
  const op1 = $('op1');

  const fmt = new Intl.NumberFormat('el-GR', { style:'currency', currency:'EUR', minimumFractionDigits:2, maximumFractionDigits:2 });

  function parseAmount(raw){
    if(!raw) return 0;
    const cleaned = String(raw).replace(/€/g,'').replace(/\s+/g,'').replace(/\./g,'').replace(/,/g,'.');
    const n = Number(cleaned);
    return isNaN(n)?0:n;
  }

  function activeVatRate(){
    const sel = document.querySelector('input[name="vat"]:checked');
    if(!sel) return 24;
    if(sel.value === 'custom'){
      const v = parseFloat(customVatEl.value);
      return isNaN(v)?0:v;
    }
    return parseFloat(sel.value);
  }

  function calculate(){
    const baseInput = parseAmount(amountEl.value);
    const type = document.querySelector('input[name="type"]:checked')?.value || 'gross';
    const rate = activeVatRate();
    if(rate < 0 || rate > 99){
      vatOut.textContent = '—'; leftOut.textContent = '—'; rightOut.textContent = '—';
      return;
    }
    const r = rate / 100;
    let net=0, vat=0, gross=0;
    if(type === 'gross'){
      gross = baseInput;
      net = gross / (1 + r);
      vat = gross - net;
      op1.textContent = '='; // left + vat = gross (rearranged visually)
    } else {
      net = baseInput;
      vat = net * r;
      gross = net + vat;
      op1.textContent = '+';
    }
    leftOut.textContent = net>0?fmt.format(net):'—';
    vatOut.textContent = vat>0?fmt.format(vat):'—';
    rightOut.textContent = gross>0?fmt.format(gross):'—';
  }

  function reset(){
    amountEl.value='';
    document.getElementById('typeGross').checked = true;
    document.getElementById('vat24').checked = true;
    customVatEl.value='';
    customVatEl.style.display='none';
    leftOut.textContent = '—';
    vatOut.textContent = '—';
    rightOut.textContent = '—';
    op1.textContent = '+';
    amountEl.focus();
  }

  // Events
  document.querySelectorAll('input[name="vat"]').forEach(r => {
    r.addEventListener('change', () => {
      if(r.value === 'custom'){
        customVatEl.style.display='block';
        customVatEl.focus();
      } else {
        customVatEl.style.display='none';
      }
    });
  });
  customVatEl.addEventListener('input', () => {}); // no auto calc
  document.querySelectorAll('input[name="type"]').forEach(r => r.addEventListener('change', () => {}));
  amountEl.addEventListener('input', () => {});
  calcBtn.addEventListener('click', calculate);
  resetBtn.addEventListener('click', reset);

  // Init
  reset();
})();
