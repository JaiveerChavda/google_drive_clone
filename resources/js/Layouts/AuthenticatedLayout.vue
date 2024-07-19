<script setup>
import { ref } from 'vue';
import Navigation from '@/Components/Navigation.vue';
import SearchForm from '@/Components/app/SearchForm.vue'
import UserSettingsDropdown from '@/Components/app/UserSettingsDropdown.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="h-screen bg-gray-50 flex w-full gap-4">
        <Navigation/>

        <main class="flex flex-col flex-1 px-4 overflow-hidden">
            <div class="flex justify-between items-center w-full">
                <SearchForm/>
                <UserSettingsDropdown/>
            </div>

            <div class="bg-white px-4 rounded-xl">
                <div class="mt-5">
                <slot name="header"/>
            </div>

            <div class="flex flex-1 flex-col overflow-y-auto">
                <slot/>
            </div>
            </div>
        </main>
    </div>

</template>
