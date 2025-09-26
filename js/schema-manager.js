// SEO Schema Manager - Structured Data Implementation

class SchemaManager {
  constructor() {
    this.schemas = new Map();
    this.currentPage = this.getCurrentPageType();
    this.businessData = this.getBusinessData();
    this.init();
  }

  init() {
    try {
      // Add base schemas
      this.addOrganizationSchema();
      this.addWebsiteSchema();
      this.addBreadcrumbSchema();
      
      // Add page-specific schemas
      this.addPageSpecificSchemas();
      
      // Add FAQ schema if FAQ content exists
      this.addFAQSchema();
      
      // Add service schemas for service pages
      this.addServiceSchemas();
      
      // Add local business schema
      this.addLocalBusinessSchema();
      
      // Inject all schemas into the page
      this.injectSchemas();
      
      console.log('📈 SEO Schema markup initialized');
    } catch (error) {
      console.error('Schema initialization failed:', error);
    }
  }

  getCurrentPageType() {
    const path = window.location.pathname;
    const filename = path.split('/').pop() || 'index.html';
    
    // Define page types
    const pageTypes = {
      'index.html': 'homepage',
      'contact.html': 'contact',
      'company.html': 'about',
      'team.html': 'team',
      'join-us.html': 'careers',
      'articles.html': 'blog',
      'logistiki.html': 'service',
      'misthodosia.html': 'service',
      'consulting.html': 'service',
      'assurance.html': 'service',
      'cyber-security.html': 'service',
      'epixorigiseis.html': 'service',
      'social-media.html': 'service',
      'symvoulos-mixanikos.html': 'service',
      'income-tax-calculator.html': 'calculator',
      'rent-tax-calculator.html': 'calculator',
      'privacy-policy.html': 'legal',
      'terms-of-use.html': 'legal',
      'cookies-policy.html': 'legal',
      'gdpr.html': 'legal'
    };
    
    return pageTypes[filename] || 'page';
  }

  getBusinessData() {
    return {
      name: "Nerali - Λογιστικό Γραφείο",
      alternateName: "Nerali Accounting Services",
      description: "Λογιστικές υπηρεσίες, φοροτεχνικά, συμβουλευτικές υπηρεσίες και ψηφιακές λύσεις για επιχειρήσεις στην Ελλάδα.",
      url: "https://nerali.gr",
      telephone: "+30-210-1234567",
      email: "info@nerali.gr",
      address: {
        streetAddress: "Λεωφόρος Κηφισίας 123",
        addressLocality: "Αθήνα",
        addressRegion: "Αττική",
        postalCode: "11526",
        addressCountry: "GR"
      },
      openingHours: [
        "Mo-Fr 09:00-17:00"
      ],
      priceRange: "€€",
      languages: ["el", "en"],
      serviceArea: {
        name: "Ελλάδα",
        type: "Country"
      }
    };
  }

  addOrganizationSchema() {
    const schema = {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "@id": "https://nerali.gr/#organization",
      "name": this.businessData.name,
      "alternateName": this.businessData.alternateName,
      "description": this.businessData.description,
      "url": this.businessData.url,
      "telephone": this.businessData.telephone,
      "email": this.businessData.email,
      "priceRange": this.businessData.priceRange,
      "address": {
        "@type": "PostalAddress",
        "streetAddress": this.businessData.address.streetAddress,
        "addressLocality": this.businessData.address.addressLocality,
        "addressRegion": this.businessData.address.addressRegion,
        "postalCode": this.businessData.address.postalCode,
        "addressCountry": this.businessData.address.addressCountry
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 37.9838,
        "longitude": 23.7275
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        "opens": "09:00",
        "closes": "17:00"
      },
      "serviceArea": {
        "@type": "Country",
        "name": this.businessData.serviceArea.name
      },
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Λογιστικές & Συμβουλευτικές Υπηρεσίες",
        "itemListElement": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Λογιστικές Υπηρεσίες",
              "description": "Πλήρης λογιστική παρακολούθηση επιχειρήσεων"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Μισθοδοσία",
              "description": "Υπηρεσίες μισθοδοσίας και ανθρωπίνων πόρων"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Φοροτεχνικά",
              "description": "Φοροτεχνικές υπηρεσίες και δηλώσεις"
            }
          }
        ]
      },
      "sameAs": [
        "https://www.linkedin.com/company/nerali",
        "https://www.facebook.com/nerali.gr"
      ]
    };

    this.schemas.set('organization', schema);
  }

  addWebsiteSchema() {
    const schema = {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "@id": "https://nerali.gr/#website",
      "url": "https://nerali.gr",
      "name": this.businessData.name,
      "description": this.businessData.description,
      "publisher": {
        "@id": "https://nerali.gr/#organization"
      },
      "inLanguage": "el-GR",
      "potentialAction": {
        "@type": "SearchAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "https://nerali.gr/search?q={search_term_string}"
        },
        "query-input": "required name=search_term_string"
      }
    };

    this.schemas.set('website', schema);
  }

  addBreadcrumbSchema() {
    const breadcrumbs = this.generateBreadcrumbs();
    if (breadcrumbs.length <= 1) return;

    const schema = {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": breadcrumbs.map((crumb, index) => ({
        "@type": "ListItem",
        "position": index + 1,
        "name": crumb.name,
        "item": crumb.url
      }))
    };

    this.schemas.set('breadcrumb', schema);
  }

  generateBreadcrumbs() {
    const path = window.location.pathname;
    const segments = path.split('/').filter(Boolean);
    const breadcrumbs = [
      { name: "Αρχική", url: "https://nerali.gr" }
    ];

    // Define breadcrumb mappings
    const breadcrumbMap = {
      'ipiresies': 'Υπηρεσίες',
      'etairia': 'Εταιρία',
      'efarmoges': 'Εφαρμογές',
      'epikoinonia': 'Επικοινωνία',
      'arthra': 'Άρθρα',
      'nomimotita': 'Νομιμότητα',
      'logistiki.html': 'Λογιστικές Υπηρεσίες',
      'misthodosia.html': 'Μισθοδοσία',
      'consulting.html': 'Συμβουλευτικές Υπηρεσίες',
      'assurance.html': 'Διασφάλιση Ποιότητας',
      'cyber-security.html': 'Κυβερνοασφάλεια',
      'company.html': 'Η Εταιρία',
      'team.html': 'Ομάδα',
      'contact.html': 'Επικοινωνία'
    };

    let currentPath = 'https://nerali.gr';
    
    segments.forEach(segment => {
      currentPath += '/' + segment;
      const name = breadcrumbMap[segment] || this.formatSegmentName(segment);
      breadcrumbs.push({ name, url: currentPath });
    });

    return breadcrumbs;
  }

  formatSegmentName(segment) {
    return segment
      .replace(/-/g, ' ')
      .replace(/\.html$/, '')
      .replace(/\b\w/g, l => l.toUpperCase());
  }

  addPageSpecificSchemas() {
    switch (this.currentPage) {
      case 'homepage':
        this.addHomepageSchema();
        break;
      case 'contact':
        this.addContactPageSchema();
        break;
      case 'about':
        this.addAboutPageSchema();
        break;
      case 'service':
        this.addServicePageSchema();
        break;
      case 'calculator':
        this.addCalculatorSchema();
        break;
    }
  }

  addHomepageSchema() {
    const schema = {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "@id": "https://nerali.gr/#webpage",
      "url": "https://nerali.gr",
      "name": "Nerali - Λογιστικό Γραφείο | Λογιστικές & Φοροτεχνικές Υπηρεσίες",
      "description": this.businessData.description,
      "isPartOf": {
        "@id": "https://nerali.gr/#website"
      },
      "about": {
        "@id": "https://nerali.gr/#organization"
      },
      "mainEntity": {
        "@id": "https://nerali.gr/#organization"
      }
    };

    this.schemas.set('homepage', schema);
  }

  addContactPageSchema() {
    const schema = {
      "@context": "https://schema.org",
      "@type": "ContactPage",
      "name": "Επικοινωνία - Nerali",
      "description": "Επικοινωνήστε με το λογιστικό γραφείο Nerali για περισσότερες πληροφορίες",
      "mainEntity": {
        "@type": "ContactPoint",
        "telephone": this.businessData.telephone,
        "email": this.businessData.email,
        "contactType": "customer service",
        "availableLanguage": ["Greek", "English"],
        "hoursAvailable": {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens": "09:00",
          "closes": "17:00"
        }
      }
    };

    this.schemas.set('contact', schema);
  }

  addServicePageSchema() {
    const serviceName = this.getServiceName();
    const serviceDescription = this.getServiceDescription();

    const schema = {
      "@context": "https://schema.org",
      "@type": "Service",
      "name": serviceName,
      "description": serviceDescription,
      "provider": {
        "@id": "https://nerali.gr/#organization"
      },
      "serviceType": "Professional Service",
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": serviceName,
        "itemListElement": [{
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": serviceName,
            "description": serviceDescription
          }
        }]
      },
      "areaServed": {
        "@type": "Country",
        "name": "Ελλάδα"
      },
      "availableChannel": {
        "@type": "ServiceChannel",
        "serviceUrl": window.location.href,
        "serviceSmsNumber": this.businessData.telephone,
        "servicePhone": this.businessData.telephone
      }
    };

    this.schemas.set('service', schema);
  }

  getServiceName() {
    const path = window.location.pathname;
    const serviceNames = {
      'logistiki.html': 'Λογιστικές Υπηρεσίες',
      'misthodosia.html': 'Υπηρεσίες Μισθοδοσίας',
      'consulting.html': 'Συμβουλευτικές Υπηρεσίες',
      'assurance.html': 'Διασφάλιση Ποιότητας',
      'cyber-security.html': 'Υπηρεσίες Κυβερνοασφάλειας',
      'epixorigiseis.html': 'Επιχορηγήσεις',
      'social-media.html': 'Διαχείριση Social Media',
      'symvoulos-mixanikos.html': 'Σύμβουλος Μηχανικός'
    };

    const filename = path.split('/').pop();
    return serviceNames[filename] || 'Επαγγελματικές Υπηρεσίες';
  }

  getServiceDescription() {
    const path = window.location.pathname;
    const serviceDescriptions = {
      'logistiki.html': 'Πλήρης λογιστική παρακολούθηση επιχειρήσεων με σύγχρονα συστήματα και εξειδικευμένο προσωπικό',
      'misthodosia.html': 'Υπηρεσίες μισθοδοσίας και διαχείρισης ανθρωπίνων πόρων για επιχειρήσεις κάθε μεγέθους',
      'consulting.html': 'Συμβουλευτικές υπηρεσίες για επιχειρηματική ανάπτυξη και βελτιστοποίηση',
      'assurance.html': 'Υπηρεσίες διασφάλισης ποιότητας και ελέγχου για επιχειρήσεις',
      'cyber-security.html': 'Υπηρεσίες κυβερνοασφάλειας και προστασίας δεδομένων',
      'epixorigiseis.html': 'Υποστήριξη για την εξεύρεση και αξιοποίηση επιχορηγήσεων',
      'social-media.html': 'Διαχείριση και στρατηγική social media για επιχειρήσεις',
      'symvoulos-mixanikos.html': 'Συμβουλευτικές υπηρεσίες μηχανικού για τεχνικά έργα'
    };

    const filename = path.split('/').pop();
    return serviceDescriptions[filename] || 'Επαγγελματικές υπηρεσίες υψηλής ποιότητας';
  }

  addCalculatorSchema() {
    const calculatorName = this.getCalculatorName();
    
    const schema = {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": calculatorName,
      "description": `Δωρεάν online ${calculatorName.toLowerCase()} για γρήγορους και ακριβείς υπολογισμούς`,
      "url": window.location.href,
      "applicationCategory": "FinanceApplication",
      "operatingSystem": "Web Browser",
      "author": {
        "@id": "https://nerali.gr/#organization"
      },
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "EUR"
      },
      "featureList": [
        "Δωρεάν χρήση",
        "Ακριβείς υπολογισμοί",
        "Εύχρηστο interface",
        "Άμεσα αποτελέσματα"
      ]
    };

    this.schemas.set('calculator', schema);
  }

  getCalculatorName() {
    const path = window.location.pathname;
    if (path.includes('income-tax')) {
      return 'Υπολογιστής Φόρου Εισοδήματος';
    } else if (path.includes('rent-tax')) {
      return 'Υπολογιστής Φόρου Ενοικίων';
    }
    return 'Φοροτεχνικός Υπολογιστής';
  }

  addFAQSchema() {
    const faqElements = document.querySelectorAll('.faq-item, .accordion-item');
    if (faqElements.length === 0) return;

    const questions = Array.from(faqElements).map(element => {
      const question = element.querySelector('.faq-question, .accordion-header, h3, h4');
      const answer = element.querySelector('.faq-answer, .accordion-content, .faq-text');
      
      if (question && answer) {
        return {
          "@type": "Question",
          "name": question.textContent.trim(),
          "acceptedAnswer": {
            "@type": "Answer",
            "text": answer.textContent.trim()
          }
        };
      }
    }).filter(Boolean);

    if (questions.length > 0) {
      const schema = {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": questions
      };

      this.schemas.set('faq', schema);
    }
  }

  addLocalBusinessSchema() {
    const schema = {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "@id": "https://nerali.gr/#localbusiness",
      "name": this.businessData.name,
      "description": this.businessData.description,
      "url": this.businessData.url,
      "telephone": this.businessData.telephone,
      "email": this.businessData.email,
      "address": {
        "@type": "PostalAddress",
        "streetAddress": this.businessData.address.streetAddress,
        "addressLocality": this.businessData.address.addressLocality,
        "addressRegion": this.businessData.address.addressRegion,
        "postalCode": this.businessData.address.postalCode,
        "addressCountry": this.businessData.address.addressCountry
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 37.9838,
        "longitude": 23.7275
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        "opens": "09:00",
        "closes": "17:00"
      },
      "priceRange": this.businessData.priceRange,
      "paymentAccepted": ["Cash", "Credit Card", "Bank Transfer"],
      "currenciesAccepted": "EUR"
    };

    this.schemas.set('localbusiness', schema);
  }

  addServiceSchemas() {
    const services = [
      {
        name: "Λογιστικές Υπηρεσίες",
        description: "Πλήρης λογιστική παρακολούθηση επιχειρήσεων",
        url: "https://nerali.gr/ipiresies/logistiki.html"
      },
      {
        name: "Μισθοδοσία",
        description: "Υπηρεσίες μισθοδοσίας και ανθρωπίνων πόρων",
        url: "https://nerali.gr/ipiresies/misthodosia.html"
      },
      {
        name: "Συμβουλευτικές Υπηρεσίες",
        description: "Επιχειρηματική συμβουλευτική και στρατηγική",
        url: "https://nerali.gr/ipiresies/consulting.html"
      }
    ];

    const schema = {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "name": "Υπηρεσίες Nerali",
      "description": "Πλήρης κατάλογος υπηρεσιών του λογιστικού γραφείου Nerali",
      "itemListElement": services.map((service, index) => ({
        "@type": "ListItem",
        "position": index + 1,
        "item": {
          "@type": "Service",
          "name": service.name,
          "description": service.description,
          "url": service.url,
          "provider": {
            "@id": "https://nerali.gr/#organization"
          }
        }
      }))
    };

    this.schemas.set('services', schema);
  }

  injectSchemas() {
    // Remove existing schema scripts
    document.querySelectorAll('script[type="application/ld+json"]').forEach(script => {
      if (script.dataset.schemaManager === 'true') {
        script.remove();
      }
    });

    // Inject new schemas
    this.schemas.forEach((schema, key) => {
      const script = document.createElement('script');
      script.type = 'application/ld+json';
      script.dataset.schemaManager = 'true';
      script.dataset.schemaType = key;
      script.textContent = JSON.stringify(schema, null, 2);
      document.head.appendChild(script);
    });

    console.log(`📊 Injected ${this.schemas.size} schema types:`, Array.from(this.schemas.keys()));
  }

  // Public methods
  addCustomSchema(name, schema) {
    this.schemas.set(name, schema);
    this.injectSchemas();
  }

  removeSchema(name) {
    if (this.schemas.delete(name)) {
      this.injectSchemas();
      return true;
    }
    return false;
  }

  getSchema(name) {
    return this.schemas.get(name);
  }

  getAllSchemas() {
    return Object.fromEntries(this.schemas);
  }

  refreshSchemas() {
    this.schemas.clear();
    this.init();
  }
}

// Initialize schema manager
const schemaManager = new SchemaManager();

// Make it globally available
window.schemaManager = schemaManager;