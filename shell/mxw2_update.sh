#########################################################################
# File Name: mxw2_update.sh
# Author: chenzihao
# Created Time: 2019年07月19日 星期五 09时55分51秒
#########################################################################
#!/bin/bash
需要和运营确认以下事项：
1、更新范围
2、运维需要和运营确认关闭入口，确认后再操作
####################################################################################################################################

# 登录到ansible控制机上：123.59.15.149
1、查看/etc/ansible/hosts文件
####################################################################################################################################
### Add by Hooper Start ###
# 冒2
[game]
10.254.219.242     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game01'
10.136.51.203      ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game02'
10.254.169.213     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game03'
10.136.50.24       ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game04'
10.136.58.160      ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game05'
10.254.172.95      ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game06'
10.136.50.102      ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game07'
10.254.173.84      ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game08'
10.254.204.141     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game09'
10.254.206.74      ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game10'
10.254.218.122     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game11'
10.254.137.133     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game12'
10.254.162.167     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='game13'

# 冒2联运
[lianyungame]
10.136.39.150     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='lianyun01'
10.254.157.77     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='lianyun02'
#10.254.167.164    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa'

[agame:children]
game
lianyungame

# 冒2全局
[globalgame]
10.254.156.14    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='globalgame'

# 冒2审核
[iosgame]
10.254.141.59      ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='iosgame'

[sgame:children]
globalgame
iosgame

[games:children]
agame
sgame

# 监控服务器
[monitor]
10.254.216.152    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='monitor'

# SVN服务器
[svn]
10.254.245.150    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='svn'

# nginx负载(nginx-web)
[lb]
10.136.1.157      ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='nginxserver'

# 中心服务器(apache-web,02上有mysql)
[center]
10.254.215.143    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='center01'
10.136.51.103     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='center02'

# 日志服务器(redis)
[logredis]
10.254.214.144    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='log'

# 日志数据库合服后(mysql)
[logmysql]
10.254.217.165    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='LogMysql01'
#10.136.50.41      ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='LogMysql02'
#10.254.163.187    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='LogMysql03'
10.254.159.68     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='LogMysql04'
10.254.161.232    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='LogMysql05'

# 后台服务器（web&redis&mysql）
[gm]
10.254.216.150    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='GM'

# 数据库备份服务器（mysql从库）
[dbbackup]
10.254.216.151    ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='DBbackup01'
10.254.157.37     ansible_ssh_user=root ansible_ssh_pass='Sg!&B7K7k#Twi$qa' agent_name='DBbackup02'

### Add by Hooper End   ###
####################################################################################################################################

[root@vm10-254-216-152 ~]# ansible agame --list
  hosts (15):
    10.254.219.242
    10.136.51.203
    10.254.169.213
    10.136.50.24
    10.136.58.160
    10.254.172.95
    10.136.50.102
    10.254.173.84
    10.254.204.141
    10.254.206.74
    10.254.218.122
    10.254.137.133
    10.254.162.167
    10.136.39.150
    10.254.157.77
[root@vm10-254-216-152 ~]# ansible sgame --list
  hosts (2):
    10.254.156.14
    10.254.141.59


# 检查 agame是所有一机多服的游戏服，sgame是一机一服的游戏服，games是所有一机多服跟一机一服的游戏服
ansible agame -m ping
ansible sgame -m ping
ansible games -m ping
ansible games -a 'df -h'

2、关服、备份数据库、更新
# 关闭监控
ansible games -m cron -a 'name=check_game_status state=absent'
ansible games -a 'crontab -l'

# 多服版 --- 关服、备份数据库、更新
ansible agame -m script -a '/data/ansible/ansible_scripts/stop.sh'|tee -a /data/$(date +%F)_operation.log
grep "fail" /data/$(date +%F)_operation.log

ansible agame -m script -a '/data/ansible/ansible_scripts/db_backup.sh'|tee -a /data/$(date +%F)_operation.log
grep "fail" /data/$(date +%F)_operation.log

ansible agame -m script -a '/data/ansible/ansible_scripts/svn.sh'|tee -a /data/$(date +%F)_operation.log
grep "fail" /data/$(date +%F)_operation.log

# 单服版 --- 关服、备份数据库、更新
ansible sgame -m script -a '/data/ansible/ansible_scripts/stop_single.sh'|tee -a /data/$(date +%F)_operation.log
grep "fail" /data/$(date +%F)_operation.log

ansible sgame -m script -a '/data/ansible/ansible_scripts/db_backup_single.sh'|tee -a /data/$(date +%F)_operation.log
grep "fail" /data/$(date +%F)_operation.log

ansible sgame -m script -a '/data/ansible/ansible_scripts/svn_single.sh'|tee -a /data/$(date +%F)_operation.log
grep "fail" /data/$(date +%F)_operation.log

3、更新资源（北京6） 120.92.90.78
# 后续可以使用北京6的ansible更新
#cd /data/wwwroot/mxwcode2
cd /data/wwwroot/mxw2_res_ios_break
svn up
#cd /data/wwwroot/mxwcode2_android
cd /data/wwwroot/mxw2_res_android
svn up
#cd /data/wwwroot/mxwcode2_app
cd /data/wwwroot/mxw2_res_ios
svn up

4、CDN推送（网宿<https://portal.chinanetcenter.com/cas/login> --- 账号：7k7kqxz --- 内容管理 --- 目录刷新）
# CDN推送的网址：https://portal.chinanetcenter.com/cas/login
# 账号：7k7kqxz
# 服务 --- 内容管理 --- 内容刷新 --- 目录刷新 --- 常用目录
# 先推送
http://sf.android.mxw2.youxi567.com/Res/ 
http://sf1.mxw2.youxi567.com/Res/ 
http://sf2.mxw2.youxi567.com/Res/

# 再推送
http://sf.android.mxw2.youxi567.com/upgrade/ 
http://sf1.mxw2.youxi567.com/upgrade/ 
http://sf2.mxw2.youxi567.com/upgrade/ 
# 查看是否完成推送：任务查询 --- 选择当天的时间 --- 查询 --- 查看是否都是100%

5、开服并验证
# 多服版
ansible agame -m script -a '/data/ansible/ansible_scripts/restart.sh'|tee -a /data/$(date +%F)_operation.log
ansible agame -m script -a '/data/ansible/ansible_scripts/check_restart.sh'|tee -a /data/$(date +%F)_operation.log
ansible agame -m shell -a 'for SERVERNAME in `ls -d /data/wwwroot/mxw2code/server*`;do ls ${SERVERNAME}/gameserver/bin/startsuccess;done'

# 单服版
ansible sgame -m script -a '/data/ansible/ansible_scripts/restart_single.sh'|tee -a /data/$(date +%F)_operation.log
ansible sgame -m script -a '/data/ansible/ansible_scripts/check_restart_single.sh'|tee -a /data/$(date +%F)_operation.log

6、通知运营测试，如果不行尝试重新启动游戏服务（手动或按照第5步用ansible执行）

7、开启监控
ansible games -m cron -a 'name=check_game_status minute=0 hour=*/6 job="/bin/bash /data/sh/check_game_process.sh > /dev/null 2>&1"'
ansible games -a 'crontab -l'

# -------------------------------------------------------------------------------------------------------------------- #


# 7.更新活动测试服和活动测试全局服(没有这步)

# 8.以下查询可能会用到
for SERVERNAME in `ls -d /data/wwwroot/mxw2code/server*`;do svn up ${SERVERNAME};done
for SERVERNAME in `ls -d /data/wwwroot/mxw2code/server*`;do svn info ${SERVERNAME};done
for SERVERNAME in `ls -d /data/wwwroot/mxw2code/server*`;do cd ${SERVERNAME}/bin;sh stop.sh;done
for SERVERNAME in `ls -d /data/wwwroot/mxw2code/server*`;do cd ${SERVERNAME}/bin;sh restart.sh;done
for SERVERNAME in `ls -d /data/wwwroot/mxw2code/server*`;do [ -e ${SERVERNAME}/gameserver/bin/startsuccess ] && echo -e "${SERVERNAME} \e[32monline\e[0m" || echo -e "${SERVERNAME} \e[31mdown\e[0m";done
ansible games -m shell -a 'ls /data/WebGame*.sql'
ansible games -m shell -a 'ls /data/WebGame*.sql|xargs rm -f'
# 查看ansible执行日志
grep "check_restart fail\"" /data/$(date +%F)_operation.log
grep "| SUCCESS" /data/$(date +%F)_operation.log
grep -Ev "\| SUCCESS|^[[:space:]]|\}" /data/$(date +%F)_operation.log
grep -B 4 " restart fail\"" /data/$(date +%F)_operation.log

# -------------------------------------------------------------------------------------------------------------------- #
# 监控
# 复制脚本(注意全局服判断进程为8个哦)
<server id="全局服务器1" wordId="125" internetip="120.132.88.43" localip="10.254.156.14" server_path=""/>

# 复制脚本
ansible agame -a 'mkdir -p /data/sh'
ansible single -a 'mkdir -p /data/sh'
ansible agame -m copy -a 'src=/data/ansible/ansible_scripts/check_game_process.sh dest=/data/sh backup=yes'
ansible sgame -m copy -a 'src=/data/ansible/ansible_scripts/check_game_process.sh dest=/data/sh backup=yes'
ansible agame -m copy -a 'src=/data/ansible/ansible_scripts/check_game_process_single dest=/data/sh backup=yes'
ansible sgame -m copy -a 'src=/data/ansible/ansible_scripts/check_game_process_single dest=/data/sh backup=yes'

# 开启
ansible agame -m cron -a 'name=check_game_status minute=*/6 job="/bin/bash /data/sh/check_game_process.sh > /dev/null 2>&1"'
ansible sgame -m cron -a 'name=check_game_status minute=*/6 job="/bin/bash /data/sh/check_game_process.sh > /dev/null 2>&1"'
ansible agame -m cron -a 'name=check_game_status minute=*/6 job="/bin/bash /data/sh/check_game_process_single.sh > /dev/null 2>&1"'
ansible sgame -m cron -a 'name=check_game_status minute=*/6 job="/bin/bash /data/sh/check_game_process_single.sh > /dev/null 2>&1"'

# 关闭
ansible agame -m cron -a 'name=check_game_status state=absent'
ansible sgame -m cron -a 'name=check_game_status state=absent'

