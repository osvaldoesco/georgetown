@extends('layout.site', ['page' => 'contact'])

@section('content')
  <section class="contact-us">
    <div class="contact__map-cont padding-vertical">
      <h3 class="title-decorated">
        CONTÁCTENOS
      </h3>
      <div id="map"></div>

  
      <div class="container message-cont">
        <div class="row">
          <div class="col-md-5 offset-md-1 contact__message">
            <h3 class="title">CONSULTENOS <span>LO QUE GUSTE</span></h3>    
            <p class="normal-text">
              Ingrese sus datos en los siguientes campos.
            </p>
            <form class="contact__form" method="POST" action="{{ route('contact.mail') }}">
              @csrf
              <div class="form-group">
                <input name="name" placeholder="Nombre completo" class="form-control"/>
              </div>
              <div class="form-group">
                <input name="email" placeholder="Correo electrónico" class="form-control"/>
              </div>
              <div class="form-group">
                <input name="subject" placeholder="Asunto" class="form-control"/>
              </div>
              <div class="form-group">
                <select class="form-control" name="course">
                  @foreach ($courses as $course)
                <option value="{{ $course->title }}" >{{ $course->title }}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="form-group">
                <textarea name="comment" placeholder="Mensaje" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Enviar" class="site-button" style="border-radius: 14px;"/>
              </div>
            </form>
            <div class="green-line visible-mobile"></div>
          </div>
          <div class="col-md-5">
            <div class="contact__information">
              <img alt="logo-info" src="{{ asset('img/logo-footer.png')}}" />
              <p class="normal-text">
                Centro comercial<br> 
                Loma Linda local D #31,<br>
                <span>San Salvador. El Salvador.</span>
              </p>
              <p class="blue-text">+(503) 2231 -1790 <br>+(503) 7680 - 5577</p>
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
      <button class="site-button">
        Ir al login estudiantil 
        <i class="fas fa-arrow-right"></i>
      </button>
    </div>
    <script>
      var map;
      var coords = {lat: 13.695148, lng: -89.23005};
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: coords,
          zoom: 15
        });
        var marker = new google.maps.Marker({
          position: coords,
          map: map,
          title: 'Plaza Loma Linda!'
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh573rWCdjV4EVcl6KKXN1vzKhHLceGsg&callback=initMap" async defer></script>
  </section>
@endsection