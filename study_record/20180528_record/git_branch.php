<?php
/**
 * User: zihao
 * Date: 2018/5/28
 * Time: 上午10:37
 * 查看本地分支 git branch
 * 查看远程分支 git branch -r
 * 创建分支  git branch 分支名   仅创建 不跳转
 * 切换分支  git checkout 分支名    
 * 创建分支并跳转  git checkout -b 分支名
 * 当你切换分支的时候，Git 会重置你的工作目录，使其看起来像回到了你在那个分支上最后一次提交的样子。 Git 会自动添加、删除、修改文件以确保此时你的工作目录和这个分支最后一次提交时的样子一模一样
 *
 *
 * 合并分支
 * 先切换到主分支   git checkout master
 * 再merge需要合并过来的分支名   git merge 'tmp_branch'
 ***** 如果需要远程提交则需要git push
 *
 * git branch -d '分支名'  删除分支
 * git branch -D '分支名'  强制删除
 *
 * 分支合并时出现文件修改冲突
 * git status 查看有冲突的文件
 *
 *
 * 冲突的文件内容大致是如下
 *    <<<<<<< HEAD:index.html
      <div id="footer">contact : email.support@github.com</div>
      =======
      <div id="footer">
      please contact us at support@github.com
      </div>
      >>>>>>> iss53:index.html
 *
 *
 *
 *
 *   --force  强制
 *
 *
 * git branch 查看所有分支
 * git branch -v 查看所有分支的最后一次提交
 * git branch --merged  查看有哪些分支合并到当前分支
 * git branch --no-merged 查看所有包含未合并工作的分支
 *
 * git fetch （remote）抓取远程本地没有的数据
 * git pull <远程主机名> <远程分支名>:<本地分支名>  如果是和当前分支合并 则可以省略本地分支名
 *
 * fetch  pull
 * git fetch是将远程主机的最新内容拉到本地，用户在检查了以后决定是否合并到工作本机分支中。而git pull 则是将远程主机的最新内容拉下来后直接合并，即：git pull = git fetch + git merge，这样可能会产生冲突，需要手动解决。
 *
 *
 *
 * git remote add  添加一个新的远程仓库到当前的项目
 *
 *
 *
 *
 * git checkout -b dev origin/dev   拉取远程分支并创建本地分支
 * git push origin dev:dev  推送本地分支到远程   本地：远程
 * git branch --set-upstream-to=origin/dev dev 本地分支和远程分支关联
 */
