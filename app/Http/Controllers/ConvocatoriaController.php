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
        $convocatorias = Convocatoria::with('empleado')->with('user')->with('periodo')->where('periodo_id', $periodoActivoId)->get();
        

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
        $periodoActivoId = $this->getPeriodoActivoId();

         

        return inertia('Promociones/Convocatorias_captura', [
            'c_empleados' => $c_empleados,
            'l_periodoActivo' => $periodoActivoId,
           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar los datos recibidos
        $validated = $request->validate([
            'empleado_id' => 'required',
            'puesto_actual' => 'nullable|string',
            'periodo_id' => 'required|integer',
        ], [
            'empleado_id.required' => 'El empleado es obligatorio.',
            'puesto_actual.string' => 'El puesto actual debe ser texto.',          
            'periodo_id.required' => 'No has establecido un periodo activo para las convocatorias.',
        ]);

        //validar que este empleado no tenga ya una convocatoria en el periodo activo
        $existingConvocatoria = Convocatoria::where('empleado_id', $validated['empleado_id'])
            ->where('periodo_id', $validated['periodo_id'])
            ->first();

        if ($existingConvocatoria) {
            return back()->withErrors(['empleado_id' => 'Este empleado ya tiene una convocatoria en el periodo activo.']);
        }

        //crear el registro
        $convocatoria = new Convocatoria();
        $convocatoria->user_id = auth()->user()->id;
        $convocatoria->fecha = now();
        $convocatoria->empleado_id = $validated['empleado_id'];
        $convocatoria->puesto_actual = $validated['puesto_actual'];
        $convocatoria->puesto_solicitado = $request->input('puesto_solicitado');
        $convocatoria->observaciones = $request->input('observaciones');
        $convocatoria->periodo_id = $validated['periodo_id'];
        $convocatoria->save();
        return redirect()->route('convocatorias.index')->with('success', 'Convocatoria creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Convocatoria $convocatoria)
    {
        //
        $convocatorias = Convocatoria::all()->where('id', $convocatoria->id)->first();
        
         return inertia('Promociones/Convocatorias_captura', [
            'c_convocatorias' => $convocatorias,
        ]);
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
