<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    task: Object
});

const form = useForm({
    task_name: props.task.task_name,
    description: props.task.description
});

const submit = () => { 
    form.put(`/tasks/${props.task.id}/update`, { 
        onSuccess: () => alert('Task Saved!'),
        onError: (errors) => console.log(errors)
    });
};
</script>

<template>
    <div>
        <h1>Edit Task</h1>
        <form action="" @submit.prevent="submit">
            <input type="text" v-model="form.task_name" placeholder="new task name">
            <textarea name="" id="" v-model="form.description" placeholder="description"></textarea>

            <button type="submit" :disabled="form.processing">
                Update Task
            </button>
        
            <p v-if="form.errors.task_name" style="color: red">{{ form.errors.task_name }}</p>
        </form>
    </div>
</template>