<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class CustomeException extends Exception
{

    protected string $msg;
    protected int $statusCode;

    public function __construct(string $msg, int $statusCode)
    {
         parent::__construct($msg);
        $this->msg = $msg;
        $this->statusCode = $statusCode;
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'message' => $this->msg,
            'statusCode' => $this->statusCode
        ], $this->statusCode);
    }

}
