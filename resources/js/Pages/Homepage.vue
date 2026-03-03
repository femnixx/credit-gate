<script setup>
    import { computed } from 'vue';
    import { router } from '@inertiajs/vue3';

    const props = defineProps({
        user: Object,
        tasks: Object,
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

    const logOut = () => {
        router.post('/sign-out')
        window.location.reload();
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
            <button><a href="/create-tasks">Create Task</a></button>
            <button v-on:click="addCredits">Click here to add credits!</button>
            <button v-on:click="logOut">Sign Out</button>
        </div>

        <div v-else>
            <p>Please log in to see your stats.</p>
            <div class="flex gap-4 mt-2">
                <a href="/sign-in">Sign In</a>
                <a href="/sign-up">Sign Up</a>
            </div>
        </div>

        <div v-if="tasks.data.length > 0">
            <div v-for="tasks in tasks.data" :key="tasks.id">{{ tasks.task_name }}</div>
        </div>

        <div v-else>
            <p>No tasks that are able to be viewed</p>
        </div>
    </div>
</template>