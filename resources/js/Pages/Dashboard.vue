<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="w-1/12 m-auto bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="w-full text-center ">
                        <a href="/post" class="w-full block  pt-3 pb-3">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

</template>
