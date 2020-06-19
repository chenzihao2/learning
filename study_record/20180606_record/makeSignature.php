 <?php
 
 
 function makeSignature() {
        $arr = ['appId' => 'YEa4VtjK0JvPnZRM4lpHdOWjBYJy9sik','appSecret'=> 'ldWGWOZbAN1PUM3XGbPNZLIp9wMvX7yB'];
        ksort($arr);
        $signStr = '';
        foreach ($arr as $k => $v) {
            if ($k != 'sign') {
                $signStr .= $v;
            }
        }
        return md5(trim($signStr));
    }




