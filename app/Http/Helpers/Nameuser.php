<?php
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('getnama')) {
function getnama(){
    return Auth::user()->member->nama;
}
}
?>