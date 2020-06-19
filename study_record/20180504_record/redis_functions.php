<?php
/**
 * Created by PhpStorm.
 * User: zihao
 * Date: 2018/5/4
 * Time: 下午2:49
 * set($key);
 * get($key)
 * delete($key); 删除指定键
 * setnx($key);  当且仅当key不存在时才生效  如果存在 则不起作用
 * exists($key); 判断是否存在
 * incr($key);  自增
 * decr($key);  自减
 * getMultiple(array($key1,$key2)); 获取指定的一个或多个键的值
 * lpush($key);向列表头部添加字符串值，如果列表不存在则创建
 * rpush($key);向列表尾部添加字符串值，如果列表不存在则创建，如果不是列表则返回false;
 * lpop($key);返回并且移除列表的第一个元素;
 * rpop($key);返回并且移除类别的最后一个元素;右侧
 * lsize   llen  ($key); 返回列表的长度，如果列表为空或者列表不存在， 则返回0,如果不是列表， 则返回false;
 * lget($key,$index); 返回列表中的指定元素;
 * lset($key,$index,$value); 为列表特定索引的值赋予新的值;
 * lgetrange($key,$start,$end); 获取指定列表一部分的值;
 * sadd($key);为key增加一个值，若值存在则返回false;
 */