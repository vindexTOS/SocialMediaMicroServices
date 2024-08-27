<?php


namespace App\Services;
use App\Models\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class PhotoService { 
    
    public function uploadPhoto(Request $request, $imgType){
        if($request->hasFile($imgType)){
            $image = $request->file($imgType);
            $userId = $request->user_id;
            $uploadedImageUrl = $image->store("images", "public");
            
            $newPhoto = Photos::create([
                "user_id" => $userId,
                "img_url" => $uploadedImageUrl,
            ]);
            
            return $newPhoto;
        }
        
        return null;  
    }
    
    private function Validator(Request $request){
        
        // $val = Validator::make($request->all(), [
        //     "image"=> 'required|mimes:jpeg,png|max:2048',
        //     "user_id"=> "required"
        // ]);
        // if($val->fails()){
        //     throw new ValidationException($val);
        // };
        
        return $request;
    }
    
}