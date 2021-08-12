var staticCacheName = "laravel-pwa-demo-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/',
    '/product',
    '/product/cache',
    '/product/create',
    '/css/app.css',
    '/js/app.js',
    '/idb.js',
    '/idb-open.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];

importScripts('/idb.js');
importScripts('/idb-open.js');

// Cache on install
self.addEventListener("install", event => {
    console.log('service worker instal');
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    console.log('service worker activate');
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    console.log('service worker fetch');
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});

self.addEventListener('sync', function (event) {
    console.log('service worker sync');
    if (event.tag === 'sync-product') {
        (new idbTable('product')).getAll().then (function(product) {
            for (var data of product) {
                saveProduct(data);
            }
        });
    }
});
