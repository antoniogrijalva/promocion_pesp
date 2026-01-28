<script setup>
import ApplicationLogo from '@/Components/ApplicationLogoPesp.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0"
    >
        <div>
            <Link href="/">
                <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
                <span class="text-xl text-center font-bold text-gray-500">SIDEPOL</span> <br>         
            </Link>
           
        </div>
        <span class="text-sm text-center font-thin text-gray-800">Sistema de Promociones PESP</span>
        <div
            class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
