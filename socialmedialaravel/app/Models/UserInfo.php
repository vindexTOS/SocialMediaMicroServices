<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Userinfo extends Model
{
  use HasFactory;
  
  protected $fillable = [
    'profile_photo_id',
    "wall_papper_id",
    'description',
    "user_id",
  ];
  
  public function User()
  {
    return $this->belongsTo(User::class);
  }
}
