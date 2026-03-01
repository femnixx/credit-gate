<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { route } from 'ziggy-js';

const form = useForm({
    name: '',
    email: '',
    password: ''
});

const showToast = ref(false);


const submit = () => { 
    form.post(route('sign.up'), { 
        onSuccess: () => {  
            showToast.value = true;
            setTimeout(() => showToast.value = false, 3000);
        },
        onFinish: () => form.reset('password')
    });
}
</script>

<template>
    <div class="signup-container">

        <div v-if="showToast">Sign up successful for {{ form.email }}</div>
        <h1>Join the cat club!</h1>

        <form @submit.prevent="submit">
            <label for="">Your name:</label>
            <input type="text" v-model="form.name" class="border p-2">
            <label for="">Your email:</label>
            <input type="text" v-model="form.emaill" class="border p-2">
            <label for="">Your password:</label>
            <input type="password" v-model="form.password" class="border p-2">
            
            <button type="submit" :disabled="form.processing">{{ form.processing ? 'Signing up...' : 'Submit' }}</button>
        </form>
    </div>
</template>