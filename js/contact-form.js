/**
 * Contact Form Handler with reCAPTCHA v3
 * Handles form submission with enhanced security features
 */

class ContactFormHandler {
  constructor(options = {}) {
    const defaultKey = (window.SITE_CONFIG && window.SITE_CONFIG.RECAPTCHA_SITE) || '6Lcd7dcrAAAAADzfwDc4AG_kN6jKU0-0Fo78NmYx';
    this.siteKey = options.siteKey || defaultKey;
    this.apiUrl = options.apiUrl || '/contact-handler.php';
    this.formSelector = options.formSelector || '.contact-form';
    this.recaptchaLoaded = false;
    
    this.init();
  }

  init() {
    this.loadRecaptcha();
    this.bindFormEvents();
    this.addHoneypot();
  }

  /**
   * Load reCAPTCHA v3 script
   */
  loadRecaptcha() {
    if (document.querySelector('script[src*="recaptcha"]')) {
      this.recaptchaLoaded = true;
      return;
    }

    const script = document.createElement('script');
    script.src = `https://www.google.com/recaptcha/api.js?render=${this.siteKey}`;
    script.onload = () => {
      this.recaptchaLoaded = true;
      console.log('✅ reCAPTCHA loaded successfully');
    };
    script.onerror = () => {
      console.error('❌ Failed to load reCAPTCHA');
    };
    document.head.appendChild(script);
  }

  /**
   * Add honeypot field for bot detection
   */
  addHoneypot() {
    const forms = document.querySelectorAll(this.formSelector);
    forms.forEach(form => {
      if (!form.querySelector('input[name="website"]')) {
        const honeypot = document.createElement('input');
        honeypot.type = 'text';
        honeypot.name = 'website';
        honeypot.style.cssText = 'position:absolute;left:-9999px;top:-9999px;visibility:hidden;';
        honeypot.tabIndex = -1;
        honeypot.setAttribute('autocomplete', 'off');
        form.appendChild(honeypot);
      }
    });
  }

  /**
   * Bind form submission events
   */
  bindFormEvents() {
    const forms = document.querySelectorAll(this.formSelector);
    forms.forEach(form => {
      form.addEventListener('submit', (e) => this.handleSubmit(e));
    });
  }

  /**
   * Handle form submission
   */
  async handleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const submitButton = form.querySelector('[type="submit"]');
    
    try {
      // Disable submit button
      this.setButtonState(submitButton, true, 'Αποστολή...');
      
      // Validate form
      if (!this.validateForm(form)) {
        this.setButtonState(submitButton, false);
        return;
      }

      // Get reCAPTCHA token
      const recaptchaToken = await this.getRecaptchaToken();
      if (!recaptchaToken) {
        this.showError('Σφάλμα reCAPTCHA. Παρακαλώ ανανεώστε τη σελίδα.');
        this.setButtonState(submitButton, false);
        return;
      }

      // Prepare form data
      const formData = this.getFormData(form);
      formData.recaptcha_token = recaptchaToken;

      // Submit form
      const response = await this.submitForm(formData);
      
      if (response.success) {
        this.showSuccess(response.message || 'Το μήνυμά σας στάλθηκε επιτυχώς!');
        form.reset();
        this.clearErrors(form);
      } else {
        this.showError(response.error || 'Σφάλμα κατά την αποστολή.');
        if (response.errors) {
          this.showFieldErrors(form, response.errors);
        }
      }
      
    } catch (error) {
      console.error('Form submission error:', error);
      this.showError('Σφάλμα δικτύου. Παρακαλώ δοκιμάστε ξανά.');
    } finally {
      this.setButtonState(submitButton, false);
    }
  }

  /**
   * Get reCAPTCHA token
   */
  async getRecaptchaToken() {
    if (!this.recaptchaLoaded || typeof grecaptcha === 'undefined') {
      console.error('reCAPTCHA not loaded');
      return null;
    }

    try {
      const token = await grecaptcha.execute(this.siteKey, { action: 'contact_form' });
      return token;
    } catch (error) {
      console.error('reCAPTCHA error:', error);
      return null;
    }
  }

  /**
   * Validate form fields
   */
  validateForm(form) {
    let isValid = true;
    this.clearErrors(form);

    // Required fields
    const requiredFields = ['name', 'email', 'message'];
    requiredFields.forEach(fieldName => {
      const field = form.querySelector(`[name="${fieldName}"]`);
      if (!field || !field.value.trim()) {
        this.showFieldError(field, 'Αυτό το πεδίο είναι υποχρεωτικό.');
        isValid = false;
      }
    });

    // Email validation
    const emailField = form.querySelector('[name="email"]');
    if (emailField && emailField.value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(emailField.value)) {
        this.showFieldError(emailField, 'Παρακαλώ εισάγετε έγκυρη διεύθυνση email.');
        isValid = false;
      }
    }

    // Phone validation (if provided)
    const phoneField = form.querySelector('[name="phone"]');
    if (phoneField && phoneField.value) {
      const phoneRegex = /^[\d\s\-\+\(\)]{8,20}$/;
      if (!phoneRegex.test(phoneField.value)) {
        this.showFieldError(phoneField, 'Παρακαλώ εισάγετε έγκυρο τηλέφωνο.');
        isValid = false;
      }
    }

    // Message length
    const messageField = form.querySelector('[name="message"]');
    if (messageField && messageField.value.length > 5000) {
      this.showFieldError(messageField, 'Το μήνυμα είναι πολύ μεγάλο (μέγιστο 5000 χαρακτήρες).');
      isValid = false;
    }

    return isValid;
  }

  /**
   * Get form data as object
   */
  getFormData(form) {
    const formData = new FormData(form);
    const data = {};
    
    for (const [key, value] of formData.entries()) {
      data[key] = value;
    }
    
    return data;
  }

  /**
   * Submit form data
   */
  async submitForm(data) {
    const response = await fetch(this.apiUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data)
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    return await response.json();
  }

  /**
   * Set button state
   */
  setButtonState(button, loading, text = null) {
    if (!button) return;

    if (loading) {
      button.disabled = true;
      button.dataset.originalText = button.textContent;
      if (text) button.textContent = text;
      button.classList.add('loading');
    } else {
      button.disabled = false;
      if (button.dataset.originalText) {
        button.textContent = button.dataset.originalText;
      }
      button.classList.remove('loading');
    }
  }

  /**
   * Show success message
   */
  showSuccess(message) {
    this.removeMessages();
    const successDiv = document.createElement('div');
    successDiv.className = 'form-message success';
    successDiv.innerHTML = `
      <div class="message-content">
        <span class="message-icon">✅</span>
        <span class="message-text">${message}</span>
      </div>
    `;
    
    const form = document.querySelector(this.formSelector);
    if (form) {
      form.parentNode.insertBefore(successDiv, form);
      setTimeout(() => successDiv.remove(), 8000);
    }
  }

  /**
   * Show error message
   */
  showError(message) {
    this.removeMessages();
    const errorDiv = document.createElement('div');
    errorDiv.className = 'form-message error';
    errorDiv.innerHTML = `
      <div class="message-content">
        <span class="message-icon">❌</span>
        <span class="message-text">${message}</span>
      </div>
    `;
    
    const form = document.querySelector(this.formSelector);
    if (form) {
      form.parentNode.insertBefore(errorDiv, form);
      setTimeout(() => errorDiv.remove(), 8000);
    }
  }

  /**
   * Show field-specific error
   */
  showFieldError(field, message) {
    if (!field) return;

    // Remove existing error
    const existingError = field.parentNode.querySelector('.field-error');
    if (existingError) {
      existingError.remove();
    }

    // Add error class to field
    field.classList.add('error');

    // Create error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.textContent = message;
    
    field.parentNode.appendChild(errorDiv);
  }

  /**
   * Show field errors from server response
   */
  showFieldErrors(form, errors) {
    errors.forEach(error => {
      console.error('Field error:', error);
    });
  }

  /**
   * Clear all error messages
   */
  clearErrors(form) {
    // Remove field errors
    form.querySelectorAll('.field-error').forEach(error => error.remove());
    form.querySelectorAll('.error').forEach(field => field.classList.remove('error'));
  }

  /**
   * Remove global messages
   */
  removeMessages() {
    document.querySelectorAll('.form-message').forEach(msg => msg.remove());
  }
}

// Auto-initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  // Initialize contact form handler
  window.contactFormHandler = new ContactFormHandler({
    siteKey: '6Lcd7dcrAAAAADzfwDc4AG_kN6jKU0-0Fo78NmYx', // Replace with your site key
    apiUrl: '/contact-handler.php',
    formSelector: '.contact-form'
  });

  console.log('📧 Contact form handler initialized');
});

// Export for module use
if (typeof module !== 'undefined' && module.exports) {
  module.exports = ContactFormHandler;
}
