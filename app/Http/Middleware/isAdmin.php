<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{

    public function handle(Request $request, Closure $next)
    {
//
//        if (!Auth::check())
//        return redirect('login');
//        $user = Auth::user();
//        if ($user->type == 1) {
//            return $next($request);
//        } else {
//            Auth::logout();
//            return redirect('/login');
//        }
        return $next($request);
    }
}
