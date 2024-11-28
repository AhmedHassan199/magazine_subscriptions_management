<?php

namespace App\Helpers;

class ApiResponseHelper
{
    // Success Response
    public static function success($data = null, $message = 'Operation successful', $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $status);
    }

    // Error Response
    public static function error($message = 'Operation failed', $status = 400, $errors = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}
