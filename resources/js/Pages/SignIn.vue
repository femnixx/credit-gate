<script setup>
    import { useForm } from '@inertiajs/vue3';

    const form = useForm({ 
        email: '',
        password: ''
    });
</script>

<template>
    <div class="login-container">
        <h1>Login to your account</h1>

    <form action="" @submit.prevent="form.post('/sign-in')">
        <label for="">Your email:</label>
        <input type="text" v-model="form.email" class="border p-2">
        <div v-if="form.errors.email">{{  form.errors.email }}</div>
        <label for="">Your password:</label>
        <input type="text" v-model="form.password" class="border p-2">
        
        <p>Your email is: {{ form.email }}</p>
    </form>

    </div>
</template>