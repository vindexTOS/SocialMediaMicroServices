<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\PhotoService;
use Illuminate\Support\Facades\DB;

class UserInfoController extends Controller
{
    
    private $photoService;
    private $userInfoService; 
    public function __construct( PhotoService $photoService ,UserService $userInfoService) {
        $this->photoService = $photoService;
        $this->userInfoService = $userInfoService;
    }
    
    
    public function index(){
        try {
            return  $this->userInfoService->index();
        } catch (\Throwable $th) {
            
            \Log::error('Caught exception: ' . $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine());
            
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }
    
    
    public function store (Request $request){
        
        try {
            DB::beginTransaction();
            $response = $this->userInfoService->store($request);
            DB::commit();
            
            return $response;
        } catch (\Throwable $th) {
            DB::rollBack();
            
            \Log::error('Caught exception: ' . $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine());
            
            return response()->json(['error' => 'An error occurred.'], 500);
            
        }
        
    }
    
    
    public function show($id){
        try {
            return  $this->userInfoService->show($id);
        } catch (\Throwable $th) {
            
            \Log::error('Caught exception: ' . $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine());
            
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }
    
    public function MakePhoto(Request $request){
        
        try {
            return $this->photoService-> UploadPhoto($request);
            
        } catch (\Throwable $th) {
            \Log::error('Caught exception: ' . $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine());
            
            return response()->json(['error' => 'An error occurred.'], 500);
        }
        
    }
}
