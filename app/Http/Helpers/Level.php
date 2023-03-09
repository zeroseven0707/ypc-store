<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

if (! function_exists('Level')) {
function Level(){
    return Auth::user()->level;
}
}
?>