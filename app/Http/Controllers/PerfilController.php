<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Lineas_de_investigacione;
use App\Models\Produccion_investigacione;
use App\Models\Proyectos_investigadore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Image;

class PerfilController extends Controller
{
    public function index($id){
        $datos=\DB::table('users')
            ->select('users.*',
            'docentes.id as id_docente','docentes.id_user','docentes.id_cuerpo_academico','docentes.edad','docentes.genero','docentes.nivel_estudio','docentes.sni','docentes.perfil_deseable','docentes.id_adscripcion','docentes.orcid',
            'cuerpos_academicos.nombre as nombre_cuerpo_academico',
            'carreras.nombre as nombre_adscripcion')
            ->where('users.id', '=', $id)
            ->leftJoin('docentes','users.id','=','docentes.id_user')
            ->leftJoin('cuerpos_academicos','docentes.id_cuerpo_academico','=','cuerpos_academicos.id')
            ->leftJoin('carreras','docentes.id_adscripcion','=','carreras.id')
            ->get();
            $arr = [];
        foreach($datos as $d){
            $investigaciones = Proyectos_investigadore::where('id_docente',$d->id_docente)->get();
            $total_investigaciones = Proyectos_investigadore::where('id_docente',$d->id_docente)->get()->count();
            $lineas_de_investigaciones = Lineas_de_investigacione::where('id_docente',$d->id_docente)->get();
            $total_lineas_de_investigaciones = Lineas_de_investigacione::where('id_docente',$d->id_docente)->get()->count();

            $total_articulos = Produccion_investigacione::where('id_docente',$d->id_docente)->where('tipo','Articulo')->get()->count();
            $articulos = Produccion_investigacione::where('id_docente',$d->id_docente)->where('tipo','Articulo')->orderBy('fecha')->get();
            $total_libros = Produccion_investigacione::where('id_docente',$d->id_docente)->where('tipo','Libro')->get()->count();
            $libros = Produccion_investigacione::where('id_docente',$d->id_docente)->where('tipo','Libro')->orderBy('fecha')->get();
            $total_patentes = Produccion_investigacione::where('id_docente',$d->id_docente)->where('tipo','Patente')->get()->count();
            $patentes = Produccion_investigacione::where('id_docente',$d->id_docente)->where('tipo','Patente')->orderBy('fecha')->get();
            $total_otros = Produccion_investigacione::where('id_docente',$d->id_docente)->where('tipo','Otro')->get()->count();
            $otros = Produccion_investigacione::where('id_docente',$d->id_docente)->where('tipo','Otro')->orderBy('fecha')->get();
            $arr[]=[
                'docente'=>$d,
                'total_investigaciones'=>$total_investigaciones,
                'investigaciones'=>$investigaciones,
                'total_lineas_de_investigacion'=>$total_lineas_de_investigaciones,
                'lineas_investigaciones'=>$lineas_de_investigaciones,
                'total_articulos'=>$total_articulos,
                'articulos_de_investigacion'=>$articulos,
                'total_libros'=>$total_libros,
                'libros'=>$libros,
                'total_patentes'=>$total_patentes,
                'patentes'=>$patentes,
                'total_otros'=>$total_otros,
                'otros'=>$otros
            ];
        }
        /*return response()->json([
            'status'=>'success',
            'data'=>$arr
        ]);*/
        return view('admin.perfiles.perfilDocente')->with('users',$arr);
    }
    public function perfil(){
        if(Auth::user() == null ){
            return redirect('/inicio');
        }else if (Auth::user()->level == "Docente"){
            $datos=\DB::table('users')
                ->select('docentes.*',
                'users.*',
                'cuerpos_academicos.nombre as nombre_cuerpo_academico', 'cuerpos_academicos.id as id_cuerpo_academico',
                'carreras.nombre as nombre_adscripcion','carreras.id as id_carrera')
                ->where('users.id', '=', Auth::user()->id)
                ->leftJoin('docentes','users.id','=','docentes.id_user')
                ->leftJoin('cuerpos_academicos','docentes.id_cuerpo_academico','=','cuerpos_academicos.id')
                ->leftJoin('carreras','docentes.id_adscripcion','=','carreras.id')
                ->get();
            return view('admin.perfiles.miPerfil')->with('users',$datos);
        }else{
            return view('admin.perfiles.miPerfil');
        }
    }
    public function editar($id){
        if(Auth::user() == null ){
            return redirect('/inicio');
        }else{
            if(Auth::user()->level == "Admin"||Auth::user()->level == "Docente"){
                $datos=\DB::table('users')
                ->select('users.*',
                'docentes.id as id_docente','docentes.id_user','docentes.id_cuerpo_academico','docentes.edad','docentes.genero','docentes.nivel_estudio','docentes.sni','docentes.perfil_deseable','docentes.id_adscripcion','docentes.orcid',
                'cuerpos_academicos.nombre as nombre_cuerpo_academico',
                'carreras.nombre as nombre_adscripcion')
                ->where('users.id', '=', $id)
                ->leftJoin('docentes','users.id','=','docentes.id_user')
                ->leftJoin('cuerpos_academicos','docentes.id_cuerpo_academico','=','cuerpos_academicos.id')
                ->leftJoin('carreras','docentes.id_adscripcion','=','carreras.id')
                ->get();
                $arr = [];
                foreach($datos as $d){
                    $investigaciones = Proyectos_investigadore::where('id_docente',$d->id_docente)->get();
                    $total_investigaciones = Proyectos_investigadore::where('id_docente',$d->id_docente)->get()->count();
                    $lineas_de_investigaciones = Lineas_de_investigacione::where('id_docente',$d->id_docente)->get();
                    $total_lineas_de_investigaciones = Lineas_de_investigacione::where('id_docente',$d->id_docente)->get()->count();
                    $total_produccion_investigacion = Produccion_investigacione::where('id_docente',$d->id_docente)->get()->count();
                    $produccion_investigacion = Produccion_investigacione::where('id_docente',$d->id_docente)->orderBy('fecha')->get();
                    $total_cuerpos =DB::table('cuerpos_academicos')->select('cuerpos_academicos.*')->get()->count();
                    $cuerpos =DB::table('cuerpos_academicos')->select('cuerpos_academicos.*')->get();
                    $total_carreras =DB::table('carreras')->select('carreras.*')->get()->count();
                    $carreras =DB::table('carreras')->select('carreras.*')->get();
                    $arr[]=[
                        'docente'=>$d,
                        'total_investigaciones'=>$total_investigaciones,
                        'investigaciones'=>$investigaciones,
                        'total_lineas_de_investigacion'=>$total_lineas_de_investigaciones,
                        'lineas_investigaciones'=>$lineas_de_investigaciones,
                        'total_produccion_investigacion'=>$total_produccion_investigacion,
                        'produccion_investigacion'=>$produccion_investigacion,
                        'total_cuerpos'=>$total_cuerpos,
                        'cuerpos'=>$cuerpos,
                        'total_carreras'=>$total_carreras,
                        'carreras'=>$carreras
                    ];
                }
                /*return response()->json([
                    'status'=>'success',
                    'data'=>$arr
                ]);*/
                return view('admin.perfiles.editPerfil')->with('users',$arr);
            }else{
                return redirect('/inicio');
            }
        }
        
    }
    public function editarDocente(Request $request){
        //dd($request);
        $validator=Validator::make($request->all(),[
            'nombre'=>'required|max:100|min:3',
            'apellido'=>'required|max:100|min:3',
            'id_cuerpo_academico'=>'required',
            'id_adscripcion'=>'required',
            'orcid'=>'required',
            'perfil_deseable'=>'required',
            'nivel_estudio'=>'required',
            'sni'=>'required',
            'edad'=>'required',
            'genero'=>'required'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorEdit','Favor de llenar todos los campos')
                ->withErrors($validator);
        }else{
            $user = User::find($request->id);
            $iddocente = DB::table('docentes')->where('id_user', $request->id)->value('id');
            $docente = Docente::find($iddocente);
            $user -> nombre = $request->nombre;
            $user -> apellido = $request->apellido;
            $validator2=Validator::make($request->all(),[
                'img'=>'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);
            if(!$validator2->fails()){
                $imagen=$request->file('img');
                $nombre=time().'.'.$imagen->getClientOriginalExtension();
                $destino=public_path('img/users');
                $request->img->move($destino,$nombre);
                if(File::exists(public_path('img/users/'.$user->img)) && $user->img!='default.jpg'){
                    unlink(public_path('img/users/'.$user->img));
                }
                $user -> img = $nombre;
            }
            $user->save();
            $docente -> id_cuerpo_academico = $request->id_cuerpo_academico;
            $docente -> id_adscripcion = $request->id_adscripcion;
            $docente -> orcid = $request->orcid;
            $docente -> edad = $request->edad;
            $docente -> genero = $request->genero;
            $docente -> nivel_estudio = $request->nivel_estudio;
            $docente -> sni = $request->sni;
            $docente -> perfil_deseable = $request->perfil_deseable;
            $docente -> save();
            return back()->with('actualizar', 'Se ha actualizado correctamente el perfil');
        }
    }

    public function agregarLinea(Request $request){
        $validator = Validator::make($request->all(),[
            'nombre'=>'required',
            'id_docente'=>'required'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorInsert','Error al llenar el campo')
                ->withErrors($validator);
        }else{
            $linea = new Lineas_de_investigacione();
            $linea -> nombre = $request->nombre;
            $linea -> id_docente = $request->id_docente;
            $linea -> save();
            return back()->with('ListoLinea', 'Se creo la linea de investigación');
            /*return response()->json([
                'status'=>'success',
                'data'=>$linea
            ]);*/
        }
    }
    public function borrarLinea($id){
        $linea = Lineas_de_investigacione::find($id);
        $linea->delete();
        return back()->with('BorrarLinea', 'Se ha borrado la linea de investigación');
    }
    public function agregarProduccion(Request $request){
        if($request->link!=null){
            $validator = Validator::make($request->all(),[
                'nombre'=>'required',
                'id_docente_produccion'=>'required',
                'tipo'=>'required',
                'fecha'=>'required',
                'link'=>'url'
            ]);
        }else{
            $validator = Validator::make($request->all(),[
                'nombre'=>'required',
                'id_docente_produccion'=>'required',
                'tipo'=>'required',
                'fecha'=>'required'
            ]);
        }
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorProducInsert','Error al llenar los campo')
                ->withErrors($validator);
        }else{
            $produccion = new Produccion_investigacione();
            $produccion -> nombre = $request->nombre;
            $produccion -> id_docente = $request->id_docente_produccion;
            $produccion -> tipo = $request->tipo;
            $produccion -> fecha = $request->fecha;
            $produccion -> link = $request->link;
            $produccion -> save();
            return back()->with('ListoProduccion', 'Se creo la producción de investigación');
            /*return response()->json([
                'status'=>'success',
                'data'=>$produccion
            ]);*/
        }
    }
    public function editarProduccion(Request $request){
        if($request->link!=null){
            $validator = Validator::make($request->all(),[
                'nombre'=>'required',
                'tipo'=>'required',
                'fecha'=>'required',
                'link'=>'url'
            ]);
        }else{
            $validator = Validator::make($request->all(),[
                'nombre'=>'required',
                'tipo'=>'required',
                'fecha'=>'required'
            ]);
        }
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('errorProducEdit','Error al editar los campo')
                ->withErrors($validator);
        }else{
            $produccion = Produccion_investigacione::find($request->id);
            $produccion -> nombre = $request->nombre;
            $produccion -> tipo = $request->tipo;
            $produccion -> fecha = $request->fecha;
            $produccion -> link = $request->link;
            $produccion -> save();
            return back()->with('ActualizacionProduccion', 'Se actualizado la producción de investigación');
            /*return response()->json([
                'status'=>'success',
                'data'=>$linea
            ]);*/
        }
    }
    public function borrarProduccion($id){
        $produccion = Produccion_investigacione::find($id);
        $produccion->delete();
        return back()->with('BorrarProduccion', 'Se ha borrado correctamente la producción de investigación');
    }
}
