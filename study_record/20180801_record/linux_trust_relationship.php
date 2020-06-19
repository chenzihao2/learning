<?php
/*************************************************************************
    > File Name: linux_trust_relationship.php
    > Author: chenzihao
    > Created Time: 三  8/ 1 10:15:27 2018
 ************************************************************************/
linux 服务器和客户端之间添加信任关系
本机端
mkdir ~/.ssh               家目录下创建 .ssh
cd .ssh
ssh-keygen -t rsa          服务器的私钥id_rsa和公钥id_rsa.pub
ssh-add id_rsa             系统如果提示：Identity added: id_rsa (id_rsa) 就表明加载成功了         如果系统提示：could not open a connection to your authentication agent    执行ssh-agent bash





服务器端

需要拷贝本机上的公钥

scp -r chenzihao@123.56.232.217:/home/chenzihao/.ssh ./

ssh登录到服务器上，然后在服务器上，把公钥的内容追加到authorized_keys文件末尾（这个文件也在隐藏文件夹.ssh下，没有的话可以建立，没有关系）

cat id_rsa.pub >> ~/.ssh/authorized_keys
不能通过复制实现  而且要注意权限 .ssh 700  和 authorized_keys 755 不能设置为777

可以通过查看 /var/log/secure 错误日志
Protocol 2 (仅使用SSH2)
PermitRootLogin yes (允许root用户使用SSH登陆，根据登录账户设置)

ServerKeyBits 1024 (将serverkey的强度改为1024)

PasswordAuthentication no (不允许使用密码方式登陆)

 PermitEmptyPasswords no   (禁止空密码进行登陆)

RSAAuthentication yes  （启用 RSA 认证）

PubkeyAuthentication yes （启用公钥认证）

AuthorizedKeysFile   .ssh/authorized_keys
