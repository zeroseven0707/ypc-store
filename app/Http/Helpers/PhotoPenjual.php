<?php

use App\Models\GambarToko;
use App\Models\Member;
use App\Models\Penjual;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('getPhotoPenjual')) {
function getPhotoPenjual(){
    return Auth::user()->member->penjual->gambartoko;
}
}
?>