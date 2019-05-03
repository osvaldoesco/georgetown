<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GeorgeTown English</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 
  </head>
  <body>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-12 header-col">
            <nav class="navbar navbar-light navbar-expand-lg" id="app-header">
              <a class="navbar-brand" href="/"><img alt="logo" id="header__logo" src="{{ asset('img/logo-header.png')}}" /></a>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <div class="content decoration-page">
      <div class="wrapper">
        <nav id="sidebar">
          <div class="sidebar-header">
            <h3>George Admin</h3>
          </div>
          <ul class="list-unstyled components">
            <li>
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sliders</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                <a href="{{ route('principal_slider.index') }}">Principal</a>
                </li>
                <li>
                  <a href="{{ route('promotions.index') }}">Promociones</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="{{ route('members.index') }}">Miembros</a>
            </li>
            <li>
              <a href="#">Noticias y Eventos</a>
            </li>
            <li>
              <a href="{{ route('courses.index') }}">Cursos</a>
            </li>
          </ul>
        </nav>
        <div id="content">
          @yield('content')
          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
          </button>
        </div>
      </div>       
    </div>

    <div class="modal" id="confirm" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Confirmar eliminacion</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <p>Esta seguro que desea eliminar este registro?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-danger" id="delete-btn">Eliminar</button>
              <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin.js')}}"></script>    
    @yield('scripts')
  </body>
</html> 