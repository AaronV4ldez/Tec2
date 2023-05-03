<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function register(){
        return view('users.register');
    }
    public function saveRegister(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255|min:3',
            'lastName'=>'required|max:255|min:3',
            'email'=>'required|email',
            'p1'=>'required|min:8|required_with:p2|same:p2',
            'p2'=>'required|min:8',
            'level'=>'required',
            'img_perfil'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        if($validator->fails()){
            dd($validator);
        }else{
            $user = new User();
            $user -> name = $request->name;
            $user -> last_name = $request->lastName;
            $user -> email = $request->email;
            $user -> password = Hash::make($request->p1);
            $user -> level = $request->level;
            $user -> save();
            if($user -> level == 'Docente'){
                $docente = new Docente();
                $docente -> id_user = $user->id;
                $docente -> img_perfil = 'default.jpg';
                $docente -> edad = null;
                $docente -> genero = null;
                $docente -> ultimo_grado_obtenido = null;
                $docente -> id_nombramiento = null;
                $docente -> perfil_prodep = null;
                $docente -> id_cuerpo_academico = null;
                $docente -> sni = null;
                $docente -> articulos_publicados = null;
                $docente -> perfil_deseable = null;
                $docente -> premios_recibidos = 0;
                $docente -> save();
                return view('inicio');
            }
        }
    }
    //Vista de docentes
    public function docentes(){
        $datos=\DB::table('users')
            ->select('users.*',
            'docentes.nivel_estudio','docentes.sni',
            'cuerpos_academicos.nombre as nombre_cuerpo_academico')
            ->where('level', '=', 'Docente')
            ->leftJoin('docentes','users.id','=','docentes.id_user')
            ->leftJoin('cuerpos_academicos','docentes.id_cuerpo_academico','=','cuerpos_academicos.id')
            ->get();
        /*return response()->json([
            'status'=>'success',
            'data'=>$datos
        ]);*/
        return view('admin.docentes')->with('users',$datos);
    }
}
