<?php
$c = 'a';
//$c();
//$b = b();
class Aa{
function Aa() {
    /* function b() { */
    /*     echo 'b'; */
    /* } */
    echo 'b';
}
function b($funcname) {
    $this->$funcname(); 
}
}
$a = new Aa();
$a->b('Aa');
/* 函数名称不区分大小写 */
/* 函数调用可以在定义之前 */

/* 函数内的动态变量 用完就消失 静态变量会存储在内存中 */


/* &$variable  传入引用 */



/* 可变函数 */
/* $variable = 函数名; */
/* $variable(); 调用 */


/* 回调函数 */
/* array_map($functionname, $array); */
/* call_user_func($functionname, $params) */ 



/* 匿名函数 */
/* $func = function() { */

/* } */

/* $func(); */

/* array_map(function(){ */

/* }, $array) */




?>















