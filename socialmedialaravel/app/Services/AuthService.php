<?php 
namespace App\Services;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthService
{
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
        
        
        if(Auth::attempt(["email"=>$request->email, "password"=> $request->password])){
            $user = Auth::user();
            
            
            $token = $user->createToken('API Token')->accessToken;
            
            
            return response()->json(['user'=>$user, "token"=>$token],200);
            
        }else{
            return response()->json(['error'=>"Invalid email or password"], 401);
        }
    }
    
    
    public function index()
    {
        return response()->json(['hi' => 'hi'], 200);
    }
}