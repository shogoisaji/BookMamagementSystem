import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import '@lottiefiles/lottie-player';

window.Alpine = Alpine;

Alpine.start();

app.get('/error-test', (req, res) => {
    throw new Error('This is a test error');
});