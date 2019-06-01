@extends('layout.admin')

@section('content')

  <style>
    .custom-file2{
      margin-top: 20px;
      margin-bottom: 20px;
    }
  </style>
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Título</label>
              <input type="text" class="form-control" placeholder="Título" name="title">
            </div>
            <div class="form-group">
              <label for="name">Pequeña descripción</label>
              <input type="text" class="form-control" placeholder="..." name="short_description">
            </div>
            <div class="form-group">
              <label for="name">Descripción</label>
              <textarea class="form-control" placeholder="..." name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="type">Tipo:</label>
                <select name="type" class="form-control">
                  <option value="1">Eventos</option>
                  <option value="2">Noticias</option>
                <select>
              </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" lang="es" id="custom-file-input" />
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
            </div>
            <div class="custom-file custom-file2">
              <input type="file" class="custom-file-input custom-file-input-2" name="small_image" lang="es" id="custom-file-input" />
              <label class="custom-file-label custom-file-label-2" for="customFileLang">Seleccionar Imagen Preview</label>
            </div>
            
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control" name="priority" placeholder="prioridad">
            </div>
            <br />
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="status" name="status" value='1' @if (old('status')=='1' ) checked @endif>
              <label class="form-check-label" for="status">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>   
        </div>    
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
      });
      $('.custom-file-input-2').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label-2').html(fileName);
      });
    });
  </script>   
@endsection