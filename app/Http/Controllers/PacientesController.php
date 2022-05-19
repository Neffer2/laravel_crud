<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paciente;
use Illuminate\Support\Facades\Auth;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pacientes = paciente::all();
        return view('pacientes.pacientes', ['pacientes' => $pacientes]);
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
            return back()->withErrors('No tienes permiso para realizar esta acción.');
        }

        $request->validate([
            'nombre' => 'bail|required|min:2',
            'email' => 'bail|required|unique:pacientes|email',
            'documento' => 'bail|required|unique:pacientes',
            'fecha_nacimiento' => 'required'],
        );

        $paciente = new paciente;
        $paciente->nombre = $request->nombre;
        $paciente->email = $request->email;
        $paciente->documento = $request->documento;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->save();

        return redirect()->route('pacientes.index')->with('success' , 'Paciente creado exitosamente.');
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

        $pacientes = paciente::find($id);
        return view('pacientes.edit', ['paciente' => $pacientes]);
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
        $pacientes = paciente::find($id);
        $request->validate([
            'nombre' => 'required|min:2',
            'email' => 'required|email',
            'documento' => 'required',
            'fecha_nacimiento' => 'required'],
        );        

        $pacientes->nombre = $request->nombre;
        $pacientes->email = $request->email;
        $pacientes->documento = $request->documento;
        $pacientes->fecha_nacimiento = $request->fecha_nacimiento;
        $pacientes->update();

        return redirect()->route('pacientes.index')->with('success', 'Paciente editado exitosamente');
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
        $pacientes = new paciente;
        $pacientes::destroy($id);

        return redirect()->route('pacientes.index')->with('success', 'Paciente elimnado exitosamente.');
    }
}
