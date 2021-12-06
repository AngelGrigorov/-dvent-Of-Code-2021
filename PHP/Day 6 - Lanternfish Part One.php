<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 06.12.21
 * Time: 11:22
 */

$fh = fopen('Day 6 - Input.txt', 'r');

$fish = [];
$fishCopy = [];

while ($line = fgets($fh)) {
    $fish = array_map('intval', explode(',', $line));
}
fclose($fh);
$fishCopy = $fish;
for ($i = 0; $i < 80; $i++)
{
    $fish = $fishCopy;

    for($j = 0; $j < count($fish); $j++)
    {

        if(in_array($fish[$j],[1,2,3,4,5,6,7,8])){
            $fishCopy[$j]--;
        }elseif ($fish[$j] == 0){
            $fishCopy[$j] = 6;
            $fishCopy[] = 8;
        }
    }
}

var_dump(count($fishCopy));