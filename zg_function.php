<?php 
/**
 * $json 数据
 * $phone 手机类型,1为iphone,2为Android
 * $type 借口类型
 * $uiid 账号，有些借口可以不填
 */
function curl($ispost,$json='',$phone=1,$type,$return=0){

	if ($phone ==1) {
		$url = 'http://ios-production-2093490103.ap-northeast-1.elb.amazonaws.com/rest/1.2.4/';
		$user_agent="Jonney-iPhone/1.3.2";
	}else {
		$url = 'http://ios-production-2093490103.ap-northeast-1.elb.amazonaws.com/rest/1.2.4/';
		$user_agent="Jonney-iPhone/1.3.2";
	}
	$url .=$type;

	if ($ispost==1) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($json))
		);
	}else{
		$url.="?";
		$json = json_decode($json,true);
		foreach ($json as $key => $value) {
			$url.="&".$key."=".$value;
		}
		//var_dump($url);
		$ch = curl_init();
	    //设置抓取的url
	    curl_setopt($ch, CURLOPT_URL, $url);
	    //设置头文件的信息作为数据流输出
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    //设置获取的信息以文件流的形式返回，而不是直接输出。
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    //执行命令
	}	
	$result = curl_exec($ch);
	curl_close($ch);
	if ($return) {
		return $result;
	}
	
}
?>