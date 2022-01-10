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