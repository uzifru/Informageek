require('./bootstrap');

window.Vue = require('vue');

import router from './router';

import App from './pages/App.vue';

new Vue({
    router,
    el: '#app',
    render: h => h(App)
});
