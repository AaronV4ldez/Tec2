<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Docente;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    /*Esto Funciona NO TOCAR

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => 'Llenarlo despues plox',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level'=>'Sin asignar'
        ]);
    }
    */

    /*
    ESTO FUNCIONA SUPER BIEN NO TOCAR
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level'=>$data['level']
        ]);
        if ($data['level']=='Docente'){
            
        }
    }*/
    protected function create(array $data)
    {
        $user = new User();
            $user -> name = $data['name'];
            $user -> last_name = $data['last_name'];
            $user -> email = $data['email'];
            $user -> password = Hash::make($data['password']);
            $user -> level = $data['level'];
            $user -> img_perfil = 'default.jpg';
            $user -> save();
            if($user -> level == 'Alumno'){
                $alumno = new Alumno();
                $alumno -> id_user = $user->id;
                $alumno -> numero_de_control = null;
                $alumno -> edad = null;
                $alumno -> genero = null;
                $alumno -> id_carrera = null;
                $alumno -> semestre = null;
                $alumno -> save();
            }else{
                $docente = new Docente();
                $docente -> id_user = $user->id;
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
            }
            return $user;
    }
    /*public function saveRegister(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255|min:3',
            'lastName'=>'required|max:255|min:3',
            'email'=>'required|email',
            'p1'=>'required|min:8|required_with:p2|same:p2',
            'p2'=>'required|min:8',
            'level'=>'required'
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
            if($user -> level == 'Alumno'){
                $alumno = new Alumno();
                $alumno -> id_user = $user->id;
                $alumno -> img_perfil = 'default.jpg';
                $alumno -> numero_de_control = null;
                $alumno -> edad = null;
                $alumno -> genero = null;
                $alumno -> id_carrera = null;
                $alumno -> semestre = null;
                $alumno -> save();
                return view('inicio');
            }else{
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
    }*/
}
