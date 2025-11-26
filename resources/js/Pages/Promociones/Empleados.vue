<template>
    <authenticated-layout>
        <main class="container mx-auto mt-4">
            <div class="flex justify-between items-center mb-2">
                <h1 class="font-bold text-xl">Personal Operataivo</h1>
                <button @click="agregarEmpleado" class="bg-green-500 text-white px-4 py-2 rounded">+ Agregar Empleado</button>
            </div>
               

              
                <table class="table-auto w-full border-collapse borderte">
                    <thead class="bg-slate-600 text-white">
                        <tr>
                            <th class="border border-gray-300 px-4 py-.5">Num Empleado</th>
                            <th class="border border-gray-300 px-4 py-.5">Nombre</th>
                            <th class="border border-gray-300 px-4 py-.5">Puesto</th>
                            <th class="border border-gray-300 px-4 py-.5">Departamento</th>
                            <th class="border border-gray-300 px-4 py-.5">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="empleado in empleados" :key="empleado.id">
                            <td class="border border-gray-300 px-4 py-.5">{{ empleado.num_empleado }}</td>
                            <td class="border border-gray-300 px-4 py-.5">{{ empleado.nombre }}</td>
                            <td class="border border-gray-300 px-4 py-.5">{{ empleado.puesto }}</td>
                            <td class="border border-gray-300 px-4 py-.5">{{ empleado.departamento }}</td>
                            <td class="border border-gray-300 px-4 py-.5">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded">Ver Detalles</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

        </main>
    </authenticated-layout>
</template>


<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router } from '@inertiajs/vue3';




const props = defineProps({
    empleados: Array
});

function agregarEmpleado() {
    // Lógica para agregar un nuevo empleado
    router.visit(route('empleados.create'));


}


</script>