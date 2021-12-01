<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 01.12.21
 * Time: 10:26
 */
$depthMeasurement = intval(readline());
$count = 0;
$lastDepthMeasurement = 0;
while(true){
    if($lastDepthMeasurement != 0 && $depthMeasurement > $lastDepthMeasurement){
        $count++;
    }
    $lastDepthMeasurement = $depthMeasurement;
    if($depthMeasurement == "6624"){
        break;
    }
    $depthMeasurement = intval(readline());
}
echo $count;
