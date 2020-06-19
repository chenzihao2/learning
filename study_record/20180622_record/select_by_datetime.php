<?php
/*************************************************************************
    > File Name: select_by_datetime.php
    > Author: chenzihao
    > Created Time: 五  6/22 15:58:37 2018
 ************************************************************************/
查询当天的所有数据
select * from table where to_days(time_cloumn) = to_days(now());     
select * from table where date(time_cloumn) = curdate();
查询一周的所有数据
	select * from table where date_sub(curdate(), interval 7 day ) = date(time_cloumn);
查询一个月的所有数据
	select * from table where date_sub(curdate(), interval 1 month) = date(time_cloumn);
特定查询
	select * from table where time_cloumn between timeA and timeB;




date(time);  只有日期
	curdate();   当前日期
	curtime();   当前时间
	now();    当前日期加时间























