<?php
/*************************************************************************
    > File Name: aes_pkcs7.php
    > Author: chenzihao
    > Created Time: Thu 25 Apr 2019 03:58:31 PM CST
 ************************************************************************/
 
class AES
{
    protected $cipher;
    protected $mode;
    protected $pad_method;
    protected $secret_key;
    protected $iv;
 
    public function __construct($key, $method = 'pkcs7', $iv = '', $mode = MCRYPT_MODE_CBC, $cipher = MCRYPT_RIJNDAEL_128)
    {
        $this->secret_key = $key;
 
        $this->pad_method =$method;
 
        $this->iv = $iv;
 
        $this->mode = $mode;
 
        $this->cipher = $cipher;
    }
 
    protected function pad_or_unpad($str, $ext)
    {
        if (!is_null($this->pad_method)) {
            
            $func_name = __CLASS__ . '::' . $this->pad_method . '_' . $ext . 'pad';
            
            if (is_callable($func_name)) {
                
                $size = mcrypt_get_block_size($this->cipher, $this->mode);
                
                return call_user_func($func_name, $str, $size);
            }
        }
        
        return $str;
    }
 
    protected function pad($str)
    {
        return $this->pad_or_unpad($str, '');
    }
 
    protected function unpad($str)
    {
        return $this->pad_or_unpad($str, 'un');
    }
 
    public function encrypt($str)
    {
        $str = $this->pad($str);
        
        $td = mcrypt_module_open($this->cipher, '', $this->mode, '');
        
        if (empty($this->iv)) {
 
            $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
 
        } else {
 
            $iv = $this->iv;
 
        }
        
        mcrypt_generic_init($td, $this->secret_key, $iv);
 
        $cyper_text = mcrypt_generic($td, $str);
 
        $rt = base64_encode($cyper_text);
 
        mcrypt_generic_deinit($td);
 
        mcrypt_module_close($td);
 
        return $rt;
    }
 
    public function decrypt($str)
    {
        $td = mcrypt_module_open($this->cipher, '', $this->mode, '');
        
        if (empty($this->iv)) {
        
            $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
            
        } else {
        
            $iv = $this->iv;
            
        }
        
        mcrypt_generic_init($td, $this->secret_key, $iv);
        
        $decrypted_text = mdecrypt_generic($td, base64_decode($str));
        
        $rt = $decrypted_text;
        
        mcrypt_generic_deinit($td);
        
        mcrypt_module_close($td);
        
        return $this->unpad($rt);
    }
 
    public static function pkcs7_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        
        return $text . str_repeat(chr($pad), $pad);
    }
 
    public static function pkcs7_unpad($text)
    {
        $pad = ord($text[strlen($text) - 1]);
        
        if ($pad > strlen($text)) return false;
        
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
        
        return substr($text, 0, -1 * $pad);
    }
}
 
$aes = new AES('123456');  //密钥
echo $aes->encrypt('exchen.net');   //加密
echo "\r\n";
var_dump($aes->decrypt('Cm/V6QncuZoW1bGFlQrpaQ=='));  //解密
