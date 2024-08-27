<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Friends extends Model
{
    use HasFactory;
    protected $fillable = ["friend_id" , "user_id"];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
