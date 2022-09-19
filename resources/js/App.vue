<template>
    <label for="task" class="form-label">Awesome Todo List</label>
    <div class="row g-3">
        <div class="col">
            <input v-model="task" @keydown.enter="add" type="text" class="form-control" id="task">
        </div>
        <div class="col-auto">
            <button @click="add" type="submit" class="btn btn-primary mb-3">Add</button>
        </div>
    </div>

    <div v-for="(t, index) in tasks">
        <div class="form-check">
            <div class="row g-3">
                <div class="col">
                    <input @click="notice(index)" class="form-check-input" type="checkbox" value="" :id="'task_' + index">
                    <label class="form-check-label" :for="'task_' + index">
                        {{ t }}
                    </label>
                </div>
                <div class="col-auto">
                    <button @click="deleteTask(index)">Delete</button>
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
                tasks: [],
            }
        },
        methods: {
            indexTasks() {
                axios.get('/api/task')
                    .then(function (response) {
                        // обработка успешного запроса
                        console.log(response.data);
                    })
            },
            add() {
                if(this.task) {
                    this.tasks.push(this.task);
                    axios.post('/api/task/store', {'task': this.task})
                    .then(function (response) {
                        // обработка успешного запроса
                        console.log(response.data);
                    })
                    this.task = "";
                }
            },
            deleteTask(key) {
                this.tasks.splice(key, 1);
                axios.delete('/api/task/' + key)
                    .then(function (response) {
                        // обработка успешного запроса
                        console.log(response.data);
                    })
            },
            notice(key) {
                // изменить текст на зачеркнутый
                axios.patch('/api/task/' + key)
                    .then(function (response) {
                        // обработка успешного запроса
                        console.log(response.data);
                    })
            }
        }
    }
</script>