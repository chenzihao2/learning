/*************************************************************************
    > File Name: nginx_403.php
    > Author: chenzihao
    > Created Time: 一  6/11 11:01:01 2018
 ************************************************************************/
<?php
?>
nginx 服务器403的几种可能
11111111111111111111111111111111
需要使用有权限的用户去执行nginx 
查看nginx.conf 中的user 是否是nobady  可以改成root或其他有权限的用户
2222222222222222222222222222222
检查目录权限 权限不够的话 chmod -R 755 /var/www
3333333333333333333333333333333
nginx.conf 里面的配置允许访问IP
4444444444444444444444444444444
默认目录文件 index.html 是否存在
