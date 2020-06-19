<?php
/**
 * Created by PhpStorm.
 * User: zihao
 * Date: 2018/4/18
 * Time: 上午11:21
 *
 *
 *gitlab 账号 zihao   密码  Changetheworld4US
 *
 *  GIT 相关
 * 安装  brew install git
 * 配置信息
 *
 *克隆现有的仓库
 * 克隆仓库的命令格式是 git clone url
 *Git 克隆的是该 Git 仓库服务器上的几乎所有数据，而不是仅仅复制完成你的工作所需要文件。
 * 当你执行 git clone 命令的时候，默认配置下远程 Git 仓库中的每一个文件的每一个版本都将被拉取下来。
 *
 *
 *
 *
 * git status   查看文件处于什么状态
 *Untracked files  git目录下未跟踪的文件
 *
 *
 *
 *Changes to be committed      文件处于暂存状态   即 git add git_test.php 之后
 *
 *
 * Changes not staged for commit   跟踪状态的文件 被修改之后的状态  此时需要重新 git add
 * git commit 之前必须 git add 才是最近一次的修改版本
 * git commit -a -m     -a跳出add步骤   -m 后面加上相关的描述
 *git diff 查看暂存前后的变化
 *git log  查看提交日志
 * git log --stat 具体查看
 * git log --stat -2 展示最新的两次
 *  git add * 增加所有文件到暂存区
 * use "git reset HEAD <file>..." to unstage  取消某个文件的暂存
 *git checkout filename  还原成上一次提交的样子
 *
 *
 *
 *git remote 命令  查看远程仓库
 *
 *git pull remote[name]  自动抓取并合并到当前分支
 *
 *git push origin master  把所做的上传到 origin 服务器 的 master分支
 *
 *
 *
 *git remote add libs http://172.16.0.2/outsourcing/phplib.git   增加一个远程代码库 并命名为libs
 * git remote rename 原名 新名   重命名一个远程代码库的名字
 * git remote rm 代码库名称     删除一个远程仓库
 *
 *
 *
 *
 *
 *
 *
 * ps aux | grep fpm  查看fpm进程
 * php -i | grep ini  查找php的配置文件
 *
 *
 *
 *
 *
 *
 * 配置  bash
 * vim ~/.bash_profile

输入一下内容


alias ll='ls -alF'
alias la='ls -A'
alias l='ls -CF
保存完成之后
source ~/.bash_profile





可以使用ll等命令了



=================================


source命令用法：
source FileName
作用:在当前bash环境下读取并执行FileName中的命令。
注：该命令通常用命令“.”来替代。
如：source .bash_rc 与 . .bash_rc 是等效的。
注意：source命令与shell scripts的区别是，
source在当前bash环境下执行命令，而scripts是启动一个子shell来执行命令。这样如果把设置环境变量（或alias等等）的命令写进scripts中，就只会影响子shell,无法改变当前的BASH,所以通过文件（命令列）设置环境变量时，要用source 命令。


 *
 *
 *
 * nginx  虚拟主机相关配置
 * server {
charset utf-8;
index index.php index.html;
open_file_cache_valid 30s;
open_file_cache_min_uses 1;
listen    80;
server_name www.study_record.com;
allow all;
client_header_buffer_size 4096;
#open_file_cache max=102400 inactive=20s;
set $tid $pid-$msec-$remote_addr-$request_length-$connection;
access_log  /usr/local/var/log/nginx/sutdy-access.log main;
root   /Applications/MAMP/htdocs/study_record;根目录
location ~ \.php$ {   php--fast_cig配置
fastcgi_pass   127.0.0.1:9000;
fastcgi_index  index.php;
fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
include        fastcgi_params;
}
location /api {
if (!-e $request_filename) {
rewrite ^(.*)$ /index.php last;
}
add_header X-Tracing-Id $tid;
fastcgi_pass 127.0.0.1:9000;
fastcgi_index index.php;
fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
include        fastcgi_params;
}

location / {
autoindex on;  配置查看目录
root /Applications/MAMP/htdocs/study_record;根目录
}

# redirect server error pages to the static page /50x.html
#
error_page   500 502 503 504  /50x.html;
location = /50x.html {
root   html;
}
}

 */
