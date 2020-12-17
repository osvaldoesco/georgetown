@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="name">Título</label>
              <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Título" name="title" value="{{ old('title', $product->title) }}">
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Pequeña descripción(Página de detalle):</label>
              <input type="text" class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" placeholder="..." name="short_description" value='{{ old('short_description', $product->short_description) }}'>
              @if ($errors->has('short_description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('short_description') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Descripción</label>
              <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="..." name="description">{{ old('description', $product->description) }}</textarea>
              @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="price">Precio:</label>
              <input type="number" step=".01" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" id="price" name="price" placeholder="Precio" value="{{ old('priority', $product->price) }}">
              @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('price') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-check mb-15">
              <input type="checkbox" class="form-check-input" id="discount" name="discount" value='1' @if (old('discount', $product->discount)=='1' ) checked @endif>
              <label class="form-check-label" for="status">Descuento</label>
            </div>
            <div class="form-group new-price-container">
              <label for="discount_value">Nuevo Precio</label>
              <input type="number" step=".01" class="form-control {{ $errors->has('discount_value') ? 'is-invalid' : '' }}" name="discount_value" placeholder="Nuevo Precio" value="{{ old('discount_value', $product->discount_value) }}">
              @if ($errors->has('discount_value'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('discount_value') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Enlace de Pago:</label>
              <input type="text" class="form-control {{ $errors->has('payment_link') ? 'is-invalid' : '' }}" name="payment_link" placeholder="Enlace" value="{{ old('payment_link', $product->payment_link) }}">
              @if ($errors->has('payment_link'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('payment_link') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{ old('priority', $product->priority) }}"/>
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              @if($product->image)
                <img src="{{ asset($product->image) }}" alt="image" class="preview-image-form"  id="target" />
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
              <label></label>
              <br />
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="status" name="status" value='1' @if (old('status', $product->status)=='1' ) checked @endif>
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
      showImage(src, target);
    }

    $('#discount').change(function() {
      if(this.checked) {
        $('.new-price-container').show();
      } else {
        $('.new-price-container').hide();
      }     
    });

    $(document).ready(function() {
      console.log('a', $('#discount').is(':checked'));
      if($('#discount').is(':checked')) {
        $('.new-price-container').show();
      } else {
        $('.new-price-container').hide();
      }  
    });
  </script>   
@endsection