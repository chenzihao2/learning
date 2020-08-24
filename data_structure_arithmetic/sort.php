<?php
function genreateRandomArray($n) {
    $array = [];
    for ($i = 0; $i < $n; $i++) {
        $array[] = rand(0, $n); 
    }
//	var_dump($array);
    return $array;
}

/*
 * 选择排序 O(n^2)
 * 每次找出最小的值，放在最前面
 */

function selectSort($array) {
    var_dump($array);
    $n = count($array);
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($array[$j] < $array[$i]) {
                $tmp = null;
                $tmp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $tmp;
            }
        }
    }
    var_dump($array);
}

/*
 * 插入排序， 为每一个元素找到合适的插入位置n(n^2)
 * 在比较有序的数组中效率最高
 */
function insertSort($array) {
    var_dump($array);
    $n = count($array);
    for ($i = 1; $i < $n; $i++) {
        //选择$array[$i]合适的插入位置
        //$e = $array[$i];
        for($j = $i; $j > 0; $j--) {
            if ($array[$j] < $array[$j-1]) {
                $tmp = null;
                $tmp = $array[$j - 1];
                $array[$j - 1] = $array[$j];
                $array[$j] = $tmp;
            }
            else {
                break;
            }
        }
    }
    var_dump($array);

}

/*
 * 冒泡排序 O(n^2)
 * 循环两次 每次比较当前元素和当前下一个元素的大小，并进行位置调整
 */
function bubbleSort($array) {
    $n = count($array) - 1;
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i; $j++) {
            if ($array[$j + 1] < $array[$j]) {
                $tmp = null;
                $tmp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $tmp;
            }
        }
    }
}

/*
 * 归并排序 O(nlogn)
 * 讲数组从中间一分为二，分别对两部分进行归并排序，再合并
 */

function mergeSort($array) {
    $n = count($array);
    if ($n < 2) {
        return $array;
    }
    $mid = floor(($n - 1) / 2);
    $left = array_slice($array, 0, $mid + 1);
    $right = array_slice($array, $mid + 1, $n - $mid - 1);
    return merge(mergeSort($left), mergeSort($right));
	//var_dump($array);
}

function merge($left, $right) {
    $result = [];
    while (count($left) && count($right)) {
        if ($left[0] < $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    } 
    while(count($left)) {
            $result[] = array_shift($left);
    }
    while(count($right)) {
            $result[] = array_shift($right);
    }

    return $result;
}

/*
 * 快速排序 O(nlogn)
 * 选一个基准值，将数组分成三部分，左边是小于基准值的 右边是大于基准值的，中间是基准值，再分别对左右进行重复操作，最后合并
 *
 * 有序性比较高的时候 慢 
 */

function quickSort($array) {
    $n = count($array);
    if ($n < 2) {
        return $array;
    }
    $right = $left = $mid = [];
    $index = $array[0]; //基准值  此值的选择会影响整体效率(考虑随机)
    foreach ($array as $v) {
        if ($v > $index) {
            $right[] = $v;
            continue;
        }
        if($v == $index  && empty($mid)) {
            $mid[] = $index;
            continue;
        }
        $left[] = $v;
    }
    $left = quickSort($left);
    $right = quickSort($right);
    return array_merge($left, $mid,  $right);
    
}






//二分查找    
function binary_search($arr, $target) {
    $n = count($arr);
    $l = 0;
    $r = $n - 1;
    while ($l <= $r) {
        $mid = ceil( ($r + $l) / 2);
        if ($arr[$mid] == $target) {
            return $mid;
        }
        if ($arr[$mid] > $target) {
            $r = $mid - 1;
        } else {
            $l = $mid + 1;
        }
    }
}

//$array = genreateRandomArray(10000);
$array = genreateRandomArray(10);
var_dump($array);
$t1 = microtime(true) * 1000;
//selectSort($array);
//insertSort($array);
//bubbleSort($array);
//$array = mergeSort($array);
$array = quickSort($array);
var_dump($array);

//echo binary_search([1,2,3, 4 ,5 ,6], 5);
//
$t2 = microtime(true) * 1000;

var_dump($t2 - $t1 . 'ms');
