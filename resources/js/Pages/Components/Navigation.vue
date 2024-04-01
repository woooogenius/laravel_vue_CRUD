
<template>
    <nav class="bg-blue-900 text-white">
        <ul class="w-full flex flex-row justify-end h-10 leading-10">
            <li><a class="mr-5" href="/posts">home</a></li>
            <li class="mr-5" v-if="$page.props.auth.user">{{$page.props.auth.user.name}}</li>
            <li v-if="!$page.props.auth.user"><a class="mr-5" href="/login">login</a></li>
            <li v-if="!$page.props.auth.user"><a class="mr-5" href="/register">join</a></li>
            <li v-if="$page.props.auth.user" class="mr-5">
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
