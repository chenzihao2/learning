<?php
/**
 * User: zihao
 * Date: 2018/5/9
 * Time: 下午8:14
 *
 *
 *
 *  instanceof 用于确定一个 PHP 变量是否属于某一类 class 的实例
 *  strtr($string , $array()) 替换字符串中对应的字符
 *  ip2long(ipv4) 把ip转换为整型
 *  stripslashes() 函数删除由 addslashes() 函数添加的反斜杠
 *  get_object_var($object)，返回一个数组。获取$object对象中的属性，组成一个数组
 *  array_map(myfunction,array1） 用自定义的方法处理数组的每个值并返回新的数组
 *  array_map(array('self', __FUNCTION__), $obj)
 *  __FUNCTION__  从当前运行的函数中得到函数名
 *  array_flip($array) 翻转数组中的键值对
 *  intval -- 获取变量的整数值

    floatval -- 获取变量的浮点值
 *
 *
 *
 *
 * string iconv ( string $in_charset , string $out_charset , string $str )
 * 将字符串 str 从 in_charset 转换编码到 out_charset。
 * dechex() 十进制转换为十六进制
 */
function getBrowerAgent()
{
    $trans = array(
        "[" => "{",
        "]" => "}"
    );
    $agentStr = empty($_SERVER['HTTP_USER_AGENT']) ? "" : $_SERVER['HTTP_USER_AGENT'];
    return strtr($agentStr, $trans);
}
function getBrowerAgentType($agentStr)
{
    //$agentStr = empty($_SERVER['HTTP_USER_AGENT']) ? "" : $_SERVER['HTTP_USER_AGENT'];
    $agentType = "";
    if (stripos($agentStr, "MSIE") !== FALSE) {
        $agentType = "IE";
    } else if (stripos($agentStr, "Chrome") !== FALSE) {
        $agentType = "Chrome";
    } else if (stripos($agentStr, "Firefox") !== FALSE) {
        $agentType = "Firefox";
    } else if (stripos($agentStr, "iPad") !== FALSE) {
        $agentType = "iPad";
    } else {
        $agentType = "others";
    }
    return $agentType;
}
var_dump(getBrowerAgentType(getBrowerAgent()));