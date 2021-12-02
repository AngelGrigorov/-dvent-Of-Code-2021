<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 02.12.21
 * Time: 10:09
 */
$fh = fopen('day2Input.txt','r');
$position = 0;
$depth = 0;
$aim = 0;
while ($line = fgets($fh)) {
    list($command, $number) = explode(" ",$line);
    if($command == "forward") {
        $position += intval($number);
        if($aim > 0)
        {
            $depth += intval($number) * $aim;
        }
    }elseif($command == "down") {
        $aim += intval($number);
    }elseif ($command == "up") {
        $aim -= intval($number);
    }
}
fclose($fh);

$result = $position * $depth;
echo $result;