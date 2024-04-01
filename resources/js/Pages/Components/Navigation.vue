
<template>
    <nav class="bg-blue-900 text-white">
        <ul class="w-full flex flex-row justify-end h-10 leading-10">
            <li><a class="mr-5" href="/posts">home</a></li>
            <li><a class="mr-5" href="/login">login</a></li>
            <li><a class="mr-5" href="/register">join</a></li>
<!--            <a :href="route('logout')">logout</a>-->
            <li>
                <form @submit.prevent="router.post(route('logout'))">
                    <button type="submit">Logout</button>
                </form>
            </li>

        </ul>

    </nav>
</template>
<script setup>
import {Link, router} from "@inertiajs/vue3";
    import {inject} from "vue";

    const route = inject('route')




</script>
