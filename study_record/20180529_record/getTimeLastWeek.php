<?php
/**
 * User: zihao
 * Date: 2018/5/29
 * Time: 上午10:50
 */
function getTimeLastWeek(){
date_default_timezone_set("Asia/Shanghai");
$now_w = date('w', time());
$now_data = date('Y-m-d', time());
if ($now_w !== 0) {
    $start_date = date('Y-m-d H:i:s', strtotime($now_data) - ($now_w - 1) * 24 * 60 * 60 - 7 * 24 * 60 * 60);
    $end_date = date('Y-m-d H:i:s', strtotime($now_data) - ($now_w - 1) * 24 * 60 * 60);
} else {
    $start_date = date('Y-m-d H:i:s', strtotime($now_data) - 6 * 24 * 60 * 60 - 7 * 24 * 60 * 60);
    $end_date = date('Y-m-d H:i:s', strtotime($now_data) - 6 * 24 * 60 * 60);
}
return ['start_date' => $start_date, 'end_start' => $end_date];
}











/***
 * 修改密码接口  不需要原密码
 * get请求接口



php  public/script.php   类名

cat 文件名 | pbcopy   复制整个文件里的内容
:set paste  粘贴
 *


  方案    1  2   3  4 5 6 7 8
 * */