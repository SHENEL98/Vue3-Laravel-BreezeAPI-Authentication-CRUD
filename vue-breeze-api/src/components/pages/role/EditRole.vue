<template>
    <div class="mt-6">
        <h1>Edit Role</h1>
        <form @submit.prevent="submitUpdateRole" class="max-w-md ,x-auto p-4 bg-white shadow-md rounded-md">
            <div class="space-y-6">
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray">Name</label>
                    <input type="text" id="name" placeholder="Role Name" v-model="form.role"
                        class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="input2" class="form-label">Role Permissions </label><br>
                    <span v-for="(itemPer, index) in permissions" :key="index">
                        <label class="m-2" for="">
                            <input type="checkbox" class="form-checkbox" id="input2" v-model="form.permission"  
                                :value="itemPer.id" :checked="isItemChecked(itemPer.id, index)" 
                                @change="toggleCheckbox(index)" >  {{ itemPer.name }}
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

import { useRouter, useRoute } from 'vue-router'

const router = useRouter();
const route = useRoute();

const permissions = ref([]);
const rolePermissions = ref([]);
const isProcess = ref(false);

const form = ref({
    role: '',
    permission: []
});

onMounted(async() => {
    getEdit();
});

const getEdit = async () => {
    await axios.get('/api/roles/'+route.params.id+'/edit')
        .then(response => {
            if(response.status === 200){
                form.value.role = response.data.roles.name;
                permissions.value = response.data.permissions;
                rolePermissions.value = response.data.rolePermissions;
            }
        }).catch(error => {
            isProcess.value =false;
        });
};

// that permission id checked or not
const isItemChecked = (value, index) => {
    if(value == rolePermissions.value[value]){
        form.value.permission[index] = value;
        //return true;
    }else{
        //return false;
        form.value.permission[index] = null;
    }
};

const toggleCheckbox = (index) => {
    if(form.value.permission[index] != null ){
        rolePermissions.value[form.value.permission[index]] = null;
        form.value.permission[index] = null;
    }else{
        rolePermissions.value[form.value.permission[index]] = form.value.permission[index] ;
        form.value.permission[index] = form.value.permission[index] ;
    }
}

const submitUpdateRole = async() => {
    isProcess.value = true;
    await axios.post('/api/roles/'+route.params.id,{
        name: form.value.role,
        permission: form.value.permission,
        _method: 'put'
    })
    .then(response => {
        if(response.status === 200){
            isProcess.value = false;
            router.push('/role');
        }
        console.log("saved" + response.data.message);
    }).catch(error => {
        isProcess.value = false;
        errormessage.value = error.response.data.message;
    });
}

</script>