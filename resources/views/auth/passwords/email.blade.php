@extends('layout.site', ['page'=> 'login'])

@section('content')
<section class="documents-cont">
  <div class="container padding-vertical">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Restablecer contraseña.</div>

          <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                  Hemos enviado un enlace a tu Email!.
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Dirección Email:</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Enviar email
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
