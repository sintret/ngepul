<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function rupiah($data) {
    $rupiah = "";
    $jml = strlen($data);

    while ($jml > 3) {
        $rupiah = "." . substr($data, -3) . $rupiah;
        $l = strlen($data) - 3;
        $data = substr($data, 0, $l);
        $jml = strlen($data);
    }
    $rupiahs = "Rp " . $data . $rupiah . ",-";
    $rupiah = $data . $rupiah . ",-";
    return $rupiah;
}

function rupiahs($data) {
    $rupiah = "";
    $jml = strlen($data);

    while ($jml > 3) {
        $rupiah = "." . substr($data, -3) . $rupiah;
        $l = strlen($data) - 3;
        $data = substr($data, 0, $l);
        $jml = strlen($data);
    }
    $rupiahs = "Rp " . $data . $rupiah . ",-";
    return $rupiahs;
}

function Rp($price, $nolable = NULL) {
    $return = 0;
    if ($price) {
        $return = number_format($price, 0, ',', '.');
    }
    return $return;
}

function cleanFormat($str) {
    $array = ['"', "'", ",", "."];
    return str_replace($array, "", $str);
}

function dropdown_years() {
    $return = [];
    for ($i = date(Y); $i >= 2011; $i--) {
        $return[$i] = $i;
    }

    return $return;
}

function dropdown_months() {
    return ['01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'Juni', '07' => 'Juli', '08' => 'Augustus', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];
}
