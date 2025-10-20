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
      this.initializeNavigation(); // ensure nav module present everywhere
      this.initializeChatWidget(); // ensure chat module present everywhere
      this.initializeCalculators();
      this.initializePerformanceOptimizations();
      this.initializeSecurity();
      
      // Initialize advanced modules
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

  initializeNavigation() {
    // Load navigation.js if missing (static pages), otherwise just init
    try {
      const ensureLoaded = () => {
        if (typeof NavigationManager !== 'undefined' && !window.navigationInitialized) {
          new NavigationManager();
          window.navigationInitialized = true;
          console.log('🧭 NavigationManager initialized');
        }
      };

      if (typeof NavigationManager === 'undefined') {
        const src = this.origin + '/js/navigation.js';
        if (!document.querySelector(`script[src="${src}"]`)) {
          const s = document.createElement('script');
          s.src = src;
          s.onload = ensureLoaded;
          s.onerror = () => console.warn('⚠️ navigation.js failed to load');
          document.head.appendChild(s);
        } else {
          // script tag exists; wait a tick
          setTimeout(ensureLoaded, 0);
        }
      } else {
        ensureLoaded();
      }
    } catch (error) {
      console.error('Navigation initialization failed:', error);
    }
  }

  initializeChatWidget() {
    // Ensure chat-widget.js is present on static pages too
    try {
      const ensureLoaded = () => {
        // chat-widget.js auto-initializes itself; set a flag to avoid duplicates
        if (!window.chatInitialized) {
          window.chatInitialized = true;
          console.log('💬 Chat widget script ensured');
        }
      };

      // If chat container exists but widget class not present, load script
      const hasContainer = !!document.getElementById('chat-widget');
      if (hasContainer && typeof window.ChatWidget === 'undefined') {
        const src = this.origin + '/js/chat-widget.js';
        if (!document.querySelector(`script[src="${src}"]`)) {
          const s = document.createElement('script');
          s.src = src;
          s.defer = true;
          s.onload = ensureLoaded;
          s.onerror = () => console.warn('⚠️ chat-widget.js failed to load');
          document.head.appendChild(s);
        } else {
          setTimeout(ensureLoaded, 0);
        }
      } else {
        ensureLoaded();
      }
    } catch (error) {
      console.error('Chat widget initialization check failed:', error);
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

  showError(message) {
    console.error('App Error:', message);
    // Error handling would be implemented here
  }
}

// Initialize the app
const app = new NerallyApp();

// Export for global access if needed
window.NerallyApp = app;
