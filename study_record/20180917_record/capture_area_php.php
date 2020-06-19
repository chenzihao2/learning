<?php
/*************************************************************************
    > File Name: capture_area_php.php
    > Author: chenzihao
    > Created Time: 一  9/17 11:51:11 2018
 ************************************************************************/
?>
一级行政区: 省份
<?php
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2017/index.html');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        curl_close($curl);
        $data = mb_convert_encoding($data, 'UTF-8', 'GBK');

        // 裁头
        $offset = mb_strpos($data, 'provincetr',2000,'GBK');
        $data = mb_substr($data, $offset,NULL,'GBK');

        // 裁尾
        $offset = mb_strpos($data, '</TABLE>', 200,'GBK');
        $data = mb_substr($data, 0, $offset,'GBK');
        preg_match_all('/\d{2}|[\x7f-\xff]+/', $data, $out);
        $out = $out[0]; 
        var_dump($out);

二级行政区 城市
<?php
    public function add()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2017/index.html');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        curl_close($curl);
        $data = mb_convert_encoding($data, 'UTF-8', 'GBK');

        // 裁头
        $offset = mb_strpos($data, 'provincetr',2000,'GBK');
        $data = mb_substr($data, $offset,NULL,'GBK');

        // 裁尾
        $offset = mb_strpos($data, '</TABLE>', 200,'GBK');
        $data = mb_substr($data, 0, $offset,'GBK');
        preg_match_all('/\d{2}|[\x7f-\xff]+/', $data, $out);
        $out = $out[0];  // 省份


        $b = 0;
        $time = time();
        for ($i = 0; $i < count($out); $i++) {

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2017/' . $out[$i++] . '.html');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);
            curl_close($curl);
            $data = mb_convert_encoding($data, 'UTF-8', 'GBK');

            // 裁头
            $offset = mb_strpos($data, 'citytr',2000,'GBK');
            $data = mb_substr($data, $offset,NULL,'GBK');

            // 裁尾
            $offset = mb_strpos($data, '</TABLE>', 200,'GBK');
            $data = mb_substr($data, 0, $offset,'GBK');

            preg_match_all('/\d{12}|[\x7f-\xff]+/', $data, $city);
            $city = $city[0];
            // 某个省份的城市

            var_dump($city);
            echo ++$b;

            $list = [];
            for ($j=0; $j < count($city) ; $j++) {
                $list[] = [
                    'code'  => $city[$j],
                    'name'  => $city[++$j],
                    'create_time' => $time,
                    'update_time' => $time,
                ];
            }
            Db::table('city')->insertAll($list);  // 城市
            /*
            $data = [
                'code' => '1sfds',
                'name' => 'test',
                'create_time' => time(),
                'update_time' => time(),
            ];
            $list = [
                $data, $data, $data
            ];
            */
            // return Db::table('province')->insertAll($list);
        }

        // return Db::table('province')->insertAll($list);
    } 
三级行政区

<?php  
        $code_list = Db::table('city')->column('code');
        $time = time();
        foreach ($code_list as $key => $code) {
            $code = substr($code, 0,4);
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2017/'. substr($code, 0,2) . '/' . $code . '.html');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);
            curl_close($curl);
            $data = mb_convert_encoding($data, 'UTF-8', 'GBK');
            // 裁头
            $offset = @mb_strpos($data, 'countytr',2000,'GBK');
            if (!$offset) {
                continue;
            }
            $data = mb_substr($data, $offset,NULL,'GBK');

            // 裁尾
            $offset = mb_strpos($data, '</TABLE>', 200,'GBK');
            $data = mb_substr($data, 0, $offset,'GBK');
            preg_match_all('/\d{12}|[\x7f-\xff]+/', $data, $out);
            $out = $out[0]; // 某个城市
            $list = [];
            for ($j=0; $j < count($out) ; $j++) {
                $list[] = [
                    'code'  => $out[$j],
                    'name'  => $out[++$j],
                    'create_time' => $time,
                    'update_time' => $time,
                ];
            }
            Db::table('county')->insertAll($list);
        } 


四级行政区：乡村或街道

<?php

 $code_list = Db::table('county')->column('code');


        $time = time();
        foreach ($code_list as $key => $code) {
            $code = substr($code, 0,6);
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2017/'. substr($code, 0,2) . '/' . substr($code,2, 2) . '/' . $code . '.html');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);
            curl_close($curl);
            $data = mb_convert_encoding($data, 'UTF-8', 'GBK');
            // 裁头
            $offset = @mb_strpos($data, 'towntr',2000,'GBK');
            if (!$offset) {
                continue;
            }
            $data = mb_substr($data, $offset,NULL,'GBK');

            // 裁尾
            $offset = mb_strpos($data, '</TABLE>', 200,'GBK');
            $data = mb_substr($data, 0, $offset,'GBK');
            preg_match_all('/\d{12}|[\x7f-\xff]+/', $data, $out);
            $out = $out[0];
            $list = [];
            for ($j=0; $j < count($out) ; $j++) {
                $list[] = [
                    'code'  => $out[$j],
                    'name'  => $out[++$j],
                    'create_time' => $time,
                    'update_time' => $time,
                ];
            }
            Db::table('town')->insertAll($list);
        }

