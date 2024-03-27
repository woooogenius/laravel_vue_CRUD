<script setup>
import { Head } from '@inertiajs/vue3';
import Navigation from "@/Pages/Components/Navigation.vue";

defineProps({
    posts: {
        type: Array,
        default: () => []
    }
})
</script>

<template>
    <Head title="게시판" />

    <Navigation />

    <p class="text-3xl text-center mt-5">Home</p>

    <div class="mt-5">
        <ul class="flex flex-row border-t border-b border-solid border-gray-300 text-center">
            <li class="w-1/6 border-r border-solid border-gray-300">no</li>
            <li class="w-4/6 border-r border-solid border-gray-300">title</li>
            <li class="w-1/6 border-r border-solid border-gray-300">created at</li>
        </ul>
    </div>


    <div v-for="(post,index) in posts">
        <ul class="flex flex-row border-b border-solid border-gray-300 text-center">
            <li class="w-1/6 border-r border-solid border-gray-300">{{index + 1}}</li>
            <li class="w-4/6 border-r border-solid border-gray-300">{{post.title}}</li>
            <li class="w-1/6 border-r border-solid border-gray-300">{{post.created_at}}</li>
        </ul>
    </div>



    <div class="flex justify-end mt-2 mr-2">
        <button class="p-2 border border-gray-300 text-gray-500 rounded-xl hover:bg-blue-900 hover:text-white transition">
            <a href="/posts/create">Create</a>
        </button>
    </div>



</template>


