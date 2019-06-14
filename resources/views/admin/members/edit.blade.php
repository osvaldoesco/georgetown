@extends('layout.admin')

@section('content')
<div class="container-admin">
  <div class="row">
    <div class="col-12">
      <div class="admin-card">
        <form class="bottom-input-border" enctype="multipart/form-data" action="{{ route('members.update', $member->id) }}" method="POST">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value='{{ old('name', $member->name) }}' autocomplete="off" />
            <small id="emailHelp" class="form-text text-muted">Información solo para control interno.</small>
            @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            @if($member->picture)
              <img src="{{ asset($member->picture) }}" alt="image" class="preview-image-form"  id="target" />
            @endif
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input {{ $errors->has('picture') ? 'is-invalid' : '' }}" placeholder="Foto" name="picture" lang='es' id="custom-file-input" onchange="putImage()"/>
            <label class="custom-file-label" for="customFileLang">Seleccionar foto(312x312)</label>
            @if ($errors->has('picture'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('picture') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            <label for="name">Cargo:</label>
            <input type="text" class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" name="position" id="position" value='{{ old('position', $member->position) }}' autocomplete="off" />
            @if ($errors->has('position'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('position') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            <label for="priority">Prioridad</label>
            <input type="number" class="form-control {{ $errors->has('picture') ? 'is-invalid' : '' }}" value='{{ old('priority', $member->priority) }}'  name="priority" placeholder="prioridad">
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
      showImage(src, target);
    }
  </script>   
@endsection