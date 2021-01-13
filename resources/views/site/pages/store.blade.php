@extends('layout.site', ['page' => 'store'])

@section('content')
  <section class="events__list-container">
    <div class="container padding-vertical">
      <div class="row">
        @foreach ($products as $product)
          <div class="col-12 col-lg-3">
            <div class="events-box mb-25">
              <a href="{{ route('pages.product', ['id' => $product->id]) }}">
                <div class="product-image" style="background-image: url({{ asset($product->image) }});">
                </div>
              </a>
              <div class="events__caption product__caption">
                <a href="{{ route('pages.product', ['id' => $product->id]) }}">
                  <h4>{{ $product->title }}</h4>
                </a>
                <p class="description">{{ $product->short_description }}</p>
                @if($product->discount)
                  <p class="price"><span class="with-discount">${{ $product->price }}</span> &nbsp; ${{ $product->discount_value }}</p>
                @else
                  <p class="price">${{ $product->price }}</p>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-12 products-pagination">
          <div class="mt-25">
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection