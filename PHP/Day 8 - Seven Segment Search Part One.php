<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 08.12.21
 * Time: 20:13
 */
$fh = fopen('day8Input.txt', 'r');

$total = 0;
while ($line = fgets($fh)) {

    list($first, $second) = explode(' | ', $line);

    foreach (explode(' ', trim($second)) as $command) {
        $len = strlen($command);
        if ($len === 2 || $len === 4 || $len === 3 || $len === 7) {
            $total++;
        }
    }
}
fclose($fh);



var_dump($total);