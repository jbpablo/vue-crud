
<script setup>
    import { defineProps } from 'vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Link } from '@inertiajs/vue3';
    import { Axios } from 'axios';

    defineProps({
        post: Object
    });
    

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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts / {{ post.title }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto p-20">
                        <div class="border-solid border-2 border-gray-300 p-10 mb-5 rounded-lg" >
                            
                            <p class="text-black-700 font-bold mb-2">{{ post.title }}</p>    
                            <p class="text-black-300 font-light mb-3">{{ post.content }}</p>
                            <p  class="text-black-300 font-light mb-8">{{ post.author.email }}</p>
                        </div>
                        <nav class="mb-8 mt-8">
                            <Link href="/post" class="border-solid border-2 border-blue-300 hover:bg-blue-700 text-blue-600 hover:text-white font-bold py-2 px-5 rounded">  Back</Link>
                            <button class="ml-5 border-solid border-2 border-red-300 hover:bg-red-700 text-red-600 hover:text-white font-bold py-1.5 px-5 rounded" @click="confirmDelete(post.id)">Delete</button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
