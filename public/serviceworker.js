var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/',
    'serviceworker.js',
    '/tareas',
    '/static/js/app.js',
    '/static/img/cow.png',
    '/static/js/libss/mdtoast.min.js',
    '/static/js/libss/mdtoast.min.css',
    '/images/icons/toro-72x72.png',
    '/images/icons/toro-96x96.png',
    '/images/icons/toro-128x128.png',
    '/images/icons/toro-144x144.png',
    '/images/icons/toro-152x152.png',
    '/images/icons/toro-192x192.png',
    '/images/icons/toro-384x384.png',
    '/images/icons/toro-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
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

//Serve from Cache
self.addEventListener("fetch", event => {
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


// Cierra la notificacion
self.addEventListener('notificationclose', e => {
    console.log('Notificación cerrada', e);
});


self.addEventListener('notificationclick', e => {


    const notificacion = e.notification;
    const accion = e.action;


    console.log({ notificacion, accion });
    // console.log(notificacion);
    // console.log(accion);


    const respuesta = clients.matchAll()
        .then(clientes => {

            let cliente = clientes.find(c => {
                return c.visibilityState === 'visible';
            });

            if (cliente !== undefined) {
                cliente.navigate('/tareas');
                cliente.focus();
            } else {
                clients.openWindow('/tareas');
            }

            return notificacion.close();

        });

    e.waitUntil(respuesta);


});