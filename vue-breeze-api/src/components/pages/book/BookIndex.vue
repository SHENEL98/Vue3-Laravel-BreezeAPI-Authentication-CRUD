<template>
    <div class="mt-6">
        <h1>Books</h1>
        <div class="flex justify-end m-2 p-2">
            <router-link  :to="{}" class="px-4 py2 bg-blue-500 hover:bg-blue-700 text-white rounded">Add new book detail</router-link>
        </div>
    </div>
    <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-white-50 dark:bg-white-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created by
                        </th>
                        <th scope="col" class="px-7 py-4">
                            <span class="sr-only">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="book in books" :key="book.id" class="bg-white dark:bg-white-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                            {{ book.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ book.price }}
                        </td>
                        <td class="px-10 py-4 text-right">
                            <!--<router-link :to="{name: 'SkillEdit', params: {id: skill.id}}" class="
                                px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded"> Edit </router-link>
                            <button @click="deleteSkill(skill.id)" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded"> Delete</button>-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</template>
<script setup>
    import apiBooks from '../../../composables/Books';
    import { onMounted } from 'vue';

    const { books, getBooks } = apiBooks();
    onMounted(() => getBooks());

   
   


</script>