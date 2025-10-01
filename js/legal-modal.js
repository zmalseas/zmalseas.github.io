/**
 * Legal Modal JavaScript - Nerally
 * Handles the opening, closing and navigation of the legal information modal
 */

class LegalModal {
  constructor() {
    this.backdrop = null;
    this.modal = null;
    this.dialog = null;
    this.closeBtn = null;
    this.panelTitle = null;
    this.tabs = [];
    this.lastActive = null;
    
    this.init();
  }

  init() {
    // Only setup footer triggers initially
    this.setupFooterTriggers();
    
    // Handle hash navigation (optional)
    this.handleHashNavigation();
  }

  async createModal() {
    // Check if modal already exists
    if (document.getElementById('legal-modal')) {
      this.setupElements();
      return;
    }

    // Create backdrop
    const backdrop = document.createElement('div');
    backdrop.className = 'legal-backdrop';
    backdrop.id = 'legal-backdrop';
    backdrop.setAttribute('aria-hidden', 'true');

    // Create modal structure
    const modal = document.createElement('div');
    modal.className = 'legal-modal';
    modal.id = 'legal-modal';
    modal.setAttribute('aria-hidden', 'true');

    modal.innerHTML = `
      <div class="legal-dialog" role="dialog" aria-modal="true" aria-labelledby="legal-heading">
        <!-- Sidebar -->
        <aside class="legal-sidebar">
          <div class="legal-brand">
            <h1 id="legal-heading">Nerally — Νομικές Πληροφορίες</h1>
            <p>Πολιτικές και όροι χρήσης</p>
          </div>
          <nav class="legal-nav" role="tablist" aria-label="Ενότητες">
            <button class="legal-tabbtn" role="tab" aria-selected="true" aria-controls="tab-privacy" id="btn-privacy">Πολιτική Απορρήτου</button>
            <button class="legal-tabbtn" role="tab" aria-selected="false" aria-controls="tab-terms" id="btn-terms">Όροι Χρήσης</button>
            <button class="legal-tabbtn" role="tab" aria-selected="false" aria-controls="tab-cookies" id="btn-cookies">Cookies</button>
            <button class="legal-tabbtn" role="tab" aria-selected="false" aria-controls="tab-gdpr" id="btn-gdpr">GDPR</button>
          </nav>
        </aside>

        <!-- Content -->
        <section class="legal-content">
          <header class="legal-header">
            <h2 class="legal-title" id="panel-title">Πολιτική Απορρήτου</h2>
            <div class="legal-header-controls">
              <button class="legal-nav-toggle" id="legal-nav-toggle" aria-label="Πλοήγηση">☰</button>
              <button class="legal-close" id="legal-close" aria-label="Κλείσιμο">×</button>
            </div>
          </header>
          <div class="legal-scroll" id="legal-content-container">
            <div class="loading-placeholder">Φόρτωση περιεχομένου...</div>
          </div>
        </section>
      </div>
    `;

    // Add to DOM
    document.body.appendChild(backdrop);
    document.body.appendChild(modal);

    this.setupElements();

    // Load content asynchronously
    await this.loadContent();
  }

  async loadContent() {
    try {
      const contentContainer = document.getElementById('legal-content-container');
      if (contentContainer) {
        const contentPanels = await this.getContentPanels();
        contentContainer.innerHTML = contentPanels;
        
        // Re-setup tabs after content is loaded
        this.setupTabElements();
      }
    } catch (error) {
      console.error('Error loading legal content:', error);
      const contentContainer = document.getElementById('legal-content-container');
      if (contentContainer) {
        contentContainer.innerHTML = '<div class="error-placeholder">Σφάλμα φόρτωσης περιεχομένου. Παρακαλώ δοκιμάστε ξανά.</div>';
      }
    }
  }

  setupTabElements() {
    this.tabs = [
      {
        btn: document.getElementById('btn-privacy'),
        panel: document.getElementById('tab-privacy'),
        title: 'Πολιτική Απορρήτου'
      },
      {
        btn: document.getElementById('btn-terms'),
        panel: document.getElementById('tab-terms'),
        title: 'Όροι Χρήσης'
      },
      {
        btn: document.getElementById('btn-cookies'),
        panel: document.getElementById('tab-cookies'),
        title: 'Cookies'
      },
      {
        btn: document.getElementById('btn-gdpr'),
        panel: document.getElementById('tab-gdpr'),
        title: 'GDPR'
      }
    ];
  }

  setupElements() {
    this.backdrop = document.getElementById('legal-backdrop');
    this.modal = document.getElementById('legal-modal');
    this.dialog = this.modal ? this.modal.querySelector('.legal-dialog') : null;
    this.closeBtn = document.getElementById('legal-close');
    this.panelTitle = document.getElementById('panel-title');

    // Initialize empty tabs array, will be populated after content loads
    this.tabs = [];
  }

  initEventListeners() {
    // Close modal events
    if (this.backdrop) {
      this.backdrop.addEventListener('click', (e) => {
        e.preventDefault();
        this.closeModal();
      });
    }
    
    if (this.closeBtn) {
      this.closeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        this.closeModal();
      });
    }
    
    // Mobile navigation toggle
    const navToggle = document.getElementById('legal-nav-toggle');
    if (navToggle) {
      navToggle.addEventListener('click', (e) => {
        e.preventDefault();
        this.showMobileNavigation();
      });
    }

    // ESC key to close
    this.escKeyHandler = (e) => {
      if (this.modal && this.modal.getAttribute('aria-hidden') === 'false' && e.key === 'Escape') {
        e.preventDefault();
        this.closeModal();
      }
    };
    document.addEventListener('keydown', this.escKeyHandler);

    // Tab navigation
    this.tabs.forEach(tab => {
      if (tab.btn) {
        tab.btn.addEventListener('click', () => {
          const key = tab.btn.id.replace('btn-', '');
          this.selectTab(key);
        });

        // Keyboard navigation
        tab.btn.addEventListener('keydown', (e) => {
          const i = this.tabs.findIndex(x => x.btn === tab.btn);
          if (e.key === 'ArrowRight') {
            this.tabs[(i + 1) % this.tabs.length].btn.focus();
          }
          if (e.key === 'ArrowLeft') {
            this.tabs[(i - 1 + this.tabs.length) % this.tabs.length].btn.focus();
          }
        });
      }
    });

    // Footer triggers
    this.setupFooterTriggers();
  }

  setupFooterTriggers() {
    // Update existing footer links to use modal
    const footerLinks = document.querySelectorAll('.legal-link');
    footerLinks.forEach(link => {
      const href = link.getAttribute('href');
      let section = 'privacy'; // default

      if (href && href.includes('terms-of-use')) section = 'terms';
      else if (href && href.includes('cookies-policy')) section = 'cookies';
      else if (href && href.includes('gdpr')) section = 'gdpr';

      link.setAttribute('data-legal-open', section);
      link.addEventListener('click', async (e) => {
        e.preventDefault();
        await this.openModal(section);
      });
    });
  }

  async openModal(which = 'privacy') {
    // Create modal if it doesn't exist
    if (!this.backdrop || !this.modal) {
      await this.createModal();
      this.initEventListeners();
    }
    
    this.lastActive = document.activeElement;
    
    if (this.backdrop) {
      this.backdrop.setAttribute('aria-hidden', 'false');
      this.backdrop.style.display = 'block';
      this.backdrop.style.visibility = 'visible';
      this.backdrop.style.opacity = '1';
    }
    if (this.modal) {
      this.modal.setAttribute('aria-hidden', 'false');
      this.modal.style.pointerEvents = 'auto';
      this.modal.style.display = 'grid';
      this.modal.style.visibility = 'visible';
      this.modal.style.opacity = '1';
    }
    
    document.body.style.overflow = 'hidden';
    document.body.classList.add('modal-open');
    
    // Wait a bit for content to be loaded before selecting tab
    setTimeout(() => {
      this.selectTab(which);
      
      // Focus first control for accessibility
      const targetTab = this.tabs.find(t => t.btn && t.btn.id === 'btn-' + which);
      if (targetTab && targetTab.btn) {
        targetTab.btn.focus();
      }
    }, 200);
  }

  closeModal() {
    // Force close with multiple methods
    try {
      if (this.backdrop) {
        this.backdrop.setAttribute('aria-hidden', 'true');
        this.backdrop.style.display = 'none';
        this.backdrop.style.visibility = 'hidden';
        this.backdrop.style.opacity = '0';
      }
      if (this.modal) {
        this.modal.setAttribute('aria-hidden', 'true');
        this.modal.style.pointerEvents = 'none';
        this.modal.style.display = 'none';
        this.modal.style.visibility = 'hidden';
        this.modal.style.opacity = '0';
      }
      
      document.body.style.overflow = '';
      document.body.classList.remove('modal-open');
      
      if (this.lastActive) {
        this.lastActive.focus();
        this.lastActive = null;
      }
      
      // Remove modal from DOM completely to ensure it's closed
      setTimeout(() => {
        if (this.backdrop && this.backdrop.parentNode) {
          this.backdrop.parentNode.removeChild(this.backdrop);
        }
        if (this.modal && this.modal.parentNode) {
          this.modal.parentNode.removeChild(this.modal);
        }
        this.backdrop = null;
        this.modal = null;
        this.closeBtn = null;
        this.tabs = [];
      }, 300);
      
    } catch (error) {
      console.error('Error closing modal:', error);
      // Force page refresh if all else fails
      location.reload();
    }
  }

  selectTab(key) {
    const idx = this.tabs.findIndex(t => t.btn && t.btn.id === 'btn-' + key);
    
    this.tabs.forEach((t, i) => {
      const active = i === idx;
      if (t.btn) {
        t.btn.setAttribute('aria-selected', active ? 'true' : 'false');
      }
      if (t.panel) {
        t.panel.toggleAttribute('hidden', !active);
      }
      if (active && this.panelTitle) {
        this.panelTitle.textContent = t.title;
      }
    });
  }

  handleHashNavigation() {
    const hash = location.hash?.replace('#', '');
    if (['privacy', 'terms', 'cookies', 'gdpr'].includes(hash)) {
      this.openModal(hash);
    }
  }

  showMobileNavigation() {
    // Create mobile navigation overlay
    const overlay = document.createElement('div');
    overlay.className = 'legal-nav-overlay active';
    
    const menu = document.createElement('div');
    menu.className = 'legal-nav-menu';
    
    menu.innerHTML = `
      <h3>Επιλέξτε ενότητα</h3>
      <button data-section="privacy">Πολιτική Απορρήτου</button>
      <button data-section="terms">Όροι Χρήσης</button>
      <button data-section="cookies">Cookies</button>
      <button data-section="gdpr">GDPR</button>
    `;
    
    overlay.appendChild(menu);
    document.body.appendChild(overlay);
    
    // Add event listeners
    menu.querySelectorAll('button').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const section = e.target.getAttribute('data-section');
        this.selectTab(section);
        overlay.remove();
      });
    });
    
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
        overlay.remove();
      }
    });
  }

  async getContentPanels() {
    // Content files mapping
    const contentFiles = {
      privacy: 'nomimotita/privacy-policy-content.html',
      terms: 'nomimotita/terms-of-use-content.html',
      cookies: 'nomimotita/cookies-policy-content.html',
      gdpr: 'nomimotita/gdpr-content.html'
    };

    // Load content from external files
    const loadedContent = {};
    for (const [key, file] of Object.entries(contentFiles)) {
      try {
        const response = await fetch(file);
        if (response.ok) {
          loadedContent[key] = await response.text();
        } else {
          console.warn(`Could not load ${file}, using fallback content`);
          loadedContent[key] = this.getFallbackContent(key);
        }
      } catch (error) {
        console.warn(`Error loading ${file}:`, error);
        loadedContent[key] = this.getFallbackContent(key);
      }
    }

    return `
      <!-- Privacy Policy Panel -->
      <article id="tab-privacy" class="legal-panel" role="tabpanel" aria-labelledby="btn-privacy">
        ${loadedContent.privacy}
      </article>

      <!-- Terms Panel -->
      <article id="tab-terms" class="legal-panel" role="tabpanel" aria-labelledby="btn-terms" hidden>
        ${loadedContent.terms}
      </article>

      <!-- Cookies Panel -->
      <article id="tab-cookies" class="legal-panel" role="tabpanel" aria-labelledby="btn-cookies" hidden>
        ${loadedContent.cookies}
      </article>

      <!-- GDPR Panel -->
      <article id="tab-gdpr" class="legal-panel" role="tabpanel" aria-labelledby="btn-gdpr" hidden>
        ${loadedContent.gdpr}
      </article>
    `;
  }

  getFallbackContent(type) {
    const fallbacks = {
      privacy: '<div class="meta">Περιεχόμενο μη διαθέσιμο</div><p>Προσπάθεια φόρτωσης περιεχομένου...</p>',
      terms: '<div class="meta">Περιεχόμενο μη διαθέσιμο</div><p>Προσπάθεια φόρτωσης περιεχομένου...</p>',
      cookies: '<div class="meta">Περιεχόμενο μη διαθέσιμο</div><p>Προσπάθεια φόρτωσης περιεχομένου...</p>',
      gdpr: '<div class="meta">Περιεχόμενο μη διαθέσιμο</div><p>Προσπάθεια φόρτωσης περιεχομένου...</p>'
    };
    return fallbacks[type] || '<div class="meta">Σφάλμα φόρτωσης</div>';
  }
}

// Initialize when DOM is loaded
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    window.legalModal = new LegalModal();
  });
} else {
  window.legalModal = new LegalModal();
}