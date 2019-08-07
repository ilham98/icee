<?php

namespace App\Http\Middleware;

use App\Configuration;
use Closure;

class PassConfigurationToRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $configuration = Configuration::first();
        $request->year = $configuration->current_year;
        $request->semester = $configuration->current_semester;
        return $next($request);
    }
}
