
<script setup>
    import { defineProps } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Link } from '@inertiajs/vue3';
    import TextInput from '@/Components/TextInput.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    let props = defineProps({
        post:Object
    });

    const form = useForm({
        title: props.post.title,
        content: props.post.content,
    });

</script>

<template>
        
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto pt-5 p-10">
                        <form @submit.prevent="form.put(`/post/update/${post.id}`)">
                            <div class="p-10">
                                <InputLabel value="Title"></InputLabel>
                                <TextInput type="text" class="w-[90%]" v-model="form.title"></TextInput>
                            </div>
                            <div class="p-10">
                                <InputLabel value="Content"></InputLabel>
                                <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-[90%] h-[30vh]" v-model="form.content"></textarea>
                            </div>
                            <div class="p-10">
                                <PrimaryButton type="submit">Update Post</PrimaryButton>
                                <Link href="/post" class="ml-5 border-solid border-2 border-blue-300 hover:bg-blue-700 text-blue-600 hover:text-white font-bold py-2 px-5 rounded">  Back</Link>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
