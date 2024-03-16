<script setup>
 import {  onMounted} from 'vue';
 import { useAuthStore } from '../stores/auth';

 const authStore = useAuthStore();

 onMounted(async() => {
    await authStore.getUser()
 });

</script>
<template>
    <div v-if="authStore.user">
        <h1>{{ authStore.user.name }}</h1>
        <h1>{{ authStore.user.email }}</h1>
    </div>
    <div v-else>
        <h1>Go to login</h1>
    </div>
</template>