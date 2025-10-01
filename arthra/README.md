# Nerally Blog - WordPress Installation

Αυτός ο φάκελος περιέχει όλα τα απαραίτητα αρχεία για την εγκατάσταση WordPress στο `/arthra` subdirectory του Nerally website.

## 📁 Δομή Αρχείων

```
arthra/
├── .htaccess                           # Apache configuration & security
├── index.php                          # WordPress entry point  
├── wp-config-sample.php                # WordPress configuration template
├── wp-content/                         # WordPress content directory
│   └── themes/
│       └── nerally-theme/              # Custom Nerally theme
│           ├── style.css               # Main theme stylesheet
│           ├── functions.php           # Theme functionality
│           ├── index.php               # Blog listing template
│           ├── single.php              # Single post template
│           ├── header.php              # Header template
│           └── footer.php              # Footer template
├── INSTALLATION_GUIDE.md               # Detailed setup instructions
├── WORDPRESS_INTEGRATION_PLAN.md       # Architecture planning document
└── README.md                          # This file
```

## 🚀 Quick Setup

### 1. WordPress Core Installation
Download και extract WordPress core files σε αυτόν τον φάκελο:
- Όλα τα core WordPress files (wp-admin/, wp-includes/, etc.)
- Χρήση του `wp-config-sample.php` ως βάση για το `wp-config.php`

### 2. Database Configuration
- Δημιουργήστε βάση δεδομένων: `nerally_blog`
- Ενημερώστε το `wp-config.php` με τα στοιχεία της βάσης

### 3. Theme Activation
- Το Nerally custom theme είναι ήδη έτοιμο στο `wp-content/themes/nerally-theme/`
- Activate από το WordPress admin

### 4. SSL & Security
- Ενεργοποιήστε SSL certificate
- Το `.htaccess` έχει security configurations

## 📋 Checklist πριν το Upload

- [ ] WordPress core files downloaded και extracted
- [ ] `wp-config.php` configured με database settings
- [ ] SSL certificate εγκαταστημένο
- [ ] File permissions ρυθμισμένα (755 για directories, 644 για files)
- [ ] Custom theme tested

## 🔗 Integration με Main Site

Το theme είναι σχεδιασμένο να integrates seamlessly με το main Nerally site:
- Shared CSS/JS resources
- Consistent branding και design
- Cross-site navigation
- Legal modals integration

## 📞 Support

Για τεχνική υποστήριξη ή ερωτήσεις, δείτε το `INSTALLATION_GUIDE.md` για detailed instructions.

---

**Last Updated**: October 1, 2025  
**Version**: 1.0.0