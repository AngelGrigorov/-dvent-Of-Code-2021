<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 03.12.21
 * Time: 10:45
 */

$fh = fopen('Day 3 - Input.txt','r');
$zeroArray = [0 => 0,1 => 0,2 => 0,3 => 0,4 => 0,5 => 0,6 => 0,7 => 0,8 => 0,9 => 0,10 => 0,11 => 0];
$oneArray = [0 => 0,1 => 0,2 => 0,3 => 0,4 => 0,5 => 0,6 => 0,7 => 0,8 => 0,9 => 0,10 => 0,11 => 0];
$gamaRate = "";
$epsilonRate = "";
while ($line = fgets($fh)) {
    $array = str_split($line);

   for ($i = 0; $i < 12; $i++){

       if($array[$i] == 0)
       {
           $zeroArray[$i]++;
       }elseif($array[$i] == 1){
           $oneArray[$i]++;
       }
   }

}
fclose($fh);
ksort($zeroArray);
ksort($oneArray);


for ($i = 0; $i < 12; $i++){

    if($zeroArray[$i] > $oneArray[$i])
    {
        $gamaRate = $gamaRate . "0";
        $epsilonRate = $epsilonRate . "1";
    }elseif($zeroArray[$i] < $oneArray[$i]){
        $gamaRate = $gamaRate . "1";
        $epsilonRate = $epsilonRate . "0";

    }
}

$result = bindec($gamaRate) * bindec($epsilonRate);
echo $result;