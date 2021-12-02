<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 02.12.21
 * Time: 10:01
 */
$fh = fopen('Day 2 - Input.txt','r');
$position = 0;
$depth = 0;
while ($line = fgets($fh)) {
    list($command, $number) = explode(" ",$line);
    if($command == "forward") {
        $position += intval($number);
    }elseif($command == "down") {
        $depth += intval($number);
    }elseif ($command == "up") {
        $depth -= intval($number);
    }
}
fclose($fh);

$result = $position * $depth;
echo $result;