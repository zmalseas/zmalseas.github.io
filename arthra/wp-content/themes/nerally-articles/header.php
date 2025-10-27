<?php if (!defined('ABSPATH')) { exit; } ?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="/images/logo.png" />
  <?php wp_head(); ?>
  <style>
    /* Compact Articles Header */
    .wp-articles-hero {
      background: #000;
      color: #fff;
      padding: 20px 0;
      margin: 40px 0 0 0;
      border-top: 1px solid #333;
    }
    
    /* Mobile - add spacing */
    @media (max-width: 768px) {
      .wp-articles-hero {
        margin-top: 20px;
        padding: 15px 0;
      }
    }
    
    .wp-articles-container {
      max-width: 100%;
      margin: 0;
      padding: 0 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 40px;
    }
    
    .wp-articles-text {
      flex: 0 0 auto;
      text-align: left;
    }
    
    .wp-articles-filters {
      flex: 0 0 auto;
      display: flex;
      gap: 16px;
      align-items: center;
      margin-left: auto;
    }
    
    /* Simple Text Animation */
    .articles-headline {
      font-size: clamp(18px, 2.5vw, 32px);
      font-weight: 700;
      margin: 0;
      letter-spacing: 0.5px;
      color: #fff;
    }
    
    .articles-animated-word {
      color: #fff;
      display: inline-block;
      min-width: 120px;
      transition: opacity 0.4s ease;
      white-space: pre; /* Preserve spaces */
    }
    
    .articles-animated-word.fade-out {
      opacity: 0;
    }
    
    .articles-animated-word.fade-in {
      opacity: 1;
    }
    
    /* Compact Filter Styles */
    .wp-filter-select {
      background: rgba(255,255,255,0.1);
      border: 1px solid rgba(255,255,255,0.2);
      color: #fff;
      padding: 8px 12px;
      border-radius: 4px;
      font-size: 13px;
      min-width: 120px;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    
    .wp-filter-select:hover {
      background: rgba(255,255,255,0.15);
      border-color: rgba(255,255,255,0.4);
    }
    
    .wp-filter-select option {
      background: #222;
      color: #fff;
    }
    
    /* Search Styles */
    .search-container {
      position: relative;
      margin-left: 16px;
    }
    
    .search-icon {
      background: #1a73e8;
      border: none;
      border-radius: 50%;
      width: 42px;
      height: 42px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(26, 115, 232, 0.3);
    }
    
    .search-icon:hover {
      background: #1557b0;
      transform: scale(1.05);
      box-shadow: 0 4px 12px rgba(26, 115, 232, 0.4);
    }
    
    .search-bar {
      position: absolute;
      top: 50px;
      right: 0;
      width: 300px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
      border: 1px solid #e2e8f0;
      opacity: 0;
      visibility: hidden;
      transform: translateY(-10px);
      transition: all 0.3s ease;
      z-index: 1000;
    }
    
    .search-bar.active {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }
    
    .search-bar input {
      width: 100%;
      padding: 16px 20px;
      border: none;
      border-radius: 12px;
      font-size: 14px;
      background: transparent;
      outline: none;
    }
    
    .search-bar input::placeholder {
      color: #94a3b8;
    }
    
    .search-results {
      max-height: 300px;
      overflow-y: auto;
      border-top: 1px solid #f1f5f9;
    }
    
    .search-result-item {
      padding: 12px 20px;
      border-bottom: 1px solid #f8fafc;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }
    
    .search-result-item:hover {
      background: #f8fafc;
    }
    
    .search-result-item:last-child {
      border-bottom: none;
    }
    
    .search-result-title {
      font-size: 14px;
      font-weight: 500;
      color: #1e293b;
      margin-bottom: 4px;
    }
    
    .search-result-excerpt {
      font-size: 12px;
      color: #64748b;
      line-height: 1.4;
    }
    
    .search-loading {
      padding: 20px;
      text-align: center;
      color: #94a3b8;
      font-size: 14px;
    }
    
    .search-no-results {
      padding: 20px;
      text-align: center;
      color: #64748b;
      font-size: 14px;
    }
    
    /* Sticky Navigation */  
    .site-header.sticky {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      background: rgba(0, 0, 0, 0.95);
    }
    
    .site-header.sticky .animated-text {
      font-size: 16px;
    }
    
    /* Breadcrumbs */
    .breadcrumbs {
      font-size: 14px;
      color: #64748b;
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
    }
    
    .breadcrumbs a {
      color: #1a73e8;
      text-decoration: none;
    }
    
    .breadcrumbs a:hover {
      text-decoration: underline;
    }
    
    .breadcrumb-separator {
      color: #94a3b8;
    }
    
    .breadcrumb-current {
      font-weight: 500;
      color: #1e293b;
    }
    
    /* Enhanced Single Meta */
    .single-meta {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      align-items: center;
      margin: 16px 0;
      font-size: 14px;
      color: #64748b;
    }
    
    .single-meta span {
      display: flex;
      align-items: center;
      gap: 4px;
    }
    
    /* Social Sharing */
    .social-share {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 24px 0;
      padding: 16px;
      background: #f8fafc;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
    }
    
    .share-label {
      font-weight: 500;
      color: #475569;
      font-size: 14px;
    }
    
    .share-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 8px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: all 0.2s ease;
      background: white;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      color: #64748b;
    }
    
    .share-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .share-btn.facebook { color: #1877f2; }
    .share-btn.facebook:hover { background: #1877f2; color: white; }
    .share-btn.twitter { color: #1da1f2; }
    .share-btn.twitter:hover { background: #1da1f2; color: white; }
    .share-btn.linkedin { color: #0077b5; }
    .share-btn.linkedin:hover { background: #0077b5; color: white; }
    .share-btn.copy { color: #6b7280; }
    .share-btn.copy:hover { background: #10b981; color: white; }
    
    /* Mobile Responsive */
    @media (max-width: 768px) {
      .wp-articles-container {
        flex-direction: column;
        gap: 20px;
        padding: 0 20px;
        align-items: stretch;
      }
      
      .wp-articles-text {
        text-align: center;
        flex: 1;
      }
      
      .wp-articles-filters {
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-left: 0;
      }
      
      .wp-filter-select {
        min-width: 110px;
        font-size: 12px;
      }
      
      .articles-headline {
        font-size: 24px;
      }
      
      .articles-animated-word {
        min-width: 100px;
      }
    }
    
    @media (max-width: 480px) {
      .wp-articles-hero {
        padding: 15px 0;
      }
      
      .carousel-track {
        gap: 8px;
        padding: 0 10px;
      }
      
      /* Search mobile adjustments */
      .search-container {
        margin-left: 8px;
      }
      
      .search-icon {
        width: 36px;
        height: 36px;
      }
      
      .search-bar {
        width: 280px;
        right: -10px;
      }
      
      /* Social sharing mobile */
      .social-share {
        flex-wrap: wrap;
        gap: 8px;
      }
      
      .share-btn {
        width: 32px;
        height: 32px;
        font-size: 14px;
      }
      
      /* Breadcrumbs mobile */
      .breadcrumbs {
        font-size: 12px;
        gap: 4px;
      }
      
      /* Single meta mobile */
      .single-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        font-size: 12px;
      }
      
      /* Sticky header mobile */
      .site-header.sticky .animated-text {
        font-size: 14px;
      }
    }
  </style>
</head>
<body <?php body_class(); ?>>

<?php
// Χρησιμοποιούμε τα partials του κεντρικού site από το filesystem, όχι με HTTP
$headerPartial = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/') . '/partials/header.php';
if (is_file($headerPartial)) {
  require $headerPartial;
} else {
  // Fallback (ελάχιστο): brand bar, ώστε να βλέπεις κάτι αν λείπει το partial
  echo '<header class="site-header"><div class="header-row"><a class="brand" href="/"><img src="/images/logo.png" alt="Nerally" width="36" height="36" /><span class="name">Nerally</span></a></div></header>';
}
?>

<!-- Compact Articles Header -->
<div class="wp-articles-hero">
  <div class="wp-articles-container">
    <div class="wp-articles-text">
      <h1 class="articles-headline">
        NERA<span class="articles-animated-word" id="animated-word"> LLY</span>
      </h1>
    </div>
    
    <div class="wp-articles-filters">
      <select class="wp-filter-select" id="category-filter" onchange="filterArticles()">
        <option value="">Κατηγορίες</option>
        <option value="Οικονομικά">Οικονομικά</option>
        <option value="Φορολογία">Φορολογία</option>
        <option value="Νομοθεσία">Νομοθεσία</option>
        <option value="Τεχνολογία">Τεχνολογία</option>
        <option value="Επιχειρήσεις">Επιχειρήσεις</option>
      </select>
      
      <select class="wp-filter-select" id="subcategory-filter" onchange="filterArticles()">
        <option value="">Υποκατηγορίες</option>
      </select>
      
      <select class="wp-filter-select" id="author-filter" onchange="filterArticles()">
        <option value="">Συντάκτες</option>
      </select>
      
      <!-- Search functionality -->
      <div class="search-container">
        <button class="search-icon" id="search-toggle" aria-label="Αναζήτηση">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="M21 21l-4.35-4.35"></path>
          </svg>
        </button>
        <div class="search-bar" id="search-bar">
          <input type="text" id="search-input" placeholder="Αναζήτηση άρθρων..." autocomplete="off">
          <div class="search-results" id="search-results"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// Simple Word Animation
document.addEventListener('DOMContentLoaded', function() {
  const animatedWord = document.getElementById('animated-word');
  if (!animatedWord) return;
  
  const words = [' LLY', ' ΑΡΘΡΑ', ' ΝΕΑ', ' ΜΕΛΕΤΕΣ', ' ΑΝΑΛΥΣΕΙΣ', ' ΟΔΗΓΟΙ', ' ΣΥΜΒΟΥΛΕΣ'];
  let currentIndex = 0;
  
  function changeWord() {
    animatedWord.classList.add('fade-out');
    
    setTimeout(() => {
      currentIndex = (currentIndex + 1) % words.length;
      animatedWord.textContent = words[currentIndex]; // Το κενό είναι ήδη στα words
      animatedWord.classList.remove('fade-out');
      animatedWord.classList.add('fade-in');
      
      setTimeout(() => {
        animatedWord.classList.remove('fade-in');
      }, 400);
    }, 200);
  }
  
  // Start animation after 2 seconds, then every 3 seconds
  setTimeout(() => {
    changeWord();
    setInterval(changeWord, 3000);
  }, 2000);
  
  // Search functionality
  const searchToggle = document.getElementById('search-toggle');
  const searchBar = document.getElementById('search-bar');
  const searchInput = document.getElementById('search-input');
  const searchResults = document.getElementById('search-results');
  let searchTimeout;
  
  if (searchToggle && searchBar) {
    searchToggle.addEventListener('click', function() {
      searchBar.classList.toggle('active');
      if (searchBar.classList.contains('active')) {
        searchInput.focus();
      }
    });
    
    // Close search when clicking outside
    document.addEventListener('click', function(e) {
      if (!e.target.closest('.search-container')) {
        searchBar.classList.remove('active');
      }
    });
    
    // Live search with debouncing
    searchInput.addEventListener('input', function() {
      const query = this.value.trim();
      
      clearTimeout(searchTimeout);
      
      if (query.length < 2) {
        searchResults.innerHTML = '';
        return;
      }
      
      searchResults.innerHTML = '<div class="search-loading">Αναζήτηση...</div>';
      
      searchTimeout = setTimeout(() => {
        performSearch(query);
      }, 300);
    });
  }
});

function performSearch(query) {
  fetch(`<?php echo admin_url('admin-ajax.php'); ?>?action=live_search&query=${encodeURIComponent(query)}`)
    .then(response => response.json())
    .then(data => {
      const searchResults = document.getElementById('search-results');
      
      if (data.success && data.data.length > 0) {
        searchResults.innerHTML = data.data.map(article => `
          <div class="search-result-item" onclick="window.location.href='${article.permalink}'">
            <div class="search-result-title">${article.title}</div>
            <div class="search-result-excerpt">${article.excerpt}</div>
          </div>
        `).join('');
      } else {
        searchResults.innerHTML = '<div class="search-no-results">Δεν βρέθηκαν αποτελέσματα</div>';
      }
    })
    .catch(error => {
      console.error('Search error:', error);
      document.getElementById('search-results').innerHTML = '<div class="search-no-results">Σφάλμα αναζήτησης</div>';
    });
}

// Sticky navigation
window.addEventListener('scroll', function() {
  const header = document.querySelector('.site-header');
  if (window.scrollY > 100) {
    header.classList.add('sticky');
  } else {
    header.classList.remove('sticky');
  }
});

// Copy to clipboard function
function copyToClipboard(text) {
  navigator.clipboard.writeText(text).then(function() {
    // Visual feedback
    const btn = event.target;
    const originalText = btn.textContent;
    btn.textContent = '✅';
    btn.style.background = '#10b981';
    btn.style.color = 'white';
    
    setTimeout(() => {
      btn.textContent = originalText;
      btn.style.background = '';
      btn.style.color = '';
    }, 2000);
  }).catch(function(err) {
    console.error('Could not copy text: ', err);
  });
}

// Filter functionality
function filterArticles() {
  const category = document.getElementById('category-filter').value;
  const subcategory = document.getElementById('subcategory-filter').value;
  const author = document.getElementById('author-filter').value;
  
  // Build query parameters
  const params = new URLSearchParams();
  if (category) params.append('filter_category', category);
  if (subcategory) params.append('filter_subcategory', subcategory);
  if (author) params.append('filter_author', author);
  
  // Redirect with filters
  const baseUrl = window.location.pathname.split('?')[0];
  const newUrl = params.toString() ? `${baseUrl}?${params.toString()}` : baseUrl;
  window.location.href = newUrl;
}

// Populate filter options based on existing posts
document.addEventListener('DOMContentLoaded', function() {
  // Set current filter values from URL
  const urlParams = new URLSearchParams(window.location.search);
  
  if (urlParams.has('filter_category')) {
    document.getElementById('category-filter').value = urlParams.get('filter_category');
  }
  if (urlParams.has('filter_subcategory')) {
    document.getElementById('subcategory-filter').value = urlParams.get('filter_subcategory');
  }
  if (urlParams.has('filter_author')) {
    document.getElementById('author-filter').value = urlParams.get('filter_author');
  }
});
</script>

<main id="main-content" class="main-content">
