<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 white:text-gray-400">
            <caption
                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-gray dark:bg-white-800">
                 <h1>Post List</h1>
            </caption>
            <br>
            <thead class="text-xs text-gray-700 uppercase bg-white-50 dark:bg-white-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th> 
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in postStore.posts" :key="post.id" class="bg-white border-b dark:bg-white-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                        {{ post.title }}
                    </th>
                    <td class="px-6 py-4">
                        {{ post.description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ post.image }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</template>
<script setup>
import { onMounted } from "vue";

import { useAuthStore } from "../../stores/auth";

const postStore = useAuthStore();

onMounted(async () => {
  await postStore.getPosts();
});
</script>