<?php
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('getphoto')) {
function getphoto(){
    return Auth::user()->member->foto;
}
}
?>