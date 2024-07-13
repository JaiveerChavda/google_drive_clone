<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import FolderLogo from '../../images/folder-logo.png'
</script>

<template>
    <Head title="Home" />
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-light text-xl text-gray-800 leading-tight">Welcome to Drive</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden px-4 py-6 shadow-sm sm:rounded-lg">
                    <!-- //Files and Folder content -->
                    <div class="flex flex-col">
                        <h2>your files</h2>
                    </div>


                    <!-- Todo:No Folder exists -->
                    <div v-if="false" class="flex flex-col gap-6 items-center justify-center">
                        <img :src="FolderLogo" class="w-[300px] rounded-lg" alt="empty folder logo">
                        <h5 class="font-light text-4xl text-gray-600" >No folder exists</h5>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
