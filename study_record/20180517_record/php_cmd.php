<?php
/**
 * User: zihao
 * Date: 2018/5/17
 * Time: 上午11:38
 *
 *
 * php 命令行直接执行
 *
 *
 * php  test.php   直接执行php文件  也可以执行其他文件
 * php -r   'php code'   直接执行php代码
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *php -r 'var_dump($argv);' abc  ddd
 * 执行脚本或命令时 传递参数    参数存在 $argv 变量中
 * 该数组中下标为零的成员为脚本的名称（当 PHP 代码来自标准输入获直接用 -r 参数以命令行方式运行时，该名称为“-”）
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *php 可执行脚本
 *   脚本内容
#!/usr/bin/php
<?php
var_dump($argv);
?>
给可执行权限
 ./test_do.php   即可执行
 *
 *
 *
 *
 *
 *
 *
 *
 * php -c php.ini   指定php配置文件
 *
 *
 *
 *
 *  php  -a      交互的使用PHP              important!!!!!!
 *
 *
 *
 *
 *
 *
 *
 * php -m PHP 将打印出内置以及已加载的 PHP 及 Zend 模块
 *
 *
 *php -i  打开phpinfo();
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */



