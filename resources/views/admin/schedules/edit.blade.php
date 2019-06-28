@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="type">Tipo</label>
              <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" placeholder="Seleccionar tipo">
                <option value="1" @if($schedule->type == "1") {{'selected'}} @endif>Semanales</option>
                <option value="2" @if($schedule->type == "2") {{'selected'}} @endif>Sabatinos</option>
                <option value="3" @if($schedule->type == "3") {{'selected'}} @endif>Dominicales</option>
              </select>
              @if ($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('type') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="start">Inicio:</label>
              <input type="text" class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }}" placeholder="00:00 am" name="start" value="{{ old('start', $schedule->start) }}">
              @if ($errors->has(''))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('start') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="end">Fin:</label>
              <input type="text" class="form-control {{ $errors->has('end') ? 'is-invalid' : '' }}" placeholder="00:00 am" name="end" value="{{ old('end', $schedule->end) }}">
              @if ($errors->has('end'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('end') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="priority">Prioridad</label>
              <input type="number" class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" placeholder="prioridad" value="{{ old('priority', $schedule->priority) }}" />
              @if ($errors->has('priority'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('priority') }}</strong>
                </span>
              @endif
            </div>
            <br />
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="status" name="status" value='1' @if (old('status', $schedule->status)=='1' ) checked @endif />
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