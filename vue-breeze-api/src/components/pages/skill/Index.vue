<template>
    <div class="mt-6">
        <h1>Skills</h1>
        <div class="flex justify-end m-2 p-2">
            <router-link :to="{name: 'SkillCreate'}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded"> Create New Skill</router-link>
        </div>
        <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-white-50 dark:bg-white-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Slug
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-7 py-4">
                            <span class="sr-only">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="skill in skills" :key="skill.id" class="bg-white dark:bg-white-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                            {{ skill.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ skill.slug }}
                        </td>
                        <td class="px-10 py-4 text-right">
                            <router-link :to="{name: 'SkillEdit', params: {id: skill.id}}" class="
                                px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded"> Edit </router-link>
                            <button @click="deleteSkill(skill.id)" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded"> Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>
<script setup>
    import useSkills from '../../../composables/Skills';
    import { onMounted} from 'vue';

    const { skills, getSkills, deleteSkill} = useSkills();

    onMounted(() => getSkills());

</script>