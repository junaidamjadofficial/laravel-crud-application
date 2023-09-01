<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index(){
        return view('blog.blogpage');
    }
    public function create(){
        return view('blog.create');
    }

    public function posts(){
        return view('blog.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'title' => "required",
            "description" => "required",
            "image" => "required|mimes:png,jpg"
        ]);

        if($request->hasFile("image")){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $request['thumbnail'] = $imageName;
        }

        $request['user_id'] = auth()->user()->id;
        Post::create($request->all());
    
        return redirect()->route('home')->with('success','Post has been published successfully!');
    }
    public function edit(Request $request,$id){
        $posts=Post::find($id);
        return view('blog.edit',compact("posts"));
    }
    
    public function update(Request $request,$id){
        
        //Find the post by id from Database
        $post = Post::where("id", $id)->where("user_id", auth()->user()->id)->first();
        
        //if post not found redirect to home
        if(!$post){
            return redirect('/');
        }
        
        //Validate the title and description
        $request->validate([
            'title' => "required",
            "description" => "required",
        ]);

        //If image want to update then validate the image size and extention
        if($request->hasFile("image")){
            $request->validate(["image" => "required|mimes:png,jpg"]);
            File::delete(public_path('images/'.$post->thumbnail));
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $post->thumbnail = $imageName;
        }

        $post->title = $request->input("title");
        $post->description = $request->input("description");
        $post->save();

        return redirect('/');
    }
    public function destroy($id){
        $post = Post::where("id", $id)->where("user_id", auth()->user()->id)->first();
        File::delete(public_path('images/'.$post->thumbnail));
        $post->delete();
        return redirect("/");
    }
}
