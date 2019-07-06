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
              <a href="{{route('pages.course_detail', $course->id) }}">
                <img alt="{{ $course->title }}" src="{{ asset($course->image) }}" />
              </a>
            </div>
          </div>
          <div class="col-md-5 vertical-center">
            <div class="course__description">
              <a href="{{route('pages.course_detail', $course->id) }}">
                <h3 class="title-decorated padding-vertical">
                  <span>{{ $course->title }}</span><span class="courses_see-more">{{' '}}ver más</span>
                </h3>
              </a>
              <p class="normal-text">
                {{ $course->short_description }}
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection