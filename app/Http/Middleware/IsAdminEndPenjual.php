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
        }
        $data = Member::where('iduser',Auth::user()->id)->first();
        $penjual = Penjual::where('idmember',$data->id)->first();
        $count = $penjual->id;
        if($count == NULL){
            return abort(403);
        }else{
            return $next($request);
        }
    }
}
