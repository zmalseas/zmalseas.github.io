// Chat Widget Module - Handle chat functionality

class ChatWidget {
  constructor() {
    this.isInitialized = false;
    this.init();
  }

  async init() {
    try {
      await this.loadChatWidget();
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
  }

  setupEventListeners() {
    const chatButton = document.getElementById('chatButton');
    const chatModal = document.getElementById('chatModal');
    const chatClose = document.getElementById('chatClose');
    const chatBackdrop = document.getElementById('chatBackdrop');
    const chatForm = document.getElementById('chatForm');
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
    
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    
    try {
      // Show loading state
      if (btnText) btnText.style.display = 'none';
      if (btnLoading) btnLoading.style.display = 'inline';
      submitBtn.disabled = true;
      
      // Simulate form submission (replace with actual endpoint)
      await new Promise(resolve => setTimeout(resolve, 2000));
      
      // Show success message
      this.showSuccessMessage();
      
      // Close modal after success
      setTimeout(() => this.closeChat(), 2000);
      
    } catch (error) {
      console.error('Form submission failed:', error);
      this.showErrorMessage();
    } finally {
      // Reset button state
      if (btnText) btnText.style.display = 'inline';
      if (btnLoading) btnLoading.style.display = 'none';
      submitBtn.disabled = false;
    }
  }

  showSuccessMessage() {
    const chatBody = document.querySelector('.chat-body');
    if (chatBody) {
      const successMsg = document.createElement('div');
      successMsg.className = 'success-message';
      successMsg.innerHTML = '✅ Το μήνυμά σας στάλθηκε επιτυχώς!';
      chatBody.appendChild(successMsg);
    }
  }

  showErrorMessage() {
    const chatBody = document.querySelector('.chat-body');
    if (chatBody) {
      const errorMsg = document.createElement('div');
      errorMsg.className = 'error-message';
      errorMsg.innerHTML = '❌ Παρουσιάστηκε σφάλμα. Παρακαλώ δοκιμάστε ξανά.';
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

export default ChatWidget;