<?php
/**
 * Template Name: Income Tax Calculator
 * 
 * @package Nerally
 */

get_header(); ?>

<main class="main-content" id="main-content">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title"><?php _e('Υπολογιστής Φόρου Εισοδήματος', 'nerally'); ?></h1>
            <p class="page-description">
                <?php _e('Υπολογίστε τον φόρο εισοδήματος που οφείλετε βάσει των εσόδων σας και της οικογενειακής σας κατάστασης.', 'nerally'); ?>
            </p>
        </div>

        <div class="calculator-grid">
            <div class="calculator-form">
                <div class="calculator-card">
                    <h2><?php _e('Στοιχεία Εισοδήματος', 'nerally'); ?></h2>
                    
                    <form id="incomeCalculatorForm">
                        <div class="form-section">
                            <div class="form-group">
                                <label for="annual-income"><?php _e('Ετήσιο Εισόδημα (€)', 'nerally'); ?></label>
                                <input type="number" id="annual-income" name="annual_income" min="0" step="100" placeholder="0">
                            </div>
                            
                            <div class="form-group">
                                <label for="marital-status"><?php _e('Οικογενειακή Κατάσταση', 'nerally'); ?></label>
                                <select id="marital-status" name="marital_status">
                                    <option value="single"><?php _e('Άγαμος/η', 'nerally'); ?></option>
                                    <option value="married"><?php _e('Έγγαμος/η', 'nerally'); ?></option>
                                    <option value="divorced"><?php _e('Διαζευγμένος/η', 'nerally'); ?></option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="children"><?php _e('Αριθμός Τέκνων', 'nerally'); ?></label>
                                <input type="number" id="children" name="children" min="0" max="10" value="0">
                            </div>
                            
                            <div class="form-group">
                                <label for="other-deductions"><?php _e('Άλλες Εκπτώσεις (€)', 'nerally'); ?></label>
                                <input type="number" id="other-deductions" name="other_deductions" min="0" step="100" value="0">
                            </div>
                        </div>
                        
                        <div class="button-group">
                            <button type="submit" class="calculate-btn"><?php _e('Υπολογισμός', 'nerally'); ?></button>
                            <button type="reset" class="btn-secondary"><?php _e('Επαναφορά', 'nerally'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="results-section">
                <div id="calculatorResults" class="results-container" style="display: none;">
                    <h3><?php _e('Αποτελέσματα Υπολογισμού', 'nerally'); ?></h3>
                    
                    <div class="result-item">
                        <span><?php _e('Ακαθάριστο Εισόδημα:', 'nerally'); ?></span>
                        <span id="gross-income" class="result-value">€0</span>
                    </div>
                    
                    <div class="result-item">
                        <span><?php _e('Εκπτώσεις:', 'nerally'); ?></span>
                        <span id="total-deductions" class="result-value">€0</span>
                    </div>
                    
                    <div class="result-item">
                        <span><?php _e('Φορολογητέο Εισόδημα:', 'nerally'); ?></span>
                        <span id="taxable-income" class="result-value">€0</span>
                    </div>
                    
                    <div class="result-item">
                        <span><?php _e('Φόρος Εισοδήματος:', 'nerally'); ?></span>
                        <span id="income-tax" class="result-value">€0</span>
                    </div>
                    
                    <div class="result-item">
                        <span><?php _e('Καθαρό Εισόδημα:', 'nerally'); ?></span>
                        <span id="net-income" class="result-value">€0</span>
                    </div>
                    
                    <div class="tax-breakdown">
                        <h4><?php _e('Ανάλυση Φορολογικών Κλιμακίων', 'nerally'); ?></h4>
                        <div id="tax-brackets"></div>
                    </div>
                </div>
                
                <div class="info-section">
                    <div class="warning-box">
                        <h4>⚠️ <?php _e('Σημαντικό', 'nerally'); ?></h4>
                        <p><?php _e('Ο υπολογισμός είναι ενδεικτικός και βασίζεται στις γενικές φορολογικές διατάξεις. Για ακριβή υπολογισμό και φορολογικό σχεδιασμό, συμβουλευτείτε έναν εξειδικευμένο φοροτεχνικό.', 'nerally'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="contact-cta">
            <h3><?php _e('Χρειάζεστε βοήθεια;', 'nerally'); ?></h3>
            <p><?php _e('Οι φοροτεχνικοί μας είναι εδώ για να σας βοηθήσουν με τους υπολογισμούς και την υποβολή της δήλωσής σας.', 'nerally'); ?></p>
            <a href="<?php echo home_url('/contact'); ?>" class="cta-button">
                <?php _e('Επικοινωνήστε μαζί μας', 'nerally'); ?>
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>