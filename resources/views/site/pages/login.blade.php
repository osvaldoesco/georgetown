@extends('layout.site', ['page'=> 'login'])

@section('content')
<section class="documents-cont login-cont">
  <div class="container">
    <div class="row">
      <div class=" col-10 offset-1 col-md-6 offset-md-3 padding-vertical-20">
        <div class="home__students">
          <img class="img-md" alt="students" src="{{asset('img/user-index.png')}}">
          <p class="normal-text">
            Ingrese a nuestro sistema para poder obtener<br>
            nuestras guias según el curso que pertenezca.
          </p>           
        </div>

        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group row">
            <div class="col-md-4 text-left text-md-right">
              <label for="email" class="float-left float-md-right col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            </div>
            <div class="col-md-7">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-4 text-left text-md-right">
              <label for="password" class="float-left float-md-right col-form-label text-md-right">{{ __('Password') }}</label>
            </div>
            <div class="col-md-7">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} w-100p" name="password" required>

              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6 offset-md-5">
              <div class="form-check text-left text-md-right">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  Recordarme.
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row mb-0 text-right">
            <div class="col-md-7 offset-md-4">
              <button type="submit" class="btn site-button">
                Ingresar&nbsp;
                <i class="fas fa-arrow-right"></i>
              </button>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-11 text-right padding-vertical-20">
              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  Olvidaste tu contraseña?
                </a>
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection 