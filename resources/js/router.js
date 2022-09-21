import {createRouter, createWebHashHistory} from 'vue-router'
import Task from './components/Task.vue'
import Auth from './components/Auth.vue'
import Todo from './components/Todo.vue'

export default createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/', component: Auth
        },
        {
            path: '/todo', component: Todo
        },
        {
            path: '/task', component: Task, props: true
        },
    ]
})