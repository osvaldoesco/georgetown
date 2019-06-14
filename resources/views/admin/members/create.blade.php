@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Nombre" name="name" value="{{old('name')}}">
              <small id="emailHelp" class="form-text text-muted">Información solo para control interno.</small>
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <img src="#" alt="image1" class="preview-image-form d-none"  id="target"/>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input {{ $errors->has('picture') ? 'is-invalid' : '' }}" name="picture" lang="es" value="{{ old('picture') }}" id="custom-file-input" onchange="putImage()">
              <label class="custom-file-label" for="customFileLang">Seleccionar foto(312x312)</label>
              @if ($errors->has('picture'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('picture') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="position">Cargo</label>
              <input type="text" class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" name="position" placeholder="Cargo" value="{{ old('position') }}">
              @if ($errors->has('position'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('position') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
            <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{ old('priority') }}">
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
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