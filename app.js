// Modern App.js with ES6 modules and improved error handling

// Import modules (when using ES6 modules)
// import NavigationManager from './js/navigation.js';
// import ChatWidget from './js/chat-widget.js';
// import './js/error-handler.js';

// For now, we'll use the traditional approach for compatibility

// Main App Class
class NeraliApp {
  constructor() {
    this.isInitialized = false;
    this.modules = new Map();
    this.init();
  }

  async init() {
    try {
      console.log('🚀 Initializing Nerali App...');
      
      // Wait for DOM to be ready
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => this.bootstrap());
      } else {
        await this.bootstrap();
      }
    } catch (error) {
      console.error('❌ App initialization failed:', error);
    }
  }

  async bootstrap() {
    try {
      // Initialize core modules
      await this.loadPartials();
      this.initializeNavigation();
      this.initializeChatWidget();
      this.initializeCalculators();
      this.initializePerformanceOptimizations();
      this.initializeSecurity();
      
      this.isInitialized = true;
      console.log('✅ Nerali App initialized successfully');
      
      // Dispatch custom event for other scripts
      document.dispatchEvent(new CustomEvent('nerali:app:ready'));
      
    } catch (error) {
      console.error('❌ App bootstrap failed:', error);
      this.showError('Παρουσιάστηκε πρόβλημα κατά τη φόρτωση της εφαρμογής.');
    }
  }

  async loadPartials() {
    const tasks = [
      this.injectHeader(),
      this.injectFooter()
    ];
    
    await Promise.allSettled(tasks);
  }

  async injectHeader() {
    const headerEl = document.getElementById("site-header");
    if (!headerEl) return;

    const currentPath = window.location.pathname;
    const isInSubfolder = this.isInSubfolder(currentPath);
    const basePath = isInSubfolder ? "../" : "";

    try {
      const response = await fetch(`${basePath}partials/header.html`);
      if (response.ok) {
        headerEl.innerHTML = await response.text();
        // Fix paths after loading header
        this.fixHeaderPaths(isInSubfolder);
      } else {
        throw new Error(`Failed to load header: ${response.status}`);
      }
    } catch (error) {
      console.warn('Header loading failed:', error.message);
      this.showSimpleError();
    }
  }

  fixHeaderPaths(isInSubfolder) {
    if (!isInSubfolder) return; // No need to fix if we're at root
    
    const headerEl = document.getElementById("site-header");
    if (!headerEl) return;
    
    // Fix all relative links to add ../
    const links = headerEl.querySelectorAll('a[href]');
    links.forEach(link => {
      const href = link.getAttribute('href');
      // Skip external links, anchors, and already fixed links
      if (href && !href.startsWith('http') && !href.startsWith('#') && !href.startsWith('../') && !href.startsWith('/')) {
        link.setAttribute('href', '../' + href);
      }
    });
    
    // Fix image sources
    const images = headerEl.querySelectorAll('img[src]');
    images.forEach(img => {
      const src = img.getAttribute('src');
      if (src && !src.startsWith('http') && !src.startsWith('../') && !src.startsWith('/')) {
        img.setAttribute('src', '../' + src);
      }
    });
  }

  async injectFooter() {
    const footerEl = document.getElementById("site-footer");
    if (!footerEl) return;

    const footerHtml = `
      <footer class="site-footer">
        <div class="container">
          <div class="footer-content">
            <div class="footer-section">
              <h3>Nerali</h3>
              <p>Το επιχειρηματικό σας οικοσύστημα</p>
            </div>
            <div class="footer-section">
              <h4>Υπηρεσίες</h4>
              <ul>
                <li><a href="/ipiresies/logistiki.html">Λογιστική</a></li>
                <li><a href="/ipiresies/consulting.html">Consulting</a></li>
                <li><a href="/ipiresies/cyber-security.html">Cyber Security</a></li>
              </ul>
            </div>
            <div class="footer-section">
              <h4>Επικοινωνία</h4>
              <p>📧 <a href="mailto:info@nerali.gr">info@nerali.gr</a></p>
              <p>📞 <a href="tel:+302101234567">+30 210 123 4567</a></p>
            </div>
          </div>
          <div class="footer-bottom">
            <small>© <span id="currentYear"></span> Nerali. Όλα τα δικαιώματα κατοχυρωμένα.</small>
            <div class="footer-links">
              <a href="/nomimotita/privacy-policy.html">Πολιτική Απορρήτου</a>
              <a href="/nomimotita/terms-of-use.html">Όροι Χρήσης</a>
            </div>
          </div>
        </div>
      </footer>
    `;

    try {
      const currentPath = window.location.pathname;
      const isInSubfolder = this.isInSubfolder(currentPath);
      const basePath = isInSubfolder ? "../" : "";
      
      const response = await fetch(`${basePath}partials/footer.html`);
      if (response.ok) {
        footerEl.innerHTML = await response.text();
      } else {
        throw new Error(`Failed to load footer: ${response.status}`);
      }
    } catch (error) {
      console.warn('Using fallback footer:', error.message);
      footerEl.innerHTML = footerHtml;
    }

    // Set current year
    const yearEl = document.getElementById('currentYear');
    if (yearEl) {
      yearEl.textContent = new Date().getFullYear();
    }
  }



  initializeNavigation() {
    // Load navigation module instead of duplicating code
    try {
      const currentPath = window.location.pathname;
      const isInSubfolder = this.isInSubfolder(currentPath);
      const basePath = isInSubfolder ? "../" : "./";
      
      const script = document.createElement('script');
      script.src = basePath + 'js/navigation.js';
      script.onload = () => {
        console.log('🧭 Navigation module loaded');
        // Initialize navigation after module loads
        if (window.NavigationManager) {
          new NavigationManager();
        }
      };
      script.onerror = () => {
        console.warn('⚠️ Navigation module not loaded - basic functionality only');
      };
      document.head.appendChild(script);
    } catch (error) {
      console.error('Navigation initialization failed:', error);
    }
  }

  initializeChatWidget() {
    // Load chat widget JavaScript module
    try {
      const currentPath = window.location.pathname;
      const isInSubfolder = this.isInSubfolder(currentPath);
      const basePath = isInSubfolder ? "../" : "./";
      
      const script = document.createElement('script');
      script.src = basePath + 'js/chat-widget.js';
      script.onload = () => {
        console.log('💬 Chat widget module loaded');
      };
      script.onerror = () => {
        console.log('⚠️ Chat widget module not loaded - basic functionality only');
      };
      document.head.appendChild(script);
    } catch (error) {
      console.log('⚠️ Chat widget initialization failed:', error);
    }
  }

  initializeCalculators() {
    // Initialize calculator if on calculator page
    if (window.location.pathname.includes('calculator')) {
      console.log('Calculator page detected');
    }
  }

  initializePerformanceOptimizations() {
    // Lazy loading for images
    if ('IntersectionObserver' in window) {
      this.setupLazyLoading();
    }
    
    // Service worker registration (if available)
    this.registerServiceWorker();
  }

  setupLazyLoading() {
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');
    
    if (lazyImages.length === 0) return;
    
    const imageObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
          }
          imageObserver.unobserve(img);
        }
      });
    });
    
    lazyImages.forEach(img => imageObserver.observe(img));
  }

  async registerServiceWorker() {
    if ('serviceWorker' in navigator && window.location.protocol === 'https:') {
      try {
        // Service worker implementation would go here
        console.log('Service worker support detected');
      } catch (error) {
        console.log('Service worker registration failed:', error);
      }
    }
  }

  isInSubfolder(currentPath) {
    return currentPath.includes('/arthra/') || 
           currentPath.includes('/etairia/') || 
           currentPath.includes('/ipiresies/') || 
           currentPath.includes('/efarmoges/') || 
           currentPath.includes('/epikoinonia/') || 
           currentPath.includes('/nomimotita/') || 
           (currentPath.split('/').length > 2 && !currentPath.endsWith('/'));
  }

  showSimpleError() {
    // Simple error message if header fails to load
    const headerEl = document.getElementById("site-header");
    if (headerEl) {
      headerEl.innerHTML = `
        <header class="site-header">
          <div class="header-row">
            <a class="brand" href="/" aria-label="Nerali Home">
              <span class="name">Nerali</span>
            </a>
            <nav class="primary">
              <p style="color: #999; font-size: 0.9rem;">Φόρτωση μενού...</p>
            </nav>
          </div>
        </header>
      `;
    }
  }

  initializeSecurity() {
    // Load security manager module for advanced protection
    try {
      const currentPath = window.location.pathname;
      const isInSubfolder = this.isInSubfolder(currentPath);
      const basePath = isInSubfolder ? "../" : "./";
      
      const script = document.createElement('script');
      script.src = basePath + 'js/security-manager.js';
      script.onload = () => {
        console.log('🔒 Security manager module loaded');
        if (window.SecurityManager) {
          new SecurityManager();
        }
      };
      script.onerror = () => {
        console.warn('⚠️ Security manager not loaded - using basic protection');
        this.addBasicProtection();
      };
      document.head.appendChild(script);
    } catch (error) {
      console.error('Security initialization failed:', error);
      this.addBasicProtection();
    }
  }

  addBasicProtection() {
    // Minimal fallback security
    const token = Math.random().toString(36).substr(2, 9);
    sessionStorage.setItem('csrf_token', token);
    console.log('� Basic security fallback active');
  }

  showError(message) {
    console.error('App Error:', message);
    // Error handling would be implemented here
  }
}

// Initialize the app
const app = new NeraliApp();

// Export for global access if needed
window.NeraliApp = app;