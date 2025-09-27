// Rent Tax Calculator JavaScript

class RentTaxCalculator {
  constructor() {
    this.isLoading = false;
    this.init();
  }

  init() {
    try {
      // Formatter (Greek locale, EUR)
      this.fmt = new Intl.NumberFormat('el-GR', { 
        style: 'currency', 
        currency: 'EUR', 
        maximumFractionDigits: 2 
      });

      this.setupEventListeners();
      this.renderProps(1); // Initial render
      this.showLoadingState(false); // Ensure loading is hidden initially
    } catch (error) {
      console.error('Calculator initialization failed:', error);
      this.showError('Σφάλμα κατά την αρχικοποίηση του υπολογιστή.');
    }
  }

  showLoadingState(isLoading) {
    this.isLoading = isLoading;
    const calcBtn = document.getElementById('calcBtn');
    const results = document.getElementById('results');
    
    if (calcBtn) {
      calcBtn.disabled = isLoading;
      calcBtn.textContent = isLoading ? 'Υπολογισμός...' : 'Υπολογισμός';
      calcBtn.classList.toggle('loading', isLoading);
    }
    
    if (results && isLoading) {
      results.innerHTML = '<div class="loading-spinner">⏳ Υπολογισμός σε εξέλιξη...</div>';
    }
  }

  showError(message) {
    const results = document.getElementById('results');
    if (results) {
      results.innerHTML = `
        <div class="error-message" role="alert">
          <span class="error-icon">❌</span>
          <span>${message}</span>
        </div>
      `;
    }
  }

  setupEventListeners() {
    const countEl = document.getElementById('count');
    const calcBtn = document.getElementById('calcBtn');
    const resetBtn = document.getElementById('resetBtn');

    if (countEl) {
      countEl.addEventListener('input', () => this.syncPropertyCount());
      countEl.addEventListener('change', () => this.syncPropertyCount());
    }

    if (calcBtn) {
      calcBtn.addEventListener('click', () => this.compute());
    }

    if (resetBtn) {
      resetBtn.addEventListener('click', () => this.reset());
    }

    // Add input validation for rent and months inputs
    document.addEventListener('input', (e) => {
      if (e.target.id && e.target.id.startsWith('rent_')) {
        const value = parseFloat(e.target.value);
        if (value > 10000) {
          e.target.value = 10000;
        }
      }
      if (e.target.id && e.target.id.startsWith('months_')) {
        const value = parseInt(e.target.value);
        if (value > 12) {
          e.target.value = 12;
        }
        if (value < 1 && e.target.value !== '') {
          e.target.value = 1;
        }
      }
    });
  }

  syncPropertyCount() {
    const countEl = document.getElementById('count');
    let n = parseInt(countEl.value, 10);
    if (isNaN(n)) n = 1;
    n = Math.max(1, Math.min(5, n));
    countEl.value = String(n);
    this.renderProps(n);
  }

  createPropCard(i) {
    const wrap = document.createElement('div');
    wrap.className = 'calc-row';
    wrap.innerHTML = `
      <div class="calc-grid calc-grid-2">
        <div>
          <label class="calc-label" for="rent_${i}">Μίσθωμα μηνιαίως (€)</label>
          <input class="calc-input" id="rent_${i}" type="number" min="0" max="10000" step="0.01" placeholder="π.χ. 650" />
        </div>
        <div>
          <label class="calc-label" for="months_${i}">Μήνες μίσθωσης</label>
          <input class="calc-input" id="months_${i}" type="number" min="1" max="12" step="1" placeholder="π.χ. 12" />
        </div>
      </div>`;
    return wrap;
  }

  renderProps(n) {
    const props = document.getElementById('props');
    if (!props) return;
    
    props.innerHTML = '';
    for (let i = 0; i < n; i++) {
      props.appendChild(this.createPropCard(i));
    }
  }

  calcTax(taxable) {
    const rows = [];
    let tax = 0;

    // First bracket: 0 - 12,000 at 15%
    const b1 = Math.min(taxable, 12000);
    if (b1 > 0) {
      const t = b1 * 0.15;
      rows.push({
        label: '0 – 12.000',
        amount: b1,
        rate: '15%',
        tax: t
      });
      tax += t;
    }

    // Second bracket: 12,001 - 35,000 at 35%
    if (taxable > 12000) {
      const b2 = Math.min(taxable, 35000) - 12000;
      if (b2 > 0) {
        const t = b2 * 0.35;
        rows.push({
          label: '12.001 – 35.000',
          amount: b2,
          rate: '35%',
          tax: t
        });
        tax += t;
      }
    }

    // Third bracket: > 35,000 at 45%
    if (taxable > 35000) {
      const b3 = taxable - 35000;
      const t = b3 * 0.45;
      rows.push({
        label: '> 35.000',
        amount: b3,
        rate: '45%',
        tax: t
      });
      tax += t;
    }

    return { tax, rows };
  }

  async compute() {
    try {
      this.showLoadingState(true);
      
      // Add small delay to show loading state
      await new Promise(resolve => setTimeout(resolve, 300));
      
      const countEl = document.getElementById('count');
      const n = Math.max(1, Math.min(5, Number(countEl?.value || 0)));
      
      let gross = 0;
      let hasValidInput = false;
      
      // Calculate total gross income from all properties
      for (let i = 0; i < n; i++) {
        const rentEl = document.getElementById(`rent_${i}`);
        const monthsEl = document.getElementById(`months_${i}`);
        
        const rent = Number(rentEl?.value || 0);
        const months = Math.max(0, Math.min(12, Number(monthsEl?.value || 0)));
        
        if (rent > 0 && months > 0) {
          hasValidInput = true;
        }
        
        gross += rent * months;
      }
      
      // Validate input
      if (!hasValidInput) {
        throw new Error('Παρακαλώ εισάγετε έγκυρα στοιχεία (μίσθωμα και μήνες) για τουλάχιστον ένα ακίνητο.');
      }
      
      if (gross > 1000000) {
        throw new Error('Το συνολικό εισόδημα δεν μπορεί να υπερβαίνει το 1.000.000€.');
      }

      // Calculate taxable income (95% after 5% expenses deduction)
      const taxable = gross * 0.95;
      const { tax, rows } = this.calcTax(taxable);

      // Update KPIs
      this.updateElement('gross', this.fmt.format(gross));
      this.updateElement('taxable', this.fmt.format(taxable));
      this.updateElement('tax', this.fmt.format(tax));

      // Update bracket table
      this.updateBracketTable(rows);
      
    } catch (error) {
      console.error('Calculation error:', error);
      this.showError(error.message);
    } finally {
      this.showLoadingState(false);
    }
  }

  updateElement(id, value) {
    const element = document.getElementById(id);
    if (element) {
      element.textContent = value;
    }
  }

  updateBracketTable(rows) {
    const tbody = document.getElementById('bracketRows');
    const tfoot = document.getElementById('bracketFoot');
    
    if (!tbody || !tfoot) return;

    tbody.innerHTML = '';
    tfoot.innerHTML = '';

    if (rows.length === 0) {
      tbody.innerHTML = '<tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>';
      return;
    }

    // Add bracket rows
    for (const r of rows) {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${r.label}</td>
        <td class="r">${this.fmt.format(r.amount)}</td>
        <td class="r">${r.rate}</td>
        <td class="r">${this.fmt.format(r.tax)}</td>`;
      tbody.appendChild(tr);
    }

    // Add total row
    const total = rows.reduce((a, b) => a + b.tax, 0);
    const trTotal = document.createElement('tr');
    trTotal.innerHTML = `
      <td>Σύνολο φόρου</td>
      <td></td>
      <td></td>
      <td class="r">${this.fmt.format(total)}</td>`;
    tfoot.appendChild(trTotal);
  }

  reset() {
    const countEl = document.getElementById('count');
    if (countEl) {
      countEl.value = '1';
    }
    
    this.renderProps(1);
    
    this.updateElement('gross', '—');
    this.updateElement('taxable', '—');
    this.updateElement('tax', '—');
    
    const tbody = document.getElementById('bracketRows');
    const tfoot = document.getElementById('bracketFoot');
    
    if (tbody) {
      tbody.innerHTML = '<tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;">Δεν υπάρχουν υπολογισμοί ακόμη.</td></tr>';
    }
    
    if (tfoot) {
      tfoot.innerHTML = '';
    }
  }
}

// Initialize calculator when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  new RentTaxCalculator();
});
