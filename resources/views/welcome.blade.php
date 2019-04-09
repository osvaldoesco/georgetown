@extends('layout.site')

@section('content')
  <div class="home__slider">
    Slider
  </div>
  <div class="home__services">
      <h3 class="title-decorated">
        NUESTROS <span>SERVICIOS</span>
      </h3>
      <div class="container padding-vertical">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-3 square col-p-10">
              <div class="services-block">
                <h4 class="box-title">
                  CURSOS PARA 
                  CERTIFICACIÓN
                  TOEIC.
                </h4>
                <p class="box-text">
                  Ayudamos a generar una excelente 
                  puntuación en esta prueba que mide 
                  sus capacidades y competencias 
                  en el idioma.
                </p>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 square col-p-10">
              <div class="services-block--green">
                <h4 class="box-title">
                  CURSOS PARA 
                  CERTIFICACIÓN
                  TOEFL (ITP y IBT).
                </h4>
                <p class="box-text">
                  Le enseñamos como  obtener una 
                  puntuación excelente en esta prueba 
                  estandarizada de dominio del idioma 
                  ingles estadounidense.  
                </p>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 square col-p-10">
              <div class="services-block--gray">
                <h4 class="box-title">
                  CURSOS PARA 
                  CERTIFICACIÓN
                  SAT.
                </h4>
                <p class="box-text">
                  Le enseñamos y ayudamos a obtener 
                  el mayor puntaje en esta prueba 
                  de admisión aceptado por las 
                  universidades de Estados Unidos.  
                </p>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 square col-p-10">
              <div class="services-block--yellow">
                <h4 class="box-title">
                  CURSOS PARA 
                  CERTIFICACIÓN
                  GRAMMAR.
                </h4>
                <p class="box-text">
                  Le enseñamos como obtener un 
                  alto puntaje en la prueba para 
                  comprobar sus altos conocimientos en 
                  gramática  inglesa,  fácil y rápido.    
                </p>
                <i class="fas fa-arrow-right"></i>
              </div>
            </div> 
          </div>
        </div>
      <button class="site-button">
          Vea nuestra metodología
        <i class="fas fa-arrow-right"></i>
      </button>
    </div>
  <div class="home__events">
    <h3 class="title-decorated">
      EVENTOS <span>Y NOTICIAS</span>
    </h3>
    <div class="container padding-vertical">
      <div class="row">
        <div class="col-12 col-lg-4">
          Espacio 1
        </div>
        <div class="col-12 col-lg-4">
          Espacio 2
        </div>
        <div class="col-12 col-lg-4">
          Espacio 3
        </div>
      </div>
    </div>
  </div>
  <div class="home__students">
    <img class="img-md" alt="students" src="{{asset('img/user-index.png')}}">
    <h3 class="title">SI USTED ES UNO <span>DE NUESTROS ALUMNOS</span></h3>
    <p class="normal-text">
      Ingrese a nuestro sistema para poder obtener<br>
      nuestras guias según el curso que pertenezca.
    </p>           
    <button class="site-button">
      Ir al login estudiantil 
      <i class="fas fa-arrow-right"></i>
    </button>
  </div>
@endsection
