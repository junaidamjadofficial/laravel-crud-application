@extends("layouts.app")
@section("content")
<div class="container mt-3">
    <h2>Login Account</h2>
    <form action="{{route('login')}}" method="POST">
      @csrf
      <div class="mb-3 mt-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email')}}">
        @error("email")
          <div class="text-danger small">{{$message}}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        @error("password")
          <div class="text-danger small">{{$message}}</div>
        @enderror
      </div>
      <div class="form-check mb-3">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
@endsection