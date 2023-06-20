import Echo from 'laravel-echo';
require('./bootstrap');
window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':8000', // Configura el puerto según tu configuración
});

window.Echo.private('messages').listen('MessageSent', (e) => {
    console.log(e.message);
});

