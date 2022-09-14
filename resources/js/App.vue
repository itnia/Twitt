<template>
    <input v-model="task" @keydown.enter="add" type="text" name="task">
    <button @click="add">Create</button>
    <div v-for="(t, index) in tasks">
        <input @click="notice" type="checkbox" name="" id="">
        {{ t }}
        <button @click="deleteTask(index)">Delete</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                task: null,
                tasks: []
            }
        },
        methods: {
            add() {  
                if(this.task) {
                    this.tasks.push(this.task);
                    this.task = "";
                }
            },
            deleteTask(key) {
                this.tasks.splice(key, 1);
            },
            notice() {
                console.log('okey');
                // изменить текст на зачеркнутый
            }
        }
    }
</script>