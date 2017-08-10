<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 26/07/2017
 * Time: 16:06
 */

namespace App\Http\Middleware;
use Closure;

class StartSession
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
       session_start();
    }
}