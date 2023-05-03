<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function crear(){
        if(Auth::user()->level == "Alumno"){return redirect('/inicio');}
        return view('admin.proyectos.nuevoProyecto');
    }
    public function documentacion(){
        return view('admin.proyectos.documentacionProyecto');
    }
    public function consulta(){
        return view('admin.proyectos.proyectos');
    }
    public function admin(){
        if(Auth::user()->level != "Administrador"){return redirect('/inicio');}
        return view('admin.proyectos.adminProyectos');
    }
}
