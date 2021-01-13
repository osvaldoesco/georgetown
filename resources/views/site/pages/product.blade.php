@extends('layout.store', ['page' => 'store'])

@section('content')
  <div class="container-fluid h-full">
    <div class="row h-full">
      <div class="col-12 col-lg-9 h-full">
        <div class="center-image-container">
          <img class="product-image-detail" src="{{ asset($product->image) }}">
        </div>
      </div>
      <div class="col-12 col-lg-3 h-full">
        <div class="product-caption h-full">
          <h4 class="title">{{ $product->title }}</h4>
          <p class="detail-title">Detalles</p>
          <p class="description">{{ $product->description }}</p>
          @if($product->discount)
            <p class="price"><span class="with-discount">${{ $product->price }}</span> &nbsp; ${{ $product->discount_value }}</p>
          @else
            <p class="price">${{ $product->price }}</p>
          @endif
          <div class="shop-container">
            <a href="{{ $product->payment_link }}"  target="_blank">
              <button class="btn btn-primary btn-shop">Comprar</button>
            </a>
            <p class="redirect-message">Al dar clic se redireccionará a la página del Banco America Central.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection