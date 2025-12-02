<template>
    <authenticated-layout>
        <main class="container mx-auto mt-4">
            <div class="flex justify-between items-center mb-2">
                <h1 class="font-bold text-2xl">Registro de participación</h1>
                <button @click="agregarRegistro" class="bg-green-700 hover:bg-green-900 text-white px-2 py-2 text-sm rounded">
                    + Agregar Registro
                </button>
            </div>

            <!-- Búsqueda -->
            <div class="mb-4 flex justify-between items-center">
                <input 
                    id="inputbusqueda"
                    v-model="globalFilter" 
                    type="text" 
                    placeholder="Buscar..." 
                    class="border border-gray-300 rounded px-4 py-2 w-full max-w-sm"
                />
                <select 
                    id="select_registros"
                    v-model="pageSize" 
                    class="border border-gray-300 rounded px-7 text-sm py-2"
                    @change="table.setPageSize(Number($event.target.value))"
                >
                    <option :value="10">mostrar 10 </option>
                    <option :value="20">mostrar 20 </option>
                    <option :value="50">mostrar 50 </option>
                    <option :value="100">mostrar 100 </option>
                </select>
            </div>

            <table class="table-auto w-full border-collapse">
                <thead class="bg-slate-800 text-white">
                    <tr v-for="headerGroup in table.getHeaderGroups()" :key="headerGroup.id">
                        <th 
                            v-for="header in headerGroup.headers" 
                            :key="header.id"
                            class="border border-gray-300 px-4 py-1 cursor-pointer hover:bg-slate-700 text-sm"
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
            <div class="mt-4 flex items-center justify-between">
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
                    
                    <span class="px-3 py-1 flex items-center text-sky-700">
                        Página {{ table.getState().pagination.pageIndex + 1 }} de {{ table.getPageCount() }}
                    </span>
                    
                    <button 
                        @click="table.nextPage()"
                        :disabled="!table.getCanNextPage()"
                        class="px-3 py-1 border bg-slate-200 hover:bg-slate-300 rounded disabled:opacity-30 disabled:cursor-not-allowed"
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
    </authenticated-layout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router } from '@inertiajs/vue3';
import { ref, h } from 'vue';
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

const globalFilter = ref('');
const pageSize = ref(10);

const columns = [
    {
        accessorKey: 'fecha',
        header: 'Fecha Registro',
        cell: ({ row }) => h('input', {
            type: 'date',
            value: row.original.fecha,
            class: 'border-0 outline-none bg-transparent w-full p-0 text-xs text-slate-500',
            readonly: true
        })
    },
    {
        accessorKey: 'periodo.nombre',
        header: 'Convocatoria',
        cell: ({ getValue }) => h('span', {
            class: 'text-blue-700'
        }, getValue())
    },
    {
        accessorKey: 'empleado.num_empleado',
        header: '# Emp.',
    },
    {
        id: 'nombre_completo',
        header: 'Nombre Completo',
        accessorFn: (row) => `${row.empleado.primer_apellido} ${row.empleado.segundo_apellido} ${row.empleado.nombre}`,
    },
    {
        accessorKey: 'puesto_solicitado',
        header: 'Puesto al que aspira',
    },
    {
        accessorKey: 'empleado.telefono',
        header: 'Teléfono',
    },
     {
        accessorKey: 'user.name',
        header: 'Capturista',
         cell: ({ getValue }) => h('span', {
            class: 'text-blue-700 text-xs lowercase'
        }, getValue())
    },
    {
        id: 'acciones',
        header: 'Acciones',
        cell: ({ row }) => h(
            'div',
            { class: 'flex gap-2' },
            [
                
                h('button',
                    {
                        class: 'bg-yellow-500 text-white px-2 _py-1 rounded hover:bg-yellow-600',
                        onClick: () => editarConvocatoria(row.original),
                        title: 'Editar empleado'
                    },
                    h('i', { class: 'fas fa-sm fa-edit' })
                ),
                 h('button',
                    {
                        class: 'bg-green-600 text-white px-2 _py-1 rounded hover:bg-green-700',
                        onClick: () => imprimirConvocatoria(row.original),
                        title: 'Imprimir Registro'
                    },
                    h('i', { class: 'fas fa-sm fa-print' })
                ) ,
                h('button',
                    {
                        class: 'bg-red-800 text-white px-2 _py-1 rounded hover:bg-red-600',
                        onClick: () => eliminaConvocatoria(row.original),
                        title: 'Eliminar'
                    },
                    h('i', { class: 'fas fa-sm fa-trash' })
                ),
            ]
        ),
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


const table = useVueTable({
    data: props.empleados,
    columns,
    getCoreRowModel: getCoreRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    getPaginationRowModel: getPaginationRowModel(),
    initialState: {
        pagination: {
            pageSize: 10,
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

function eliminaConvocatoria(convocatoria) {
    //console.log('Eliminar convocatoria:', convocatoria);
    // Lógica para eliminar

    if (confirm('¿Está seguro de que desea eliminar este registro?')) {
        router.delete(route('convocatorias.destroy', convocatoria.id));
        router.get(route('convocatorias.index') );
    }
}
</script>