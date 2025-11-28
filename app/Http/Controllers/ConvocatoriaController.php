<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use App\Models\Periodo;
use App\Models\Empleado;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $periodoActivoId = $this->getPeriodoActivoId();
        $convocatorias = Convocatoria::all()->where('periodo_id', $periodoActivoId);
        

        return inertia('Promociones/Convocatorias', [
            'empleados' => $convocatorias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $c_empleados = Empleado::all();
        return inertia('Promociones/Convocatorias_captura', [
            'c_empleados' => $c_empleados,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Convocatoria $convocatoria)
    {
        //
    }

    private function getPeriodoActivoId()
    {
        $periodoActivo = Periodo::where('activo', true)->first();
        return $periodoActivo ? $periodoActivo->id : null;
    }
}
