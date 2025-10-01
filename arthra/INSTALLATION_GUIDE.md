# WordPress Installation & Setup Guide για Nerally Blog

## 📋 Προαπαιτούμενα

### Server Requirements
- PHP 7.4+ (συνιστάται 8.0+)
- MySQL 5.6+ ή MariaDB 10.1+
- Apache ή Nginx
- mod_rewrite enabled
- SSL Certificate
- Ελάχιστη μνήμη: 256MB

### Domain & Hosting Setup
- Subdirectory: `nerally.gr/arthra/`
- Database: Ξεχωριστή βάση ή με prefix `wp_arthra_`
- File permissions: 755 για directories, 644 για files

## 🚀 Εγκατάσταση

### Βήμα 1: Download WordPress Core
```bash
# Navigate to arthra directory
cd /path/to/nerally.gr/arthra/

# Download latest WordPress
wget https://wordpress.org/latest.tar.gz
tar -xzf latest.tar.gz
mv wordpress/* .
rm -rf wordpress latest.tar.gz
```

### Βήμα 2: Database Setup
```sql
-- Δημιουργία βάσης δεδομένων
CREATE DATABASE nerally_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Δημιουργία χρήστη (αντικαταστήστε με ασφαλή στοιχεία)
CREATE USER 'nerally_blog_user'@'localhost' IDENTIFIED BY 'STRONG_PASSWORD';
GRANT ALL PRIVILEGES ON nerally_blog.* TO 'nerally_blog_user'@'localhost';
FLUSH PRIVILEGES;
```

### Βήμα 3: WordPress Configuration
```bash
# Copy sample config
cp wp-config-sample.php wp-config.php

# Edit configuration (χρησιμοποιήστε το δικό σας wp-config-sample.php)
nano wp-config.php
```

### Βήμα 4: Set File Permissions
```bash
# Set proper permissions
find /path/to/arthra/ -type d -exec chmod 755 {} \;
find /path/to/arthra/ -type f -exec chmod 644 {} \;
chmod 600 wp-config.php
```

### Βήμα 5: Run WordPress Installation
1. Πηγαίνετε στο `https://nerally.gr/arthra/wp-admin/install.php`
2. Ακολουθήστε τον οδηγό εγκατάστασης
3. Δημιουργήστε admin account

## 🎨 Theme Setup

### Βήμα 1: Activate Nerally Theme
1. Πηγαίνετε στο WordPress Admin → Appearance → Themes
2. Activate το "Nerally Blog Theme"

### Βήμα 2: Configure Theme Settings
```php
// Αν χρειάζεται customization, προσθέστε στο functions.php
add_action('after_setup_theme', 'nerally_custom_setup');
function nerally_custom_setup() {
    // Custom theme configurations
}
```

### Βήμα 3: Import Sample Content (Optional)
```bash
# Create sample posts via WP-CLI
wp post create --post_type=article --post_title="Νέες Φορολογικές Αλλαγές 2025" --post_content="Sample content..." --post_status=publish
```

## 🔧 Plugin Recommendations

### Essential Plugins
```bash
# Install via WP-CLI
wp plugin install yoast-seo --activate
wp plugin install w3-total-cache --activate
wp plugin install wordfence --activate
wp plugin install updraftplus --activate
```

### Recommended Plugins
- **Yoast SEO**: SEO optimization
- **W3 Total Cache**: Performance caching
- **Wordfence**: Security scanning
- **UpdraftPlus**: Backup solution
- **Smush**: Image optimization
- **Contact Form 7**: Forms (αν χρειάζεται)

## 🔒 Security Configuration

### Βήμα 1: .htaccess Security Rules
```apache
# WordPress Security Headers
<IfModule mod_headers.c>
    Header always set X-Frame-Options DENY
    Header always set X-Content-Type-Options nosniff
    Header always set Referrer-Policy strict-origin-when-cross-origin
    Header always set Permissions-Policy "geolocation=(), microphone=(), camera=()"
</IfModule>

# Hide wp-config.php
<files wp-config.php>
order allow,deny
deny from all
</files>

# Block access to sensitive files
<FilesMatch "^.*(error_log|wp-config\.php|php.ini|\.[hH][tT][aApP].*)$">
Order deny,allow
Deny from all
</FilesMatch>
```

### Βήμα 2: Additional Security
```php
// Προσθήκη στο wp-config.php

// Disable file editing
define('DISALLOW_FILE_EDIT', true);

// Hide WordPress version
remove_action('wp_head', 'wp_generator');

// Disable XML-RPC if not needed
add_filter('xmlrpc_enabled', '__return_false');
```

## 🔗 Integration με Main Site

### Shared Resources
```php
// στο functions.php
function nerally_enqueue_shared_assets() {
    // Main site CSS
    wp_enqueue_style('nerally-main', get_template_directory_uri() . '/../../main.css');
    wp_enqueue_style('nerally-components', get_template_directory_uri() . '/../../css/components.css');
    
    // Main site JS
    wp_enqueue_script('nerally-main', get_template_directory_uri() . '/../../app.js');
}
```

### Cross-site Navigation
```php
// Breadcrumb integration
function nerally_breadcrumb() {
    echo '<nav class="breadcrumb">';
    echo '<a href="https://nerally.gr/">Αρχική</a> → ';
    echo '<a href="' . home_url('/') . '">Άρθρα</a>';
    if (is_single()) {
        echo ' → ' . get_the_title();
    }
    echo '</nav>';
}
```

## 📈 SEO Configuration

### Yoast SEO Settings
1. **General**: Enable XML sitemaps
2. **Appearance**: Configure title templates
3. **Social**: Set up Open Graph και Twitter Cards
4. **Advanced**: Enable breadcrumbs

### Custom SEO Meta
```php
// Custom meta fields (ήδη υπάρχει στο functions.php)
add_action('add_meta_boxes', 'nerally_seo_meta_boxes');
```

## 🚀 Performance Optimization

### Caching Setup (W3 Total Cache)
1. **Page Cache**: Enable disk enhanced
2. **Minify**: Enable CSS και JS minification
3. **Database Cache**: Enable
4. **Object Cache**: Enable if Redis available

### Image Optimization
```php
// Custom image sizes (ήδη στο functions.php)
add_image_size('article-thumbnail', 400, 250, true);
add_image_size('article-featured', 800, 400, true);
```

## 📱 Mobile Optimization

### Responsive Design
- Theme ήδη responsive
- Touch-friendly navigation
- Mobile-optimized images

### AMP (Optional)
```bash
# Install AMP plugin if needed
wp plugin install amp --activate
```

## 📊 Analytics & Monitoring

### Google Analytics Integration
```php
// Προσθήκη στο header.php ή μέσω plugin
// Χρησιμοποιήστε το ίδιο GTM με το main site για unified tracking
```

### Performance Monitoring
- **Query Monitor**: Development debugging
- **P3**: Plugin performance profiler
- **GTmetrix**: Speed testing

## 🔄 Maintenance & Updates

### Automated Updates
```php
// στο wp-config.php
define('WP_AUTO_UPDATE_CORE', true);
define('WP_AUTO_UPDATE_CORE_MINOR', true);
```

### Backup Schedule
```bash
# Via UpdraftPlus ή custom cron
0 2 * * 0 /usr/local/bin/wp db export /backups/nerally-blog-$(date +\%Y\%m\%d).sql --path=/path/to/arthra/
```

### Update Process
1. **Staging Environment**: Test updates εδώ πρώτα
2. **Backup**: Πάντα backup πριν τις updates
3. **Update Order**: Core → Plugins → Theme
4. **Testing**: Full site functionality test

## 🐛 Troubleshooting

### Common Issues
```bash
# Clear cache
wp cache flush

# Regenerate permalinks
wp rewrite flush

# Check file permissions
find /path/to/arthra/ -type f ! -perm 644 -exec chmod 644 {} \;
find /path/to/arthra/ -type d ! -perm 755 -exec chmod 755 {} \;

# Debug mode
# Προσθήκη στο wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

### Error Log Locations
- WordPress: `/wp-content/debug.log`
- Server: `/var/log/apache2/error.log` ή `/var/log/nginx/error.log`
- PHP: Check `php.ini` για error_log location

## 📞 Support & Resources

### Documentation
- [WordPress Codex](https://codex.wordpress.org/)
- [Nerally Theme Guide](./THEME_DOCUMENTATION.md)
- [Security Best Practices](https://wordpress.org/support/article/hardening-wordpress/)

### Emergency Contacts
- **Hosting Support**: [Provider contact]
- **Developer**: [Your contact]
- **DNS/Domain**: [Domain registrar]

---

**ΣΗΜΑΝΤΙΚΟ**: Κρατήστε αντίγραφα ασφαλείας και δοκιμάστε όλες τις αλλαγές σε staging environment πριν την production εφαρμογή.