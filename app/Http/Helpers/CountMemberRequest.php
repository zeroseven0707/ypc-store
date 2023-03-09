<?php

use App\Models\Member;
if (! function_exists('CountMR')) {
function countMR(){
    $data = Member::where('status_aktif','0')->count();
    return $data;
}
}
?>