<?php
/**
 * User: zihao
 * Date: 2018/5/18
 * Time: 上午11:36
 *
 *
 *
 *
 *
 *
 * id_rsa.pub和id_rsa。前者是你的公钥，后者是你的私钥。
 *
 * 所谓"公钥登录"，原理很简单，就是用户将自己的公钥储存在远程主机上。登录的时候，远程主机会向用户发送一段随机字符串，
 * 用户用自己的私钥加密后，再发回来。远程主机用事先储存的公钥进行解密，如果成功，就证明用户是可信的，直接允许登录shell，不再要求密码。
 *
 *
 *SSH的其他参数
SSH还有一些别的参数，也值得介绍。
N参数，表示只连接远程主机，不打开远程shell；T参数，表示不为这个连接分配TTY。这个两个参数可以放在一起用，代表这个SSH连接只用来传数据，不执行远程操作。
　　$ ssh -NT -D 8080 host
f参数，表示SSH连接成功后，转入后台运行。这样一来，你就可以在不中断SSH连接的情况下，在本地shell中执行其他操作。
　　$ ssh -f -D 8080 host
要关闭这个后台连接，就只有用kill命令去杀掉进程。
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
 *
 *
 *
 *
 *
 *
 */