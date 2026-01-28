<template>
 <authenticated-layout>
        <Head :title="l_titulo" />
        <main class="container mx-auto mt-4 p-2">
            <h1 class="font-bold text-xl mb-1">{{l_titulo}}</h1>
         <!-- {{ c_empleados }} -->
            <form @submit.prevent="guardarRegistro"  @keydown.enter.prevent="handleEnterKey" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 m-2">

                    <div class="">
                        <label for="numero_empleado" class="block font-medium text-sm text-sky-700">Número de Empleado:</label>
                        <input 
                            type="number" 
                            id="numero_empleado" 
                            v-model="convocatoria.numero_empleado" 
                            @keydown.enter.prevent="buscarEmpleado"
                            @keydown.tab="buscarEmpleado"
                            :readonly="!!props.c_convocatorias"
                            :class="props.c_convocatorias ? 'bg-slate-200' : ''"
                            class="mt-1 p-0.5 block w-full text-sm border-gray-300 font-bold rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                            placeholder="Ingrese número de empleado"
                        />
                        
                        
                    </div>
                    <div>
                         <label for="fecha" class="block font-medium text-sm text-sky-700">Fecha de Captura:</label>
                        <input type="date" id="fecha" v-model="convocatoria.fecha" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-yellow-50">
                    </div>

                    <div class="col-span-2">
                        <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre:</label>
                        <input type="text" id="nombre" v-model="convocatoria.nombre" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                    </div>
                   
                    <div>
                        <label for="telefono" class="block font-medium text-sm text-gray-700">Teléfono:</label>
                        <input type="text" id="telefono" v-model="convocatoria.telefono" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200 lowercase" readonly />
                    </div>
                    <div class="col-span-2">
                        <label for="correo_email" class="block font-medium text-sm text-gray-700">Email:</label>
                        <input type="text" id="correo_email" v-model="convocatoria.email" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200 lowercase" readonly />

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 m-2">
                            <div>
                                <label for="puesto_actual" class="block font-medium text-sm text-gray-700 text-center mt-1">Grado Actual:</label>
                                <!-- <input type="text" id="puesto_actual" v-model="convocatoria.puesto_actual" class="mt-1 block w-full p-0.5 text-sm _border-gray-300 rounded-md shadow-sm text-center _bg-slate-200 bg-gradient-to-r from-green-400 via-green-600 to-green-900 text-white" readonly /> -->
                                <span id="puesto_actual"
                                    class="mt-1 block w-full p-0.5  rounded-md text-center shadow-md   bg-gradient-to-r from-slate-400 via-slate-600 to-slate-900 text-white">
                                    {{ convocatoria.puesto_actual }}
                                </span>
                            </div>
                            <div>
                                <label for="puesto_solicitado" class="block font-medium text-sm text-gray-700 text-center mt-1">Grado al que <b>aspira</b>:</label>
                                <!-- <input type="text" id="puesto_solicitado" v-model="convocatoria.puesto_solicitado" class="mt-1 block w-full p-0.5 text-sm  rounded-md text-center _shadow-lg bg-gradient-to-r from-sky-500 via-sky-700 to-slate-900  text-white" readonly /> -->
                                <span id="puesto_solicitado"
                                    class="mt-1 block w-full p-0.5  rounded-md text-center shadow-md   bg-gradient-to-r from-sky-500 via-sky-700 to-slate-900  text-white">
                                    {{ convocatoria.puesto_solicitado }}
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="col-span-2">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 ">
                            <div class="col-span-2">
                                <label for="curp" class="block font-medium text-sm text-gray-700">CURP:</label>
                                <input type="text" id="curp" v-model="convocatoria.curp" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />  
                            </div>
                            <div>
                                <label for="sexo" class="block font-medium text-sm text-gray-700">Sexo:</label>
                                <!-- <input type="text" id="sexo" v-model="convocatoria.sexo" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" readonly /> -->
                                <select id="sexo" v-model="convocatoria.sexo" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" disabled>
                                    <option value="H">Masculino</option>
                                    <option value="M">Femenino</option> 
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="escolaridad" class="block font-medium text-sm text-gray-700">Escolaridad:</label>
                                <input type="text" id="escolaridad" v-model="convocatoria.escolaridad" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4" >
                            <div>   
                                <label for="antiguedad_pesp" class="block font-medium text-sm text-gray-700 mt-3">Antigüedad en PESP (Años):</label>
                                <input type="number" id="antiguedad_pesp" v-model="convocatoria.antiguedad_pesp" class="mt-1 block w-full p-0.5 text-end text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                            <div>   
                                <label for="antiguedad_otra" class="block font-medium text-sm text-gray-700 mt-3">Antigüedad en otras corporaciones (Años):</label>
                                <input type="number" id="antiguedad_otra" v-model="convocatoria.antiguedad_otra" class="mt-1 block w-full p-0.5 text-end text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />  
                            </div>
                        </div>
                        
                        
                    </div>
                    <div>
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                            <div>
                                <label for="fecha_ingreso" class="block font-medium text-sm text-gray-700">Fecha de Ingreso:</label>
                                <input type="date" id="fecha_ingreso" v-model="convocatoria.fecha_ingreso" :class="convocatoria.fecha_ingreso ? '' : 'text-gray-300'" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />                     
                            </div>
                            <div>
                                <label for="puesto_fecha" class="block font-medium text-sm text-gray-700">Fecha de Grado:</label>
                                <input type="date" id="puesto_fecha" v-model="convocatoria.puesto_fecha" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                        </div>
                        <div>
                            <label for="cuip" class="block font-medium text-sm text-gray-700 mt-3">CUIP:</label>
                            <input type="text" id="cuip" v-model="convocatoria.cuip" class="mt-1 block w-full p-0.5 text-sm border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                        </div>
                    </div>

                </div>
                
                

                <!-- <hr class="mx-4"> -->
                <!-- <div class="text-center font-bold text-sm mt-4 bg-slate-700 rounded-md p-1 shadow-sm m-2 text-white">
                    ACREDITACIONES
                </div> -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 m-2">
                    <div>
                        <label for="acreditacion_cup" class="block font-medium text-sm bg-slate-900 rounded p-0.5 text-white text-center">Certificado Unico Policial</label>
                        <input type="text" id="acreditacion_cup" v-model="convocatoria.acreditacion_cup" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-2">
                            <div>
                                <label for="acreditacion_cup_fecha" class="block font-medium text-sm text-gray-700 ">Fecha:</label>
                                <input type="date" id="acreditacion_cup_fecha" v-model="convocatoria.acreditacion_cup_fecha" :class="convocatoria.acreditacion_cup_fecha ? '' : 'text-gray-300'" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                            <div>
                                <label for="acreditacion_cup_vigencia" class="block font-medium text-sm text-gray-700 ">Vigencia:</label>
                                <input type="date" id="acreditacion_cup_vigencia" v-model="convocatoria.acreditacion_cup_vigencia" :class="convocatoria.acreditacion_cup_vigencia ? '' : 'text-gray-300'" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <span
                                :class="[
                                    'py-0.5 px-4 text-xs rounded-lg shadow-lg text-white',
                                    convocatoria.acreditacion_cup_vigencia && Math.ceil((new Date(convocatoria.acreditacion_cup_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) <= 0
                                        ? 'bg-red-500'
                                        : 'bg-sky-500'
                                ]"
                            >
                                Días de vigencia: 
                                {{ convocatoria.acreditacion_cup_vigencia ? Math.ceil((new Date(convocatoria.acreditacion_cup_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) : '' }}
                            </span>
                        </div>
                        <label for="acreditacion_cup_observaciones" class="block font-medium text-xs lowercase text-center bg-white rounded shadow p-1 text-sky-700 mt-2" 
                            v-if="convocatoria.acreditacion_cup_observaciones">{{ convocatoria.acreditacion_cup_observaciones }}
                        </label>
                        
                    </div>

                    <div>  
                        <label for="acreditacion_competencias" class="block font-medium text-sm bg-slate-900 rounded p-0.5 text-white text-center">Competencias Básicas</label>
                        <input type="text" id="acreditacion_competencias" v-model="convocatoria.acreditacion_competencias" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-2">
                            <div>
                                <label for="acreditacion_competencias_fecha" class="block font-medium text-sm text-gray-700 ">Fecha:</label>
                                <input type="date" id="acreditacion_competencias_fecha" v-model="convocatoria.acreditacion_competencias_fecha" :class="convocatoria.acreditacion_competencias_fecha ? '' : 'text-gray-300'" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                            <div>
                                <label for="acreditacion_competencias_vigencia" class="block font-medium text-sm text-gray-700 ">Vigencia:</label>
                                <input type="date" id="acreditacion_competencias_vigencia" v-model="convocatoria.acreditacion_competencias_vigencia" :class="convocatoria.acreditacion_competencias_vigencia ? '' : 'text-gray-300'" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <span
                                :class="[
                                    'py-0.5 px-4 text-xs rounded-lg shadow-lg text-white',
                                    convocatoria.acreditacion_competencias_vigencia && Math.ceil((new Date(convocatoria.acreditacion_competencias_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) <= 0
                                        ? 'bg-red-500'
                                        : 'bg-sky-500'
                                ]"
                            >
                                Días de vigencia: 
                                {{ convocatoria.acreditacion_competencias_vigencia ? Math.ceil((new Date(convocatoria.acreditacion_competencias_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) : '' }}
                            </span>
                        </div>
                        <label for="acreditacion_competencias_vigencia" class="block font-medium text-xs lowercase text-center bg-white rounded shadow p-1 text-sky-700 mt-2" 
                            v-if="convocatoria.acreditacion_competencias_observaciones">{{ convocatoria.acreditacion_competencias_observaciones }}
                        </label>

                    </div>

                    <div>
                        <label for="acreditacion_desempeno" class="block font-medium text-sm bg-slate-900 rounded p-0.5 text-white text-center">Eval. del Desempeño</label>
                        <input type="text" id="acreditacion_desempeno" v-model="convocatoria.acreditacion_desempeno" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-2">
                            <div>
                                <label for="acreditacion_desempeno_fecha" class="block font-medium text-sm text-gray-700">Fecha:</label>
                                <input type="date" id="acreditacion_desempeno_fecha" v-model="convocatoria.acreditacion_desempeno_fecha" :class="convocatoria.acreditacion_desempeno_fecha ? '' : 'text-gray-300'" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                            <div>
                                <label for="acreditacion_desempeno_vigencia" class="block font-medium text-sm text-gray-700">Vigencia:</label>
                                <input type="date" id="acreditacion_desempeno_vigencia" v-model="convocatoria.acreditacion_desempeno_vigencia" :class="convocatoria.acreditacion_desempeno_vigencia ? '' : 'text-gray-300'" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />        
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <span
                                :class="[
                                    'py-0.5 px-4 text-xs rounded-lg shadow-lg text-white',
                                    convocatoria.acreditacion_desempeno_vigencia && Math.ceil((new Date(convocatoria.acreditacion_desempeno_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) <= 0
                                        ? 'bg-red-500'
                                        : 'bg-sky-500'
                                ]"
                            >
                                Días de vigencia: 
                                {{ convocatoria.acreditacion_desempeno_vigencia ? Math.ceil((new Date(convocatoria.acreditacion_desempeno_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) : '' }}
                            </span>
                        </div>

                        <label for="acreditacion_desempeno_vigencia" class="block font-medium text-xs lowercase text-center bg-white rounded shadow p-1 text-sky-700 mt-2" 
                            v-if="convocatoria.acreditacion_desempeno_observaciones">{{ convocatoria.acreditacion_desempeno_observaciones }}
                        </label>
                    </div>

                    <div>
                        <label for="acreditacion_c3" class="block font-medium text-sm bg-slate-900 rounded p-0.5 text-white text-center">Evaluacion C3</label>
                        <input type="text" id="acreditacion_c3" v-model="convocatoria.acreditacion_c3" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-2">
                            <div>
                                <label for="acreditacion_c3_fecha" class="block font-medium text-sm text-gray-700 ">Fecha:</label>
                                <input type="date" id="acreditacion_c3_fecha" v-model="convocatoria.acreditacion_c3_fecha" :class="convocatoria.acreditacion_c3_fecha ? '' : 'text-gray-300'" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                            <div>
                                <label for="acreditacion_c3_vigencia" class="block font-medium text-sm text-gray-700 ">Vigencia:</label>
                                <input type="date" id="acreditacion_c3_vigencia" v-model="convocatoria.acreditacion_c3_vigencia" :class="convocatoria.acreditacion_c3_vigencia ? '' : 'text-gray-300'" class="mt-1 block w-full p-0.5 border-gray-300 text-sm rounded-md shadow-sm bg-slate-200" readonly />
                            </div>
                        </div>
                        
                        <div class="mt-4 text-center">
                            <span
                                :class="[
                                    'py-0.5 px-4 text-xs rounded-lg shadow-lg text-white',
                                    convocatoria.acreditacion_c3_vigencia && Math.ceil((new Date(convocatoria.acreditacion_c3_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) <= 0
                                        ? 'bg-red-500'
                                        : 'bg-sky-500'
                                ]"
                            >
                                Días de vigencia: 
                                {{ convocatoria.acreditacion_c3_vigencia ? Math.ceil((new Date(convocatoria.acreditacion_c3_vigencia) - new Date()) / (1000 * 60 * 60 * 24)) : '' }}
                            </span>
                        </div>


                        <label for="acreditacion_c3_observaciones" class="block font-medium text-xs lowercase text-center bg-white rounded shadow p-1 text-sky-700 mt-2" 
                            v-if="convocatoria.acreditacion_c3_observaciones">{{ convocatoria.acreditacion_c3_observaciones }}
                        </label>

                    </div>
                </div>
                
                
                <hr class="mx-8 ">
                
                <!-- <div class="text-center font-bold text-sm mt-4 bg-slate-700 rounded-md p-1 m-2 text-white">
                    PUESTO AL QUE ASPIRA EN LA PROMOCIÓN
                </div> -->
                

            
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 m-2">
                    <div>
                        <label for="observaciones" class="block font-extrabold text-sm text-gray-700">Observaciones:</label>
                        <textarea id="observaciones" v-model="convocatoria.observaciones" rows="3" class="mt-1 block w-full border-gray-300 bg-yellow-50 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ingrese observaciones adicionales"></textarea> 
                    </div>

                    <div class="items-end flex justify-end mt-6">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">{{c_convocatorias ? 'Actualizar' : 'Guardar'}}</button>
                    </div>

                    <div v-if="Object.keys($page.props.errors).length">
                      
                       <div class="bg-gradient-to-r from-black via-red-800 to-red-700    px-4 py-3 rounded-xl _relative" role="alert">
                           <strong class="font-bold text-2xl text-slate-300">Por favor corrige los siguientes errores:</strong>
                          
                           <ul class="mt-2 list-disc list-inside">
                               <li class="text-yellow-200" v-for="(errorMessages, field) in $page.props.errors" :key="field" >{{ errorMessages }}</li>
                           </ul>
                       </div>
                    </div>

                    
                </div>

                    
                    

            </form>
        </main>
    </authenticated-layout>

</template> 

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { router,Head,usePage } from '@inertiajs/vue3';

    import { ref,computed } from 'vue';

    
    const page = usePage();

    const props = defineProps({
        c_empleados: {
            type: Object,
            default: null
        },
        c_convocatorias: {
            type: Object,
            default: null
        },
        l_periodoActivo:{
            type: Number,
            default: null
        }
        
    });

    const l_titulo = computed(() => props.c_convocatorias ? 'Editar registro de promoción' : 'Agregar registro de promoción');

    const convocatoria = ref({
        id: props.c_convocatorias ? props.c_convocatorias.id : null,
        
        user_captura: props.c_convocatorias ? props.c_convocatorias.user.name : '',
        
        fecha: props.c_convocatorias ? props.c_convocatorias.fecha.split('T')[0] : new Date().toISOString().split('T')[0],
        
        puesto_actual: props.c_convocatorias ? props.c_convocatorias.puesto_actual : '',
        puesto_solicitado: props.c_convocatorias ? props.c_convocatorias.puesto_solicitado : '',
        observaciones: props.c_convocatorias ? props.c_convocatorias.observaciones : '',

        periodo_id: props.c_convocatorias ? props.c_convocatorias.periodo_id : props.l_periodoActivo,

        empleado_id: props.c_convocatorias ? props.c_convocatorias.empleado_id : null,
        numero_empleado: props.c_convocatorias ? props.c_convocatorias.empleado.num_empleado : '',
        // nombre: props.c_convocatorias 
        //     ? ( (props.c_convocatorias.empleado.primer_apellido || '') + ' ' + 
        //     (props.c_convocatorias.empleado.segundo_apellido || '') + ' ' + 
        //     (props.c_convocatorias.empleado.nombre || '') )
        //     : '',
        nombre: props.c_convocatorias 
            ? props.c_convocatorias.empleado.nombre_completo
            : '',
  
        email: props.c_convocatorias ? props.c_convocatorias.empleado.email : '',
        telefono: props.c_convocatorias ? props.c_convocatorias.empleado.telefono : '',
        curp: props.c_convocatorias ? props.c_convocatorias.empleado.curp : '',
        cuip: props.c_convocatorias ? props.c_convocatorias.empleado.cuip : '',

        sexo: props.c_convocatorias ? props.c_convocatorias.empleado.sexo : '',
        escolaridad: props.c_convocatorias ? props.c_convocatorias.empleado.escolaridad : '',
        puesto_fecha: props.c_convocatorias ? props.c_convocatorias.empleado.puesto_fecha.split('T')[0] : '',
        antiguedad_pesp: props.c_convocatorias ? props.c_convocatorias.empleado.antiguedad_pesp : '',
        antiguedad_otra: props.c_convocatorias ? props.c_convocatorias.empleado.antiguedad_otra : '',



        fecha_ingreso: props.c_convocatorias ? props.c_convocatorias.empleado.fecha_ingreso.split('T')[0] : '',
        acreditacion_formacion: props.c_convocatorias ? (props.c_convocatorias.acreditacion_formacion ? 'APROBADO' : '--') : '',
        acreditacion_formacion_fecha: props.c_convocatorias ? (props.c_convocatorias.acreditacion_formacion_fecha ? props.c_convocatorias.acreditacion_formacion_fecha.split('T')[0] : '') : '',

        acreditacion_cup: props.c_convocatorias ? props.c_convocatorias.acreditacion_cup : '',
        acreditacion_cup_fecha: props.c_convocatorias ? (props.c_convocatorias.acreditacion_cup_fecha ? props.c_convocatorias.acreditacion_cup_fecha.split('T')[0] : '') : '',
        acreditacion_cup_vigencia: props.c_convocatorias ? (props.c_convocatorias.acreditacion_cup_vigencia ? props.c_convocatorias.acreditacion_cup_vigencia.split('T')[0] : '') : '',
        acreditacion_cup_observaciones: props.c_convocatorias ? props.c_convocatorias.acreditacion_cup_observaciones : '',
       
        acreditacion_competencias: props.c_convocatorias ? (props.c_convocatorias.acreditacion_competencias ? 'APROBADO' : '--') : '',
        acreditacion_competencias_fecha: props.c_convocatorias ? (props.c_convocatorias.acreditacion_competencias_fecha ? props.c_convocatorias.acreditacion_competencias_fecha.split('T')[0] : '') : '',
        acreditacion_competencias_vigencia: props.c_convocatorias ? (props.c_convocatorias.acreditacion_competencias_vigencia ? props.c_convocatorias.acreditacion_competencias_vigencia.split('T')[0] : '') : '',
        acreditacion_competencias_observaciones: props.c_convocatorias ? props.c_convocatorias.acreditacion_competencias_observaciones : '',

        acreditacion_desempeno: props.c_convocatorias ? (props.c_convocatorias.acreditacion_desempeno ? 'APROBADO' : '--') : '',
        acreditacion_desempeno_fecha: props.c_convocatorias ? (props.c_convocatorias.acreditacion_desempeno_fecha ? props.c_convocatorias.acreditacion_desempeno_fecha.split('T')[0] : '') : '',
        acreditacion_desempeno_vigencia: props.c_convocatorias ? (props.c_convocatorias.acreditacion_desempeno_vigencia ? props.c_convocatorias.acreditacion_desempeno_vigencia.split('T')[0] : '')  : '',
        acreditacion_desempeno_observaciones: props.c_convocatorias ? props.c_convocatorias.acreditacion_desempeno_observaciones : '',

        acreditacion_c3: props.c_convocatorias ? (props.c_convocatorias.acreditacion_c3 ? 'APROBADO' : '--') : '',
        acreditacion_c3_fecha: props.c_convocatorias ? (props.c_convocatorias.acreditacion_c3_fecha ? props.c_convocatorias.acreditacion_c3_fecha.split('T')[0] : '') : '',
        acreditacion_c3_vigencia: props.c_convocatorias ? (props.c_convocatorias.acreditacion_c3_vigencia ? props.c_convocatorias.acreditacion_c3_vigencia.split('T')[0] : '') : '',
        acreditacion_c3_observaciones: props.c_convocatorias ? props.c_convocatorias.acreditacion_c3_observaciones : '',


        observaciones: props.c_convocatorias ? props.c_convocatorias.observaciones : '',
        
    });

   const buscarEmpleado = () => {
   
        const empleado = props.c_empleados.find(emp => emp.num_empleado === convocatoria.value.numero_empleado);
        if (empleado) {
            convocatoria.value.empleado_id = empleado.id;
           
            convocatoria.value.nombre = empleado.nombre_completo;
            convocatoria.value.email = empleado.email;
            convocatoria.value.telefono = empleado.telefono;
            convocatoria.value.curp = empleado.curp;
            convocatoria.value.cuip = empleado.cuip;

            convocatoria.value.sexo = empleado.sexo;
            convocatoria.value.escolaridad = empleado.escolaridad;
            convocatoria.value.puesto_fecha = empleado.puesto_fecha ? empleado.puesto_fecha.split('T')[0] : '';
            convocatoria.value.antiguedad_pesp = empleado.antiguedad_pesp;
            convocatoria.value.antiguedad_otra = empleado.antiguedad_otra;
            
            convocatoria.value.puesto_actual = empleado.puesto;
            convocatoria.value.puesto_solicitado = ObtenerPuestoSolicitado(empleado.puesto);

            convocatoria.value.fecha_ingreso = empleado.fecha_ingreso.split('T')[0];

            convocatoria.value.acreditacion_formacion = empleado.acreditacion_formacion ? 'APROBADO' : '--';
            convocatoria.value.acreditacion_formacion_fecha = empleado.acreditacion_formacion_fecha ? empleado.acreditacion_formacion_fecha.split('T')[0] : '';

            convocatoria.value.acreditacion_cup = empleado.acreditacion_cup;
            convocatoria.value.acreditacion_cup_fecha =  empleado.acreditacion_cup_fecha ? empleado.acreditacion_cup_fecha.split('T')[0] : '';
            convocatoria.value.acreditacion_cup_observaciones = empleado.acreditacion_cup_observaciones ? empleado.acreditacion_cup_observaciones : '';
            convocatoria.value.acreditacion_cup_vigencia = empleado.acreditacion_cup_vigencia ? empleado.acreditacion_cup_vigencia.split('T')[0]:'';

            convocatoria.value.acreditacion_competencias = empleado.acreditacion_competencias ? 'APROBADO' : '--';
            convocatoria.value.acreditacion_competencias_fecha = empleado.acreditacion_competencias_fecha ? empleado.acreditacion_competencias_fecha.split('T')[0] : '';
            convocatoria.value.acreditacion_competencias_vigencia = empleado.acreditacion_competencias_vigencia ? empleado.acreditacion_competencias_vigencia.split('T')[0] : '';
            convocatoria.value.acreditacion_competencias_observaciones = empleado.acreditacion_competencias_observaciones ? empleado.acreditacion_competencias_observaciones : '';  

            convocatoria.value.acreditacion_desempeno = empleado.acreditacion_desempeno ? 'APROBADO' : '--';
            convocatoria.value.acreditacion_desempeno_fecha = empleado.acreditacion_desempeno_fecha ? empleado.acreditacion_desempeno_fecha.split('T')[0] : '';
            convocatoria.value.acreditacion_desempeno_vigencia = empleado.acreditacion_desempeno_vigencia ? empleado.acreditacion_desempeno_vigencia.split('T')[0] : '';
            convocatoria.value.acreditacion_desempeno_observaciones = empleado.acreditacion_desempeno_observaciones ? empleado.acreditacion_desempeno_observaciones : '';

            convocatoria.value.acreditacion_c3 = empleado.acreditacion_c3 ? 'APROBADO' : '--';
            convocatoria.value.acreditacion_c3_fecha = empleado.acreditacion_c3_fecha ? empleado.acreditacion_c3_fecha.split('T')[0] : '';
            convocatoria.value.acreditacion_c3_vigencia = empleado.acreditacion_c3_vigencia ? empleado.acreditacion_c3_vigencia.split('T')[0] : ''; 
            convocatoria.value.acreditacion_c3_observaciones = empleado.acreditacion_c3_observaciones ? empleado.acreditacion_c3_observaciones : '';

        } else {
            convocatoria.value.empleado_id = null;
            convocatoria.value.nombre = '';
          
            convocatoria.value.email = '';
            convocatoria.value.telefono = '';
            convocatoria.value.curp = '';
            convocatoria.value.cuip = '';

            convocatoria.value.sexo = '';
            convocatoria.value.escolaridad = '';
            convocatoria.value.puesto_fecha = '';
            convocatoria.value.antiguedad_pesp = '';
            convocatoria.value.antiguedad_otra = '';

            convocatoria.value.puesto_actual = '';
            convocatoria.value.puesto_solicitado = '';

            convocatoria.value.fecha_ingreso = '';
            convocatoria.value.acreditacion_formacion = '';
            convocatoria.value.acreditacion_formacion_fecha = '';

            convocatoria.value.acreditacion_cup = '';
            convocatoria.value.acreditacion_cup_fecha = '';
            convocatoria.value.acreditacion_cup_vigencia = '';
            convocatoria.value.acreditacion_cup_observaciones = '';

            convocatoria.value.acreditacion_competencias = '';
            convocatoria.value.acreditacion_competencias_fecha = '';
            convocatoria.value.acreditacion_competencias_vigencia = '';
            convocatoria.value.acreditacion_competencias_observaciones = '';

            convocatoria.value.acreditacion_desempeno = '';
            convocatoria.value.acreditacion_desempeno_fecha = '';
            convocatoria.value.acreditacion_desempeno_vigencia = '';
            convocatoria.value.acreditacion_desempeno_observaciones = '';

            convocatoria.value.acreditacion_c3 = '';
            convocatoria.value.acreditacion_c3_fecha = '';
            convocatoria.value.acreditacion_c3_vigencia = '';
            convocatoria.value.acreditacion_c3_observaciones = '';

            alert('Empleado no encontrado');
        }
    };

    const ObtenerPuestoSolicitado = (puestoActual) => {
        // Lógica para determinar el puesto solicitado basado en el puesto actual
        // Esto es solo un ejemplo, ajusta según tus necesidades
        const puestosMap = {
            'POLICÍA': 'POLICÍA TERCERO',
            'POLICÍA TERCERO': 'POLICÍA SEGUNDO',
            'POLICÍA SEGUNDO': 'POLICÍA PRIMERO',
            'POLICÍA PRIMERO': 'SUBOFICIAL',
            'SUBOFICIAL': 'OFICIAL',
            'OFICIAL': 'SUBINSPECTOR',
            'SUBINSPECTOR': 'INSPECTOR',

            // Agrega más mapeos según sea necesario
        };
        return puestosMap[puestoActual] || '';
    };

    const guardarRegistro = () => {
        if (props.c_convocatorias) {
            // Actualizar registro existente
            router.put(route('convocatorias.update', convocatoria.value.id), convocatoria.value);
         } else {
            // Crear nuevo registro
            router.post(route('convocatorias.store'), convocatoria.value);
        }
    };

     const handleEnterKey = (event) => {
        // Solo permitir submit si el botón está enfocado
        if (event.target.type !== 'submit' && event.target.id !== 'numero_empleado' && event.target.id !== 'observaciones') {
            event.preventDefault();
        } else if (event.target.id === 'numero_empleado') {
            buscarEmpleado();
        }else {
            // Permitir el submit
           if ( event.target.id === 'observaciones') {
            // alert('Presionaste enter en observaciones');
            //agregar un salto de línea
            convocatoria.value.observaciones += '\n';
           }
        }
    };

    </script>