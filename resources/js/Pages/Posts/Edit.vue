<template>
    <div class="w-full text-center">
        <Navigation/>
        <h1 class="text-3xl mt-5">게시글 수정</h1>
        <form @submit.prevent="handleSubmit" class="mt-5 ">
            <div class="flex flex-col w-full">
                <label for="title" class="text-xl mt-5 mb-3">제목</label>
                <input type="text" id="title" v-model="formData.title" class="w-1/2 m-auto border-gray-300 rounded-xl">
            </div>
            <div class="flex flex-col w-full">
                <label for="content" class="text-xl mt-5 mb-3">내용</label>
                <textarea id="content" v-model="formData.content" class="h-80 w-1/2 m-auto border-gray-300 rounded-xl resize-none"></textarea>
            </div>
            <div class="w-full">
                <button type="submit" class="w-1/2 border-gray-300 border mt-5 p-2 rounded-xl bg-blue-900 text-white transition hover:bg-white hover:text-black hover:shadow-xl">저장하기</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import Navigation from "@/Pages/Components/Navigation.vue";
import {useForm} from "@inertiajs/vue3";

// export default {
//     components: {Navigation},
//     props: {
//         post: {
//             type: Object,
//             required: true
//         }
//     },
//     data() {
//         return {
//             formData: {
//                 title: this.post.title,
//                 content: this.post.content
//             }
//         };
//     },
//     methods: {
//         handleSubmit() {
//             // 수정된 게시글 데이터를 서버에 제출하는 로직
//             this.$inertia.put(`/posts/${this.post.id}`, this.formData);
//         }
//     }
// };

//option API 방식에서 Composition API 방식으로 리팩토링
    const props = defineProps({
        post : {type : Object, required : true}
    })

    const formData = useForm({
        title : props.post.title,
        content : props.post.content,
    })

    const handleSubmit = async () => {
        await formData.put(`/posts/${props.post.id}`);
    };











</script>

<style>

</style>
