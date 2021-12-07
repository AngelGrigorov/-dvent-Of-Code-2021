<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 07.12.21
 * Time: 11:01
 */
$fh = fopen('day7Input.txt', 'r');

$coordinatesArray = [];
while ($line = fgets($fh)) {

    $coordinatesArray = array_map('intval', explode(',', $line));
}
fclose($fh);
$leastFuelCost = PHP_INT_MAX;

foreach ($coordinatesArray as $number){
    $fuelCost = 0;
    foreach ($coordinatesArray as $value){
        $fuelCost += abs($number - $value);
    }
    if($fuelCost < $leastFuelCost){
        $leastFuelCost = $fuelCost;
    }
}
var_dump($leastFuelCost);
