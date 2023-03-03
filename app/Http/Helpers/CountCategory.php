<?php

use App\Models\Kategori;
if (! function_exists('countC')) {
function countC(){
    $data = Kategori::count();
    return $data;
}
}
?>