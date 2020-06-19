<?php
/**
 * User: zihao
 * Date: 2018/6/26
 * Time: 下午5:14
 */
class RedisXc extends \Phplib\Redis\Redis {

    const EXPIRE_TIME = 3600; // 60 minutes
    const XC_key = 'xc_token';
    const PL = 'phonelimit';

    public static function setToken($token) {
        self::set(self::XC_key, $token);
        self::expire(self::XC_key, self::EXPIRE_TIME);
        return true;
    }

    public static function getToken() {
        return self::get(self::XC_key);
    }

    public static function setPhoneLimit() {
        self::set(self::PL, 1);
        self::expire(self::PL, self::EXPIRE_TIME);
        return true;
    }

    public static function checkPhoneLimit() {
        if (!empty(self::get(self::PL))) {
            return false;//发了
        }
        return true;//没发
    }
}
$r = new RedisXc();
$r::setToken('12312312331242314214');
echo $r::getToken();