<?php
/**
 * User: zihao
 * Date: 2018/5/18
 * Time: 上午10:57
 */
echo '例子：';
fastcgi_finish_request();
echo 'To be, or not to be, that is the question.';
file_put_contents('log.txt', '生存还是毁灭，这是个问题。');
/**
 * 在调用fastcgi_finish_request后，客户端响应就已经结束，但与此同时服务端脚本却继续运行！
 *
*/