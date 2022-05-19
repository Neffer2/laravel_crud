<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Cita;

class PanelPrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $citas = Cita::all();

        return view('main_panel.index',['medicos' => $medicos, 'pacientes' => $pacientes, 'citas' => $citas]);
    }
} 
