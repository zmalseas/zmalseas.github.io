// Service Worker for Nerally Website
// Provides offline functionality and caching
const CACHE_NAME = 'nerally-v1.0.1';
const OFFLINE_URL = '/404.html';
const CACHE_RESOURCES = [
  // Only static assets (avoid HTML to prevent stale headers)
  '/main.css',
  '/app.js',
  '/images/logo.png',
  '/images/Hero1.png',
  '/404.html',
  // CSS modules
  '/css/base.css',
  '/css/components.css',
  '/css/loading-states.css',
  // JS modules
  '/js/navigation.js',
  '/js/chat-widget.js',
  '/js/error-handler.js',
  '/js/rent-tax-calculator.js'
];
// Install event - cache resources
self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => {
        return cache.addAll(CACHE_RESOURCES);
      })
      .then(() => {
        return self.skipWaiting();
      })
      .catch((error) => {
      })
  );
});
// Activate event - clean up old caches
self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys()
      .then((cacheNames) => {
        return Promise.all(
          cacheNames.map((cacheName) => {
            if (cacheName !== CACHE_NAME) {
              return caches.delete(cacheName);
            }
          })
        );
      })
      .then(() => {
        return self.clients.claim();
      })
  );
});
// Fetch events - serve from cache, fallback to network
self.addEventListener('fetch', (event) => {
  // Network-first for HTML/documents to avoid stale or wrong headers
  try {
    const accept = event.request.headers && (event.request.headers.get('accept') || '');
    const isHTML = event.request.mode === 'navigate' || (accept && accept.indexOf('text/html') !== -1);
    if (isHTML) {
      event.respondWith(
        fetch(event.request).catch(() => caches.match(OFFLINE_URL))
      );
      return;
    }
  } catch (_) {}
  // Skip non-GET requests
  if (event.request.method !== 'GET') {
    return;
  }
  // Skip chrome-extension and other special URLs
  if (!event.request.url.startsWith('http')) {
    return;
  }
  event.respondWith(
    caches.match(event.request)
      .then((cachedResponse) => {
        // Return cached version if available
        if (cachedResponse) {
          return cachedResponse;
        }
        // Otherwise fetch from network
        return fetch(event.request)
          .then((response) => {
            // Don't cache non-successful responses
            if (!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }
            // Clone response for caching
            const responseToCache = response.clone();
            caches.open(CACHE_NAME)
              .then((cache) => {
                // Only cache same-origin requests
                if (event.request.url.startsWith(self.location.origin)) {
                  cache.put(event.request, responseToCache);
                }
              });
            return response;
          })
          .catch((error) => {
            // Return offline page for navigation requests
            if (event.request.mode === 'navigate') {
              return caches.match(OFFLINE_URL);
            }
            // Return a basic offline response for other requests
            return new Response('Offline content not available', {
              status: 503,
              statusText: 'Service Unavailable',
              headers: new Headers({
                'Content-Type': 'text/plain'
              })
            });
          });
      })
  );
});
// Background sync for form submissions (when supported)
self.addEventListener('sync', (event) => {
  if (event.tag === 'contact-form') {
    event.waitUntil(syncContactForm());
  }
});
async function syncContactForm() {
  try {
    // Get pending form submissions from IndexedDB
    const submissions = await getPendingSubmissions();
    for (const submission of submissions) {
      try {
        const response = await fetch('/api/contact', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(submission.data)
        });
        if (response.ok) {
          // Remove successful submission
          await removePendingSubmission(submission.id);
        }
      } catch (error) {
      }
    }
  } catch (error) {
  }
}
// Placeholder functions for form sync (would need IndexedDB implementation)
async function getPendingSubmissions() {
  // Would implement IndexedDB retrieval
  return [];
}
async function removePendingSubmission(id) {
  // Would implement IndexedDB removal
}
// Push notification handling (for future use)
self.addEventListener('push', (event) => {
  if (!event.data) return;
  const data = event.data.json();
  const options = {
    body: data.body,
    icon: '/images/logo.png',
    badge: '/images/logo.png',
    vibrate: [100, 50, 100],
    data: {
      dateOfArrival: Date.now(),
      primaryKey: data.primaryKey
    },
    actions: [
      {
        action: 'explore',
        title: 'Δείτε περισσότερα',
        icon: '/images/logo.png'
      },
      {
        action: 'close',
        title: 'Κλείσιμο',
        icon: '/images/logo.png'
      }
    ]
  };
  event.waitUntil(
    self.registration.showNotification(data.title, options)
  );
});
// Handle notification clicks
self.addEventListener('notificationclick', (event) => {
  event.notification.close();
  if (event.action === 'explore') {
    // Open the app
    event.waitUntil(
      clients.openWindow('/')
    );
  }
});
// Handle service worker updates
self.addEventListener('message', (event) => {
  if (event.data && event.data.type === 'SKIP_WAITING') {
    self.skipWaiting();
  }
});
