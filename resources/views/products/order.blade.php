@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-4 col-md-8 col-12 mx-auto">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
          <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Create New Product</h4>
        </div>
      </div>
      
      <div class="card-body">

        @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
              </ul>
          </div>
      @endif
        <form role="form" class="text-start" method="POST" action="{{ route('products.order') }}">
            @csrf
          <div class="input-group input-group-outline my-3">
            <label for="product_id" class="form-label">Product</label>
            <select multiple name="product_id[]" class="form-control @error('product_id') is-invalid @enderror">
              <option label="Choose Product"></option>
              @foreach($products as $product)
                <option value="{{ $product->code }}">{{ $product->name }}</option>
              @endforeach
            </select>
            @error('product_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          </div>

          <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
