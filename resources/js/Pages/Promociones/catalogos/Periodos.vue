<template>
    <authenticated-layout>
        <template #header>
           
            <div class="flex justify-between items-center">
                 <h1 class="font-bold text-2xl">Periodos</h1>
                <button @click="agregarPeriodo" class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-2 text-sm rounded-md">
                    + Agregar Periodo
                </button>
            </div>
        
        </template>
        
        <main class="container mx-auto mt-4">
            

            <!-- Aquí puedes agregar la tabla o lista de periodos -->
             <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-slate-800 text-white">
                        <tr>
                            <th class="border px-4 py-0">ID</th>
                            <th class="border px-4 py-0">Promoción</th>
                            <th class="border px-4 py-0">Descripción</th>
                            <th class="border px-4 py-0">Fecha de Inicio</th>
                            <th class="border px-4 py-0">Fecha de Fin</th>
                            <th class="border px-4 py-0">Activo</th>
                            <th class="border px-4 py-0">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="periodo in $page.props.periodos" :key="periodo.id" :class="{ ' bg-green-100': periodo.activo }">
                            <td class="border px-4 py-0">{{ periodo.id }}           </td>
                            <td class="border px-4 py-0">{{ periodo.nombre }}       </td>
                            <td class="border px-4 py-0 text-xs text-gray-600">{{ periodo.descripcion }}  </td>
                            <td class="border px-4 py-0"><input id="fecha_inicio" class="p-0 bg-transparent border-0" type="date" :value="periodo.fecha_inicio.split('T')[0]"></input></td>
                            <td class="border px-4 py-0"><input id="fecha_fin" class="p-0 bg-transparent border-0" type="date" :value="periodo.fecha_fin.split('T')[0]"></input></td>
                            <td class="border px-4 py-1 text-center ">
                                <span :class="periodo.activo ? 'text-green-500' : 'text-red-600'" class=" font-bold  ">
                                    {{ periodo.activo ? '✓' : '✗'}}
                                </span>
                            </td>
                            <td class="border px-4 py-0 text-center">
                                <!-- Aquí puedes agregar botones para editar o eliminar el periodo -->
                                <button @click="router.visit(route('periodos.edit', periodo.id))" class="bg-orange-500 hover:bg-orange-400 text-white px-2 py-1 text-sm rounded mr-2">
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
import { router } from '@inertiajs/vue3';
import { ref, h } from 'vue';
 

const agregarPeriodo = () => {
    //router.get('/periodos/create');
    router.visit(route('periodos.create'));
};
</script>