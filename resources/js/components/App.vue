<template>
    <router-view></router-view>
</template>

<script>
    import axios from 'axios';
    import Todo from './Todo.vue';
    import Auth from './Auth.vue';
    // авторизация
    export default {
        data() {
            return {
                err: false
            }
        },
        created() {
            axios.post('/api/auth/me')
            .then(responce => {
                this.$router.push('/todo')
            })
            .catch(error => {
                this.err = true
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