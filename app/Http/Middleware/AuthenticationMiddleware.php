<?php

namespace App\Http\Middleware;

use App\Models\Manager;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthenticationMiddleware
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
        $user = null;
        if (session()->has('user_id')) {
            $user = User::find($request->session()->get('user_id'));
        }
        if ($user != null) {
            $manager = Manager::where('user_id', $user->id)->first();
            if ($manager)
                return $next($request);
            else
                return redirect(route('logIn'));
        } else
            return redirect(route('logIn'));
    }
}
