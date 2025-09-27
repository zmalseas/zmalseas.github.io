// Navigation Module - Handle all navigation-related functionality

class NavigationManager {
  constructor() {
    this.init();
  }

  init() {
    try {
      this.setupEventListeners();
      this.setupMobileMenu();
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
      hamburger.addEventListener('click', (e) => {
        e.preventDefault();
        console.log('Hamburger clicked');
        hamburger.classList.toggle('active');
        overlay.classList.toggle('open');
        document.body.classList.toggle('menu-open');
        console.log('Menu toggled. Open:', overlay.classList.contains('open'));
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
          });
          
          // If the clicked item wasn't open, open it
          if (!isCurrentlyOpen) {
            currentMenuItem.classList.add('open');
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
  }

  setupNavigationOverflow() {
    const checkNavigationOverflow = () => {
      const header = document.querySelector('.site-header');
      const navLinks = document.querySelector('.nav-links');
      const brand = document.querySelector('.brand'); // Fixed selector
      
      if (!header || !navLinks || !brand) {
        console.log('Missing elements:', { header: !!header, navLinks: !!navLinks, brand: !!brand });
        return;
      }
      
      const headerWidth = header.offsetWidth;
      const brandWidth = brand.offsetWidth;
      const navLinksWidth = navLinks.scrollWidth;
      const hamburgerWidth = 60; // Account for hamburger button space
      const padding = 40; // Extra padding for safety
      
      const availableSpace = headerWidth - brandWidth - hamburgerWidth - padding;
      
      console.log('Navigation check:', {
        headerWidth,
        brandWidth,
        navLinksWidth,
        availableSpace,
        needsOverflow: navLinksWidth > availableSpace
      });
      
      if (navLinksWidth > availableSpace) {
        header.classList.add('nav-overflow');
        console.log('Added nav-overflow class');
      } else {
        header.classList.remove('nav-overflow');
        console.log('Removed nav-overflow class');
        // Close menu if it was open and now there's space
        if (document.querySelector('.overlay.open')) {
          this.closeMobileMenu();
        }
      }
    };
    
    // Check on load and resize
    checkNavigationOverflow();
    window.addEventListener('resize', checkNavigationOverflow);
    
    // Also check after fonts load
    document.fonts.ready.then(checkNavigationOverflow);
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