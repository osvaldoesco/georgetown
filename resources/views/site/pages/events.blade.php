@extends('layout.site', ['page' => 'events'])

@section('content')
  <section class="events__list-container">
    <h3 class="title-decorated">
      EVENTOS
    </h3>
    <div class="container padding-vertical">
      <div class="row">
        @foreach ($events as $event)
          <div class="col-12 col-lg-4">
            <div class="events-box">
              <img alt="apertura" src="{{ asset($event->small_image) }}" />
              <div class="events__caption">
              <h4>{{ $event->title }}</h4>
              <p class="date">{{ $event->getFormatedDate() }}</p>
                <p class="description">{{ $event->short_description }}</p>
                <div class="btn-event-cont">
                <a href="{{ route('pages.blog_detail', ['slug' => $event->slug]) }}">
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
    <div class="padding-vertical-20 blog-pagination-cont">
      {{ $events->appends(request()->input())->links() }}
    </div>
    <h3 class="title-decorated">
      NOTICIAS
    </h3>
    <div class="container padding-top">
      <div class="row">
        @foreach ($news as $new)
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
    <div class="padding-vertical-20 blog-pagination-cont">
      {{ $news->appends(request()->input())->links() }}
    </div>
  </section>
@endsection