<script setup>
    import { computed } from 'vue';
    import { router, usePage } from '@inertiajs/vue3';

    const page = usePage();
    const props = defineProps({
        user: Object,
        tasks: Object,
        serverTime: String
    });

    const user = computed(() => page.props.auth.user);
    const isLoggedIn = computed(() => user.value !== null);

    const firstName = computed(() => { 
        return isLoggedIn.value ? user.value.name.split(' ')[0] : "Guest";
    });

    const userCredits = computed(() => { 
        return user.value ? props.user.credits : null;
    });

    const subtractCredits = () => { 
        router.post('/homepage/deduct');
    }
    const addCredits = () => { 
        router.post('/homepage/increment');
    }

    const logOut = () => {
        router.post('/sign-out', {}, { 
            replace: true,
            onSuccess: () => { 
                window.location.href = '/sign-in';
            }
        });
    }
    const editTask = (id) => { 
        router.get(`/tasks/${id}/edit`)
    };

    const deleteTask = (id) => {
        router.delete(`tasks/${id}`)
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

        <div v-if="props.tasks.data.length >0">
            <div v-for="task in props.tasks.data" :key="task.id" class="task-item">
                <span>TaskID: {{ task.id }} - {{ task.task_name }}</span>
                <button @click="editTask(task.id)">Edit Task</button>
                <button @click="deleteTask(task.id)">Delete Task</button>
            </div>
        </div>
        <div v-else>
            <p>No tasks that are able to be viewed</p>
        </div>
    </div>
</template>