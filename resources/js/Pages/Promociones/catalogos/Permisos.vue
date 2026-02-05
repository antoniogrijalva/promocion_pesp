<template>
    <authenticated-layout>
            <template #header> 
                <div class="flex justify-between items-center _mb-2">
                    <h1 class="font-bold text-2xl">Usuarios</h1>

                    <button @click="agregarUsuario" class="bg-gray-900 hover:bg-gray-700 text-white px-2 py-2 text-sm rounded-md ">
                    + Agregar Usuario
                    </button>
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
                                <button @click="router.visit(route('users.edit', user.id))" class="mr-2">
                                    <i class="fas fa-lg text-sky-800  fa-edit hover:text-sky-600"></i>
                                </button>
                                <button @click="eliminaUsuario(user.id)" >
                                    <i class="fas fa-trash-alt text-red-600 hover:text-red-400"></i>
                                </button>

                            </td>
                        </tr>
                    </tbody>
                </table>
             </div>

        </main>

            <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                    <h2 class="text-xl font bold mb-4">Seguro que deseas eliminar este usuario?</h2>
                    
                    <div class="flex justify-end gap-2">
                        <button
                            @click="showModal = false"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
                        >
                            Cancelar
                        </button>
                        <button
                            @click="confirmarEliminacion"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                        >
                            Confirmar Borrado
                        </button>
                    </div>
                </div>
            </div>

    </authenticated-layout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router,usePage } from '@inertiajs/vue3';
import { ref, h } from 'vue';

const showModal = ref(false);
const usuarioAEliminar = ref(null);

const props = defineProps({
    c_usuarios: {
        type: Object,
        default: null
    }
});

function agregarUsuario() {
    router.visit(route('users.create'));
}



function eliminaUsuario(idusuario) {
    usuarioAEliminar.value = idusuario; 
    showModal.value = true;
}

function confirmarEliminacion() {
    router.delete(route('users.destroy', usuarioAEliminar.value), {         
        onSuccess: () => {        
            showModal.value = false;
        },
    });
    }
</script>
