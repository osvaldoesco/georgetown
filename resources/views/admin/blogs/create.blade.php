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
          <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Título</label>
              <input type="text" class="form-control" placeholder="Título" name="title" value="{{ old('priority') }}">
            </div>
            <div class="form-group">
              <label for="name">Pequeña descripción</label>
              <input type="text" class="form-control" placeholder="..." name="short_description" value="{{ old('short_description') }}">
            </div>
            <div class="form-group">
              <label for="name">Descripción</label>
              <textarea class="form-control  html-editor" placeholder="..." name="description" rows="5">
                {{ old('description') }}
              </textarea>
            </div>
            <div class="form-group">
              <label for="type">Tipo:</label>
              <select name="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
                <option value="1" {{ (old('type') == 1) ? 'selected' : ''}}>Eventos</option>
                <option value="2" {{ (old('type') == 2) ? 'selected' : ''}}>Noticias</option>
              <select>
            </div>
            <div class="form-group">
              <img src="#" alt="image1" class="preview-image-form d-none" id="target"/>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" lang="es" id="custom-file-input" value="{{ old('image') }}" onchange="putImage()" />
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
            </div>
            <div class="form-group">
              <img src="image2" alt="image2" class="preview-image-form d-none" id="target2"/>
            </div>
            <div class="custom-file custom-file2">
              <input type="file" class="custom-file-input custom-file-input-2" name="small_image" lang="es" id="custom-file-input-2" value="{{ old('small_image') }}" onchange="putImage2()"/>
              <label class="custom-file-label custom-file-label-2" for="customFileLang">Seleccionar Imagen Preview</label>
            </div>
            
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control" name="priority" placeholder="prioridad" value="{{ old('priority') }}">
            </div>
            <br />
            <div class="form-check check-cont">
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
      target.classList.remove('d-none');
      showImage(src, target);
    }
    function putImage2() {
      var src = document.getElementById("custom-file-input-2");
      var target = document.getElementById("target2");
      target.classList.remove('d-none');
      showImage(src, target);
    }
  </script>   
@endsection