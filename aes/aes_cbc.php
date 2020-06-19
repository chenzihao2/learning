<?php
/*************************************************************************
    > File Name: aes_cbc.php
    > Author: chenzihao
    > Created Time: Thu 25 Apr 2019 04:31:27 PM CST
 ************************************************************************/

/**
 * AES/CBC/PKCS5Padding Encrypter
 *
 * @param $str
 * @param $key
 * @return string
 */
function encrypt($str, $key)
{
    $zeroPack = pack('i*', 0);
    $iv = str_repeat($zeroPack, 4);
    mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
    $encryptedStr = mcrypt_encrypt(
        MCRYPT_RIJNDAEL_128,
        hex2bin(md5($key)),
        pkcs5_pad($str, mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
        MCRYPT_MODE_CBC,
        $iv)
    ;
    return bin2hex($encryptedStr);
}

/**
 * AES/CBC/PKCS5Padding Decrypter
 *
 * @param $encryptedStr
 * @param $key
 * @return string
 */
function decrypt($encryptedStr, $key)
{
    $zeroPack = pack('i*', 0);
    $iv = str_repeat($zeroPack, 4);
    return pkcs5_unpad(mcrypt_decrypt(
        MCRYPT_RIJNDAEL_128,
        hex2bin(md5($key)),
        hex2bin($encryptedStr),
        MCRYPT_MODE_CBC,
        $iv
    ));
}

function pkcs5_pad ($text, $blocksize)
{
    $pad = $blocksize - (strlen($text) % $blocksize);
    return $text . str_repeat(chr($pad), $pad);
}

function pkcs5_unpad($text)
{
    $pad = ord($text{strlen($text)-1});
    if ($pad > strlen($text)) return false;
    if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
    return substr($text, 0, -1 * $pad);
}

$key = '1a3021887de9fe4f';

$str = '欢迎来到chacuo.net';

var_dump(encrypt($str, $key));
//var_dump(decrypt('1a3021887de9fe4fe3d59e992f740462', $key));
