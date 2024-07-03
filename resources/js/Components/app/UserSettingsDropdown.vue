
<script setup>
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { ChevronDownIcon,ArrowRightEndOnRectangleIcon,UserIcon,Cog6ToothIcon } from '@heroicons/vue/20/solid'
</script>

<template>
      <Menu as="div" class="relative inline-block text-left">
        <div>
          <MenuButton
            class="inline-flex w-full justify-center rounded-md px-4 py-2 text-sm font-medium text-gray-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75"
          >
            {{ $page.props.auth.user.name }}
            <ChevronDownIcon
              class="-mr-1 ml-2 h-5 w-5 text-gray-800 hover:text-gray-700"
              aria-hidden="true"
            />
          </MenuButton>
        </div>

        <transition
          enter-active-class="transition duration-100 ease-out"
          enter-from-class="transform scale-95 opacity-0"
          enter-to-class="transform scale-100 opacity-100"
          leave-active-class="transition duration-75 ease-in"
          leave-from-class="transform scale-100 opacity-100"
          leave-to-class="transform scale-95 opacity-0"
        >
          <MenuItems
            class="absolute right-0 mt-2 w-48 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
          >
            <div class="px-1 py-1">

                <!-- profile -->
                <ResponsiveNavLink
                    :href="route('profile.edit')"
                    :active="$page.url == '/profile'"
                    class="flex"
                >
                    <UserIcon
                        :active="active"
                        class="mr-2 h-5 w-5 text-violet-400"
                        aria-hidden="true"
                    />Profile
                </ResponsiveNavLink>

                <!-- settings -->
                <!-- <ResponsiveNavLink
                    :href="route('home')"
                    active="{{$page.url === route('home')}}"
                    class="flex"
                >
                    <Cog6ToothIcon
                        :active="active"
                        class="mr-2 h-5 w-5 text-violet-400"
                        aria-hidden="true"
                    />Settings
                </ResponsiveNavLink> -->
            </div>

            <div class="px-1 py-1">

                <ResponsiveNavLink
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="flex"
                >
                    <ArrowRightEndOnRectangleIcon
                        :active="active"
                        class="mr-2 h-5 w-5 text-violet-400"
                        aria-hidden="true"
                    />Logout
                </ResponsiveNavLink>
            </div>
          </MenuItems>
        </transition>
      </Menu>
  </template>
