@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="type">Tipo</label>
              <select class="form-control" name="type" placeholder="Seleccionar tipo">
                <option value="1">Semanales</option>
                <option value="2">Sabatinos</option>
                <option value="3">Dominicales</option>
              </select>
            </div>
            @if ($errors->has('type'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('type') }}</strong>
              </span>
            @endif
            <div class="form-group">
              <label for="duration">Inicio:</label>
              <input type="text" class="form-control" placeholder="00:00 am" name="start">
            </div>
            @if ($errors->has('start'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('start') }}</strong>
              </span>
            @endif
            <div class="form-group">
              <label for="duration">Fin:</label>
              <input type="text" class="form-control" placeholder="00:00 am" name="end">
            </div>
            @if ($errors->has('end'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('end') }}</strong>
              </span>
            @endif
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control" name="priority" placeholder="prioridad">
            </div>
            @if ($errors->has('priority'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('priority') }}</strong>
              </span>
            @endif
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
      })
    });
  </script>   
@endsection