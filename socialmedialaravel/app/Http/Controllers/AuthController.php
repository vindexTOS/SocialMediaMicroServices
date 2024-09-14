<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\AuthService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exceptions\CustomeException;

class AuthController extends Controller
{
    private $authService;


    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function signup(Request $request)
    {

        try {
            DB::beginTransaction();
            $response = $this->authService->signup($request);
            DB::commit();
            return $response;
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (CustomeException $e) {
            return  $e->render();
        } catch (\Throwable  $e) {
            DB::rollBack();

            Log::debug($e);

            return response()->json(['error' => $e], 500);
        }
    }




    public function login(Request $request)
    {

        try {
            return $this->authService->login($request);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Throwable $th) {

            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }
}
