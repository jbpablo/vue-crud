
<script setup>
    import { defineProps } from 'vue';
    import { Link } from '@inertiajs/vue3';
    import { Axios } from 'axios';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

    defineProps([
    'posts'
    ]);

    function confirmDelete(postId){
        let answer = window.confirm("Delete Post?");
        if (answer) {  
            axios.delete("/delete/"+postId).then(function (response) {
              if(response.status == 200){
                alert('Post deleted');
                window.location.href = '/post';
              }
              else{
                alert('Failed to delete the post');
              }
            })
        }
    }

</script>

<template>
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto p-20">
                        <nav class="mb-8 mt-8">
                            <Link href="/post/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Create Post</Link>
                        </nav>
                        <div class="border-solid border-2 border-gray-300 p-10 mb-5 rounded-lg" v-for="post in posts" :key="post.id">
                            
                            <p class="text-black-700 font-bold mb-2">{{ post.title }}</p>    
                            <p class="text-black-300 font-light mb-3">{{ post.content }}</p>
                            <p  class="text-black-300 font-light mb-8">{{ post.author.email }}</p>
                            <div  class="pb-5">
                                <Link :href="`/post/${post.id}`" class="text-blue-700 hover:text-blue-300" >Read more</Link>
                                <Link class="ml-3 text-green-700 hover:text-green-300" :href="`/post/edit/${post.id}`" >Edit</Link>
                                <!-- <Link class="ml-3 text-red-300" :href="`/delete/${post.id}`" method="delete">Delete</Link> -->
                                <button class="ml-3 text-red-300" @click="confirmDelete(post.id)">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    
</template>
