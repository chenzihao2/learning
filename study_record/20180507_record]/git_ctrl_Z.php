<?php
/**
 * Created by PhpStorm.
 * User: zihaogit
 * Date: 2018/5/7
 * Time: 下午7:53
 *
 * git commit --amend   修改提交信息
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
 */