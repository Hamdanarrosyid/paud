<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NotGuru
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
        if (Auth::check()) {
            $user = auth()->user();
            if ($user->role_id == null){
                return abort(403);
            }
            foreach ($user->role as $data) {
                if ($data->role != 'guru') {
                    return abort(403);
                }
            }
        }
        return $next($request);
    }
}
