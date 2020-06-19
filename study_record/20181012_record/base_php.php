<?php
define("A", "Welcome to runoob.com!");
$a = 1;
$b = 'asdsd';
//echo $a;
function myTest()
{
    $y = 10; // 局部变量
    global $a ;
    echo $y + $a;
}

function myTest1() {
   // myTest();
$GLOBALS['y']=$GLOBALS['a'] + $GLOBALS['b'];
    echo $GLOBALS['y'];
}

function myTest2() {
    echo A;
}

function myTest3($c, $e = 1)
{
    echo $e . "\n";
}

myTest2();
die;


//myTest3(1);

//echo $y;
//var_dump($GLOBALS);
$z = null;
$array = [
    []
];
define("Welcome to runoob.com!", '123');
$def = GREETING;
var_dump((int)FALSE);
echo (int)TRUE;
//echo "13{$def}" . TRUE;



echo  "\n" ;

global
$GLOBALS;
define();
传参;
