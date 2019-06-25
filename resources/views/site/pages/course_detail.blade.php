@extends('layout.site', ['page' => 'coursess'])

@section('content')
  <section class="course-detail">
    <div class="blog-content padding-vertical">
      <div class="container  ">
        <div class="row">
          <div class="col-md-12 padding-vertical-20">
            <h3 class="title-decorated  text-center">
              {{ $course->title }}
            </h3>
          </div>
          <div class="col-md-12 padding-vertical-20 text-center">
            <img alt="{{ $course->title }}" src="{{ asset($course->image) }}" class="blog-image" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 padding-vertical-20 normal-text">
            {!! $course->description !!}
          </div>
        </div>
      </div>
    </div>
@endsection