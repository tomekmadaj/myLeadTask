@extends('layouts.app')

@section('content')

<div class="container">
    {{-- add new product --}}
      <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            {{ __('Add new product') }}
        </button>
      </p>
      <div class="collapse mb-3 {{ $errors->any() ? 'show' : '' }}" id="collapseExample">
        <div class="card card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('product.add') }} ">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Product name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Product description') }}</label>
                    <textarea type="text" class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="price1" class="form-label">{{ __('Product price1') }}</label>
                    <input type="text" class="form-control" id="ProductName" name="price1" value="{{ old('price1') }}">
                    <label for="price2" class="form-label mt-2">{{ __('Product price2') }}</label>
                    <input type="text" class="form-control" id="ProductName" name="price2" value="{{ old('price2') }}">
                    <label for="price3" class="form-label mt-2">{{ __('Product price3') }}</label>
                    <input type="text" class="form-control" id="ProductName" name="price3" value="{{ old('price3') }}">
                    @error('price1', 'price2', 'price3')
                        <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="image" class="form-label">{{ __('Product image') }}</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                  </div>
            </form>
        </div>
      </div>

    {{-- products table --}}
<table class="table table-bordered table-striped table-responsive">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price->implode('price', ', ')}}</td>
            <td>
                <div class="d-flex flex-row">
                    <a class="btn btn-outline-secondary mb-3 me-3" href="{{ route('product.edit', $product->id) }}" role="button">Edit</a>
                    <form method="post" action="{{ route('product.delete') }}">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <button class="btn btn-outline-secondary" type="submit">Delete</button>
                    </form>
                </div>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{ $products->links() }}
@endsection

</div>



