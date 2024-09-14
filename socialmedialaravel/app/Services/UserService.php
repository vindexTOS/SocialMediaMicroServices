<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Services\PhotoService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class UserService { 
    
 
    
    
    function index(){
        
        return $users = User::get()->all();
    }
    
    function show($id){
        $user = User::join("userinfos", "users.id", "=", "userinfos.user_id")
        ->select("users.*", "userinfos.*")
        ->where("users.id", $id)->get();
        
        unset($user["profile_photo_id"]);
        unset($user["wall_papper_id"]);
        return ["data"=> $user];
    }
    
    
  
    
    
    
    
    private function Validator(Request $request){
        
        $val = Validator::make($request->all(), [
            "image"=> 'required|mimes:jpeg,png|max:2048',
            "user_id"=> "required"
        ]);
        if($val->fails()){
            throw new ValidationException($val);
        };
        
        return $val;
    }
    
    
}