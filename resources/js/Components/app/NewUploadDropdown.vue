<script setup>
import { DocumentPlusIcon, FolderPlusIcon, PlusIcon } from '@heroicons/vue/20/solid';
import Dropdown from '@/Components/Dropdown.vue';
</script>
<template>
    <Dropdown align="left">
        <!-- upload button trigger -->
        <template #trigger>
            <button
                class="mb-4 flex items-center px-4 py-4 bg-white border border-gray-300 rounded-xl shadow-md hover:bg-indigo-100 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300">
                <PlusIcon class="mr-2 text-gray-600" style="width: 30px;" />
                <p class="text-sm">New</p>
            </button>
        </template>

        <!-- upload dropdown content -->
        <template #content>
            <div class="px-4 flex flex-col gap-2 py-2">
                <a href="/" class="flex items-center gap-2 text-sm py-2 hover:bg-gray-200 px-4 rounded-md">
                    <DocumentPlusIcon class="h-5 w-5 text-gray-600" />
                    <span>File Upload</span>
                </a>
                <a href="/" class="flex items-center gap-2 text-sm py-2 hover:bg-gray-200 px-4 rounded-md">
                    <FolderPlusIcon class="h-5 w-5 text-gray-600" />
                    <span>Folder Upload</span>
                </a>

            </div>


        </template>
    </Dropdown>
</template>
