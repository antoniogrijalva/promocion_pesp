<template>
 <authenticated-layout>
        <Head :title="l_titulo" />
        <main class="container mx-auto mt-4 p-2">
            <h1 class="font-bold text-xl mb-1">{{l_titulo}}</h1>
          {{ c_empleados }}
            <form @submit.prevent="guardarRegistro" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-2">

                    <div>
                    <label for="numero_empleado" class="block font-medium text-sm text-gray-700">Número de Empleado:</label>
                    <input 
                        type="number" 
                        id="numero_empleado" 
                        v-model="convocatoria.numero_empleado" 
                        @keydown.enter="buscarEmpleado"
                        @keydown.tab="buscarEmpleado"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                        placeholder="Ingrese número de empleado"
                    />
                    </div>
                    <div>
                        <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre:</label>
                        <input type="text" id="nombre" v-model="convocatoria.nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" readonly />
                    </div>
                    <div>
                        <label for="apellido" class="block font-medium text-sm text-gray-700">Apellido:</label>
                        <input type="text" id="apellido" v-model="convocatoria.apellido" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" readonly />
                    </div>
                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700">Email:</label>
                        <input type="email" id="email" v-model="convocatoria.email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" readonly />
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Guardar</button>
                </div>
            </form>
        </main>
    </authenticated-layout>

</template> 

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { router,Head } from '@inertiajs/vue3';

    import { ref,computed } from 'vue';

    const l_titulo = computed(() => props.c_convocatorias ? 'Editar registro de promoción' : 'Agregar registro de promoción');

    const props = defineProps({
        c_empleados: {
            type: Object,
            default: null
        },
        c_convocatorias: {
            type: Object,
            default: null
        }
    });

    const convocatoria = ref({
        empleado_id: props.c_convocatorias ? props.c_convocatorias.empleado_id : null,
        numero_empleado: props.c_convocatorias ? props.c_convocatorias.numero_empleado : '',
       
        nombre: props.c_convocatorias ? props.c_convocatorias.nombre : '',  
        apellido: props.c_convocatorias ? props.c_convocatorias.apellido : '',  
        email: props.c_convocatorias ? props.c_convocatorias.email : ''
    });

   const buscarEmpleado = () => {
   
        const empleado = props.c_empleados.find(emp => emp.num_empleado === convocatoria.value.numero_empleado);
        if (empleado) {
            convocatoria.value.empleado_id = empleado.id;
            convocatoria.value.nombre = empleado.nombre;
            convocatoria.value.apellido = empleado.primer_apellido + ' ' + empleado.segundo_apellido;
            convocatoria.value.email = empleado.email;
        } else {
            convocatoria.value.empleado_id = null;
            convocatoria.value.nombre = '';
            convocatoria.value.apellido = '';
            convocatoria.value.email = '';
        }
    };

    </script>