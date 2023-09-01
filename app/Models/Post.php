<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "title", "description", "thumbnail"];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
}
