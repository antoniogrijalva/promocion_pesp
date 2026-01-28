<template>
    <authenticated-layout>
            <template #header> 
                <div class="flex justify-between items-center _mb-2">
                    <h1 class="font-bold text-2xl">Permisos de Usuarios</h1>
                </div>
            </template>
        <main class="container mx-auto mt-4">
            <!-- <div class="flex justify-between items-center mb-2">
                <h1 class="font-bold text-2xl">Permisos de Usuarios</h1>
            </div> -->


            <!-- Aquí puedes agregar la tabla o lista de permisos de usuarios -->
             <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-slate-800 text-white">
                        <tr>
                            <th class="border px-4 py-0">ID</th>
                            <th class="border px-4 py-0">Nombre de Usuario</th>
                            <th class="border px-4 py-0">Email</th>
                            <th class="border px-4 py-0">Rol</th>
                            <th class="border px-4 py-0">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in c_usuarios" :key="user.id">
                            <td class="border px-4 py-0">{{user.id  }}           </td>
                            <td class="border px-4 py-0">{{ user.name }}       </td>
                            <td class="border px-4 py-0">{{ user.email }}      </td>
                            <td class="border px-4 py-0">{{ user.tipo_usuario }}       </td>
                            <td class="border px-4 py-0 text-center">
                                <!-- Aquí puedes agregar botones para editar los permisos del usuario -->
                                <button @click="router.visit(route('permisos_usuarios.edit', user.id))" class="bg-orange-500 hover:bg-orange-400 text-white px-1.5 py-0.5
                                 text-sm rounded mr-2">
                                    <i class="fas fa-edit"></i>
                                </button>

                            </td>
                        </tr>
                    </tbody>
                </table>
             </div>

        </main>
    </authenticated-layout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router,usePage } from '@inertiajs/vue3';
import { ref, h } from 'vue';

const props = defineProps({
    c_usuarios: {
        type: Object,
        default: null
    }
});
</script>
