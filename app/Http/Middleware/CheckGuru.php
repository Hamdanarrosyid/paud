<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckGuru
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = auth()->user();
            foreach ($user->role as $data) {
                if ($data->role == 'guru') {
                    $id = $user->id;
                    if ($user->guru->user_id = $id) {
                            if ($user->guru->tempat_id == null || $user->guru->nama == null || $user->guru->tanggal == null) {
                                return redirect()->route('profile.index');
                            }
                    }
                }
            }
        }
        return $next($request);
    }
}
