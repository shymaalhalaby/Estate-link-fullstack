<?php

namespace App\Http\Middleware;


use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsOwner {
    /**
    * Handle an incoming request.
    *
    * @param  \Closure( \Illuminate\Http\Request ): ( \Symfony\Component\HttpFoundation\Response )  $next
    */

   public function handle($request, Closure $next)
{
    // Debug log
    Log::info('Owner middleware hit', ['user' => auth()->user()]);

    if (auth()->check() && auth()->user()->is_owner) {
        return $next($request);
    }

    Log::warning('Unauthorized access to owner route', ['user' => auth()->user()]);
    abort(403);
}


}
