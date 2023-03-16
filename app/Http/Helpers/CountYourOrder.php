<?php
use App\Models\Member;
use App\Models\Penjual;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('yourorder')) {
function yourorder(){
    $data = Auth::user()->member->pesanan->where('statuspembayaran','belum bayar')->count();
    return $data;
}
}
?>