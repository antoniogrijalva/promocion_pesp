<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use App\Models\Periodo;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;
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
            'fecha' => 'nullable|date',
            
        ], [
            'empleado_id.required' => 'El empleado es obligatorio.',
            'puesto_actual.string' => 'El puesto actual debe ser texto.',          
            'periodo_id.required' => 'No has establecido un periodo activo para las convocatorias.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
        ]);

        //validar que este empleado no tenga ya una convocatoria en el periodo activo
        $existingConvocatoria = Convocatoria::where('empleado_id', $validated['empleado_id'])
            ->where('periodo_id', $validated['periodo_id'] )->where('cancelada', false)
            ->first();

        if ($existingConvocatoria) {
            return back()->withErrors(['empleado_id' => 'Este empleado ya tiene una convocatoria en el periodo activo.']);
        }

        //crear el registro
        $convocatoria = new Convocatoria();
        $convocatoria->user_id = auth()->user()->id;
        $convocatoria->fecha = $validated['fecha'];
        $convocatoria->empleado_id = $validated['empleado_id'];
        $convocatoria->puesto_actual = $validated['puesto_actual'];
        $convocatoria->puesto_solicitado = $request->input('puesto_solicitado');
        $convocatoria->observaciones = $request->input('observaciones');
        $convocatoria->periodo_id = $validated['periodo_id'];

        $convocatoria->acreditacion_formacion = $request->input('acreditacion_formacion') === 'APROBADO' ? true : false;
        $convocatoria->acreditacion_formacion_fecha = $request->input('acreditacion_formacion_fecha');

        $convocatoria->acreditacion_cup = $request->input('acreditacion_cup');
        $convocatoria->acreditacion_cup_fecha = $request->input('acreditacion_cup_fecha');       
        $convocatoria->acreditacion_cup_vigencia = $request->input('acreditacion_cup_vigencia');

        $convocatoria->acreditacion_competencias = $request->input('acreditacion_competencias') === 'APROBADO' ? true : false;
        $convocatoria->acreditacion_competencias_fecha = $request->input('acreditacion_competencias_fecha');
        $convocatoria->acreditacion_competencias_vigencia = $request->input('acreditacion_competencias_vigencia');
        $convocatoria->acreditacion_competencias_calificacion = $request->input('acreditacion_competencias_calificacion');

        $convocatoria->acreditacion_c3 = $request->input('acreditacion_c3') === 'APROBADO' ? true : false;
        $convocatoria->acreditacion_c3_fecha = $request->input('acreditacion_c3_fecha');
        $convocatoria->acreditacion_c3_vigencia = $request->input('acreditacion_c3_vigencia');

        $convocatoria->acreditacion_desempeno = $request->input('acreditacion_desempeno') === 'APROBADO' ? true : false;
        $convocatoria->acreditacion_desempeno_fecha = $request->input('acreditacion_desempeno_fecha');
        $convocatoria->acreditacion_desempeno_vigencia = $request->input('acreditacion_desempeno_vigencia');
        $convocatoria->acreditacion_desempeno_calificacion = $request->input('acreditacion_desempeno_calificacion');

        $convocatoria->save();
        return redirect()->route('convocatorias.index')->with('success', 'Convocatoria creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Convocatoria $convocatoria)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Convocatoria $convocatoria)
    {
        
        $convocatorias = Convocatoria::with('user')->with('empleado')->where('id', $convocatoria->id)->first();
        
         return inertia('Promociones/Convocatorias_captura', [
            'c_convocatorias' => $convocatorias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Convocatoria $convocatoria)
    {
         $validated = $request->validate([
          
            'fecha' => 'nullable|date',
            
        ], [
           
            'fecha.date' => 'La fecha debe ser una fecha válida.',
        ]);

        $convocatoria->fecha = $validated['fecha'];
        $convocatoria->observaciones = $request->input('observaciones');
        $convocatoria->save();
        return redirect()->route('convocatorias.index')->with('success', 'Convocatoria actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Convocatoria $convocatoria)
    {
        //elimina la convocatoria
       // $convocatoria->delete();
       
       //cambiar el estado a cancelada
       
       $convocatoria->cancelada = true;
       $convocatoria->fecha_cancelacion = now();
       $convocatoria->motivo_cancelacion = 'Cancelada por el usuario: ' . auth()->user()->name;
       $convocatoria->save();
        return redirect()->route('convocatorias.index')->with('success', 'Convocatoria cancelada exitosamente.');

        
        
    }

    private function getPeriodoActivoId()
    {
        $periodoActivo = Periodo::where('activo', true)->first();
        return $periodoActivo ? $periodoActivo->id : null;
    }

    /**
     * Genera un PDF de ejemplo con domPDF.
     */
    public function generarPDF($id_convocatoria)
    {

        $convocatorias = Convocatoria::with('user')->with('empleado')->with('periodo')->where('id', $id_convocatoria)->first();
        $data = [
            'titulo' => 'Reporte de Convocatorias',
            'convocatorias' => $convocatorias,
        ];

        //dd( $data );
        $pdf = Pdf::loadView('pdf.convocatoria_descarga', $data);
        return $pdf->download('convocatorias.pdf');
    }
}
