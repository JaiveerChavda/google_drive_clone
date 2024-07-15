<script setup>
import { DocumentPlusIcon, FolderIcon, FolderPlusIcon, PlusIcon } from '@heroicons/vue/20/solid';
import Dropdown from '@/Components/Dropdown.vue';
import Modal from '../Modal.vue';
import { nextTick, ref } from 'vue';
import TextInput from '../TextInput.vue';
import PrimaryButton from '../PrimaryButton.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import SecondaryButton from '../SecondaryButton.vue';
import InputError from '../InputError.vue';

// const errors;

const open = ref(false);

const folderNameInput = ref(null)

const newFolderForm = useForm({
    name: null,
})

function closeCreateNewFolderModal()
{
    open.value = false;
    newFolderForm.clearErrors();
    newFolderForm.reset();
}

function onShow()
{
    nextTick(() => {
        folderNameInput.value.focus();
    })
}

function submit()
{
    newFolderForm.post('folder/create',{
        onSuccess: (() => {
            closeCreateNewFolderModal();
        }),
        onError: (() => {
            folderNameInput.value.focus();
        })
    })
}

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
                <button @click="open = true"
                    class="flex items-center gap-2 text-sm py-2 hover:bg-gray-200 px-4 rounded-md">
                    <FolderIcon class="h-5 w-5 text-gray-600" />
                    <span>New Folder</span>
                </button>
                <hr>
                <a href="/" class="flex items-center gap-2 text-sm py-2 hover:bg-gray-200 px-4 rounded-md">
                    <DocumentPlusIcon class="h-5 w-5 text-gray-600" />
                    <span>File Upload</span>
                </a>
                <a href="/" class="flex items-center gap-2 text-sm py-2 hover:bg-gray-200 px-4 rounded-md">
                    <FolderPlusIcon class="h-5 w-5 text-gray-600" />
                    <span>Folder Upload</span>
                </a>

            </div>

            <Modal :show="open" @show="onShow" @close="closeCreateNewFolderModal" maxWidth="sm">
                <div class="flex flex-col gap-4 p-5">
                    <h3 class="text-xl font-thin">New folder</h3>
                    <!-- //submit is create New folder form submit -->
                    <form class="inline-block flex flex-col gap-4" @submit.prevent="submit">
                        <TextInput
                            id="name"
                            ref="folderNameInput"
                            placeholder="Untitled folder"
                            v-model="newFolderForm.name"
                        />
                        <InputError :message="newFolderForm.errors.name" />
                        <div class="flex justify-end space-x-4">

                            <SecondaryButton @click="closeCreateNewFolderModal">Cancel</SecondaryButton>
                            <PrimaryButton
                                type="submit"
                                :disabled="newFolderForm.processing"
                                :class="{ 'opacity-50': newFolderForm.processing }"
                            >
                                Submit
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </Modal>

        </template>
    </Dropdown>
</template>
