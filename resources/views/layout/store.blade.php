<!doctype html >
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GeorgeTown English</title>
    <meta 
      name="description" 
      content="Ayudamos a jóvenes y adultos a certificarse con la 
      mayor puntuación en pruebas TOEIC, TOEFL, SAT y 
      PRACTICAL ENGLISH en El Salvador."
    >
    <meta 
      name="keywords" 
      content="English Academy,academia de ingles,English,Toeic,Toefl,IBT,ITP,TOEFL,SAT, 
      PRACTICAL ENGLISH, ingles El Salvador"
    >

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 
  </head>
  <body class="site-body">
    <header>
      <div class="container">
        <div class="row">
          <div class="col-12 header-col">
            <nav class="navbar navbar-light navbar-expand-lg" id="app-header">
              <a class="navbar-brand" href="/"><img alt="logo" id="header__logo" src="{{ asset('img/logo-header.png')}}" /></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link {{ $page == 'about_us' ? 'active' : ''}}" href="{{ route('pages.about_us') }}">¿Quiénes Somos?</a>
                  <a class="nav-item nav-link {{ $page == 'schedules' ? 'active' : ''}}" href="{{ route('pages.schedules') }}">Horarios</a>
                  <a class="nav-item nav-link {{ $page == 'courses' ? 'active' : ''}}" href="{{ route('pages.courses') }}">Cursos</a>
                  <a class="nav-item nav-link {{ $page == 'events' ? 'active' : ''}}" href="{{ route('pages.events') }}">Eventos y noticias</a>
                  <a class="nav-item nav-link {{ $page == 'store' ? 'active' : ''}}" href="{{ route('pages.store') }}">Tienda <i class="fas fa-shopping-cart"></i></a>
                  <a class="nav-item nav-link {{ $page == 'contact' ? 'active' : ''}}" href="{{ route('pages.contact') }}">Contáctenos</a>
                  @if (Auth::check())
                    <a class="nav-item nav-link {{ $page == 'documents' ? 'active' : ''}}" href="/documents">Material de apoyo</a>
                    <a class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                      <div class="login-link">
                        <div class="gray-part">
                          <img alt="login" src="{{ asset('img/login.png') }}">
                          <label>Salir </label>
                        </div>
                        <i class="fas fa-sign-out-alt visible-desktop"></i>
                      </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  @else
                    <a class="" href="{{ route('pages.gt_login') }}">
                      <div class="login-link">
                        <div class="gray-part">
                          <img alt="login" src="{{asset('img/login.png')}}">
                          <label>Login Estudiantes </label>
                        </div>
                        <i class="fas fa-arrow-right visible-desktop"></i>
                      </div>
                    </a>
                  @endif
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <div class="content store-full-height">
      @yield('content')
    </div>

    <script src="{{ asset('js/app.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @yield('scripts-welcome')
  </body>
</html>
