<?php
use App\Models\Member;
use App\Models\Penjual;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('getIdPenjual')) {
function getIdPenjual(){
    $data = Member::where('iduser','=',Auth::user()->id)->first();
    $penjual = Penjual::where('id',$data['id'])->first();
    return $penjual['id'];

}
}
?>