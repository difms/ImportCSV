import './bootstrap';

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: () => import('./components/ParseForm.vue') },
    ]
});

const app = createApp(App);
app.use(router);
app.mount('#app');