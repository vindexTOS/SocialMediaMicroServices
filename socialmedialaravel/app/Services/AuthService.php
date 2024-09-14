<?php 
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\AuthProvider;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\ValidationException;

class AuthService


{

    use AuthProvider;
    public function signup(Request $request)
    {  
        $val =  Validator::make($request->all(), [
            "name"=>"required",
            'email' => 'required|unique:users|max:255',  
            'password' => 'required',
        ]);

      
        if(    $val->fails()){
            throw new ValidationException($val);
        };
        
        $data = $val->validated();
        $this->EmailCheck($data["email"]);


        User::create([
            "name"=>$data["name"],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        
        
        return response()->json(['msg' => 'Your account has been created'], 201);
    }
    
    
    public function login(Request $request){
        $val = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if($val->fails()){
            throw new ValidationException($val);
        }
    
        $credentials = $request->only('email', 'password');
    
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid email or password'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' =>$e], 500);
        }
       Log::debug($token);
        return response()->json(['token' => $token], 200);
    }
    
    
    public function index()
    {
        return response()->json(['hi' => 'hi'], 200);
    }
}