<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait
{
    public function response($data = [], string $message = 'Успешно выполнено!', int $code = Response::HTTP_OK): JsonResponse
    {
        return new JsonResponse([
            'data' => $data,
            'message' => $message,
            'memory_get_usage_mb' => memory_get_usage() / (1024 * 1024),
        ], $code);
    }

    public function error($errors = null, array $trace = [], string $message = 'Произошло ошибка!', int $code = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'errors' => $errors,
            'trace' => $trace,
            'memory_get_usage_mb' => memory_get_usage() / (1024 * 1024),
        ], $code);
    }
}
