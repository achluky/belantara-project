<?php

function smarty_function_date_diff($params, &$smarty) {
    $tanggal_1 = $params['tanggal_1'];
    $tanggal_2 = $params['tanggal_2'];
    
    $firsttm = new DateTime($tanggal_1);
    $lasttm = new DateTime($tanggal_2);
    $interval = $lasttm->diff($firsttm);
    $selisih = $interval->format('%a');
    
    return $selisih;    
}