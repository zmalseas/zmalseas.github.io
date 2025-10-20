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
      // Wait for DOM to be ready
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => this.bootstrap());
      } else {
        await this.bootstrap();
      }
    } catch (error) {
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
      // Dispatch custom event for other scripts
      document.dispatchEvent(new CustomEvent('nerally:app:ready'));
    } catch (error) {
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
    }
  }
  initializeChatWidget() {
    // Ensure chat-widget.js is present on static pages too
    try {
      const ensureLoaded = () => {
        // chat-widget.js auto-initializes itself; set a flag to avoid duplicates
        if (!window.chatInitialized) {
          window.chatInitialized = true;
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
    }
  }
  initializeCalculators() {
    // Calculator initialization would go here
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
        if (window.SecurityManager) {
          new SecurityManager();
        }
      };
      script.onerror = () => {
        this.addBasicProtection();
      };
      document.head.appendChild(script);
    } catch (error) {
      this.addBasicProtection();
    }
  }
  addBasicProtection() {
    // Minimal fallback security
    const token = Math.random().toString(36).substr(2, 9);
    sessionStorage.setItem('csrf_token', token);
  }
  initializeErrorHandler() {
    try {
      const script = document.createElement('script');
      script.src = this.origin + '/js/error-handler.js';
      script.onload = () => {
        if (window.ErrorHandler) {
          new ErrorHandler();
        }
      };
      script.onerror = () => {
      };
      document.head.appendChild(script);
    } catch (error) {
    }
  }
  initializeServiceWorker() {
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', async () => {
        try {
          const registration = await navigator.serviceWorker.register('/sw.js');
          // Listen for updates
          registration.addEventListener('updatefound', () => {
          });
        } catch (error) {
        }
      });
    } else {
    }
  }
  showError(message) {
    // Error handling would be implemented here
  }
}
// Initialize the app
const app = new NerallyApp();
// Export for global access if needed
window.NerallyApp = app;
