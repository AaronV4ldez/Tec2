<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Carrera;
use App\Models\Cuerpos_academico;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //Hace que sea necesario iniciar sesion para todas estas consultas
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Traer todos los datos para administrar
    public function index(){
        if(Auth::user()->level != "Admin"){return redirect('/inicio');}
        $datos=DB::table('users')->select('users.*')->get();
        $total_usuarios=DB::table('users')->select('users.*')->get()->count();
        $cuerpos =DB::table('cuerpos_academicos')->select('cuerpos_academicos.*')->get();
        $total_cuerpos =DB::table('cuerpos_academicos')->select('cuerpos_academicos.*')->get()->count();
        $carreras =DB::table('carreras')->select('carreras.*')->get();
        $total_carreras =DB::table('carreras')->select('carreras.*')->get()->count();
        $docentes_por_cuerpo = Docente::where('id_cuerpo_academico',20)->get();
        
        $arr[] = [
            'total_usuarios'=>$total_usuarios,
            'datos_usuarios'=>$datos,
            'total_cuerpos'=>$total_cuerpos,
            'cuerpos_academicos'=>$cuerpos,
            'total_carreras' =>$total_carreras,
            'carreras' =>$carreras,
            'docentes_por_cuerpo' =>$docentes_por_cuerpo
        ];
        /*return response()->json([
            'status'=>'success',
            'data'=>$arr
        ]);*/
        return view('admin.administracion')->with('datos',$arr);
    }

    //Crear usuario
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'nombre'=>'required|max:255|min:3',
            'apellido'=>'required|max:255|min:3',
            'email'=>'required|email',
            'password'=>'required|min:4',
            'level'=>'required'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorInsert','Favor de llenar todos los campos')
                ->withErrors($validator);
        }else{
            $user = new User();
            $user -> nombre = $request->nombre;
            $user -> apellido = $request->apellido;
            $user -> email = $request->email;
            $user -> password = Hash::make($request->password);
            $user -> level = $request->level;
            if($request -> level == 'Docente'){
                $user -> img = 'default.jpg';
            }
            if($request -> level == 'Admin'){
                $user -> img = 'defaultAdmin.png';
            }
            $user -> save();
            if($user -> level == 'Docente'){
                $docente = new Docente();
                $docente -> id_user = $user->id;
                $docente -> id_cuerpo_academico = null;
                $docente -> id_adscripcion = null;
                $docente -> orcid = null;
                $docente -> edad = null;
                $docente -> genero = null;
                $docente -> nivel_estudio = null;
                $docente -> sni = null;
                $docente -> perfil_deseable = null;
                $docente -> save();
                return back()->with('Listo', 'Se ha creado correctamente el docente');
            }else if($user -> level == 'Admin'){
                $admin = new Admin();
                $admin -> id_user = $user->id;
                $admin -> save();
                return back()->with('Listo', 'Se ha creado correctamente el admin');
            }
        }
    }

    //Actualizar contraseña
    public function update(Request $request){
        $validator=Validator::make($request->all(),[
            'password'=>'required|min:4'
        ]);  
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorEdit','Favor de llenar todos los campos')
                ->withErrors($validator);
        }else{
            $user = User::find($request->id);
            $user -> password = Hash::make($request->password);
            $user->save();
            return back()->with('Actualizar', 'Se ha actualizado la contraseña correctamente');
        }
    }

    //Borrar usuario
    public function destroy($id){
        $user = User::find($id);
        $iddocente = DB::table('docentes')->where('id_user', $id)->value('id');
        $idadmin  = DB::table('admins')->where('id_user', $id)->value('id');
        $total_administradores = DB::table('users')->where('level', 'Admin')->get()->count();
        $docente = Docente::find($iddocente);
        $admin = Admin::find($idadmin);
        if($total_administradores > 1){
            if(File::exists(public_path('img/users/'.$user->img)) && $user->img!='default.jpg' && $user->img!='defaultAdmin.png'){
                unlink(public_path('img/users/'.$user->img));
            }
            if($iddocente!=null){
                $docente->delete();
                $user->delete();
                return back()->with('Borrar', 'Se ha borrado correctamente el docente');
            }
            if($idadmin!=null){
                $admin->delete();
                $user->delete();
                return back()->with('Borrar', 'Se ha borrado correctamente el admin');
            }
        }else{
            return back()->with('Borrar', 'No se puede eliminar a todos los administradores');
        }
    }

    //Agregar cuerpo academico
    public function addCuerpo(Request $request){
        $validator=Validator::make($request->all(),[
            'nombre'=>'required|max:255|min:3'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorInsertCuerpo','Favor de llenar todos los campos')
                ->withErrors($validator);
        }else{
            $cuerpo = new Cuerpos_academico();
            $cuerpo -> nombre = $request->nombre;
            $cuerpo -> save();
            return back()->with('Listo', 'Se ha creado correctamente el cuerpo academico');
        }
    }

    //Eliminar cuerpo academico
    public function destroyCuerpo($id){
        $cuerpo = Cuerpos_academico::find($id);
        $total_docentes = Docente::where('id_cuerpo_academico',$id)->get()->count();
        $docentes_por_cuerpo = Docente::where('id_cuerpo_academico',$id)->get();
        for($cont=0; $cont<$total_docentes; ++$cont){
            $docente = Docente::find($docentes_por_cuerpo[$cont]['id']);
            $docente->id_cuerpo_academico = null;
            $docente->save();
        }
        $cuerpo->delete();
        return back()->with('Borrar', 'Se ha borrado correctamente el cuerpo academico');
    }

    //Agregar carrera
    public function addCarrera(Request $request){
        $validator=Validator::make($request->all(),[
            'nombre'=>'required|max:255|min:3'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorInsertCarrera','Favor de llenar todos los campos')
                ->withErrors($validator);
        }else{
            $carrera = new Carrera();
            $carrera -> nombre = $request->nombre;
            $carrera -> save();
            return back()->with('Listo', 'Se ha creado correctamente la carrera');
        }
    }

    //Eliminar Carrera 
    public function destroyCarrera($id){
        $carrera = Carrera::find($id);
        $total_docentes = Docente::where('id_adscripcion',$id)->get()->count();
        $docentes_por_carreras= Docente::where('id_adscripcion',$id)->get();
        for($cont=0; $cont<$total_docentes; ++$cont){
            $docente = Docente::find($docentes_por_carreras[$cont]['id']);
            $docente->id_adscripcion = null;
            $docente->save();
        }
        $carrera->delete();
        return back()->with('Borrar', 'Se ha borrado correctamente la carrera');
    }
}
