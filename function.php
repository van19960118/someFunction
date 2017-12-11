<?php 

	/**
 *  GET请求
 * @param  [type] $url   接口地址
 */
    function http_get($url){
            $oCurl = curl_init();
            if(stripos($url,"https://")!==FALSE){
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
            }
            curl_setopt($oCurl, CURLOPT_URL, $url);
            curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
            $sContent = curl_exec($oCurl);
            $aStatus = curl_getinfo($oCurl);
            curl_close($oCurl);
            if(intval($aStatus["http_code"])==200){
                return $sContent;
            }else{
                return false;
            }
        }

    /**
 * [HttpPost Post 请求]
 * @param  [type] $url   [接口地址]
 * @param  [type] $param [字符串/数组]
 * @return [type]        [description]
 */
     function HttpPost($url,$param){
            $oCurl = curl_init(); //    初始化一个cURL会话。
            $url = str_replace(' ','+',$url);
            if(stripos($url,"http://")!==FALSE){//curl_setopt() 设置一个cURL传输选项。
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE); //禁用后cURL将终止从服务端进行验证。
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false); //检查服务器SSL证书中是否存在一个公用名(common name)。
            }
            if (is_string($param)) {
                $strPOST = $param;
            } else {
                $aPOST = array();
                foreach($param as $key=>$val){
                    $aPOST[] = $key."=".urlencode($val);
                }
                $strPOST =  join("&", $aPOST);
            }
            // var_dump($url.'?'.$strPOST);exit;
            curl_setopt($oCurl, CURLOPT_URL, $url); //需要获取的URL地址，也可以在curl_init()函数中设置。
            curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 ); //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出.
            curl_setopt($oCurl, CURLOPT_POST,true); //  启用时会发送一个常规的POST请求，
            curl_setopt($oCurl, CURLOPT_POSTFIELDS,$strPOST); //全部数据使用HTTP协议中的"POST"操作来发送。
            $sContent = curl_exec($oCurl); //执行一个cURL会话。
            $aStatus = curl_getinfo($oCurl); //获取一个cURL连接资源句柄的信息。
            curl_close($oCurl); //关闭curl 会话
            if(intval($aStatus["http_code"])==200){
            //echo $sContent;
                return $sContent;
            }else{
                return false;
            }
        }
