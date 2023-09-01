@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-sm-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{asset("images/".$post->thumbnail)}}" class="img-thumbnail rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->description}}</p>
                                <p class="card-text"><small class="text-muted">Published at {{$post->created_at->diffForHumans()}}</small></p>
                                <p class="card-text"><strong>Author: </strong> <small class="text-muted"> {{$post->user->name}}</small></p>
 

                                @auth
                                @if($post->user->id === auth()->user()->id)
                                <p class="card-text"><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm">{{__("Edit")}}</a>
                                    <a href="#" onclick="deletePost({{$post->id}})" class="mx-2 btn btn-danger btn-sm">{{__("Delete")}}</a>
                                    <form id="post-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </p>
                                @endif
                                @endauth
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
@endsection
<script>
    function deletePost($id){
        if(confirm('Do you really want to delete?'))
        {
            document.getElementById('post-'+ $id).submit();
        }
    }
</script>
