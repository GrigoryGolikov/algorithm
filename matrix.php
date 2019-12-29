<?php
function createSpiral($w, $h)
{
    if ($w <= 0 || $h <= 0) return FALSE;

    $ar   = [];
    $used = [];

    for ($j = 0; $j < $h; $j++) {
        $ar[$j] = [];
        for ($i = 0; $i < $w; $i++)
            $ar[$j][$i]   = '-';
    }

    for ($j = -1; $j <= $h; $j++) {
        $used[$j] = [];
        for ($i = -1; $i <= $w; $i++) {
            if ($i == -1 || $i == $w || $j == -1 || $j == $h)
                $used[$j][$i] = true;
            else
                $used[$j][$i] = false;
        }
    }

    $n = 1;
    $i = 0;
    $j = 0;
    $direction = 0; // 0 - лево, 1 - низ, 2 - право, 3 - верх
    while (true) {
        $ar[$j][$i]   = $n++;
        $used[$j][$i] = true;

        switch ($direction) {
            case 0:
                $i++; // в право
                if ($used[$j][$i]) {
                    $i--; $j++;
                    $direction = 1;
                }
                break;
            case 1:
                $j++; // в низ
                if ($used[$j][$i]) {
                    $j--; $i--;
                    $direction = 2;
                }
                break;
            case 2:
                $i--; // в лево
                if ($used[$j][$i]) {
                    $i++; $j--;
                    $direction = 3;
                }
                break;
            case 3:
                $j--; // в верх
                if ($used[$j][$i]) {
                    $j++; $i++;
                    $direction = 0;
                }
                break;
        }

        if ($used[$j][$i])
            return $ar;
    }
}


function printArr($array) {
    foreach ($array as $row) {
        foreach ($row as $col) {
            echo sprintf("% 2d ", $col);
        }
        echo PHP_EOL;
    }
}

$w  = 8;
$h = 5;
$arr = createSpiral($w, $h);
printArr($arr);