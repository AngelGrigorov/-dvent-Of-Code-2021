<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 01.12.21
 * Time: 12:12
 */

$depthMeasurement = intval(readline());
$allDepthMeasurements = [];
while(true){
    $allDepthMeasurements[] = $depthMeasurement;

    if($depthMeasurement == "6624"){
        break;
    }
    $depthMeasurement = intval(readline());
}
$summedDepthMeasurements = [];
for($i = 0; $i < count($allDepthMeasurements) - 2; $i++){
    $summedDepthMeasurements[] = $allDepthMeasurements[$i] + $allDepthMeasurements[$i + 1] + $allDepthMeasurements[$i + 2];
}

$lastDepthMeasurement = 0;
$count = 0;

for($j = 0; $j < count($summedDepthMeasurements); $j++){
    if($lastDepthMeasurement != 0 && $summedDepthMeasurements[$j] > $lastDepthMeasurement){
        $count++;
    }
    $lastDepthMeasurement = $summedDepthMeasurements[$j];
}

echo $count;
