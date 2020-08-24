####in php
$curl = curl_init($url);//初始化
curl_setopt($curl, CURLOPT_URL, $URL);//设置参数 url
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//设置参数 请求结果不直接输出
curl_setopt($curl, CURLOPT_HEADER, 0);//设置参数 不设置header头
curl_setopt($curl, CURLOPT_POST, 1);//设置参数 post请求
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);//设置参数 post请求的参数
curl_setopt($curl, CURLOPT_HTTPHEADER, $data);//设置参数 设置http头

$output = curl_exec($curl); //执行
culr_close($curl);//关闭



####in linux
curl -o filename url    将内容保存为文件
curl -O url/filename    保存网页中的文件
curl -o /dev/null -s -w %{http_code} www.linux.com  测试网站访问状态，返回状态码
