<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({

});
</script>

<template>
    <Head title="게시판" />

    <nav class="bg-blue-900 text-white">
        <ul class="w-full flex flex-row justify-end h-10 leading-10">
            <li><a class="mr-5" href="/">home</a></li>
            <li><a class="mr-5" href="/login">login</a></li>
            <li><a class="mr-10" href="/test">test</a></li>
        </ul>
    </nav>

    <div class="max-w-screen-lg mx-auto">





        <h1 class="text-2xl text-center mt-5 font-bold mb-6">Notice</h1>

        <div class="w-full p-10 pb-0">
            <textarea type="text" v-model="newTexts" placeholder="내용을 입력하세요" class="w-full border border-solid border-gray-300 rounded-xl h-64 resize-none outline-none"></textarea>
        </div>

        <div class="flex justify-end p-10 pt-2">
            <button @click="postText" class="border border-solid border-gray-300 rounded-3xl pt-3 pb-3 pl-5 pr-5 text-sm hover:bg-blue-900 hover:text-white transition">Posting</button>
        </div>

        <div v-if="arr.length > 0" class="max-w-screen-lg mx-auto p-10">
            <div v-for="(post, index) in arr" :key="index" class="flex flex-row justify-between align-middle rounded-xl border border-solid border-gray-300 mb-4 p-4">
                <p class=""><span>{{index + 1}}</span>{{post}}</p>
                <div class="">
                    <button  class="mr-1.5 border border-solid text-sm rounded-xl border-gray-300 hover:bg-blue-900 hover:text-white transition pt-0.5 pb-0.5 pl-2 pr-2">수정</button>
                    <button @click="postDel(index)" class="border border-solid text-sm rounded-xl border-gray-300 hover:bg-red-600 hover:text-white transition pt-0.5 pb-0.5 pl-2 pr-2">X</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            arr: [],
            newTexts:'', //input 값
        };
    },
    methods : {
        postText(){
            if(this.newTexts !== ''){
                this.arr.push(this.newTexts)
                this.newTexts = ''
                console.log(this.arr)
            }
        },
        postDel(index){
            this.arr.splice(index,1)
        },


    },

}
</script>
