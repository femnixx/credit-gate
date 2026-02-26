<script setup>
    import { usePage } from '@inertiajs/vue3';
    import { computed } from 'vue';

    const props = defineProps({
        user: Object,
        serverTime: String
    });

    const isLoggedIn = computed(() => props.user !== null);

    const firstName = computed(() => { 
        return isLoggedIn.value ? props.user.name.split(' ')[0] : 'Guest';
    });
</script>

<template>
    <div>
        <h1>Welcome to Credit Gate, {{ firstName }}</h1>

        <div v-if="isLoggedIn">
            <p>Logged in as: <strong>{{  user.email }}</strong></p>
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