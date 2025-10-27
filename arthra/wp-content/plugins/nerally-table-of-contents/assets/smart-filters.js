/**
 * Nerally Smart Filters - Frontend JavaScript
 * Cooperative filtering for Category, Subcategory, Author
 */

(function($) {
  'use strict';

  class NerallySmartFilters {
    constructor() {
      this.$categorySelect = $('#filter-category');
      this.$subcategorySelect = $('#filter-subcategory');
      this.$authorSelect = $('#filter-author');
      
      this.init();
    }

    init() {
      this.bindEvents();
      this.preserveInitialState();
    }

    bindEvents() {
      // Category change
      this.$categorySelect.on('change', (e) => {
        const categoryId = $(e.target).val();
        this.onCategoryChange(categoryId);
      });

      // Author change
      this.$authorSelect.on('change', (e) => {
        const authorId = $(e.target).val();
        this.onAuthorChange(authorId);
      });

      // Subcategory change
      this.$subcategorySelect.on('change', (e) => {
        const subcategoryId = $(e.target).val();
        this.onSubcategoryChange(subcategoryId);
      });
    }

    preserveInitialState() {
      // Store all original options for reset
      this.originalOptions = {
        category: this.$categorySelect.html(),
        subcategory: this.$subcategorySelect.html(),
        author: this.$authorSelect.html()
      };
    }

    onCategoryChange(categoryId) {
      if (!categoryId) {
        // Reset all filters
        this.resetFilters();
        return;
      }

      // Fetch related subcategories and authors
      $.ajax({
        url: nerallyFilters.ajaxUrl,
        type: 'POST',
        data: {
          action: 'nerally_smart_filter',
          nonce: nerallyFilters.nonce,
          filter_type: 'category',
          selected_value: categoryId
        },
        success: (response) => {
          if (response.success) {
            this.updateSubcategories(response.data.subcategories);
            this.updateAuthors(response.data.authors);
          }
        }
      });
    }

    onAuthorChange(authorId) {
      if (!authorId) {
        this.resetFilters();
        return;
      }

      // Fetch categories and subcategories for this author
      $.ajax({
        url: nerallyFilters.ajaxUrl,
        type: 'POST',
        data: {
          action: 'nerally_smart_filter',
          nonce: nerallyFilters.nonce,
          filter_type: 'author',
          selected_value: authorId
        },
        success: (response) => {
          if (response.success) {
            this.updateCategories(response.data.categories);
            this.updateSubcategories(response.data.subcategories);
          }
        }
      });
    }

    onSubcategoryChange(subcategoryId) {
      if (!subcategoryId) {
        return;
      }

      // Fetch parent category and authors
      $.ajax({
        url: nerallyFilters.ajaxUrl,
        type: 'POST',
        data: {
          action: 'nerally_smart_filter',
          nonce: nerallyFilters.nonce,
          filter_type: 'subcategory',
          selected_value: subcategoryId
        },
        success: (response) => {
          if (response.success) {
            if (response.data.category) {
              this.$categorySelect.val(response.data.category);
            }
            this.updateAuthors(response.data.authors);
          }
        }
      });
    }

    updateCategories(categories) {
      const currentVal = this.$categorySelect.val();
      const $select = this.$categorySelect;
      
      // Clear and rebuild options
      $select.find('option:not(:first)').remove();
      
      if (categories && categories.length > 0) {
        categories.forEach(cat => {
          $select.append(`<option value="${cat.id}">${cat.name} (${cat.count})</option>`);
        });
        $select.prop('disabled', false);
      } else {
        $select.html(this.originalOptions.category);
      }
      
      // Restore selection if still valid
      if ($select.find(`option[value="${currentVal}"]`).length) {
        $select.val(currentVal);
      }
    }

    updateSubcategories(subcategories) {
      const $select = this.$subcategorySelect;
      
      // Clear and rebuild
      $select.find('option:not(:first)').remove();
      
      if (subcategories && subcategories.length > 0) {
        subcategories.forEach(subcat => {
          $select.append(`<option value="${subcat.id}">${subcat.name} (${subcat.count})</option>`);
        });
        $select.prop('disabled', false);
      } else {
        $select.prop('disabled', true);
        $select.html('<option value="">Επιλέξτε υποκατηγορία</option>');
      }
    }

    updateAuthors(authors) {
      const $select = this.$authorSelect;
      
      // Clear and rebuild
      $select.find('option:not(:first)').remove();
      
      if (authors && authors.length > 0) {
        authors.forEach(author => {
          $select.append(`<option value="${author.id}">${author.name} (${author.count})</option>`);
        });
        $select.prop('disabled', false);
      } else {
        $select.html(this.originalOptions.author);
      }
    }

    resetFilters() {
      this.$categorySelect.html(this.originalOptions.category).val('');
      this.$subcategorySelect.html(this.originalOptions.subcategory).val('').prop('disabled', true);
      this.$authorSelect.html(this.originalOptions.author).val('');
    }
  }

  // Initialize on DOM ready
  $(document).ready(() => {
    if ($('#filter-category').length) {
      window.nerallySmartFilters = new NerallySmartFilters();
    }
  });

})(jQuery);
