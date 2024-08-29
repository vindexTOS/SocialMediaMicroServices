<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Userinfo extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'profile_photo_id',
    "wall_papper_id",
    'description',
    "user_id",
    "isDelete"
  ];
  
  public function User()
  {
    return $this->belongsTo(User::class);
  }
}
