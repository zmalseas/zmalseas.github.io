<?php
/**
 * Template Name: Rent Tax Calculator
 * 
 * @package Nerally
 */

get_header(); ?>

<main class="main-content" id="main-content">
    <div class="calculator-layout">
        <!-- Left Section - Information -->
        <div class="left-section">
            <div class="calculator-container">
                <h1 class="page-title"><?php _e('Υπολογιστής Φόρου Ενοικίων', 'nerally'); ?></h1>
                <p class="page-description">
                    <?php _e('Υπολογίστε εύκολα και γρήγορα τον φόρο που οφείλετε από ενοικιαστικά εισοδήματα. Ο υπολογιστής μας λαμβάνει υπόψη τις τρεις φορολογικές κλίμακες και υπολογίζει αυτόματα τις νόμιμες εκπτώσεις.', 'nerally'); ?>
                </p>
                
                <div class="info-box">
                    <h3>📋 <?php _e('Φορολογικές Κλίμακες 2025', 'nerally'); ?></h3>
                    <ul>
                        <li><strong>0€ - 12.000€:</strong> <?php _e('15% φόρος', 'nerally'); ?></li>
                        <li><strong>12.001€ - 35.000€:</strong> <?php _e('35% φόρος', 'nerally'); ?></li>
                        <li><strong><?php _e('Πάνω από 35.000€:', 'nerally'); ?></strong> <?php _e('45% φόρος', 'nerally'); ?></li>
                    </ul>
                </div>
                
                <div class="tip-box">
                    <h4>💡 <?php _e('Χρήσιμες Πληροφορίες', 'nerally'); ?></h4>
                    <p>
                        <?php _e('Το φορολογητέο εισόδημα υπολογίζεται αφαιρώντας αυτόματα το 5% των εσόδων ως τεκμαρτές δαπάνες συντήρησης και διαχείρισης.', 'nerally'); ?>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Right Section - Calculator -->
        <div class="right-section">
            <div class="calculator-container">
                <section class="calc-card">
                    <div class="calc-header">
                        <h2 class="calc-title-in-card"><?php _e('Φόρος Ενοικίων — Υπολογισμός & Κλιμάκια', 'nerally'); ?></h2>
                    </div>
                    
                    <div class="calc-grid">
                        <div>
                            <label class="calc-label" for="count"><?php _e('Αριθμός ακινήτων (1–5)', 'nerally'); ?></label>
                            <input class="calc-input" id="count" type="number" min="1" max="5" step="1" value="1" />
                        </div>
                        <div class="calc-muted" style="align-self:end; font-size: 12px;">
                            <?php _e('Συμπλήρωσε μίσθωμα/μήνες για κάθε ακίνητο και πάτησε', 'nerally'); ?> <strong><?php _e('Υπολογισμός', 'nerally'); ?></strong>.
                        </div>
                    </div>

                    <div id="props" class="calc-grid" style="margin-top:12px;"></div>

                    <div class="calc-controls">
                        <button id="calcBtn" class="calc-button primary" type="button"><?php _e('Υπολογισμός', 'nerally'); ?></button>
                        <button id="resetBtn" class="calc-button" type="button"><?php _e('Επαναφορά', 'nerally'); ?></button>
                    </div>
                </section>

                <section class="calc-card">
                    <h2 class="results-title"><?php _e('Αποτελέσματα', 'nerally'); ?></h2>
                    <div class="kpis">
                        <div class="kpi">
                            <div class="label"><?php _e('Συνολικά έσοδα', 'nerally'); ?></div>
                            <div id="gross" class="val">—</div>
                        </div>
                        <div class="kpi">
                            <div class="label"><?php _e('Φορολογητέο (95%)', 'nerally'); ?></div>
                            <div id="taxable" class="val">—</div>
                        </div>
                        <div class="kpi">
                            <div class="label"><?php _e('Φόρος', 'nerally'); ?></div>
                            <div id="tax" class="val">—</div>
                        </div>
                    </div>

                    <div>
                        <div class="brackets-title"><?php _e('Κλιμάκια φόρου', 'nerally'); ?></div>
                        <div class="calc-row" style="padding:0;">
                            <div class="table-wrapper">
                                <table class="calc-table">
                                    <thead>
                                        <tr>
                                            <th><?php _e('Κλιμάκιο', 'nerally'); ?></th>
                                            <th class="r"><?php _e('Ποσό', 'nerally'); ?></th>
                                            <th class="r"><?php _e('Συντελεστής', 'nerally'); ?></th>
                                            <th class="r"><?php _e('Φόρος', 'nerally'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody id="bracketRows">
                                        <tr><td colspan="4" class="calc-muted" style="text-align:center; padding:16px;"><?php _e('Δεν υπάρχουν υπολογισμοί ακόμη.', 'nerally'); ?></td></tr>
                                    </tbody>
                                    <tfoot id="bracketFoot"></tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="disclaimer">
                            <p>* <?php _e('Ο υπολογισμός είναι ενδεικτικός και βασίζεται στις ισχύουσες φορολογικές διατάξεις', 'nerally'); ?></p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>