<?php
$countElictric = 200;

echo calculateMoney($countElictric);
function calculateMoney($count) : float
{
    if($count <= 50) {
        return $count*3.5;
    }

    $count -= 50;
    if ($count <= 50) {
        return $count*4 + 50*3.5;
    }

    $count -= 50;
    if ($count <= 100) {
        return $count*5 + 50*4 + 50*3.5;
    }

    $count - 100;
    return $count*6 + 100*5 + 50*4 + 50*3.5;
}