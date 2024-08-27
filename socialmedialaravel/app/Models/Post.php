<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "title",
        "text",
        'img_id',
        'user_id'
    ];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
