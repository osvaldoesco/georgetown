@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
            @if (session()->has('error'))
            <div class="row">
              <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show dashboard-widget-item" role="alert">
                  <strong>
                    {{ session()->get('error') }}
                  </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            </div>
            @endif
            @if (session()->has('success'))
            <div class="row">
              <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show dashboard-widget-item" role="alert">
                  <strong>
                    {{ session()->get('success') }}
                  </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            </div>
            @endif
          <a href="{{ route('schedules.create') }}">
            <button class="btn btn-primary float-right">
              Nuevo
            </button>
          </a>
          <h3 class="admin-title">
            Horarios
          </h3>
          <table class="table table-indexs">
            <thead class="thead">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo</th>
                <th scope="col">Inicio</th>
                <th scope="col">Fin</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Activo</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($schedules as $key => $schedule)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $schedule->typeText() }}</td>
                  <td>{{ $schedule->start}}</td>
                  <td>{{ $schedule->end }}</td>
                  <td>{{ $schedule->priority }}</td>
                  <td>{{ $schedule->status }}</td>
                  <td>
                    <a href="{{ route('schedules.edit', $schedule->id) }}">
                      <button class="btn btn btn-outline-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                  </td>
                  <td>
                    <a href="#" class="delete-schedule" data-schedule="{{ $schedule->id }}">
                      <button class="btn btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></button>
                    </a>
                    <form action="{{ route('schedules.destroy', $schedule->id) }}" id="delete-schedule-form-{{$schedule->id}}" class="d-none" method="POST">
                      @method('DELETE')
                      @csrf
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="text-right">
            {{ $schedules->links() }}
          </div>
        </div>    
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('.delete-document').on('click', function(e) {
        e.preventDefault();  
        var scheduleId = $(this).data('schedule');
        $('#confirm').modal({
          backdrop: 'static',
          keyboard: false
        }).on('click', '#delete-btn', function() {
          var form = '#delete-schedule-form-'+ scheduleId
          $(form).submit();
        });
      });
    });
  </script>   
@endsection