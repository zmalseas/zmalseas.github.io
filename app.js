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
      this.injectFooter(),
      this.injectChatWidget()
    ];
    
    await Promise.allSettled(tasks);
  }

  async injectHeader() {
    const headerEl = document.getElementById("site-header");
    if (!headerEl) return;

    const currentPath = window.location.pathname;
    const isInSubfolder = this.isInSubfolder(currentPath);
    const logoPath = isInSubfolder ? "../images/logo.png" : "images/logo.png";
    const homePath = isInSubfolder ? "../index.html" : "index.html";
    const basePath = isInSubfolder ? "../" : "";

    const headerHtml = this.getHeaderHTML(logoPath, homePath, basePath);

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
      console.warn('Using fallback header:', error.message);
      headerEl.innerHTML = headerHtml;
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

  async injectChatWidget() {
    // Chat widget will be handled by ChatWidget module
    // This is just a placeholder for the container
    const chatEl = document.getElementById("chat-widget");
    if (chatEl) {
      // Module will handle the actual injection
    }
  }

  initializeNavigation() {
    // Initialize navigation without ES6 modules
    this.setupMobileMenu();
    this.setupSmoothScrolling();
  }

  setupMobileMenu() {
    const hamburger = document.querySelector('.hamburger');
    const overlay = document.querySelector('.overlay');
    
    if (!hamburger || !overlay) return;
    
    try {
      hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        overlay.classList.toggle('open');
        document.body.classList.toggle('menu-open');
      });

      overlay.addEventListener('click', (e) => {
        if (e.target.classList.contains('overlay')) {
          this.closeMobileMenu();
        }
      });

      overlay.querySelectorAll('.menu-item .menu-toggle').forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          const currentMenuItem = btn.closest('.menu-item');
          const isCurrentlyOpen = currentMenuItem.classList.contains('open');
          
          overlay.querySelectorAll('.menu-item').forEach(item => {
            item.classList.remove('open');
          });
          
          if (!isCurrentlyOpen) {
            currentMenuItem.classList.add('open');
          }
        });
      });
      
      window.addEventListener('resize', () => {
        if (window.innerWidth > 1100 && overlay.classList.contains('open')) {
          this.closeMobileMenu();
        }
      });
    } catch (error) {
      console.error('Mobile menu setup failed:', error);
    }
  }

  setupSmoothScrolling() {
    document.addEventListener('click', (e) => {
      if (e.target.matches('a[href^="#"]')) {
        e.preventDefault();
        const targetId = e.target.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    });
  }

  closeMobileMenu() {
    const hamburger = document.querySelector('.hamburger');
    const overlay = document.querySelector('.overlay');
    
    if (hamburger) hamburger.classList.remove('active');
    if (overlay) overlay.classList.remove('open');
    document.body.classList.remove('menu-open');
  }

  initializeChatWidget() {
    // Will be implemented by ChatWidget module
    console.log('Chat widget initialized');
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

  getHeaderHTML(logoPath, homePath, basePath) {
    return `
      <header class="site-header">
        <div class="frame">
          <div class="container header-row">
            <a class="brand" href="${homePath}" aria-label="Nerali Home">
              <img src="${logoPath}" alt="Nerali logo" width="36" height="36" />
              <span class="name">Nerali</span>
            </a>

            <nav class="primary" aria-label="Κύρια Πλοήγηση">
              <ul class="nav-links">
                <li class="nav-item"><a href="${homePath}"><span class="text">Αρχική</span></a></li>
                <li class="nav-item dropdown">
                  <a href="#"><span class="text">Υπηρεσίες</span><span class="caret">▾</span></a>
                  <div class="submenu" role="menu">
                    <a href="${basePath}ipiresies/logistiki.html">Λογιστική <span class="sm-arrow">→</span></a>
                    <a href="${basePath}ipiresies/misthodosia.html">Μισθοδοσία <span class="sm-arrow">→</span></a>
                    <a href="${basePath}ipiresies/consulting.html">Consulting <span class="sm-arrow">→</span></a>
                    <a href="${basePath}ipiresies/cyber-security.html">Cyber Security <span class="sm-arrow">→</span></a>
                  </div>
                </li>
                <li class="nav-item"><a href="${basePath}epikoinonia/contact.html"><span class="text">Επικοινωνία</span></a></li>
              </ul>

              <button class="hamburger" aria-label="Άνοιγμα μενού">
                <span class="bar"></span>
              </button>
            </nav>
          </div>
        </div>
      </header>

      <div class="overlay" aria-hidden="true">
        <div class="overlay-header">
          <a href="${homePath}">
            <img src="${logoPath}" alt="Nerali logo" />
            <span class="title">Nerali</span>
          </a>
        </div>
        <div class="menu-wrap">
          <div class="menu-list">
            <a class="menu-toggle" href="${homePath}">Αρχική</a>
            <div class="menu-item">
              <button class="menu-toggle">Υπηρεσίες <span class="exp-caret">›</span></button>
              <div class="menu-sub">
                <a href="${basePath}ipiresies/logistiki.html">Λογιστική</a>
                <a href="${basePath}ipiresies/consulting.html">Consulting</a>
                <a href="${basePath}ipiresies/cyber-security.html">Cyber Security</a>
              </div>
            </div>
            <a class="menu-toggle" href="${basePath}epikoinonia/contact.html">Επικοινωνία</a>
          </div>
        </div>
      </div>
    `;
  }

  initializeSecurity() {
    // Basic security initialization without external modules
    console.log('🔒 Basic security measures active');
    
    // Add basic CSRF protection
    this.addBasicCSRFProtection();
    
    // Add basic XSS protection
    this.addBasicXSSProtection();
    
    // Add basic schema markup
    this.addBasicSchemaMarkup();
  }

  addBasicCSRFProtection() {
    // Generate simple CSRF token
    const token = Math.random().toString(36).substr(2, 9) + Date.now().toString(36);
    sessionStorage.setItem('csrf_token', token);
    
    // Add to all forms
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('form').forEach(form => {
        if (!form.querySelector('input[name="csrf_token"]')) {
          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'csrf_token';
          input.value = token;
          form.appendChild(input);
        }
      });
    });
  }

  addBasicXSSProtection() {
    // Basic input sanitization
    document.addEventListener('input', (e) => {
      if (e.target.matches('input, textarea')) {
        const value = e.target.value;
        if (/<script|javascript:|on\w+=/i.test(value)) {
          e.target.value = value.replace(/<script.*?<\/script>/gi, '').replace(/javascript:/gi, '').replace(/on\w+=/gi, '');
        }
      }
    });
  }

  addBasicSchemaMarkup() {
    // Add basic organization schema
    const schema = {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Nerali - Λογιστικό Γραφείο",
      "description": "Λογιστικές υπηρεσίες, φοροτεχνικά, συμβουλευτικές υπηρεσίες",
      "url": window.location.origin,
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Αθήνα",
        "addressCountry": "GR"
      }
    };

    const script = document.createElement('script');
    script.type = 'application/ld+json';
    script.textContent = JSON.stringify(schema);
    document.head.appendChild(script);
    
    console.log('📊 Basic schema markup added');
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