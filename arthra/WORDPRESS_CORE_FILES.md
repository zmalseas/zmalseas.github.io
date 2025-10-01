# WordPress Core Files Checklist

## Αρχεία και φάκελοι που πρέπει να προστεθούν στον /arthra φάκελο:

### 📁 WordPress Core Directories (Download from wordpress.org)
```
wp-admin/           # WordPress administration interface
wp-includes/        # WordPress core PHP files and libraries
```

### 📄 WordPress Core Files (Download from wordpress.org)
```
wp-activate.php
wp-blog-header.php
wp-comments-post.php
wp-config-sample.php    # (χρησιμοποίησε το δικό μας wp-config-sample.php)
wp-cron.php
wp-links-opml.php
wp-load.php
wp-login.php
wp-mail.php
wp-settings.php
wp-signup.php
wp-trackback.php
xmlrpc.php
license.txt
readme.html
```

## 🔽 Download Instructions

### Option 1: Manual Download
1. Πήγαινε στο https://wordpress.org/download/
2. Download το latest WordPress
3. Extract στον arthra φάκελο
4. Αντικατάστησε το wp-config-sample.php με το δικό μας

### Option 2: WP-CLI (αν έχεις πρόσβαση)
```bash
cd /path/to/arthra/
wp core download --skip-content
```

### Option 3: Direct Links
- Latest WordPress: https://wordpress.org/latest.zip
- Greek Language Pack: https://el.wordpress.org/latest-el.zip

## ⚠️ ΣΗΜΑΝΤΙΚΟ

**ΜΗΝ ΑΝΤΙΚΑΤΑΣΤΗΣΕΙΣ:**
- `wp-content/themes/nerally-theme/` (το custom theme μας)
- `wp-config-sample.php` (το δικό μας configuration)
- `.htaccess` (οι δικές μας security rules)
- `index.php` (το δικό μας entry point)

**ΑΝΤΙΚΑΤΑΣΤΗΣΕ ΜΟΝΟ:**
- Τα WordPress core files από το official download

## 📊 Expected Final Structure
```
arthra/
├── .htaccess                    # ✅ Δικό μας
├── index.php                    # ✅ Δικό μας  
├── wp-activate.php              # 🔽 WordPress core
├── wp-admin/                    # 🔽 WordPress core
├── wp-blog-header.php           # 🔽 WordPress core
├── wp-comments-post.php         # 🔽 WordPress core
├── wp-config-sample.php         # ✅ Δικό μας
├── wp-content/                  # ✅ Δικό μας + WordPress
│   ├── themes/
│   │   └── nerally-theme/       # ✅ Δικό μας
│   ├── plugins/                 # 🔽 WordPress core (empty)
│   └── uploads/                 # 🔽 WordPress core (empty)
├── wp-cron.php                  # 🔽 WordPress core
├── wp-includes/                 # 🔽 WordPress core
├── wp-links-opml.php            # 🔽 WordPress core
├── wp-load.php                  # 🔽 WordPress core
├── wp-login.php                 # 🔽 WordPress core
├── wp-mail.php                  # 🔽 WordPress core
├── wp-settings.php              # 🔽 WordPress core
├── wp-signup.php                # 🔽 WordPress core
├── wp-trackback.php             # 🔽 WordPress core
├── xmlrpc.php                   # 🔽 WordPress core
├── license.txt                  # 🔽 WordPress core
├── readme.html                  # 🔽 WordPress core
├── INSTALLATION_GUIDE.md        # ✅ Δικό μας
├── WORDPRESS_INTEGRATION_PLAN.md # ✅ Δικό μας
├── README.md                    # ✅ Δικό μας
└── WORDPRESS_CORE_FILES.md      # ✅ Αυτό το αρχείο
```

Legend:
- ✅ = Ήδη υπάρχει (δικά μας αρχεία)
- 🔽 = Πρέπει να κατέβει (WordPress core)