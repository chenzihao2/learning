<?php
/**
 * User: zihao
 * Date: 2018/5/22
 * Time: 下午5:45
 */
?>
linux系统下nginx安装目录和nginx.conf配置文件目录
1、查看nginx安装目录

输入命令

# ps  -ef | grep nginx

返回结果包含安装目录

root      2662     1  0 07:12 ?        00:00:00 nginx: master process /usr/sbin/nginx

2、查看nginx.conf配置文件目录

输入命令

# nginx -t

返回结果包含配置文件目录
nginx: the configuration file /etc/nginx/nginx.conf syntax is ok

nginx: configuration file /etc/nginx/nginx.conf test is successful

3、启动nginx服务

[root@localhost ~]# nginx安装目录 -c nginx.conf配置文件目录

参数 “-c” 指定了配置文件的路径，如果不加 “-c” 参数，Nginx 会默认加载其安装目录的 conf 子目录中的 nginx.conf 文件