<?php
/**
 * Navigation Buttons (Back to Top & Back to Articles)
 */

// Add navigation buttons HTML
add_action('wp_footer', 'nerally_navigation_buttons');
function nerally_navigation_buttons() {
    if (!is_single()) {
        return;
    }
    ?>
    <button id="nerally-back-to-top" aria-label="Επιστροφή στην κορυφή">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 4l-8 8h5v8h6v-8h5z"/>
        </svg>
    </button>
    <?php
}

// Add CSS and JavaScript
add_action('wp_head', 'nerally_navigation_styles');
function nerally_navigation_styles() {
    if (!is_single()) {
        return;
    }
    ?>
    <style>
    #nerally-back-to-top {
        position: fixed;
        bottom: 100px;
        right: 30px;
        width: 48px;
        height: 48px;
        background: rgba(255, 255, 255, 0.95);
        border: none;
        border-radius: 50%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 9998;
    }
    #nerally-back-to-top.visible {
        opacity: 1;
        visibility: visible;
    }
    #nerally-back-to-top:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
    }
    #nerally-back-to-top svg {
        width: 24px;
        height: 24px;
        fill: #374151;
    }
    </style>
    <?php
}

add_action('wp_footer', 'nerally_navigation_scripts');
function nerally_navigation_scripts() {
    if (!is_single()) {
        return;
    }
    ?>
    <script>
    (function() {
        var backToTop = document.getElementById('nerally-back-to-top');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });
        
        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    })();
    </script>
    <?php
}
