<template>
    <Navigation />

    <div class="max-w-screen-lg mx-auto">


        <h1 class="text-2xl text-center mt-5 font-bold mb-6">Create</h1>

        <div class="flex flex-row p-10 pb-0 mb-3">
            <div class="w-1/2">
                <input type="text" v-model="form.title" placeholder="제목을 입력하세요" class="w-full border border-gray-300 rounded-xl ">
            </div>

            <select class="w-1/2 rounded-xl border-gray-300 ml-2 text-gray-500" v-model="form.board_id">
                <option v-for="(opt,idx) in boards" :key="opt.id" :value="opt.id">{{ opt.name }}</option>
            </select>
        </div>



        <div class="w-full p-10 pb-0 pt-0">
            <textarea type="text" v-model="form.content" placeholder="내용을 입력하세요" class="w-full border border-solid border-gray-300 rounded-xl h-64 resize-none outline-none"></textarea>
        </div>

        <div class="flex justify-end p-10 pt-2">
            <button @click="submitForm" class="border text-gray-500 border-solid border-gray-300 rounded-3xl pt-3 pb-3 pl-5 pr-5 text-sm hover:bg-blue-900 hover:text-white transition">Posting</button>
        </div>


        <div></div>


    </div>

</template>

<script setup>
import Navigation from "@/Pages/Components/Navigation.vue";
import {useForm, usePage} from "@inertiajs/vue3";

defineProps({
    boards: Array
}) //게시판 id값과 name값

const page =usePage()

const form = useForm({
    title : '',
    content : '',
    created_at : '',
    updated_at : '',
    board_id : 1,
})
function onChangeOpt(e){
    e.target.value()
}
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
