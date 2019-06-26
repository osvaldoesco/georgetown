@extends('layout.admin')

@section('content')

  <style>
    .custom-file2{
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .check-cont{
      margin-bottom: 20px;
    }
  </style>
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('blogs.update', $blog->id) }}) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="name">Título</label>
              <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Título" name="title" value="{{ old('title', $blog->title) }}">
              @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Pequeña descripción</label>
              <input type="text" class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" placeholder="..." name="short_description" value="{{ old('short_description', $blog->short_description) }}">
              @if ($errors->has('short_description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('short_description') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Descripción</label>
              <textarea class="form-control  html-editor normal-text" placeholder="..." name="description" rows="5">
                {{ old('description', $blog->description) }}
              </textarea>
            </div>
            <div class="form-group">
              <label for="type">Tipo:</label>
              <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" >
                <option value="1" {{ (old('type', $blog->type) == 1) ? 'selected' : ''}}>Eventos</option>
                <option value="2" {{ (old('type', $blog->type) == 2) ? 'selected' : ''}}>Noticias</option>
              </select>
              @if ($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('type') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Fecha:</label>
            <input type="date" class="date-picker form-control" id="programmed_date" name="programmed_date" value="{{ $blog->programmed_date }}">
            </div>
            <div class="form-group">
              @if($blog->image)
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="preview-image-form" id="target"/>
              @endif
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" lang="es" id="custom-file-input" value="{{ old('image') }}" onchange="putImage()"/>
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
              @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              @if($blog->small_image)
                <img src="{{ asset($blog->small_image) }}" alt="{{ $blog->title }}" class="preview-image-form2"  id="target2"/>
              @endif
            </div>
            <div class="custom-file custom-file2">
              <input type="file" class="custom-file-input custom-file-input-2 {{ $errors->has('small_image') ? 'is-invalid' : '' }}" name="small_image" lang="es" id="custom-file-input-2" value="{{ old('small_image') }}" onchange="putImage2()"/>
              <label class="custom-file-label custom-file-label-2" for="customFileLang">Seleccionar Imagen Preview</label>
              @if ($errors->has('small_image'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('small_image') }}</strong>
                </span>
              @endif
            </div>
            
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{ old('priority', $blog->priority) }}">
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
            </div>
            <br />
            <div class="form-check check-cont">
              <input type="checkbox" class="form-check-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" name="status" value='1'@if (old('status', $blog->status)=='1' ) checked @endif>
              <label class="form-check-label" for="status">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary ">Guardar</button>
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
      function putImage2() {
        var src = document.getElementById("custom-file-input-2");
        var target = document.getElementById("target2");
        showImage(src, target);
      }
  </script>   
@endsection