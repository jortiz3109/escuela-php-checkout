<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LangAuto
{
    public const LOCALES = ['en', 'es'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale($request->getPreferredLanguage(self::LOCALES));

        return $next($request);
    }
}
