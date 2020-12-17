@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Título</label>
              <input type="text" class="form-control" placeholder="Título" name="title">
            </div>
            <div class="form-group">
              <label for="name">Pequeña descripción(Lista de cursos):</label>
              <input type="text" class="form-control" placeholder="..." name="short_description">
            </div>
            <div class="form-group">
              <label for="name">Descripción(Página de detalle):</label>
              <textarea class="form-control" placeholder="..." name="description"></textarea>
            </div>
            <div class="form-group">
              <label for="price">Precio:</label>
              <input type="number" step=".01" class="form-control" id="price"  name="price" placeholder="Precio">
            </div>
            <div class="form-check mb-15">
              <input type="checkbox" class="form-check-input" id="discount" name="discount" value='1' @if (old('discount')=='1' ) checked @endif>
              <label class="form-check-label" for="status">Descuento</label>
            </div>
            <div class="form-group new-price-container">
              <label for="priority">Nuevo Precio</label>
              <input type="number" step=".01" class="form-control" name="discount_value" placeholder="Nuevo Precio">
            </div>
            <div class="form-group">
              <label for="priority">Enlace de Pago:</label>
              <input type="text" class="form-control" name="payment_link" placeholder="Enlace">
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control" name="priority" placeholder="prioridad">
            </div>
            <div class="form-group">
              <label for="name">Imagen:</label>
              <img src="#" alt="image1" class="preview-image-form d-none"  id="target"/>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" lang="es" id="custom-file-input" onchange="putImage()">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen(260x260 o imagen de dimensiones iguales)</label>
            </div>
            <div class="form-group">
              <label></label>
              <br />
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="status" name="status" value='1' @if (old('status')=='1' ) checked @endif>
              <label class="form-check-label" for="status">Activo</label>
            </div>
            <div class="form-group">
              <label></label>
              <br />
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>   
        </div>    
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
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

    $('#discount').change(function() {
      if(this.checked) {
        $('.new-price-container').show();
      } else {
        $('.new-price-container').hide();
      }     
    });
  </script>   
@endsection
