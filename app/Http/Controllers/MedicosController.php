<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
 use Illuminate\Support\Facades\Auth;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.medicos', ['medicos' => $medicos]);
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
            return back()->withErrors('No tienes permiso de realizar esta acción.');
        }
        $request->validate([
            'nombre' => 'bail|required|min:2',
            'documento' => 'bail|required|unique:medicos',
            'especialidad' => 'bail|required',
            'experiencia' => 'required'],
        );    

        $medicos = new Medico;
        $medicos->nombre = $request->nombre;
        $medicos->documento = $request->documento;
        $medicos->especialidad = $request->especialidad;
        $medicos->experiencia = $request->experiencia;
        $medicos->save();

        return redirect()->route('medicos.index')->with('success', 'Medico creado exitosamente');
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
        $medico = medico::find($id);
        return view('medicos.edit', ['medico' => $medico]);
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
            return back()->withErrors('No tienes permiso de realizar esta acción.');
        }
        $request->validate([
            'nombre' => 'bail|required|min:2',
            'documento' => 'bail|required',
            'especialidad' => 'bail|required',
            'experiencia' => 'required',
        ]);

        $medico = medico::find($id);
        $medico->nombre = $request->nombre;
        $medico->documento = $request->documento;
        $medico->especialidad = $request->especialidad;
        $medico->experiencia = $request->experiencia;
        $medico->update();

      return redirect()->route('medicos.index')->with('success', 'Medico editado exitosamente');
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
            return back()->withErrors('No tienes permiso de realizar esta acción.');
        }
        $medicos = Medico::destroy($id);
        return redirect()->route('medicos.index')->with('success', 'Medico eliminado exitosamente.');
    }
}
