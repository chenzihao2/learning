<?php
/*************************************************************************
    > File Name: object_reference.php
    > Author: chenzihao
    > Created Time: Wed Feb 20 11:24:55 2019
 ************************************************************************
somethings about object

instanceof 判断某变量是否属于某一个类的实例  包括继承的父类

new self || new static ; 都是实例化自身，如果没有继承，两者返回的都一样。但是如果有继承，new self 返回原类的实例，new static 返回实际子类的实例(延迟绑定), static的值使用的是最后实际调用那个方法的类。

*/


namespace Test;

class Foo
{
    public $bar;

    public function __construct() {
        $this->bar = function() {
            return 42;
        };
    }
}
echo Foo::class,PHP_EOL;die;
$foo = new Foo;
print_r(($foo->bar)());die;

class A {
    public $foo = 1;
    public function re() {
        return new static;
    }
}  

class B extends A {
    public function foo($bar)
    {
        $bar->foo = 42;
    }
    
    public function bar($bar)
    {
        $bar = new A;
    }
}

$f = new A;
$g = new B;
$a = $f->re();
var_dump($a);
$b = $g->re();
var_dump($b);die;
$h = &$f;
echo $h->foo . "\n";

$g->foo($f);
echo $f->foo . "\n";

$g->bar($h);
echo $f->foo . "\n";
