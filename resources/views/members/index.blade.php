@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <a href="{{ route('members.create') }}">
            <button class="btn btn-primary float-right">
              Nuevo
            </button>
          </a>
          <h3 class="admin-title">
            Miembros
          </h3>
          <table class="table table-indexs">
            <thead class="thead">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cargo</th>
                <th scope="col">foto</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($members as $key => $member)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $member->name }}</td>
                  <td>{{ $member->position }}</td>
                  <td>{{ $member->picture }}</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>    
      </div>
    </div>
  </div>
@endsection