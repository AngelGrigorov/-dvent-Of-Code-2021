<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 06.12.21
 * Time: 19:30
 */
$fh = fopen('Day 5 - Input.txt', 'r');

$rows = [];
$coordinatesArray = [];
while ($line = fgets($fh)) {

    $rows = explode(' -> ', $line);
    list($x1,$y1) = array_map('intval', explode(',', $rows[0]));
    list($x2,$y2) = array_map('intval', explode(',', $rows[1]));

    $coordinatesArray = checkCoordinates($coordinatesArray, $x1, $y1, $x2, $y2);

}
fclose($fh);

function checkCoordinates($coordinatesArray, $x1, $y1, $x2, $y2){
    if($x1 == $y1 && $x2 == $y2){
        if($x1 > $x2){
            for($i = $x2; $i <= $x1; $i++)
            {
                $a = intval($x2)+$i;
                $coordinatesArray[] =  $a  . "," . $a;
            }
        }
        elseif($x1 < $x2){
            for($i = $x1; $i <= $x2; $i++)
            {
                $a = intval($x1)+$i;

                $coordinatesArray[] =  $a . "," . $a;
            }
        }
    } elseif($x1 + $y1 == $x2 + $y2){
        if($x1 > $x2){
            for($i = 0; $i <= $x1 - $x2; $i++)
            {
                $a = intval($x1)-$i;
                $b = intval($y1)+$i;
                $coordinatesArray[] =  $a  . "," . $b;
            }
        }
        elseif($x1 < $x2){
            for($i = 0; $i <= $x2 - $x1; $i++)
            {
                $a = intval($x1)+$i;
                $b = intval($y1)-$i;

                $coordinatesArray[] =  $a . "," . $b;
            }
        }
    } elseif($x1 - $y1 == $x2 - $y2){
        if($x1 > $x2){
            for($i = 0; $i <= $x1 - $x2; $i++)
            {
                $a = intval($x1)-$i;
                $b = intval($y1)-$i;
                $coordinatesArray[] =  $a  . "," . $b;
            }
        }
        elseif($x1 < $x2){
            for($i = 0; $i <= $x2 - $x1; $i++)
            {
                $a = intval($x2)-$i;
                $b = intval($y2)-$i;

                $coordinatesArray[] =  $a . "," . $b;
            }
        }
    } elseif($x1 == $x2){
        if($y1 < $y2){
            for($i = $y1; $i <= $y2; $i++)
            {
                $coordinatesArray[] =  $x1 . "," . $i;
            }
        }
        elseif($y1 > $y2){
            for($i = $y2; $i <= $y1; $i++)
            {
                $coordinatesArray[] =  $x1 . "," . $i;
            }
        }
    }elseif($y1 == $y2){
        if($x1 < $x2){
            for($i = $x1; $i <= $x2; $i++)
            {
                $coordinatesArray[] =  $i . "," . $y1;
            }
        }
        elseif($x1 > $x2){
            for($i = $x2; $i <= $x1; $i++)
            {
                $coordinatesArray[] =  $i . "," . $y1;
            }
        }
    }elseif($x1 == $y1 && $x2 == $y2){
        if($x1 < $x2){
            for($i = $x1; $i <= $x2; $i++)
            {
                $coordinatesArray[] =  $i . "," . $i;
            }
        }
        elseif($x1 > $x2){
            for($i = $x2; $i <= $x1; $i++)
            {
                $coordinatesArray[] =  $i . "," . $i;
            }
        }
    }elseif($x1 == $y2 && $x2 == $y1){
        if($x1 < $x2){
            for($i = 0; $i <= $x2-$x1 ; $i++)
            {
                $a = intval($x1)-$i;
                $b = intval($x2)+$i;
                $coordinatesArray[] =  $a . "," . $b;
            }
        }
        elseif($x1 > $x2){
            for($i = 0; $i <= $x1-$x2 ; $i++)
            {
                $a = intval($x2)+$i;
                $b = intval($x1)-$i;
                $coordinatesArray[] =  $a . "," . $b;
            }
        }
    }elseif($x1 == $y2 && $x2 == $y1){
        if($x1 < $x2){
            for($i = 0; $i <= $x2-$x1 ; $i++)
            {
                $a = intval($x1)-$i;
                $b = intval($x2)+$i;
                $coordinatesArray[] =  $a . "," . $b;
            }
        }
        elseif($x1 > $x2){
            for($i = 0; $i <= $x1-$x2 ; $i++)
            {
                $a = intval($x2)+$i;
                $b = intval($x1)-$i;
                $coordinatesArray[] =  $a . "," . $b;
            }
        }
    }

    return $coordinatesArray;
}
$resultArray = array_count_values($coordinatesArray);
$count = 0;
foreach ($resultArray as $key => $value){
    if($value > 1)
    {
        $count++;
    }
}
var_dump($count);