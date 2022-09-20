<template>
    <auth @auth="auth = true" v-if="!auth"></auth>
    <todo @exit="auth = false" v-else></todo>
</template>

<script>
    import axios from 'axios';
    import Todo from './Todo.vue';
    import Auth from './Auth.vue';
    // авторизация
    export default {
        data() {
            return {
                auth: false,
                err: false
            }
        },
        created() {
            axios.post('/api/auth/me')
            .catch(error => {this.err = true})
            .then(responce => {
                this.auth= this.err ? false : true;
            })
        },
        methods: {

        },
        components: {
            Todo,
            Auth
        }
    }
</script>