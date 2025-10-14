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
  
  let isCalculating = false;

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
    if(isCalculating) return;
    isCalculating = true;
    
    // Show loading state
    calcBtn.textContent = 'Υπολογίζω...';
    calcBtn.disabled = true;
    leftOut.textContent = '⏳';
    vatOut.textContent = '⏳';
    rightOut.textContent = '⏳';
    
    // Simulate brief calculation delay for UX
    setTimeout(() => {
      const baseInput = parseAmount(amountEl.value);
      const type = document.querySelector('input[name="type"]:checked')?.value || 'gross';
      const rate = activeVatRate();
      
      if(rate < 0 || rate > 99){
        vatOut.textContent = '—'; leftOut.textContent = '—'; rightOut.textContent = '—';
        finishCalculation();
        return;
      }
      
      const r = rate / 100;
      let net=0, vat=0, gross=0;
      if(type === 'gross'){
        gross = baseInput;
        net = gross / (1 + r);
        vat = gross - net;
        op1.textContent = '=';
      } else {
        net = baseInput;
        vat = net * r;
        gross = net + vat;
        op1.textContent = '+';
      }
      
      leftOut.textContent = net>0?fmt.format(net):'—';
      vatOut.textContent = vat>0?fmt.format(vat):'—';
      rightOut.textContent = gross>0?fmt.format(gross):'—';
      
      finishCalculation();
    }, 400); // 400ms delay for loading effect
  }

  function finishCalculation(){
    calcBtn.textContent = 'Υπολογισμός';
    calcBtn.disabled = false;
    isCalculating = false;
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

  function copyToClipboard(text, element){
    if(!text || text === '—') return;
    
    navigator.clipboard.writeText(text.replace('€', '').trim()).then(() => {
      // Visual feedback
      const original = element.textContent;
      element.textContent = '✓ Αντιγράφηκε';
      element.style.background = '#10b981';
      element.style.color = '#fff';
      
      setTimeout(() => {
        element.textContent = original;
        element.style.background = '';
        element.style.color = '';
      }, 1500);
    }).catch(() => {
      // Fallback for older browsers
      const textArea = document.createElement('textarea');
      textArea.value = text.replace('€', '').trim();
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand('copy');
      document.body.removeChild(textArea);
      
      // Visual feedback
      const original = element.textContent;
      element.textContent = '✓ Αντιγράφηκε';
      setTimeout(() => element.textContent = original, 1500);
    });
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
  
  // Keyboard shortcuts
  document.addEventListener('keydown', (e) => {
    if(e.key === 'Enter' && !isCalculating){
      e.preventDefault();
      calculate();
    }
    if(e.key === 'Escape'){
      reset();
    }
  });
  
  // Copy-to-clipboard for results
  [leftOut, vatOut, rightOut].forEach(element => {
    element.addEventListener('click', () => {
      copyToClipboard(element.textContent, element);
    });
    element.style.cursor = 'pointer';
    element.title = 'Κλικ για αντιγραφή';
  });
  
  customVatEl.addEventListener('input', () => {}); // no auto calc
  document.querySelectorAll('input[name="type"]').forEach(r => r.addEventListener('change', () => {}));
  amountEl.addEventListener('input', () => {});
  calcBtn.addEventListener('click', calculate);
  resetBtn.addEventListener('click', reset);

  // Init
  reset();
})();
