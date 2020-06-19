<?php
/*************************************************************************
    > File Name: linux_find_order.php
    > Author: chenzihao
    > Created Time: 五  8/ 3 10:51:27 2018
 ************************************************************************/
du -sh 查看当前文件夹的大小
df -h  查看系统的存储使用情况
查找文件
find ./ -type f

查找目录
find ./ -type d

查找名字为test的文件或目录
find ./ -name test


查找目录并列出目录下的文件(为找到的每一个目录单独执行ls命令，没有选项-print时文件列表前一行不会显示目录名称)
find ./ -type d -print -exec ls {} \;

-exec:　　find 命令对匹配的文件执行该参数所给出的 shell 命令，相应命令的形式为   ’command‘ {}  \；   ，注意 {}  和 “  \；” 之间的空格


find ./ -name 'filename' -print -exec cat {} \;


查找文件更新日时在距现在时刻二天以内的文件
find ./ -mtime -2

查找文件更新日时在距现在时刻二天以上的文件
find ./ -mtime +2

查找文件更新日时在距现在时刻一天以上二天以内的文件
find ./ -mtime 2

查找文件size小于1G的文件或目录
find ./ -size -1G
