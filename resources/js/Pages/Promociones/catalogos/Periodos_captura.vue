 <template>
    <authenticated-layout>
{{ c_periodo }}
        <main class="container mx-auto mt-4">
            <div class="flex justify-between items-center mb-2">
                <h1 class="font-bold text-2xl">Periodos</h1>
                <button @click="regresar_index" class="bg-slate-500 hover:bg-slate-700 text-white px-2 py-2 text-sm rounded">
                    <-  Regresar 
                </button>
            </div>

            <!-- captura de informacion de periodos -->
            <form 
                @submit.prevent="guardarPeriodo" 
                method="post" 
                class="max-w-lg bg-white p-6 rounded shadow"
            >
                <input type="hidden" name="_method" :value="props.c_periodo.id ? 'PUT' : 'POST'" />
                <div class="mb-4">          
                    <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre del Periodo:</label>
                    <input 
                        v-model="formulario.nombre" 
                        type="text" 
                        id="nombre" 
                        name="nombre" 
                        class="border border-gray-300 rounded px-4 py-2 w-full"
                        required
                    />  
                </div>
                <div class="mb-4">          
                    <label for="fecha_inicio" class="block text-gray-700 font-bold mb-2">Fecha de Inicio:</label>
                    <input 
                        v-model="formulario.fecha_inicio" 
                        type="date" 
                        id="fecha_inicio" 
                        name="fecha_inicio" 
                        class="border border-gray-300 rounded px-4 py-2 w-full"
                        required
                    />  
                </div>
                <div class="mb-4">          
                    <label for="fecha_fin" class="block text-gray-700 font-bold mb- 2">Fecha de Fin:</label>
                    <input 
                        v-model="formulario.fecha_fin" 
                        type="date" 
                        id="fecha_fin" 
                        name="fecha_fin" 
                        class="border border-gray-300 rounded px-4 py-2 w-full"
                        required
                    />  
                </div>
                <div class="mb-4">          
                    <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                    <textarea 
                        v-model="formulario.descripcion" 
                        id="descripcion" 
                        name="descripcion" 
                        class="border border-gray-300 rounded px-4 py-2 w-full"
                        rows="4"
                    ></textarea>  
                </div>      
                <div class="mb-4 flex items-center">
                    <input 
                        v-model="formulario.activo" 
                        type="checkbox" 
                        id="activo" 
                        name="activo" 
                        class="mr-2"
                    />
                    <label for="activo" class="text-gray-700 font-bold">Activo</label>
                </div>
                <div>
                    <button 
                        type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded"
                    >
                        {{ props.c_periodo.id ? 'Actualizar Periodo' : 'Crear Periodo' }}
                    </button>
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
        fecha_inicio: props.c_periodo?.fecha_inicio?.split(' ')[0] || '',
        fecha_fin: props.c_periodo?.fecha_fin?.split(' ')[0] || '',
    descripcion: props.c_periodo?.descripcion || '',
    activo: props.c_periodo?.activo || false,
});

const regresar_index = () => {
    //router.get('/periodos/create');
    router.visit(route('periodos.index'));
};

const guardarPeriodo = () => {
    if (props.c_periodo.id) {
        // Actualizar periodo existente
        router.put(route('periodos.update', props.c_periodo.id), formulario.value);
    } else {
        // Crear nuevo periodo
        router.post(route('periodos.store'), formulario.value);
    }
};

</script>