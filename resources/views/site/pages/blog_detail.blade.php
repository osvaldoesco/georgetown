@extends('layout.site', ['page' => 'events'])

@section('content')
  <section class="blog-detail">
    <div class="blog-content padding-vertical">
      <div class="container  ">
        <div class="row">
          <div class="col-md-12 padding-vertical-20">
            <h3 class="title-decorated  text-center">
              {{ $event->title }}
            </h3>
          </div>
          <div class="col-md-12 padding-vertical-20 text-center">
            <img alt="{{ $event->name }}" src="{{ asset($event->image) }}" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 padding-vertical-20 normal-text">
            {!!$event->description !!}
          </div>
        </div>
      </div>
    </div>
    <div class="blog-related padding-vertical">
      <div class="container">
        <div class="row">
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
        </div>
      </div>
    </div>
  </section>
@endsection