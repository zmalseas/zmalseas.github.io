// Navigation Module - Handle all navigation-related functionality

class NavigationManager {
  constructor() {
    this.init();
  }

  init() {
    try {
      // Wait for DOM to be fully ready
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
          this.enhanceAccessibility();
          this.setupEventListeners();
          this.setupMobileMenu();
        });
      } else {
        this.enhanceAccessibility();
        this.setupEventListeners();
        this.setupMobileMenu();
      }
    } catch (error) {
      console.error('Navigation initialization failed:', error);
    }
  }

  setupEventListeners() {
    // Smooth scrolling for anchor links
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

    // Dropdown menu handling
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
      const toggle = dropdown.querySelector('a');
      const submenu = dropdown.querySelector('.submenu');
      
      if (toggle && submenu) {
        toggle.addEventListener('mouseenter', () => {
          submenu.style.display = 'block';
        });
        
        dropdown.addEventListener('mouseleave', () => {
          submenu.style.display = 'none';
        });
      }
    });
  }

  setupMobileMenu() {
    const hamburger = document.querySelector('.hamburger');
    const overlay = document.querySelector('.overlay');
    
    if (!hamburger || !overlay) {
      console.log('Missing mobile menu elements:', { hamburger: !!hamburger, overlay: !!overlay });
      return;
    }
    
    // Setup dynamic navigation overflow detection
    this.setupNavigationOverflow();
    
    try {
      // Toggle mobile menu
      const toggleMenu = (e) => {
        e.preventDefault();
        console.log('Hamburger clicked');
        hamburger.classList.toggle('active');
        overlay.classList.toggle('open');
        document.body.classList.toggle('menu-open');
        hamburger.setAttribute('aria-expanded', overlay.classList.contains('open') ? 'true' : 'false');
        console.log('Menu toggled. Open:', overlay.classList.contains('open'));
      };
      hamburger.addEventListener('click', toggleMenu);
      hamburger.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') toggleMenu(e);
      });

      // Close menu when clicking outside
      overlay.addEventListener('click', (e) => {
        if (e.target.classList.contains('overlay')) {
          this.closeMobileMenu();
        }
      });

      // Handle submenu toggles
      overlay.querySelectorAll('.menu-item .menu-toggle').forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          const currentMenuItem = btn.closest('.menu-item');
          const isCurrentlyOpen = currentMenuItem.classList.contains('open');

          // Close all menu items first
          overlay.querySelectorAll('.menu-item').forEach(item => {
            item.classList.remove('open');
            const t = item.querySelector('.menu-toggle');
            if (t) t.setAttribute('aria-expanded', 'false');
          });

          // If the clicked item wasn't open, open it
          if (!isCurrentlyOpen) {
            currentMenuItem.classList.add('open');
            btn.setAttribute('aria-expanded', 'true');
          }
        });
      });
      
      // Close overlay when window resizes above mobile breakpoint
      window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && overlay.classList.contains('open')) {
          this.closeMobileMenu();
        }
      });
    } catch (error) {
      console.error('Mobile menu setup failed:', error);
    }
  }

  closeMobileMenu() {
    const hamburger = document.querySelector('.hamburger');
    const overlay = document.querySelector('.overlay');

    if (hamburger) hamburger.classList.remove('active');
    if (overlay) overlay.classList.remove('open');
    document.body.classList.remove('menu-open');
    if (hamburger) hamburger.setAttribute('aria-expanded', 'false');
    
    // Restore body scroll
    document.body.style.removeProperty('position');
    document.body.style.removeProperty('width');
    document.body.style.removeProperty('height');
  }

  setupNavigationOverflow() {
    const checkOverflow = () => {
      const header = document.querySelector('.site-header');
      const navLinks = document.querySelector('.nav-links');
      
      if (!header || !navLinks) return;
      
      // ΑΠΛΗ ΛΟΓΙΚΗ: Αν το παράθυρο < 1100px, δείξε hamburger
      const windowWidth = window.innerWidth;
      
      if (windowWidth < 1100) {
        header.classList.add('nav-overflow');
        console.log('📱 Small screen detected - showing hamburger');
      } else {
        header.classList.remove('nav-overflow');
        console.log('🖥️ Large screen detected - showing nav links');
      }
    };
    
    // Έλεγχος στο resize
    window.addEventListener('resize', checkOverflow);
    
    // Άμεσος έλεγχος
    checkOverflow();
  }

  enhanceAccessibility() {
    try {
      const nav = document.querySelector('nav.primary');
      const hamburger = document.querySelector('.hamburger');
      if (nav) nav.setAttribute('role', 'navigation');
      if (hamburger) {
        hamburger.setAttribute('role', 'button');
        hamburger.setAttribute('aria-controls', 'mobile-overlay-menu');
        hamburger.setAttribute('aria-expanded', 'false');
      }
      const overlay = document.querySelector('.overlay');
      if (overlay) overlay.setAttribute('id', 'mobile-overlay-menu');

      // Dropdown toggles
      document.querySelectorAll('.dropdown > a, .menu-toggle').forEach(el => {
        el.setAttribute('aria-haspopup', 'true');
        el.setAttribute('aria-expanded', 'false');
      });
    } catch (_) { /* no-op */ }
  }
}

// Export for use in other modules and make available globally
if (typeof module !== 'undefined' && module.exports) {
  module.exports = NavigationManager;
} else {
  window.NavigationManager = NavigationManager;
}

// Auto-initialize when loaded directly (not via app.js)
if (typeof window !== 'undefined' && !window.APP_LOADED && !window.navigationInitialized) {
  document.addEventListener('DOMContentLoaded', () => {
    new NavigationManager();
    window.navigationInitialized = true;
  });
}
