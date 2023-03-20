<?php

namespace App\Http\Middleware;

use App\Models\Member;
use App\Models\Penjual;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminEndPenjual
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->level == 'admin') {
            return $next($request);
        }elseif(Auth::user()->member->penjual->status_aktivasi == 1){
            return $next($request);
        }else{
            return abort(403);
        
        }
    }
}
