<?php
/**
 * Created by PhpStorm.
 * User: zihao
 * Date: 2018/4/19
 * Time: 上午10:24
 *
// 写入数据库之前
$staff_serialize = serialize($staff);            // 序列化成字符串
$staff_json = json_encode($staff);               // JSON编码数组成字符串

// 读取数据库后
$staff_restore = unserialize($staff_serialize);  // 反序列化成数组
$staff_dejson = json_decode($staff_json, true);  // JSON解码成数组
之后从数据库里面读出来的数据还是字符串格式的，用unserialize()和json_decode()函数转换成数组就可以了。
 */

$xml = file_get_contents('DENIS_ZLATA_20180410_121652_WA_01.xml');
function xmlToArray($xml)
{
    libxml_disable_entity_loader(true);
    $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    return $values;
}
$xml_arr = xmlToArray($xml);
date_default_timezone_set("Asia/Shanghai");
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = 'local_test';
$table_name = 'mesure';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
    echo "<mark>".$sql . "<br>" . $e->getMessage()."</mark>";
    echo "<br/>";
}
$sql = "create table if not exists `".$table_name."` (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY
)";
$conn->exec($sql);
$sql = "show fields from ".$table_name;
$res = $conn ->query($sql)->fetchAll();
foreach ($res as $k=>$v){
    $fields[$k] = $v[0];
}
//var_dump($fields);
//die;
foreach ($xml_arr['optometry'] as $k=>$v){
    if(is_array($v)){
        foreach ($v as $k_=>$v_){
            if(is_array($v_)){
              $v_ = addslashes(json_encode($v));
            }
            if($k_ == 'ID'){
                $k_ = $k.'_ID';
            }
            if(!in_array($k_,$fields)){
                if(strlen($v_)<=100){
                    $sql_alt = "alter table ".$table_name." add ".$k_." varchar(100)";
                }else{
                    if(strlen($v_)<=255){
                        $sql_alt = "alter table ".$table_name." add ".$k_." varchar(255)";
                    }else{
                        $sql_alt = "alter table ".$table_name." add ".$k_." text";
                    }
                }
                $conn->exec($sql_alt);
            }
        }
    }else {
        if (!in_array($k, $fields)) {
            if (strlen($v) <= 100) {
                $sql_alt = "alter table " . $table_name . " add " . $k . " varchar(100)";
            } else {
                if (strlen($v) <= 255) {
                    $sql_alt = "alter table " . $table_name . " add " . $k . " varchar(255)";
                } else {
                    $sql_alt = "alter table " . $table_name . " add " . $k . " text";
                }
            }
            $conn->exec($sql_alt);
        }
    }
}
foreach ($xml_arr['optometry'] as $k=>$v){
    if(is_array($v)){
        foreach ($v as $k_=>$v_){
            if(is_array($v_)){
                $v_ = addslashes(json_encode($v_));
            }
            if($k_ == 'ID'){
                $k_ = $k.'_ID';
            }
            $fi .= '`'.$k_.'`,';$va .= '\''.$v_.'\',';
        }
    }else{
        $fi .= '`'.$k.'`,';$va .= '\''.$v.'\',';
    }
}
//var_dump($fi);var_dump($va);
$fi = substr($fi,0,-1);$va = substr($va,0,-1);
$sql_insert = "insert into ".$table_name."(".$fi.") values(".$va.")";
$res = $conn->exec($sql_insert);
var_dump($res);
