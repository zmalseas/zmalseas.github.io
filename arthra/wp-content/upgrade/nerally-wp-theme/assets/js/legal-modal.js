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
        // Show immediate loading content without any delay
        contentContainer.innerHTML = '<div class="loading-placeholder">Φόρτωση περιεχομένου...</div>';
        
        const contentPanels = await this.getContentPanels();
        contentContainer.innerHTML = contentPanels;
        
        // Re-setup tabs after content is loaded
        this.setupTabElements();
        
        // Initialize event listeners after tabs are setup
        this.initEventListeners();
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
    // Use direct hardcoded content - more reliable than file loading
    const loadedContent = {
      privacy: `
        <div class="meta">Τελευταία ενημέρωση: 1 Οκτωβρίου 2025</div>
        <h2>Πολιτική Απορρήτου</h2>
        <p>Η <strong>Nerally</strong> ενεργεί ως <em>Υπεύθυνος Επεξεργασίας</em> για δεδομένα προσωπικού χαρακτήρα που συλλέγονται νόμιμα μέσω του ιστότοπου και στο πλαίσιο παροχής υπηρεσιών (πελάτες, συνεργάτες, υποψήφιοι). Η ιδιωτικότητα και η ακεραιότητά σας είναι κρίσιμες για εμάς· εφαρμόζουμε την ισχύουσα νομοθεσία (GDPR, Ν. 4624/2019, Ν. 3471/2006).</p>
        
        <h3>Τι δεδομένα συλλέγουμε</h3>
        <ul>
          <li>Στοιχεία επικοινωνίας (όνομα, email, τηλέφωνο, περιεχόμενο μηνυμάτων).</li>
          <li>Στοιχεία συνεργασίας/τιμολόγησης (επωνυμία, ΑΦΜ, έδρα, στοιχεία εκπροσώπου).</li>
          <li>Τεχνικά δεδομένα (IP, browser/OS, χρονικές σημάνσεις, σελίδες/σφάλματα).</li>
          <li>Cookies: μόνο όσα είναι απολύτως απαραίτητα για διαχείριση ετικετών (GTM).</li>
        </ul>
        <p><strong>Δεν</strong> ζητούμε <em>ειδικές κατηγορίες δεδομένων</em>. Παρακαλούμε μην μας αποστέλλετε τέτοια.</p>

        <h3>Σκοποί &amp; νομικές βάσεις</h3>
        <ul>
          <li>Επικοινωνία/παροχή υπηρεσιών — εκτέλεση σύμβασης ή προσυμβατικά μέτρα (άρ. 6(1)(β)).</li>
          <li>Τιμολόγηση/συμμόρφωση — έννομη υποχρέωση (άρ. 6(1)(γ)).</li>
          <li>Ασφάλεια συστημάτων — έννομο συμφέρον (άρ. 6(1)(στ)).</li>
          <li>Ενημερωτικά/marketing — συγκατάθεση (άρ. 6(1)(α)) όπου απαιτείται.</li>
        </ul>

        <h3>Κοινή χρήση &amp; εκτελούντες</h3>
        <p>Δεδομένα διαβιβάζονται μόνο σε παρόχους (hosting, email κ.ά.) με συμβάσεις άρθ. 28 GDPR. Εκτός ΕΟΧ: SCCs/κατάλληλες εγγυήσεις.</p>

        <h3>Διατήρηση</h3>
        <ul>
          <li>Συμβατικά/φορολογικά: έως 10 έτη.</li>
          <li>Αιτήματα επικοινωνίας: έως 24 μήνες.</li>
          <li>Τεχνικά logs: έως 12 μήνες.</li>
        </ul>

        <h3>Δικαιώματα</h3>
        <p>Πρόσβαση, διόρθωση, διαγραφή, περιορισμός, φορητότητα, εναντίωση, ανάκληση συγκατάθεσης· καταγγελία στην ΑΠΔΠΧ (www.dpa.gr). Αιτήματα στο <a href="mailto:info@nerally.gr">info@nerally.gr</a>.</p>

        <h3>Ασφάλεια</h3>
        <p>RBAC, ελάχιστα δικαιώματα, κρυπτογράφηση σε μεταφορά, καταγραφή συμβάντων, περιοδικοί έλεγχοι.</p>
      `,
      
      terms: `
        <div class="meta">Τελευταία ενημέρωση: 1 Οκτωβρίου 2025</div>
        <h2>Όροι Χρήσης</h2>
        <p>Οι παρόντες όροι διέπουν τη χρήση του ιστότοπου www.nerally.gr και των υπηρεσιών της εταιρείας.</p>
        
        <h3>1. Αποδοχή Όρων</h3>
        <p>Με τη χρήση του ιστότοπου, αποδέχεστε πλήρως τους παρόντες όρους. Εάν δεν συμφωνείτε, παρακαλούμε διακόψτε τη χρήση.</p>
        
        <h3>2. Υπηρεσίες</h3>
        <p>Η Nerally παρέχει λογιστικές, φοροτεχνικές και συμβουλευτικές υπηρεσίες. Οι λεπτομέρειες καθορίζονται σε ξεχωριστές συμβάσεις.</p>
        
        <h3>3. Υποχρεώσεις Χρήστη</h3>
        <ul>
          <li>Παροχή ακριβών και πλήρων στοιχείων</li>
          <li>Τήρηση της νομοθεσίας</li>
          <li>Μη κακόβουλη χρήση των υπηρεσιών</li>
        </ul>
        
        <h3>4. Πνευματική Ιδιοκτησία</h3>
        <p>Όλο το περιεχόμενο του ιστότοπου προστατεύεται από δικαιώματα πνευματικής ιδιοκτησίας.</p>
        
        <h3>5. Επικοινωνία</h3>
        <p>Για ερωτήσεις σχετικά με τους όρους: <a href="mailto:info@nerally.gr">info@nerally.gr</a></p>
      `,
      
      cookies: `
        <div class="meta">Τελευταία ενημέρωση: 1 Οκτωβρίου 2025</div>
        <h2>Πολιτική Cookies</h2>
        <p>Ο ιστότοπός μας χρησιμοποιεί cookies για τη βελτίωση της εμπειρίας σας.</p>
        
        <h3>Τι είναι τα Cookies</h3>
        <p>Τα cookies είναι μικρά αρχεία κειμένου που αποθηκεύονται στον υπολογιστή σας όταν επισκέπτεστε ιστότοπους.</p>
        
        <h3>Τύποι Cookies που χρησιμοποιούμε</h3>
        <ul>
          <li><strong>Απαραίτητα Cookies:</strong> Για τη βασική λειτουργία του ιστότοπου</li>
          <li><strong>Ανάλυσης:</strong> Google Analytics για στατιστικά (ανώνυμα)</li>
          <li><strong>Προτιμήσεων:</strong> Για αποθήκευση των επιλογών σας</li>
        </ul>
        
        <h3>Διαχείριση Cookies</h3>
        <p>Μπορείτε να διαχειριστείτε τα cookies από τις ρυθμίσεις του browser σας ή από το banner συγκατάθεσης.</p>
        
        <h3>Επικοινωνία</h3>
        <p>Για ερωτήσεις: <a href="mailto:info@nerally.gr">info@nerally.gr</a></p>
      `,
      
      gdpr: `
        <div class="meta">Τελευταία ενημέρωση: 1 Οκτωβρίου 2025</div>
        <h2>GDPR - Γενικός Κανονισμός Προστασίας Δεδομένων</h2>
        <p>Εφαρμόζουμε πλήρως τον Γενικό Κανονισμό Προστασίας Δεδομένων (EU) 2016/679.</p>
        
        <h3>Τα Δικαιώματά σας</h3>
        <ul>
          <li><strong>Δικαίωμα πρόσβασης:</strong> Ενημέρωση για τα δεδομένα που επεξεργαζόμαστε</li>
          <li><strong>Δικαίωμα διόρθωσης:</strong> Διόρθωση λανθασμένων στοιχείων</li>
          <li><strong>Δικαίωμα διαγραφής:</strong> Διαγραφή των δεδομένων σας</li>
          <li><strong>Δικαίωμα περιορισμού:</strong> Περιορισμός της επεξεργασίας</li>
          <li><strong>Δικαίωμα φορητότητας:</strong> Μεταφορά δεδομένων σε άλλον φορέα</li>
          <li><strong>Δικαίωμα εναντίωσης:</strong> Αντίρρηση στην επεξεργασία</li>
        </ul>
        
        <h3>Νομική Βάση Επεξεργασίας</h3>
        <p>Επεξεργαζόμαστε δεδομένα βάσει:</p>
        <ul>
          <li>Συγκατάθεσης (άρθρο 6.1.α)</li>
          <li>Εκτέλεσης σύμβασης (άρθρο 6.1.β)</li>
          <li>Έννομης υποχρέωσης (άρθρο 6.1.γ)</li>
          <li>Έννομου συμφέροντος (άρθρο 6.1.στ)</li>
        </ul>
        
        <h3>Άσκηση Δικαιωμάτων</h3>
        <p>Για άσκηση των δικαιωμάτων σας, επικοινωνήστε στο <a href="mailto:info@nerally.gr">info@nerally.gr</a></p>
        
        <h3>Καταγγελίες</h3>
        <p>Έχετε δικαίωμα καταγγελίας στην Αρχή Προστασίας Δεδομένων Προσωπικού Χαρακτήρα: <a href="https://www.dpa.gr" target="_blank">www.dpa.gr</a></p>
      `
    };



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
      privacy: `
        <div class="meta">Πολιτική Απορρήτου</div>
        <p>Η Nerally σέβεται την ιδιωτικότητά σας και εφαρμόζει όλες τις απαραίτητες τεχνικές και οργανωτικές μέτρα για την προστασία των προσωπικών σας δεδομένων σύμφωνα με τον GDPR.</p>
        <p>Για λεπτομερείς πληροφορίες, επικοινωνήστε μαζί μας στο <a href="mailto:info@nerally.gr">info@nerally.gr</a>.</p>
      `,
      terms: `
        <div class="meta">Όροι Χρήσης</div>
        <p>Η χρήση του ιστότοπου υπόκειται στους παρόντες όρους. Παρακαλούμε διαβάστε προσεκτικά πριν από τη χρήση των υπηρεσιών μας.</p>
        <p>Για περισσότερες πληροφορίες, επικοινωνήστε μαζί μας στο <a href="mailto:info@nerally.gr">info@nerally.gr</a>.</p>
      `,
      cookies: `
        <div class="meta">Πολιτική Cookies</div>
        <p>Χρησιμοποιούμε cookies μόνο για τη βελτιστοποίηση της εμπειρίας σας στον ιστότοπό μας. Μπορείτε να διαχειριστείτε τις προτιμήσεις σας ανά πάσα στιγμή.</p>
        <p>Για περισσότερες πληροφορίες, επικοινωνήστε μαζί μας στο <a href="mailto:info@nerally.gr">info@nerally.gr</a>.</p>
      `,
      gdpr: `
        <div class="meta">GDPR</div>
        <p>Εφαρμόζουμε πλήρως τον Γενικό Κανονισμό Προστασίας Δεδομένων (GDPR). Έχετε δικαίωμα πρόσβασης, διόρθωσης, διαγραφής και φορητότητας των δεδομένων σας.</p>
        <p>Για άσκηση των δικαιωμάτων σας, επικοινωνήστε μαζί μας στο <a href="mailto:info@nerally.gr">info@nerally.gr</a>.</p>
      `
    };
    return fallbacks[type] || '<div class="meta">Σφάλμα φόρτωσης</div><p>Παρακαλούμε επικοινωνήστε μαζί μας για υποστήριξη.</p>';
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