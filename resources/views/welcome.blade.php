@extends('layout.site', ['page' => ''])

@section('content')
  <div class="home-page">
    @if (session()->has('success'))
      <div class="gt-message">
        <div class="gt-message__content">
          <i class="fas fa-times gt-exit"></i>
          <h3>Mensaje enviado correctamente!</h3>
          <p>Nos pondremos en contacto contigo!</p>
          <img alt="decorate" src="{{ asset('img/course-decoration2.png') }}" class="course-decoration" />
        </div>
      </div>
    @endif
    <div class="home__slider visible-desktop">
      @foreach ($principal_slider as $item)
        <div class="slide-item">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="new-caption">
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
                </div>
              </div>
            </div>
          </div>
          <img alt="slider" class="slider-desktop-image" src="{{ asset($item->image) }}" />
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
                  @if($course1)
                    <h4 class="box-title">
                      <a href="{{route('pages.course_detail', $course1->id) }}">{{ $course1->section_title }}</a>
                    </h4>
                    <p class="box-text">
                      {{ $course1->section_description }}
                    </p>
                    <a href="{{route('pages.course_detail', $course1->id) }}">
                      <i class="fas fa-arrow-right"></i>
                    </a>
                  @else
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
                  @endif
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 square col-p-10 services-cont">
                <div class="services-block--green">
                  <img alt="decorate" src="{{ asset('img/course-decoration.png') }}" class="course-decoration" />
                  @if($course2)
                    <h4 class="box-title">
                      <a href="{{route('pages.course_detail', $course2->id) }}">{{ $course2->section_title }}</a>
                    </h4>
                    <p class="box-text">
                      {{ $course2->section_description }}
                    </p>
                    <a href="{{route('pages.course_detail', $course2->id) }}">
                      <i class="fas fa-arrow-right"></i>
                    </a>
                  @else
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
                  @endif
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 square col-p-10 services-cont">
                <div class="services-block--gray">
                  <img alt="decorate" src="{{ asset('img/course-decoration.png') }}" class="course-decoration" />
                  @if($course3)
                    <h4 class="box-title">
                      <a href="{{route('pages.course_detail', $course3->id) }}">{{ $course3->section_title }}</a>
                    </h4>
                    <p class="box-text">
                      {{ $course3->section_description }}
                    </p>
                    <a href="{{route('pages.course_detail', $course3->id) }}">
                      <i class="fas fa-arrow-right"></i>
                    </a>
                  @else
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
                  @endif
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 square col-p-10 services-cont">
                <div class="services-block--yellow">
                  <img alt="decorate" src="{{ asset('img/course-decoration.png') }}" class="course-decoration" />
                  @if($course4)
                    <h4 class="box-title gray-title-i">
                      <a href="{{route('pages.course_detail', $course4->id) }}">{{ $course4->section_title }}</a>
                    </h4>
                    <p class="box-text">
                      {{ $course4->section_description }}
                    </p>
                    <a href="{{route('pages.course_detail', $course4->id) }}">
                      <i class="fas fa-arrow-right"></i>
                    </a>
                  @else
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
                  @endif
                </div>
              </div> 
            </div>
            <div class="row kids-course">
              @if($course5)
                <div class="col-md-6 p-right-5">
                  <div class="kids-img">
                    <a href="{{route('pages.course_detail', $course5->id) }}">
                      <img alt="kids classes" src="{{ asset('img/kids.png') }}" />
                    </a>
                  </div>
                </div>
                <div class="col-md-6 vertical-center p-left-5">
                  <div class="kids-link-cont">
                    <a href="{{route('pages.course_detail', $course5->id) }}">
                      <i class="fas fa-arrow-right"></i>
                    </a>
                    <img alt="decorate" src="{{ asset('img/course-decoration2.png') }}" class="course-decoration" />
                    <div class="kids-link">
                      <a href="{{route('pages.course_detail', $course5->id) }}">
                        <h3>ENGLISH CLASSES</h3>
                        <h3 class="second for-kids-font">For children</h3>
                      </a>
                    </div>
                  </div>
                </div>
              @endif
            </div>

          </div>
        <a href="{{ route('pages.methodology')}}">
          <button class="site-button">
            Vea nuestra metodología
            <i class="fas fa-arrow-right"></i>
          </button>
        </a>
      </div>
    <div class="home__events">
      <h3 class="title-decorated">
        EVENTOS <span>Y NOTICIAS</span>
      </h3>
      <div class="container padding-top">
        <div class="row">
          @foreach ($events as $event)
            <div class="col-12 col-lg-4">
              <div class="events-box">
              <img alt="{{$event->title}}" src="{{asset($event->small_image)}}" />
                <div class="events__caption">
                  <h4>{{$event->title}}</h4>
                  <p class="date">{{ $event->getFormatedDate() }}</p>
                  <p class="description">
                    {{ $event->short_description }}
                  </p>
                  <div class="btn-event-cont">
                    <a href="{{ route('pages.blog_detail', ['slug' => $event->slug]) }}">
                      <button class="site-button">
                        Leer más
                        <i class="fas fa-arrow-right"></i>
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
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
        <a href="{{ route('pages.methodology')}}">
          <button class="site-button">
            Vea nuestra metodología
            <i class="fas fa-arrow-right"></i>
          </button>
        </a>
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
    <a href="{{ Auth::check() ? '/documents' : '/gt_login' }}" >
      <button class="site-button">
        {{ Auth::check() ? 'Ir a material de apoyo' : 'Ir al login estudiantil' }}
        <i class="fas fa-arrow-right"></i>
      </button>
    </a>
  </section>
@endsection

@if (session()->has('success'))
  @section('scripts-welcome')
    <script>
      $('.gt-message').fadeIn(300);
      setTimeout(function(){
        $('.gt-message').fadeOut(300);
      }, 5000);
      $('.gt-exit').click(function(){
        $('.gt-message').fadeOut(300);
      });
    </script>
  @endsection
@endif