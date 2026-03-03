<script setup>
import { Form, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    task_name: '',
    description: ''
});

const showToast = false;

const submit = () => { 
    form.post('/create-tasks/post', {
        onSuccess: () => { 
            showToast.valueOf = true;
            setTimeout(() => showToast.valueOf = false, 3000)
        },
        onFinish: () => form.reset('task_name', 'description')
    });
}
</script>

<template>
    <div class="font-bold h1">Task Creator</div>

    <form @submit.prevent="submit">
        <label for="">Task Name</label>
        <input type="text" placeholder="Buy cat food">
        <label for="">Task description (optional)</label>
        <input type="text" placeholder="Description...">
        <button class="" v-on:submit="submit">Submit</button>
        <div v-if="form.processing">
            Deducting credits...
        </div>
        <div v-else-if="form.recentlySuccessful">
            Successfull!
        </div>
        <div v-else-if="form.hasErrors">
            Failed to deduct credits or create task.
        </div>

    </form>
</template>