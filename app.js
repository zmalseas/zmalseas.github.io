
async function injectPartials() {
  const headerEl = document.getElementById("site-header");
  const footerEl = document.getElementById("site-footer");
  const chatEl = document.getElementById("chat-widget");
  // Determine path based on current location
  const currentPath = window.location.pathname;
  console.log("Current path:", currentPath);
  
  // Simple check: if path contains a folder name, we're in a subfolder
  const isInSubfolder = currentPath.includes('/arthra/') || 
                       currentPath.includes('/etairia/') || 
                       currentPath.includes('/ipiresies/') || 
                       currentPath.includes('/efarmoges/') || 
                       currentPath.includes('/epikoinonia/') || 
                       currentPath.includes('/nomimotita/') || 
                       currentPath.includes('/css/') || 
                       currentPath.includes('/js/') ||
                       (currentPath.split('/').length > 2 && !currentPath.endsWith('/'));
  
  const logoPath = isInSubfolder ? "../images/logo.png" : "images/logo.png";
  const homePath = isInSubfolder ? "../index.html" : "index.html";
  const basePath = isInSubfolder ? "../" : "";
  
  const HEADER_FALLBACK = `
<header class="site-header">
  <div class="frame">
    <div class="container header-row">
      <a class="brand" href="${homePath}" aria-label="Nerali Home">
        <img src="${logoPath}" alt="Nerali logo" width="36" height="36" />
        <span class="name">Nerali</span>
      </a>

      <nav class="primary" aria-label="Κύρια Πλοήγηση">
        <ul class="nav-links">
          <li class="nav-item"><a href="${homePath}"><span class="text">Αρχική</span></a></li>

          <li class="nav-item dropdown">
            <a href="#"><span class="text">Υπηρεσίες</span><span class="caret">▾</span></a>
            <div class="submenu" role="menu">
              <a href="${basePath}ipiresies/logistiki.html">Λογιστική <span class="sm-arrow">→</span></a>
              <a href="${basePath}ipiresies/misthodosia.html">Μισθοδοσία <span class="sm-arrow">→</span></a>
              <a href="${basePath}ipiresies/assurance.html">Assurance <span class="sm-arrow">→</span></a>
              <a href="${basePath}ipiresies/consulting.html">Consulting <span class="sm-arrow">→</span></a>
              <a href="${basePath}ipiresies/cyber-security.html">Cyber Security <span class="sm-arrow">→</span></a>
              <a href="${basePath}ipiresies/social-media.html">Social Media <span class="sm-arrow">→</span></a>
              <a href="${basePath}ipiresies/epixorigiseis.html">Επιχορηγήσεις <span class="sm-arrow">→</span></a>
              <a href="${basePath}ipiresies/symvoulos-mixanikos.html">Σύμβουλος Μηχανικός <span class="sm-arrow">→</span></a>
            </div>
          </li>

          <li class="nav-item"><a href="${basePath}epikoinonia/contact.html"><span class="text">Επικοινωνία</span></a></li>
        </ul>

        <button class="hamburger" aria-label="Άνοιγμα μενού">
          <span class="bar"></span>
        </button>
      </nav>
    </div>
  </div>
</header>

<!-- Mobile overlay menu -->
<div class="overlay" aria-hidden="true">
  <div class="overlay-header">
    <a href="${homePath}">
      <img src="${logoPath}" alt="Nerali logo" />
      <span class="title">Nerali</span>
    </a>
  </div>

  <div class="menu-wrap">
    <div class="menu-list">
      <a class="menu-toggle" href="${homePath}">Αρχική</a>
      <div class="menu-item">
        <button class="menu-toggle">Υπηρεσίες <span class="exp-caret">›</span></button>
        <div class="menu-sub">
          <a href="${basePath}ipiresies/logistiki.html">Λογιστική</a>
          <a href="${basePath}ipiresies/misthodosia.html">Μισθοδοσία</a>
          <a href="${basePath}ipiresies/assurance.html">Assurance</a>
          <a href="${basePath}ipiresies/consulting.html">Consulting</a>
          <a href="${basePath}ipiresies/cyber-security.html">Cyber Security</a>
          <a href="${basePath}ipiresies/social-media.html">Social Media</a>
          <a href="${basePath}ipiresies/epixorigiseis.html">Επιχορηγήσεις</a>
          <a href="${basePath}ipiresies/symvoulos-mixanikos.html">Σύμβουλος Μηχανικός</a>
        </div>
      </div>
      <a class="menu-toggle" href="${basePath}epikoinonia/contact.html">Επικοινωνία</a>
    </div>
  </div>
</div>
`;
  const FOOTER_FALLBACK = `
<footer class="site-footer">
  <div class="container">
    <small>© <span id="y"></span> Nerali</small>
    <a href="mailto:info@nerali.gr">info@nerali.gr</a>
  </div>
  <script>document.getElementById("y").textContent=new Date().getFullYear()</script>
</footer>
`;
  try {
    // Use the same path detection logic as above
    const partialsPath = isInSubfolder ? "../partials/" : "partials/";
    
    // Debug logging for path resolution
    console.log("Current path:", currentPath);
    console.log("Is in subfolder:", isInSubfolder);
    console.log("Partials path:", partialsPath);
    console.log("Base URL:", window.location.origin);
    console.log("Full partials URL:", window.location.origin + "/" + partialsPath);
    
    const promises = [
      fetch(partialsPath + "header.html").then(r => {
        if (!r.ok) throw new Error(`Failed to fetch header: ${r.status}`);
        return r.text();
      }),
      fetch(partialsPath + "footer.html").then(r => {
        if (!r.ok) throw new Error(`Failed to fetch footer: ${r.status}`);
        return r.text();
      }),
    ];
    
    // Only load chat widget if not on contact page
    const isContactPage = window.location.pathname.includes('contact.html');
    if (chatEl && !isContactPage) {
      promises.push(fetch(partialsPath + "chat.html").then(r => r.text()));
    }
    
    const results = await Promise.all(promises);
    const [h, f, c] = results;
    
    // Fix paths based on current location depth
    let processedHeader = h;
    let processedFooter = f;
    
    console.log("Processing paths. isInSubfolder:", isInSubfolder);
    console.log("Original header sample:", h.substring(0, 200));
    
    if (isInSubfolder) {
      // For subfolders: convert all paths to go back to root directory
      processedHeader = h
        // Fix home links
        .replace(/href="\.\//g, 'href="../')
        .replace(/href="index\.html"/g, 'href="../index.html"')
        // Fix absolute paths  
        .replace(/href="\/([^"]+)"/g, 'href="../$1"')
        // Fix image sources
        .replace(/src="images\//g, 'src="../images/');
      
      processedFooter = f
        // Fix footer links to go back to root
        .replace(/href="([^\.\/h][^"]*)/g, 'href="../$1');
        
    } else {
      // For root directory: convert absolute paths to relative
      processedHeader = h
        .replace(/href="\.\//g, 'href="./"')
        .replace(/href="\/([^"]+)"/g, 'href="$1"')
        .replace(/src="images\//g, 'src="images/');
      
      processedFooter = f
        .replace(/href="\/([^"]+)"/g, 'href="$1"');
    }
    
    console.log("Processed header sample:", processedHeader.substring(0, 200));
    
    if (headerEl) headerEl.innerHTML = processedHeader;
    if (footerEl) footerEl.innerHTML = processedFooter;
    if (chatEl && !isContactPage && c) {
      chatEl.innerHTML = c;
      initChatWidget();
    }
    
    initHeaderInteractions();
  } catch (e) {
    console.warn("Failed to load partials, using fallback:", e);
    if (headerEl) headerEl.innerHTML = HEADER_FALLBACK;
    if (footerEl) footerEl.innerHTML = FOOTER_FALLBACK;
    initHeaderInteractions();
  }
}

function initHeaderInteractions(){
  const header = document.querySelector(".site-header");
  if (!header) return;

  // Dropdowns now work with CSS hover, no JavaScript needed for desktop
  
  header.querySelectorAll(".submenu a").forEach(link => {
    link.addEventListener("click", () => link.classList.add("clicked"));
  });

  const hamburger = header.querySelector(".hamburger");
  const overlay = document.querySelector(".overlay");
  if (hamburger && overlay){
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      overlay.classList.toggle("open");
    });
    overlay.addEventListener("click", (e) => {
      if (e.target.classList.contains("overlay")) {
        hamburger.classList.remove("active");
        overlay.classList.remove("open");
      }
    });
    overlay.querySelectorAll(".menu-item .menu-toggle").forEach(btn => {
      btn.addEventListener("click", () => {
        const currentMenuItem = btn.closest(".menu-item");
        const isCurrentlyOpen = currentMenuItem.classList.contains("open");
        
        // Close all menu items first
        overlay.querySelectorAll(".menu-item").forEach(item => {
          item.classList.remove("open");
        });
        
        // If the clicked item wasn't open, open it
        if (!isCurrentlyOpen) {
          currentMenuItem.classList.add("open");
        }
      });
    });
    
    // Close overlay when window resizes above mobile breakpoint
    window.addEventListener("resize", () => {
      if (window.innerWidth > 1100 && overlay.classList.contains("open")) {
        hamburger.classList.remove("active");
        overlay.classList.remove("open");
      }
    });
  }
}

function initChatWidget() {
  const chatButton = document.getElementById('chatButton');
  const chatModal = document.getElementById('chatModal');
  const chatClose = document.getElementById('chatClose');
  const chatBackdrop = document.getElementById('chatBackdrop');
  const chatForm = document.getElementById('chatForm');
  
  if (!chatButton || !chatModal) return;
  
  // Footer collision detection
  function handleFooterCollision() {
    const footer = document.querySelector('.site-footer, footer');
    const chatWidget = document.querySelector('.chat-widget');
    
    if (!footer || !chatWidget) return;
    
    const footerRect = footer.getBoundingClientRect();
    const viewportHeight = window.innerHeight;
    const chatHeight = 60; // Approximate chat button height
    const bottomMargin = 20;
    
    // Check if footer is visible in viewport
    if (footerRect.top <= viewportHeight) {
      const overlapDistance = viewportHeight - footerRect.top + bottomMargin;
      chatWidget.style.transform = `translateY(-${overlapDistance}px)`;
    } else {
      chatWidget.style.transform = 'translateY(0)';
    }
  }
  
  // Open chat modal
  function openChat() {
    chatModal.classList.add('active');
    if (chatBackdrop) chatBackdrop.classList.add('active');
    document.body.classList.add('chat-modal-open');
    
    // Add modal-open class to chat widget for animation
    const chatWidget = document.querySelector('.chat-widget');
    if (chatWidget) chatWidget.classList.add('modal-open');
    
    // Reset textarea to original size and clear inline styles
    const textarea = chatModal.querySelector('textarea');
    if (textarea) {
      textarea.style.cssText = ''; // Clear all inline styles
      textarea.rows = 4; // Reset to default rows if needed
    }
    
    // Reset form data and remove any focus states
    const form = chatModal.querySelector('form');
    if (form) {
      form.reset();
      
      // Remove focus from all inputs
      const allInputs = form.querySelectorAll('input, textarea');
      allInputs.forEach(input => {
        input.blur();
        input.classList.remove('focused'); // Remove any custom focus classes
      });
    }
    
    // Focus first input
    const firstInput = chatModal.querySelector('input');
    if (firstInput) {
      setTimeout(() => firstInput.focus(), 350);
    }
  }
  
  // Close chat modal
  function closeChat() {
    // Start closing animation - add closing class to wrapper
    chatModal.classList.add('closing');
    
    // Remove modal-open class from chat widget immediately for visual feedback
    const chatWidget = document.querySelector('.chat-widget');
    if (chatWidget) chatWidget.classList.remove('modal-open');
    
    // Wait for animation to complete before fully hiding
    setTimeout(() => {
      // Now remove everything
      chatModal.classList.remove('active');
      chatModal.classList.remove('closing');
      if (chatBackdrop) chatBackdrop.classList.remove('active');
      document.body.classList.remove('chat-modal-open');
    }, 300); // Match the animation duration
  }
  
  // Event listeners
  chatButton.addEventListener('click', openChat);
  if (chatClose) chatClose.addEventListener('click', closeChat);
  
  // Close when clicking on the wrapper (outside modal)
  let mouseDownTarget = null;
  
  chatModal.addEventListener('mousedown', function(e) {
    mouseDownTarget = e.target;
  });
  
  chatModal.addEventListener('click', function(e) {
    // Only close if both mousedown and click happened on the modal wrapper
    if (e.target === chatModal && mouseDownTarget === chatModal) {
      closeChat();
    }
    mouseDownTarget = null;
  });
  
  // Close when clicking on backdrop
  if (chatBackdrop) {
    chatBackdrop.addEventListener('click', closeChat);
  }
  
  // Close on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && chatModal.classList.contains('active')) {
      closeChat();
    }
  });
  
  // Handle form submission
  if (chatForm) {
    chatForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Get form data
      const formData = new FormData(chatForm);
      const data = {
        name: formData.get('name'),
        email: formData.get('email'),
        message: formData.get('message')
      };
      
      // Simple validation
      if (!data.name.trim() || !data.email.trim() || !data.message.trim()) {
        alert('Παρακαλώ συμπληρώστε όλα τα πεδία');
        return;
      }
      
      // Simulate form submission (replace with actual implementation)
      const submitButton = chatForm.querySelector('.chat-submit');
      const originalText = submitButton.innerHTML;
      
      submitButton.innerHTML = '<span>Αποστολή...</span>';
      submitButton.disabled = true;
      
      setTimeout(() => {
        alert('Το μήνυμά σας στάλθηκε επιτυχώς!');
        chatForm.reset();
        closeChat();
        
        submitButton.innerHTML = originalText;
        submitButton.disabled = false;
      }, 1500);
    });
  }
  
  // Handle scroll and resize for footer collision
  let ticking = false;
  function updateChatPosition() {
    if (!ticking) {
      requestAnimationFrame(() => {
        handleFooterCollision();
        ticking = false;
      });
      ticking = true;
    }
  }
  
  window.addEventListener('scroll', updateChatPosition);
  window.addEventListener('resize', updateChatPosition);
  
  // Initial position check
  setTimeout(handleFooterCollision, 100);
  
  // Initialize floating labels
  initFloatingLabels();
}

function initFloatingLabels() {
  const floatingInputs = document.querySelectorAll('.floating-label input, .floating-label textarea');
  
  floatingInputs.forEach(input => {
    // Handle input events
    input.addEventListener('input', function() {
      if (this.value.trim() !== '') {
        this.classList.add('has-value');
      } else {
        this.classList.remove('has-value');
      }
    });
    
    // Handle focus events
    input.addEventListener('focus', function() {
      this.classList.add('is-focused');
    });
    
    // Handle blur events
    input.addEventListener('blur', function() {
      this.classList.remove('is-focused');
      if (this.value.trim() !== '') {
        this.classList.add('has-value');
      } else {
        this.classList.remove('has-value');
      }
    });
    
    // Check initial state
    if (input.value.trim() !== '') {
      input.classList.add('has-value');
    }
  });
}

// ===== Scroll Reveal Animation =====
function initScrollReveal() {
  const revealElements = document.querySelectorAll('.scroll-reveal');
  
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed');
      }
    });
  }, {
    threshold: 0.15,
    rootMargin: '50px 0px -50px 0px'
  });

  revealElements.forEach(el => {
    revealObserver.observe(el);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  injectPartials();
  initScrollReveal();
});
