// Advanced Security Module - CSRF Protection, Input Validation & Security Measures

class SecurityManager {
  constructor() {
    this.csrfToken = null;
    this.rateLimitMap = new Map();
    this.securityHeaders = new Set();
    this.init();
  }

  init() {
    try {
      // Generate CSRF token
      this.generateCSRFToken();
      
      // Set up form protection
      this.setupFormProtection();
      
      // Initialize input validation
      this.setupInputValidation();
      
      // Set up rate limiting
      this.setupRateLimiting();
      
      // Content Security Policy detection
      this.detectCSP();
      
      // XSS Protection
      this.setupXSSProtection();
      
      console.log('🔒 Security measures initialized');
    } catch (error) {
      console.error('Security initialization failed:', error);
    }
  }

  generateCSRFToken() {
    // Generate a cryptographically secure random token
    const array = new Uint8Array(32);
    crypto.getRandomValues(array);
    this.csrfToken = Array.from(array, byte => byte.toString(16).padStart(2, '0')).join('');
    
    // Store in session storage
    sessionStorage.setItem('csrf_token', this.csrfToken);
    
    // Add to meta tag for easy access
    let metaTag = document.querySelector('meta[name="csrf-token"]');
    if (!metaTag) {
      metaTag = document.createElement('meta');
      metaTag.name = 'csrf-token';
      document.head.appendChild(metaTag);
    }
    metaTag.content = this.csrfToken;
  }

  setupFormProtection() {
    // Add CSRF tokens to all forms
    document.addEventListener('DOMContentLoaded', () => {
      this.protectAllForms();
    });
    
    // Protect dynamically added forms
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        mutation.addedNodes.forEach((node) => {
          if (node.nodeType === 1) { // Element node
            const forms = node.querySelectorAll ? node.querySelectorAll('form') : [];
            forms.forEach(form => this.protectForm(form));
            
            if (node.tagName === 'FORM') {
              this.protectForm(node);
            }
          }
        });
      });
    });
    
    observer.observe(document.body, { childList: true, subtree: true });
  }

  protectAllForms() {
    document.querySelectorAll('form').forEach(form => {
      this.protectForm(form);
    });
  }

  protectForm(form) {
    if (form.dataset.protected === 'true') return;
    
    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = 'csrf_token';
    csrfInput.value = this.csrfToken;
    form.appendChild(csrfInput);
    
    // Add timestamp for replay attack protection
    const timestampInput = document.createElement('input');
    timestampInput.type = 'hidden';
    timestampInput.name = 'timestamp';
    timestampInput.value = Date.now().toString();
    form.appendChild(timestampInput);
    
    // Add form validation
    form.addEventListener('submit', (e) => this.validateFormSubmission(e));
    
    form.dataset.protected = 'true';
  }

  validateFormSubmission(event) {
    const form = event.target;
    
    // Rate limiting check
    if (!this.checkRateLimit('form_submission')) {
      event.preventDefault();
      this.showSecurityError('Πολλές αιτήσεις σε σύντομο χρονικό διάστημα. Παρακαλώ δοκιμάστε αργότερα.');
      return false;
    }
    
    // CSRF token validation
    const csrfInput = form.querySelector('input[name="csrf_token"]');
    if (!csrfInput || csrfInput.value !== this.csrfToken) {
      event.preventDefault();
      this.showSecurityError('Σφάλμα ασφαλείας. Παρακαλώ ανανεώστε τη σελίδα και δοκιμάστε ξανά.');
      return false;
    }
    
    // Timestamp validation (prevent replay attacks)
    const timestampInput = form.querySelector('input[name="timestamp"]');
    if (timestampInput) {
      const timestamp = parseInt(timestampInput.value);
      const now = Date.now();
      const maxAge = 30 * 60 * 1000; // 30 minutes
      
      if (now - timestamp > maxAge) {
        event.preventDefault();
        this.showSecurityError('Η φόρμα έχει λήξει. Παρακαλώ ανανεώστε τη σελίδα.');
        return false;
      }
    }
    
    // Input validation
    if (!this.validateFormInputs(form)) {
      event.preventDefault();
      return false;
    }
    
    return true;
  }

  setupInputValidation() {
    // Real-time input validation
    document.addEventListener('input', (e) => {
      if (e.target.matches('input, textarea')) {
        this.validateInput(e.target);
      }
    });
    
    // Email validation
    document.addEventListener('blur', (e) => {
      if (e.target.type === 'email') {
        this.validateEmail(e.target);
      }
    });
  }

  validateInput(input) {
    const value = input.value;
    let isValid = true;
    let errorMessage = '';
    
    // XSS Prevention - detect malicious patterns
    const xssPatterns = [
      /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
      /javascript:/gi,
      /on\w+\s*=/gi,
      /<iframe/gi,
      /<object/gi,
      /<embed/gi
    ];
    
    if (xssPatterns.some(pattern => pattern.test(value))) {
      isValid = false;
      errorMessage = 'Μη επιτρεπτοί χαρακτήρες στο πεδίο.';
    }
    
    // SQL Injection patterns (basic detection)
    const sqlPatterns = [
      /(\b(SELECT|INSERT|UPDATE|DELETE|DROP|CREATE|ALTER|EXEC|UNION)\b)/gi,
      /('|('')|;|--|\/\*|\*\/)/gi
    ];
    
    if (sqlPatterns.some(pattern => pattern.test(value))) {
      isValid = false;
      errorMessage = 'Μη επιτρεπτοί χαρακτήρες στο πεδίο.';
    }
    
    // Update input state
    if (!isValid) {
      input.classList.add('security-invalid');
      this.showInputError(input, errorMessage);
    } else {
      input.classList.remove('security-invalid');
      this.clearInputError(input);
    }
    
    return isValid;
  }

  validateEmail(input) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const isValid = emailPattern.test(input.value);
    
    if (!isValid && input.value.length > 0) {
      this.showInputError(input, 'Παρακαλώ εισάγετε έγκυρη διεύθυνση email.');
      input.classList.add('validation-invalid');
    } else {
      this.clearInputError(input);
      input.classList.remove('validation-invalid');
    }
    
    return isValid;
  }

  validateFormInputs(form) {
    let isValid = true;
    
    form.querySelectorAll('input, textarea').forEach(input => {
      if (!this.validateInput(input)) {
        isValid = false;
      }
      
      if (input.type === 'email' && !this.validateEmail(input)) {
        isValid = false;
      }
    });
    
    return isValid;
  }

  setupRateLimiting() {
    // Rate limiting for various actions
    this.rateLimits = {
      'form_submission': { max: 5, window: 60000 }, // 5 submissions per minute
      'api_request': { max: 20, window: 60000 },    // 20 API requests per minute
      'login_attempt': { max: 3, window: 300000 }   // 3 login attempts per 5 minutes
    };
  }

  checkRateLimit(action) {
    const limit = this.rateLimits[action];
    if (!limit) return true;
    
    const now = Date.now();
    const key = `${action}_${this.getClientId()}`;
    
    if (!this.rateLimitMap.has(key)) {
      this.rateLimitMap.set(key, []);
    }
    
    const attempts = this.rateLimitMap.get(key);
    
    // Remove old attempts outside the time window
    const validAttempts = attempts.filter(timestamp => now - timestamp < limit.window);
    
    if (validAttempts.length >= limit.max) {
      return false;
    }
    
    // Add current attempt
    validAttempts.push(now);
    this.rateLimitMap.set(key, validAttempts);
    
    return true;
  }

  getClientId() {
    // Generate a client identifier (could be improved with fingerprinting)
    let clientId = localStorage.getItem('client_id');
    if (!clientId) {
      clientId = this.generateRandomId();
      localStorage.setItem('client_id', clientId);
    }
    return clientId;
  }

  generateRandomId() {
    return Math.random().toString(36).substr(2, 9) + Date.now().toString(36);
  }

  detectCSP() {
    // Check if Content Security Policy is active
    const cspMeta = document.querySelector('meta[http-equiv="Content-Security-Policy"]');
    if (cspMeta || this.hasCSPHeader()) {
      this.securityHeaders.add('CSP');
      console.log('✅ Content Security Policy detected');
    } else {
      console.warn('⚠️ Content Security Policy not detected');
    }
  }

  hasCSPHeader() {
    // This would typically be checked server-side
    // For client-side, we can check for certain CSP violations
    return document.documentElement.dataset.csp === 'enabled';
  }

  setupXSSProtection() {
    // Additional XSS protection measures
    
    // Sanitize data attributes
    document.addEventListener('DOMContentLoaded', () => {
      this.sanitizeDataAttributes();
    });
    
    // Monitor for suspicious DOM changes
    this.monitorDOMChanges();
  }

  sanitizeDataAttributes() {
    document.querySelectorAll('[data-*]').forEach(element => {
      Array.from(element.attributes).forEach(attr => {
        if (attr.name.startsWith('data-') && this.containsMaliciousCode(attr.value)) {
          element.removeAttribute(attr.name);
          console.warn('Removed suspicious data attribute:', attr.name);
        }
      });
    });
  }

  containsMaliciousCode(value) {
    const maliciousPatterns = [
      /javascript:/gi,
      /<script/gi,
      /on\w+\s*=/gi
    ];
    
    return maliciousPatterns.some(pattern => pattern.test(value));
  }

  monitorDOMChanges() {
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        mutation.addedNodes.forEach((node) => {
          if (node.nodeType === 1) { // Element node
            this.checkNodeSecurity(node);
          }
        });
      });
    });
    
    observer.observe(document.body, { childList: true, subtree: true });
  }

  checkNodeSecurity(node) {
    // Check for suspicious script injections
    if (node.tagName === 'SCRIPT' && !this.isWhitelistedScript(node)) {
      console.warn('Suspicious script detected and blocked:', node.src || node.textContent);
      node.remove();
      return;
    }
    
    // Check for suspicious attributes
    if (node.attributes) {
      Array.from(node.attributes).forEach(attr => {
        if (attr.name.startsWith('on') || this.containsMaliciousCode(attr.value)) {
          console.warn('Suspicious attribute detected:', attr.name, attr.value);
          node.removeAttribute(attr.name);
        }
      });
    }
  }

  isWhitelistedScript(script) {
    const whitelist = [
      '/js/',
      'app.js',
      'nerali.gr'
    ];
    
    const src = script.src || '';
    return whitelist.some(allowed => src.includes(allowed)) || 
           (script.textContent && script.textContent.includes('// Nerali'));
  }

  showSecurityError(message) {
    // Create security error notification
    const errorDiv = document.createElement('div');
    errorDiv.className = 'security-error';
    errorDiv.innerHTML = `
      <div class="security-error-content">
        <span class="security-error-icon">🔒</span>
        <span class="security-error-message">${message}</span>
        <button class="security-error-close" onclick="this.parentElement.parentElement.remove()">×</button>
      </div>
    `;
    
    document.body.appendChild(errorDiv);
    
    // Auto-remove after 10 seconds
    setTimeout(() => {
      if (errorDiv.parentNode) {
        errorDiv.remove();
      }
    }, 10000);
  }

  showInputError(input, message) {
    this.clearInputError(input);
    
    const errorSpan = document.createElement('span');
    errorSpan.className = 'input-security-error';
    errorSpan.textContent = message;
    
    input.parentNode.insertBefore(errorSpan, input.nextSibling);
  }

  clearInputError(input) {
    const existingError = input.parentNode.querySelector('.input-security-error');
    if (existingError) {
      existingError.remove();
    }
  }

  // Public methods for external use
  getCSRFToken() {
    return this.csrfToken;
  }

  refreshCSRFToken() {
    this.generateCSRFToken();
    this.protectAllForms();
  }

  isRateLimited(action) {
    return !this.checkRateLimit(action);
  }
}

// Initialize security manager
const securityManager = new SecurityManager();

// Make it globally available
window.securityManager = securityManager;