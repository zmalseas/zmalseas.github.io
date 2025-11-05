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
  const numberFmt = new Intl.NumberFormat('el-GR', { minimumFractionDigits:2, maximumFractionDigits:2 });
  
  let isCalculating = false;

  function parseAmount(raw){
    if(!raw) return 0;
    // Handle Greek number format: 1.234,56 -> 1234.56
    const cleaned = String(raw)
      .replace(/€/g,'')
      .replace(/\s+/g,'')
      .replace(/\./g,'') // Remove thousands separators
      .replace(/,/g,'.'); // Convert decimal comma to dot
    const n = Number(cleaned);
    return isNaN(n)?0:n;
  }
  
  // Format number input
  function formatNumberInput(input){
    const value = parseAmount(input.value);
    if(value > 0){
      input.value = numberFmt.format(value);
    }
  }
  
  // Set inputmode for numeric keyboard on mobile
  if(amountEl){
    amountEl.setAttribute('inputmode', 'decimal');
    amountEl.addEventListener('blur', () => formatNumberInput(amountEl));
    amountEl.addEventListener('focus', function(){
      if(this.value){
        const num = parseAmount(this.value);
        if(num > 0) this.value = num.toString();
      }
    });
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
    
    const baseInput = parseAmount(amountEl.value);
    const type = document.querySelector('input[name="type"]:checked')?.value || 'gross';
    const rate = activeVatRate();
    
    if(rate < 0 || rate > 99){
      vatOut.textContent = '—'; leftOut.textContent = '—'; rightOut.textContent = '—';
      isCalculating = false;
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
    if(amountEl) amountEl.focus();
  }

  function formatNumberInput(input){
    let value = input.value.replace(/[^\d,.-]/g, ''); // Keep only digits, commas, dots, minus
    if(!value) return;
    
    // Convert to number and format back
    const number = parseAmount(value);
    if(number && number > 0){
      input.value = numberFmt.format(number);
    }
  }

  function copyToClipboard(text, element){
    if(!text || text === '—') return;
    
    navigator.clipboard.writeText(text.replace('€', '').trim()).then(() => {
      // Show copy icon with checkmark
      const copyIcon = element.querySelector('.copy-icon');
      if(copyIcon){
        copyIcon.innerHTML = '✓';
        copyIcon.style.color = '#10b981';
        setTimeout(() => {
          copyIcon.innerHTML = '📋';
          copyIcon.style.color = '';
        }, 1500);
      }
    }).catch(() => {
      // Fallback for older browsers
      const textArea = document.createElement('textarea');
      textArea.value = text.replace('€', '').trim();
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand('copy');
      document.body.removeChild(textArea);
      
      // Visual feedback
      const copyIcon = element.querySelector('.copy-icon');
      if(copyIcon){
        copyIcon.innerHTML = '✓';
        setTimeout(() => copyIcon.innerHTML = '📋', 1500);
      }
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
  
  // Auto-format input on blur
  amountEl.addEventListener('blur', () => formatNumberInput(amountEl));
  customVatEl.addEventListener('blur', () => {
    if(customVatEl.value && !isNaN(customVatEl.value)){
      customVatEl.value = parseFloat(customVatEl.value).toFixed(1);
    }
  });

  // Copy-to-clipboard for results
  [leftOut, vatOut, rightOut].forEach(element => {
    // Add copy icon
    const copyIcon = document.createElement('span');
    copyIcon.className = 'copy-icon';
    copyIcon.innerHTML = '📋';
    copyIcon.style.cssText = 'position:absolute; top:4px; right:4px; font-size:12px; opacity:0; transition:opacity .2s;';
    element.style.position = 'relative';
    element.appendChild(copyIcon);
    
    element.addEventListener('click', () => {
      copyToClipboard(element.textContent, element);
    });
    
    element.addEventListener('mouseenter', () => {
      copyIcon.style.opacity = '0.7';
    });
    
    element.addEventListener('mouseleave', () => {
      copyIcon.style.opacity = '0';
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
