<?php

namespace App\Exceptions;

use App\Http\Traits\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponse;

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($this->isApiRequest($request) && $e instanceof ValidationException) {
            $statusCode = $e->status;
            $errorMessage = $e->validator->errors()->first();
            
            return $this->fail_response($errorMessage, $statusCode);
        }

        return parent::render($request, $e);
    }

    /**
     * Check if the request is an API request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function isApiRequest($request)
    {
        return $request->wantsJson() || $request->is('api/*');
    }
}
