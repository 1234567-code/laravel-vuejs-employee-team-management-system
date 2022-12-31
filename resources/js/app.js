import './bootstrap';
import {createApp} from 'vue';
import app from './vue/app.vue';
import router from './router';
import store from './vue/store/index';

createApp(app).use(store).use(router).mount("#app");

