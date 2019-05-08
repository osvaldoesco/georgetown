@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('promotions.update', $promotion->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="title">Título</label>
              <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Título" name="title" value="{{old('title', $promotion->title)}}">
              @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" lang="es">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen(417x468)</label>
              @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{old('priority', $promotion->priority)}}">
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
          </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" name="status" value='1' @if (old('status')=='1' ) checked @endif>
              <label class="form-check-label" for="status">Activo</label>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>   
        </div>    
      </div>
    </div>
  </div>
@endsection