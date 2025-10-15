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
          this.setupServiceCards();
          // Ensure we start in a closed state
          this.closeMobileMenu();
        });
      } else {
        this.enhanceAccessibility();
        this.setupEventListeners();
        this.setupMobileMenu();
        this.setupServiceCards();
        this.closeMobileMenu();
      }
    } catch (error) {
      console.error('Navigation initialization failed:', error);
    }
  }

  setupEventListeners() {
    // Smooth scrolling for anchor links (guard against href="#")
    document.addEventListener('click', (e) => {
      const link = e.target.closest && e.target.closest('a[href^="#"]');
      if (!link) return;

      const href = link.getAttribute('href');
      if (!href || href === '#' || href === '#!') return; // invalid/placeholder anchors

      // Only handle same-page hash links
      if (href.startsWith('#')) {
        e.preventDefault();
        let targetElement = null;
        try {
          // Prefer querySelector with a valid id selector
          targetElement = document.querySelector(href) || document.getElementById(href.slice(1));
        } catch (_) {
          // Fallback if selector is invalid
          targetElement = document.getElementById(href.slice(1));
        }

        if (targetElement) {
          targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
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
  const menuWrap = document.querySelector('.overlay .menu-wrap');
    
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

        if (overlay.classList.contains('open')) {
          // Ensure scroll starts at top
          if (menuWrap) menuWrap.scrollTop = 0;
          // Focus first item for accessibility
          const firstToggle = overlay.querySelector('.menu-list .menu-toggle');
          if (firstToggle) {
            setTimeout(() => firstToggle.focus(), 10);
          }
        }
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

      // Close menu with the header close button (X)
      const closeBtn = overlay.querySelector('.overlay-close');
      if (closeBtn) {
        closeBtn.addEventListener('click', (e) => {
          e.preventDefault();
          this.closeMobileMenu();
        });
      }

      // Handle submenu toggles with auto-scroll into view
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

            // Auto-scroll so the expanded submenu becomes visible in the scroll container
            const submenu = currentMenuItem.querySelector('.menu-sub');
            const container = menuWrap || overlay;
            if (submenu && container) {
              // Ensure styles are applied before measurement
              requestAnimationFrame(() => {
                try {
                  const subRect = submenu.getBoundingClientRect();
                  const contRect = container.getBoundingClientRect();
                  const overflowBelow = subRect.bottom - (contRect.bottom - 12);
                  if (overflowBelow > 0) {
                    container.scrollTop += overflowBelow;
                  } else {
                    // If the toggle button is above view, align it nicely
                    const btnRect = btn.getBoundingClientRect();
                    const overflowAbove = contRect.top + 16 - btnRect.top;
                    if (overflowAbove > 0) {
                      container.scrollTop -= overflowAbove;
                    }
                  }
                } catch (_) { /* no-op */ }
              });
            }
          }
        });
      });
      
      // Close with Escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && overlay.classList.contains('open')) {
          this.closeMobileMenu();
        }
      });

      // Close overlay when window resizes above mobile breakpoint
      window.addEventListener('resize', () => {
        if (window.innerWidth > 1100 && overlay.classList.contains('open')) {
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
  
  // Service Cards Click Handler
  setupServiceCards() {
    try {
      const serviceCards = document.querySelectorAll('.service-card');
      
      serviceCards.forEach((card, index) => {
        const serviceUrls = [
          '/ipiresies/logistiki.php',
          '/ipiresies/misthodosia.php', 
          '/ipiresies/cyber-security.php',
          '/ipiresies/consulting.php',
          '/ipiresies/epixorigiseis.php',
          '/ipiresies/social-media.php'
        ];
        
        if (serviceUrls[index]) {
          card.style.cursor = 'pointer';
          card.addEventListener('click', (e) => {
            e.preventDefault();
            window.location.href = serviceUrls[index];
          });
          
          // Add keyboard support
          card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              window.location.href = serviceUrls[index];
            }
          });
          
          // Make focusable for accessibility
          if (!card.hasAttribute('tabindex')) {
            card.setAttribute('tabindex', '0');
          }
        }
      });
    } catch (error) {
      console.error('Service cards setup failed:', error);
    }
  }
}

// Export for use in other modules and make available globally
if (typeof module !== 'undefined' && module.exports) {
  module.exports = NavigationManager;
} else {
  window.NavigationManager = NavigationManager;
}

// Robust auto-initialization: run on DOMContentLoaded, load, and next tick
(function(){
  if (typeof window === 'undefined') return;

  const safeInit = () => {
    if (window.navigationInitialized) return;
    try {
      new NavigationManager();
      window.navigationInitialized = true;
      console.log('🧭 NavigationManager auto-initialized');
    } catch (e) {
      console.error('Navigation auto-init failed:', e);
    }
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', safeInit, { once: true });
  } else {
    // DOM already interactive/complete
    setTimeout(safeInit, 0);
  }
  // Fallback on full load
  window.addEventListener('load', safeInit, { once: true });
})();
