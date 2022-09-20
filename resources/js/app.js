import './bootstrap';

import {createApp} from 'vue';

import App from './App.vue';

axios.defaults.headers.common['Authorization'] = localStorage.getItem('jwt');

createApp(App).mount("#app");