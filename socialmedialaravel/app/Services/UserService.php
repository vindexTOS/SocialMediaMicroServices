<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Services\PhotoService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class UserService { 
    
    private $photoService; 
    
    public function __construct(PhotoService $photoService){
        $this->photoService = $photoService;
    }
    
    
    
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
    
    
    function store(Request $request){
        
        $userInfo = [];
        
        $profilePhoto = $this->photoService->uploadPhoto($request, 'profile_photo');
        if($profilePhoto){
            $userInfo['profile_photo_id'] = $profilePhoto->id;
        }
        
        $wallpaper =  $this->photoService->uploadPhoto($request, 'wallpaper');
        if($wallpaper){
            $userInfo['wall_papper_id'] = $wallpaper->id;
        }
        
        $description = $request["description"];
        if($description){
            $userInfo['description'] = $description;
        }
        UserInfo::updateOrCreate(
            ["user_id" => $request['user_id']],
            $userInfo
        );      
        
        
        return ['msg'=>'Info updated'];
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