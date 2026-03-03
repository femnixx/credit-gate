<script setup>
import { Form, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    task_name: '',
    description: ''
});

const submit = () => { 
    form.post('/create-tasks/post', {
    });
}
</script>

<template>
    <div class="font-bold h1">Task Creator</div>

    <form @submit.prevent="submit">
        <label for="">Task Name</label>
        <input v-model="form.task_name" type="text" placeholder="Buy cat food">
        <label for="">Task description (optional)</label>
        <input v-model="form.description" type="text" placeholder="Description...">
        <button class="" v-on:submit="submit">Submit</button>
        <div v-if="form.processing">
            Deducting credits...
        </div>
        <div v-else-if="form.recentlySuccessful">
            Successfull! Task posted: {{ form.task_name }}
        </div>
        <div v-else-if="form.hasErrors">
            <ul v-for="(error, index) in form.errors" :key="index">
                <li>{{ error }}</li>
            </ul>
        </div>

    </form>
</template>