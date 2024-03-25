<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({


});


</script>

<template>
    <Head title="example" />
    <div class="w-full">
        <h1 class="text-2xl text-center mt-5 font-bold mb-10">게시판</h1>
<!--        <div class="flex justify-center align-middle">-->
<!--            <img src="../../images/sample.png" alt="img">-->
<!--        </div>-->
        <div class="w-full">
            <ul class="flex text-center align-middle border border-solid border-gray-300">
                <li class="w-10">no</li>
                <li class="w-10">user</li>
                <li class="w-full">내용</li>
                <li class="w-10">날짜</li>
            </ul>
        </div>



    </div>

</template>

<script>
    export default {
        data(){
            return {
                price1 : 100,
                price2 : 200,
            }
        } //데이터보관함
    }
</script>
