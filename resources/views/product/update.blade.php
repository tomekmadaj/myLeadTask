@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('product.update', $product->id) }} ">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Product name') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                @error('name')
                    <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="description" class="form-label">{{ __('Product description') }}</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                    <label class="form-label">{{ __('Product price1') }}</label>
                    <input type="text" class="form-control" id="ProductName" name="price1" value="{{ $product->price->all()[0]->price ?? ''}}">
                    @error('price1')
                        <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                    @enderror
                    <label class="form-label mt-2">{{ __('Product price2') }}</label>
                    <input type="text" class="form-control" id="ProductName" name="price2" value="{{ $product->price->all()[1]->price ?? ''}}">
                    <label class="form-label mt-2">{{ __('Product price3') }}</label>
                    <input type="text" class="form-control" id="ProductName" name="price3" value="{{ $product->price->all()[2]->price ?? ''}}">
              </div>
              <div class="mb-3">
                <div>
                <label for="image" class="form-label">{{ __('Product image') }}</label>
            </div>
                @if($product->image)
                    <img class="card-img-top" src="{{ Storage::url($product->image) }}" style="height: 300px; width: auto">
                @endif
                <input class="form-control mt-2" type="file" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <input type="hidden" name="productId" value="{{ $product->id }}">
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
              </div>
        </form>
    </div>
</div>
@endsection
