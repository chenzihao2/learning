<?php
/* 入口文件 */
/* 定义常量 */
/* 加载函数库 */
/* 启动 */

define('OWN', dirname(__DIR__));
define('CORE', OWN . '/core');
define('APP', OWN . '/app');

include CORE . '/core.php';
include CORE . '/helper.php';

spl_autoload_register(['core\Core', 'load']);

core\Core::run();

new core\Route;

