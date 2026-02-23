<template>
    <authenticated-layout>
         <template #header> 
            <div class="flex items-center justify-between _mb-2">
               <h1 class="text-2xl font-bold">Registro de participación</h1>
                <button @click="exportarExcel" class="px-2 py-2 text-sm text-white bg-green-700 rounded hover:bg-green-900">
                    <i class="fas fa-lg fa-file-excel "></i> Exportar a excel
                
                </button>

                <button @click="agregarRegistro" class="px-2 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 ">
                    + Agregar Registro...
                </button>
            </div>
        
        </template>
        <main class="container mx-auto mt-4">
           

            <!-- Búsqueda -->
            <div class="flex items-center justify-between mb-4">
                <input 
                    id="inputbusqueda"
                    v-model="globalFilter" 
                    type="text" 
                    placeholder="Buscar..." 
                    class="w-full max-w-sm px-4 py-2 border border-gray-300 rounded"
                />
                <select 
                    id="select_registros"
                    v-model="pageSize" 
                    class="py-2 text-sm border border-gray-300 rounded px-7"
                    @change="table.setPageSize(Number($event.target.value))"
                >
                    <option :value="10">mostrar 10 </option>
                    <option :value="20">mostrar 20 </option>
                    <option :value="50">mostrar 50 </option>
                    <option :value="100">mostrar 100 </option>
                </select>
            </div>

            <table class="w-full border-collapse table-auto">
                <thead class="text-white bg-slate-800">
                    <tr v-for="headerGroup in table.getHeaderGroups()" :key="headerGroup.id">
                        <th 
                            v-for="header in headerGroup.headers" 
                            :key="header.id"
                            class="px-4 py-1 text-sm border border-gray-300 cursor-pointer hover:bg-slate-700"
                            @click="header.column.getToggleSortingHandler()?.($event)"
                        >
                            <div class="flex items-center justify-between">
                                <FlexRender
                                    :render="header.column.columnDef.header"
                                    :props="header.getContext()"
                                />
                                <span v-if="header.column.getIsSorted()">
                                    {{ header.column.getIsSorted() === 'asc' ? '↑' : '↓' }}
                                </span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr 
                        v-for="(row, index) in table.getRowModel().rows" 
                        :key="row.id"
                        :class="{ 'bg-slate-200': index % 2 !== 0 }"
                    >
                        <td 
                            v-for="cell in row.getVisibleCells()" 
                            :key="cell.id"
                            class="border border-gray-300 px-2 py-0.5 text-[13px]"
                            :class="{ 'bg-yellow-50 text-red-500    ': row.original.cancelada }"
                        >
                            <FlexRender
                                :render="cell.column.columnDef.cell"
                                :props="cell.getContext()"
                            />
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="flex items-center justify-between mt-4">
                <div class="text-sm text-slate-800">
                    Mostrando {{ table.getState().pagination.pageIndex * table.getState().pagination.pageSize + 1 }} 
                    a {{ Math.min((table.getState().pagination.pageIndex + 1) * table.getState().pagination.pageSize, empleados.length) }} 
                    de {{ empleados.length }} empleados
                </div>
                
                <div class="flex gap-2">
                    <button 
                        @click="table.setPageIndex(0)"
                        :disabled="!table.getCanPreviousPage()"
                        class="px-3 py-1 border rounded bg-slate-200 hover:bg-slate-300 disabled:opacity-30 disabled:cursor-not-allowed"
                    >
                        ⏮ Primera
                    </button>
                    <button 
                        @click="table.previousPage()"
                        :disabled="!table.getCanPreviousPage()"
                        class="px-3 py-1 border rounded bg-slate-200 hover:bg-slate-300 disabled:opacity-30 disabled:cursor-not-allowed"
                    >
                        ← Anterior
                    </button>
                    
                    <span class="flex items-center px-3 py-1 text-sky-700">
                        Página {{ table.getState().pagination.pageIndex + 1 }} de {{ table.getPageCount() }}
                    </span>
                    
                    <button 
                        @click="table.nextPage()"
                        :disabled="!table.getCanNextPage()"
                        class="px-3 py-1 border rounded bg-slate-200 hover:bg-slate-300 disabled:opacity-30 disabled:cursor-not-allowed"
                    >
                        Siguiente →
                    </button>
                    <button 
                        @click="table.setPageIndex(table.getPageCount() - 1)"
                        :disabled="!table.getCanNextPage()"
                        class="px-3 py-1 border rounded bg-slate-200 hover:bg-slate-300 disabled:opacity-30 disabled:cursor-not-allowed"
                    >
                        Última ⏭
                    </button>
                </div>
            </div>
        </main>

        <!-- //nuevo modal de confirmacion de eliminacion -->
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
                    <h2 class="mb-4 text-xl font bold">Confirmar Cancelación</h2>
                    <p class="mb-4">Por favor, ingrese el motivo de la cancelación para el folio <strong>{{ convocatoriaAEliminar.id }}</strong>:</p>
                    <textarea
                        v-model="motivoCancelacion"
                        class="w-full px-3 py-2 mb-4 border border-gray-300 rounded"
                        rows="4"
                        placeholder="Motivo de cancelación"
                    ></textarea>
                    <div class="flex justify-end gap-2">
                        <button
                            @click="showModal = false"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
                        >
                            Cancelar
                        </button>
                        <button
                            @click="confirmarEliminacion"
                            class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700"
                        >
                            Confirmar Cancelación
                        </button>
                    </div>
                </div>
            </div>

            <!-- motivo de cancelacion -->
              <div v-if="showModal_cancelacion" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg">
                    <h2 class="mb-4 text-xl text-center font bold">Motivo Cancelación</h2>
                    <hr >
                    <textarea
                        v-model="mostrar_motivoCancelacion"
                        class="w-full px-3 py-2 mb-4 text-sm text-red-900 border-none rounded _border-gray-300"
                        rows="5"
                        placeholder="Motivo de cancelación"
                    ></textarea>
                    <div class="flex justify-end gap-2">
                        <button
                            @click="showModal_cancelacion = false"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
                        >
                            Cerrar 
                        </button>
                       
                    </div>
                </div>
            </div>


    </authenticated-layout>
</template>





<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router,usePage } from '@inertiajs/vue3';
import { ref, h,watch } from 'vue';




const showModal = ref(false);
const motivoCancelacion = ref('');
const convocatoriaAEliminar = ref(null);

const mostrar_motivoCancelacion = ref('');
const showModal_cancelacion = ref(false);

 import * as XLSX from 'xlsx';

import {
    useVueTable,
    FlexRender,
    getCoreRowModel,
    getSortedRowModel,
    getFilteredRowModel,
    getPaginationRowModel,
} from '@tanstack/vue-table';

const props = defineProps({
    empleados: Array 

});

/* para descargar pdf cuando venga desde la captura */
// Agregar este código para detectar el flash message y descargar el PDF
const page = usePage();

watch(() => page.props.flash?.descargarPdf, (id) => {
    if (id) {
        //window.location.href = route('convocatorias.pdf', id);
        window.open(route('convocatorias.pdf', id), '_blank');
    }
}, { immediate: true });


const globalFilter = ref('');
const pageSize = ref(20);

const columns = [
    //agregar el id de la convocatoria
    {
        accessorKey: 'id',
        header: 'Folio',
        cell: ({ row, getValue }) => h('span', {
            class: row.original.cancelada ? 'bg-red-500 text-white px-2 py-0.5 rounded' : 'bg-green-700 text-white px-2 py-0.5 rounded'
        }, getValue())
    },

    {
        accessorKey: 'fecha',
        header: 'Fecha Registro',
        cell: ({ row }) => h('input', {
            type: 'date',
            value: row.original.fecha,
            class: 'border-0 outline-none bg-transparent w-full p-0 text-xs _text-slate-500',
            readonly: true
        })
    },
    {
        accessorKey: 'periodo.nombre',
        header: 'Convocatoria',
        cell: ({ getValue }) => h('span', {
            class: 'text-sky-600'
        }, getValue())
    },
    {
        accessorKey: 'empleado.num_empleado',
        header: '# Emp.',
    },
    {
        id: 'nombre_completo',
        header: 'Nombre Completo',
        accessorFn: (row) => `${row.empleado.nombre_completo}`,
    },
    {
        accessorKey: 'puesto_solicitado',
        header: 'Grado al que Aspira',
    },
    {
        accessorKey: 'empleado.telefono',
        header: 'Teléfono',
    },
     {
        accessorKey: 'user.name',
        header: 'Capturista',
         cell: ({ getValue }) => h('span', {
            class: ' text-xs lowercase'
        }, getValue())
    },
    {
        id: 'acciones',
        header: 'Acciones',
        cell: ({ row }) => {
            if (row.original.cancelada) {
                return h(
                    'div',
                    { class: 'flex flex-col items-center gap-2 ' },
                    [
                       
                        h(
                            'button',
                            {
                                class: 'bg-gray-900 text-yellow-100 px-2 py-0 rounded hover:bg-gray-700 text-xs',
                                onClick: () => f_showmodalcancelacion(` ${row.original.motivo_cancelacion || 'No especificado'}`)
                            },
                            'Ver Motivo'
                        )
                    ]
                );
            }
            return h(
                'div',
                { class: 'flex items-center justify-center gap-2' },
                [
                    h('button',
                        {
                            class: '',
                            onClick: () => editarConvocatoria(row.original),
                            title: 'Editar empleado'
                        },
                        h('i', { class: 'fas fa-lg fa-edit text-sky-700 hover:text-sky-600' })
                    ),
                    h('button',
                        {
                            class: '',
                            onClick: () => imprimirConvocatoria(row.original),
                            title: 'Imprimir Registro'
                        },
                        h('i', { class: 'fas fa-lg fa-print text-emerald-800 hover:text-emerald-600' })
                    ),
                    ...(page.props.auth.user.tipo_usuario === 'administrador' || page.props.auth.user.tipo_usuario === 'supervisor'
                        ? [h('button',
                            {
                                class: '',
                                onClick: () => eliminaConvocatoria(row.original),
                                title: 'Eliminar'
                            },
                            h('i', { class: 'fas fa-lg fa-trash-alt text-red-600 hover:text-red-400' })
                        )]
                        : []
                    ),
                ]
            );
        },
    },
];

function editarConvocatoria(convocatoria) {
    //console.log('Editar convocatoria:', convocatoria);
    router.visit(route('convocatorias.edit', convocatoria.id));
}

function imprimirConvocatoria(convocatoria) {
    //console.log('Imprimir convocatoria:', convocatoria);
    window.open(route('convocatorias.pdf', convocatoria.id), '_blank');
}

function f_showmodalcancelacion(motivo) {
    mostrar_motivoCancelacion.value = motivo;
    showModal_cancelacion.value = true;
}


const table = useVueTable({
    data: props.empleados,
    columns,
    getCoreRowModel: getCoreRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    getPaginationRowModel: getPaginationRowModel(),
    initialState: {
        pagination: {
            pageSize: 20,
        },
    },
    state: {
        get globalFilter() {
            return globalFilter.value;
        },
    },
    onGlobalFilterChange: (updater) => {
        globalFilter.value = typeof updater === 'function' ? updater(globalFilter.value) : updater;
    },
});

function agregarRegistro() {
    router.visit(route('convocatorias.create'));
}


//nuevo
function eliminaConvocatoria(convocatoria) {
    convocatoriaAEliminar.value = convocatoria;
    motivoCancelacion.value = '';
    showModal.value = true;
}

    function confirmarEliminacion() {
        if (!motivoCancelacion.value.trim()) {
            alert('Por favor, ingrese un motivo de cancelación.');
            return;
        }

        const payload = {
            motivo: motivoCancelacion.value,
        };

        router.delete(route('convocatorias.destroy', convocatoriaAEliminar.value.id), {
            data: payload,
            onSuccess: () => {
                router.get(route('convocatorias.index'));
                showModal.value = false;
            },
        });
    }


   

    const exportarExcel = () => {


        const formatearFecha = (fecha) => {
            if (!fecha) return '';
           
            const dia = fecha.substring(8, 10);
            const mes = fecha.substring(5, 7);
            const anio = fecha.substring(0, 4);
            return `${dia}/${mes}/${anio}`;
        };
        // Extraer los datos de empleados
        const data = props.empleados.map(emp => ({
            'Folio': emp.id,
            'Fecha Registro': formatearFecha(emp.fecha.split('T')[0]), // Tomar solo la fecha
            'Estatus': emp.cancelada ? 'CANCELADA' : 'ACTIVA',
            'Motivo de Cancelacion': emp.motivo_cancelacion || '',
            'Convocatoria': emp.periodo?.nombre || '',
            '# Emp.': emp.empleado?.num_empleado || '',
            'Nombre Completo': emp.empleado?.nombre_completo || '',
            'Grado Actual': emp.puesto_actual || '',
            'Grado al que Aspira': emp.puesto_solicitado || '',
            'Teléfono': emp.empleado?.telefono || '',
            'Capturista': emp.user?.name || '',
           
            // 'Vigencia CUP': emp.acreditacion_cup_vigencia.split('T')[0],
            // 'Vigencia CB': emp.acreditacion_competencias_vigencia.split('T')[0],
            // 'Vigencia Ev. Desemp.': emp.acreditacion_desempeno_vigencia?.split('T')[0],
            // 'Vigencia C3': emp.acreditacion_c3_vigencia.split('T')[0],
            'Vigencia CUP': formatearFecha(emp.acreditacion_cup_vigencia.split('T')[0]),
            'Vigencia CB': formatearFecha(emp.acreditacion_competencias_vigencia.split('T')[0]),
            'Vigencia Ev. Desemp.': formatearFecha(emp.acreditacion_desempeno_vigencia?.split('T')[0]),
            'Vigencia C3': formatearFecha(emp.acreditacion_c3_vigencia.split('T')[0]),
            
        }));
      

        // Crear hoja y libro
        const worksheet = XLSX.utils.json_to_sheet(data);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Convocatorias');

        // Descargar archivo
        XLSX.writeFile(workbook, 'convocatorias.xlsx');
    };

</script>