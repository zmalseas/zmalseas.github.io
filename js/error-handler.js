// Error Handler Module - Centralized error handling

class ErrorHandler {
  constructor() {
    this.init();
  }

  init() {
    // Global error handler
    window.addEventListener('error', (event) => {
      this.handleError({
        message: event.message,
        filename: event.filename,
        lineno: event.lineno,
        colno: event.colno,
        error: event.error
      });
    });

    // Promise rejection handler
    window.addEventListener('unhandledrejection', (event) => {
      this.handlePromiseRejection(event.reason);
    });
  }

  handleError(errorInfo) {
    console.error('Global error caught:', errorInfo);
    
    // In production, you might want to send this to a logging service
    if (this.isProduction()) {
      this.logError(errorInfo);
    }
    
    // Show user-friendly error message if needed
    if (this.isCriticalError(errorInfo)) {
      this.showUserErrorMessage();
    }
  }

  handlePromiseRejection(reason) {
    console.error('Unhandled promise rejection:', reason);
    
    if (this.isProduction()) {
      this.logError({ type: 'promise_rejection', reason });
    }
  }

  showUserErrorMessage(message = 'Παρουσιάστηκε ένα πρόβλημα. Παρακαλώ ανανεώστε τη σελίδα.') {
    // Create or update error notification
    let errorNotification = document.getElementById('error-notification');
    
    if (!errorNotification) {
      errorNotification = document.createElement('div');
      errorNotification.id = 'error-notification';
      errorNotification.className = 'error-notification';
      errorNotification.setAttribute('role', 'alert');
      errorNotification.setAttribute('aria-live', 'polite');
      document.body.appendChild(errorNotification);
    }
    
    errorNotification.innerHTML = `
      <div class="error-content">
        <span class="error-icon">⚠️</span>
        <span class="error-message">${message}</span>
        <button class="error-close" onclick="this.parentElement.parentElement.remove()" aria-label="Κλείσιμο μηνύματος σφάλματος">×</button>
      </div>
    `;
    
    errorNotification.style.display = 'block';
    
    // Auto-hide after 10 seconds
    setTimeout(() => {
      if (errorNotification && errorNotification.parentNode) {
        errorNotification.remove();
      }
    }, 10000);
  }

  isCriticalError(errorInfo) {
    // Define what constitutes a critical error that should be shown to users
    const criticalKeywords = ['network', 'fetch', 'load'];
    return criticalKeywords.some(keyword => 
      errorInfo.message?.toLowerCase().includes(keyword)
    );
  }

  isProduction() {
    return window.location.hostname !== 'localhost' && 
           window.location.hostname !== '127.0.0.1';
  }

  logError(errorInfo) {
    // In a real application, send to logging service
    // Example: send to analytics, Sentry, LogRocket, etc.
    console.log('Would log error to service:', errorInfo);
  }

  // Helper method for form validation errors
  showFormError(formElement, message) {
    let errorElement = formElement.querySelector('.form-error');
    
    if (!errorElement) {
      errorElement = document.createElement('div');
      errorElement.className = 'form-error';
      errorElement.setAttribute('role', 'alert');
      formElement.appendChild(errorElement);
    }
    
    errorElement.textContent = message;
    errorElement.style.display = 'block';
    
    // Auto-hide form errors after 5 seconds
    setTimeout(() => {
      errorElement.style.display = 'none';
    }, 5000);
  }

  // Helper method to clear form errors
  clearFormErrors(formElement) {
    const errorElements = formElement.querySelectorAll('.form-error');
    errorElements.forEach(element => {
      element.style.display = 'none';
    });
  }
}

// Create singleton instance
const errorHandler = new ErrorHandler();

// Make globally available
window.ErrorHandler = ErrorHandler;
window.errorHandler = errorHandler;

// Export for module systems if available
if (typeof module !== 'undefined' && module.exports) {
  module.exports = errorHandler;
}
