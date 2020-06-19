<?php
/*************************************************************************
    > File Name: redis_connect.php
    > Author: chenzihao
    > Created Time: 五 10/26 14:44:43 2018
 ************************************************************************/
class redis_connect extends Redis{
    private $host = '127.0.0.1';
    
    public function __construct() {
        $result = self::connect($this->host);
        return $result;
    }
}
define('A','key_redistest');
$redis = new redis_connect();
$redis->set(A, 'chenzihao'); //设置字符串 会覆盖
$redis->exists(A); //检查是否存在
$data = $redis->get(A);//获取
$data = $redis->del(A);//删除
$redis->set(A, 'chenzihao');
$data = $redis->expire(A, 100);//设置过期时间 秒数
$data = $redis->pexpire(A, 100000);//设置过期时间 毫秒数
//$data = $redis->expireat(A, 1540539168);//设置过期时间 时间戳
//$data = $redis->persist(A); //设置为永久不过期  ttl时返回 -1
//$data = $redis->ttl(A); //返回剩余过期时间  秒级 不存在是返回-2  存在但是不过期时返回-1
//$data = $redis->pttl(A); //返回剩余过期时间  毫秒级
//$data = $redis->flushdb();//清空当前库 flushall 清空所有库
$data = $redis->getrange(A, 0, 5); //获取截取内容
$data = $redis->getset(A, 000100000); //将旧的key赋予新值并返回旧值;
$redis->setbit(A, 20, 0);
$data = $redis->getbit(A, 20);

var_dump($data);

