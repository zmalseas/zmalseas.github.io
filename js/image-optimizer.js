// Image Optimization Module - WebP support and lazy loading

class ImageOptimizer {
  constructor() {
    this.webpSupported = null;
    this.lazyLoadObserver = null;
    this.init();
  }

  async init() {
    try {
      // Check WebP support
      this.webpSupported = await this.checkWebPSupport();
      
      // Initialize lazy loading
      this.initLazyLoading();
      
      // Replace existing images with optimized versions
      this.optimizeExistingImages();
      
      console.log('🖼️ Image optimization initialized');
    } catch (error) {
      console.error('Image optimization failed:', error);
    }
  }

  async checkWebPSupport() {
    return new Promise((resolve) => {
      const webP = new Image();
      webP.onload = webP.onerror = () => {
        resolve(webP.height === 2);
      };
      webP.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
    });
  }

  initLazyLoading() {
    if ('IntersectionObserver' in window) {
      this.lazyLoadObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            this.loadImage(entry.target);
            this.lazyLoadObserver.unobserve(entry.target);
          }
        });
      }, {
        rootMargin: '50px 0px',
        threshold: 0.01
      });

      // Observe all lazy images
      document.querySelectorAll('img[data-src], img[loading="lazy"]').forEach(img => {
        this.lazyLoadObserver.observe(img);
      });
    } else {
      // Fallback for older browsers
      this.loadAllImages();
    }
  }

  loadImage(img) {
    // Create loading indicator
    this.showImageLoading(img);

    // Determine best image source
    const optimizedSrc = this.getOptimizedImageSrc(img);
    
    // Create new image for preloading
    const newImg = new Image();
    
    newImg.onload = () => {
      // Replace src and show image
      img.src = optimizedSrc;
      img.classList.remove('lazy-loading');
      img.classList.add('lazy-loaded');
      this.hideImageLoading(img);

      // Trigger fade-in animation
      requestAnimationFrame(() => {
        img.style.opacity = '1';
      });
    };

    newImg.onerror = () => {
      // Fallback to original image
      const fallbackSrc = img.dataset.src || img.src;
      img.src = fallbackSrc;
      img.classList.remove('lazy-loading');
      img.classList.add('lazy-error');
      this.hideImageLoading(img);
      console.warn('Failed to load optimized image:', optimizedSrc);
    };

    // Start loading
    newImg.src = optimizedSrc;
  }

  getOptimizedImageSrc(img) {
    const originalSrc = img.dataset.src || img.src;
    
    if (!this.webpSupported || !originalSrc) {
      return originalSrc;
    }

    // Convert PNG to WebP if available
    if (originalSrc.includes('Hero1.png')) {
      return originalSrc.replace('Hero1.png', 'Hero1_enhanced.webp');
    }
    if (originalSrc.includes('Hero2.png')) {
      return originalSrc.replace('Hero2.png', 'Hero2_enhanced.webp');
    }
    if (originalSrc.includes('Hero3.png')) {
      return originalSrc.replace('Hero3.png', 'Hero3_enhanced.webp');
    }
    if (originalSrc.includes('Foros_enoikiwn.png')) {
      return originalSrc.replace('Foros_enoikiwn.png', 'Foros_enoikiwn_enhanced.webp');
    }

    return originalSrc;
  }

  showImageLoading(img) {
    img.classList.add('lazy-loading');
    
    // Add loading overlay if not exists
    if (!img.nextElementSibling?.classList.contains('image-loading-overlay')) {
      const overlay = document.createElement('div');
      overlay.className = 'image-loading-overlay';
      overlay.innerHTML = '<div class="loading-spinner"></div>';
      img.parentNode.insertBefore(overlay, img.nextSibling);
    }
  }

  hideImageLoading(img) {
    const overlay = img.nextElementSibling;
    if (overlay?.classList.contains('image-loading-overlay')) {
      overlay.remove();
    }
  }

  optimizeExistingImages() {
    // Convert existing hero background images to WebP
    if (this.webpSupported) {
      const heroSection = document.querySelector('.hero-fullscreen');
      if (heroSection) {
        const currentBg = getComputedStyle(heroSection).backgroundImage;
        if (currentBg.includes('Hero1.png')) {
          heroSection.style.backgroundImage = currentBg.replace('Hero1.png', 'Hero1_enhanced.webp');
        }
      }

      // Optimize other background images
      const elements = document.querySelectorAll('[style*="background-image"]');
      elements.forEach(el => {
        const style = el.style.backgroundImage;
        if (style.includes('Hero2.png')) {
          el.style.backgroundImage = style.replace('Hero2.png', 'Hero2_enhanced.webp');
        }
        if (style.includes('Hero3.png')) {
          el.style.backgroundImage = style.replace('Hero3.png', 'Hero3_enhanced.webp');
        }
      });
    }
  }

  loadAllImages() {
    // Fallback for browsers without IntersectionObserver
    document.querySelectorAll('img[data-src]').forEach(img => {
      this.loadImage(img);
    });
  }

  // Public method to manually trigger lazy loading
  loadLazyImages() {
    if (this.lazyLoadObserver) {
      document.querySelectorAll('img[data-src]').forEach(img => {
        this.loadImage(img);
      });
    }
  }

  // Helper method to create responsive image tags
  static createResponsiveImage(baseName, alt, className = '', loading = 'lazy') {
    const webpSupported = 'webp' in document.createElement('canvas').getContext('2d');
    
    return `
      <picture class="${className}">
        <source srcset="images/${baseName}_enhanced.webp" type="image/webp">
        <source srcset="images/${baseName}.png" type="image/png">
        <img src="images/${baseName}.png" 
             alt="${alt}" 
             loading="${loading}"
             class="responsive-image"
             style="opacity: 0; transition: opacity 0.3s ease;">
      </picture>
    `;
  }
}

// Initialize image optimization
const imageOptimizer = new ImageOptimizer();

// Make it globally available
window.imageOptimizer = imageOptimizer;

export default ImageOptimizer;