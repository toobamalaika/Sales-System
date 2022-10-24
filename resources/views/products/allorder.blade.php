@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Order Managment</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mx-3">
                        <span class="text-sm">{{ $message }}</span>
                    </div>
                @endif
            <div class="ps-3">
            </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $key => $order)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $order->user->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $order->product_id  }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">$ {{ $order->total_price }}</span>
                      </td>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection