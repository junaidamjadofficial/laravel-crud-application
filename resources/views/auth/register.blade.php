@extends("layouts.app")
@section("content")
<div class="container mt-3">
    <h2>Register Account</h2>
    <form action="{{route('register')}}" method="POST">
      @csrf
      <div class="mb-3 mt-3">
        <label for="name">Name:</label>
        <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
        @error("name")
          <div class="text-danger small">{{$message}}</div>
        @enderror
      </div>
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
      <div class="mb-3">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="form-control" id="confirm_password" placeholder="Enter confirm password" name="password_confirmation">
       
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
@endsection