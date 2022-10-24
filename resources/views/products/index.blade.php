@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product Managment</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mx-3">
                        <span class="text-sm">{{ $message }}</span>
                    </div>
                @endif
            <div class="ps-3">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product </a>
                @endcan
            </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $product->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $product->code }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">$ {{ $product->price }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @can('product-purchase')
                        <a class="btn btn-sm btn-success" href="{{ route('products.purchase') }}">Purchase</a>
                        @endcan

                        <a class="btn btn-sm btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                            @can('product-edit')
                                <a class="btn btn-sm btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                            @endcan
                            @can('product-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $products->render() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection