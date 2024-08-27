<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    protected $fillable = ["user_id" , "img_url"];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
