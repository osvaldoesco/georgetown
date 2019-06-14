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
          <a href="{{ route('principal_slider.create') }}">
            <button class="btn btn-primary float-right">
              Nuevo
            </button>
          </a>
          <h3 class="admin-title">
            Slider Principal
          </h3>
          <table class="table table-indexs">
            <thead class="thead">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Imagen</th>
                <th scope="col">Mobile</th>
                <th scope="col">Enlace</th>
                <th scope="col">Estado</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sliders as $key => $slide)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $slide->title }}</td>
                  <td>{{ $slide->description }}</td>
                  <td>
                    <img src="{{ asset($slide->image) }}" alt="{{ $slide->title }}" class="admin-img-preview" />
                  </td>
                  <td>
                    <img src="{{ asset($slide->image_mobile) }}" alt="{{ $slide->title }} - mobile" class="admin-img-preview" />
                  </td>
                  <td>
                    <a href="{{ $slide->link }}">{{ $slide->link }}</a>
                  </td>
                  <td>
                    {{ ($slide->status == 1) ? 'Activo' : 'Inactivo' }}
                  </td>
                  <td>
                    {{ $slide->priority }}
                  </td>
                  <td>
                    <a href="{{ route('principal_slider.edit', $slide->id) }}">
                      <button class="btn btn btn-outline-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                  </td>
                  <td>
                    <a href="#" class="delete-slide" data-slide="{{ $slide->id }}">
                      <button class="btn btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></button>
                    </a>
                    <form action="{{ route('principal_slider.destroy', $slide->id) }}" id="delete-slide-form-{{$slide->id}}" class="d-none" method="POST">
                      @method('DELETE')
                      @csrf
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-right">
            {{ $sliders->links() }}
          </div>
        </div>    
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('.delete-slide').on('click', function(e) {
        e.preventDefault();  
        var slideId = $(this).data('slide');
        $('#confirm').modal({
          backdrop: 'static',
          keyboard: false
        }).on('click', '#delete-btn', function() {
          var form = '#delete-slide-form-'+ slideId
          $(form).submit();
        });
      });
    });
  </script>   
@endsection