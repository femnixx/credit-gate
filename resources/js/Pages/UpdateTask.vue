<script setup>
    import { useForm } from '@inertiajs/vue3';

    const props = ({ 
        task: Object
    });

    const form = useForm({
        task_name: props.task.task_name,
        description: props.task.description
    });

    const submit = () => { 
        form.put('tasks/{task}', props.task.id, {
            onSuccess: () => alert('Task saved!'),
            onError: () => console.log("Check your validation rules")
        }); 
    };
</script>

<template>
    <form action="" @submit.prevent="submit">
        <input type="text" v-model="form.task_name" placeholder="new task name">
        <textarea name="" id="" v-model="form.description" placeholder="description"></textarea>
        <p v-if="form.errors.task_name">{{ form.errors.task_name }}</p>
    </form>
</template>