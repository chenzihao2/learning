<?php
/**
 * Created by PhpStorm.
 * User: zihao
 * Date: 2018/4/16
 * Time: 上午11:01
 */
//$_SERVER['REQUEST_URI'];//url中主域名之后的字符串
//strtok($string,$hack);按需切割字符串，可以控制节奏，随时更换;
$_SERVER['REQUEST_URI'] = '/api/anterior/tag';
//echo $_SERVER['SCRIPT_FILENAME'];/Applications/MAMP/htdocs/study_recored/20180416_record.php  当前脚本的绝对路径
//echo "<br/>";echo $_SERVER['PHP_SELF'];echo "<br/>";echo $_SERVER['PHP_SELF'];/study_recored/20180416_record.php 当前脚本地址栏的路径
//echo dirname($_SERVER['SCRIPT_FILENAME']);
//dirname($string);返回路径中的目录部分
//basename($string,$suffix) 函数返回路径中的文件名部分。  参数$suffix如果存在  则不会输出文件的扩展名
//$module = '1';//empty($module) && $module = 'welcome'; 一种简单的写法，相当于给$module为空时的默认值;
//sudo lsof -i -P | grep -i "8080" 查看80端口
if (isset($_SERVER['REQUEST_URI'])) {
    // extract the path from REQUEST_URI
    $request_path = strtok($_SERVER['REQUEST_URI'], '?');//
    var_dump($request_path);
    $base_path_len = strlen(rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/'));
    var_dump($base_path_len);
    // unescape and strip $base_path prefix, leaving $path without a leading slash
    $path = substr(urldecode($request_path), $base_path_len + 1);
    var_dump($path);
    // $request_path is "/" on root page and $path is FALSE in this case
    if ($path === FALSE) {
        $path = '';
    }

    // if the path equals the script filename, either because 'index.php' was
    // explicitly provided in the URL, or because the server added it to
    // $_SERVER['REQUEST_URI'] even when it wasn't provided in the URL (some
    // versions of Microsoft IIS do this), the front page should be served
    if ($path == basename($_SERVER['PHP_SELF'])) {
        $path = '';
    }
}
var_dump($path);








/*







#########################Nginx配置
整个nginx配置文件的结构是：http{ server{ location / {} } }

nginx配置文件里的全局选项：

user  nginx;  //进程所有者

worker_processes  1;  //启动进程数量

error_log  /var/log/nginx/error.log;  //日志文件

pid  /var/run/nginx.pid;  //PID文件

events {

worker_connections  1024;  //单个进程最大并发量

}

nginx配置文件里的配制容器：

http{

server{   //定义虚拟主机

listen  80;

server_name  localhost;

location  /  {

root  html; //网页根目录

index  index.html  index.htm;     //网页文件

}

}

}







###########################Nginx虚拟主机配置

三种模式虚拟主机：基于域名、端口、IP的虚拟主机

http{

server{   //定义虚拟主机

listen  80; //基于端口

#listen  IP：80； //基于IP

server_name  localhost;   //基于域名

location  /  {

root  html; //网页根目录

index  index.html  index.htm;     //网页文件

}

}

}







如果出现  An error occurred    则是没有启动php-fpm 的原因   执行命令 php-fpm -c /usr/local/etc/php/7.0/php.ini

