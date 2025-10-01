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

  createModal() {
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
            <button class="legal-close" id="legal-close" aria-label="Κλείσιμο">×</button>
          </header>
          <div class="legal-scroll">
            ${this.getContentPanels()}
          </div>
        </section>
      </div>
    `;

    // Add to DOM
    document.body.appendChild(backdrop);
    document.body.appendChild(modal);

    this.setupElements();
  }

  setupElements() {
    this.backdrop = document.getElementById('legal-backdrop');
    this.modal = document.getElementById('legal-modal');
    this.dialog = this.modal.querySelector('.legal-dialog');
    this.closeBtn = document.getElementById('legal-close');
    this.panelTitle = document.getElementById('panel-title');

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

  initEventListeners() {
    // Close modal events
    if (this.backdrop) {
      this.backdrop.addEventListener('click', () => this.closeModal());
    }
    
    if (this.closeBtn) {
      this.closeBtn.addEventListener('click', () => this.closeModal());
    }

    // ESC key to close
    document.addEventListener('keydown', (e) => {
      if (this.modal && this.modal.getAttribute('aria-hidden') === 'false' && e.key === 'Escape') {
        this.closeModal();
      }
    });

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
      link.addEventListener('click', (e) => {
        e.preventDefault();
        this.openModal(section);
      });
    });
  }

  openModal(which = 'privacy') {
    // Create modal if it doesn't exist
    if (!this.backdrop || !this.modal) {
      this.createModal();
      this.initEventListeners();
    }
    
    this.lastActive = document.activeElement;
    
    if (this.backdrop) this.backdrop.setAttribute('aria-hidden', 'false');
    if (this.modal) this.modal.setAttribute('aria-hidden', 'false');
    
    document.body.style.overflow = 'hidden';
    this.selectTab(which);
    
    // Focus first control for accessibility
    setTimeout(() => {
      const targetTab = this.tabs.find(t => t.btn && t.btn.id === 'btn-' + which);
      if (targetTab && targetTab.btn) {
        targetTab.btn.focus();
      }
    }, 100);
  }

  closeModal() {
    if (this.backdrop) this.backdrop.setAttribute('aria-hidden', 'true');
    if (this.modal) this.modal.setAttribute('aria-hidden', 'true');
    
    document.body.style.overflow = '';
    
    if (this.lastActive) {
      this.lastActive.focus();
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

  getContentPanels() {
    return `
      <!-- Privacy Policy Panel -->
      <article id="tab-privacy" class="legal-panel" role="tabpanel" aria-labelledby="btn-privacy">
        <div class="meta">Τελευταία ενημέρωση: 1 Οκτωβρίου 2025</div>
        <p>
          Η <strong>Nerally</strong> ενεργεί ως <em>Υπεύθυνος Επεξεργασίας</em> για δεδομένα προσωπικού χαρακτήρα
          που συλλέγονται νόμιμα μέσω του ιστότοπου και στο πλαίσιο παροχής υπηρεσιών (πελάτες, συνεργάτες, υποψήφιοι).
          Η ιδιωτικότητα και η ακεραιότητά σας είναι κρίσιμες για εμάς· εφαρμόζουμε την ισχύουσα νομοθεσία (GDPR,
          Ν. 4624/2019, Ν. 3471/2006).
        </p>
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
        <p>Πρόσβαση, διόρθωση, διαγραφή, περιορισμός, φορητότητα, εναντίωση, ανάκληση συγκατάθεσης· καταγγελία στην ΑΠΔΠΧ (www.dpa.gr).
           Αιτήματα στο <a href="mailto:info@nerally.gr">info@nerally.gr</a>.</p>

        <h3>Ασφάλεια</h3>
        <p>RBAC, ελάχιστα δικαιώματα, κρυπτογράφηση σε μεταφορά, καταγραφή συμβάντων, περιοδικοί έλεγχοι.</p>
      </article>

      <!-- Terms Panel -->
      <article id="tab-terms" class="legal-panel" role="tabpanel" aria-labelledby="btn-terms" hidden>
        <div class="meta">Τελευταία ενημέρωση: 1 Οκτωβρίου 2025</div>
        <p>Με την πρόσβαση στο nerally.gr αποδέχεστε τους παρόντες όρους. Οι πληροφορίες είναι γενικής φύσης και
           δεν αποτελούν συμβουλή. Πνευματική ιδιοκτησία: προστασία από ελληνικό/ευρωπαϊκό δίκαιο· απαγορεύεται
           αναπαραγωγή χωρίς άδεια.</p>
        <h3>Αποδεκτή χρήση</h3>
        <ul>
          <li>Απαγορεύεται παράνομη χρήση, παρεμβολή στη λειτουργία ή μη εξουσιοδοτημένη πρόσβαση.</li>
          <li>Σεβασμός δικαιωμάτων τρίτων και προσωπικών δεδομένων.</li>
        </ul>
        <h3>Περιορισμός ευθύνης</h3>
        <p>Δεν φέρουμε ευθύνη για έμμεσες/παρεπόμενες ζημίες στο μέτρο που ο νόμος επιτρέπει. Δίκαιο: ελληνικό — αρμόδια Δικαστήρια Αθηνών.</p>
      </article>

      <!-- Cookies Panel -->
      <article id="tab-cookies" class="legal-panel" role="tabpanel" aria-labelledby="btn-cookies" hidden>
        <div class="meta">Τελευταία ενημέρωση: 1 Οκτωβρίου 2025</div>
        <h3>Τι είναι cookie</h3>
        <p>Μικρό αρχείο κειμένου που βοηθά τη λειτουργία ιστοσελίδων. Μπορείτε να τα απενεργοποιήσετε από τον φυλλομετρητή σας.</p>
        <h3>Τι χρησιμοποιούμε</h3>
        <ul>
          <li><strong>Google Tag Manager (GTM):</strong> εργαλείο διαχείρισης ετικετών. Δεν τοποθετεί cookies από μόνο του.</li>
        </ul>
        <p>Αν προστεθούν στο μέλλον analytics/marketing cookies, θα ζητήσουμε συγκατάθεση βάσει ePrivacy/Ν.3471/2006.</p>
      </article>

      <!-- GDPR Panel -->
      <article id="tab-gdpr" class="legal-panel" role="tabpanel" aria-labelledby="btn-gdpr" hidden>
        <div class="meta">Τελευταία ενημέρωση: 1 Οκτωβρίου 2025</div>
        <h3>Δικαιώματα υποκειμένων</h3>
        <ul>
          <li>Πρόσβαση, διόρθωση, διαγραφή, περιορισμός, φορητότητα, εναντίωση, ανάκληση συγκατάθεσης.</li>
          <li>Καταγγελία στην ΑΠΔΠΧ — Κηφισίας 1–3, 115 23 Αθήνα, τηλ. +30 210 6475600, complaints@dpa.gr.</li>
        </ul>
        <h3>Παραβιάσεις &amp; συμμόρφωση</h3>
        <p>Κοινοποίηση παραβιάσεων στην ΑΠΔΠΧ εντός 72 ωρών όπου απαιτείται· ενημέρωση υποκειμένων όταν υπάρχει υψηλός κίνδυνος.</p>
      </article>
    `;
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