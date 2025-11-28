<template>
    <authenticated-layout>
        <main class="container mx-auto mt-4">
            <div class="flex justify-between items-center mb-2">
                <h1 class="font-bold text-2xl">Periodos</h1>
                <button @click="agregarPeriodo" class="bg-green-700 hover:bg-green-900 text-white px-2 py-2 text-sm rounded">
                    + Agregar Periodo
                </button>
            </div>

            <!-- Aquí puedes agregar la tabla o lista de periodos -->
             <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-slate-800 text-white">
                        <tr>
                            <th class="border px-4 py-0">ID</th>
                            <th class="border px-4 py-0">Periodo</th>
                            <th class="border px-4 py-0">Fecha de Inicio</th>
                            <th class="border px-4 py-0">Fecha de Fin</th>
                            <th class="border px-4 py-0">Descripción</th>
                            <th class="border px-4 py-0">Activo</th>
                            <th class="border px-4 py-0">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="periodo in $page.props.periodos" :key="periodo.id" :class="{ 'bg-emerald-200 font-bold': periodo.activo }">
                            <td class="border px-4 py-0">{{ periodo.id }}           </td>
                            <td class="border px-4 py-0">{{ periodo.nombre }}       </td>
                            <td class="border px-4 py-0"><input class="p-0 bg-transparent border-0" type="date" :value="periodo.fecha_inicio.split('T')[0]"></input></td>
                            <td class="border px-4 py-0"><input class="p-0 bg-transparent border-0" type="date" :value="periodo.fecha_fin.split('T')[0]"></input></td>
                            <td class="border px-4 py-0">{{ periodo.descripcion }}  </td>
                            <td class="border px-4 py-0">{{ periodo.activo ? 'Sí' : 'No' }}</td>
                            <td class="border px-4 py-0">
                                <!-- Aquí puedes agregar botones para editar o eliminar el periodo -->
                                <button @click="router.visit(route('periodos.edit', periodo.id))" class="bg-orange-300 hover:bg-orange-500 text-white px-2 py-0 text-sm rounded mr-2">
                                    <i class="fas fa-sm fa-edit"></i>
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