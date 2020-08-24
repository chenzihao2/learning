<?php
//二分查找 logN $arr必须为有序的
function binary_search($arr, $target) {
    $n = count($arr);
    $l = 0;
    $r = $n - 1;
    while ($l <= $r) {
        $mid = floor( ($r + $l) / 2);
        if ($arr[$mid] == $target) {
            return $mid;
        }
        if ($arr[$mid] > $target) {
            $r = $mid - 1;
        } else {
            $l = $mid + 1;
        }
    }

    return -1;
}

$arr = [1, 2 ,3 ,4, 5];

function binary_search_recursion ($arr, $target, $l = 0, $r = 0) {
    $n = count($arr);
    if (!$r) {
        $r = $n -1;
    }
    if ($l > $r) {
        return -1;
    }
    $mid = floor(($l + $r) / 2);
    if ($arr[$mid] == $target) {
        return $mid;
    }
    if ($arr[$mid] > $target) {
        $r = $mid - 1;
    } else {
        $l = $mid + 1;
    }
    return binary_search_recursion($arr, $target,  $l, $r);
    
}

echo binary_search_recursion($arr, 5);
