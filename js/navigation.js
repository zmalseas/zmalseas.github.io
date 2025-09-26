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
    
    if (!hamburger || !overlay) return;
    
    try {
      // Toggle mobile menu
      hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        overlay.classList.toggle('open');
        document.body.classList.toggle('menu-open');
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
  }
}

// Export for use in other modules
export default NavigationManager;