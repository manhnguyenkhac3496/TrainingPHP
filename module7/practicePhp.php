<?php

$arr = array(0,0,0,1,0);

$maxTotal = 0; $max = $arr[0];
$minTotal = 0; $min = $arr[0];
for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] > $min) {
        $maxTotal += $arr[$i];
    } else {
        $maxTotal += $min;
        $min = $arr[$i];
    }

    if ($arr[$i] < $max) {
        $minTotal += $arr[$i];
    } else {
        $minTotal += $max;
        $max = $arr[$i];
    }

}

echo $minTotal."   ".$maxTotal;
