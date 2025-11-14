<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (ThrottleRequestsException $e, $request) {
            // Jika exception throttle terjadi pada route login
            if ($request->is('manage-cms') && $request->isMethod('post')) {
                return redirect()
                    ->route('manage') // Pastikan ini adalah route GET untuk halaman login
                    ->withErrors([
                        'email' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . $this->getAvailableSeconds($e) . ' detik.'
                    ])
                    ->withInput($request->only('email', 'remember'));
            }
        });
    }

    /**
     * Get available seconds from throttle exception
     */
    private function getAvailableSeconds(ThrottleRequestsException $e): int
    {
        $headers = $e->getHeaders();
        return $headers['Retry-After'] ?? 60;
    }
}
