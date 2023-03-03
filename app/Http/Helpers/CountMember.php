<?php
use App\Models\Member;
if (! function_exists('countM')) {
function countM(){
    $data = Member::count();
    return $data;
}
}
?>