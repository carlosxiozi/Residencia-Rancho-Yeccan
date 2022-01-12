function isOnline() {
    if (navigator.onLine) {

        $.mdtoast('Te encuentras en linea', {
            interaction: true,
            interactionTimeout: 2000,
            actionText: 'ok'
        });
    } else {

        $.mdtoast('Estas fuera de conexion a internet', {
            interaction: true,
            actionText: 'ok',
            type: 'warning'
        });
    }
}

window.addEventListener('online', isOnline);
window.addEventListener('offline', isOnline);
isOnline();

function notificarme() {


    if (!window.Notification) {
        console.log('este navegador no soporta');
        return;
    }
    if (Notification.permission == 'granted') {


    } else if (Notification.permission != 'denied' || Notification.permission == 'default') {

        Notification.requestPermission(function(permission) {
            console.log(permission);
            if (permission == 'granted') {


            }
        });

    }
}

notificarme();


function notifica(mensajeTitle) {



    const options = {

        body: "Nuevos evento para: " + mensajeTitle.animal.nombre,

        vibrate: [125, 75, 125, 275, 200, 275, 125, 75, 125, 275, 200, 600, 200, 600],
        icon: '/static/img/toro.png',
        image: mensajeTitle.animal.imagen,
        badge: '/static/img/toro.png',
        openUrl: 'htpps://google.com',
        onclick: function() {
            this.location = "htpps://google.com";
            this.close();
        },

    };


    swRegistration.showNotification('Rancho Yeccan', options);



}

// Guardar  en el cache dinamico
function actualizaCacheDinamico(dynamicCache, req, res) {


    if (res.ok) {

        return caches.open(dynamicCache).then(cache => {

            cache.put(req, res.clone());

            return res.clone();

        });

    } else {
        return res;
    }

}

// Cache with network update
function actualizaCacheStatico(staticCache, req, APP_SHELL_INMUTABLE) {


    if (APP_SHELL_INMUTABLE.includes(req.url)) {
        // No hace falta actualizar el inmutable
        // console.log('existe en inmutable', req.url );

    } else {
        // console.log('actualizando', req.url );
        return fetch(req)
            .then(res => {
                return actualizaCacheDinamico(staticCache, req, res);
            });
    }


}