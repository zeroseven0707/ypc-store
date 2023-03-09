<?php

use App\Models\Penjual;
use App\Models\Produk;
if (! function_exists('countT')) {
function countT(){
    $data = Penjual::count();
    return $data;
}
}
?>