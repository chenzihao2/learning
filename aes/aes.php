<?php
/*************************************************************************
    > File Name: aes.php
    > Author: chenzihao
    > Created Time: Thu 25 Apr 2019 05:00:29 PM CST
 ************************************************************************/
$data = 'czh';
$key = '1a3021887de9fe4f';

$encrypted = openssl_encrypt($data, 'AES-128-CBC', $key, 1, $key);
$encrypt_msg = base64_encode($encrypted);

echo $encrypt_msg;
