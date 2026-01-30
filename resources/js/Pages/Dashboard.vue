<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Promociones" />

    <!-- <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout> -->
    <main class="_container mx-auto _mt-4 ">
        <!-- <h1>Dashboard - {{ $page.props.auth.user.name }}</h1> -->
         <authenticated-layout>

            

            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div
                        class="overflow-hidden _bg-slate-200  sm:rounded-lg"
                    >
                        <div class="p-6 text-center text-sky-700 text-3xl">
                            Sistema de Promociones PESP
                        </div>
                    </div>

                </div>
                <div class="flex justify-center mt-6">
                    <!-- <img  src="/img/estrella_pesp.png" alt=""> -->
                    <!-- <img  src="/img/pesp_logo_listonrosa.jpg" alt=""> -->
                    <img  src="/img/logo_sidepol.jpeg" alt="">


                </div>
            </div>

            

           
            
            

         </authenticated-layout>

    </main>
</template>
