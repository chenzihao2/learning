<?php
/**
 *
 * ------------------------------------------------------------------------------------------------------------------------
 * xml   simplexml_load_string(); libxml_disable_entity_loader(true);
 *
 * ------------------------------------------------------------------------------------------------------------------------
 * ssh
 *
 * ------------------------------------------------------------------------------------------------------------------------
 * iterm2_order
 * 新建标签：command + t

关闭标签：command + w

切换标签：command + 数字 command + 左右方向键

切换全屏：command + enter

查找：command + f
 * 清除当前行：ctrl + u

到行首：ctrl + a

到行尾：ctrl + e

前进后退：ctrl + f/b (相当于左右方向键)

上一条命令：ctrl + p

搜索命令历史：ctrl + r
 *
删除当前光标的字符：ctrl + d

删除光标之前的字符：ctrl + h

删除光标之前的单词：ctrl + w

删除到文本末尾：ctrl + k

交换光标处文本：ctrl + t

清屏1：command + r

清屏2：ctrl + l
 *
 * ------------------------------------------------------------------------------------------------------------------------
 *
 *
 * password_verify ( string $password , string $hash )
 *
 * password_hash
 * string password_hash ( string $password , int $algo [, array $options ] )
 * $algo         ||=    PASSWORD_DEFAULT
 *                      PASSWORD_BCRYPT  推荐吧
 *                      PASSWORD_ARGON2I
 *
 * ------------------------------------------------------------------------------------------------------------------------
 *
 * Redis
 *
 *
 * set($key);
 * get($key)
 * delete($key); 删除指定键
 * setnx($key);  当且仅当key不存在时才生效  如果存在 则不起作用
 * exists($key); 判断是否存在
 * incr($key);  自增
 * decr($key);  自减
 * getMultiple(array($key1,$key2)); 获取指定的一个或多个键的值
 * lpush($key);向列表头部添加字符串值，如果列表不存在则创建
 * rpush($key);向列表尾部添加字符串值，如果列表不存在则创建，如果不是列表则返回false;
 * lpop($key);返回并且移除列表的第一个元素;
 * rpop($key);返回并且移除类别的最后一个元素;右侧
 * lsize   llen  ($key); 返回列表的长度，如果列表为空或者列表不存在， 则返回0,如果不是列表， 则返回false;
 * lget($key,$index); 返回列表中的指定元素;
 * lset($key,$index,$value); 为列表特定索引的值赋予新的值;
 * lgetrange($key,$start,$end); 获取指定列表一部分的值;
 * sadd($key);为key增加一个值，若值存在则返回false;
 *
 *
 * ------------------------------------------------------------------------------------------------------------------------
        GIT
 *
 * * git commit --amend   修改提交信息
 * git reset HEAD  'filename' 取消文件暂存
 * git checkout -- 'filename'  撤销对某文件的修改
 * git reset --hard HEAD^  退回到上一个版本
 * git reset --hard 'commit id' 退回到指定的版本 需要提供对应的commit id 号的前几位
 * git reflog  可以查看最近每次修改的commit id 方便跳到指定版本
 * git diff HEAD -- 'filename'  命令可以查看工作区和版本库里面最新版本的区别
 * git rm 'filename' 确实要从版本库中删除该文件，那就用命令git rm删掉  需要再次git commit
 * git checkout -- 'filename'  从版本库把误删的文件恢复
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * 分支
 * git branch dev   创建dev分支
 * git checkout dev  切换到dev分支
 * git checkout -b dev   上面两个命令的共同实现
 * git branch  查看当前分支
 * git merge dev  将dev分支合并到当前分支
 * git branch -d dev  删除dev分支
 *
 *
 *
 *
 *
 *
 * 远程推送
 * git remote -v 查看远程库的信息
 * git push origin 'branch name'  推送到指定的分支  推送前 需要git pull 解决冲突
 * 如果git pull提示“no tracking information”，则说明本地分支和远程分支的链接关系没有创建，用命令git branch --set-upstream branch-name origin/branch-name。
 * git branch --set-upstream-to branch-name origin/branch-name
 *
 * 远程覆盖  当前分支版本低于远程分支版本
 * git push origin master --force
 *
 * ------------------------------------------------------------------------------------------------------------------------

 *
 * Vim
 *
 *  * 配置
 * 输入命令：vim   ~/.vimrc

打开后添加set  nu，保存退出，再次进入vim编辑器，就会自动显示行号了！
 *
 *
 *
 * Normal  模式
 * i    插入模式
 * x    删除当前光标所在的一个字符
 * :wq! 存盘加退出
 * dd   删除当前行，并把删除的行存在剪贴板中
 * 数字零   到本行行首
 * $       到本行行尾
 * /string 搜索字符串  按n键切换下一个
 * u       撤销上一次操作
 * control+r   取消上次撤销的那个操作
 * saveas 'filename' 另存为
 * .     重复上一次的命令
 * 次数+命令   重复一定次数的命令
 * :行号     移动到对应的行
 * gg        移动到第一个行
 * G         移动到最后一行
 * v     可视化的选择
 *
 *
 */