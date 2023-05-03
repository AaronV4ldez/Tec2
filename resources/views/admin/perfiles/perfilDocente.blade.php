@extends('admin.layouts.main')
@section('contenido')
@foreach($users as $u)
<!-- Info basica de docente-->
<div class="container-sm rounded-4 shadow-lg">
  <div class="row mx-5 p-3 border-bottom">
    <div class="col-lg-2 text-center">
      <img class="img-perfil rounded-circle border border-5 border-light" src="{{asset('/img/users/'.$u['docente']->img)}}" alt="img-avatar">
    </div>
    <div class="col-lg-10 pt-4" >
      <h2 class="titulo">{{$u['docente']->nombre}} {{$u['docente']->apellido}}</h2>
      <b class="subtitulo">Cuerpo academico: </b>{{$u['docente']->nombre_cuerpo_academico}}
      <br>
      <b class="subtitulo">Adscripción: </b>{{$u['docente']->nombre_adscripcion}}
      <br>
      <b class="subtitulo">ORCID: </b>{{$u['docente']->orcid}}
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
@endforeach
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
        <div class="row row-cols-2">
          @for($cont = 0; $cont <$u['total_lineas_de_investigacion']; ++$cont)
          @foreach($users as $i)
            <div class="col-sm text-center p-2"><b class="subtitulo">{{$i['lineas_investigaciones'][$cont]['nombre']}}</b></div>
          @endforeach
          @endfor
        </div>
    </div>
    <div class="col-3"></div>
  </div>
  <!-- Producción de investigacion-->
  <div class="row">
    <div class="col fondo text-center rounded-4 p-1">
      <h3 class="text-white">Producción de investigación</h3>
    </div>
  </div>
    <!--Artículos de investigación-->
    @if($u['total_articulos']!=0)
    <div class="row">
      <div class="row px-4 py-3" >
        <h5 class="p-2 ps-5" style="color:#ec971f">Artículos de investigación</h5>
      </div>
      <div class="row">
        <div class="col-1"></div>
          <div class="col-10 pb-1" >
            <div class="list-group" >
              @for($cont = 0; $cont <$u['total_articulos']; ++$cont)
              <a 
              @if($u['articulos_de_investigacion'][$cont]['link']== null)href="#"@endif
              @if($u['articulos_de_investigacion'][$cont]['link']!=null)href="{{$u['articulos_de_investigacion'][$cont]['link']}}" target='_blank'@endif
              class="list-group-item list-group-item-action">
              {{$u['articulos_de_investigacion'][$cont]['nombre']}}
              ({{$u['articulos_de_investigacion'][$cont]['fecha']}})
              </a>
              @endfor
            </div>
          </div>
        <div class="col-1"></div>
      </div>
    </div>
    @endif
    <!--Capitulos de libros-->
    @if($u['total_libros']!=0)
    <div class="row">
      <div class="row px-4 py-3">
        <h5 class="p-2 ps-5" style="color:#ec971f">Capitulos de libros</h5>
      </div>
      <div class="row">
        <div class="col-1"></div>
          <div class="col-10 pb-1" >
            <div class="list-group" >
              @for($cont = 0; $cont <$u['total_libros']; ++$cont)
              <a 
              @if($u['libros'][$cont]['link']== null)href="#"@endif
              @if($u['libros'][$cont]['link']!=null)href="{{$u['libros'][$cont]['link']}}" target='_blank'@endif
              class="list-group-item list-group-item-action">
              {{$u['libros'][$cont]['nombre']}}
              ({{$u['libros'][$cont]['fecha']}})
              </a>
              @endfor
            </div>
          </div>
        <div class="col-1"></div>
      </div>
    </div>
    @endif
    <!--Patentes-->
    @if($u['total_patentes']!=0)
    <div class="row">
      <div class="row px-4 py-3">
        <h5 class="p-2 ps-5" style="color:#ec971f">Patentes</h5>
      </div>
      <div class="row">
        <div class="col-1"></div>
          <div class="col-10 pb-1" >
            <div class="list-group" >
              @for($cont = 0; $cont <$u['total_patentes']; ++$cont)
              <a 
              @if($u['patentes'][$cont]['link']== null)href="#"@endif
              @if($u['patentes'][$cont]['link']!=null)href="{{$u['patentes'][$cont]['link']}}" target='_blank'@endif
              class="list-group-item list-group-item-action">
              {{$u['patentes'][$cont]['nombre']}}
              ({{$u['patentes'][$cont]['fecha']}})
              </a>
              @endfor
            </div>
          </div>
        <div class="col-1"></div>
      </div>
    </div>
    @endif
    <!--Otros-->
    @if($u['total_otros']!=0)
    <div class="row">
      <div class="row px-4 py-3">
        <h5 class="p-2 ps-5" style="color:#ec971f">Otros</h5>
      </div>
      <div class="row">
        <div class="col-1"></div>
          <div class="col-10 pb-1" >
            <div class="list-group" >
              @for($cont = 0; $cont <$u['total_otros']; ++$cont)
              <a 
              @if($u['otros'][$cont]['link']== null)href="#"@endif
              @if($u['otros'][$cont]['link']!=null)href="{{$u['otros'][$cont]['link']}}" target='_blank'@endif
              class="list-group-item list-group-item-action">
              {{$u['otros'][$cont]['nombre']}}
              ({{$u['otros'][$cont]['fecha']}})
              </a>
              @endfor
            </div>
          </div>
        <div class="col-1"></div>
      </div>
    </div>
    @endif
  <!-- Proyectos de investigacion-->
  <div class="row mt-4">
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


@endsection