@extends('admin.layouts.main')
@section('contenido')

<div class="container text-center">
  <h2 class="p-3">Bienvenido a la plataforma del departamento de investigación de ITSNCG</h2>
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://eldiariodelnoroeste.mx/cg/media/uploads/galeria/2021/01/04/20210104053946399-0-1748185.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/ITSNCG.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="http://i.pinimg.com/736x/b3/d1/de/b3d1de17adf2dceb3f509bd003b52e44.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

@endsection

