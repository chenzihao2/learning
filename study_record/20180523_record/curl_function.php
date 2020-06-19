<?php
/**
 * User: zihao
 * Date: 2018/5/23
 * Time: 上午10:28
 */
function curl($url, $params = array(),
              $options = array('is_post' => 0, 'need_decode' => 1, 'header' => array())) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
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
    curl_close($ch);

    return $result;
}
$a = curl('www.baidu.com');
var_dump($a);