/**
 * Cookie Consent Center (Nerally)
 * - Centered modal on first visit
 * - Only optional category: Analytics/Performance (GTM)
 * - Loads GTM only after consent
 */

class CookieConsent {
  constructor() {
    this.consentKey = 'nerally-cookie-consent';
    this.analyticsKey = 'nerally-analytics-consent';
    this.gtmLoaded = false;
    this.gtmContainerId = (window.SITE_CONFIG && window.SITE_CONFIG.GTM_ID) || 'GTM-MN565XBX';
    this.overlay = null;
    this.init();
  }

  init() {
    const consent = this.getConsent();
    if (consent === null) {
      this.showIntroModal();
    } else {
      this.applyConsent(consent);
    }
    // Public opener to adjust preferences later (use in header/footer links)
    window.openCookiePreferences = () => this.showPreferencesModal();
  }

  getConsent() {
    try {
      const raw = localStorage.getItem(this.consentKey);
      return raw ? JSON.parse(raw) : null;
    } catch (_) { return null; }
  }

  setConsent(analytics) {
    const consent = { analytics: !!analytics, ts: Date.now(), v: '1.0' };
    localStorage.setItem(this.consentKey, JSON.stringify(consent));
    localStorage.setItem(this.analyticsKey, String(!!analytics));
    this.applyConsent(consent);
  }

  applyConsent(consent) {
    if (consent.analytics) {
      this.enableAnalytics();
      this.loadGTM();
    } else {
      this.disableAnalytics();
    }
    document.dispatchEvent(new CustomEvent('cookieConsentUpdated', { detail: consent }));
  }

  // Overlay helpers
  createOverlay() {
    if (this.overlay) return this.overlay;
    const wrap = document.createElement('div');
    wrap.className = 'cc-overlay';
    wrap.innerHTML = '<div class="cc-backdrop"></div>';
    document.body.appendChild(wrap);
    this.overlay = wrap;
    document.documentElement.classList.add('cc-modal-open');
    requestAnimationFrame(() => wrap.classList.add('show'));
    return wrap;
  }

  closeOverlay() {
    if (!this.overlay) return;
    const el = this.overlay; this.overlay = null;
    el.classList.remove('show');
    setTimeout(() => { el.remove(); }, 180);
    document.documentElement.classList.remove('cc-modal-open');
  }

  // Intro modal (first screen)
  showIntroModal() {
    const overlay = this.createOverlay();
    const box = document.createElement('div');
    box.className = 'cc-modal';
    box.setAttribute('role','dialog');
    box.setAttribute('aria-modal','true');
    box.innerHTML = `
      <button class="cc-close" aria-label="Κλείσιμο">×</button>
      <h2 class="cc-title">Πώς χρησιμοποιούμε τα cookies</h2>
      <p class="cc-desc">
        Στη Nerally, χρησιμοποιούμε cookies για να σας προσφέρουμε την καλύτερη, 
        πιο προσωποποιημένη εμπειρία. Τα προαιρετικά cookies Ανάλυσης/Απόδοσης 
        (Google Tag Manager) μας βοηθούν να βελτιώνουμε τον ιστότοπο. Τα απολύτως 
        απαραίτητα cookies είναι πάντα ενεργά. Διαβάστε την 
        <a href="/nomimotita/cookies-policy.html" target="_blank" rel="noopener">Πολιτική Cookies</a>.
      </p>
      <div class="cc-actions">
        <button class="cc-btn cc-accept-all">Αποδοχή όλων των προαιρετικών</button>
        <button class="cc-btn cc-decline-all">Απόρριψη όλων των προαιρετικών</button>
        <button class="cc-link cc-open-prefs">Προσαρμογή ρυθμίσεων</button>
      </div>
    `;
    overlay.appendChild(box);

    box.querySelector('.cc-close').addEventListener('click', () => this.closeOverlay());
    box.querySelector('.cc-accept-all').addEventListener('click', () => { this.setConsent(true); this.closeOverlay(); });
    box.querySelector('.cc-decline-all').addEventListener('click', () => { this.setConsent(false); this.closeOverlay(); });
    box.querySelector('.cc-open-prefs').addEventListener('click', () => { box.remove(); this.showPreferencesModal(true); });
  }

  // Preferences modal (second screen)
  showPreferencesModal(fromIntro = false) {
    const overlay = this.overlay || this.createOverlay();
    const box = document.createElement('div');
    box.className = 'cc-modal';
    box.setAttribute('role','dialog');
    box.setAttribute('aria-modal','true');
    box.innerHTML = `
      <button class="cc-close" aria-label="Κλείσιμο">×</button>
      <h2 class="cc-title">Κέντρο προτιμήσεων απορρήτου</h2>
      <p class="cc-desc">Ρυθμίστε τα προαιρετικά cookies. Τα απολύτως απαραίτητα είναι πάντα ενεργά.</p>
      <div class="cc-groups">
        <div class="cc-group">
          <div class="cc-group-head">
            <span>Απολύτως απαραίτητα cookies</span>
            <span class="cc-always-on">Πάντα ενεργά</span>
          </div>
          <div class="cc-group-body">Αναγκαία για βασικές λειτουργίες του ιστότοπου.</div>
        </div>
        <div class="cc-group">
          <div class="cc-group-head">
            <span>Analytics & απόδοσης (GTM)</span>
            <label class="cc-switch"><input id="cc-analytics" type="checkbox"><span></span></label>
          </div>
          <div class="cc-group-body">Βοηθούν στη μέτρηση χρήσης και στη βελτίωση εμπειρίας.</div>
        </div>
      </div>
      <div class="cc-actions cc-actions-row">
        <button class="cc-btn cc-decline-all">Απόρριψη όλων των προαιρετικών</button>
        <button class="cc-btn cc-confirm">Αποθήκευση επιλογών</button>
        <button class="cc-btn cc-accept-all">Αποδοχή όλων των προαιρετικών</button>
      </div>
    `;
    overlay.appendChild(box);

    const stored = this.getConsent();
    const chk = box.querySelector('#cc-analytics');
    if (chk) chk.checked = stored ? !!stored.analytics : false;

    box.querySelector('.cc-close').addEventListener('click', () => this.closeOverlay());
    box.querySelector('.cc-accept-all').addEventListener('click', () => { this.setConsent(true); this.closeOverlay(); });
    box.querySelector('.cc-decline-all').addEventListener('click', () => { this.setConsent(false); this.closeOverlay(); });
    box.querySelector('.cc-confirm').addEventListener('click', () => { this.setConsent(chk ? chk.checked : false); this.closeOverlay(); });
  }

  // Consent effects
  enableAnalytics() {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ event: 'cookie_consent_update', analytics_consent: 'granted' });
    localStorage.setItem(this.analyticsKey, 'true');
  }

  disableAnalytics() {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ event: 'cookie_consent_update', analytics_consent: 'denied' });
    localStorage.setItem(this.analyticsKey, 'false');
    this.clearAnalyticsCookies();
  }

  loadGTM() {
    if (this.gtmLoaded || !this.gtmContainerId) return;
    window.dataLayer = window.dataLayer || [];
    const s = document.createElement('script');
    s.async = true;
    s.src = 'https://www.googletagmanager.com/gtm.js?id=' + this.gtmContainerId;
    const first = document.getElementsByTagName('script')[0];
    first.parentNode.insertBefore(s, first);
    this.gtmLoaded = true;
  }

  clearAnalyticsCookies() {
    const gaCookies = ['_ga', '_gid', '_gat', '_gat_gtag_UA_', '_gat_gtag_G_'];
    gaCookies.forEach(name => {
      document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/; domain=.${location.hostname}`;
      document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/`;
    });
    document.cookie.split(';').forEach(c => {
      const n = c.split('=')[0].trim();
      if (n.startsWith('_ga') || n.startsWith('_gid')) {
        document.cookie = `${n}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/; domain=.${location.hostname}`;
        document.cookie = `${n}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/`;
      }
    });
  }

  revokeConsent() {
    localStorage.removeItem(this.consentKey);
    localStorage.removeItem(this.analyticsKey);
    this.clearAnalyticsCookies();
    this.showIntroModal();
  }

  isAnalyticsEnabled() {
    const c = this.getConsent();
    return !!(c && c.analytics);
  }
}

// Auto-init
document.addEventListener('DOMContentLoaded', () => { window.cookieConsent = new CookieConsent(); });
window.CookieConsent = CookieConsent;

