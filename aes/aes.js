const CryptoJS = require('crypto-js');  //引用AES源码js
function esEncrypt(data, keyStr, ivStr)
{
var sendData = CryptoJS.enc.Utf8.parse(data);
var key = CryptoJS.enc.Utf8.parse(keyStr);
var iv = CryptoJS.enc.Utf8.parse(ivStr);
var encrypted = CryptoJS.AES.encrypt(sendData, key, {
iv: iv,
mode: CryptoJS.mode.CBC,
 padding: CryptoJS.pad.Pkcs7
 });
 return CryptoJS.enc.Base64.stringify(encrypted.ciphertext);//加密后输出
 }
var res = esEncrypt('czh','1a3021887de9fe4f','1a3021887de9fe4f');
console.log(res);
