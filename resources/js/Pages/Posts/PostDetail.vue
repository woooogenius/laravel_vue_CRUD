<template>
    <div class="w-full text-center">
        <Navigation/>
        <h1 class="text-3xl mt-5">게시글 상세</h1>
        <form class="mt-5 ">
            <div class="flex flex-col w-full">
                <label for="title" class="text-xl mt-5 mb-3">제목</label>
                <input readonly type="text" id="title" v-model="formData.title" class="w-1/2 m-auto border-gray-300 rounded-xl">
            </div>
            <div class="flex flex-col w-full">
                <label for="content" class="text-xl mt-5 mb-3">내용</label>
                <textarea readonly id="content" v-model="formData.content" class="h-80 w-1/2 m-auto border-gray-300 rounded-xl resize-none"></textarea>
            </div>
            <div class="w-full">
                <a :href="'/posts/' + post.id + '/edit'" type="submit" class="w-1/2 border-gray-300 border mt-5 p-2 rounded-xl bg-blue-900 text-white transition hover:bg-white hover:text-black hover:shadow-xl">수정하기</a>
            </div>
        </form>
    </div>
</template>


<script>

import {defineComponent} from "vue";
import Navigation from "@/Pages/Components/Navigation.vue";

export default {
    components: {Navigation},
    props: {
        post: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            formData: {
                title: this.post.title,
                content: this.post.content
            }
        };
    },
    methods: {

    }
};
</script>
