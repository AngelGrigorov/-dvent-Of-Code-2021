<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 06.12.21
 * Time: 00:23
 */
$fh = fopen('Day 4 - Input.txt', 'r');

$bingoNumbersArray = [];
$boardsArray = [];
$board = [];
while ($line = fgets($fh)) {
    if(empty($bingoNumbersArray))
    {
        $bingoNumbersArray = array_map('intval', explode(',', $line));
    }
    elseif(strlen($line) != 1)
    {
        $row = array_map('trim', explode(' ', $line));
        foreach ($row as $k => $val)
        {
            if($val == "")
            {
                unset($row[$k]);
            }
        }
        $row = array_map('intval', array_values($row));
        $newRow = [];

        foreach ($row as $key => $value) {
            $newRow[$key][] = $value;
            $newRow[$key][] = "Not Marked";
        }
        $board[] = $newRow;
    }
    if(count($board) == 5)
    {
        $boardsArray[] = $board;
        $board = [];
    }
}
fclose($fh);
$winningList = [];
foreach ($bingoNumbersArray as $number)
{
    for ($i = 0; $i < count($boardsArray);$i++){
        for ($j = 0; $j < 5;$j++){
            for($k = 0; $k < 5;$k++){
                if($boardsArray[$i][$j][$k][0] == $number){
                    $boardsArray[$i][$j][$k][1] = "Marked";
                    $winningList = checkForWinner($boardsArray,$winningList);
                    if(count($winningList) == count($boardsArray))
                    {
                        calculateSumAndResult($boardsArray, $winningList[count($winningList) - 1], $number);
                        return;
                    }

                }
            }
        }
    }
}
function checkForWinner($array, $winningList){

    for ($i = 0; $i < count($array);$i++){
        for ($j = 0; $j < 5;$j++){
            if($array[$i][$j][0][1] == "Marked" && $array[$i][$j][1][1] == "Marked" && $array[$i][$j][2][1] == "Marked" && $array[$i][$j][3][1] == "Marked" && $array[$i][$j][4][1] == "Marked"){
                if(!in_array($i, $winningList)){
                    $winningList[] = $i;

                }
            }
            if($array[$i][0][$j][1] == "Marked" && $array[$i][1][$j][1] == "Marked" && $array[$i][2][$j][1] == "Marked" && $array[$i][3][$j][1] == "Marked" && $array[$i][4][$j][1] == "Marked"){
                if(!in_array($i, $winningList)){
                    $winningList[] = $i;
                }
            }
        }
    }
    return $winningList;
}
function calculateSumAndResult($boardsArray , $winningBoard, $winningNumber){
    $sum = 0;
    for ($j = 0; $j < 5;$j++){
        for($k = 0; $k < 5;$k++){
            if($boardsArray[$winningBoard][$j][$k][1] != "Marked"){

                $sum += $boardsArray[$winningBoard][$j][$k][0];
            }
        }
    }
    var_dump("RESULT: " . $winningNumber * $sum);
}
