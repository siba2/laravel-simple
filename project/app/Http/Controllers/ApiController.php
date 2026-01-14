<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

abstract class ApiController extends Controller
{
    protected function apiSuccess(
        mixed $data = null,
        int $statusCode = HttpResponse::HTTP_OK
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => $data
        ], $statusCode);
    }

    protected function apiError(
        string $message = 'An error occurred',
        int $statusCode = HttpResponse::HTTP_BAD_REQUEST,
        mixed $errors = null,
        string $errorCode = null
    ): JsonResponse {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        if ($errorCode) {
            $response['error_code'] = $errorCode;
        }

        return response()->json($response, $statusCode);
    }
}
