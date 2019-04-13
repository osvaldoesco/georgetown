@extends('layout.site', ['page' => 'about_us'])

@section('content')
  <section class="home__students">
    <img class="img-md" alt="students" src="{{asset('img/user-index.png')}}">
    <h3 class="title">SI USTED ES UNO <span>DE NUESTROS ALUMNOS</span></h3>
    <p class="normal-text">
      QUIENES SOMOS
    </p>           
    <button class="site-button">
      Ir al login estudiantil 
      <i class="fas fa-arrow-right"></i>
    </button>
  </section>
@endsection