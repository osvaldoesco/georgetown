@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Título</label>
              <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Título" name="title" value="{{old('title')}}">
              @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <img src="#" alt="image2" class="preview-image-form d-none"  id="target"/>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" lang="es" id="custom-file-input" onchange="putImage()">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen(417x468)</label>
              @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{old('priority')}}">
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
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
  </script>
@endsection