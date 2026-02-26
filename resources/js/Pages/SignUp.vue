<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    emaill: '',
    password: ''
});
</script>

<template>
    <div class="signup-container">
        <h1>Join the cat club!</h1>

        <form @submit.prevent="form.post('/sign-up')">
            <label for="">Your name:</label>
            <input type="text" v-model="form.name" class="border p-2">
            <label for="">Your email:</label>
            <input type="text" v-model="form.emaill" class="border p-2">
            <label for="">Your password:</label>
            <input type="text" v-model="form.password" class="border p-2">
            
            <p>Preview: Your name is: {{ form.name }}</p>
        </form>
    </div>
</template>