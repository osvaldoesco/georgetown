@extends('layout.site', ['page' => 'schedules'])

@section('content')
  <section class="schedules__header-cont">
    <div class="schedules__header">
      <h3 class="title-decorated">
        NUESTROS <span>SERVICIOS</span>
      </h3>
      <img alt="schedules" src="{{ asset('img/horarios.png') }}" />
    </div>
    <div class="schedules__info">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h4 class="title-blue title-margin">CURSOS TOEFL (IBT & ITP), TOEIC, SAT, GRAMMAR.</h4>
            @if(count($weekly) > 0)
              <p class="title-gray title-margin">CLASES DÍAS DE SEMANA.</p>
              @foreach($weekly as $schedule)
                <p class="text-schedule title-margin">{{$schedule->start}} - {{$schedule->end}}</p>
              @endforeach
            @endif
            @if(count($saturday) > 0)
              <p class="title-gray title-margin">CLASES DÍAS SÁBADO.</p>
              @foreach($saturday as $schedule)
                <p class="text-schedule title-margin">{{$schedule->start}} - {{$schedule->end}}</p>
              @endforeach
            @endif
            @if(count($sunday) > 0)
              <p class="title-gray title-margin">CLASES DÍAS DOMINGO.</p>
              @foreach($sunday as $schedule)
                <p class="text-schedule title-margin">{{$schedule->start}} - {{$schedule->end}}</p>
              @endforeach
            @endif
          </div>
        </div>
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
 
    <div class="home__students">
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
    </div>
  </section>
@endsection