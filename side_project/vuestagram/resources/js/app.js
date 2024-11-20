require('./bootstrap');

import { createApp } from 'vue';
import AppComponent from '../views/components/AppComponent.vue';
import router from './route';

createApp({
    components: {
        AppComponent,
    }

})
.use(router)
.mount('#app');