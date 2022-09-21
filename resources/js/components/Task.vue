<template>
    <button @click="$router.push('/todo')">назад</button>
    <div class="form-check">
        <div class="row g-3">
            <div class="col">
                <!-- <input @click="notice(value.id)" class="form-check-input" type="checkbox" value="" :id="'task_' + value.id"> -->
                <span class="form-check-label" :for="'task_' + value.id">
                    <div v-bind:class="value.notice ? 'text-decoration-line-through' : ''">
                        {{ value.task }}
                    </div>
                </span>
            </div>
            <div class="col-auto">
                <!-- <button @click="deleteTask(value.id)">Delete</button> -->
            </div>
        </div>
</div>
</template>

<script>
    export default {
        // необходимо исрользование vuex / vue(?)
        data () {
            return {
                value: this.$store.state.value
            }
        },
    }
</script>