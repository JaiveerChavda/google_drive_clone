<script setup lang="ts">
import ApplicationLogo from './ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import NavLink from './NavLink.vue';
import NewUploadDropdown from '@/Components/app/NewUploadDropdown.vue';
import { HomeIcon, TrashIcon, UserCircleIcon, UsersIcon } from '@heroicons/vue/20/solid';
</script>

<template>
    <nav class="min-w-[200px] border border-r">

        <!-- Logo -->
        <div class="h-[80px] px-3 flex gap-3">
            <Link href="/home" class="flex items-center">
            <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
              <!-- App name -->
              <p class="font-semibold uppercase tracking-widest ml-4">Drive</p>
            </Link>

        </div>

        <div class="px-3">

            <!-- Upload Button (file and folder upload) -->
            <NewUploadDropdown />

            <!-- Other Links -->
            <div>
                <NavLink href="/home" :active="$page.url == '/home'"> <HomeIcon class="w-5 mr-2"/> <span>Home</span></NavLink>
                <NavLink href="/"> <UsersIcon class="w-5 mr-2" /> <span>Shared with me </span></NavLink>
                <NavLink href="/"> <UserCircleIcon class="w-5 mr-2"/> <span>Shared by me</span></NavLink>
                <NavLink href="/"> <TrashIcon class="w-5 mr-2" /> <span>Bin</span></NavLink>
            </div>
        </div>
    </nav>
</template>
