<?php
/**
 * Created by PhpStorm.
 * User: angelgrigorov
 * Date: 03.12.21
 * Time: 16:22
 */
$fh = fopen('Day 3 - Input.txt', 'r');

$oxygenGeneratorRatingArray = [];
$CO2ScrubberRatingArray = [];

while ($line = fgets($fh)) {
    $oxygenGeneratorRatingArray[] = $line;
    $CO2ScrubberRatingArray[] = $line;
}
fclose($fh);


for ($k = 0; $k < 12; $k++) {

    $zeroCount = 0;
    $oneCount = 0;
    foreach ($oxygenGeneratorRatingArray as $key => $value) {
        if ($value[$k] == 0) {
            $zeroCount++;
        } else {
            $oneCount++;
        }
    }

    foreach ($oxygenGeneratorRatingArray as $key => $value) {
        if ($zeroCount > $oneCount) {
            if ($value[$k] == 1) {
                if (count($oxygenGeneratorRatingArray) > 1) {
                    unset($oxygenGeneratorRatingArray[$key]);
                }

            }
        } else {
            if ($value[$k] == 0) {
                if (count($oxygenGeneratorRatingArray) > 1) {
                    unset($oxygenGeneratorRatingArray[$key]);
                }
            }
        }
    }

    $oxygenGeneratorRatingArray = array_values($oxygenGeneratorRatingArray);


    $zeroCount = 0;
    $oneCount = 0;
    foreach ($CO2ScrubberRatingArray as $key => $value) {
        if ($value[$k] == 0) {
            $zeroCount++;
        } else {
            $oneCount++;
        }
    }

    foreach ($CO2ScrubberRatingArray as $key => $value) {
        if ($zeroCount > $oneCount) {
            if ($value[$k] == 0) {
                if (count($CO2ScrubberRatingArray) > 1) {
                    unset($CO2ScrubberRatingArray[$key]);
                }

            }
        } else {
            if ($value[$k] == 1) {
                if (count($CO2ScrubberRatingArray) > 1) {
                    unset($CO2ScrubberRatingArray[$key]);
                }

            }
        }
    }
    $CO2ScrubberRatingArray = array_values($CO2ScrubberRatingArray);

}

$oxygenGeneratorRatingArray = array_values($oxygenGeneratorRatingArray);
$CO2ScrubberRatingArray = array_values($CO2ScrubberRatingArray);

$oxygenGeneratorRating = $oxygenGeneratorRatingArray[0];
$CO2ScrubberRating = $CO2ScrubberRatingArray[0];


$result = bindec($oxygenGeneratorRating) * bindec($CO2ScrubberRating);
echo $result;