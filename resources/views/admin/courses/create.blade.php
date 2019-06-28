@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Título</label>
              <input type="text" class="form-control" placeholder="Título" name="title">
            </div>
            <div class="form-group">
              <label for="name">Sección:</label>
              <select class="form-control" placeholder="..." name="section">
                <option value="0">Sin sección</option>
                <option value="1">Sección 1</option>
                <option value="2">Sección 2</option>
                <option value="3">Sección 3</option>
                <option value="4">Sección 4</option>
                <option value="5">Kids</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Título de sección:</label>
              <input type="text" class="form-control" placeholder="..." name="section_title">
            </div>
            <div class="form-group">
              <label for="name">Descripción de sección(Página de inicio):</label>
              <input type="text" class="form-control" placeholder="..." name="section_description">
            </div>
            <div class="form-group">
              <label for="name">Pequeña descripción(Lista de cursos):</label>
              <input type="text" class="form-control" placeholder="..." name="short_description">
            </div>
            <div class="form-group">
              <label for="name">Descripción(Página de detalle):</label>
              <textarea class="form-control html-editor normal-text" placeholder="..." name="description"></textarea>
            </div>
            <div class="form-group">
              <img src="#" alt="image1" class="preview-image-form d-none"  id="target"/>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" lang="es" id="custom-file-input" onchange="putImage()">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen(445x476)</label>
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
    
  </script>   
@endsection
