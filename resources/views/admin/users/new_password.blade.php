@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('users.new_password', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Contraseña:</label>
              <input type="text" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Contraseña" name="password" value="{{old('password')}}">
              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="lastname">Repetir contraseña:</label>
              <input type="text" class="form-control" placeholder="Confirmar contraseña" name="confirmation" value="{{old('confirmation')}}">
            </div>
            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
          </form>   
        </div>    
      </div>
    </div>
  </div>
@endsection