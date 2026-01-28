<template>
    <authenticated-layout>
        <Head :title="l_titulo" />
        <main class="container mx-auto mt-4 p-2">
            <h1 class="font-bold text-xl mb-1">{{l_titulo}}</h1>
          
            <!-- <form @submit.prevent="guardarEmpleado" class="space-y-4"> -->
            <form @submit.prevent="guardarEmpleado" @keydown.enter.prevent class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 _m-2  bg-slate-200 shadow p-2 rounded-md">
                    <div class="">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="num_empleado" class="block mb-0 text-xs">Número de Empleado:</label>
                                <input v-model="empleado.num_empleado" type="number" id="num_empleado" class="w-full text-sm bg-yellow-50 text-blue-700 border border-gray-300 px-3 py-1 rounded" required>
                            </div>
                            <div>
                                <label for="sexo" class="block mb-0 text-xs">Sexo:</label>
                                <select v-model="empleado.sexo" id="sexo" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>
                                    <option value="">Seleccione sexo</option>
                                    <option value="H">Masculino</option>
                                    <option value="M">Femenino</option>
                                </select>
                            </div>

                             <div>
                                <label for="fecha_nacimiento" class="block mb-0 text-xs  ">Fecha de Nacimiento:</label>
                                <input v-model="empleado.fecha_nacimiento" type="date" id="fecha_nacimiento" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>
                            </div>
                           
                        </div>
               
                        <!-- <label for="nombre" class="block mb-0 text-xs mt-3 ">Nombre:</label>
                        <input v-model="empleado.nombre" type="text" id="nombre" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>
                 
                        <label for="primer_apellido" class="block mb-0 text-xs mt-3 ">Primer Apellido:</label>
                        <input v-model="empleado.primer_apellido" type="text" id="primer_apellido" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" >
                   
                        <label for="segundo_apellido" class="block mb-0 text-xs mt-3 ">Segundo Apellido:</label>
                        <input v-model="empleado.segundo_apellido" type="text" id="segundo_apellido" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" > -->
                        <label for="nombre_completo" class="block mb-0 text-xs mt-2 ">Nombre completo:</label>
                        <input v-model="empleado.nombre_completo" type="text" id="nombre_completo" class="w-full font-bold text-sm bg-yellow-50 border border-gray-300 px-3 py-1 rounded" required>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="curp" class="block mb-0 text-xs mt-2 ">CURP:</label>
                                <input v-model="empleado.curp" type="text" id="curp" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>
                            </div>
                             <div>
                                <label for="escolaridad" class="block mb-0 text-xs mt-2 ">Escolaridad:</label>
                                <input v-model="empleado.escolaridad" type="tel" id="escolaridad" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" >
                            </div>
                        </div>

                    </div>


                    <div>
                        <label for="c_email" class="block mb-0 text-xs ">Email:</label>
                        <input v-model="empleado.email" type="email" id="c_email" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" >

                        <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div> -->
                                <label for="telefono" class="block mb-0 text-xs mt-2 ">Teléfono:</label>
                                <input v-model="empleado.telefono" type="tel" id="telefono" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" >
                            <!-- </div>
                           
                        </div> -->

                         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="telefono" class="block mb-0 text-xs mt-2 ">Antiguedad en la PESP:</label>
                                <input v-model="empleado.antiguedad_pesp" type="tel" id="telefono" class="w-full text-end text-sm border border-gray-300 px-3 py-1 rounded" >
                            </div>
                            <div>
                                <label for="telefono" class="block mb-0 text-xs mt-2 ">Antigüedad en otras instituciones:</label>
                                <input v-model="empleado.antiguedad_otra" type="tel" id="telefono" class="w-full text-end text-sm border border-gray-300 px-3 py-1 rounded" >
                            </div>
                           
                        </div>
                    </div>

                    
                    
                    <div class="">
                                                                      
                        <div class="bg-gradient-to-r from-slate-500 via-slate-400 to-slate-500 border border-gray-300  p-2 rounded-lg">
                            <div class="grid grid-cols-1 lg:grid-cols-2 _gap-2">
                                <div>
                                    <label for="puesto" class="block mb-0 text-white text-xs  ">Grado:</label>
                                    <select v-model="empleado.puesto" id="puesto" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" required>
                                        <option value="">Seleccione un puesto</option>
                                        <option value="POLICÍA">POLICÍA</option>
                                        <option value="POLICÍA TERCERO">POLICÍA TERCERO</option>
                                        <option value="POLICÍA SEGUNDO">POLICÍA SEGUNDO</option>
                                        <option value="POLICÍA PRIMERO">POLICÍA PRIMERO</option>
                                        <option value="SUBOFICIAL">SUBOFICIAL</option>
                                        <option value="OFICIAL">OFICIAL</option>
                                        <option value="SUBINSPECTOR">SUBINSPECTOR</option>
                                        <option value="INSPECTOR">INSPECTOR</option>
                                    </select>
                                </div>
                                <div class="text-end">
                                    <label for="puesto_fecha" class="block mb-0 text-xs text-white">Fecha Grado:</label>
                                    <input v-model="empleado.puesto_fecha" type="date" id="puesto_fecha" class="w-2/3 text-sm border border-gray-300 px-3 py-1 rounded">
                                </div>

                                <div _class="col-span-2">
                                    <label for="cuip" class="block mb-0 text-xs mt-2 text-white ">CUIP</label>
                                    <input v-model="empleado.cuip" type="text" id="cuip" class="w-full text-sm border border-gray-300 px-3 py-1 rounded" >
                                </div>
                                
                                <div class="text-end">
                                    <label for="fecha_ingreso" class="block mt-2 text-xs text-white">Fecha de Ingreso:</label>
                                    <input v-model="empleado.fecha_ingreso" type="date" id="fecha_ingreso" class="w-2/3 text-sm  border border-gray-300 px-3 py-1 rounded" required>
                                </div>


                            </div>
                        </div>

                        <div class="mt-1 grid grid-cols-1 lg:grid-cols-2 p-1 rounded  border bg-red-100 border-red-300 "> 
                            <div >
                                <input v-model="empleado.baja" type="checkbox" id="baja" class="rounded">
                                <label for="baja" class="_block m-1 text-xs "> Baja</label>
                            </div>
                            <!-- <label class="block mb-0 text-xs mt-3 ">Fecha de Baja:</label> -->
                            <input v-model="empleado.baja_fecha" type="date" id="baja_fecha" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
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
                        <h1 class="text-center bg-gradient-to-r from-slate-600 via-slate-900 to-slate-600 rounded p-1 text-white text-xs">CUP</h1>
                        <div>
                            <label for="acreditacion_cup" class="block mb-0 text-xs mt-3 ">Num. CUP:</label>
                            <input v-model="empleado.acreditacion_cup" type="text" id="acreditacion_cup" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
                        <div>
                            <label for="acreditacion_cup_fecha" class="block mb-0 text-xs mt-3 ">Fecha Acreditación:</label>
                            <input v-model="empleado.acreditacion_cup_fecha" type="date" id="acreditacion_cup_fecha" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>
 
                        <div>
                            <label for="acreditacion_cup_vigencia" class="block mb-0 text-xs mt-3 ">Vigencia:</label>
                            <input v-model="empleado.acreditacion_cup_vigencia" type="date" id="acreditacion_cup_vigencia" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>

                        <div class="mt-1 text-center">
                            <span
                                :class="[
                                    'py-0.5 px-4 text-xs rounded-lg shadow-lg text-slate-800',
                                    empleado.acreditacion_cup_vigencia && Math.ceil((new Date(empleado.acreditacion_cup_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) <= 0
                                        ? 'bg-yellow-300'
                                        : 'bg-emerald-100'
                                ]"
                            >
                                Días de vigencia: 
                                {{ empleado.acreditacion_cup_vigencia ? Math.ceil((new Date(empleado.acreditacion_cup_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) : '' }}
                            </span>

                            
                        </div>
                        
                        <div class="mt-3">
                            <br>
                            <br>
                        </div>
                        <div>
                            <label for="acreditacion_cup_observaciones" class="block mb-0 text-xs mt-3 font-bold text-slate-700">Observaciones CUP:</label>
                            <textarea v-model="empleado.acreditacion_cup_observaciones" id="acreditacion_cup_observaciones" rows="4" class="w-full  border border-gray-300 px-3 py-1 rounded text-xs text-indigo-600"></textarea>
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
                            <label for="acreditacion_competencias_vigencia" class="block mb-0 text-xs mt-3 ">Vigencia:</label>
                            <input v-model="empleado.acreditacion_competencias_vigencia" type="date" id="acreditacion_competencias_vigencia" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>

                        <div class="mt-1 text-center">
                            <span
                                :class="[
                                    'py-0.5 px-4 text-xs rounded-lg shadow-lg text-slate-800',
                                    empleado.acreditacion_competencias_vigencia && Math.ceil((new Date(empleado.acreditacion_competencias_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) <= 0
                                        ? 'bg-yellow-300'
                                        : 'bg-emerald-100'
                                ]"
                            >
                                Días de vigencia: 
                                {{ empleado.acreditacion_competencias_vigencia ? Math.ceil((new Date(empleado.acreditacion_competencias_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) : '' }}
                            </span>
                        </div>

                        <div>
                            <label for="acreditacion_competencias_calificacion" class="block mb-0 text-xs mt-3 ">Calificación Competencias:</label>
                            <input v-model="empleado.acreditacion_competencias_calificacion" type="number" step="0.01" id="acreditacion_competencias_calificacion" class="w-full text-end text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>

                        <div>
                            <label for="acreditacion_competencias_observaciones" class="block mb-0 text-xs mt-3 font-bold text-slate-700">Observaciones Competencias:</label>
                            <textarea v-model="empleado.acreditacion_competencias_observaciones" id="acreditacion_competencias_observaciones" rows="4" class="w-full  border border-gray-300 px-3 py-1 rounded text-xs text-indigo-600"></textarea>
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
                            <label for="acreditacion_desempeno_vigencia" class="block mb-0 text-xs mt-3 ">Vigencia:</label>
                            <input v-model="empleado.acreditacion_desempeno_vigencia" type="date" id="acreditacion_desempeno_vigencia" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>

                         <div class="mt-1 text-center">
                            <span
                                :class="[
                                    'py-0.5 px-4 text-xs rounded-lg shadow-lg text-slate-800',
                                    empleado.acreditacion_desempeno_vigencia && Math.ceil((new Date(empleado.acreditacion_desempeno_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) <= 0
                                        ? 'bg-yellow-300'
                                        : 'bg-emerald-100'
                                ]"
                            >
                                Días de vigencia: 
                                {{ empleado.acreditacion_desempeno_vigencia ? Math.ceil((new Date(empleado.acreditacion_desempeno_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) : '' }}
                            </span>
                        </div>

                        <div>
                            <label for="acreditacion_desempeno_calificacion" class="block mb-0 text-xs mt-3 ">Calificación Desempeño:</label>
                            <input v-model="empleado.acreditacion_desempeno_calificacion" type="number" step="0.01" id="acreditacion_desempeno_calificacion" class="w-full text-end text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>

                        <div>
                            <label for="acreditacion_desempeno_observaciones" class="block mb-0 text-xs mt-3 font-bold text-slate-700">Observaciones Desempeño:</label>
                            <textarea v-model="empleado.acreditacion_desempeno_observaciones" id="acreditacion_desempeno_observaciones" rows="4" class="w-full  border border-gray-300 px-3 py-1 rounded text-xs text-indigo-600"></textarea>
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
                            <label for="acreditacion_c3_vigencia" class="block mb-0 text-xs mt-3 ">Vigencia:</label>
                            <input v-model="empleado.acreditacion_c3_vigencia" type="date" id="acreditacion_c3_vigencia" class="w-full text-sm border border-gray-300 px-3 py-1 rounded">
                        </div>

                        <div class="mt-1 text-center">
                            <span
                                :class="[
                                    'py-0.5 px-4 text-xs rounded-lg shadow-lg text-slate-800',
                                    empleado.acreditacion_c3_vigencia && Math.ceil((new Date(empleado.acreditacion_c3_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) <= 0
                                        ? 'bg-yellow-300'
                                        : 'bg-emerald-100'
                                ]"
                            >
                                Días de vigencia: 
                                {{ empleado.acreditacion_c3_vigencia ? Math.ceil((new Date(empleado.acreditacion_c3_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) : '' }}
                            </span>
                        </div>
                        
                        <div class="mt-3">
                            <br>
                            <br>
                        </div>
              
                        <div>
                            <label for="acreditacion_c3_observaciones" class="block mb-0 text-xs mt-3 font-bold text-slate-700">Observaciones C3:</label>
                            <textarea v-model="empleado.acreditacion_c3_observaciones" id="acreditacion_c3_observaciones" rows="4" class="w-full  border border-gray-300 px-3 py-1 rounded text-xs text-indigo-600"></textarea>
                        </div>
                    </div>



                </div>

                   
             

               
                <div class="text-end" v-if="$page.props.auth.user.tipo_usuario != 'capturista'">
                <button type="submit" class="bg-blue-800 hover:bg-blue-500 text-white px-4 py-2 rounded text-sm shadow _mb-2">
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
    nombre_completo: props.c_empleados?.nombre_completo || '',
    fecha_nacimiento: props.c_empleados?.fecha_nacimiento?.split('T')[0] || '',
    escolaridad: props.c_empleados?.escolaridad || '',
    cuip: props.c_empleados?.cuip || '',
    baja: props.c_empleados?.baja || false,
    baja_fecha: props.c_empleados?.baja_fecha?.split('T')[0] || '',
    fecha_ingreso: props.c_empleados?.fecha_ingreso?.split('T')[0] || '',
    antiguedad_pesp: props.c_empleados?.antiguedad_pesp || null,
    antiguedad_otra: props.c_empleados?.antiguedad_otra || null,
    sexo: props.c_empleados?.sexo || '',

    email: props.c_empleados?.email || '',
    curp: props.c_empleados?.curp || '',
    telefono: props.c_empleados?.telefono || '',
    puesto: props.c_empleados?.puesto || '',
    puesto_fecha: props.c_empleados?.puesto_fecha?.split('T')[0] || '',
    
    acreditacion_cup: props.c_empleados?.acreditacion_cup || '',
    acreditacion_cup_fecha: props.c_empleados?.acreditacion_cup_fecha?.split('T')[0] || '',
    acreditacion_cup_vigencia: props.c_empleados?.acreditacion_cup_vigencia?.split('T')[0] || '',
    acreditacion_cup_observaciones: props.c_empleados?.acreditacion_cup_observaciones || '',

    acreditacion_formacion: props.c_empleados?.acreditacion_formacion || false,
    acreditacion_formacion_fecha: props.c_empleados?.acreditacion_formacion_fecha?.split('T')[0] || '',

    acreditacion_competencias: props.c_empleados?.acreditacion_competencias || false,
    acreditacion_competencias_fecha: props.c_empleados?.acreditacion_competencias_fecha?.split('T')[0] || '',
    acreditacion_competencias_vigencia: props.c_empleados?.acreditacion_competencias_vigencia?.split('T')[0] || '',
    acreditacion_competencias_calificacion: props.c_empleados?.acreditacion_competencias_calificacion || 0,
    acreditacion_competencias_observaciones: props.c_empleados?.acreditacion_competencias_observaciones || '',

    acreditacion_c3: props.c_empleados?.acreditacion_c3 || false,
    acreditacion_c3_fecha: props.c_empleados?.acreditacion_c3_fecha?.split('T')[0] || '',
    acreditacion_c3_vigencia: props.c_empleados?.acreditacion_c3_vigencia?.split('T')[0] || '',
    acreditacion_c3_observaciones: props.c_empleados?.acreditacion_c3_observaciones || '',

    acreditacion_desempeno: props.c_empleados?.acreditacion_desempeno || false,
    acreditacion_desempeno_fecha: props.c_empleados?.acreditacion_desempeno_fecha?.split('T')[0] || '',
    acreditacion_desempeno_vigencia: props.c_empleados?.acreditacion_desempeno_vigencia?.split('T')[0] || '',
    acreditacion_desempeno_calificacion: props.c_empleados?.acreditacion_desempeno_calificacion || 0,
    acreditacion_desempeno_observaciones: props.c_empleados?.acreditacion_desempeno_observaciones || ''
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