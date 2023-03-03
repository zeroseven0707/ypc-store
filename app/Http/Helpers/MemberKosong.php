<?php
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('MemberKosong')) {
function MemberKosong(){
    $data['member'] = Member::where('iduser','=',Auth::user()->id)->first();
    $op = $data['member']['no_induk'] == NULL|| $data['member']['nama'] == NULL|| $data['member']['alamat'] == NULL|| $data['member']['no_hp'] == NULL|| $data['member']['jk'] == NULL|| $data['member']['jk'] == NULL|| $data['member']['foto'] == NULL|| $data['member']['iduser'] == NULL;
    return $op;
}
}
?>