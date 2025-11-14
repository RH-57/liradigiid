<?php

use App\Http\Middleware\TrackVisitor;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            // ✅ Definisikan RateLimiter di sini
            RateLimiter::for('login', function ($request) {
                return [
                    Limit::perMinute(5)->by($request->ip().$request->userAgent()),
                ];
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            TrackVisitor::class,
            \Spatie\Honeypot\ProtectAgainstSpam::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (NotFoundHttpException $e) {
             $contacts = \App\Models\Contact::first(); // ambil data pertama dari tabel contacts
            return response()->view('website.errors.404', compact('contacts'), 404);
        });
    })->create();
