<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->all());
        $locale = Session::get('lang', config('app.locale'));

        if ($request->has('lang')) {
            $locale = $request->get('lang');

            session()->put('lang', $locale);
        }

        if (in_array($locale, config('app.supported_locales', ['en']))) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
