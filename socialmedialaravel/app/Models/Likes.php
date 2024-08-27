<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Likes extends Model
{
    use HasFactory;
    protected $fillable = ["post_id" , "user_id" , "type"];
    public function User()
    {
        return $this->belongsTo(User::class);

    }

    public function Post(){

        return $this->belongsTo(Post::class);
    }
  
}
