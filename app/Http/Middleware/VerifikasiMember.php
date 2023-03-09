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
        $data['member'] = Member::where('iduser','=',Auth::user()->id)->first();
        $penjual = Penjual::where('idmember','=',$data['member']['id'])->first();
        if ($data['member']['status_aktif'] == '1') {

            if ($penjual == NULL) {
                    return $next($request);
                }else{
                return back()->with(['session' => 'Anda Sudah Membuat Toko']);
            }
        }else{
            return back()->with(['session' => 'Akun Anda belum diverifikasi']);
        }
    }
}
