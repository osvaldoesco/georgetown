@extends('layout.site', ['page' => 'courses'])

@section('content')
  <section class="courses-page">
    <h3 class="title-decorated padding-vertical">
      NUESTROS <span>CURSOS</span>
    </h3>
    <div class="container">
      @foreach ($courses as $course)
        <div class="row">
          <div class="col-md-5 offset-md-1">
            <div class="course__img">
            <img alt="{{ $course->title }}" src="{{ asset($course->image) }}" />
            </div>
          </div>
          <div class="col-md-5 vertical-center">
            <div class="course__description">
              <h3 class="title-decorated padding-vertical">
                <span>{{ $course->title }}</span>
              </h3>
              <p class="normal-text">
                {{ $course->description }}
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection