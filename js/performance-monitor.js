// Performance Monitor - Track Core Web Vitals and page performance

class PerformanceMonitor {
  constructor() {
    this.metrics = {
      fcp: null,      // First Contentful Paint
      lcp: null,      // Largest Contentful Paint
      fid: null,      // First Input Delay
      cls: null,      // Cumulative Layout Shift
      ttfb: null      // Time to First Byte
    };
    
    console.log('📊 Performance Monitor initialized (local mode - no server logging)');
    this.init();
  }

  init() {
    if (typeof window === 'undefined') return;
    
    // Only run on production or when explicitly enabled
    if (this.shouldMonitor()) {
      this.observeWebVitals();
      this.trackPageLoad();
      this.trackUserInteractions();
    }
  }

  shouldMonitor() {
    // Enable monitoring on production or when debug flag is set
    return window.location.hostname !== 'localhost' || 
           window.localStorage.getItem('nerali-debug-performance') === 'true';
  }

  observeWebVitals() {
    try {
      // First Contentful Paint
      this.observeFCP();
      
      // Largest Contentful Paint
      this.observeLCP();
      
      // First Input Delay
      this.observeFID();
      
      // Cumulative Layout Shift
      this.observeCLS();
      
      // Time to First Byte
      this.measureTTFB();
      
    } catch (error) {
      console.warn('Performance monitoring setup failed:', error);
    }
  }

  observeFCP() {
    if ('PerformanceObserver' in window) {
      const observer = new PerformanceObserver((list) => {
        const entries = list.getEntries();
        const fcpEntry = entries.find(entry => entry.name === 'first-contentful-paint');
        if (fcpEntry) {
          this.metrics.fcp = fcpEntry.startTime;
          this.reportMetric('FCP', fcpEntry.startTime);
          observer.disconnect();
        }
      });
      
      observer.observe({ entryTypes: ['paint'] });
    }
  }

  observeLCP() {
    if ('PerformanceObserver' in window) {
      const observer = new PerformanceObserver((list) => {
        const entries = list.getEntries();
        const lastEntry = entries[entries.length - 1];
        this.metrics.lcp = lastEntry.startTime;
        this.reportMetric('LCP', lastEntry.startTime);
      });
      
      observer.observe({ entryTypes: ['largest-contentful-paint'] });
    }
  }

  observeFID() {
    if ('PerformanceObserver' in window) {
      const observer = new PerformanceObserver((list) => {
        const firstEntry = list.getEntries()[0];
        this.metrics.fid = firstEntry.processingStart - firstEntry.startTime;
        this.reportMetric('FID', this.metrics.fid);
        observer.disconnect();
      });
      
      observer.observe({ entryTypes: ['first-input'] });
    }
  }

  observeCLS() {
    if ('PerformanceObserver' in window) {
      let clsValue = 0;
      
      const observer = new PerformanceObserver((list) => {
        for (const entry of list.getEntries()) {
          if (!entry.hadRecentInput) {
            clsValue += entry.value;
          }
        }
        this.metrics.cls = clsValue;
        this.reportMetric('CLS', clsValue);
      });
      
      observer.observe({ entryTypes: ['layout-shift'] });
    }
  }

  measureTTFB() {
    if ('performance' in window && 'getEntriesByType' in performance) {
      const navEntries = performance.getEntriesByType('navigation');
      if (navEntries.length > 0) {
        const navEntry = navEntries[0];
        this.metrics.ttfb = navEntry.responseStart - navEntry.requestStart;
        this.reportMetric('TTFB', this.metrics.ttfb);
      }
    }
  }

  trackPageLoad() {
    window.addEventListener('load', () => {
      setTimeout(() => {
        const loadTime = performance.now();
        this.reportMetric('Page Load Time', loadTime);
        
        // Log performance summary
        this.logPerformanceSummary();
      }, 0);
    });
  }

  trackUserInteractions() {
    // Track click response times
    let clickStartTime = 0;
    
    document.addEventListener('mousedown', () => {
      clickStartTime = performance.now();
    });
    
    document.addEventListener('click', () => {
      if (clickStartTime > 0) {
        const responseTime = performance.now() - clickStartTime;
        if (responseTime > 100) { // Only log slow responses
          this.reportMetric('Click Response Time', responseTime);
        }
        clickStartTime = 0;
      }
    });
  }

  reportMetric(name, value) {
    // In production, you would send this to your analytics service
    // For now, we'll just log it
    if (window.localStorage.getItem('nerali-debug-performance') === 'true') {
      console.log(`🚀 Performance Metric - ${name}:`, Math.round(value * 100) / 100, 'ms');
    }
    
    // Send to analytics service (example)
    this.sendToAnalytics(name, value);
  }

  sendToAnalytics(metricName, value) {
    // Example implementation - replace with your analytics service
    if (typeof gtag !== 'undefined') {
      gtag('event', 'performance_metric', {
        'metric_name': metricName,
        'metric_value': Math.round(value),
        'page_path': window.location.pathname
      });
    }
    
    // Or send to custom endpoint
    if (this.shouldSendToServer()) {
      fetch('/api/metrics', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          metric: metricName,
          value: value,
          url: window.location.href,
          timestamp: Date.now(),
          userAgent: navigator.userAgent
        })
      }).catch(() => {
        // Silently fail - don't disrupt user experience
      });
    }
  }

  shouldSendToServer() {
    // Disabled for static site - no backend endpoint available
    return false; // Set to true when you have a metrics API endpoint
  }

  logPerformanceSummary() {
    if (window.localStorage.getItem('nerali-debug-performance') === 'true') {
      console.group('📊 Nerali Performance Summary');
      console.log('First Contentful Paint:', this.metrics.fcp ? `${Math.round(this.metrics.fcp)}ms` : 'Not measured');
      console.log('Largest Contentful Paint:', this.metrics.lcp ? `${Math.round(this.metrics.lcp)}ms` : 'Not measured');
      console.log('First Input Delay:', this.metrics.fid ? `${Math.round(this.metrics.fid)}ms` : 'Not measured');
      console.log('Cumulative Layout Shift:', this.metrics.cls ? Math.round(this.metrics.cls * 1000) / 1000 : 'Not measured');
      console.log('Time to First Byte:', this.metrics.ttfb ? `${Math.round(this.metrics.ttfb)}ms` : 'Not measured');
      
      // Performance grades
      this.gradePerformance();
      console.groupEnd();
    }
  }

  gradePerformance() {
    const grades = {};
    
    // Grade FCP (Good: <1.8s, Needs Improvement: 1.8s-3s, Poor: >3s)
    if (this.metrics.fcp) {
      if (this.metrics.fcp < 1800) grades.fcp = '🟢 Good';
      else if (this.metrics.fcp < 3000) grades.fcp = '🟡 Needs Improvement';
      else grades.fcp = '🔴 Poor';
    }
    
    // Grade LCP (Good: <2.5s, Needs Improvement: 2.5s-4s, Poor: >4s)
    if (this.metrics.lcp) {
      if (this.metrics.lcp < 2500) grades.lcp = '🟢 Good';
      else if (this.metrics.lcp < 4000) grades.lcp = '🟡 Needs Improvement';
      else grades.lcp = '🔴 Poor';
    }
    
    // Grade FID (Good: <100ms, Needs Improvement: 100-300ms, Poor: >300ms)
    if (this.metrics.fid) {
      if (this.metrics.fid < 100) grades.fid = '🟢 Good';
      else if (this.metrics.fid < 300) grades.fid = '🟡 Needs Improvement';
      else grades.fid = '🔴 Poor';
    }
    
    // Grade CLS (Good: <0.1, Needs Improvement: 0.1-0.25, Poor: >0.25)
    if (this.metrics.cls) {
      if (this.metrics.cls < 0.1) grades.cls = '🟢 Good';
      else if (this.metrics.cls < 0.25) grades.cls = '🟡 Needs Improvement';
      else grades.cls = '🔴 Poor';
    }
    
    console.log('Performance Grades:', grades);
  }

  // Public method to enable debug mode
  enableDebugMode() {
    window.localStorage.setItem('nerali-debug-performance', 'true');
    console.log('🔧 Performance debugging enabled. Reload the page to see metrics.');
  }

  // Public method to disable debug mode
  disableDebugMode() {
    window.localStorage.removeItem('nerali-debug-performance');
    console.log('🔧 Performance debugging disabled.');
  }
}

// Initialize performance monitoring
const performanceMonitor = new PerformanceMonitor();

// Make debug methods available globally
window.neraliPerformance = {
  enable: () => performanceMonitor.enableDebugMode(),
  disable: () => performanceMonitor.disableDebugMode(),
  metrics: () => performanceMonitor.metrics
};

// Make globally available
window.PerformanceMonitor = PerformanceMonitor;

// Export for module systems if available
if (typeof module !== 'undefined' && module.exports) {
  module.exports = PerformanceMonitor;
}