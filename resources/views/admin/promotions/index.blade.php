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
          <a href="{{ route('promotions.create') }}">
            <button class="btn btn-primary float-right">
              Nuevo
            </button>
          </a>
          <h3 class="admin-title">
            Promociones
          </h3>
          <table class="table table-indexs">
            <thead class="thead">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Estado</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($promotions as $key => $promotion)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $promotion->title }}</td>
                  <td>
                    <img src="{{ asset($promotion->image) }}" alt="{{ $promotion->title }}" class="admin-img-preview" />
                  </td>
                  <td>
                    {{ ($promotion->status == 1) ? 'Activo' : 'Inactivo' }}
                  </td>
                  <td>
                    {{ $promotion->priority }}
                  </td>
                  <td>
                    <a href="{{ route('promotions.edit', $promotion->id) }}">
                      <button class="btn btn btn-outline-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                  </td>
                  <td>
                    <a href="#" class="delete-promotion" data-promotion="{{ $promotion->id }}">
                      <button class="btn btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></button>
                    </a>
                    <form action="{{ route('promotions.destroy', $promotion->id) }}" id="delete-promotion-form-{{$promotion->id}}" class="d-none" method="POST">
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
      $('.delete-promotion').on('click', function(e) {
        e.preventDefault();  
        var promotionId = $(this).data('promotion');
        $('#confirm').modal({
          backdrop: 'static',
          keyboard: false
        }).on('click', '#delete-btn', function() {
          var form = '#delete-promotion-form-' + promotionId
          $(form).submit();
        });
      });
    });
  </script>   
@endsection