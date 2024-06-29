<template>
    <div class="mt-6">
        <h1>Create Role</h1>
        <form @submit.prevent="submitCreateRole(form)" class="max-w-md ,x-auto p-4 bg-white shadow-md rounded-md">
            <div class="space-y-6">
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray">Name</label>
                    <input type="text" id="name" placeholder="Role Name" v-model="form.name"
                        class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="input2" class="form-label">Role Permissions </label><br>
                    <span v-for="(itemPer, index) in permissions" :key="index">
                        <label class="m-2" for="">
                            <input type="checkbox" class="form-checkbox" id="input2" v-model="form.permission"  
                                :value="itemPer.id">  {{ itemPer.name }}
                        </label>
                        <br>
                    </span>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded">Save</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

import { useRouter } from 'vue-router'

const router = useRouter();

const permissions = ref([]);
const isProcess = ref(false);

const form = ref({
    name: '',
    permission: []
});

onMounted(async() => {
    listPermission();
});

const listPermission = async () => {
    const response = await axios.get('/api/roles/create');
    permissions.value = response.data;
};

const submitCreateRole = async() => {
    isProcess.value = true;
    await axios.post('/api/roles',{
        name: form.value.name,
        permission: form.value.permission,
    })
    .then(response => {
        if(response.status === 200){
            isProcess.value = false;
            router.push('/role');
        }
        console.log("saved," + response.data.message);
    }).catch(error => {
        isProcess.value = false;
        errormessage.value = error.response.data.message;
    });
}

</script>