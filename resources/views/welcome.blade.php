@extends('layout.site', ['page' => ''])

@section('content')
  <div class="home-page">
    <div class="home__slider visible-desktop">
      @foreach ($principal_slider as $item)
        <div class="slide-item">
          <div class="slide-caption">
            <h3> {{ $item->title }} </h3>
            <p>
              {{ $item->description }}
            </p>
            <a href="{{ $item->link }}">
              <button class="site-button">
                Conocer más
                <i class="fas fa-arrow-right"></i>
              </button>
            </a>
          </div>
          <img alt="slider" src="{{ asset($item->image) }}" />
        </div>  
      @endforeach
    </div>
    <div class="home__slider-mobile visible-mobile">
      @foreach ($principal_slider as $item)
        <div class="slide-item">
          <div class="slide-caption-mb">
            <h3> {{ $item->title }} </h3>
            <p>
              {{ $item->description }}
            </p>
            <a href="{{ $item->link }}">
              <button class="site-button">
                Conocer más
                <i class="fas fa-arrow-right"></i>
              </button>
            </a>
          </div>
          <img alt="slider-mobile" src="{{ asset($item->image_mobile) }}" />
        </div>
      @endforeach
    </div>
    <div class="home__services">
        <h3 class="title-decorated">
          NUESTROS <span>SERVICIOS</span>
        </h3>
        <div class="container padding-vertical">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-3 square col-p-10 services-cont">
                <div class="services-block">
                  <img alt="decorate" src="{{ asset('img/course-decoration2.png') }}" class="course-decoration" />
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
              <div class="col-12 col-md-6 col-lg-3 square col-p-10 services-cont">
                <div class="services-block--green">
                  <img alt="decorate" src="{{ asset('img/course-decoration.png') }}" class="course-decoration" />
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
              <div class="col-12 col-md-6 col-lg-3 square col-p-10 services-cont">
                <div class="services-block--gray">
                  <img alt="decorate" src="{{ asset('img/course-decoration.png') }}" class="course-decoration" />
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
              <div class="col-12 col-md-6 col-lg-3 square col-p-10 services-cont">
                <div class="services-block--yellow">
                  <img alt="decorate" src="{{ asset('img/course-decoration.png') }}" class="course-decoration" />
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
            <div class="row kids-course">
              <div class="col-md-6 p-right-5">
                <div class="kids-img">
                <img alt="kids classes" src="{{ asset('img/kids.png') }}" />
                </div>
              </div>
              <div class="col-md-6 vertical-center p-left-5">
                <div class="kids-link-cont">
                  <i class="fas fa-arrow-right"></i>
                  <img alt="decorate" src="{{ asset('img/course-decoration2.png') }}" class="course-decoration" />
                  <div class="kids-link">
                    <h3>ENGLISH CLASSES</h3>
                    <h3 class="second">For children</h3>
                  </div>
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
      <div class="container padding-top">
        <div class="row">
          <div class="col-12 col-lg-4">
            <div class="events-box">
              <img alt="apertura" src="{{asset('img/apertura.jpg')}}" />
              <div class="events__caption">
                <h4>GRAN APERTURA!!! ornd ere efdef efef GRAN APERTURA!!! GRAN APERTURA!!!</h4>
                <p class="date">2019/03/27</p>
                <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy... Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy...</p>
                <div class="btn-event-cont">
                  <button class="site-button">
                    Leer más
                    <i class="fas fa-arrow-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="events-box">
              <img alt="apertura" src="{{asset('img/estudiantes.jpg')}}" />
              <div class="events__caption">
                <h4>ESTUDIANTES CERTIFICADOS!!!</h4>
                <p class="date">2019/03/27</p>
                <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy...
                </p>
                <div class="btn-event-cont">
                  <button class="site-button">
                    Leer más
                    <i class="fas fa-arrow-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="slider-events">
              @foreach ($promotions as $promotion)
                <div><img alt="{{ $promotion->title }}" src="{{ asset($promotion->image)}}" /></div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="button-cont-less">
        <button class="site-button">
          Vea nuestra metodología
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>     
  </div>
  <section class="home__students">
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
  </section>
@endsection
