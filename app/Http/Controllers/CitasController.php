<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita; 
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $citas = Cita::all();
         
        return view('citas.citas',['citas' => $citas, 'medicos' => $medicos, 'pacientes' => $pacientes]);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (!Auth::check()){
            return back()->withErrors('Error', 'No tienes permiso para realizar esta acción.');
        }
        $request->validate([
            'medico_id' => 'required',
            'paciente_id' => 'required',
            'motivo' => 'required',
            'fecha_cita' => 'required',
        ]);

        $citas = new Cita;
        $citas->medico_id = $request->medico_id;
        $citas->paciente_id = $request->paciente_id;
        $citas->motivo = $request->motivo;
        $citas->fecha_cita = $request->fecha_cita;
        $citas->save();

        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if (!Auth::check()){
            return back()->withErrors('No tienes permiso para ver esta sección.');
        }
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $cita = Cita::find($id);
         
        return view('citas.edit',['cita' => $cita, 'medicos' => $medicos, 'pacientes' => $pacientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::check()){
            return back()->withErrors('No tienes permiso para realizar esta acción.');
        }
        $request->validate([
            'medico_id' => 'required',
            'paciente_id' => 'required',
            'motivo' => 'required',
            'fecha_cita' => 'required',
        ]);

        $cita = Cita::find($id);
        $cita->medico_id = $request->medico_id;
        $cita->paciente_id = $request->paciente_id;
        $cita->motivo = $request->motivo;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->update();

        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if (!Auth::check()){
            return back()->withErrors('No tienes permiso para realizar esta acción.');
        }
        $citas = Cita::destroy($id);

        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente');
    }
}
