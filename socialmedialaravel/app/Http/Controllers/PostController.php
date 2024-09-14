<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Exceptions\CustomeException;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    private $postService;


    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }


    public function index(Request $request)
    {

        try {
            return  $this->postService->index($request);
        } catch (\Throwable $th) {
            return response()->json(['error' =>  $th], 500);
        }
    }


    public function store(Request $request)
    {

        try {
            return $this->postService->store($request);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Throwable $th) {
        }
        return response()->json(['error' =>  $th], 500);
    }

    public function show(string $id)
    {
        try {
            return $this->postService->show($id);
        } catch (CustomeException $e) {

            return response()->json(['error' => "post not found"], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' =>  $th], 500);
        }
    }
   public function update(Request $request, $id){

    try {
        return $this->postService-> update($request, $id);
    } catch (CustomeException $e) {

        return response()->json(['error' => "post not found"], 404);
    } catch (\Throwable $th) {
        return response()->json(['error' =>  $th], 500);
    }
   }
    public function destroy(string $id)
    {
        try {
            return $this->postService->destroy($id);
        } catch (CustomeException $e) {

            return response()->json(['error' => "post not found"], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' =>  $th], 500);
        }
    }
}
