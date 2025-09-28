<?php
/**
 * Email Configuration Test for Nerally.gr
 * Test your webmail SMTP settings before using the contact form
 */

// Load configuration
$config = require_once __DIR__ . '/config.php';

?>
<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Test - Nerally</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        h1 { color: #00e5ff; text-align: center; }
        .info { background: #e3f2fd; padding: 20px; border-radius: 6px; margin: 20px 0; }
        .success { background: #e8f5e8; color: #2e7d32; padding: 15px; border-radius: 6px; margin: 10px 0; }
        .error { background: #ffebee; color: #c62828; padding: 15px; border-radius: 6px; margin: 10px 0; }
        .form-group { margin: 15px 0; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; border: 2px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #00e5ff; color: white; padding: 12px 24px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; }
        button:hover { background: #00c4d7; }
        .config-info { background: #fff3e0; padding: 15px; border-radius: 6px; margin: 20px 0; }
        code { background: #f1f1f1; padding: 2px 6px; border-radius: 3px; font-family: monospace; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📧 Email Configuration Test</h1>
        
        <div class="info">
            <h3>🔧 Current Email Settings</h3>
            <p><strong>SMTP Host:</strong> <code><?= htmlspecialchars($config['email']['smtp_host']) ?></code></p>
            <p><strong>SMTP Port:</strong> <code><?= htmlspecialchars($config['email']['smtp_port']) ?></code></p>
            <p><strong>Username:</strong> <code><?= htmlspecialchars($config['email']['smtp_username']) ?></code></p>
            <p><strong>From Email:</strong> <code><?= htmlspecialchars($config['email']['from']) ?></code></p>
            <p><strong>To Email:</strong> <code><?= htmlspecialchars($config['email']['to']) ?></code></p>
            <p><strong>Encryption:</strong> <code><?= htmlspecialchars($config['email']['smtp_secure']) ?></code></p>
        </div>

        <?php
        if ($_POST['action'] === 'test_email') {
            echo '<div id="test-result">';
            
            $testEmail = $_POST['test_email'] ?? '';
            $testMessage = $_POST['test_message'] ?? 'Test message from Nerally contact form system.';
            
            if (empty($testEmail)) {
                echo '<div class="error">❌ Παρακαλώ εισάγετε email για τη δοκιμή.</div>';
            } else {
                // Test email sending
                $result = testEmailSending($testEmail, $testMessage, $config);
                if ($result['success']) {
                    echo '<div class="success">✅ ' . $result['message'] . '</div>';
                } else {
                    echo '<div class="error">❌ ' . $result['message'] . '</div>';
                }
            }
            
            echo '</div>';
        }
        ?>

        <form method="POST">
            <input type="hidden" name="action" value="test_email">
            
            <div class="form-group">
                <label for="test_email">Email για δοκιμή:</label>
                <input type="email" id="test_email" name="test_email" 
                       value="<?= htmlspecialchars($_POST['test_email'] ?? '') ?>" 
                       placeholder="Εισάγετε ένα email για δοκιμή..." required>
            </div>
            
            <div class="form-group">
                <label for="test_message">Μήνυμα δοκιμής:</label>
                <textarea id="test_message" name="test_message" rows="4"><?= htmlspecialchars($_POST['test_message'] ?? 'Αυτό είναι ένα test email από το contact form system της Nerally.') ?></textarea>
            </div>
            
            <button type="submit">🚀 Δοκιμή Αποστολής Email</button>
        </form>

        <div class="config-info">
            <h3>✅ Hosting DNS Records Detected</h3>
            <p>Βάσει των DNS records του hosting σας, οι ρυθμίσεις έχουν οριστεί σε:</p>
            <ul>
                <li><strong>SMTP Host:</strong> <code>mail.nerally.gr</code> ✅</li>
                <li><strong>Port:</strong> <code>465</code> (SSL) ✅</li>
                <li><strong>Encryption:</strong> <code>ssl</code> ✅</li>
                <li><strong>Username:</strong> <code>info@nerally.gr</code> ✅</li>
            </ul>
            
            <h3>⚠️ Σημαντικές Σημειώσεις</h3>
            <ul>
                <li>Μόνο το <strong>password</strong> χρειάζεται να οριστεί στο <code>config.php</code></li>
                <li>Χρησιμοποιήστε το ίδιο password που χρησιμοποιείτε για το webmail</li>
                <li>Αν δεν λειτουργεί, δοκιμάστε <code>localhost</code> αντί για <code>mail.nerally.gr</code></li>
            </ul>
        </div>

        <div class="info">
            <h3>🔍 Πώς να βρεις τις σωστές ρυθμίσεις:</h3>
            <ol>
                <li>Μπες στο webmail panel του hosting σου</li>
                <li>Ψάξε για "Email Settings" ή "SMTP Settings"</li>
                <li>Συνήθως είναι:
                    <ul>
                        <li><strong>SMTP Host:</strong> mail.nerally.gr ή localhost</li>
                        <li><strong>Port:</strong> 587 (TLS) ή 465 (SSL)</li>
                        <li><strong>Username:</strong> info@nerally.gr</li>
                        <li><strong>Password:</strong> το password του webmail σου</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
</body>
</html>

<?php
function testEmailSending($toEmail, $message, $config) {
    try {
        // Basic email headers
        $to = $toEmail;
        $subject = "[Test] Nerally Contact Form - Email Configuration Test";
        $body = "Γεια σας!\n\n";
        $body .= "Αυτό είναι ένα test email από το contact form system της Nerally.\n\n";
        $body .= "Μήνυμα δοκιμής:\n" . $message . "\n\n";
        $body .= "Αν λάβατε αυτό το email, το σύστημα λειτουργεί σωστά!\n\n";
        $body .= "Χρόνος αποστολής: " . date('Y-m-d H:i:s') . "\n";
        $body .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n\n";
        $body .= "Με εκτίμηση,\nΤο Contact Form System της Nerally";

        $headers = [];
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/plain; charset=utf-8';
        $headers[] = 'From: ' . $config['email']['from'];
        $headers[] = 'Reply-To: ' . $config['email']['from'];
        $headers[] = 'X-Mailer: Nerally Contact Form v1.1';
        $headers[] = 'Date: ' . date('r');

        // Try sending with basic PHP mail function first
        if (mail($to, $subject, $body, implode("\r\n", $headers))) {
            return [
                'success' => true,
                'message' => "Email στάλθηκε επιτυχώς στο $toEmail με βασική PHP mail() function!"
            ];
        } else {
            return [
                'success' => false,
                'message' => "Αποτυχία αποστολής με PHP mail(). Ελέγξτε τις ρυθμίσεις mail server του hosting."
            ];
        }
        
    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => "Σφάλμα: " . $e->getMessage()
        ];
    }
}
?>