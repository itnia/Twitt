import './bootstrap';
import router from './router';
import {createApp} from 'vue';
import { createStore } from 'vuex'
import App from './components/App.vue'

axios.defaults.headers.common['Authorization'] = localStorage.getItem('jwt');

const store = createStore({
    state () {
        return {
            task: null
        }
    },
    mutations: {
        // increment (state) {
        //     state.count++
        // }
    }
})

const app = createApp(App)
app.use(router)
app.use(store)
app.mount("#app")