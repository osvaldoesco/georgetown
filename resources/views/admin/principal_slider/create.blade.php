@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('principal_slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Título</label>
              <input type="text" class="form-control" placeholder="Título" name="title">
            </div>
            <div class="form-group">
              <label for="description">Descripción</label>
              <textarea rows="3" class="form-control" placeholder="Descripción" name="description"></textarea>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" lang="es">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen(1900x679)</label>
            </div>
            <br />
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image_mobile" lang="es">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen image_mobile(480x846)</label>
            </div>
            <div class="form-group">
              <label for="link">Enlace</label>
              <input type="text" class="form-control" name="link" placeholder="Enlace">
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control" name="priority" placeholder="prioridad">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="status" name="status" value='1' @if (old('status')=='1' ) checked @endif>
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