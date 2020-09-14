<?php
$array = [1, 2 ,3, 4];
$target = 3;
function binary_search($array, $target, $start = 0, $end = 0 ) {
    if ($start > $end) {
        return -1;
    }
    $n = count($array);
    if (!$end) {
        $end = $n - 1;
    }
    $mid = floor(($start + $end) / 2);
    if ($array[$mid] == $target) {
        return $mid;
    }
    if ($array[$mid] < $target) {
        $start = $mid + 1;
    } else {
        $end = $mid - 1;
    } 
    return binary_search($array, $target, $start, $end);
}
echo binary_search($array, $target);


function quickSort($array) {
    $n = count($array);
    if ($n < 2) {
        return $array;
    }

    $right = $left = $mid = [];
    $index = $array[0];
    foreach ($array as $item) {
        if ($item == $index && count($mid) < 1) {
            $mid[] = $index;
        } else {
            if ($item > $index) {
                $right[] = $item;
                continue;
            }
                $left[] = $item;
        }
    }
    $left = quickSort($left);
    $right = quickSort($right);
    return array_merge($left, $mid, $right);
}
