<?php
/**
 * Created by PhpStorm.
 * User: zihao
 * Date: 2018/4/24
 * Time: 下午6:58
 */

//define('DOC_DIR', "C:/xml/xmlexport");
define('DOC_DIR', "../71");
define('APP_ID', 820011);
define('APP_KEY', '47c45aa6353998fc0b7df9efbd41baa4');
define('USER_ID', 1);
define('LOG_DIR', '../log/');
define('MARK_DIR', '../log');
define('MARK_FILE', '../log/last_timestmap');
define('ERROR_FILE', '../log/walk_log');
define('API_URL', API_DOMAIN.'api/openapi/import_xml_auto');
date_default_timezone_set('Asia/Shanghai');

function main(){
    $starttime = time();
    $keytime = initialize();
    do {
        $late_time = 0;
        $xml_arr = xml_dir($keytime);
        //var_dump($xml_arr);die;
        $res = array();
        $tem_error = file_get_contents(ERROR_FILE);
        if(!empty($xml_arr) && is_array($xml_arr)){
            foreach ($xml_arr as $k=>$v){
                $tmp_time = filemtime($v);
                if($tmp_time > $keytime){
                    $keytime = $tmp_time;
                }
                $xml = base64_encode(file_get_contents($v));
                $salt = substr(md5(APP_ID), 2, 5);
                $sign = md5(APP_ID . $salt . APP_KEY . date('Y-m-d', $_SERVER['REQUEST_TIME']));
                $data = array('appid'=>APP_ID,'user_id'=>USER_ID,'xml'=>$xml,'sign'=>$sign,'salt'=>$salt);
                $res = curl(API_URL, $data, array('is_post' => 1, 'need_decode' => 1));
                $tem_error .= 'file:'.$v.'***********result:'.$res['message'].'***************time:'.date('Y-m-d H:i:s',time()).'********'.$res."\r\n";
                //var_dump($res);
                //var_dump($tem_error);
            }
            file_put_contents(ERROR_FILE,$tem_error);
        }
        else{
            file_put_contents(MARK_FILE, $keytime);
        }
        $late_time = time()-$starttime;
    }while ($late_time <= 5);
    echo $starttime.'over'.time();
}
//_WA_01.XML

function xml_dir($keytime = 0) {
    $files = array();
    if(is_dir(DOC_DIR)){
        if(@$handle = opendir(DOC_DIR)) {
            while(($file = readdir($handle)) !== false) {
                if($file != ".." && $file != ".") {
                    if(substr(DOC_DIR.'/'.$file,-10) == '_WA_01.xml'){
                        if(filemtime(DOC_DIR.'/'.$file)>$keytime && filemtime(DOC_DIR.'/'.$file)<time()-2)
                            $files[] = DOC_DIR.'/'.$file;
                    }
                }
            }
            closedir($handle);
            return $files;
        }else{
            return 'open dir error';
        }
    }else{
        return 'not dir';
    }
}
//var_dump(xml_dir());


function initialize() {
    if (!is_dir(MARK_DIR)) {
        mkdir(MARK_DIR, 0755);
    }
    if(!file_exists(ERROR_FILE)){
        file_put_contents(ERROR_FILE,'');
    }
    if (file_exists(MARK_FILE)) {
        return  file_get_contents(MARK_FILE);
    } else {
        return 0;
    }
}

/*
function xmltoarr($xml){
    libxml_disable_entity_loader(true);
    $values = json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA));
    return $values;
}
*/


function curl($url, $params = array(),
              $options = array('is_post' => 0, 'need_decode' => 1, 'header' => array())) {
    //save_log(http_build_query($params));
    echo $url;
    $start = microtime(1);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    if (!empty($options['is_post'])) {
        curl_setopt($ch, CURLOPT_POST, TRUE);
        if (empty($options['is_json'])) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        } else {
            $options['header'][] = "Content-Type: application/json";
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        }
    }
    if (!empty($options['header']['Cookie'])) {
        curl_setopt($ch, CURLOPT_COOKIE, $options['header']['Cookie']);
        unset($options['header']['Cookie']);
    }
    if (!empty($options['header'])) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $options['header']);
    }
    $SSL = substr($url, 0, 8) == "https://" ? true : false;
    if ($SSL) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    }
    $result = curl_exec($ch);
    !empty($options['need_decode']) && $result = json_decode($result, 1);
    $info = array();
    if (empty($result)) {
        $info = curl_getinfo($ch);
    }
    $end = microtime(1);
    $spend = $end - $start;
    curl_close($ch);
    return $result;
}

main();
//function xml_dir_($keytime = 0) {
//    $files = array();
//    if(@$handle = opendir(DOC_DIR)) {
//        while(($file = readdir($handle)) !== false) {
//            if($file != ".." && $file != ".") {
//                if(substr(DOC_DIR.'/'.$file,-10) == '_WA_01.xml'){
//                    if(filemtime(DOC_DIR.'/'.$file)>=$keytime)
//                        $files[] = DOC_DIR.'/'.$file.'----'.filemtime(DOC_DIR.'/'.$file);
//                }
//            }
//        }
//        closedir($handle);
//        return $files;
//    }
//}
//echo '*************************';
//var_dump(xml_dir_());
