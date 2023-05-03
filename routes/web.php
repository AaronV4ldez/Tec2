<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/inicio',[UsersController::class,'docentes']);
Route::get('/registro',[UsersController::class,'register']);
Route::post('/registro',[UsersController::class,'saveRegister']);

Route::group(['prefix'=>'admin','as'=>'admin'],function(){
    Route::get('/',[AdminController::class,'index']);
    Route::post('/nuevo_usuario',[AdminController::class,'store']);
    Route::delete('/eliminar/{id}',[AdminController::class,'destroy']);
    Route::post('/cambiar',[AdminController::class,'update']);
    Route::post('/agregra_cuerpo',[AdminController::class,'addCuerpo']);
    Route::delete('/borrar_cuerpo/{id}',[AdminController::class,'destroyCuerpo']);
    Route::post('/agregar_carrera',[AdminController::class,'addCarrera']);
    Route::delete('/borrar_carrera/{id}',[AdminController::class,'destroyCarrera']);
});

Route::group(['prefix'=>'usuarios','as'=>'usuarios'], function(){
    Route::get('/docentes',[UsersController::class,'docentes']);
});
Route::group(['prefix'=>'perfil','as'=>'perfil'], function(){
    Route::get('/docente/{id}',[PerfilController::class,'index']);
    Route::get('/editar/{id}',[PerfilController::class,'editar']);
    Route::post('/editarDocente',[PerfilController::class,'editarDocente']);
    Route::post('/agregar_linea',[PerfilController::class,'agregarLinea']);
    Route::delete('/eliminar_linea/{id}',[PerfilController::class,'borrarLinea']);
    Route::post('/agregar_produccion',[PerfilController::class,'agregarProduccion']);
    Route::post('/editar_produccion',[PerfilController::class,'editarProduccion']);
    Route::delete('/eliminar_produccion/{id}',[PerfilController::class,'borrarProduccion']);
});
Route::group(['prefix'=>'proyectos','as'=>'proyectos'], function(){
    Route::get('/crear',[ProyectoController::class,'crear']);
    Route::get('/documentacion',[ProyectoController::class,'documentacion']);
    Route::get('/consulta',[ProyectoController::class,'consulta']);
    Route::get('/admin',[ProyectoController::class,'admin']);
});

Route::get('/login', function () {
    return view('users/login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
