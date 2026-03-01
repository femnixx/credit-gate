<script setup>
    import { computed } from 'vue';
    import { router } from '@inertiajs/vue3';

    const props = defineProps({
        user: Object,
        serverTime: String
    });

    const isLoggedIn = computed(() => props.user !== null);

    const firstName = computed(() => { 
        return isLoggedIn.value ? props.user.name.split(' ')[0] : "Guest";
    });

    const userCredits = computed(() => { 
        return isLoggedIn.value ? props.user.credits : null;
    });

    const subtractCredits = () => { 
        router.post('/homepage/deduct');
    }
    const addCredits = () => { 
        router.post('/homepage/increment');
    }
</script>

<template>
    <div>
        <h1>Welcome to Credit Gate, {{ firstName }}</h1>

        <div v-if="isLoggedIn">
            <p>Logged in as: <strong>{{ props.user.email }}</strong></p>
            <p>Credits: {{ userCredits }}</p>
            <button v-on:click="subtractCredits">Make task (deducts 10 credits)</button>
            <div v-if="userCredits < 10" class="text-red-500">
                <p>Insufficient funds!</p>
            </div>
            <button v-on:click="addCredits">Click here to add credits!</button>
        </div>

        <div v-else>
            <p>Please log in to see your stats.</p>
            <div class="flex gap-4 mt-2">
                <a href="/sign-in">Sign In</a>
                <a href="/sign-up">Sign Up</a>
            </div>
        </div>
    </div>
</template>