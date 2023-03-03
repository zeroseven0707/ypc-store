<?php
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('getId')) {
function getId(){
    $data['member'] = Member::where('iduser','=',Auth::user()->id)->first();
    return $data['member']['id'];
}
}
?>