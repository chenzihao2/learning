<?php
/*************************************************************************
    > File Name: aes_cbc.php
    > Author: chenzihao
    > Created Time: Thu 25 Apr 2019 04:23:25 PM CST
 ************************************************************************/
/**
 * AES/CBC/PKCS5Padding Encrypter
 *
 * @param $str
 * @param $key
 * @return string
 */
function encryptNew($str, $key)
{
    $zeroPack = pack('i*', 0);
    $iv = str_repeat($zeroPack, 4);
    return bin2hex(openssl_encrypt($str, 'AES-256-CBC', hex2bin(md5($key)), OPENSSL_RAW_DATA, $iv));
}

/**
 * AES/CBC/PKCS5Padding Decrypter
 *
 * @param $encryptedStr
 * @param $key
 * @return string
 */
function decryptNew($encryptedStr, $key)
{
    $zeroPack = pack('i*', 0);
    $iv = str_repeat($zeroPack, 4);
    return openssl_decrypt(hex2bin($encryptedStr), 'AES-256-CBC', hex2bin(md5($key)), OPENSSL_RAW_DATA, $iv);
}
$str = 'czh'; $key = 'test';
var_dump(encryptNew($str,$key));

var_dump(decryptNew('190881f2578f36fd7e7faa0262930a01', $key));

