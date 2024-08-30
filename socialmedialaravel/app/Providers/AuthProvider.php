<?php

namespace App\Providers;

use App\Exceptions\CustomeException;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

trait AuthProvider
{

    private function EmailCheck(string $email)
    {

        $user = User::where("email", $email)->first();
        if ($user)
            throw new CustomeException("Email already exists", 409);
    }
}
