@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Nombre:</label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Nombre" name="name" value="{{ old('name', $document->name) }}">
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="description">Descripción</label>
              <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="..." name="description">{{ old('description', $document->description) }}</textarea>
              @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="type">Tipo</label>
              <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" placeholder="Seleccionar tipo">
                <option value="1" @if($document->type == "1") {{'selected'}} @endif>Audio</option>
                <option value="2" @if($document->type == "2") {{'selected'}} @endif>PDF</option>
                <option value="3" @if($document->type == "3") {{'selected'}} @endif>Video</option>
                <option value="4" @if($document->type == "4") {{'selected'}} @endif>Word</option>
                <option value="5" @if($document->type == "5") {{'selected'}} @endif>Zip</option>
                <option value="6" @if($document->type == "6") {{'selected'}} @endif>Otro</option>
              </select>
              @if ($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('type') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="course_id">Curso</label>
              <select class="form-control {{ $errors->has('course_id') ? 'is-invalid' : '' }}" name="course_id">  
                @foreach ($courses as $course)
                  <option value="{{ $course->id }}" @if($document->course_id == $course->id) }}) {{'selected'}} @endif>{{ $course->title }}</option>
                @endforeach
              </select>
              @if ($errors->has('course_id'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('course_id') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="duration">Duración:</label>
              <input type="text" class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" placeholder="00:00" name="duration" value="{{ old('duration', $document->duration) }}">
              @if ($errors->has('duration'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('duration') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="pages">Paginas:</label>
              <input type="number" class="form-control {{ $errors->has('pages') ? 'is-invalid' : '' }}" placeholder="10" name="pages" value="{{ old('pages', $document->pages) }}">
              @if ($errors->has('pages'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('pages') }}</strong>
                </span>
              @endif
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('file') ? 'is-invalid' : '' }}" name="file" lang="es" id="custom-file-input">
              <label class="custom-file-label" for="file">Seleccinar archivo</label>
              @if ($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('file') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{ old('priority', $document->priority) }}" />
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
            </div>
            <br />
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="status" name="status" value='1' @if (old('status', $course->status)=='1' ) checked @endif />
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