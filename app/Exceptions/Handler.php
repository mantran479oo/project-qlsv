<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    //  /**
    //  * Report or log an exception.
    //  *
    //  * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
    //  *
    //  * @param \Exception $exception
    //  */
    // public function report(Exception $exception): void
    // {
    //     parent::report($exception);
    // }


    //     /**
    //  * Render an exception into an HTTP response.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @param \Exception               $exception
    //  */
    // public function render($request, Exception $exception)
    // {
    //     return parent::render($request, $exception);
    // }
}
