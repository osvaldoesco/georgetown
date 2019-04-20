@extends('layout.site', ['page' => 'about_us'])

@section('content')
  <section class="about-us-page">
    <div class="about-us__header">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3 class="title-decorated-left">
              QUIENES <span>SOMOS?</span>
            </h3>
          </div>
          <div class="col-md-6">
            Slider
          </div>
        </div>
      </div>
    </div>

    <div class="about-us__info padding-vertical">
      <div class="container">
        <div class="row">
          <div class="col-md-6 vertical-center justify-center">
            <img alt="mision" src="{{ asset('img/mision.png') }}" class="max-w-200"/>
          </div>
          <div class="col-md-6 p-left-0">
            <div class="white-cont">
              <h3 class="title-decorated-left">
                NUESTRA <span>MISIÓN</span> 
              </h3>
              <p class="p-justify">
                El origen de Georgetown English Academy se 
                remonta directamente a un aula en Seúl, Corea, 
                donde existen tremendas competencias entre los 
                proveedores de educación en inglés. Mientras daba 
                clases sobre temas cuantitativos avanzados sobre Toeic, 
                Toefl IBT&ITP y SAT, la fundadora fue acumulando la 
                metodología más efectiva con el proposito de llevar a sus 
                estudiantes a la puntuación deseada en poco tiempo. Ahora 
                considera que su misión es ayudar a los estudiantes en 
                El Salvador que están frustrados con las opciones convencionales 
                de preparación para Toeic, Toefl IBT, ITP y SAT. 
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 vertical-center justify-center order-md-2">
            <img alt="mision" src="{{ asset('img/vision.png') }}" class="max-w-200"/>            
          </div>
          <div class="col-md-6 p-right-0 order-md-1">
            <div class="white-cont">
              <h3 class="title-decorated-left">
                NUESTRA <span>VISIÓN</span> 
              </h3>
              <p class="p-justify">
                Georgetown English Academy aspira a convertirse en una empresa 
                multinacional de servicios educativos, centrada en la preparación 
                para TOEFL IBT&ITP, Toeic y SAT, servicios de consultoría tales 
                como admisiones a la universidad. Cuenta con una red de proveedores 
                de servicios altamente competentes en toda Inglaterra, Estados Unidos 
                y Asia. Las conferencias originales son ampliadas y modificadas por el 
                equipo de Georgetown English Academy para asegurar que Georgetown English 
                Academy ofrezca la preparación más eficiente en tiempo y costo disponible 
                para el Toeic, Toefl IBT, ITP y SAT. 
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="home__students">
      <img class="img-md" alt="students" src="{{asset('img/user-index.png')}}">
      <h3 class="title">SI USTED ES UNO <span>DE NUESTROS ALUMNOS</span></h3>
      <p class="normal-text">
        Ingrese a nuestro sistema para poder obtener 
        nuestras guias según el curso que pertenezca.
      </p>           
      <button class="site-button">
        Ir al login estudiantil 
        <i class="fas fa-arrow-right"></i>
      </button>
    </div>
  </section>
@endsection