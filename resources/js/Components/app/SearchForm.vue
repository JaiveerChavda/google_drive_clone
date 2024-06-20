<script setup lang="ts">
//Imports
import TextInput from '../TextInput.vue';
import { useForm } from '@inertiajs/vue3';

//Uses
const form = useForm({
    search: ''
})


</script>

<template>
    <form class="w-[600px] h-[80px] flex items-center">
        <TextInput
            type="test"
            class="block w-full mr-2 py-3 px-3"
            v-model="form.search"
            autocomplete
            placeholder="Search for File & Folders"
        />
    </form>
</template>
