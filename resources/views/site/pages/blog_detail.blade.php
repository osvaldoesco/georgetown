@extends('layout.site', ['page' => 'blog_detail'])

@section('content')
  <section class="blog-detail">
    <div class="blog-content padding-vertical">
      <div class="container  ">
        <div class="row">
          <div class="col-md-6">
            Imagen
          </div>
          <div class="col-md-6">
            Titulo
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            Descripción
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