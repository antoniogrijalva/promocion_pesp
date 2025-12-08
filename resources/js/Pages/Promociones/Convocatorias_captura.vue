<template>
 <authenticated-layout>
        <Head :title="l_titulo" />
        <main class="container mx-auto mt-4 p-2">
            <h1 class="font-bold text-xl mb-1">{{l_titulo}}</h1>
         
            <form @submit.prevent="guardarRegistro"  @keydown.enter.prevent="handleEnterKey" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 m-2">

                    <div class="">
                        <label for="numero_empleado" class="block font-medium text-sm text-gray-700">Número de Empleado:</label>
                        <input 
                            type="number" 
                            id="numero_empleado" 
                            v-model="convocatoria.numero_empleado" 
                            @keydown.enter.prevent="buscarEmpleado"
                            @keydown.tab="buscarEmpleado"
                            :readonly="!!props.c_convocatorias"
                            :class="props.c_convocatorias ? 'bg-slate-200' : ''"
                            class="mt-1 p-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                            placeholder="Ingrese número de empleado"
                        />
                        
                        
                    </div>
                    <div>
                         <label for="fecha" class="block font-medium text-sm text-gray-700">Fecha de Captura:</label>
                        <input type="date" id="fecha" v-model="convocatoria.fecha" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-yellow-50">
                    </div>

                    <div class="col-span-2">
                        <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre:</label>
                        <input type="text" id="nombre" v-model="convocatoria.nombre" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                    </div>
                   
                    <div>
                        <label for="telefono" class="block font-medium text-sm text-gray-700">Teléfono:</label>
                        <input type="text" id="telefono" v-model="convocatoria.telefono" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200 lowercase" readonly />
                    </div>
                    <div class="col-span-2">
                        <label for="correo_email" class="block font-medium text-sm text-gray-700">Email:</label>
                        <input type="text" id="correo_email" v-model="convocatoria.email" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200 lowercase" readonly />
                    </div>

                    <div class="col-span-2">
                        <label for="curp" class="block font-medium text-sm text-gray-700">CURP:</label>
                        <input type="text" id="curp" v-model="convocatoria.curp" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />                     
                    </div>
                    <div>
                        <label for="fecha_ingreso" class="block font-medium text-sm text-gray-700">Fecha de Ingreso:</label>
                        <input type="date" id="fecha_ingreso" v-model="convocatoria.fecha_ingreso" :class="convocatoria.fecha_ingreso ? '' : 'text-gray-300'" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />                     
                    </div>

                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 m-2">
                    <div>
                        <label for="puesto_actual" class="block font-medium text-sm text-gray-700">Puesto Actual:</label>
                        <input type="text" id="puesto_actual" v-model="convocatoria.puesto_actual" class="mt-1 block w-full p-1 _border-gray-300 rounded-md shadow-sm text-center _bg-slate-200 bg-gradient-to-r from-slate-400 via-gray-900 to-slate-400 text-white" readonly />
                    </div>
                 
                    <div>
                        <label for="puesto_solicitado" class="block font-medium text-sm text-gray-700">Puesto al que <b>aspira</b>:</label>
                        <input type="text" id="puesto_solicitado" v-model="convocatoria.puesto_solicitado" class="mt-1 block w-full p-1 _border-slate-900 rounded-md text-center shadow-sm bg-gradient-to-r from-slate-900 via-sky-600 to-slate-900  text-white" readonly />
                    </div>

                </div>

                <hr class="mx-4">
                <!-- <div class="text-center font-bold text-sm mt-4 bg-slate-700 rounded-md p-1 shadow-sm m-2 text-white">
                    ACREDITACIONES
                </div> -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 m-2">
                    <div>
                        <label for="acreditacion_cuip" class="block font-medium text-sm bg-slate-900 rounded p-0.5 text-white text-center">Certificado Unico Policial</label>
                        <input type="text" id="acreditacion_cuip" v-model="convocatoria.acreditacion_cuip" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />

                        <label for="acreditacion_cuip_fecha" class="block font-medium text-sm text-gray-700 mt-2">Fecha:</label>
                        <input type="date" id="acreditacion_cuip_fecha" v-model="convocatoria.acreditacion_cuip_fecha" :class="convocatoria.acreditacion_cuip_fecha ? '' : 'text-gray-300'" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                        <label for="acreditacion_cuip_vigencia" class="block font-medium text-sm text-gray-700 mt-2">Vigencia:</label>
                        <input type="date" id="acreditacion_cuip_vigencia" v-model="convocatoria.acreditacion_cuip_vigencia" :class="convocatoria.acreditacion_cuip_vigencia ? '' : 'text-gray-300'" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                    </div>

                    <div>
                        
                        <label for="acreditacion_competencias" class="block font-medium text-sm bg-slate-900 rounded p-0.5 text-white text-center">Competencias Básicas</label>
                        <input type="text" id="acreditacion_competencias" v-model="convocatoria.acreditacion_competencias" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                        <label for="acreditacion_competencias_fecha" class="block font-medium text-sm text-gray-700 mt-2">Fecha:</label>
                        <input type="date" id="acreditacion_competencias_fecha" v-model="convocatoria.acreditacion_competencias_fecha" :class="convocatoria.acreditacion_competencias_fecha ? '' : 'text-gray-300'" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                        <label for="acreditacion_competencias_vigencia" class="block font-medium text-sm text-gray-700 mt-2">Vigencia:</label>
                        <input type="date" id="acreditacion_competencias_vigencia" v-model="convocatoria.acreditacion_competencias_vigencia" :class="convocatoria.acreditacion_competencias_vigencia ? '' : 'text-gray-300'" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                    </div>

                    <div>
                        <label for="acreditacion_desempeno" class="block font-medium text-sm bg-slate-900 rounded p-0.5 text-white text-center">Evaluación del Desempeño</label>
                        <input type="text" id="acreditacion_desempeno" v-model="convocatoria.acreditacion_desempeno" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                        <label for="acreditacion_desempeno_fecha" class="block font-medium text-sm text-gray-700 mt-2">Fecha:</label>
                        <input type="date" id="acreditacion_desempeno_fecha" v-model="convocatoria.acreditacion_desempeno_fecha" :class="convocatoria.acreditacion_desempeno_fecha ? '' : 'text-gray-300'" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                        <label for="acreditacion_desempeno_vigencia" class="block font-medium text-sm text-gray-700 mt-2">Vigencia:</label>
                        <input type="date" id="acreditacion_desempeno_vigencia" v-model="convocatoria.acreditacion_desempeno_vigencia" :class="convocatoria.acreditacion_desempeno_vigencia ? '' : 'text-gray-300'" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />        

                    </div>

                    <div>
                        <label for="acreditacion_c3" class="block font-medium text-sm bg-slate-900 rounded p-0.5 text-white text-center">Evaluacion C3</label>
                        <input type="text" id="acreditacion_c3" v-model="convocatoria.acreditacion_c3" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                        <label for="acreditacion_c3_fecha" class="block font-medium text-sm text-gray-700 mt-2">Fecha:</label>
                        <input type="date" id="acreditacion_c3_fecha" v-model="convocatoria.acreditacion_c3_fecha" :class="convocatoria.acreditacion_c3_fecha ? '' : 'text-gray-300'" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                        <label for="acreditacion_c3_vigencia" class="block font-medium text-sm text-gray-700 mt-2">Vigencia:</label>
                        <input type="date" id="acreditacion_c3_vigencia" v-model="convocatoria.acreditacion_c3_vigencia" :class="convocatoria.acreditacion_c3_vigencia ? '' : 'text-gray-300'" class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm bg-slate-200" readonly />
                        <label for="acreditacion_c3_observaciones" class="block font-medium text-xs lowercase text-center bg-white rounded shadow p-1 text-sky-700 mt-2" v-if="convocatoria.acreditacion_c3_observaciones">{{ convocatoria.acreditacion_c3_observaciones }}</label>
                    </div>
                </div>
                
                
                <hr class="mx-4">
                
                <!-- <div class="text-center font-bold text-sm mt-4 bg-slate-700 rounded-md p-1 m-2 text-white">
                    PUESTO AL QUE ASPIRA EN LA PROMOCIÓN
                </div> -->
                

            
                <div class="md:col-span-2 lg:col-span-3">
                    <label for="observaciones" class="block font-extrabold text-sm text-gray-700">Observaciones:</label>
                    <textarea id="observaciones" v-model="convocatoria.observaciones" rows="4" class="mt-1 block w-full border-gray-300 bg-yellow-50 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ingrese observaciones adicionales"></textarea> 
                </div>

                    
                    <div v-if="Object.keys($page.props.errors).length">
                      
                       <div class="bg-gradient-to-r from-black via-red-800 to-red-700    px-4 py-3 rounded-xl relative" role="alert">
                           <strong class="font-bold text-2xl text-slate-300">Por favor corrige los siguientes errores:</strong>
                          
                           <ul class="mt-2 list-disc list-inside">
                               <li class="text-yellow-200" v-for="(errorMessages, field) in $page.props.errors" :key="field" >{{ errorMessages }}</li>
                           </ul>
                       </div>
                    </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">{{c_convocatorias ? 'Actualizar' : 'Guardar'}}</button>
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
        nombre: props.c_convocatorias ?  props.c_convocatorias.empleado.primer_apellido + ' ' +  props.c_convocatorias.empleado.segundo_apellido+ ' ' + props.c_convocatorias.empleado.segundo_apellido : '',  
  
        email: props.c_convocatorias ? props.c_convocatorias.empleado.email : '',
        telefono: props.c_convocatorias ? props.c_convocatorias.empleado.telefono : '',
        curp: props.c_convocatorias ? props.c_convocatorias.empleado.curp : '',



        fecha_ingreso: props.c_convocatorias ? props.c_convocatorias.empleado.fecha_ingreso.split('T')[0] : '',
        acreditacion_formacion: props.c_convocatorias ? (props.c_convocatorias.acreditacion_formacion ? 'APROBADO' : '--') : '',
        acreditacion_formacion_fecha: props.c_convocatorias ? (props.c_convocatorias.acreditacion_formacion_fecha ? props.c_convocatorias.acreditacion_formacion_fecha.split('T')[0] : '') : '',

        acreditacion_cuip: props.c_convocatorias ? props.c_convocatorias.acreditacion_cuip : '',
        acreditacion_cuip_fecha: props.c_convocatorias ? (props.c_convocatorias.acreditacion_cuip_fecha ? props.c_convocatorias.acreditacion_cuip_fecha.split('T')[0] : '') : '',
        acreditacion_cuip_vigencia: props.c_convocatorias ? (props.c_convocatorias.acreditacion_cuip_vigencia ? props.c_convocatorias.acreditacion_cuip_vigencia.split('T')[0] : '') : '',
       
        acreditacion_competencias: props.c_convocatorias ? (props.c_convocatorias.acreditacion_competencias ? 'APROBADO' : '--') : '',
        acreditacion_competencias_fecha: props.c_convocatorias ? (props.c_convocatorias.acreditacion_competencias_fecha ? props.c_convocatorias.acreditacion_competencias_fecha.split('T')[0] : '') : '',
        acreditacion_competencias_vigencia: props.c_convocatorias ? (props.c_convocatorias.acreditacion_competencias_vigencia ? props.c_convocatorias.acreditacion_competencias_vigencia.split('T')[0] : '') : '',

        acreditacion_desempeno: props.c_convocatorias ? (props.c_convocatorias.acreditacion_desempeno ? 'APROBADO' : '--') : '',
        acreditacion_desempeno_fecha: props.c_convocatorias ? (props.c_convocatorias.acreditacion_desempeno_fecha ? props.c_convocatorias.acreditacion_desempeno_fecha.split('T')[0] : '') : '',
        acreditacion_desempeno_vigencia: props.c_convocatorias ? (props.c_convocatorias.acreditacion_desempeno_vigencia ? props.c_convocatorias.acreditacion_desempeno_vigencia.split('T')[0] : '')  : '',

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
           
            convocatoria.value.nombre = empleado.primer_apellido + ' ' + empleado.segundo_apellido +' '+empleado.nombre;
            convocatoria.value.email = empleado.email;
            convocatoria.value.telefono = empleado.telefono;
            convocatoria.value.curp = empleado.curp;
            convocatoria.value.puesto_actual = empleado.puesto;
            convocatoria.value.puesto_solicitado = ObtenerPuestoSolicitado(empleado.puesto);

            convocatoria.value.fecha_ingreso = empleado.fecha_ingreso.split('T')[0];

            convocatoria.value.acreditacion_formacion = empleado.acreditacion_formacion ? 'APROBADO' : '--';
            convocatoria.value.acreditacion_formacion_fecha = empleado.acreditacion_formacion_fecha ? empleado.acreditacion_formacion_fecha.split('T')[0] : '';

            convocatoria.value.acreditacion_cuip = empleado.acreditacion_cuip;
            convocatoria.value.acreditacion_cuip_fecha = empleado.acreditacion_cuip_fecha.split('T')[0];

            convocatoria.value.acreditacion_cuip_vigencia = empleado.acreditacion_cuip_vigencia.split('T')[0];
            convocatoria.value.acreditacion_competencias = empleado.acreditacion_competencias ? 'APROBADO' : '--';
            convocatoria.value.acreditacion_competencias_fecha = empleado.acreditacion_competencias_fecha ? empleado.acreditacion_competencias_fecha.split('T')[0] : '';
            convocatoria.value.acreditacion_competencias_vigencia = empleado.acreditacion_competencias_vigencia ? empleado.acreditacion_competencias_vigencia.split('T')[0] : '';

            convocatoria.value.acreditacion_desempeno = empleado.acreditacion_desempeno ? 'APROBADO' : '--';
            convocatoria.value.acreditacion_desempeno_fecha = empleado.acreditacion_desempeno_fecha ? empleado.acreditacion_desempeno_fecha.split('T')[0] : '';
            convocatoria.value.acreditacion_desempeno_vigencia = empleado.acreditacion_desempeno_vigencia ? empleado.acreditacion_desempeno_vigencia.split('T')[0] : '';

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
            convocatoria.value.puesto_actual = '';
            convocatoria.value.puesto_solicitado = '';

            convocatoria.value.fecha_ingreso = '';
            convocatoria.value.acreditacion_formacion = '';
            convocatoria.value.acreditacion_formacion_fecha = '';
            convocatoria.value.acreditacion_cuip = '';
            convocatoria.value.acreditacion_cuip_fecha = '';
            convocatoria.value.acreditacion_cuip_vigencia = '';
            convocatoria.value.acreditacion_competencias = '';
            convocatoria.value.acreditacion_competencias_fecha = '';
            convocatoria.value.acreditacion_competencias_vigencia = '';
            convocatoria.value.acreditacion_desempeno = '';
            convocatoria.value.acreditacion_desempeno_fecha = '';
            convocatoria.value.acreditacion_desempeno_vigencia = '';
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
            'POLICIA TERCERO': 'POLICIA SEGUNDO',
            'POLICIA SEGUNDO': 'POLICIA PRIMERO',
            'POLICIA PRIMERO': 'SUBOFICIAL',
            'SUBOFICIAL': 'OFICIAL',
            'OFICIAL': 'TENIENTE',
            'TENIENTE': 'CAPITAN',
            'CAPITAN': 'MAYOR',
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