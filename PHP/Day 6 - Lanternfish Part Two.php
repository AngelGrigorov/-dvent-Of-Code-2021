<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 06.12.21
 * Time: 11:35
 */


function parseData(){
    $fh = fopen('Day 6 - Input.txt', 'r');
    $fish = [0,0,0,0,0,0,0,0,0];


    while ($line = fgets($fh)) {
        foreach (array_map('intval', explode(',', $line)) as $startingFish) {
            $fish[$startingFish + 1]++;
        }
    }
    fclose($fh);
    return $fish;
}
$fish = parseData();

$days = 256;
$day = 0;

while ($day <= $days) {
    $fish[($day + 7) % 9] += $fish[$day % 9];
    $day++;
}

echo array_sum($fish);