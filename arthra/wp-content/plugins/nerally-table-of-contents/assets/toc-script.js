/**
 * Nerally Table of Contents - JavaScript
 * Handles floating TOC interaction and scroll tracking
 */

(function($) {
  'use strict';

  class NerallyTOC {
    constructor() {
      this.$toggle = $('#nerally-toc-toggle');
      this.$panel = $('#nerally-toc-panel');
      this.$floating = $('#nerally-toc-floating');
      this.$links = $('.toc-item a');
      this.isOpen = false;
      this.headings = [];
      
      this.init();
    }

    init() {
      // Bind events
      this.bindEvents();
      
      // Collect headings for scroll tracking
      this.collectHeadings();
      
      // Initial active state
      this.updateActiveLink();
      
      // Track scroll position
      this.trackScroll();
    }

    bindEvents() {
      // Toggle panel on click
      this.$toggle.on('click', (e) => {
        e.preventDefault();
        this.togglePanel();
      });

      // Close panel when clicking outside
      $(document).on('click', (e) => {
        if (this.isOpen && 
            !this.$floating.is(e.target) && 
            this.$floating.has(e.target).length === 0) {
          this.closePanel();
        }
      });

      // Smooth scroll to section
      this.$links.on('click', (e) => {
        e.preventDefault();
        const targetId = $(e.currentTarget).attr('href');
        this.scrollToSection(targetId);
        this.closePanel();
      });

      // Close on ESC key
      $(document).on('keydown', (e) => {
        if (e.key === 'Escape' && this.isOpen) {
          this.closePanel();
        }
      });
    }

    togglePanel() {
      if (this.isOpen) {
        this.closePanel();
      } else {
        this.openPanel();
      }
    }

    openPanel() {
      this.$floating.addClass('toc-open');
      this.isOpen = true;
      this.$toggle.attr('aria-expanded', 'true');
    }

    closePanel() {
      this.$floating.removeClass('toc-open');
      this.isOpen = false;
      this.$toggle.attr('aria-expanded', 'false');
    }

    scrollToSection(targetId) {
      const $target = $(targetId);
      if ($target.length) {
        // Get WordPress admin bar height if exists
        const adminBarHeight = $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0;
        const offset = 120 + adminBarHeight; // Offset for fixed headers
        const targetPosition = $target.offset().top - offset;
        
        // Stop any ongoing animations first
        $('html, body').stop();
        
        // Smooth scroll with easing
        $('html, body').animate({
          scrollTop: targetPosition
        }, 800, 'easeInOutCubic', function() {
          // Add flash highlight to target heading
          $target.addClass('toc-target-highlight');
          setTimeout(() => $target.removeClass('toc-target-highlight'), 2000);
        });
      }
    }

    collectHeadings() {
      this.headings = [];
      const levels = nerallyTOC.headingLevels || ['h2', 'h3'];
      const selector = levels.map(level => level.toUpperCase()).join(', ');
      
      $(selector).each((index, element) => {
        const $heading = $(element);
        const id = $heading.attr('id');
        
        if (id) {
          this.headings.push({
            id: id,
            $element: $heading,
            top: $heading.offset().top
          });
        }
      });
    }

    updateActiveLink() {
      const scrollPos = $(window).scrollTop() + 150; // Offset for better UX
      let activeId = null;

      // Find which section we're in
      for (let i = this.headings.length - 1; i >= 0; i--) {
        if (scrollPos >= this.headings[i].top) {
          activeId = this.headings[i].id;
          break;
        }
      }

      // Update active class
      this.$links.removeClass('active');
      if (activeId) {
        this.$links.filter(`[href="#${activeId}"]`).addClass('active');
      }
    }

    trackScroll() {
      let ticking = false;

      $(window).on('scroll', () => {
        if (!ticking) {
          window.requestAnimationFrame(() => {
            this.updateActiveLink();
            ticking = false;
          });
          ticking = true;
        }
      });
    }
  }

  // Initialize when DOM is ready
  $(document).ready(() => {
    if ($('#nerally-toc-floating').length) {
      window.nerallyTOCInstance = new NerallyTOC();
    }
  });

})(jQuery);
