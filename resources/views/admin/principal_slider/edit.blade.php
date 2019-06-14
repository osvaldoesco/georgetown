@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('principal_slider.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="title">Título</label>
              <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Título" name="title" value="{{old('title', $slide->title)}}">
              @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="description">Descripción</label>
              <textarea rows="3" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Descripción" name="description">{{old('description', $slide->description)}}</textarea>
              @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              @if($slide->image)
                <img src="{{ asset($slide->image) }}" alt="image1" class="preview-image-form2"  id="target"/>
              @endif
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" id="custom-file-input" name="image" lang="es" onchange="putImage()">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen(1900x679)</label>
              @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
              <label>&nbsp;</label>
            </div>
            <br />
            <div class="form-group">
              @if($slide->image_mobile)
                <img src="{{ asset($slide->image_mobile) }}" alt="image2" class="preview-image-form2"  id="target2"/>
              @endif
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('image_mobile') ? 'is-invalid' : '' }}" id="custom-file-input-2" name="image_mobile" lang="es" onchange="putImage2()">
              <label class="custom-file-label" for="customFileLang">Seleccionar Imagen image_mobile(480x846)</label>
              @if ($errors->has('image_mobile'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('image_mobile') }}</strong>
                </span>
              @endif
              <label>&nbsp;</label>
            </div>
            <div class="form-group">
              <label for="link">Enlace</label>
              <input type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" name="link" placeholder="Enlace" value="{{old('link', $slide->link)}}">
              @if ($errors->has('link'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('link') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{old('priority', $slide->priority)}}">
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input {{ $errors->has('status') ? 'is-invalid' : '' }}" id="status" name="status" value='1' @if (old('status', $slide->status)=='1' ) checked @endif>
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
      showImage(src, target);
    }
    function putImage2() {
      var src = document.getElementById("custom-file-input-2");
      var target = document.getElementById("target2");
      showImage(src, target);
    }
  </script>   
@endsection