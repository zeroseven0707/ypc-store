<?php
use App\Models\Penjual;

if (! function_exists('CountPR')) {
function countPR(){
    $data = Penjual::where('status_aktivasi','0')->count();
    return $data;
}
}
?>