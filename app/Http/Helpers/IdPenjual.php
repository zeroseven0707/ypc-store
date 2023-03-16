<?php
use App\Models\Member;
use App\Models\Penjual;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('getIdPenjual')) {
function getIdPenjual(){
    return Auth::user()->member->penjual->id;

}
}
?>