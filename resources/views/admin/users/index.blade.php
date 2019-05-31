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
        <a href="{{ route('users.create') }}">
          <button class="btn btn-primary float-right">
            Nuevo
          </button>
        </a>
        <h3 class="admin-title">
          Usuarios
        </h3>
        <table class="table table-indexs">
          <thead class="thead">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Curso</th>
              <th scope="col">Correo</th>
              <th scope="col">Editar</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $key => $user)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $user->name}}</td>
                <td>{{ '' }} lastname</td>
                <td>{{-- $user->course->title --}} Curso</td>
                <td>{{ $user->email }}</td>
                <td>
                  <a href="{{ route('users.edit', $user->id) }}">
                    <button class="btn btn btn-outline-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>
                  </a>
                </td>
                <td>
                  <a href="#" class="delete-user" data-user="{{ $user->id }}">
                    <button class="btn btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></button>
                  </a>
                  <form action="{{ route('users.destroy', $user->id) }}" id="delete-user-form-{{$user->id}}" class="d-none" method="POST">
                    @method('DELETE')
                    @csrf
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>    
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('.delete-user').on('click', function(e) {
      e.preventDefault();  
      var userId = $(this).data('user');
      $('#confirm').modal({
        backdrop: 'static',
        keyboard: false
      }).on('click', '#delete-btn', function() {
        var form = '#delete-user-form-'+ userId
        $(form).submit();
      });
    });
  });
</script>   
@endsection