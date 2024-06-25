<template>
    <div class="mt-6">
        <h1>Roles</h1>
        <div class="flex justify-end m-2 p-2">
            <router-link :to="{name: 'RoleCreate'}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded"> Create New Skill</router-link>
        </div>
        <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-white-50 dark:bg-white-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Name Role
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(role, index) in roles.data" :key="index" class="bg-white dark:bg-white-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                            {{ index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ role.name }}
                        </td>
                        <td class="px-10 py-4 text-right">
                            <button class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded">View</button>
                            <router-link :to="{name: 'RoleEdit', params: {id: role.id}}" class="
                                px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded"> Edit </router-link>
                            <button @click="deleteRole(role.id)" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded"> Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>
<script setup>
    import { ref, onMounted} from 'vue';
    import axios from "axios"

    import { useRouter} from 'vue-router';
    import Swal from 'sweetalert2';

    const router = useRouter();
    const roles = ref([]);

    onMounted(async () => {
        listRole();
    });

    const listRole = async (page) => {
        const response = await axios.get('/api/roles');
        console.log(""+ response);
        roles.value = response;
    }

    let search = ref('');

    const deleteRole = (id, index) => {
        Swal.fire({
            title: 'Are you sure ?',
            text: "You won't be able to revert this ?",
            icon: 'warning',
            showCancleButton: true,
            confirmButtonColor: '#3085d6',
            cancleButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if(result.isConfirmed){
                await axios.delete('/api/roles/'+ id)
                    .then(response => {
                        if( response.status === 200){
                            roles.value.data.splice(index, 1);
                        }
                    })
            }
        })
    }

</script>