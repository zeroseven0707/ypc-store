<?php
use App\Models\Member;
use App\Models\Penjual;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('namapenjual')) {
function namapenjual(){
    $data['member'] = Member::where('iduser','=',Auth::user()->id)->first();
    $p = $data['member']['id'];
    $penjual = Penjual::where('idmember',$p)->first();
    return $penjual->nama_toko;
}
}
?>