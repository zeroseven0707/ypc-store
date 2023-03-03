<?php
use App\Models\Produk;
if (! function_exists('countP')) {
function countP(){
    $data = Produk::count();
    return $data;
}
}
?>