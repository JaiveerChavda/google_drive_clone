<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import FolderLogo from '../../images/folder-logo.png'
import { computed } from 'vue';

const props = defineProps({
    'files': Object
});


// computed properties
const isFilesExists = computed(() => {
    return props.files.length > 0;
});

console.log(props.files.length);

</script>

<template>

    <Head title="Home" />
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-light text-xl text-gray-800 leading-tight">Welcome to Drive</h1>
        </template>

        <div class="py-8">
            <div class="lg:pe-8 max-w-7xl mx-auto sm:pe-6">
                <div class="overflow-hidden px-4 shadow-sm sm:rounded-lg">
                    <!-- //Files and Folder content -->
                    <div class="flex flex-col" v-if="isFilesExists">
                        <h2 class="font-light text-lg uppercase">your files</h2>


                        <div class="relative overflow-x-auto my-4 shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            size
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Owner
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Last Modified By
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="file in files" :key="file.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ file.name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{file.size}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ file.created_by }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ file.updated_at }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Todo:No Folder exists -->
                    <div v-else class="flex flex-col gap-6 items-center justify-center">
                        <img :src="FolderLogo" class="w-[300px] rounded-lg" alt="empty folder logo">
                        <h5 class="font-light text-4xl text-gray-600">No folder exists</h5>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
