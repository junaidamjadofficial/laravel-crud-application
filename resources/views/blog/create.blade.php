@extends("layouts.app")
@section("content")
<div class="container mt-3">
    <h2>Create Post</h2>
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3 mt-3">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{old('title')}}">
        @error("title")
          <div class="text-danger small">{{$message}}</div>
        @enderror
      </div>
      <div class="mb-3 mt-3">
        <label for="description">Description:</label>
       <textarea class="form-control" name="description">{{old('description')}}</textarea>
        @error("description")
          <div class="text-danger small">{{$message}}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image">Image:</label>
        <input type="file" class="form-control" name="image">
        @error("image")
          <div class="text-danger small">{{$message}}</div>
        @enderror
      </div>
    
      <button type="submit" class="btn btn-primary">Publish</button>
    </form>
  </div>
@endsection