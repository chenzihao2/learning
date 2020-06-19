<?php
/*************************************************************************
    > File Name: fun_http_build_query.php
    > Author: chenzihao
    > Created Time: 二  6/12 14:07:21 2018
 ************************************************************************/
//http_build_query();
/**
 *
 * 将数组转换为url参数形式的json
 *
 *
 *
 */
//parse_str();
/*
 * 上面函数的相反函数
 */
$arr = array("Hello" => "Hi", "world" => "earth");
echo strtr("Hello world",$arr);
