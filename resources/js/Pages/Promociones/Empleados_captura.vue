<template>
    <authenticated-layout>
        <Head :title="l_titulo" />
        <main class="container mx-auto mt-4 p-2">
            <h1 class="font-bold text-xl mb-1">{{l_titulo}}</h1>
          
            <form @submit.prevent="guardarEmpleado" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-2">
                    <div>
                        <label for="num_empleado" class="block mb-0 text-xs mt-3 ">Número de Empleado:</label>
                        <input v-model="empleado.num_empleado" type="number" id="num_empleado" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>
               
                        <label for="nombre" class="block mb-0 text-xs mt-3 ">Nombre:</label>
                        <input v-model="empleado.nombre" type="text" id="nombre" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>
                 
                        <label for="primer_apellido" class="block mb-0 text-xs mt-3 ">Primer Apellido:</label>
                        <input v-model="empleado.primer_apellido" type="text" id="primer_apellido" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" >
                   
                        <label for="segundo_apellido" class="block mb-0 text-xs mt-3 ">Segundo Apellido:</label>
                        <input v-model="empleado.segundo_apellido" type="text" id="segundo_apellido" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" >
                    </div>


                    <div>
                        <label for="fecha_nacimiento" class="block mb-0 text-xs mt-3 ">Fecha de Nacimiento:</label>
                        <input v-model="empleado.fecha_nacimiento" type="date" id="fecha_nacimiento" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>

                        <label for="curp" class="block mb-0 text-xs mt-3 ">CURP:</label>
                        <input v-model="empleado.curp" type="text" id="curp" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>
                         <label for="c_email" class="block mb-0 text-xs mt-3 ">Email:</label>
                        <input v-model="empleado.email" type="email" id="c_email" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" >

                         <label for="telefono" class="block mb-0 text-xs mt-3 ">Teléfono:</label>
                        <input v-model="empleado.telefono" type="tel" id="telefono" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" >
                    </div>
                    
                    
                    <div class="">

                        <label for="fecha_ingreso" class="block mb-0 text-xs mt-3 ">Fecha de Ingreso:</label>
                        <input v-model="empleado.fecha_ingreso" type="date" id="fecha_ingreso" class="w-full text-sm  border border-gray-300 px-3 py-1 rounded" required>

                        <div class="flex mt-4 space-x-4 justify-between items-center _bg-red-100 p-2 rounded  border border-red-300 "> 
                            <div >
                                <label for="baja" class="block mb-0 text-xs mt-3 ">Baja:</label>
                                <input v-model="empleado.baja" type="checkbox" id="baja" class="rounded">
                            </div>
                        
                            <!-- <label class="block mb-0 text-xs mt-3 ">Fecha de Baja:</label> -->
                            <input v-model="empleado.baja_fecha" type="date" id="baja_fecha" class="w-2/3 text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                                                                      
                        <div class="mt-3 bg-slate-200  border border-gray-300  p-2 rounded">
                            <label for="puesto" class="block mb-0 text-xs mt-3 ">Grado:</label>
                            <select v-model="empleado.puesto" id="puesto" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>
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



                <!-- <h1 class="text-sm text-center bg-slate-700   rounded text-white">CERTIFICACIONES</h1> -->
                
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-2">

                     <div class="border border-gray-200 rounded p-2">
                        <h1 class="text-center bg-gradient-to-r from-slate-600 via-slate-900 to-slate-600 rounded p-1 text-white text-xs">FORMACIÓN ACADEMICA</h1>
                        <div class="flex items-center space-x-2 mt-7">
                            <input v-model="empleado.acreditacion_formacion" type="checkbox" id="acreditacion_formacion" class="rounded">
                            <label for="acreditacion_formacion" class="text-xs">Acreditada</label>
                        </div>
                        <div>
                            <label for="acreditacion_formacion_fecha" class="block mb-0 text-xs mt-7 ">Fecha:</label>
                            <input v-model="empleado.acreditacion_formacion_fecha" type="date" id="acreditacion_formacion_fecha" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded p-2">
                        <h1 class="text-center bg-gradient-to-r from-slate-600 via-slate-900 to-slate-600 rounded p-1 text-white text-xs">CERTIFICADO ÚNICO POLICIAL</h1>
                        <div>
                            <label for="acreditacion_cuip" class="block mb-0 text-xs mt-3 ">Num. CUP:</label>
                            <input v-model="empleado.acreditacion_cuip" type="text" id="acreditacion_cuip" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                        <div>
                            <label for="acreditacion_cuip_fecha" class="block mb-0 text-xs mt-3 ">Fecha Acreditación:</label>
                            <input v-model="empleado.acreditacion_cuip_fecha" type="date" id="acreditacion_cuip_fecha" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
 
                        <div>
                            <label for="acreditacion_cuip_vigencia" class="block mb-0 text-xs mt-3 ">Fecha Vigencia:</label>
                            <input v-model="empleado.acreditacion_cuip_vigencia" type="date" id="acreditacion_cuip_vigencia" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                    </div>
                    

                   


                    <div class="border border-gray-200 rounded p-2">
                        <h1 class="text-center bg-gradient-to-r from-slate-600 via-slate-900 to-slate-600 rounded p-1 text-white text-xs">COMPETENCIAS BÁSICAS</h1>
                        <div class="flex items-center space-x-2 mt-7">
                            <input v-model="empleado.acreditacion_competencias" type="checkbox" id="acreditacion_competencias" class="rounded">
                            <label for="acreditacion_competencias" class="text-xs">Acreditada/Vigentes</label>
                        </div>
                        <div>
                            <label for="acreditacion_competencias_fecha" class="block mb-0 text-xs mt-7 ">Fecha:</label>
                            <input v-model="empleado.acreditacion_competencias_fecha" type="date" id="acreditacion_competencias_fecha" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>

                        <div>
                            <label for="acreditacion_competencias_vigencia" class="block mb-0 text-xs mt-3 ">Fecha Vigencia:</label>
                            <input v-model="empleado.acreditacion_competencias_vigencia" type="date" id="acreditacion_competencias_vigencia" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                        <div>
                            <label for="acreditacion_competencias_calificacion" class="block mb-0 text-xs mt-3 ">Calificación Competencias:</label>
                            <input v-model="empleado.acreditacion_competencias_calificacion" type="number" step="0.01" id="acreditacion_competencias_calificacion" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded p-2">
                        <h1 class="text-center bg-gradient-to-r from-slate-600 via-slate-900 to-slate-600 rounded p-1 text-white text-xs">EVALUACION DESEMPEÑO</h1>
                        <div class="flex items-center space-x-2 mt-7">
                            <input v-model="empleado.acreditacion_desempeno" type="checkbox" id="acreditacion_desempeno" class="rounded">
                            <label for="acreditacion_desempeno" class="text-xs">Acreditada/Vigentes</label>
                        </div>

                        <div>
                            <label for="acreditacion_desempeno_fecha" class="block mb-0 text-xs mt-7 ">Fecha:</label>
                            <input v-model="empleado.acreditacion_desempeno_fecha" type="date" id="acreditacion_desempeno_fecha" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                        <div>
                            <label for="acreditacion_desempeno_vigencia" class="block mb-0 text-xs mt-3 ">Fecha Vigencia:</label>
                            <input v-model="empleado.acreditacion_desempeno_vigencia" type="date" id="acreditacion_desempeno_vigencia" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                        <div>
                            <label for="acreditacion_desempeno_calificacion" class="block mb-0 text-xs mt-3 ">Calificación Desempeño:</label>
                            <input v-model="empleado.acreditacion_desempeno_calificacion" type="number" step="0.01" id="acreditacion_desempeno_calificacion" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                    </div>

                     <div class="border border-gray-200 rounded p-2">
                        <h1 class="text-center bg-gradient-to-r from-slate-600 via-slate-900 to-slate-600 rounded p-1 text-white text-xs">EVALUACION C3</h1>
                        <div class="flex items-center space-x-2 mt-7">
                            <input v-model="empleado.acreditacion_c3" type="checkbox" id="acreditacion_c3" class="rounded">
                            <label for="acreditacion_c3" class="text-xs">Acreditada/Vigente</label>
                        </div>
                        <div>
                            <label for="acreditacion_c3_fecha" class="block mb-0 text-xs mt-7 ">Fecha:</label>
                            <input v-model="empleado.acreditacion_c3_fecha" type="date" id="acreditacion_c3_fecha" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>

                        <div>
                            <label for="acreditacion_c3_vigencia" class="block mb-0 text-xs mt-3 ">Fecha Vigencia:</label>
                            <input v-model="empleado.acreditacion_c3_vigencia" type="date" id="acreditacion_c3_vigencia" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
              
                        <div>
                            <label for="acreditacion_c3_observaciones" class="block mb-0 text-xs mt-3 ">Observaciones C3:</label>
                            <textarea v-model="empleado.acreditacion_c3_observaciones" id="acreditacion_c3_observaciones" rows="3" class="w-full  border border-gray-300 px-3 py-1 rounded text-xs text-indigo-600"></textarea>
                        </div>
                    </div>



                </div>

                   
             

               
                <div class="text-end" v-if="$page.props.auth.user.tipo_usuario != 'capturista'">
                <button type="submit" class="bg-blue-800 hover:bg-blue-500 text-white px-4 py-1 rounded text-sm shadow mb-4">
                    {{ c_empleados ? 'Actualizar Empleado' : 'Guardar Empleado' }}
                </button>
                </div>
                
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
    fecha_nacimiento: props.c_empleados?.fecha_nacimiento?.split('T')[0] || '',
    baja: props.c_empleados?.baja || false,
    baja_fecha: props.c_empleados?.baja_fecha?.split('T')[0] || '',
    fecha_ingreso: props.c_empleados?.fecha_ingreso?.split('T')[0] || '',
    email: props.c_empleados?.email || '',
    curp: props.c_empleados?.curp || '',
    telefono: props.c_empleados?.telefono || '',
    puesto: props.c_empleados?.puesto || '',
    acreditacion_cuip: props.c_empleados?.acreditacion_cuip || '',
    acreditacion_cuip_fecha: props.c_empleados?.acreditacion_cuip_fecha?.split('T')[0] || '',
    acreditacion_cuip_vigencia: props.c_empleados?.acreditacion_cuip_vigencia?.split('T')[0] || '',
    acreditacion_formacion: props.c_empleados?.acreditacion_formacion || false,
    acreditacion_formacion_fecha: props.c_empleados?.acreditacion_formacion_fecha?.split('T')[0] || '',
    acreditacion_competencias: props.c_empleados?.acreditacion_competencias || false,
    acreditacion_competencias_fecha: props.c_empleados?.acreditacion_competencias_fecha?.split('T')[0] || '',
    acreditacion_competencias_vigencia: props.c_empleados?.acreditacion_competencias_vigencia?.split('T')[0] || '',
    acreditacion_competencias_calificacion: props.c_empleados?.acreditacion_competencias_calificacion || 0,
    acreditacion_c3: props.c_empleados?.acreditacion_c3 || false,
    acreditacion_c3_fecha: props.c_empleados?.acreditacion_c3_fecha?.split('T')[0] || '',
    acreditacion_c3_vigencia: props.c_empleados?.acreditacion_c3_vigencia?.split('T')[0] || '',
    acreditacion_c3_observaciones: props.c_empleados?.acreditacion_c3_observaciones || '',
    acreditacion_desempeno: props.c_empleados?.acreditacion_desempeno || false,
    acreditacion_desempeno_fecha: props.c_empleados?.acreditacion_desempeno_fecha?.split('T')[0] || '',
    acreditacion_desempeno_vigencia: props.c_empleados?.acreditacion_desempeno_vigencia?.split('T')[0] || '',
    acreditacion_desempeno_calificacion: props.c_empleados?.acreditacion_desempeno_calificacion || 0
});

function guardarEmpleado() {
    // Si c_empleados existe, estamos editando, de lo contrario, estamos creando
    if (props.c_empleados) {
        router.put(route('empleados.update', props.c_empleados.id), empleado.value);
        return;
    }
    router.post(route('empleados.store'), empleado.value);
}
</script>