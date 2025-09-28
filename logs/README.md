# Contact Form Logs

Αυτός ο φάκελος περιέχει τα logs του συστήματος φόρμας επικοινωνίας.

## Αρχεία Logs
- `contact-handler.log` - Γενικά logs αιτημάτων
- `security.log` - Security events και suspicious activity
- `errors.log` - PHP errors και exceptions

## Πρόσβαση
Τα logs είναι προσβάσιμα μόνο από τον server administrator.
Δεν πρέπει να είναι προσβάσιμα από το web.

## Συντήρηση
Σκεφτείτε να ρυθμίσετε log rotation για να μην γεμίσει ο disk.

## Παραδείγματα
```bash
# Δείτε τα τελευταία logs
tail -f logs/contact-handler.log

# Αναζήτηση για suspicious activity
grep "SUSPICIOUS" logs/security.log

# Καθαρισμός παλιών logs (προσοχή!)
find logs/ -name "*.log" -mtime +30 -delete
```