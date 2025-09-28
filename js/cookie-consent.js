/**
 * GDPR Cookie Consent Manager
 * Handles cookie consent for analytics and tracking
 */

class CookieConsent {
  constructor() {
    this.consentKey = 'nerally-cookie-consent';
    this.analyticsKey = 'nerally-analytics-consent';
    this.banner = null;
    this.init();
  }

  init() {
    // Check if consent has already been given
    const consent = this.getConsent();
    
    if (consent === null) {
      this.showBanner();
    } else {
      this.handleConsent(consent);
    }
  }

  getConsent() {
    const consent = localStorage.getItem(this.consentKey);
    return consent ? JSON.parse(consent) : null;
  }

  setConsent(analyticsConsent) {
    const consent = {
      analytics: analyticsConsent,
      timestamp: Date.now(),
      version: '1.0'
    };
    
    localStorage.setItem(this.consentKey, JSON.stringify(consent));
    localStorage.setItem(this.analyticsKey, analyticsConsent.toString());
    
    this.handleConsent(consent);
  }

  showBanner() {
    // Remove any existing banner
    this.hideBanner();

    // Create banner HTML
    this.banner = document.createElement('div');
    this.banner.id = 'cookie-consent-banner';
    this.banner.innerHTML = `
      <div class="cookie-consent-content">
        <div class="cookie-consent-text">
          <h3>🍪 Χρήση Cookies</h3>
          <p>
            Χρησιμοποιούμε cookies για να βελτιώσουμε την εμπειρία σας και να αναλύσουμε την κίνηση στον ιστότοπό μας. 
            Τα δεδομένα μας βοηθούν να παρέχουμε καλύτερες υπηρεسίες.
          </p>
          <div class="cookie-consent-details">
            <strong>Τι cookies χρησιμοποιούμε:</strong>
            <ul>
              <li><strong>Απαραίτητα:</strong> Για τη λειτουργία του ιστοτόπου</li>
              <li><strong>Analytics:</strong> Google Analytics για στατιστικά (ανώνυμα)</li>
            </ul>
          </div>
        </div>
        <div class="cookie-consent-actions">
          <button id="accept-all-cookies" class="btn-primary">
            ✅ Αποδοχή Όλων
          </button>
          <button id="accept-essential-cookies" class="btn-secondary">
            ⚙️ Μόνο Απαραίτητα
          </button>
          <button id="customize-cookies" class="btn-tertiary">
            🔧 Προσαρμογή
          </button>
        </div>
      </div>
      <div class="cookie-consent-footer">
        <p>
          Διαβάστε την <a href="/nomimotita/privacy-policy.html" target="_blank">Πολιτική Απορρήτου</a> 
          και την <a href="/nomimotita/cookies-policy.html" target="_blank">Πολιτική Cookies</a> μας.
        </p>
      </div>
    `;

    // Add to DOM
    document.body.appendChild(this.banner);

    // Add event listeners
    this.addEventListeners();

    // Add show animation
    setTimeout(() => {
      this.banner.classList.add('show');
    }, 100);
  }

  addEventListeners() {
    const acceptAll = document.getElementById('accept-all-cookies');
    const acceptEssential = document.getElementById('accept-essential-cookies');
    const customize = document.getElementById('customize-cookies');

    acceptAll?.addEventListener('click', () => {
      this.setConsent(true);
      this.hideBanner();
    });

    acceptEssential?.addEventListener('click', () => {
      this.setConsent(false);
      this.hideBanner();
    });

    customize?.addEventListener('click', () => {
      this.showCustomizeModal();
    });
  }

  showCustomizeModal() {
    const modal = document.createElement('div');
    modal.id = 'cookie-customize-modal';
    modal.innerHTML = `
      <div class="modal-overlay" id="modal-overlay"></div>
      <div class="modal-content">
        <div class="modal-header">
          <h3>⚙️ Προσαρμογή Cookies</h3>
          <button class="modal-close" id="modal-close">×</button>
        </div>
        <div class="modal-body">
          <div class="cookie-category">
            <div class="cookie-toggle">
              <input type="checkbox" id="essential-cookies" checked disabled>
              <label for="essential-cookies">
                <strong>Απαραίτητα Cookies</strong>
                <span class="required">(Υποχρεωτικά)</span>
              </label>
              <p class="cookie-description">
                Απαραίτητα για τη βασική λειτουργία του ιστοτόπου (πλοήγηση, ασφάλεια, φόρμες).
              </p>
            </div>
          </div>
          
          <div class="cookie-category">
            <div class="cookie-toggle">
              <input type="checkbox" id="analytics-cookies">
              <label for="analytics-cookies">
                <strong>Analytics Cookies</strong>
                <span class="optional">(Προαιρετικά)</span>
              </label>
              <p class="cookie-description">
                Google Analytics για ανάλυση κίνησης και βελτίωση του ιστοτόπου. Τα δεδομένα είναι ανώνυμα.
              </p>
              <div class="cookie-details">
                <small>
                  <strong>Cookies:</strong> _ga, _ga_*, _gid<br>
                  <strong>Διάρκεια:</strong> 2 χρόνια (GA), 24 ώρες (GID)<br>
                  <strong>Σκοπός:</strong> Μέτρηση επισκεπτών, συμπεριφοράς, πηγών κίνησης
                </small>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="save-preferences" class="btn-primary">💾 Αποθήκευση Προτιμήσεων</button>
          <button id="accept-selected" class="btn-secondary">✅ Αποδοχή Επιλεγμένων</button>
        </div>
      </div>
    `;

    document.body.appendChild(modal);

    // Add event listeners
    const overlay = document.getElementById('modal-overlay');
    const closeBtn = document.getElementById('modal-close');
    const saveBtn = document.getElementById('save-preferences');
    const acceptBtn = document.getElementById('accept-selected');
    const analyticsCheck = document.getElementById('analytics-cookies');

    const closeModal = () => {
      modal.remove();
    };

    overlay?.addEventListener('click', closeModal);
    closeBtn?.addEventListener('click', closeModal);

    saveBtn?.addEventListener('click', () => {
      const analyticsConsent = analyticsCheck.checked;
      this.setConsent(analyticsConsent);
      this.hideBanner();
      closeModal();
    });

    acceptBtn?.addEventListener('click', () => {
      const analyticsConsent = analyticsCheck.checked;
      this.setConsent(analyticsConsent);
      this.hideBanner();
      closeModal();
    });

    // Add show animation
    setTimeout(() => {
      modal.classList.add('show');
    }, 100);
  }

  hideBanner() {
    if (this.banner) {
      this.banner.classList.add('hide');
      setTimeout(() => {
        this.banner?.remove();
        this.banner = null;
      }, 300);
    }
  }

  handleConsent(consent) {
    if (consent.analytics) {
      this.enableAnalytics();
    } else {
      this.disableAnalytics();
    }

    // Dispatch custom event for other scripts to listen
    document.dispatchEvent(new CustomEvent('cookieConsentUpdated', {
      detail: consent
    }));
  }

  enableAnalytics() {
    // Enable Google Analytics/GTM if consent is given
    if (typeof window.dataLayer !== 'undefined') {
      window.dataLayer.push({
        'event': 'cookie_consent_update',
        'analytics_consent': 'granted'
      });
    }

    // Set consent in localStorage for other scripts
    localStorage.setItem(this.analyticsKey, 'true');
    
    console.log('✅ Analytics cookies enabled');
  }

  disableAnalytics() {
    // Disable Google Analytics/GTM
    if (typeof window.dataLayer !== 'undefined') {
      window.dataLayer.push({
        'event': 'cookie_consent_update',
        'analytics_consent': 'denied'
      });
    }

    // Clear analytics cookies if they exist
    this.clearAnalyticsCookies();
    
    localStorage.setItem(this.analyticsKey, 'false');
    
    console.log('❌ Analytics cookies disabled');
  }

  clearAnalyticsCookies() {
    // Clear Google Analytics cookies
    const gaCookies = ['_ga', '_gid', '_gat', '_gat_gtag_UA_', '_gat_gtag_G_'];
    
    gaCookies.forEach(cookieName => {
      document.cookie = `${cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=.${window.location.hostname};`;
      document.cookie = `${cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
    });

    // Clear any GA cookies that match pattern
    document.cookie.split(';').forEach(cookie => {
      const [name] = cookie.split('=');
      const trimmedName = name.trim();
      if (trimmedName.startsWith('_ga') || trimmedName.startsWith('_gid')) {
        document.cookie = `${trimmedName}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=.${window.location.hostname};`;
        document.cookie = `${trimmedName}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      }
    });
  }

  // Public method to revoke consent
  revokeConsent() {
    localStorage.removeItem(this.consentKey);
    localStorage.removeItem(this.analyticsKey);
    this.clearAnalyticsCookies();
    this.showBanner();
  }

  // Public method to check if analytics is enabled
  isAnalyticsEnabled() {
    const consent = this.getConsent();
    return consent ? consent.analytics : false;
  }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  window.cookieConsent = new CookieConsent();
});

// Export for global access
window.CookieConsent = CookieConsent;