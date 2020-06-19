<?php
/**
 * Created by PhpStorm.
 * User: zihao
 * Date: 2018/4/12
 * Time: 上午10:36
 */
//class A {
//    function say(){
//        echo "A".__class__."<br/>";
//        echo "A".get_class()."<br/>";
//        echo "A".get_called_class()."<br/>";
//    }
//}
//class B extends A{
//    function say(){
//        echo "B".__class__."<br/>";
//        echo "B".get_class()."<br/>";
//        echo "B".get_called_class()."<br/>";
//    }
//}
/**
 * get_class();获取当前类名
 * get_called_class();获取继承或调用的那个类的类名
*/
class Foo{
    public function test(){
        var_dump(get_class());
    }

    public function test2(){
        var_dump(get_called_class());
    }

    public static function test3(){
        var_dump(get_class());
    }

    public static function test4(){
        var_dump(get_called_class());
    }
}
class B extends Foo{

}
$B=new B();
$B->test();//string(3) "Foo"
$B->test2();//string(1) "B"
Foo::test3();//string(3) "Foo"
Foo::test4();//string(3) "Foo"
B::test3();//string(3) "Foo"
B::test4();//string(1) "B"

/**list()语言结构***/
$my_array = array("Dog","Cat","Horse");

list($a, $b, $c) = $my_array;
echo "I have several animals, a $a, a $b and a $c.";
