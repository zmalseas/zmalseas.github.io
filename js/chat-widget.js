// Chat Widget Module - Handle chat functionality

class ChatWidget {
  constructor() {
    this.isInitialized = false;
    this.recaptchaLoaded = false;
    this.siteKey = (window.SITE_CONFIG && window.SITE_CONFIG.RECAPTCHA_SITE) || '';
    this.init();
  }

  async init() {
    try {
      await this.loadChatWidget();
      await this.loadRecaptcha();
      this.setupEventListeners();
      this.handleFooterCollision();
      this.isInitialized = true;
    } catch (error) {
      console.error('Chat widget initialization failed:', error);
    }
  }

  async loadChatWidget() {
    const chatEl = document.getElementById("chat-widget");
    if (!chatEl) return;

    const currentPath = window.location.pathname;
    const isInSubfolder = this.isInSubfolder(currentPath);
    const basePath = isInSubfolder ? "../" : "";

    const CHAT_FALLBACK = `
      <div class="chat-widget" role="complementary" aria-label="Chat Widget">
        <button id="chatButton" class="chat-button" aria-label="Άνοιγμα παραθύρου συνομιλίας">
          💬 <span>Chat</span>
        </button>
      </div>

      <div id="chatModal" class="chat-modal" role="dialog" aria-modal="true" aria-labelledby="chatTitle">
        <div id="chatBackdrop" class="chat-backdrop"></div>
        <div class="chat-content">
          <div class="chat-header">
            <h3 id="chatTitle">Επικοινωνήστε μαζί μας</h3>
            <button id="chatClose" class="chat-close" aria-label="Κλείσιμο παραθύρου συνομιλίας">×</button>
          </div>
          <div class="chat-body">
            <p>Στείλτε μας το μήνυμά σας και θα επικοινωνήσουμε μαζί σας το συντομότερο δυνατό.</p>
            <form id="chatForm" class="chat-form">
              <div class="form-group">
                <label for="chatName">Όνομα *</label>
                <input type="text" id="chatName" name="name" required aria-required="true">
              </div>
              <div class="form-group">
                <label for="chatEmail">Email *</label>
                <input type="email" id="chatEmail" name="email" required aria-required="true">
              </div>
              <div class="form-group">
                <label for="chatMessage">Μήνυμα *</label>
                <textarea id="chatMessage" name="message" rows="4" required aria-required="true"></textarea>
              </div>
              <div class="form-actions">
                <button type="button" id="chatCancel" class="btn btn-secondary">Ακύρωση</button>
                <button type="submit" class="btn btn-primary">
                  <span class="btn-text">Αποστολή</span>
                  <span class="btn-loading" style="display: none;">Αποστολή...</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    `;

    try {
      const response = await fetch(`${basePath}partials/chat.html`);
      if (response.ok) {
        chatEl.innerHTML = await response.text();
      } else {
        throw new Error(`Failed to load chat widget: ${response.status}`);
      }
    } catch (error) {
      console.warn('Using fallback chat widget:', error.message);
      chatEl.innerHTML = CHAT_FALLBACK;
    }
    
    // Initialize floating labels after HTML is loaded
    this.initializeFloatingLabels();
  }

  // Load reCAPTCHA v3 script if not already present
  loadRecaptcha() {
    return new Promise((resolve) => {
      if (document.querySelector('script[src*="google.com/recaptcha/api.js"]')) {
        this.recaptchaLoaded = true;
        resolve(true);
        return;
      }
      const script = document.createElement('script');
      script.src = `https://www.google.com/recaptcha/api.js?render=${this.siteKey}`;
      script.async = true;
      script.onload = () => { this.recaptchaLoaded = true; resolve(true); };
      script.onerror = () => { this.recaptchaLoaded = false; resolve(false); };
      document.head.appendChild(script);
    });
  }

  setupEventListeners() {
    const chatButton = document.getElementById('chatButton');
    const chatModal = document.getElementById('chatModal');
    const chatClose = document.getElementById('chatClose');
    const chatBackdrop = document.getElementById('chatBackdrop');
    // Διορθώνω το id της φόρμας ώστε να ταιριάζει με το partial
    const chatForm = document.getElementById('chat-contact-form');
    const chatCancel = document.getElementById('chatCancel');

    if (!chatButton || !chatModal) return;

    // Open chat modal
    chatButton.addEventListener('click', () => this.openChat());

    // Close chat modal
    if (chatClose) {
      chatClose.addEventListener('click', () => this.closeChat());
    }

    if (chatCancel) {
      chatCancel.addEventListener('click', () => this.closeChat());
    }

    if (chatBackdrop) {
      chatBackdrop.addEventListener('click', () => this.closeChat());
    }

    // Handle form submission
    if (chatForm) {
      chatForm.addEventListener('submit', (e) => this.handleFormSubmission(e));
    }

    // Escape key to close
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && chatModal.classList.contains('active')) {
        this.closeChat();
      }
    });
  }

  openChat() {
    const chatModal = document.getElementById('chatModal');
    const chatBackdrop = document.getElementById('chatBackdrop');
    const chatWidget = document.querySelector('.chat-widget');
    
    if (chatModal) {
      chatModal.classList.add('active');
      document.body.classList.add('chat-modal-open');
    }
    
    if (chatBackdrop) {
      chatBackdrop.classList.add('active');
    }
    
    if (chatWidget) {
      chatWidget.classList.add('modal-open');
    }
    
    // Focus first input
    setTimeout(() => {
      const firstInput = chatModal.querySelector('input');
      if (firstInput) firstInput.focus();
    }, 350);
  }

  closeChat() {
    const chatModal = document.getElementById('chatModal');
    const chatBackdrop = document.getElementById('chatBackdrop');
    const chatWidget = document.querySelector('.chat-widget');
    const chatForm = document.getElementById('chatForm');
    
    if (chatModal) {
      chatModal.classList.remove('active');
    }
    
    if (chatBackdrop) {
      chatBackdrop.classList.remove('active');
    }
    
    if (chatWidget) {
      chatWidget.classList.remove('modal-open');
    }
    
    document.body.classList.remove('chat-modal-open');
    
    // Reset form
    if (chatForm) {
      chatForm.reset();
      this.resetFormState();
    }
  }

  async handleFormSubmission(e) {
    e.preventDefault();
    const form = e.target;
    const submitBtn = form.querySelector('button[type="submit"]');
    this.resetFormState();
    try {
      // Show loading state
      if (submitBtn) submitBtn.disabled = true;

      // Validate required fields
      const firstName = form.querySelector('[name="firstName"]').value.trim();
      const lastName = form.querySelector('[name="lastName"]').value.trim();
      const name = firstName + (lastName ? ' ' + lastName : '');
      const email = form.querySelector('[name="email"]').value.trim();
      const message = form.querySelector('[name="message"]').value.trim();
      if (!firstName || !lastName || !email || !message) {
        this.showErrorMessage('Συμπληρώστε όλα τα υποχρεωτικά πεδία.');
        if (submitBtn) submitBtn.disabled = false;
        return;
      }

      // reCAPTCHA v3 integration (αν υπάρχει grecaptcha)
      await this.loadRecaptcha();
      let recaptchaToken = '';
      if (window.grecaptcha && typeof grecaptcha.execute === 'function') {
        recaptchaToken = await grecaptcha.execute(this.siteKey, { action: 'chat_widget' });
      }
      if (!recaptchaToken) {
        this.showErrorMessage('Αποτυχία φόρτωσης reCAPTCHA. Προσπαθήστε ξανά.');
        if (submitBtn) submitBtn.disabled = false;
        return;
      }

      // Prepare data
      const data = {
        name: name,
        email: email,
        phone: form.querySelector('[name="phone"]').value.trim(),
        message: message,
        newsletter: (form.querySelector('[name="newsletter"]') && form.querySelector('[name="newsletter"]').checked) ? '1' : '',
        recaptcha_token: recaptchaToken,
        source: 'chat-widget'
      };

      // Send to contact-handler.php (URL-encoded to avoid WAF JSON rules)
      const body = new URLSearchParams(data).toString();
      const response = await fetch('/contact-handler.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
          'Accept': 'application/json'
        },
        body
      });

      let result;
      if (!response.ok) {
        const txt = await response.text();
        try { result = JSON.parse(txt); } catch { throw new Error('Network error'); }
      } else {
        result = await response.json();
      }
      if (result.success) {
        this.showSuccessMessage(result.message || 'Το μήνυμά σας στάλθηκε επιτυχώς!');
        setTimeout(() => this.closeChat(), 2000);
      } else {
        this.showErrorMessage(result.error || 'Παρουσιάστηκε σφάλμα. Παρακαλώ δοκιμάστε ξανά.');
      }
    } catch (error) {
      console.error('Form submission failed:', error);
      this.showErrorMessage('Παρουσιάστηκε σφάλμα. Παρακαλώ δοκιμάστε ξανά.');
    } finally {
      if (submitBtn) submitBtn.disabled = false;
    }
  }

  showSuccessMessage(msg) {
    const chatBody = document.querySelector('.chat-body');
    if (chatBody) {
      const successMsg = document.createElement('div');
      successMsg.className = 'success-message';
      successMsg.innerHTML = '✅ ' + (msg || 'Το μήνυμά σας στάλθηκε επιτυχώς!');
      chatBody.appendChild(successMsg);
    }
  }

  showErrorMessage(msg) {
    const chatBody = document.querySelector('.chat-body');
    if (chatBody) {
      const errorMsg = document.createElement('div');
      errorMsg.className = 'error-message';
      errorMsg.innerHTML = '❌ ' + (msg || 'Παρουσιάστηκε σφάλμα. Παρακαλώ δοκιμάστε ξανά.');
      chatBody.appendChild(errorMsg);
    }
  }

  resetFormState() {
    const messages = document.querySelectorAll('.success-message, .error-message');
    messages.forEach(msg => msg.remove());
  }

  handleFooterCollision() {
    const footer = document.querySelector('.site-footer, footer');
    const chatWidget = document.querySelector('.chat-widget');
    
    if (!footer || !chatWidget) return;
    
    const checkCollision = () => {
      const footerRect = footer.getBoundingClientRect();
      const viewportHeight = window.innerHeight;
      const chatHeight = 60;
      const bottomMargin = 20;
      
      if (footerRect.top <= viewportHeight) {
        const overlapDistance = viewportHeight - footerRect.top + bottomMargin;
        chatWidget.style.transform = `translateY(-${overlapDistance}px)`;
      } else {
        chatWidget.style.transform = 'translateY(0)';
      }
    };
    
    // Check on scroll and resize
    window.addEventListener('scroll', checkCollision);
    window.addEventListener('resize', checkCollision);
    checkCollision(); // Initial check
  }

  initializeFloatingLabels() {
    // Initialize floating labels for chat widget
    const chatFloatingFields = document.querySelectorAll('#chatModal .floating-label input, #chatModal .floating-label textarea');
    
    chatFloatingFields.forEach(function(field) {
      
      function updateLabelState() {
        // Check if field has content
        const hasContent = field.value.trim().length > 0;
        
        if (hasContent) {
          field.classList.add('has-content');
        } else {
          field.classList.remove('has-content');
        }
      }
      
      // Event listeners
      field.addEventListener('input', updateLabelState);
      field.addEventListener('blur', updateLabelState);
      field.addEventListener('change', updateLabelState);
      
      // Check initial state
      updateLabelState();
    });
  }

  isInSubfolder(currentPath) {
    return currentPath.includes('/arthra/') || 
           currentPath.includes('/etairia/') || 
           currentPath.includes('/ipiresies/') || 
           currentPath.includes('/efarmoges/') || 
           currentPath.includes('/epikoinonia/') || 
           currentPath.includes('/nomimotita/') || 
           currentPath.includes('/css/') || 
           currentPath.includes('/js/') ||
           (currentPath.split('/').length > 2 && !currentPath.endsWith('/'));
  }
}

// Initialize chat widget
const chatWidget = new ChatWidget();

// Make it globally available
window.ChatWidget = ChatWidget;
