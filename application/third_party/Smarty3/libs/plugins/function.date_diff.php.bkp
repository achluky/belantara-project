<?php

function smarty_function_date_diff($params, &$smarty) {
    $tanggal_1 = $params['tanggal_1'];
    $tanggal_2 = $params['tanggal_2'];

    $tanggal_explode_1 = explode("-", $tanggal_1);
    $hari_1 = $tanggal_explode_1[2];
    $bulan_1 = $tanggal_explode_1[1];
    $tahun_1 = $tanggal_explode_1[0];

    $tanggal_explode_2 = explode("-", $tanggal_2);
    $hari_2 = $tanggal_explode_2[2];
    $bulan_2 = $tanggal_explode_2[1];
    $tahun_2 = $tanggal_explode_2[0];

    $jd1 = gregoriantojd($bulan_1, $hari_1, $tahun_1);
    $jd2 = gregoriantojd($bulan_2, $hari_2, $tahun_2);

    $selisih = $jd2 - $jd1;
    $selisih = abs($selisih);
    
    return $selisih;    
}