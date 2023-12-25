<?php

use Illuminate\Http\Resources\Json\JsonResource;

if (!function_exists('success')) {
    function success(mixed $data = [], int $status = 200): Illuminate\Http\JsonResponse
    {
        $res['data'] = $data;

        return response()->json($res, $status);
    }
}

if (!function_exists('error')) {
    function error(\Exception $e): Illuminate\Http\JsonResponse
    {
        return response()->json([
//            'success' => false,
            'error' => [
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]
        ], method_exists($e, 'getStatus') ? $e->getStatus() : 400);
    }
}
