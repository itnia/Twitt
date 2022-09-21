<template>
    <div v-if="reg" class="container col-2 mt-5">
        <h1>Вход</h1>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Имя пользавотеля</label>
                <input v-model="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input v-model="password" type="password" class="form-control" id="exampleInputPassword1" autocomplete="on">
            </div>
            <div v-if="err">неверный логин или пароль</div>
            <button @click.prevent="authentication" type="submit" class="btn btn-primary">Войти</button>
        </form>
        <hr>
        <a @click.prevent="win" href="#">Регистрация</a>
    </div>

    <div v-else class="container col-2 mt-5">
        <h1>Регистрация</h1>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Имя пользавотеля</label>
                <input v-model="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input v-model="password" type="password" class="form-control" id="exampleInputPassword1" autocomplete="on">
            </div>
            <div v-if="err">неверный логин или пароль</div>
            <button @click.prevent="registration" type="submit" class="btn btn-primary">Регистрация</button>
        </form>
        <hr>

        <a @click.prevent="win" href="#">Войти</a> 
    </div>
</template>

<script>
    import axios from 'axios';
    // авторизация
    export default {
        data() {
            return {
                reg: true,
                name: null,
                password: null,
                err: false
            }
        },
        methods: {
            win(){
                this.reg = !this.reg;
                this.error = null;
            },
            registration() {
                axios.post('/api/auth/reg', {'name': this.name, 'password': this.password})
                    .then(responce => {
                        this.authentication();
                    })
            },
            authentication() {
                this.err = false;
                axios.post('/api/auth/login', {'name': this.name, 'password': this.password})
                    .catch(error => this.err = true)
                    .then(responce => {
                        if(!this.err) {
                            localStorage.setItem('jwt', 'Bearer ' + responce.data.access_token);
                            axios.defaults.headers.common['Authorization'] = localStorage.getItem('jwt');
                            this.$router.push('/todo');
                        }
                    })
            }
        },
    }
</script>