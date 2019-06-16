@extends('layout.site', ['page' => 'documents'])

@section('content')

  <section class="documents-cont">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="disting">
          <img alt="decoration" class="right-decoration" src="{{ asset('img/schedules_right.png') }}" />
            <h3 class="documents-section-title">
              Bienvenido a nuestro sistema <br />
              <span>georgetown english academy</span>
            </h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          @if(Auth::check())
            @foreach ($courses as $course)
              <h3 class="title-decorated text-center padding-vertical">
                {{ $course->title }}
              </h3>

              <table class="documents-table">
                <thead>
                  <tr>
                    <th width="70%">Archivos</th>
                    <th width="15%">Tipo</th>
                    <th width="15%">Descargar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($course->documents as $document)
                    <tr>
                      <td>{{ $document->name }}</td>
                      <td><i class="fas {{ $document->getClassIcon() }}"></i></td>
                      <td class="text-center">
                        <a href="{{ asset($document->file) }}" download>
                          <i class="fas fa-arrow-down"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endforeach
          @else
            <p class="text-center"> Error al cargar material de apoyo </p>
          @endif
        </div>
      </div>
      <br />
      <br />
      <br />
    </div>
  </section>
@endsection