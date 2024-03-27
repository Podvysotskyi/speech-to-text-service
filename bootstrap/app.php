<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->shouldRenderJsonWhen(function (Request $request, Throwable $e) {
            return $request->expectsJson();
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return Inertia::render('Error', [
                'status' => Response::HTTP_NOT_FOUND,
            ])->toResponse($request)->setStatusCode(Response::HTTP_NOT_FOUND);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
            return Inertia::render('Error', [
                'status' => Response::HTTP_FORBIDDEN,
            ])->toResponse($request)->setStatusCode(Response::HTTP_FORBIDDEN);
        });
    })->create();
