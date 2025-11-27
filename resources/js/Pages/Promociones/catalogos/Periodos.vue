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
             <table>
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Periodo</th>
                        <th class="border px-4 py-2">Fecha de Inicio</th>
                        <th class="border px-4 py-2">Fecha de Fin</th>
                        <th class="border px-4 py-2">Descripción</th>
                        <th class="border px-4 py-2">Activo</th>
                        <th class="border px-4 py-2">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="periodo in $page.props.periodos" :key="periodo.id">
                        <td class="border px-4 py-2">{{ periodo.id }}</td>
                        <td class="border px-4 py-2">{{ periodo.nombre }}</td>
                        <td class="border px-4 py-2">{{ periodo.fecha_inicio }}</td>
                        <td class="border px-4 py-2">{{ periodo.fecha_fin }}</td>
                        <td class="border px-4 py-2">{{ periodo.descripcion }}</td>
                        <td class="border px-4 py-2">{{ periodo.activo ? 'Sí' : 'No' }}</td>
                        <td class="border px-4 py-2">
                            <!-- Aquí puedes agregar botones para editar o eliminar el periodo -->
                            <button @click="router.visit(route('periodos.edit', periodo.id))" class="bg-blue-500 hover:bg-blue-700 text-white px-2 py-1 text-sm rounded mr-2">Editar</button>

                        </td>
                    </tr>
                </tbody>
             </table>

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