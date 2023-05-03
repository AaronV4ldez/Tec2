@extends('admin.layouts.main')
@section('contenido')
@foreach($datos as $d)
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel Administrativo</h1>
    </div>
    @if($message = Session::get('Listo'))
        <div class="alert alert-success" role="alert">
        <h5>Agregar</h5>
        <p>{{$message}}</p>
        </div>
    @endif
    @if($message = Session::get('Borrar'))
        <div class="alert alert-danger" role="alert">
        <h5>Eliminar</h5>
        <p>{{$message}}</p>
        </div>
    @endif
    @if($message = Session::get('Actualizar'))
        <div class="alert alert-primary" role="alert">
        <h5>Editar</h5>
        <p>{{$message}}</p>
        </div>
    @endif
</div>
<!--Administración de usuarios-->
<div class="container rounded-1 shadow-lg p-3">
    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Todos los usuarios</h1>
            <button class="btn btn-outline-success" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i> Agregar</button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead class="fondo" style="color:white">
                  <tr>
                    <th scope="col" ></th>
                    <th scope="col">Nombre(s)</th>
                    <th scope="col">Apellido(s)</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo Usuario</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @for($cont = 0; $cont <$d['total_usuarios']; ++$cont)
                  <tr>
                    <td class="text-center"><img class="img-profile rounded-circle" src="{{asset('img/users/'.$d['datos_usuarios'][$cont]->img)}}" alt="" height="30px" width="30px"></td>
                    <td>{{$d['datos_usuarios'][$cont]->nombre}}</td>
                    <td>{{$d['datos_usuarios'][$cont]->apellido}}</td>
                    <td>{{$d['datos_usuarios'][$cont]->email}}</td>
                    <td>{{$d['datos_usuarios'][$cont]->level}}</td>
                    <td class="text-center">
                      @if($d['datos_usuarios'][$cont]->level == 'Docente')
                        <a href="/perfil/docente/{{$d['datos_usuarios'][$cont]->id}}""><button class="btn btn-outline-dark"><i class="fa-regular fa-user"></i></button></a>
                      @endif
                      <button class="btn btn-outline-primary btnEdit" 
                        data-id="{{$d['datos_usuarios'][$cont]->id}}"
                        data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fa-solid fa-pencil"></i>
                      </button>
                      <button class="btn btn-outline-danger btnEliminar" data-id="{{$d['datos_usuarios'][$cont]->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fa fa-trash"></i>
                      </button>
                      <form action="{{url('/admin/eliminar',['id'=>$d['datos_usuarios'][$cont]->id])}}" 
                        method="POST" id="formEliminar_{{$d['datos_usuarios'][$cont]->id}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$d['datos_usuarios'][$cont]->id}}">
                        <input type="hidden" name="_method" value="delete">
                      </form>
                    </td>
                  </tr>
                  @endfor
                </tbody>
              </table>
        </div>
    </div>
</div>
<!--Administracion de los cuerpos academicos y carreras-->
<div class="container my-5">
    <div class="row">
      <div class="col-xxl-5 rounded-1 shadow-lg px-5">
        <div class="row mt-4">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="h3 mb-0 text-gray-800">Cuerpos academicos</h2>
                <button class="btn btn-outline-success" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalCuerpo"><i class="fa fa-plus"></i> Agregar</button>
            </div>
        </div>
        <div class="row">
          <table class="table table-bordered">
            <thead class="fondo" style="color:white"> 
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col" class="text-center">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @for($cont=0; $cont < $d['total_cuerpos']; $cont++)
              <tr>
                <td>{{$d['cuerpos_academicos'][$cont]->nombre}}</td>
                <td class="text-center">
                  <button class="btn btn-outline-danger btnEliminarCuerpo" data-bs-toggle="modal" data-bs-target="#deleteModalCuerpo" data-id="{{$d['cuerpos_academicos'][$cont]->id}}">
                  <i class="fa fa-trash"></i>
                  </button>
                  <form action="{{url('/admin/borrar_cuerpo',['id'=>$d['cuerpos_academicos'][$cont]->id])}}" 
                    method="POST" id="formEliminarCuerpo_{{$d['cuerpos_academicos'][$cont]->id}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$d['cuerpos_academicos'][$cont]->id}}">
                    <input type="hidden" name="_method" value="delete">
                  </form>
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-2"></div>
      <div class="col-xxl-5 rounded-1 shadow-lg px-5">
        <div class="row mt-4">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Carreras</h2>
            <button class="btn btn-outline-success" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalCarrera"><i class="fa fa-plus"></i> Agregar</button>
        </div>
        </div>
        <div class="row">
          <table class="table table-bordered">
            <thead class="fondo" style="color:white">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col" class="text-center">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @for($cont=0; $cont < $d['total_carreras']; $cont++)
              <tr>
                <td>{{$d['carreras'][$cont]->nombre}}</td>
                <td class="text-center">
                  <button class="btn btn-outline-danger btnEliminarCarrera" data-bs-toggle="modal" data-bs-target="#deleteModalCarrera" data-id="{{$d['carreras'][$cont]->id}}">
                    <i class="fa fa-trash"></i>
                    </button>
                    <form action="{{url('/admin/borrar_carrera',['id'=>$d['carreras'][$cont]->id])}}" 
                      method="POST" id="formEliminarCarrera_{{$d['carreras'][$cont]->id}}">
                      @csrf
                      <input type="hidden" name="id" value="{{$d['carreras'][$cont]->id}}">
                      <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<!--Momals usuarios-->
<!-- Modal agregar -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar usuario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/nuevo_usuario" method="POST" enctype="multipart/form-data">
            @if($message = Session::get('errorInsert'))
              <div class="alert alert-danger" role="alert">
                <h5>Error</h5>
                <ul>
                  @foreach ($errors->all() as $errors)
                      <li>{{$errors}}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            @csrf
            <div class="row mb-3">
              <label for="nombre" class="col-md-3 col-form-label">Nombres</label>
              <div class="col-md-9">
                <input type="text" id="nombre" class="form-control" name="nombre" required value="{{@old('nombre')}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="apellido" class="col-md-3 col-form-label">Apellidos</label>
              <div class="col-md-9">
                <input type="text" id="apellido" class="form-control" name="apellido" required value="{{@old('apellido')}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-md-3 col-form-label">Email</label>
              <div class="col-md-9">
                <input type="email" id="email" class="form-control" name="email" required value="{{@old('email')}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="password" class="col-md-3 col-form-label">Contraseña</label>
              <div class="col-md-9">
                <input type="password" id="password" class="form-control" name="password" required value="{{@old('password')}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="level" class="col-md-3 col-form-label">Nivel</label>
              <div class="col-md-9">
                <select id="level" class="form-select" name="level" value="level" required value=" {{@old('level')}}">
                  <option value="" selected disabled hidden></option>
                  <option value="Admin">Admin</option>
                  <option value="Docente">Docente</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!-- Modal eliminar -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <p>¿Seguro que desea eliminar al usuario?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger btnCloseEliminar">Eliminar</button>
        </div>
    </div>
    </div>
</div>
</div>

<!-- Modal editar -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="/admin/cambiar" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" id="idEdit">
        @if($message = Session::get('errorEdit'))
            <div class="alert alert-danger" role="alert">
            <h5>Error</h5>
            <ul>
                @foreach ($errors->all() as $errors)
                    <li>{{$errors}}</li>
                @endforeach
            </ul>
            </div>
        @endif
        @csrf
        <div class="row mb-3">
            <div class="col-md">
            <input type="password" id="passwordEdit" class="form-control" name="password" >
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
    </div>
    </div>
    </div>
</div>

<!--Momals cuerpos academicos-->
<!-- Modal agregar -->
<div class="modal fade" id="addModalCuerpo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar usuario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/agregra_cuerpo" method="POST" enctype="multipart/form-data">
            @if($message = Session::get('errorInsertCuerpo'))
              <div class="alert alert-danger" role="alert">
                <h5>Error</h5>
                <ul>
                  @foreach ($errors->all() as $errors)
                      <li>{{$errors}}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            @csrf
            <div class="row mb-3">
              <label for="nombre" class="col-md-3 col-form-label">Nombres</label>
              <div class="col-md-9">
                <input type="text" id="nombre" class="form-control" name="nombre" required value="{{@old('nombre')}}">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal eliminar -->
<div class="modal fade" id="deleteModalCuerpo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar cuerpo academico</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <p>¿Seguro que desea eliminar el cuerpo academico?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btnCloseEliminarCuerpo">Eliminar</button>
            </div>
        </div>
        </div>
    </div>
</div>

<!--Momals carreras-->
<!-- Modal agregar -->
<div class="modal fade" id="addModalCarrera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar carrera</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/agregar_carrera" method="POST" enctype="multipart/form-data">
            @if($message = Session::get('errorInsertCarrera'))
              <div class="alert alert-danger" role="alert">
                <h5>Error</h5>
                <ul>
                  @foreach ($errors->all() as $errors)
                      <li>{{$errors}}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            @csrf
            <div class="row mb-3">
              <label for="nombre" class="col-md-3 col-form-label">Nombres</label>
              <div class="col-md-9">
                <input type="text" id="nombre" class="form-control" name="nombre" required value="{{@old('nombre')}}">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal eliminar -->
<div class="modal fade" id="deleteModalCarrera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar carrera</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <p>¿Seguro que desea eliminar la carrera?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btnCloseEliminarCarrera">Eliminar</button>
            </div>
        </div>
        </div>
    </div>
</div>



@endforeach
@endsection
@section('script')
  <script>
    var idEliminar=-1
    var idEliminarCuerpo=-1
    var idEliminarCarrera=-1
    $(document).ready(function(){
      @if($message = Session::get('errorInsert'))
        $("#addModal").modal('show')
      @endif
      @if($message = Session::get('errorEdit'))
        $("#editModal").modal('show')
      @endif
      @if($message = Session::get('errorInsertCuerpo'))
        $("#addModalCuerpo").modal('show')
      @endif
      @if($message = Session::get('errorInsertCarrera'))
        $("#addModalCarrera").modal('show')
      @endif
      $(".btnEliminar").click(function(){
        var id=$(this).data('id');
        idEliminar=id;
      });
      $(".btnEliminarCuerpo").click(function(){
        var id=$(this).data('id');
        idEliminarCuerpo=id;
      });
      $(".btnEliminarCarrera").click(function(){
        var id=$(this).data('id');
        idEliminarCarrera=id;
      });
      $(".btnEdit").click(function(){
        var id=$(this).data('id');
        $("#idEdit").val(id);
      });
      $(".btnCloseEliminar").click(function(){
        $("#formEliminar_"+idEliminar).submit();
      });
      $(".btnCloseEliminarCuerpo").click(function(){
        $("#formEliminarCuerpo_"+idEliminarCuerpo).submit();
      });
      $(".btnCloseEliminarCarrera").click(function(){
        $("#formEliminarCarrera_"+idEliminarCarrera).submit();
      });
    });
  </script>
@endsection