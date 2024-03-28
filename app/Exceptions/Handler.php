<?php

namespace App\Exceptions;

use App\Exceptions\Handlers\DefaultHandler;
use App\Exceptions\Handlers\ErrorExceptionHandler;
use App\Exceptions\Handlers\ModelNotFoundExceptionHandler;
use App\Exceptions\Handlers\NotFoundHttpExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, Request $request) {
            if ($this->isApiRoute($request)) {
                return response()->json(['message' => trans('errors.not_found')], 404);
            }
        });
    }

    /**
     * @param $request
     * @return bool
     */
    private function isApiRoute($request): bool
    {
        return Str::startsWith($request->getRequestUri(), ['/api', 'api']);
    }
}
