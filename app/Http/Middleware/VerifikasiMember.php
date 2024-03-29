<?php

namespace App\Http\Middleware;

use App\Models\Member;
use App\Models\Penjual;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifikasiMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = Member::where('iduser','=',Auth::user()->id)->first();
        if ($data->status_aktif == '0'){
                return back()->with(['session' => 'Akun Anda belum diverifikasi']);
        }
        return $next($request);
    }
}
