# Nerally Table of Contents Plugin

WordPress plugin που προσθέτει floating table of contents navigation σε άρθρα με automatic detection των headings.

## Χαρακτηριστικά

✅ **Floating Navigation Button** - Sticky position δίπλα από το scrollbar  
✅ **Auto-Generated TOC** - Αυτόματη ανίχνευση H2, H3, H4 headings  
✅ **Smooth Scroll** - Ομαλή μετάβαση στα sections  
✅ **Active State Tracking** - Highlight του active section κατά το scroll  
✅ **Full-Width Layout Option** - Άρθρα σε full-width χωρίς sidebar  
✅ **Responsive Design** - Mobile-friendly  
✅ **Accessibility** - Keyboard navigation & ARIA labels  

## Εγκατάσταση

1. Ανέβασε τον φάκελο `nerally-table-of-contents` στο `/wp-content/plugins/`
2. Ενεργοποίησε το plugin από το WordPress admin
3. Πήγαινε στο **Settings → Table of Contents** για ρυθμίσεις

## Ρυθμίσεις

### Βασικά
- **Ενεργοποίηση TOC**: Enable/disable το plugin
- **Full-Width Layout**: Εμφάνιση άρθρων σε full-width (χωρίς sidebar)
- **Ελάχιστα Headings**: Ελάχιστος αριθμός headings για εμφάνιση TOC (default: 3)

### Επιλογές Headings
- **H2**: Main sections
- **H3**: Subsections
- **H4**: Sub-subsections

### Θέση
- **Δεξιά**: Δίπλα από το scrollbar (default)
- **Αριστερά**: Αριστερή πλευρά

## Χρήση

Το plugin λειτουργεί αυτόματα σε single posts. Απλά γράψε το άρθρο σου με headings:

```html
<h2>Γενικά</h2>
<p>Περιεχόμενο...</p>

<h3>Υποενότητα 1</h3>
<p>Περιεχόμενο...</p>

<h2>Σύνταξης: Χρήστος Γκούτουλας</h2>
<p>Περιεχόμενο...</p>
```

Το TOC θα δημιουργηθεί αυτόματα με:
- Γενικά
  - Υποενότητα 1
- Σύνταξης: Χρήστος Γκούτουλας

## Προσαρμογή

### CSS Customization
Μπορείς να override τα styles προσθέτοντας στο theme σου:

```css
/* Αλλαγή χρωμάτων */
#nerally-toc-toggle {
  background: #your-color;
}

.toc-item a.active {
  background: #your-active-color;
}
```

### JavaScript Events
Το plugin εκθέτει events για customization:

```javascript
// Όταν ανοίγει το panel
$(document).on('nerally_toc_opened', function() {
  console.log('TOC opened');
});

// Όταν αλλάζει το active section
$(document).on('nerally_toc_active_changed', function(e, sectionId) {
  console.log('Active section:', sectionId);
});
```

## Συμβατότητα

- WordPress 5.0+
- PHP 7.0+
- Δουλεύει με όλα τα themes
- Mobile responsive

## Changelog

### 1.0.0 (2025-10-22)
- Initial release
- Floating TOC navigation
- Full-width layout option
- Auto-detection headings
- Smooth scroll
- Active state tracking

## Support

Για υποστήριξη: info@nerally.gr

## License

GPL v2 or later
