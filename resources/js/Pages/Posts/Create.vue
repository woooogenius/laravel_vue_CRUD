<template>
    <Navigation />

    <div class="max-w-screen-lg mx-auto">


        <h1 class="text-2xl text-center mt-5 font-bold mb-6">Create</h1>

        <div class="p-10 pb-0 mb-3">
            <input type="text" v-model="form.title" placeholder="제목을 입력하세요" class="w-full border border-gray-300 rounded-xl ">
        </div>

        <div class="w-full p-10 pb-0 pt-0">
            <textarea type="text" v-model="form.content" placeholder="내용을 입력하세요" class="w-full border border-solid border-gray-300 rounded-xl h-64 resize-none outline-none"></textarea>
        </div>

        <div class="flex justify-end p-10 pt-2">
            <button @click="submitForm" class="border text-gray-500 border-solid border-gray-300 rounded-3xl pt-3 pb-3 pl-5 pr-5 text-sm hover:bg-blue-900 hover:text-white transition">Posting</button>
        </div>


    </div>

</template>

<script setup>
import Navigation from "@/Pages/Components/Navigation.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    title : '',
    content : '',
    created_at : '',
    updated_at : '',

})
const submitForm = () => {
    form.post(route('posts.store'), {
        onSuccess: () => {
            form.reset()
        },
        onFinish: () => {

        }
    });
};








</script>


<style>

</style>
