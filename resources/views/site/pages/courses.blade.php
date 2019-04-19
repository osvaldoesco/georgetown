@extends('layout.site', ['page' => 'courses'])

@section('content')
  <section class="courses-page">
    <h3 class="title-decorated padding-vertical">
      NUESTROS <span>CURSOS</span>
    </h3>
    <div class="container">

      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="course__img">
            <img alt="toefl" src="{{ asset('img/fake/toefl-ibt.png') }}" />
          </div>
        </div>
        <div class="col-md-5 vertical-center">
          <div class="course__description">
            <h3 class="title-decorated padding-vertical">
              CURSOS <span>TOEFL</span>
            </h3>
            <p class="normal-text">
              Lorem Ipsum is simply dummy text of the printing 
              and typesetting industry. Lorem Ipsum has been the 
              industry's standard dummy text ever since the 1500s, 
              when an unknown printer took a galley of type and scrambled 
              it to make a type specimen book. It has survived not 
              only five centuries, but also the leap into electronic 
              typesetting, remaining essentially unchanged. It was 
              popularised in the 1960s with the release of Letraset 
              sheets containing Lorem Ipsum passages, and more recently 
              with desktop publishing software like Aldus PageMaker 
              including versions of Lorem Ipsum.
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="course__img">
            <img alt="toefl" src="{{ asset('img/fake/toefl.png') }}" />
          </div>
        </div>
        <div class="col-md-5 vertical-center">
          <div class="course__description">
            <h3 class="title-decorated padding-vertical">
              CURSOS <span>TOEFL</span>
            </h3>
            <p class="normal-text">
              Lorem Ipsum is simply dummy text of the printing 
              and typesetting industry. Lorem Ipsum has been the 
              industry's standard dummy text ever since the 1500s, 
              when an unknown printer took a galley of type and scrambled 
              it to make a type specimen book. It has survived not 
              only five centuries, but also the leap into electronic 
              typesetting, remaining essentially unchanged. It was 
              popularised in the 1960s with the release of Letraset 
              sheets containing Lorem Ipsum passages, and more recently 
              with desktop publishing software like Aldus PageMaker 
              including versions of Lorem Ipsum.
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="course__img">
            <img alt="toefl" src="{{ asset('img/fake/toeic.png') }}" />
          </div>
        </div>
        <div class="col-md-5 vertical-center">
          <div class="course__description">
            <h3 class="title-decorated padding-vertical">
              CURSOS <span>TOEIC</span>
            </h3>
            <p class="normal-text">
              Lorem Ipsum is simply dummy text of the printing 
              and typesetting industry. Lorem Ipsum has been the 
              industry's standard dummy text ever since the 1500s, 
              when an unknown printer took a galley of type and scrambled 
              it to make a type specimen book. It has survived not 
              only five centuries, but also the leap into electronic 
              typesetting, remaining essentially unchanged. It was 
              popularised in the 1960s with the release of Letraset 
              sheets containing Lorem Ipsum passages, and more recently 
              with desktop publishing software like Aldus PageMaker 
              including versions of Lorem Ipsum.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection