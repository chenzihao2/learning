<?php
function demo($array) {
    $n = count($array);
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($array[$j] > $array[$i]) {
                $tmp = null;
                $tmp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $tmp;
            }
        }
    }
    $return = [];
    $return[] = $array[0];
    $return[] = $array[1];
    return $return;
}
