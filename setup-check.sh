#!/bin/bash

# Nerally Contact Form Setup Checker
# Run this script to verify your contact form setup

echo "🔍 Nerally Contact Form Setup Checker"
echo "======================================"

# Check PHP version
echo ""
echo "📋 Checking PHP setup..."
php -v 2>/dev/null || echo "❌ PHP not found in PATH"

# Check required PHP extensions
echo ""
echo "📋 Checking PHP extensions..."
php -m | grep -i curl >/dev/null && echo "✅ cURL extension found" || echo "❌ cURL extension missing"
php -m | grep -i json >/dev/null && echo "✅ JSON extension found" || echo "❌ JSON extension missing"
php -m | grep -i openssl >/dev/null && echo "✅ OpenSSL extension found" || echo "❌ OpenSSL extension missing"

# Check files exist
echo ""
echo "📋 Checking required files..."
[ -f "contact-handler.php" ] && echo "✅ contact-handler.php found" || echo "❌ contact-handler.php missing"
[ -f "config.php" ] && echo "✅ config.php found" || echo "❌ config.php missing"
[ -f "js/contact-form.js" ] && echo "✅ contact-form.js found" || echo "❌ contact-form.js missing"
[ -f "css/contact-form.css" ] && echo "✅ contact-form.css found" || echo "❌ contact-form.css missing"

# Check logs directory
echo ""
echo "📋 Checking logs directory..."
[ -d "logs" ] && echo "✅ logs directory found" || echo "❌ logs directory missing"

# Check for reCAPTCHA keys
echo ""
echo "📋 Checking configuration..."
if [ -f "config.php" ]; then
    if grep -q "YOUR_RECAPTCHA_SITE_KEY_HERE" config.php; then
        echo "❌ reCAPTCHA Site Key not configured"
    else
        echo "✅ reCAPTCHA Site Key configured"
    fi
    
    if grep -q "YOUR_RECAPTCHA_SECRET_KEY_HERE" config.php; then
        echo "❌ reCAPTCHA Secret Key not configured"
    else
        echo "✅ reCAPTCHA Secret Key configured"
    fi
fi

if [ -f "js/contact-form.js" ]; then
    if grep -q "YOUR_RECAPTCHA_SITE_KEY_HERE" js/contact-form.js; then
        echo "❌ JavaScript reCAPTCHA Site Key not configured"
    else
        echo "✅ JavaScript reCAPTCHA Site Key configured"
    fi
fi

# Test PHP syntax
echo ""
echo "📋 Testing PHP syntax..."
php -l contact-handler.php >/dev/null 2>&1 && echo "✅ contact-handler.php syntax OK" || echo "❌ contact-handler.php syntax error"
php -l config.php >/dev/null 2>&1 && echo "✅ config.php syntax OK" || echo "❌ config.php syntax error"

# Test contact handler
echo ""
echo "📋 Testing contact handler..."
if [ -f "contact-handler.php" ]; then
    # Create test request
    curl -s -X POST -H "Content-Type: application/json" \
         -d '{"test": true}' \
         http://localhost/contact-handler.php >/dev/null 2>&1 && \
         echo "✅ Contact handler responds to requests" || \
         echo "⚠️  Contact handler test skipped (requires web server)"
fi

echo ""
echo "📋 Setup Summary:"
echo "=================="
echo "🌐 Test URL: http://localhost/contact-form-test.html"
echo "📧 Email destination: info@nerally.gr"
echo "🔑 reCAPTCHA Site Key: 6Lcd7dcrAAAAADzfwDc4AG_kN6jKU0-0Fo78NmYx"
echo "📝 Logs location: logs/"
echo ""
echo "✅ Setup complete! Test your form at the URL above."
echo ""
echo "🔧 Troubleshooting:"
echo "- Check browser console for JavaScript errors"
echo "- Check logs/ directory for PHP errors"
echo "- Verify your domain is registered with reCAPTCHA"
echo "- Test with different email addresses"