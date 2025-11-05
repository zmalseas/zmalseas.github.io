<?php
/**
 * Template Name: Contact Page
 * 
 * @package Nerally
 */

get_header(); ?>

<main class="main-content" id="main-content">
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid two-col">
                <!-- Left: Just a heading for now -->
                <div class="contact-left" aria-hidden="false">
                    <h2 class="contact-hero"><?php _e('Contact us', 'nerally'); ?></h2>
                </div>

                <!-- Right: Contact form -->
                <div class="contact-right">
                    <form id="contactForm" class="contact-form" method="POST" novalidate>
                        <?php wp_nonce_field('nerally_nonce', 'nonce'); ?>
                        <input type="hidden" name="action" value="nerally_contact">
                        
                        <div class="form-row">
                            <div class="form-group floating-label">
                                <input type="text" id="name" name="name" required aria-required="true">
                                <label for="name"><?php _e('Ονοματεπώνυμο', 'nerally'); ?> *</label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="email" id="email" name="email" required aria-required="true">
                                <label for="email"><?php _e('Email', 'nerally'); ?> *</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group floating-label">
                                <input type="tel" id="phone" name="phone">
                                <label for="phone"><?php _e('Τηλέφωνο', 'nerally'); ?></label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="text" id="company" name="company">
                                <label for="company"><?php _e('Εταιρεία', 'nerally'); ?></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="service"><?php _e('Υπηρεσία Ενδιαφέροντος', 'nerally'); ?></label>
                            <select id="service" name="service">
                                <option value=""><?php _e('Επιλέξτε υπηρεσία', 'nerally'); ?></option>
                                <option value="logistiki"><?php _e('Λογιστική', 'nerally'); ?></option>
                                <option value="misthodosia"><?php _e('Μισθοδοσία', 'nerally'); ?></option>
                                <option value="assurance">Assurance</option>
                                <option value="consulting">Consulting</option>
                                <option value="social-media">Social Media</option>
                                <option value="epixorigiseis"><?php _e('Επιχορηγήσεις', 'nerally'); ?></option>
                                <option value="symvoulos-mixanikos"><?php _e('Σύμβουλος Μηχανικός', 'nerally'); ?></option>
                            </select>
                        </div>

                        <div class="form-group floating-label">
                            <textarea id="message" name="message" rows="5" required aria-required="true"></textarea>
                            <label for="message"><?php _e('Μήνυμα', 'nerally'); ?> *</label>
                        </div>

                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="privacy" name="privacy" required aria-required="true">
                                <span class="text-content">
                                    <?php _e('Συμφωνώ με την', 'nerally'); ?> 
                                    <a href="<?php echo home_url('/privacy-policy'); ?>" target="_blank">
                                        <?php _e('Πολιτική Απορρήτου', 'nerally'); ?>
                                    </a> *
                                </span>
                            </label>
                        </div>

                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="newsletter" name="newsletter">
                                <span class="text-content"><?php _e('Θέλω να λαμβάνω ενημερώσεις (newsletter)', 'nerally'); ?></span>
                            </label>
                        </div>

                        <div class="recaptcha-info">
                            <?php _e('Αυτός ο ιστότοπος προστατεύεται από το reCAPTCHA και ισχύουν η', 'nerally'); ?>
                            <a href="https://policies.google.com/privacy" target="_blank" rel="noopener"><?php _e('Πολιτική Απορρήτου', 'nerally'); ?></a> 
                            <?php _e('και οι', 'nerally'); ?>
                            <a href="https://policies.google.com/terms" target="_blank" rel="noopener"><?php _e('Όροι Υπηρεσίας', 'nerally'); ?></a> 
                            <?php _e('της Google.', 'nerally'); ?>
                        </div>

                        <button type="submit" class="submit-btn">
                            <span class="btn-text"><?php _e('Αποστολή Μηνύματος', 'nerally'); ?></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// WordPress-specific contact form handler
jQuery(document).ready(function($) {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        var submitBtn = form.find('.submit-btn');
        var formData = new FormData(this);
        
        // Add reCAPTCHA if available
        if (typeof grecaptcha !== 'undefined') {
            grecaptcha.execute(window.SITE_CONFIG.RECAPTCHA_SITE, {action: 'contact_form'}).then(function(token) {
                formData.append('recaptcha_token', token);
                submitForm(formData, form, submitBtn);
            });
        } else {
            submitForm(formData, form, submitBtn);
        }
    });
    
    function submitForm(formData, form, submitBtn) {
        submitBtn.prop('disabled', true).text('<?php _e('Αποστολή...', 'nerally'); ?>');
        
        $.ajax({
            url: window.SITE_CONFIG.AJAX_URL,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showMessage(response.data.message, 'success');
                    form[0].reset();
                } else {
                    showMessage(response.data.message || '<?php _e('Σφάλμα κατά την αποστολή.', 'nerally'); ?>', 'error');
                }
            },
            error: function() {
                showMessage('<?php _e('Σφάλμα δικτύου. Παρακαλώ δοκιμάστε ξανά.', 'nerally'); ?>', 'error');
            },
            complete: function() {
                submitBtn.prop('disabled', false).text('<?php _e('Αποστολή Μηνύματος', 'nerally'); ?>');
            }
        });
    }
    
    function showMessage(message, type) {
        var messageDiv = $('<div class="form-message ' + type + '"><div class="message-content"><span class="message-icon">' + (type === 'success' ? '✅' : '❌') + '</span><span class="message-text">' + message + '</span></div></div>');
        $('.contact-right').prepend(messageDiv);
        setTimeout(function() {
            messageDiv.remove();
        }, 8000);
    }
});
</script>

<?php get_footer(); ?>