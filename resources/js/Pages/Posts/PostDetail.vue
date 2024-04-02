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

        <div class="p-2 w-full mt-10">
            <h1 class="text-xl mt-5 mb-3">댓글</h1>
            <form method="post" @submit.prevent="commentForm.post(route('comment.store'))" class="w-1/2 m-auto flex flex-row">
                <input type="hidden" name="parent_id" v-model="commentForm.parent_id">
                <textarea class="border border-gray-300 resize-none w-10/12 h-10 rounded-xl" v-model="commentForm.comment"></textarea>
                <input type="submit" value="댓글작성" class="w-2/12 border border-gray-300 rounded-xl h-10 bg-blue-900 text-white p-2 ml-1">
            </form>
        </div>

        <div class="p-2 w-full mt-10">
            <h1 class="text-xl mt-5 mb-3">댓글 목록</h1>
<!--            <div>{{post}}</div>-->
            <ul>
                <li v-for="(reply, index) in post.comments" :key="index" class="border border-gray-300 rounded-xl w-1/2 mb-5 p-2 m-auto flex flex-row">
                    <div class="w-1/12">{{ reply.user.name }} &nbsp :</div>
                    <div class="w-11/12 text-left">{{ reply.comment }}</div>
                </li>
            </ul>
        </div>

    </div>
</template>


<script setup>

import {defineComponent, inject, onMounted, ref} from "vue";
import Navigation from "@/Pages/Components/Navigation.vue";
import {router, useForm, usePage} from "@inertiajs/vue3";

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
//
//     }
// };

    //option API 방식에서 Composition API 방식으로 변경
    const props = defineProps({
        post : {type : Object, required : true},

    })


    const formData = useForm({
        title : props.post.title,
        content : props.post.content,
    })

    const commentForm = useForm({
        comment : '',
        parent_id : 1,
    })
// const form = ref({
//     comment: "",
//     parent_id: 1,
// });

const page = usePage()
const route = inject('route')

onMounted(() => {
    commentForm.parent_id = page.props.post.id
})


// const addComment = () => {
//     form.post(route('comment.store'), {
//         onSuccess: () => {
//             form.reset()
//         },
//         onFinish: () => {
//
//         }
//     });
// };




</script>
