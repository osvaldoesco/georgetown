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
          <a href="{{ route('blogs.create') }}">
            <button class="btn btn-primary float-right">
              Nuevo
            </button>
          </a>
          <h3 class="admin-title">
            Blog
          </h3>
          <table class="table table-indexs">
            <thead class="thead">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Pequeña Desc.</th>
                <th scope="col">Tipo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Imagen preview</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($blogs as $key => $blog)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $blog->title }}</td>
                  <td>{{  $blog->limitatedDesc() }}</td>
                  <td>{{  $blog->typeText() }}</td>
                  <td>
                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="admin-img-preview" />
                  </td>
                  <td>
                    <img src="{{ asset($blog->small_image) }}" alt="{{ $blog->title }}" class="admin-img-preview" />
                  </td>
                  <td>
                    <a href="{{ route('blogs.edit', $blog->id) }}">
                      <button class="btn btn btn-outline-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                  </td>
                  <td>
                    <a href="#" class="delete-blog" data-blog="{{ $blog->id }}">
                      <button class="btn btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></button>
                    </a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" id="delete-blog-form-{{$blog->id}}" class="d-none" method="POST">
                      @method('DELETE')
                      @csrf
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="text-right">
            {{ $blogs->links() }}
          </div>
        </div>    
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('.delete-blog').on('click', function(e) {
        e.preventDefault();  
        var blogId = $(this).data('blog');
        $('#confirm').modal({
          backdrop: 'static',
          keyboard: false
        }).on('click', '#delete-btn', function() {
          var form = '#delete-blog-form-'+ blogId
          $(form).submit();
        });
      });
    });
  </script>   
@endsection