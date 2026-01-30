 <template>
    <authenticated-layout>

        <main class="container mx-auto mt-4">
           

            <!-- captura de informacion de periodos -->
            <form 
                @submit.prevent="guardarPeriodo" 
                method="post" 
                class="max-w-lg bg-white p-4 rounded shadow mx-auto"
            >
                <!-- <input type="hidden" name="_method" :value="props.c_periodo.id ? 'PUT' : 'POST'" /> -->
                <div class="mb-2">          
                    <label for="nombre" class="block text-gray-700 font-bold mb-0">Nombre del Periodo:</label>
                    <input 
                        v-model="formulario.nombre" 
                        type="text" 
                        id="nombre" 
                        name="nombre" 
                        class="border border-gray-300 rounded px-4 py-2 w-full"
                        required
                    />  
                </div>
                <div class="mb-2">          
                    <label for="fecha_inicio" class="block text-gray-700 font-bold mb-0">Fecha de Inicio:</label>
                    <input 
                        v-model="formulario.fecha_inicio" 
                        type="date" 
                        id="fecha_inicio" 
                        name="fecha_inicio" 
                        class="border border-gray-300 rounded px-4 py-2 w-full"
                        required
                    />  
                </div>
                <div class="mb-2">          
                    <label for="fecha_fin" class="block text-gray-700 font-bold mb-0">Fecha de Fin:</label>
                    <input 
                        v-model="formulario.fecha_fin" 
                        type="date" 
                        id="fecha_fin" 
                        name="fecha_fin" 
                        class="border border-gray-300 rounded px-4 py-2 w-full"
                        required
                    />  
                </div>
                <div class="mb-2">          
                    <label for="descripcion" class="block text-gray-700 font-bold mb-0">Descripción:</label>
                    <textarea 
                        v-model="formulario.descripcion" 
                        id="descripcion" 
                        name="descripcion" 
                        class="border border-gray-300 rounded px-4 py-2 w-full"
                        rows="3"
                    ></textarea>  
                </div>      
                <div class="mb-2 flex items-center">
                    <input 
                        v-model="formulario.activo" 
                        type="checkbox" 
                        id="activo" 
                        name="activo" 
                        class="mr-2"
                    />
                    <label for="activo" class="text-gray-700 font-bold">Activo</label>
                    <div v-if="$page.props.errors.activo" class="mt-2 text-red-500 m-2 p-1 rounded bg-orange-50 text-center text-xs shadow-md">
                        {{ $page.props.errors.activo }}
                    </div>
                </div>
                <div class="text-end">
                     <div class="flex justify-between items-center mb-0">
                
                        <button @click="regresar_index" class="bg-slate-500 hover:bg-slate-700 text-white px-4 py-1  rounded">
                            Cancelar 
                        </button>

                        <button 
                        type="submit" 
                        class="bg-blue-800 hover:bg-blue-600 text-white px-4 py-1 rounded"
                        >
                            {{ c_periodo ? 'Actualizar Periodo' : 'Crear Periodo' }}
                        </button>
                    </div>
                   

                </div>
            </form>

            
        </main>

    </authenticated-layout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router } from '@inertiajs/vue3';
import { ref, h } from 'vue';   

const props = defineProps({
    c_periodo: {
        type: Object,
        default: null,
    },

}); 

const formulario = ref({
    nombre: props.c_periodo?.nombre || '',
    fecha_inicio: props.c_periodo?.fecha_inicio?.split('T')[0] || '',
        
    fecha_fin: props.c_periodo?.fecha_fin?.split('T')[0] || '',
    descripcion: props.c_periodo?.descripcion || '',
    activo: props.c_periodo?.activo || false,
});

const regresar_index = () => {
    //router.get('/periodos/create');
    router.visit(route('periodos.index'));
};

const guardarPeriodo = () => {
    if (props.c_periodo) {
        // Actualizar periodo existente
        router.put(route('periodos.update', props.c_periodo.id), formulario.value);
    } else {
        // Crear nuevo periodo
        router.post(route('periodos.store'), formulario.value);
    }
};

</script>