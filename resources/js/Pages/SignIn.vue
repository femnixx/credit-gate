<script setup>
    import { useForm } from '@inertiajs/vue3';
    import {Link} from '@inertiajs/vue3';

    const form = useForm({ 
        email: '',
        password: ''
    });

    const submit = () => { 
        form.post('/sign-in', { 
            onSuccess: () => console.log("Logged in!"),
        });
    }
</script>

<template>
    <div class="login-container">
        <h1>Login to your account</h1>

    <form action="" @submit.prevent="submit">
        <label for="">Your email:</label>
        <input type="text" placeholder="email@gmail.com" v-model="form.email" class="border p-2">
        <div v-if="form.errors.email">{{  form.errors.email }}</div>
        <label for="">Your password:</label>
        <input type="password" placeholder="password" v-model="form.password" class="border p-2">
        
        <button type="submit" :disabled="form.processing" class="p-2 ml-2">{{ form.processing ? 'Signing In...' : 'Login'}}</button>
    </form>

    </div>
</template>