@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('principal_slider.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="title">Título</label>
              <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Título" name="title" value="{{old('title', $slide->title)}}">
              @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="description">Descripción</label>
              <textarea rows="3" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Descripción" name="description">{{old('description', $slide->description)}}</textarea>
              @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" lang="es">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen(1900x679)</label>
              @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
              <label>&nbsp;</label>
            </div>
            <br />
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('image_mobile') ? 'is-invalid' : '' }}" name="image_mobile" lang="es">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen image_mobile(480x846)</label>
              @if ($errors->has('image_mobile'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('image_mobile') }}</strong>
                </span>
              @endif
              <label>&nbsp;</label>
            </div>
            <div class="form-group">
              <label for="link">Enlace</label>
              <input type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" name="link" placeholder="Enlace" value="{{old('link', $slide->link)}}">
              @if ($errors->has('link'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('link') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{old('priority', $slide->priority)}}">
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" name="status" value='1' @if (old('status', $slide->status)=='1' ) checked @endif>
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