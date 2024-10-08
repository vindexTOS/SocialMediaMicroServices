<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "title",
        "text",
        'img_id',
        'user_id',
        "updated_at",
        'deleted_at',
        "created_at"
    ];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
