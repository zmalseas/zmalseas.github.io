<?php
/**
 * Footer template for Nerally WordPress theme
 * Integrates με το υπάρχον Nerally site design
 */
?>

<!-- Footer που συνδέεται με το main site -->
<footer class="main-footer">
    <div class="footer-container">
        
        <!-- Footer Content -->
        <div class="footer-content">
            
            <!-- Company Info -->
            <div class="footer-section">
                <div class="footer-brand">
                    <img src="<?php echo get_template_directory_uri(); ?>/../../images/logo.png" alt="Nerally" class="footer-logo">
                    <h3>Nerally</h3>
                </div>
                <p class="footer-description">
                    Αξιόπιστες λογιστικές και φοροτεχνικές υπηρεσίες για την επιχείρησή σας.
                </p>
                
                <!-- Social Links -->
                <div class="footer-social">
                    <a href="#" class="social-link tiktok" aria-label="TikTok">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                        </svg>
                    </a>
                    <a href="#" class="social-link instagram" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="social-link linkedin" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="footer-section">
                <h4>Χρήσιμοι Σύνδεσμοι</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/../../')); ?>">Αρχική</a></li>
                    <li><a href="<?php echo esc_url(home_url('/../../etairia/')); ?>">Εταιρεία</a></li>
                    <li><a href="<?php echo esc_url(home_url('/../../ipiresies/')); ?>">Υπηρεσίες</a></li>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="current">Άρθρα</a></li>
                    <li><a href="<?php echo esc_url(home_url('/../../epikoinonia/')); ?>">Επικοινωνία</a></li>
                </ul>
            </div>
            
            <!-- Article Categories -->
            <div class="footer-section">
                <h4>Κατηγορίες Άρθρων</h4>
                <ul class="footer-links">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'article_category',
                        'hide_empty' => false,
                        'number' => 5
                    ));
                    
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<li><a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a></li>';
                        }
                    } else {
                        echo '<li><a href="#">Φορολογία</a></li>';
                        echo '<li><a href="#">Λογιστική</a></li>';
                        echo '<li><a href="#">Κυβερνοασφάλεια</a></li>';
                        echo '<li><a href="#">Επιχορηγήσεις</a></li>';
                    }
                    ?>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="footer-section">
                <h4>Επικοινωνία</h4>
                <div class="footer-contact">
                    <div class="contact-item">
                        <span class="contact-icon">📞</span>
                        <a href="tel:+306946365798">+30 694 636 5798</a>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">✉️</span>
                        <a href="mailto:info@nerally.gr">info@nerally.gr</a>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">🕐</span>
                        <span>Δευτέρα - Παρασκευή<br>9:00 - 17:00</span>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            
            <!-- Legal Links -->
            <div class="footer-legal">
                <a href="#privacy" class="legal-link" data-legal-open="privacy">Πολιτική Απορρήτου</a>
                <a href="#terms" class="legal-link" data-legal-open="terms">Όροι Χρήσης</a>
                <a href="#cookies" class="legal-link" data-legal-open="cookies">Cookies</a>
                <a href="#gdpr" class="legal-link" data-legal-open="gdpr">GDPR</a>
            </div>
            
            <!-- Copyright -->
            <div class="footer-copyright">
                <p>&copy; <?php echo date('Y'); ?> Nerally. Όλα τα δικαιώματα διατηρούνται.</p>
            </div>
            
        </div>
        
    </div>
</footer>

<!-- Chat Widget Integration -->
<div id="chat-placeholder"></div>

<!-- Scripts -->
<script>
// Load chat widget if available
if (typeof loadChatWidget === 'function') {
    loadChatWidget();
} else {
    // Fallback to load from main site
    fetch('<?php echo get_template_directory_uri(); ?>/../../partials/chat.html')
        .then(response => response.text())
        .then(html => {
            document.getElementById('chat-placeholder').innerHTML = html;
        })
        .catch(error => console.log('Chat widget not available'));
}
</script>

<?php wp_footer(); ?>

</body>
</html>