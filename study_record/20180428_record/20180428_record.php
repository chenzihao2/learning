<?php
/**
 * Created by PhpStorm.
 * User: zihao
 * Date: 2018/4/28
 * Time: 上午10:23
 * 软连接   ln -s 正常路径  软连接
 * pwd -P 可以查看真实路径
 *
 *
 *
 *
 *
 * CURL
 *
 * # GET
curl -u username https://api.github.com/user?access_token=XXXXXXXXXX

# POST
curl -u username --data "param1=value1&param2=value" https://api.github.com

# 也可以指定一个文件，将该文件中的内容当作数据传递给服务器端
curl --data @filename https://github.api.com/authorizations
 *
 *
 *
 * 注：默认情况下，通过POST方式传递过去的数据中若有特殊字符，首先需要将特殊字符转义在传递给服务器端，如value值中包含有空格，则需要先将空格转换成%20，如：

1 curl -d "value%201" http://hostname.com
在新版本的CURL中，提供了新的选项 --data-urlencode，通过该选项提供的参数会自动转义特殊字符。

1 curl --data-urlencode "value 1" http://hostname.com
除了使用GET和POST协议外，还可以通过 -X 选项指定其它协议，如：

1 curl -I -X DELETE https://api.github.cim
上传文件

1 curl --form "fileupload=@filename.txt" http://hostname/resource
 *
 *
 *
 *
 *
 *
 *
 * 查看端口号占用情况
 *
 *
 * sudo lsof -i tcp:8080
 *  然后根据展示出来的PID  杀死进程
 * sudo kill -9 对应的PID
 *
 *
 *
 *
 *
 *
 *
 *
 */
var_dump(phpinfo());
