<script setup>
import {Head, router} from '@inertiajs/vue3';
import Navigation from "@/Pages/Components/Navigation.vue";
import {inject} from "vue";

defineProps({
    posts: {
        type: Array,
        default: () => []
    },
    boards : {
        type: Array,
    },


})

const route = inject('route')

function formatDate(timestamp) {
    const date = new Date(timestamp);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const seconds = String(date.getSeconds()).padStart(2, '0');
    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}


function deletePost(postId) {
    if (confirm('정말로 이 게시글을 삭제하시겠습니까?')) {

        router.delete(route('post.destroy', postId) )
    }}

function boardsName(boardId){
    if(boardId === 1){
        return '자유게시판'
    }else if(boardId === 2){
        return '그냥게시판'
    }else {
        return '그그냥게시판'
    }
}


</script>

<template>
    <Head title="게시판" />

    <Navigation />

    <p class="text-3xl text-center mt-5">Home</p>

    <div class="pr-3 pl-3">
        <div class="mt-5">
            <ul class="flex flex-row border border-solid border-gray-300 text-center">
                <li class="w-1/12 border-r border-solid border-gray-300 h-10 leading-10 ">no</li>
                <li class="w-2/12 border-r border-solid border-gray-300 h-10 leading-10 ">username</li>
                <li class="w-3/12 border-r border-solid border-gray-300 h-10 leading-10 ">title</li>
                <li class="w-2/12 border-r border-solid border-gray-300 h-10 leading-10 ">boards</li>
                <li class="w-2/12 border-r border-solid border-gray-300 h-10 leading-10 ">created at</li>
                <li class="w-1/12 border-r border-solid border-gray-300 h-10 leading-10 ">edit post</li>
                <li class="w-1/12  h-10 leading-10">del post</li>
            </ul>
        </div>


        <div v-for="(post,index) in posts" >

            <ul class="flex items-center border-t-0 border border-solid border-gray-300 text-center">
                <li class="w-1/12 border-r border-solid border-gray-300 p-1.5">{{index + 1}}</li>
                <li class="w-2/12 border-r border-solid border-gray-300 p-1.5">{{post.user.name}}</li>
                <a :href="'/post/' + post.id" class="w-3/12">

                    <li class="border-r border-solid border-gray-300 p-1.5 hover:underline">{{post.title}}</li>
                </a>

                <li class="w-2/12 border-r border-solid border-gray-300 p-1.5 ">{{boardsName(post.board_id)}}</li>
                <li class="w-2/12 border-r border-solid border-gray-300 p-1.5 ">{{formatDate(post.created_at)}}</li>
                <li class="w-1/12 border-r border-solid border-gray-300 p-1.5  ">
                    <a :href="'/post/' + post.id " class="text-xs pt-1 pb-1 pl-2 pr-2 border border-gray-300 text-gray-500 rounded-xl hover:bg-blue-900 hover:text-white transition">Edit</a>
                </li>
                <li class="w-1/12 p-1.5 ">
                    <button @click="() => deletePost(post.id)" class="pt-1 pb-1 pl-2 pr-2 border border-gray-300 rounded-xl text-gray-500 hover:bg-red-500 hover:text-white transition text-xs">del</button>
                </li>
            </ul>


        </div>



        <div class="flex justify-end mt-2 mr-2">
            <button class="p-2 border border-gray-300 text-gray-500 rounded-xl hover:bg-blue-900 hover:text-white transition">
                <a href="/post/create">Create</a>
            </button>

        </div>
    </div>



</template>
