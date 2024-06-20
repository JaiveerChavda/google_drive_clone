<script setup lang="ts">
import ApplicationLogo from './ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import NavLink from './NavLink.vue';
</script>

<template>
    <nav class="min-w-[200px] border border-r">

        <!-- Logo -->
        <div class="h-[80px] px-3 flex items-center gap-3">
            <Link href="/dashboard" class="flex">
                <ApplicationLogo
                    class="block h-9 w-auto fill-current text-gray-800"
                />
            </Link>
            <!-- App name -->
            <p class="font-semibold uppercase tracking-widest">Drive</p>
        </div>
        <div class="px-3">
            <!-- Todo CreateNewUploadDropdown -->
            <div>
            <NavLink href="/dashboard" :active="$page.url == '/dashboard'">My Files</NavLink>
            <NavLink href="/">Shared with me</NavLink>
            <NavLink href="/">Shared by me</NavLink>
            <NavLink href="/">Trash</NavLink>
        </div>
        </div>
    </nav>
</template>
