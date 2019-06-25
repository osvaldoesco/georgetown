@extends('layout.site', ['page' => 'about_us'])

@section('content')
  <section class="about-us-page">
    <div class="about-us__header">
      <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 offset-lg-0 col-lg-6 p-right-0">
              <div class="white-cont">
                <h3 class="title-decorated-left">
                  QUIENES <span>SOMOS?</span> 
                </h3>
                <p class="p-justify">
                  Georgetown English Academy, fundada en 2019, está dirigida 
                  actualmente por un equipo de graduados de las escuelas más 
                  prestigiosas de Estados Unidos y El Salvador. A diferencia 
                  de la mayoría de nuestros competidores, los instructores de 
                  TOEFL IBT&ITP, TOEIC, SAT prep de Georgetown English Academy 
                  tienen un historial inigualable de logros académicos, 
                  experiencias de enseñanza en el area de  TOEFL y éxito 
                  profesional después de graduarse en escuelas de primera clase. 
                  Georgetown English Academy ofrece la preparación más eficiente y 
                  rentable disponible para el Toeic, Toefl IBT, ITP y SAT. 
                </p>
              </div>
            </div>
          <div class="col-md-8 offset-md-2 offset-lg-0 col-lg-6 p-left-0 about-us__slider-cont">
            <div class="about-us__slider">
              @foreach($about_sliders as $about_slider)
                <div><img alt="{{ $about_slider->name }}" src="{{ asset($about_slider->image) }}" /></div>
              @endforeach
            </div>
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

    <div class="">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="disting">
            <img alt="decoration" class="right-decoration" src="{{ asset('img/schedules_right.png') }}" />
              <p class="schedules-text">
                Lo que distingue a Georgetown English Academy no es sólo su 
                incomparable calidad y métodos  de enseñanza, materiales de 
                estudio y servicio de asesoría, sino una verdadera dedicación 
                a las necesidades individuales y una búsqueda interminable de 
                la excelencia para sus clientes. 
              </p>
              <div class="btn-cont">
                <a href="/contacto">
                  <button class="site-button">
                    Contáctenos
                    <i class="fas fa-arrow-right"></i>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="about-us__team">
      <h3 class="title-decorated">TEAM <span>GEORGETOWN</span> </h3>
      <div class="container">
        <div class="row">
          @foreach ($members as $member)
            <div class="col-md-6 col-lg-3">
              <div class="teacher-cont">
                <img alt="{{ $member->name }}" src="{{ asset($member->picture) }}" />
                <label class="position"> {{ $member->position }} </label>
              </div>
            </div>
          @endforeach  
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
      <a href="{{ Auth::check() ? '/documents' : '/gt_login' }}" >
        <button class="site-button">
          {{ Auth::check() ? 'Ir a material de apoyo' : 'Ir al login estudiantil' }}
          <i class="fas fa-arrow-right"></i>
        </button>
      </a>
    </div>
  </section>
@endsection