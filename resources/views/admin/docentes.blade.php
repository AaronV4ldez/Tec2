@extends('admin.layouts.main')
@section('contenido')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Investigadores</h1>
    </div>
    <div class="mx-5">
        <table class="table table-bordered table-striped" >
            <thead class="fondo" style="color:white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nivel de estudio</th>
                    <th scope="col">Nivel SNI</th>
                    <th scope="col">Cuerpo Academico</th>
                    <th scope="col">Perfil</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr>
                    <td class="text-center"><img class="img-profile rounded-circle" src="{{asset('img/users/'.$u->img)}}" alt="" height="30px" width="30px"></td>
                    <td>{{$u->nombre}} {{$u->apellido}}</td>
                    <td>{{$u->nivel_estudio}}</td>
                    <td>{{$u->sni}}</td>
                    <td>{{$u->nombre_cuerpo_academico}}</td>
                    <td class="text-center">
                        @if(Auth::user() == null || $u->id != Auth::user()->id)
                        <a href="/perfil/docente/{{$u->id}}"><button class="btn btn-outline-dark"><i class="fa-regular fa-user"></i></button></a>
                        @endif
                        @if(Auth::user() != null && $u->id == Auth::user()->id)
                        <a href="/perfil/editar/{{$u->id}}"><button class="btn btn-outline-dark"><i class="fa-regular fa-user"></i></button></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection