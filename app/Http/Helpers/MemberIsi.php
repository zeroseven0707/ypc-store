<?php
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('MemberIsi')) {
function MemberIsi(){
    $data['member'] = Auth::user()->member->id;
    $semua = $data['member']['no_induk'] AND $data['member']['nama'] AND $data['member']['alamat'] AND $data['member']['no_hp'] AND $data['member']['jk'] AND $data['member']['jk'] AND $data['member']['foto'] AND $data['member']['iduser'];
    return $semua;
}
}
?>