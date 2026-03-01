<script setup>
import { useForm } from '@inertiajs/vue3';
import { formToJSON } from 'axios';
import { ref } from 'vue';

const form = useForm({
    name: '',
    email: '',
    password: ''
});

const showToast = ref(false);


const submit = () => { 
    form.post('/sign-up', { 
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
            <div v-if="form.errors.name" class="text-red-500 font-bold">{{ form.errors.name }}</div>
            <label for="">Your email:</label>
            <input type="text" v-model="form.email" class="border p-2">
            <div v-if="form.errors.email" class="text-red-500 font-bold"> {{ form.errors.email }}</div>
            <label for="">Your password:</label>
            <input type="password" v-model="form.password" class="border p-2">
            <div v-if="form.errors.password" class="text-red-500 font-bold">{{ form.errors.password }}</div>
            <button type="submit" :disabled="form.processing">{{ form.processing ? 'Signing up...' : 'Submit' }}</button>
        </form>
    </div>
</template>