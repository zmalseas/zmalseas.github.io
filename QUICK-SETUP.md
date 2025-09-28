# 🚀 Γρήγορο Setup Guide για το Contact Form

## ✅ Τι έχεις ήδη:
- ✅ reCAPTCHA keys configured
- ✅ Webmail account: info@nerally.gr
- ✅ Όλα τα PHP/JS/CSS files έτοιμα

## 📋 Απλά βήματα για να παίξει:

### 1. ✅ SMTP ρυθμίσεις έτοιμες!
Βάσει των DNS records του hosting σου, οι ρυθμίσεις είναι ήδη configured:
```
✅ SMTP Host: mail.nerally.gr
✅ SMTP Port: 465 (SSL)
✅ Username: info@nerally.gr  
✅ Encryption: SSL
❗ Password: [χρειάζεται μόνο αυτό]
```

### 2. Ενημέρωσε το config.php
Άλλαξε μόνο αυτό το πεδίο:
```php
'smtp_password' => 'ΤΟ_ΚΑΝΟΝΙΚΟ_WEBMAIL_PASSWORD_ΣΟΥ',
```

### 3. Upload στον server
Upload όλα τα files:
```
contact-handler.php
config.php  
js/contact-form.js
css/contact-form.css
email-test.php
logs/ (directory)
```

### 4. Test το email
- Πήγαινε στο: `https://nerally.gr/email-test.php`
- Βάλε το email σου
- Κάνε κλικ "Δοκιμή Αποστολής"
- Ελέγξε αν έφτασε το email

### 5. Test το contact form
- Πήγαινε στο: `https://nerally.gr/contact-form-test.html`
- Συμπλήρωσε τη φόρμα
- Submit και ελέγξε αν έφτασε email στο info@nerally.gr

### 6. Ενεργοποίηση στην κανονική σελίδα
Αν όλα OK, η σελίδα `epikoinonia/contact.html` είναι ήδη ενημερωμένη!

## 🆘 Αν δεν δουλεύει:

### Email δεν στέλνεται:
1. Δοκίμασε port 465 αντί για 587
2. Δοκίμασε 'ssl' αντί για 'tls'  
3. Δοκίμασε 'localhost' αντί για 'mail.nerally.gr'
4. Ρώτα το hosting support για τις σωστές SMTP ρυθμίσεις

### reCAPTCHA δεν λειτουργεί:
1. Ελέγξε ότι πρόσθεσες τον domain στο Google reCAPTCHA
2. Ελέγξε browser console για errors

### PHP errors:
1. Ελέγξε `logs/` directory για error logs
2. Βεβαιώσου ότι PHP έχει write permissions στο logs/

## 📞 Support
Αν χρειαστείς βοήθεια, στείλε μου screenshot από:
- Browser console (F12)
- Το email-test.php αποτέλεσμα
- Hosting email settings