<?php
/**
 * User: zihao
 * Date: 2018/6/6
 * Time: 上午10:15
 */
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');