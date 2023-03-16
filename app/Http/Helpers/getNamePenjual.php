<?php
use App\Models\Member;
use App\Models\Penjual;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('namapenjual')) {
function namapenjual(){
    return Auth::user()->member->penjual->nama_toko;

}
}
?>