@extends('layouts.app')


@section('content')
<div class="row">
  <div class="col-lg-4 col-md-8 col-12 mx-auto">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
          <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Edit Admin User</h4>
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
        <form role="form" class="text-start" method="POST" action="{{ route('users.update', $user->id) }}">
             @method('patch')
             @csrf
          <div class="input-group input-group-outline my-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group input-group-outline my-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group input-group-outline my-3">
            <label for="username" class="form-label">Username</label>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username">
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group input-group-outline my-3">
            <label for="roles" class="form-label">Role</label>
            <select name="roles" class="form-control @error('roles') is-invalid @enderror">
              @foreach($roles as $role)
                <option   {{ in_array($role, $userRole) ? 'selected' : '' }} value="{{ $role }}">{{ $role }}</option>
              @endforeach
            </select>
            @error('roles')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group input-group-outline my-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group input-group-outline my-3">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input id="confirm-password" type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" value="{{ old('confirm-password') }}" autocomplete="confirm-password">
          </div>

          <div class="input-group input-group-outline my-3">
            <label for="is_active" class="form-label">Role</label>
            <select name="is_active" class="form-control @error('is_active') is-invalid @enderror">
              <option label="Choose Status"></option>
                <option value="1" {{ ($user->is_active == 1) ? 'selected' : '' }}>Active</option>
                <option value="0" {{ ($user->is_active == 0) ? 'selected' : '' }}>Deactive</option>
            </select>
            @error('is_active')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>  


          <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




@endsection