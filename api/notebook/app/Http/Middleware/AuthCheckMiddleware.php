<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = Http::withHeaders([
            'Authorization' => $request->header('Authorization'),
            'userId' => $request->header('userId')
        ])->post('http://localhost:8000/api/tokenCheck');

        if ($response->json() === true) {
            $request->user_id = $request->header('userId');
            return $next($request);
        }
        return response()->json(['token error', 401]);
    }
}
