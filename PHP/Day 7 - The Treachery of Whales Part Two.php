<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 07.12.21
 * Time: 11:12
 */
$fh = fopen('day7Input.txt', 'r');

$coordinatesArray = [];
while ($line = fgets($fh)) {

    $coordinatesArray = array_map('intval', explode(',', $line));
}
fclose($fh);

$average = array_sum($coordinatesArray) / count($coordinatesArray);
$fuels = [];
foreach ([(int) floor($average), (int) ceil($average)] as $averageRounded) {
    $fuel = 0;
    foreach ($coordinatesArray as $input) {
        $fuel += (abs($input - $averageRounded) * (abs($input - $averageRounded) + 1) / 2);
    }
    $fuels[$averageRounded] = $fuel;
}
echo min($fuels);