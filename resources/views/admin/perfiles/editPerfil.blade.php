@extends('admin.layouts.main')
@section('contenido')
@if(Auth::user() != null || Auth::user()->level == "Admin"|| Auth::user()->level == "Docente")
@foreach($users as $u)
<div class="container">
  @if($message = Session::get('actualizar'))
    <div class="alert alert-primary" role="alert">
      <h5>Actualización</h5>
      <p>{{$message}}</p>
    </div>
  @endif
</div>
<!-- Info basica de docente-->
<div class="container-sm rounded-4 shadow-lg">
  <div class="row mx-5 p-3 border-bottom">
    <div class="col-lg-2 text-center">
      <img class="img-perfil" src="{{asset('/img/users/'.$u['docente']->img)}}" alt="img-avatar">
    </div>
    <div class="col-lg-8 pt-4">
      <h2 class="titulo">{{$u['docente']->nombre}} {{$u['docente']->apellido}}</h2>
      <b class="subtitulo">Cuerpo academico: </b>{{$u['docente']->nombre_cuerpo_academico}}
      <br>
      <b class="subtitulo">Adscripción: </b>{{$u['docente']->nombre_adscripcion}}
      <br>
      <b class="subtitulo">ORCID: </b>{{$u['docente']->orcid}}
    </div>
    <div class="col-lg-2 text-center pt-2">
        <button class="fondo btn btn-dark rounded-circle shadow-lg btnEdit"
        data-id="{{$u['docente']->id}}"   
        data-nombre="{{$u['docente']->nombre}}" 
        data-apellido="{{$u['docente']->apellido}}" 
        data-id_cuerpo_academico="{{$u['docente']->id_cuerpo_academico}}" 
        data-id_adscripcion="{{$u['docente']->id_adscripcion}}" 
        data-orcid="{{$u['docente']->orcid}}" 
        data-img_perfil="{{$u['docente']->img}}" 
        data-perfil_deseable="{{$u['docente']->perfil_deseable}}"   
        data-nivel_estudio="{{$u['docente']->nivel_estudio}}" 
        data-sni="{{$u['docente']->sni}}" 
        data-edad="{{$u['docente']->edad}}" 
        data-genero="{{$u['docente']->genero}}" 
        data-bs-toggle="modal" data-bs-target="#editModal">
        <i class="fa-solid fa-pencil"></i></button>
    </div>
  </div>
  <div class="row mx-5 p-3">
    <div class="col-md-6 ps-5">
      <i class="icono fa-solid fa-book"></i><b class="subtitulo"> Nivel de estudio: </b>{{ $u['docente']->nivel_estudio }}
      <br>
      @if($u['docente']->perfil_deseable==1)
      <i class="fa-solid fa-check"></i><b class="subtitulo"> Pefil deseable: </b>Si
      <br>
      @endif
      @if($u['docente']->perfil_deseable==0)
      <i class="fa-solid fa-check"></i><b class="subtitulo"> Pefil deseable: </b>No
      <br>
      @endif
      <i class="fa-solid fa-magnifying-glass"></i><b class="subtitulo"> SNI: </b>{{$u['docente']->sni}}
      <br>
      <i class="icono fa-regular fa-calendar-days"></i><b class="subtitulo"> Edad: </b>{{ $u['docente']->edad }}
      <br>
      <i class="fa-solid fa-genderless"></i><b class="subtitulo"> Genero: </b>{{ $u['docente']->genero }}
      <br>
      <i class="fa-solid fa-file"></i><b class="subtitulo"> Total de proyectos de investigación: </b> {{$u['total_investigaciones']}}
      </ul>
    </div>
    <div class="col-md-6 p-3 text-center" >
      <div class="row m-1" >
        <div class="col">
          <h4><i class="fa-solid fa-inbox"></i> investigacion@itsncg.edu.mx</h4>
        </div>
      </div>
      <div class="row m-1">
        <div class="col">
          <h4><i class="fa-solid fa-phone"></i> (636) 692-95-00 EXT.110</h4>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!--Cosos que tiene que ver con trabajos de investigación-->
<div class="container-sm rounded-4 shadow-lg my-5">
  <!-- Lineas de investigacion-->
  <div class="row">
    <div class="col fondo text-center rounded-4 p-1">
      <h3 class="text-white">Lineas de investigación</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6 p-3">
      @if($message = Session::get('ListoLinea'))
        <div class="alert alert-success" role="alert">
          <h5>Crear</h5>
          <p>{{$message}}</p>
        </div>
      @endif
      @if($message = Session::get('BorrarLinea'))
        <div class="alert alert-danger" role="alert">
          <h5>Borrar</h5>
          <p>{{$message}}</p>
        </div>
      @endif
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre de la linea de investigación</th>
            <th class="text-center" scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @for($cont = 0; $cont <$u['total_lineas_de_investigacion']; ++$cont)
          @foreach($users as $i)
          <tr>
            <td>{{$i['lineas_investigaciones'][$cont]['nombre']}}</td>
            <td class="text-center">
              <button class="btn btn-outline-danger btnEliminar" data-id="{{$i['lineas_investigaciones'][$cont]['id']}}" data-bs-toggle="modal" data-bs-target="#borrarLineaModal">
                <i class="fa fa-trash"></i>
              </button>
              <form action="{{url('/perfil/eliminar_linea',['id'=>$i['lineas_investigaciones'][$cont]['id']])}}"
                method="POST" id="formEliminar_{{$i['lineas_investigaciones'][$cont]['id']}}">
                @csrf
                <input type="hidden" name="id" value="{{$i['lineas_investigaciones'][$cont]['id']}}">
                <input type="hidden" name="_method" value="delete">
              </form>
            </td>
          </tr>
          @endforeach
          @endfor
        </tbody>
      </table>
    </div>
    <div class="col-3 p-3 text-end">
      <button class="fondo btn btn-dark rounded-circle shadow-lg btnlineasInv" data-id_docente="{{$u['docente']->id_docente}}" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa-solid fa-plus"></i></button>
    </div>
  </div>
  <!-- Producción de investigacion-->
  <div class="row">
    <div class="col fondo text-center rounded-4 p-1">
      <h3 class="text-white">Producción de investigación</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10 p-3">
      @if($message = Session::get('ListoProduccion'))
        <div class="alert alert-success" role="alert">
          <h5>Crear</h5>
          <p>{{$message}}</p>
        </div>
      @endif
      @if($message = Session::get('ActualizacionProduccion'))
        <div class="alert alert-primary" role="alert">
          <h5>Actualizar</h5>
          <p>{{$message}}</p>
        </div>
      @endif
      @if($message = Session::get('BorrarProduccion'))
        <div class="alert alert-danger" role="alert">
          <h5>Borrar</h5>
          <p>{{$message}}</p>
        </div>
      @endif
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre de la producción de investigacion</th>
            <th scope="col">Tipo</th>
            <th scope="col">Fecha</th>
            <th class="text-center" scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @for($cont = 0; $cont <$u['total_produccion_investigacion']; ++$cont)
          <tr>
            <td>{{$u['produccion_investigacion'][$cont]['nombre']}}</td>
            <td>{{$u['produccion_investigacion'][$cont]['tipo']}}</td>
            <td>{{$u['produccion_investigacion'][$cont]['fecha']}}</td>
            <td class="text-center">
              <button class="btn btn-outline-primary btnEditProduccion"
              data-id="{{$u['produccion_investigacion'][$cont]['id']}}"   
              data-nombre="{{$u['produccion_investigacion'][$cont]['nombre']}}" 
              data-tipo="{{$u['produccion_investigacion'][$cont]['tipo']}}" 
              data-fecha="{{$u['produccion_investigacion'][$cont]['fecha']}}" 
              data-link="{{$u['produccion_investigacion'][$cont]['link']}}" 
              data-bs-toggle="modal" data-bs-target="#editProduccionModal">
                <i class="fa fa-pencil"></i>
              </button>

              @if($u['produccion_investigacion'][$cont]['link']!=null)
              <a class="btn btn-outline-success" href="{{$u['produccion_investigacion'][$cont]['link']}}" target='_blank'>
              <i class="fa-solid fa-link"></i>
              </a>
              @endif
              @if($u['produccion_investigacion'][$cont]['link']==null)
              <button class="btn btn-outline-success" disabled="disabled">
              <i class="fa-solid fa-link"></i>
              </button>
              @endif
              <button class="btn btn-outline-danger btnProduccionEliminar" data-id="{{$u['produccion_investigacion'][$cont]['id']}}" data-bs-toggle="modal" data-bs-target="#borrarProduccionModal">
                <i class="fa fa-trash"></i>
              </button>
              <form action="{{url('/perfil/eliminar_produccion',['id'=>$u['produccion_investigacion'][$cont]['id']])}}" 
                method="POST" id="formProduccionEliminar_{{$u['produccion_investigacion'][$cont]->id}}">
                @csrf
                <input type="hidden" name="id" value="{{$u['produccion_investigacion'][$cont]->id}}">
                <input type="hidden" name="_method" value="delete">
              </form>
            </td>
          </tr>
          @endfor
        </tbody>
      </table>
    </div>
    <div class="col-1 p-3 text-end">
      <button class="fondo btn btn-dark rounded-circle shadow-lg btnProduccionInv" data-id_docente_produccion="{{$u['docente']->id_docente}}" data-bs-toggle="modal" data-bs-target="#addProduccionModal"><i class="fa-solid fa-plus"></i></button>
    </div>
  </div>
  <!-- Proyectos de investigacion-->
  <div class="row">
    <div class="col fondo text-center rounded-4 p-1">
      <h3 class="text-white">Proyectos de investigación</h3>
    </div>
  </div>
  <div class="row">
    <div class="col p-5">
      @if($u['total_investigaciones']!=0)
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre de investigación</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @for($cont = 0; $cont <$u['total_investigaciones']; ++$cont)
          @foreach($users as $i)
          <tr>
            <th>{{$cont+1}}</th></th>
            <td>{{$i['investigaciones'][$cont]['nombre']}}</td>
          </tr>
          @endforeach
          @endfor
        </tbody>
      </table>
      @endif
    </div>
  </div>
</div>
@endforeach

<!-- Modal para editar perfil -->
<!-- Modal editar -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ModalLabel">Editar datos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/perfil/editarDocente" method="POST" enctype="multipart/form-data">
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
              <label for="nombre" class="col-md-3 col-form-label">Nombres</label>
              <div class="col-md-9">
                <input type="text" id="nombreEdit" class="form-control" name="nombre" value="{{@old('nombre')}}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="apellido" class="col-md-3 col-form-label">Apellidos</label>
              <div class="col-md-9">
                <input type="text" id="apellidoEdit" class="form-control" name="apellido" value="{{@old('apellido')}}">
              </div>
            </div>

            <div class="row mb-3">
                <label for="id_cuerpo_academico" class="col-md-3 col-form-label">Cuerpo academico</label>
                <div class="col-md-9">
                  
                  <select id="id_cuerpo_academicoEdit" class="form-select" name="id_cuerpo_academico" value="{{@old('id_cuerpo_academico')}}">
                    @for($cont = 0; $cont <$u['total_cuerpos']; ++$cont)
                      <option value={{$u['cuerpos'][$cont]->id}}>{{$u['cuerpos'][$cont]->nombre}}</option>
                    @endfor
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="id_adscripcion" class="col-md-3 col-form-label">Adscripción</label>
                <div class="col-md-9">
                  <select id="id_adscripcionEdit" class="form-select" name="id_adscripcion" value="{{@old('id_adscripcion')}}">
                    @for($cont = 0; $cont <$u['total_carreras']; ++$cont)
                      <option value={{$u['carreras'][$cont]->id}}>{{$u['carreras'][$cont]->nombre}}</option>
                    @endfor
                  </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="orcid" class="col-md-3 col-form-label">ORCID</label>
                <div class="col-md-9">
                  <input type="text" id="orcidEdit" class="form-control" name="orcid" value="{{@old('orcid')}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="nivel_estudio" class="col-md-3 col-form-label">Nivel de estudio</label>
                <div class="col-md-9">
                  <select id="nivel_estudioEdit" class="form-select" name="nivel_estudio" value="{{@old('nivel_estudio')}}">
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Especialidad">Especialidad</option>
                    <option value="Maestría">Maestría</option>
                    <option value="Doctorado">Doctorado</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="perfil_deseable" class="col-md-3 col-form-label">Perfil deseable</label>
                <div class="col-md-9">
                  <select id="perfil_deseableEdit" class="form-select" name="perfil_deseable" value="{{@old('perfil_deseable')}}">
                    <option value=0>No</option>
                    <option value=1>Si</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="sni" class="col-md-3 col-form-label">Nivel de SNI</label>
                <div class="col-md-9">
                  <select id="sniEdit" class="form-select" name="sni" value="{{@old('sni')}}">
                    <option value="No">No</option>
                    <option value="Candidato">Candidato</option>
                    <option value="Nivel 1">Nivel 1</option>
                    <option value="Nivel 2">Nivel 2</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="edad" class="col-md-3 col-form-label">Edad</label>
                <div class="col-md-9">
                  <input type="text" id="edadEdit" class="form-control" name="edad" value="{{@old('edad')}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="genero" class="col-md-3 col-form-label">Genero</label>
                <div class="col-md-9">
                    <select id="generoEdit" class="form-select" name="genero" value="{{@old('genero')}}">
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="No mencionar">No mencionar</option>
                        </select>
                </div>
            </div>

            <div class="row mb-3">
              <label for="img" class="col-md-3 col-form-label">Imagen</label>
              <div class="col-md-9">
                <input type="file" id="img" class="form-control" name="img">
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

<!-- Modal para lineas de investigacion -->
<!-- Modal agregar -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar linea de investigación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/perfil/agregar_linea" method="POST" enctype="multipart/form-data">
          <input input type="hidden" name="id_docente" id="id_docente">
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
            <div class="col">
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
<div class="modal fade" id="borrarLineaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar linea de investigación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">
            <p>¿Seguro que desea esta linea de investigación?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger btnCloseEliminar">Eliminar</button>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal para produccion de investigacion -->
<!-- Modal agregar -->
<div class="modal fade" id="addProduccionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar producción de investigacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/perfil/agregar_produccion" method="POST" enctype="multipart/form-data">
          <input input type="hidden" name="id_docente_produccion" id="id_docente_produccion" value="{{@old('id_docente_produccion')}}">
          @if($message = Session::get('errorProducInsert'))
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
            <div class="row mb-3">
              <label for="nombre" class="col-md-3 col-form-label">Nombre</label>
              <div class="col-md-9">
                <input type="text" id="nombreEdit" class="form-control" name="nombre" required value="{{@old('nombre')}}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="tipo" class="col-md-3 col-form-label">Tipo</label>
              <div class="col-md-9">
                <select id="tipoEdit" class="form-select" name="tipo" required value="{{@old('tipo')}}" >
                  <option value="" selected disabled hidden></option>
                  <option value="Articulo">Articulo</option>
                  <option value="Libro">Capitulo de libro</option>
                  <option value="Patente">Pantente</option>
                  <option value="Otro">Otro</option>
                  </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="fecha" class="col-md-3 col-form-label">Fecha</label>
              <div class="col-md-9">
                <input type="text" id="fechaEdit" class="form-control" name="fecha" required value="{{@old('fecha')}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="link" class="col-md-3 col-form-label">Enlace</label>
              <div class="col-md-9">
                <input type="text" id="linkEdit" class="form-control" name="link" value="{{@old('link')}}">
              </div>
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

<!-- Modal editar -->
<div class="modal fade" id="editProduccionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar producción de investigacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/perfil/editar_produccion" method="POST" enctype="multipart/form-data">
          <input input type="hidden" name="id" id="id">
          @if($message = Session::get('errorProducEdit'))
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
            <div class="row mb-3">
              <label for="nombre" class="col-md-3 col-form-label">Nombre</label>
              <div class="col-md-9">
                <input type="text" id="nombreProduccionEdit" class="form-control" name="nombre" required value="{{@old('nombre')}}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="tipo" class="col-md-3 col-form-label">Tipo</label>
              <div class="col-md-9">
                <select id="tipoProduccionEdit" class="form-select" name="tipo" required value="{{@old('tipo')}}">
                  <option value="" selected disabled hidden></option>
                  <option value="Articulo">Articulo</option>
                  <option value="Libro">Capitulo de libro</option>
                  <option value="Patente">Pantente</option>
                  <option value="Otro">Otro</option>
                  </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="fecha" class="col-md-3 col-form-label">Fecha</label>
              <div class="col-md-9">
                <input type="text" id="fechaProduccionEdit" class="form-control" name="fecha" required value="{{@old('fecha')}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="link" class="col-md-3 col-form-label">Enlace</label>
              <div class="col-md-9">
                <input type="text" id="linkProduccionEdit" class="form-control" name="link" value="{{@old('link')}}">
              </div>
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
<div class="modal fade" id="borrarProduccionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar producción de investigación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">
            <p>¿Seguro que desea esta producción de investigación?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger btnCloseEliminarProduccion">Eliminar</button>
          </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
@section('script')
  <script>
    var id_lineas_inv=-1
    var id_docente_linea=-1
    var id_produccion_inv=-1
    $(document).ready(function(){
      @if($message = Session::get('errorEdit'))
        $("#editModal").modal('show')
      @endif
      @if($message = Session::get('errorInsert'))
        $("#addModal").modal('show')
      @endif
      @if($message = Session::get('errorProducInsert'))
        $("#addProduccionModal").modal('show')
      @endif
      @if($message = Session::get('errorProducEdit'))
        $("#editProduccionModal").modal('show')
      @endif
      $(".btnEdit").click(function(){
        var id=$(this).data('id');
        var nombre=$(this).data('nombre');
        var apellido=$(this).data('apellido');
        var id_cuerpo_academico=$(this).data('id_cuerpo_academico');
        var id_adscripcion=$(this).data('id_adscripcion');
        var orcid=$(this).data('orcid');
        var perfil_deseable=$(this).data('perfil_deseable');
        var nivel_estudio=$(this).data('nivel_estudio');
        var sni=$(this).data('sni');
        var edad=$(this).data('edad');
        var genero=$(this).data('genero');
        $("#idEdit").val(id);
        $("#nombreEdit").val(nombre);
        $("#apellidoEdit").val(apellido);
        $("#id_cuerpo_academicoEdit").val(id_cuerpo_academico);
        $("#id_adscripcionEdit").val(id_adscripcion);
        $("#orcidEdit").val(orcid);
        $("#perfil_deseableEdit").val(perfil_deseable);
        $("#nivel_estudioEdit").val(nivel_estudio);
        $("#sniEdit").val(sni);
        $("#edadEdit").val(edad);
        $("#generoEdit").val(genero);
        //$("#idEdit").val(id);
      });
      $(".btnlineasInv").click(function(){
        var id_docente=$(this).data('id_docente');
        $("#id_docente").val(id_docente);
      });
      $(".btnProduccionInv").click(function(){
        var id_docente_produccion=$(this).data('id_docente_produccion');
        $("#id_docente_produccion").val(id_docente_produccion);
      });
      $(".btnEditProduccion").click(function(){
        var id=$(this).data('id');
        var nombre=$(this).data('nombre');
        var tipo=$(this).data('tipo');
        var fecha=$(this).data('fecha');
        var link=$(this).data('link');
        $("#id").val(id);
        $("#nombreProduccionEdit").val(nombre);
        $("#tipoProduccionEdit").val(tipo);
        $("#fechaProduccionEdit").val(fecha);
        $("#linkProduccionEdit").val(link);
      });
    });
    $(".btnEliminar").click(function(){
        var id=$(this).data('id');
        id_lineas_inv=id;
      });
    $(".btnProduccionEliminar").click(function(){
      var id=$(this).data('id');
      id_produccion_inv=id;
    });
    $(".btnCloseEliminar").click(function(){
      $("#formEliminar_"+id_lineas_inv).submit();
    })
    $(".btnCloseEliminarProduccion").click(function(){
      $("#formProduccionEliminar_"+id_produccion_inv).submit();
    })
  </script>
@endsection