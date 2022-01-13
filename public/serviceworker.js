const cacheDynamicName = 'dynamic-v1'
const cacheStaticName = 'Static-v2'
const cacheInmutableName = 'inmutable-v1'
const cacheItems = 50;

function limpiarCache(cacheName, numeroItems) {
    caches.open(cacheName).then(cache => {
        cache.keys()
            .then(keys => {
                if (keys.length > numeroItems) {
                    cache.delete(keys[0])
                        .then(limpiarCache(cacheName, numeroItems))
                }
            })
    });
}
const filesToCache = [
    '/',
    'serviceworker.js',
    '/static/js/app.js',
    '/animales',
    '/eventos',
    '/controles_reproductivos',
    '/controles_productivos',


]
const filesToCacheInmutable = [
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

]
self.addEventListener('install', event => {
    // se guarda el cache y cosas nuevas
    console.log('SW: Installing')
    const cacheProm = caches.open(cacheStaticName).then(cache => {
        return cache.addAll(filesToCache).then(
            console.log("Caching AppShell")
        )
    }).catch(err => { console.log('fallo appshell: ', err) })
    const cacheInmutable = caches.open(cacheInmutableName).then(cache => {
        return cache.addAll(filesToCacheInmutable).then(
            console.log("Caching imutable cache")
        )
    }).catch(err => { console.log('fallo imuntable: ', err) })
    event.waitUntil(Promise.all([cacheProm, cacheInmutable]));
});

self.addEventListener('activate', event => {
    //borar cache viejo
    console.log("SW: activated & ready")
});

self.addEventListener('fetch', event => {



    const respuesta = fetch(event.request).then(res => {
        console.log("respuesta del fetch", res)

        caches.open(cacheDynamicName)
            .then(cache => {
                cache.put(event.request, res);
                limpiarCache(cacheDynamicName, cacheItems)
            })
        return res.clone()
    }).catch(err => {
        return caches.match(event.request)
    })
    event.respondWith(respuesta)


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