import './bootstrap';

import {createApp} from 'vue'

import app from './components/app.vue'

import router from './router/router.js'


createApp(app).use(router).mount('#app');
