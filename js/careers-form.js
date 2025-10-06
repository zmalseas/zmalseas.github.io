// Careers Form Handler (multipart + reCAPTCHA v3)
class CareersFormHandler {
  constructor(opts = {}) {
    this.siteKey = opts.siteKey || (window.SITE_CONFIG && window.SITE_CONFIG.RECAPTCHA_SITE) || '';
    this.apiUrl = opts.apiUrl || '/careers-handler.php';
    this.formSelector = opts.formSelector || '#careersForm';
    this.recaptchaLoaded = false;
    this.init();
  }
  init() {
    this.loadRecaptcha();
    this.bind();
    this.addHoneypot();
  }
  loadRecaptcha() {
    if (document.querySelector('script[src*="recaptcha"]')) { this.recaptchaLoaded = true; return; }
    const s = document.createElement('script');
    s.src = `https://www.google.com/recaptcha/api.js?render=${this.siteKey}`;
    s.onload = () => { this.recaptchaLoaded = true; };
    document.head.appendChild(s);
  }
  addHoneypot() {
    const form = document.querySelector(this.formSelector);
    if (form && !form.querySelector('input[name="website"]')) {
      const hp = document.createElement('input');
      hp.type = 'text'; hp.name = 'website'; hp.style.cssText = 'position:absolute;left:-9999px;top:-9999px;visibility:hidden;';
      form.appendChild(hp);
    }
  }
  bind() {
    const form = document.querySelector(this.formSelector);
    if (!form) return;
    form.addEventListener('submit', (e) => this.handleSubmit(e));
    // Dropzone enhancements
    const dz = form.querySelector('#cvDrop');
    const fileInput = form.querySelector('#cv');
    const fileName = form.querySelector('#cvFileName');
    const clearBtn = form.querySelector('#cvClear');
    if (dz && fileInput) {
      dz.addEventListener('click', () => fileInput.click());
      dz.addEventListener('dragover', (e) => { e.preventDefault(); dz.classList.add('dragover'); });
      dz.addEventListener('dragleave', () => dz.classList.remove('dragover'));
      dz.addEventListener('drop', (e) => {
        e.preventDefault(); dz.classList.remove('dragover');
        if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files[0]) {
          fileInput.files = e.dataTransfer.files;
          if (fileName) fileName.textContent = e.dataTransfer.files[0].name;
          dz.classList.add('has-file');
        }
      });
      fileInput.addEventListener('change', () => {
        if (fileInput.files && fileInput.files[0] && fileName) {
          fileName.textContent = fileInput.files[0].name;
          dz.classList.add('has-file');
        } else {
          fileName.textContent = '';
          dz.classList.remove('has-file');
        }
      });
      if (clearBtn) {
        clearBtn.addEventListener('click', (e) => {
          e.stopPropagation();
          fileInput.value = '';
          if (fileName) fileName.textContent = '';
          dz.classList.remove('has-file');
        });
      }
    }
  }
  async getToken() {
    if (!this.recaptchaLoaded || typeof grecaptcha === 'undefined') return null;
    return await new Promise((resolve) => {
      grecaptcha.ready(() => {
        grecaptcha.execute(this.siteKey, { action: 'contact_form' })
          .then(t => resolve(t))
          .catch(() => resolve(null));
      });
    });
  }
  setBtn(btn, loading, text) {
    if (!btn) return;
    if (loading) { btn.disabled = true; btn.dataset.t = btn.textContent; if (text) btn.textContent = text; btn.classList.add('loading'); }
    else { btn.disabled = false; if (btn.dataset.t) btn.textContent = btn.dataset.t; btn.classList.remove('loading'); }
  }
  showMsg(type, msg) {
    const box = document.createElement('div');
    box.className = `form-message ${type}`;
    box.innerHTML = `<div class="message-content"><span class="message-icon">${type==='success'?'✅':'❌'}</span><span>${msg}</span></div>`;
    const form = document.querySelector(this.formSelector);
    if (form) form.parentNode.insertBefore(box, form);
    setTimeout(()=> box.remove(), 8000);
  }
  validate(form) {
    let ok = true;
    const req = ['name','email','phone','about','privacy'];
    req.forEach(n => { const f = form.querySelector(`[name="${n}"]`); if (!f || (f.type==='checkbox'? !f.checked : !f.value.trim())) ok = false; });
    const email = form.querySelector('[name="email"]');
    if (email && email.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) ok = false;
    const file = form.querySelector('[name="cv"]');
    if (!file || !file.files || !file.files[0]) ok = false;
    else {
      const f = file.files[0];
      if (f.size > 5*1024*1024) ok = false;
      const allowed = ['application/pdf','image/png','image/jpeg'];
      if (!allowed.includes(f.type)) ok = false;
    }
    return ok;
  }
  async handleSubmit(e) {
    e.preventDefault();
    const form = e.target;
    const btn = form.querySelector('[type="submit"]');
    if (!this.validate(form)) { this.showMsg('error','Ελέγξτε τα πεδία και το αρχείο (PDF/PNG/JPG έως 5MB).'); return; }
    this.setBtn(btn, true, 'Αποστολή...');
    const token = await this.getToken();
    if (!token) { this.showMsg('error','Σφάλμα reCAPTCHA. Ανανεώστε τη σελίδα.'); this.setBtn(btn,false); return; }
    const fd = new FormData(form);
    fd.append('recaptcha_token', token);
    try {
      const r = await fetch(this.apiUrl, { method:'POST', body: fd, headers: { 'Accept':'application/json' } });
      const j = await r.json();
      if (j.success) { this.showMsg('success', j.message || 'Η αίτηση στάλθηκε!'); form.reset(); }
      else { this.showMsg('error', j.error || 'Αποτυχία αποστολής.'); }
    } catch(err) {
      this.showMsg('error','Σφάλμα δικτύου.');
    } finally { this.setBtn(btn,false); }
  }
}

document.addEventListener('DOMContentLoaded', () => {
  new CareersFormHandler({
    siteKey: (window.SITE_CONFIG && window.SITE_CONFIG.RECAPTCHA_SITE) || undefined,
    apiUrl: '/careers-handler.php',
    formSelector: '#careersForm'
  });
});
