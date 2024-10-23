<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckInstallation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (file_exists(public_path('installed.php'))) {
            // If 'installed' file exists and the user tries to access '/setup', redirect to the main URL
            if ($request->is('setup')) {
                return redirect('/');
            }
        } else {
            // If 'installed' file doesn't exist and the user isn't on '/setup', redirect to '/setup'
            if (!$request->is('setup')) {
                return redirect('/setup');
            }
        }
        return $next($request);
    }
}
