<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GeorgeTown English</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-12 header-col">
            <nav class="navbar navbar-light navbar-expand-lg" id="app-header">
              <a class="navbar-brand"><img alt="logo" id="header__logo" src="{{ asset('img/logo-header.png')}}" /></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="#">¿Quiénes Somos?</a>
                  <a class="nav-item nav-link" href="#">Horarios</a>
                  <a class="nav-item nav-link" href="#">Cursos</a>
                  <a class="nav-item nav-link" href="#">Blog</a>
                  <a class="nav-item nav-link active" href="#">Contáctenos</a>
                  <a class="" href="#">
                    <div class="login-link">
                      <div class="gray-part">
                        <img alt="login" src="{{asset('img/login.png')}}">
                        <label>Login Estudiantes </label>
                      </div>
                      <i class="fas fa-arrow-right visible-desktop"></i>
                    </div>
                  </a>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <div class="content">
      @yield('content')
    </div>
    <img alt="decoration" class="footer-decoration visible-desktop" src="{{ asset('img/footer-decoration.png') }}">
    <img
      alt="decoration-mobile"
      class="footer-decoration-mb visible-mobile"
      src="{{ asset('img/footer-decoration-mb.png') }}">
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-2 text-center text-lg-left">
            <img alt="logo" id="footer__logo" src="{{ asset('img/logo-footer.jpg')}}" />
          </div>
          <div class="col-12 col-lg-8 text-center">
            <div class="footer__menu">
              <div><a href="#">¿Quienes somos?</a></div>
              <div><a href="#">Nuestros servicios</a></div>
              <div><a href="#">Noticias</a></div>
              <div><a href="#"class="active">Contáctanos</a></div>
              <div class="div-clear-mb"></div>
            </div>
            <p class="footer__address">
              Centro comercial loma linda local D #31, <b>San Salvador</b>
              <span> +(503) 7851 - 7268 </span>
            </p>
          </div>
          <div class="col-12 col-lg-2 text-right">
            <ul class="footer__social">
              <li class="social-item social-insta">
                <a href="" ><img alt="insta" src="{{ asset('img/insta.png')}}" /></a>
              </li>
              <li class="social-item social-fb">
                <a href="" ><img alt="fb" src="{{ asset('img/fb.png')}}" /></a>
              </li>
              <li class="social-item social-mail">
                <a href="" ><img alt="mail" src="{{ asset('img/mail.png')}}" /></a>
              </li>
            <ul>
          </div>
        </div>
      </div>
    </footer>
    <script src="{{ asset('js/app.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  </body>
</html>
