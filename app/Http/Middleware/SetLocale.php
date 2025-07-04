<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if locale is set in session
        if (session()->has('locale')) {
            $locale = session('locale');
        } else {
            // Default to English if no locale is set
            $locale = 'en';
            session(['locale' => $locale]);
        }

        // Validate locale
        if (in_array($locale, ['en', 'ar'])) {
            app()->setLocale($locale);
        } else {
            // Fallback to English for invalid locales
            app()->setLocale('en');
            session(['locale' => 'en']);
        }

        return $next($request);
    }
}
