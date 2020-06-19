/*************************************************************************
    > File Name: mysql_select_log.php
    > Author: chenzihao
    > Created Time: 一  6/11 15:36:05 2018
 ************************************************************************/
<?php
mysql connect   -h host -u username -p password



查看是否开启慢查询日志
show variables like '%general_log%';


开启MySQL查询日志
	set global general_log = on;
关闭为 off

MySQL的查询日志支持写入文件或写入数据表两种形式   show variables like 'log_output'; 
如果设置log_output=table的话，则日志结果会记录到名为gengera_log的表中
