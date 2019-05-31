@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" placeholder="Nombre" name="name">
            </div>
            <div class="form-group">
              <label for="description">Descripción</label>
              <textarea class="form-control" placeholder="..." name="description"></textarea>
            </div>
            <div class="form-group">
              <label for="type">Tipo</label>
              <select class="form-control" name="type" placeholder="Seleccionar tipo">
                <option value="1">Audio</option>
                <option value="2">PDF</option>
                <option value="3">Video</option>
                <option value="4">Word</option>
                <option value="5">Zip</option>
                <option value="6">Otro</option>
              </select>
            </div>
            <div class="form-group">
              <label for="course_id">Tipo</label>
              <select class="form-control" name="course_id" placeholder="Seleccionar tipo">
                @foreach ($courses as $course)
                  <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="duration">Duración:</label>
              <input type="text" class="form-control" placeholder="00:00" name="duration">
            </div>
            <div class="form-group">
              <label for="pages">Paginas:</label>
              <input type="number" class="form-control" placeholder="10" name="pages">
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="file" lang="es" id="custom-file-input">
              <label class="custom-file-label" for="file">Seleccinar archivo</label>
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
      })
    });
  </script>   
@endsection