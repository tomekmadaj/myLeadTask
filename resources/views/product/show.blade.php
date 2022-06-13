@extends('layouts.app')

@section('content')
<section>
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card text-black">
            <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
            @if($product->image)
            <img class="card-img-top" src="{{ Storage::url($product->image) }}"
            style="width: 100%;
            height: 30vh;
            object-fit: contain;"
            >
        @else
            <img class="card-img-top" src="{{ Storage::url('default_product_image.jpg') }}"
            style="width: 100%;
            height: 30vh;
            object-fit: contain;">
        @endif
            <div class="card-body">
              <div class="text-center">
                <h5 class="card-title">{{ $product->name }}</h5>
              </div>
              <div>
                @foreach ($product->price as $price)
                <div class="d-flex justify-content-between">
                    <span>Option {{ $loop->iteration}}</span><span>${{ $price->price}}</span>
                  </div>
                @endforeach
              <div class="total font-weight-bold mt-4">
                <div><span>Description:</span></div>
                <span>{{ $product->description }}</span>
              </div>
              <div class="text-end text-muted mt-3">
                <a href="{{ route('product.list') }}">all products</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


