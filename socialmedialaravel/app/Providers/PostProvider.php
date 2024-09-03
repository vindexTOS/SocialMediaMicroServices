<?php

namespace App\Providers;






use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


abstract class PostProvider
{



 protected function Valiator(Request $request)
    {
        return Validator::make($request->all(), [
            "title" => "required",
            'text' => 'required',
            "user_id" => "required",
        ]);
    }
}
