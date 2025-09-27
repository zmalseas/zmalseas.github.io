// Modern App.js with integrated modules

// Main App Class
class NerallyApp {
  constructor() {
    this.isInitialized = false;
    this.init();
  }

  async init() {
    try {
      console.log('🚀 Initializing Nerally App...');
      
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
      // Initialize error handling first
      this.initializeErrorHandler();
      
      // Initialize core modules
      await this.loadPartials();
      this.initializeNavigation();
      this.initializeChatWidget();
      this.initializeCalculators();
      this.initializePerformanceOptimizations();
      this.initializeSecurity();
      
      // Initialize advanced modules
      this.initializeImageOptimizer();
      this.initializePerformanceMonitor();
      this.initializeSchemaManager();
      this.initializeServiceWorker();
      
      this.isInitialized = true;
      console.log('✅ Nerally App initialized successfully');
      
      // Dispatch custom event for other scripts
      document.dispatchEvent(new CustomEvent('nerally:app:ready'));
      
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

  fixFooterPaths(isInSubfolder) {
    if (!isInSubfolder) return; // No need to fix if we're at root
    
    const footerEl = document.getElementById("site-footer");
    if (!footerEl) return;
    
    // Fix all relative links to add ../
    const links = footerEl.querySelectorAll('a[href]');
    links.forEach(link => {
      const href = link.getAttribute('href');
      // Skip external links, anchors, and already fixed links
      if (href && !href.startsWith('http') && !href.startsWith('#') && !href.startsWith('../') && !href.startsWith('/')) {
        link.setAttribute('href', '../' + href);
      }
    });
    
    // Fix image sources if any
    const images = footerEl.querySelectorAll('img[src]');
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

    try {
      const currentPath = window.location.pathname;
      const isInSubfolder = this.isInSubfolder(currentPath);
      const basePath = isInSubfolder ? "../" : "";
      
      const response = await fetch(`${basePath}partials/footer.html`);
      if (response.ok) {
        footerEl.innerHTML = await response.text();
        // Fix paths after loading footer
        this.fixFooterPaths(isInSubfolder);
      } else {
        throw new Error(`Failed to load footer: ${response.status}`);
      }
    } catch (error) {
      console.warn('Footer loading failed:', error.message);
    }

    // Set current year
    const yearEl = document.getElementById('y');
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
        // Initialize NavigationManager after loading
        if (typeof NavigationManager !== 'undefined' && !window.navigationInitialized) {
          new NavigationManager();
          window.navigationInitialized = true;
          console.log('🧭 NavigationManager initialized');
        } else {
          console.warn('NavigationManager class not found or already initialized');
        }
      };
      script.onerror = () => {
        console.warn('⚠️ Navigation module not loaded');
      };
      document.head.appendChild(script);
    } catch (error) {
      console.error('Navigation initialization failed:', error);
    }
  }

  initializeChatWidget() {
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
        console.warn('⚠️ Chat widget not loaded');
      };
      document.head.appendChild(script);
    } catch (error) {
      console.error('Chat widget initialization failed:', error);
    }
  }

  initializeCalculators() {
    // Calculator initialization would go here
    console.log('🧮 Calculator modules ready');
  }

  initializePerformanceOptimizations() {
    this.setupLazyLoading();
  }

  setupLazyLoading() {
    if ('IntersectionObserver' in window) {
      const lazyImages = document.querySelectorAll('[data-src]');
      const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
            observer.unobserve(img);
          }
        });
      });

      lazyImages.forEach(img => imageObserver.observe(img));
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
    console.log('🔒 Basic security fallback active');
  }

  initializeErrorHandler() {
    try {
      const currentPath = window.location.pathname;
      const isInSubfolder = this.isInSubfolder(currentPath);
      const basePath = isInSubfolder ? "../" : "./";
      
      const script = document.createElement('script');
      script.src = basePath + 'js/error-handler.js';
      script.onload = () => {
        console.log('🚨 Error handler module loaded');
        if (window.ErrorHandler) {
          new ErrorHandler();
        }
      };
      script.onerror = () => {
        console.warn('⚠️ Error handler not loaded - using basic error handling');
      };
      document.head.appendChild(script);
    } catch (error) {
      console.error('Error handler initialization failed:', error);
    }
  }

  initializeImageOptimizer() {
    try {
      const currentPath = window.location.pathname;
      const isInSubfolder = this.isInSubfolder(currentPath);
      const basePath = isInSubfolder ? "../" : "./";
      
      const script = document.createElement('script');
      script.src = basePath + 'js/image-optimizer.js';
      script.onload = () => {
        console.log('🖼️ Image optimizer module loaded');
        if (window.ImageOptimizer) {
          new ImageOptimizer();
        }
      };
      script.onerror = () => {
        console.warn('⚠️ Image optimizer not loaded');
      };
      document.head.appendChild(script);
    } catch (error) {
      console.error('Image optimizer initialization failed:', error);
    }
  }

  initializePerformanceMonitor() {
    try {
      const currentPath = window.location.pathname;
      const isInSubfolder = this.isInSubfolder(currentPath);
      const basePath = isInSubfolder ? "../" : "./";
      
      const script = document.createElement('script');
      script.src = basePath + 'js/performance-monitor.js';
      script.onload = () => {
        console.log('📊 Performance monitor module loaded');
        if (window.PerformanceMonitor) {
          new PerformanceMonitor();
        }
      };
      script.onerror = () => {
        console.warn('⚠️ Performance monitor not loaded');
      };
      document.head.appendChild(script);
    } catch (error) {
      console.error('Performance monitor initialization failed:', error);
    }
  }

  initializeSchemaManager() {
    try {
      const currentPath = window.location.pathname;
      const isInSubfolder = this.isInSubfolder(currentPath);
      const basePath = isInSubfolder ? "../" : "./";
      
      const script = document.createElement('script');
      script.src = basePath + 'js/schema-manager.js';
      script.onload = () => {
        console.log('🏷️ Schema manager module loaded');
        if (window.SchemaManager) {
          new SchemaManager();
        }
      };
      script.onerror = () => {
        console.warn('⚠️ Schema manager not loaded');
      };
      document.head.appendChild(script);
    } catch (error) {
      console.error('Schema manager initialization failed:', error);
    }
  }

  initializeServiceWorker() {
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', async () => {
        try {
          const currentPath = window.location.pathname;
          const isInSubfolder = this.isInSubfolder(currentPath);
          const swPath = isInSubfolder ? '../sw.js' : './sw.js';
          
          const registration = await navigator.serviceWorker.register(swPath);
          console.log('🔄 Service Worker registered successfully:', registration);
          
          // Listen for updates
          registration.addEventListener('updatefound', () => {
            console.log('🔄 Service Worker update found');
          });
          
        } catch (error) {
          console.warn('⚠️ Service Worker registration failed:', error);
        }
      });
    } else {
      console.warn('⚠️ Service Worker not supported');
    }
  }

  isInSubfolder(currentPath) {
    return currentPath.includes('/arthra/') || 
           currentPath.includes('/etairia/') || 
           currentPath.includes('/ipiresies/') || 
           currentPath.includes('/efarmoges/') || 
           currentPath.includes('/epikoinonia/') || 
           currentPath.includes('/nomimotita/') || 
           currentPath.includes('/css/') || 
           currentPath.includes('/js/') ||
           (currentPath.split('/').length > 2 && !currentPath.endsWith('/'));
  }

  showSimpleError() {
    console.warn('Using minimal fallback for critical component');
  }

  showError(message) {
    console.error('App Error:', message);
    // Error handling would be implemented here
  }
}

// Initialize the app
const app = new NerallyApp();

// Export for global access if needed
window.NerallyApp = app;
