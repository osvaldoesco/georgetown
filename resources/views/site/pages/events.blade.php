@extends('layout.site', ['page' => 'events'])

@section('content')
  <section class="events__list-container">
    <h3 class="title-decorated">
      EVENTOS
    </h3>
    <div class="container padding-vertical">
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
          <div class="events-box">
            <img alt="apertura" src="{{asset('img/estudiantes.jpg')}}" />
            <div class="events__caption">
              <h4>ESTUDIANTES CERTIFICADOS!!!</h4>
              <p class="date">2019/03/27</p>
              <p class="description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy...
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
    <h3 class="title-decorated">
      NOTICIAS
    </h3>
    <div class="container padding-top">
      <div class="row">
        <div class="col-12 col-lg-4">
          <div class="events-box">
            <img alt="apertura" src="{{asset('img/apertura.jpg')}}" />
            <div class="events__caption">
              <h4>GRAN APERTURA!!! ornd ere efdef efef GRAN APERTURA!!! GRAN APERTURA!!!</h4>
              <p class="date">2019/03/27</p>
              <p class="description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy... Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy...
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
        <div class="col-12 col-lg-4">
          <div class="events-box">
            <img alt="apertura" src="{{asset('img/estudiantes.jpg')}}" />
            <div class="events__caption">
              <h4>ESTUDIANTES CERTIFICADOS!!!</h4>
              <p class="date">2019/03/27</p>
              <p class="description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy...
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
  </section>

@endsection