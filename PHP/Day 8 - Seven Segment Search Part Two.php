<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 08.12.21
 * Time: 20:45
 */
$data = file_get_contents('day8Input.txt');
function inter($n) { $m = explode(' | ', $n); return $m; }
$arr_data = array_map("inter", preg_split('/\n+/', $data, -1, PREG_SPLIT_NO_EMPTY));

$numbers = [0=>[0,1,2,4,5,6],1=>[2,5],2=>[0,2,3,4,6],3=>[0,2,3,5,6],4=>[1,2,3,5],5=>[0,1,3,5,6],6=>[0,1,3,4,5,6],7=>[0,2,5],8=>[0,1,2,3,4,5,6],9=>[0,1,2,3,5,6]];

function sort_string($a,$b){
    return strlen($a)-strlen($b);
}

$top_numbers = [];
foreach ($arr_data as $key => $value) {
    $split = explode(" ", $value[0]);
    usort($split,'sort_string');
    $doble_split = array_map(function ($n){return str_split($n);}, $split);
    $NUM = "";
    $digits_pos = [];

    $pos = array_diff($doble_split[1], $doble_split[0]);
    $digits_pos[0] = array_pop($pos);
    $pos = array_intersect(array_intersect($doble_split[6],$doble_split[7],$doble_split[8]),$doble_split[0]);
    $digits_pos[5] = array_pop($pos);
    $pos = array_diff($doble_split[0],[$digits_pos[5]]);
    $digits_pos[2] = array_pop($pos);
    $pos = array_intersect($doble_split[3], $doble_split[4], $doble_split[5], $doble_split[2]);
    $digits_pos[3] = array_pop($pos);
    $pos = array_diff($doble_split[2],$digits_pos);
    $digits_pos[1] = array_pop($pos);
    $pos = array_diff(array_intersect(array_intersect($doble_split[6],$doble_split[7],$doble_split[8]),$doble_split[9]),$digits_pos);
    $digits_pos[6] = array_pop($pos);
    $pos = array_diff($doble_split[9],$digits_pos);
    $digits_pos[4] = array_pop($pos);

    $split2 = explode(" ", $value[1]);
    foreach ($split2 as $key2 => $val) {
        $array_str = str_split($val);
        $number = [];

        foreach ($array_str as $key3 => $value2) {
            $digi_key = array_search($value2, $digits_pos);
            array_push($number, $digi_key);
        }

        sort($number);
        $digi_key = array_search($number, $numbers);
        $NUM .= $digi_key;
    }
    array_push($top_numbers, (int)$NUM);
}

var_dump(array_sum($top_numbers));