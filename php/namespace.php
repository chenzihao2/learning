<?php
/*
 *  namespace
 *  解决函数名冲突问题
 *  一旦使用命名空间，那么所有的代码必须写到命名空间中o
 *  如果在b空间调用a空间的函数，则必须使用完整路径 \a\hello()
 */
namespace a{
function hello(){
    echo 'hello_a';
}
const NAME = 'c';
define('NAME', 'h');
}
namespace b{
function hello(){
    \a\hello();
    echo 'hello_b';
}
const NAME = 'z';
class User {
    public $name = 'czh';
    public function user() {
    }
    public function __construct() {
        echo <<<EOF
 'construct
_user'
EOF;
        echo 'construct';

    }
}
}
namespace {
//\b\hello();
//echo $s1;
/* echo \b\NAME; */
/* echo NAME; */
$user = new \b\User;
//$user = new stdClass;
//var_dump($user);
}




/*
 * 命名空间解决类名冲突的问题
 * \    反斜线代表全局命名空间
 * stdClass 访问全局类的时候需要加上 \stdClass
 */


/*
 * 命名空间-常量
 * const 定义的常量有命名空间的区分
 * define 定义的常量为全局，不受命名空间限制
 * 
 * 普通变量不受命名空间限制
 */

