@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-4 col-md-8 col-12 mx-auto">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
          <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Show Role</h4>
        </div>
      </div>
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
      <div class="card-body">
        <form role="form" class="text-start">
          <div class="input-group input-group-outline my-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required autocomplete="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          @foreach($rolePermissions as $value)
          <div class="form-check form-switch d-flex align-items-center mb-3">
            
            <input class="form-check-input" type="checkbox"  value="{{ $value->name }}" checked disabled>
            <label class="form-check-label mb-0 ms-3" for="remember">{{ $value->name }}</label>
           
          </div>
           @endforeach
        </form>
      </div>
    </div>
  </div>
</div>
@endsection