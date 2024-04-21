<template>
    <div class="mt-6">
        <h1>Skills</h1>
        <form @submit.prevent="storeSkill(form)" class="max-w-md ,x-auto p-4 bg-white shadow-md rounded-md">
            <div class="space-y-6">
                <div class="mb-6">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray">Name</label>
                    <input type="text" id="name" v-model="form.name"
                        class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div v-if="errors.name">
                        <span class="text-sm text-red-400">{{ errors.name[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="slug"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray">Slug</label>
                    <input type="text" id="slug" v-model="form.slug"
                        class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div v-if="errors.slug">
                        <span class="text-sm text-red-400">{{ errors.slug[0] }}</span>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded">Save</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script setup>
  import { reactive } from 'vue';
    import useSkills from '../../../composables/Skills';

    const {storeSkill, errors } = useSkills();

  const form = reactive({
    name: "",
    slug: ""
  })
</script>