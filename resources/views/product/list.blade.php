@extends('layouts.app')

@section('content')

<div class="container">

<form class="mb-3" action="{{ route('product.list') }}">
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-row">
                        <label class="my-1 text-nowrap" for="searchName">Find product:</label>
                        <input type="text" class="form-control mx-3" name="searchName" placeholder="" value="{{ $searchName ?? '' }}">
                        <label class="my-1 text-nowrap" for="searchName">Price sort:</label>
                        <select name="priceOrder" id="priceOrder" class="form-select mx-3">
                        <option value="" selected>choose option</option>
                        <option value="ASC" {{ $priceOrder == 'ASC' ? 'selected' : '' }}>lowest price</option>
                        <option value="DESC" {{ $priceOrder == 'DESC' ? 'selected' : '' }}>highest price</option>
                        </select>
                        <button type="submit" class="btn btn-primary ms-2">Filter</button>
                        </div>
                    </div>
                </div>
    </form>
{{-- products --}}
    <div class="row">
        @foreach ($products as $product)
        <div class="col-4 mb-3">
            <div class="card">
                @if($product->image)
                    <img class="card-img-top" src="{{ Storage::url($product->image) }}"
                    style="width: 100%;
                        height: 15vw;
                        object-fit: cover;">
                @else
                    <img class="card-img-top" src="{{ Storage::url('default_product_image.jpg') }}"
                    style="width: 100%;
                        height: 15vw;
                        object-fit: cover;">
                @endif
                <div class="card-body">
                  <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                  @if ($product->price->count() > 1)
                    <p class="mb-0">Price: <b>{{ $product->price->min('price') }}$ - {{ $product->price->max('price') }}$</b></p>
                  @else
                    <p class="mb-0">Price: <b>{{ $product->price->first()->price ?? '' }}$</b></p>
                  @endif
                  <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-secondary mt-3">Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $products->links() }}

</div>

@endsection


