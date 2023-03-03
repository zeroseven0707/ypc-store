<?php
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('verifikasi')) {
function verifikasi(){
    $data['member'] = Member::where('iduser','=',Auth::user()->id)->first();
    $count = count($data);
    $kosong=NULL;
    if($count == 1){
        if ($data['member']['status_aktif'] == false) {
            if($data['member']['no_induk'] != NULL && $data['member']['nama'] != NULL && $data['member']['alamat'] != NULL &&$data['member']['no_hp'] != NULL &&$data['member']['jk'] != NULL &&$data['member']['foto'] != NULL){
                echo '<small class="text-danger" style="position:absolute; margin-top:-10px;">Menunggu Verifikasi <a href="/profile">edit</a></small>';
                }else{
                    echo '<a href="/profile"><small class="text-danger" style="position:absolute; margin-top:-10px;">Finish your profile</small></a>';
                };
            }else{
                echo '<a href="/profile"><button class="badge bg-success" style="position:absolute; margin-left:-73px; margin-top:-6px;">verified</button></a>';
            }
    }else{
        return $kosong;
    }

}
}
?>