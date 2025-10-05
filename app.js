// Modern App.js with integrated modules

// Main App Class
class NerallyApp {
  constructor() {
    this.isInitialized = false;
    this.origin = (typeof window !== 'undefined' && window.location && window.location.origin) ? window.location.origin : '';
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
      // Ensure main element has an id for accessibility (skip-link target)
      this.ensureMainId();
      
      // Initialize core modules
      await this.loadPartials();
      this.initializeNavigation();
      this.initializeChatWidget();
      this.initializeCalculators();
      this.initializePerformanceOptimizations();
      this.initializeSecurity();
      
      // Initialize advanced modules
      this.initializeServiceCards();
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

  ensureMainId() {
    try {
      const main = document.querySelector('main');
      if (main && !main.id) {
        main.id = 'main-content';
      }
    } catch (_) {}
  }

  async loadPartials() {
    // Server-side includes now handle header/footer. No client fetch needed.
    return;
  }

  async injectHeader() { return; }

  fixHeaderPaths() { return; }

  fixFooterPaths() { return; }

  async injectFooter() { return; }

  initializeNavigation() {
    // Load navigation module instead of duplicating code
    try {
      const script = document.createElement('script');
      script.src = this.origin + '/js/navigation.js';
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
      const script = document.createElement('script');
      script.src = this.origin + '/js/chat-widget.js';
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
      const script = document.createElement('script');
      script.src = this.origin + '/js/security-manager.js';
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
      const script = document.createElement('script');
      script.src = this.origin + '/js/error-handler.js';
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



  initializeServiceWorker() {
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', async () => {
        try {
          const registration = await navigator.serviceWorker.register('/sw.js');
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

  initializeServiceCards() {
    try {
      const serviceCards = document.querySelectorAll('.service-card');
      
      serviceCards.forEach(card => {
        let isFlipped = false;
        
        card.addEventListener('click', (e) => {
          e.preventDefault();
          
          if (isFlipped) {
            // Flip back to front
            card.querySelector('.service-card-inner').style.transform = 'rotateY(0deg)';
            isFlipped = false;
          } else {
            // Flip to back
            card.querySelector('.service-card-inner').style.transform = 'rotateY(180deg)';
            isFlipped = true;
          }
        });
        
        // Reset flip state on mouse leave (desktop only)
        if (!('ontouchstart' in window)) {
          card.addEventListener('mouseleave', () => {
            card.querySelector('.service-card-inner').style.transform = 'rotateY(0deg)';
            isFlipped = false;
          });
        }
      });
      
      console.log('🎴 Service cards initialized');
    } catch (error) {
      console.error('Service cards initialization failed:', error);
    }
  }
}

// Initialize the app
const app = new NerallyApp();

// Export for global access if needed
window.NerallyApp = app;
