@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Nombre" name="name" value="{{old('name', $user->name)}}">
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="lastname">Apellido</label>
              <input type="text" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" placeholder="Apellido" name="lastname" value="{{old('lastname', $user->lastname)}}">
              @if ($errors->has('lastname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('lastname') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" name="email" value="{{old('email', $user->email)}}">
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="no_encript_pass">Contraseña(Solo al generar usuario):</label>
              <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Contraseña generada" name="no_encript_pass" value="{{old('no_encript_pass', $user->no_encript_pass)}}">
              @if ($errors->has('no_encript_pass'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('no_encript_pass') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value='1' @if (old('is_admin', $user->is_admin)=='1' ) checked @endif>
              <label class="form-check-label" for="status">Es administrador?</label>
            </div>
              @if ($errors->has('is_admin'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('is_admin') }}</strong>
                </span>
              @endif
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>   
        </div>    
      </div>
    </div>
  </div>
@endsection