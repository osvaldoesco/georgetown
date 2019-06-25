@extends('layout.site', ['page' => 'events'])

@section('content')
  <section class="blog-detail">
    <div class="blog-content padding-vertical">
      <div class="container  ">
        <div class="row">
          <div class="col-md-12 padding-vertical-20">
            <h3 class="title-decorated  text-center">
              {{ $event->title }}
            </h3>
          </div>
          <div class="col-md-12 padding-vertical-20 text-center">
            <img alt="{{ $event->name }}" src="{{ asset($event->image) }}" class="blog-image" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 padding-vertical-20 normal-text">
            {!!$event->description !!}
          </div>
        </div>
      </div>
    </div>
    <div class="blog-related padding-vertical">
      <div class="container">
        <div class="row">
          @foreach ($related as $new)
            <div class="col-12 col-lg-4">
              <div class="events-box">
                <img alt="apertura" src="{{ asset($new->small_image) }}" />
                <div class="events__caption">
                <h4>{{ $new->title }}</h4>
                <p class="date">{{ $new->getFormatedDate() }}</p>
                  <p class="description">{{ $new->short_description }}</p>
                  <div class="btn-event-cont">
                    <a href="{{ route('pages.blog_detail', ['slug' => $new->slug]) }}">
                      <button class="site-button">
                        Leer más
                        <i class="fas fa-arrow-right"></i>
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection