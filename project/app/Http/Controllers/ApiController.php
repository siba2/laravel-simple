<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

abstract class ApiController extends Controller
{
    protected function apiSuccess(
        mixed $data = null,
        int $statusCode = HttpResponse::HTTP_OK
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $statusCode);
    }

    protected function apiCreated(mixed $data = null): JsonResponse
    {
        return $this->apiSuccess($data, HttpResponse::HTTP_CREATED);
    }

    protected function apiAccepted(mixed $data = null): JsonResponse
    {
        return $this->apiSuccess($data, HttpResponse::HTTP_ACCEPTED);
    }

    protected function apiNoContent(): JsonResponse
    {
        return response()->json(null, HttpResponse::HTTP_NO_CONTENT);
    }


    protected function apiError(
        string $message = 'An error occurred',
        int $statusCode = HttpResponse::HTTP_BAD_REQUEST,
        mixed $errors = null,
        ?string $errorCode = null
    ): JsonResponse {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if ($errors !== null) {
            $response['errors'] = $errors;
        }

        if ($errorCode !== null) {
            $response['error_code'] = $errorCode;
        }

        return response()->json($response, $statusCode);
    }

    protected function apiBadRequest(
        string $message = 'Bad request',
        mixed $errors = null
    ): JsonResponse {
        return $this->apiError(
            $message,
            HttpResponse::HTTP_BAD_REQUEST,
            $errors
        );
    }

    protected function apiUnauthorized(
        string $message = 'Unauthorized'
    ): JsonResponse {
        return $this->apiError(
            $message,
            HttpResponse::HTTP_UNAUTHORIZED,
            null,
            'UNAUTHORIZED'
        );
    }

    protected function apiForbidden(
        string $message = 'Forbidden'
    ): JsonResponse {
        return $this->apiError(
            $message,
            HttpResponse::HTTP_FORBIDDEN,
            null,
            'FORBIDDEN'
        );
    }

    protected function apiNotFound(
        string $message = 'Resource not found'
    ): JsonResponse {
        return $this->apiError(
            $message,
            HttpResponse::HTTP_NOT_FOUND,
            null,
            'NOT_FOUND'
        );
    }

    protected function apiConflict(
        string $message = 'Resource conflict'
    ): JsonResponse {
        return $this->apiError(
            $message,
            HttpResponse::HTTP_CONFLICT,
            null,
            'CONFLICT'
        );
    }

    protected function apiUnprocessableEntity(
        string $message = 'Validation failed',
        mixed $errors = null
    ): JsonResponse {
        return $this->apiError(
            $message,
            HttpResponse::HTTP_UNPROCESSABLE_ENTITY,
            $errors,
            'VALIDATION_ERROR'
        );
    }

    protected function apiTooManyRequests(
        string $message = 'Too many requests'
    ): JsonResponse {
        return $this->apiError(
            $message,
            HttpResponse::HTTP_TOO_MANY_REQUESTS,
            null,
            'TOO_MANY_REQUESTS'
        );
    }

    protected function apiInternalError(
        string $message = 'Internal server error'
    ): JsonResponse {
        return $this->apiError(
            $message,
            HttpResponse::HTTP_INTERNAL_SERVER_ERROR,
            null,
            'INTERNAL_ERROR'
        );
    }

    protected function apiServiceUnavailable(
        string $message = 'Service unavailable'
    ): JsonResponse {
        return $this->apiError(
            $message,
            HttpResponse::HTTP_SERVICE_UNAVAILABLE,
            null,
            'SERVICE_UNAVAILABLE'
        );
    }
}
