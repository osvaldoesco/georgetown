@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="name">Título</label>
              <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Título" name="title" value="{{ old('title', $course->title) }}">
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Sección:</label>
              <select class="form-control" placeholder="..." name="section">
                <option value="0" @if($course->section == "0") {{'selected'}} @endif>Sin sección</option>
                <option value="1" @if($course->section == "1") {{'selected'}} @endif>Sección 1</option>
                <option value="2" @if($course->section == "2") {{'selected'}} @endif>Sección 2</option>
                <option value="3" @if($course->section == "3") {{'selected'}} @endif>Sección 3</option>
                <option value="4" @if($course->section == "4") {{'selected'}} @endif>Sección 4</option>
                <option value="5" @if($course->section == "5") {{'selected'}} @endif>Kids</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Título de sección(Página de inicio):</label>
              <input type="text" class="form-control" placeholder="..." name="section_title" value="{{ old('title', $course->section_title) }}">
            </div>
            <div class="form-group">
              <label for="name">Descripción de sección(Lista de cursos):</label>
              <input type="text" class="form-control" placeholder="..." name="section_description" value="{{ old('section_description', $course->section_description) }}">
            </div>
            <div class="form-group">
              <label for="name">Pequeña descripción(Página de detalle):</label>
              <input type="text" class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" placeholder="..." name="short_description" value='{{ old('short_description', $course->short_description) }}'>
              @if ($errors->has('short_description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('short_description') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Descripción</label>
              <textarea class="form-control html-editor normal-text {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="..." name="description">{{ old('description', $course->description) }}</textarea>
              @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              @if($course->image)
                <img src="{{ asset($course->image) }}" alt="image" class="preview-image-form"  id="target" />
              @endif
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" lang="es" id="custom-file-input" onchange="putImage()">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen(445x476)</label>
              @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{ old('priority', $course->priority) }}"/>
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
            </div>
            <br />
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="status" name="status" value='1' @if (old('status', $course->status)=='1' ) checked @endif>
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

      $('#sn-description,.html-editor').summernote({
        rows: 5,
        placeholder: 'Escribe aquí',
        colors: [
            ['#476fb3', '#49dfc7', '#cccccc', '#ffeec7', '#ff1751','#ffffff', '#000000', '#c0392b'], //first line of colors
            ['#808080', '#ffffff', '#cecece', '#BDBDBD', 'red', 'blue', 'yellow', 'orange'] //second line of colors
        ],
        toolbar: [
          [ 'style', [ 'style' ] ],
          [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough'] ],
          [ 'fontname', [ 'fontname' ] ],
          [ 'fontsize', [ 'fontsize' ] ],
          [ 'color', [ 'color' ] ],
          [ 'para', [ 'ol', 'ul', 'paragraph'] ],
          [ 'table', [ 'table' ] ],
          [ 'insert', [ 'link'] ],
          [ 'view', [ 'undo', 'codeview'] ]
      ]});
    });

    function showImage(src, target) {
      var fr = new FileReader();
      fr.onload = function(){
        target.src = fr.result;
      }
      fr.readAsDataURL(src.files[0]);
    }

    function putImage() {
      var src = document.getElementById("custom-file-input");
      var target = document.getElementById("target");
      showImage(src, target);
    }
  </script>   
@endsection