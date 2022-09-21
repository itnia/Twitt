<template>
    <button @click="exit">Exit</button>
    <label for="task" class="form-label">Awesome Todo List</label>
    <div class="row g-3">
        <div class="col">
            <input v-model="task" @keydown.enter="add" type="text" class="form-control" id="task">
        </div>
        <div class="col-auto">
            <button @click="add" type="submit" class="btn btn-primary mb-3">Add</button>
        </div>
    </div>

    <div v-for="value in tasks">
        <div @click="$store.state.value = value, $router.push('/task')" class="form-check">
            <div class="row g-3">
                <div class="col">
                    <input @click="notice(value.id)" class="form-check-input" type="checkbox" value="" :id="'task_' + value.id">
                    <span class="form-check-label" :for="'task_' + value.id">
                        <div v-bind:class="value.notice ? 'text-decoration-line-through' : ''">
                            {{ value.task }}
                        </div>
                    </span>
                </div>
                <div class="col-auto">
                    <button @click="deleteTask(value.id)">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // необходима начальная загрузка задач с сервера
    export default {
        data() {
            return {
                task: null,
                tasks: null
            }
        },
        mounted() {
            this.indexTasks();
        },
        methods: {
            exit () {
                axios.post('/api/auth/logout');
                this.$router.push('/');
            },
            indexTasks() {
                axios.post('/api/task')
                    .then(response => {
                        this.tasks = response.data;
                    })
            },
            add() {
                if(this.task) {
                    axios.post('/api/task/store', {'task': this.task})
                    this.task = "";
                    this.indexTasks();
                }
            },
            deleteTask(id) {
                axios.delete('/api/task/' + id)
                this.indexTasks();
            },
            notice(id) {
                // изменить текст на зачеркнутый
                axios.patch('/api/task/' + id)
                this.indexTasks();
            }
        }
    }
</script>