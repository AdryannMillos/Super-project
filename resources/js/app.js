import { createApp } from 'vue';
import Home from './components/Home.vue';
const app = createApp({});

//register the component
app.component('Home', Home);

//..HTML element to mount the Vue application
app.mount('#app');

require('./bootstrap');