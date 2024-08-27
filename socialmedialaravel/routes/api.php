<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserInfoController;


// index, show, destory, store 
// Route::apiResource("test", TestController::class);
Route::prefix("auth")->group(function(){
    Route::post("signup", [AuthController::class, "signup"]);
    Route::post("login", [AuthController::class, "login"]);
});
Route::apiResource("userInfo", UserInfoController::class);


// Route::post("photoUpload", [UserInfoController::class, "MakePhoto"]);
// Route::prefix("user")->(function(){

// });
//  user authentication registration 

