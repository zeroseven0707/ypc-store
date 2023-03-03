<?php
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
if (! function_exists('ProfileProgres')) {
function ProfileProgres(){
    $data['member'] = Member::where('iduser','=',Auth::user()->id)->first();
    $no_induk = $data['member']['no_induk'];
    $nama = $data['member']['nama'];
    $alamat = $data['member']['alamat'];
    $no_hp = $data['member']['no_hp'];
    $jk = $data['member']['jk'];
    $foto = $data['member']['foto'];
    if ($no_induk == NULL) {
        $j_induk = 0;
    }else{
        $j_induk = 1;
    }
    if($nama == NULL){
        $j_nama = 0;
    }else{
        $j_nama = 1;
    }
    if($alamat == NULL){
        $j_alamat = 0;
    }else{
        $j_alamat = 1;
    }
    if($no_hp == NULL){
        $jno_hp = 0;
    }else{
        $jno_hp = 1;
    }
    if($jk == NULL){
        $j_jk = 0;
    }else{
        $j_jk = 1;
    }
    if($foto == NULL){
        $j_foto = 0;
    }else{
        $j_foto = 1;
    }
    $jumlah = ($j_induk + $j_nama + $j_alamat + $jno_hp + $j_jk + $j_foto);
    if ($jumlah == 0) {
        $progres = 0;
    }elseif ($jumlah == 1) {
        $progres = 16;
    }
    elseif ($jumlah == 2) {
        $progres = 33;
    }elseif($jumlah == 3){
        $progres = 50;
    }elseif ($jumlah == 4) {
        $progres = 66;
    }elseif ($jumlah == 5) {
        $progres = 82;
    }elseif ($jumlah == 6) {
        $progres = 100;
    }
    echo $progres;
}
}
?>