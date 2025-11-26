<template>
    <authenticated-layout>
        <Head :title="l_titulo" />
        <main class="container mx-auto mt-4">
            <h1 class="font-bold text-xl mb-4">{{l_titulo}}</h1>
            <form @submit.prevent="guardarEmpleado" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-4">
                    <div>
                        <label class="block mb-1 font-medium">Número de Empleado:</label>
                        <input v-model="empleado.num_empleado" type="number" class="w-full border border-gray-300 px-3 py-2 rounded" required>
               
                        <label class="block mb-1 font-medium">Nombre:</label>
                        <input v-model="empleado.nombre" type="text" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                 
                        <label class="block mb-1 font-medium">Primer Apellido:</label>
                        <input v-model="empleado.primer_apellido" type="text" class="w-full border border-gray-300 px-3 py-2 rounded" >
                   
                        <label class="block mb-1 font-medium">Segundo Apellido:</label>
                        <input v-model="empleado.segundo_apellido" type="text" class="w-full border border-gray-300 px-3 py-2 rounded" >
                    </div>


                    <div>
                        <label class="block mb-1 font-medium">Fecha de Nacimiento:</label>
                        <input v-model="empleado.fecha_nacimiento" type="date" class="w-full border border-gray-300 px-3 py-2 rounded" required>

                        <label class="block mb-1 font-medium">CURP:</label>
                        <input v-model="empleado.curp" type="text" class="w-full border border-gray-300 px-3 py-2 rounded" required>

                         <label class="block mb-1 font-medium">Email:</label>
                        <input v-model="empleado.email" type="email" class="w-full border border-gray-300 px-3 py-2 rounded" >

                         <label class="block mb-1 font-medium">Teléfono:</label>
                        <input v-model="empleado.telefono" type="tel" class="w-full border border-gray-300 px-3 py-2 rounded" >
                    </div>
                    
                    
                    <div class="">

                        <label class="block mb-1 font-medium">Fecha de Ingreso:</label>
                        <input v-model="empleado.fecha_ingreso" type="date" class="w-full border border-gray-300 px-3 py-2 rounded" required>

                        <div class="flex mt-6 space-x-4 justify-between items-center bg-red-50 p-2 rounded"> 
                            <div >
                                <label class="block mb-1 font-medium">Baja:</label>
                                <input v-model="empleado.baja" type="checkbox" class="rounded">
                            </div>
                        
                            <!-- <label class="block mb-1 font-medium">Fecha de Baja:</label> -->
                            <input v-model="empleado.baja_fecha" type="date" class="w-2/3  border border-gray-300 px-3 py-2 rounded">
                        </div>
                    
                  
                    
                   
                   
                   
                        <div class="mt-4 bg-slate-300 p-2 rounded">
                            
                            <label class="block mb-1 font-medium">Puesto:</label>
                            <select v-model="empleado.puesto" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                                <option value="">Seleccione un puesto</option>
                                <option value="POLICIA TERCERO">POLICIA TERCERO</option>
                                <option value="POLICIA SEGUNDO">POLICIA SEGUNDO</option>
                                <option value="POLICIA PRIMERO">POLICIA PRIMERO</option>
                                <option value="OFICIAL">OFICIAL</option>
                                <option value="SUB OFICIAL">SUB OFICIAL</option>
                                <option value="COMISARIO">COMISARIO</option>
                            </select>
                        </div>
                    </div>

                </div>


                    <div>
                        <label class="block mb-1 font-medium">Acreditación CUIP:</label>
                        <input v-model="empleado.acreditacion_cuip" type="text" class="w-full border border-gray-300 px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Fecha Acreditación CUIP:</label>
                        <input v-model="empleado.acreditacion_cuip_fecha" type="date" class="w-full border border-gray-300 px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Acreditación Formación:</label>
                        <input v-model="empleado.acreditacion_formacion" type="checkbox" class="rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Fecha Acreditación Formación:</label>
                        <input v-model="empleado.acreditacion_formacion_fecha" type="date" class="w-full border border-gray-300 px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Acreditación Competencias:</label>
                        <input v-model="empleado.acreditacion_competencias" type="checkbox" class="rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Fecha Acreditación Competencias:</label>
                        <input v-model="empleado.acreditacion_competencias_fecha" type="date" class="w-full border border-gray-300 px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Calificación Competencias:</label>
                        <input v-model="empleado.acreditacion_competencias_calificacion" type="number" step="0.01" class="w-full border border-gray-300 px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Acreditación C3:</label>
                        <input v-model="empleado.acreditacion_c3" type="checkbox" class="rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Fecha Acreditación C3:</label>
                        <input v-model="empleado.acreditacion_c3_fecha" type="date" class="w-full border border-gray-300 px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Observaciones C3:</label>
                        <input v-model="empleado.acreditacion_c3_observaciones" type="text" class="w-full border border-gray-300 px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Acreditación Desempeño:</label>
                        <input v-model="empleado.acreditacion_desempeno" type="checkbox" class="rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Fecha Acreditación Desempeño:</label>
                        <input v-model="empleado.acreditacion_desempeno_fecha" type="date" class="w-full border border-gray-300 px-3 py-2 rounded">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Calificación Desempeño:</label>
                        <input v-model="empleado.acreditacion_desempeno_calificacion" type="number" step="0.01" class="w-full border border-gray-300 px-3 py-2 rounded">
                    </div>
               
                
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Empleado</button>
            </form>
        </main>
        </authenticated-layout>

</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router,Head } from '@inertiajs/vue3';

import { ref,computed } from 'vue';


const props = defineProps({
    c_empleados: {
        type: Object,
        default: null
    }
});

const l_titulo = computed(() => props.c_empleados ? 'Editar Empleado' : 'Agregar Empleado');

const empleado = ref({
    num_empleado: props.c_empleados?.num_empleado || '',
    nombre: props.c_empleados?.nombre || '',
    primer_apellido: props.c_empleados?.primer_apellido || '',
    segundo_apellido: props.c_empleados?.segundo_apellido || '',
    fecha_nacimiento: props.c_empleados?.fecha_nacimiento || '',
    baja: props.c_empleados?.baja || false,
    baja_fecha: props.c_empleados?.baja_fecha || '',
    fecha_ingreso: props.c_empleados?.fecha_ingreso || '',
    email: props.c_empleados?.email || '',
    curp: props.c_empleados?.curp || '',
    telefono: props.c_empleados?.telefono || '',
    puesto: props.c_empleados?.puesto || '',
    acreditacion_cuip: props.c_empleados?.acreditacion_cuip || '',
    acreditacion_cuip_fecha: props.c_empleados?.acreditacion_cuip_fecha || '',
    acreditacion_formacion: props.c_empleados?.acreditacion_formacion || false,
    acreditacion_formacion_fecha: props.c_empleados?.acreditacion_formacion_fecha || '',
    acreditacion_competencias: props.c_empleados?.acreditacion_competencias || false,
    acreditacion_competencias_fecha: props.c_empleados?.acreditacion_competencias_fecha || '',
    acreditacion_competencias_calificacion: props.c_empleados?.acreditacion_competencias_calificacion || 0,
    acreditacion_c3: props.c_empleados?.acreditacion_c3 || false,
    acreditacion_c3_fecha: props.c_empleados?.acreditacion_c3_fecha || '',
    acreditacion_c3_observaciones: props.c_empleados?.acreditacion_c3_observaciones || '',
    acreditacion_desempeno: props.c_empleados?.acreditacion_desempeno || false,
    acreditacion_desempeno_fecha: props.c_empleados?.acreditacion_desempeno_fecha || '',
    acreditacion_desempeno_calificacion: props.c_empleados?.acreditacion_desempeno_calificacion || 0
});

function guardarEmpleado() {
    router.post(route('empleados.store'), empleado.value);
}
</script>