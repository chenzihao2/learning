<?php 
$data = ['a', 'b', 'c', 'd'];
foreach ($data as $k => $v) {
    $v = &$data[$k];
    var_dump($v);
}
var_dump($data);
/* $v = 'a'; */
/* $v = &$data[0]; */
/* abc */
/* $v = 'b' && $data[0] = 'b'; */
/* bbc */
/* $v = &$data[1]; */
/* $v = 'c' && $data[1] = 'c'; */
/* bcc */

die;
$a = rand(1, 1000);
var_dump(memory_get_usage());
$c = $a;
var_dump(memory_get_usage());
$a = rand(1, 1000);
var_dump(memory_get_usage());
var_dump($a, $c);
