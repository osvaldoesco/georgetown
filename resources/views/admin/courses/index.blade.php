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
          <a href="{{ route('courses.create') }}">
            <button class="btn btn-primary float-right">
              Nuevo
            </button>
          </a>
          <h3 class="admin-title">
            Cursos
          </h3>
          <table class="table table-indexs">
            <thead class="thead">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">Imagen</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($courses as $key => $course)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $course->title }}</td>
                  <td>{{ $course->short_description }}</td>
                  <td>
                    <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" class="admin-img-preview" />
                  </td>
                  <td>
                    <a href="{{ route('courses.edit', $course->id) }}">
                      <button class="btn btn btn-outline-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>
                    </a>
                  </td>
                  <td>
                    <a href="#" class="delete-course" data-course="{{ $course->id }}">
                      <button class="btn btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></button>
                    </a>
                    <form action="{{ route('courses.destroy', $course->id) }}" id="delete-course-form-{{$course->id}}" class="d-none" method="POST">
                      @method('DELETE')
                      @csrf
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="text-right">
            {{ $courses->links() }}
          </div>
        </div>    
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('.delete-course').on('click', function(e) {
        e.preventDefault();  
        var courseId = $(this).data('course');
        $('#confirm').modal({
          backdrop: 'static',
          keyboard: false
        }).on('click', '#delete-btn', function() {
          var form = '#delete-course-form-'+ courseId
          $(form).submit();
        });
      });
    });
  </script>   
@endsection