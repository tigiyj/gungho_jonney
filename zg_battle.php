<?php 
$get_type = 'battleRootLog';
$uiid = '1214356F-929F-47A2-A8EE-7CD53FD9276C';
$get_json = curl('',1,$get_type,$uiid,1);
$get_data = json_decode($get_json,true);
$rank = $get_data['value']['state']['rank'];
$win_count = $get_data['value']['state']['win_count'];

if ($rank>1||$win_count>=4) {
	$data_string = '{
		"friend_code": "",
		"uiid": "1214356F-929F-47A2-A8EE-7CD53FD9276C",
		"player_character_1": 14102,
		"player_character_2": 0,
		"player_character_3": 0,
		"strategy_id": 25,
		"rule": 1
	}';	
}else{
	$data_string = '{
		"friend_code": "",
		"uiid": "1214356F-929F-47A2-A8EE-7CD53FD9276C",
		"player_character_1": 27511,
		"player_character_2": 12101,
		"player_character_3": 22102,
		"strategy_id": 5,
		"rule": 1
	}';
}
$post_type="battleSortie";
curl($data_string,1,$post_type,"","");







/**
 * $json 数据
 * $phone 手机类型,1为iphone,2为Android
 * $type 借口类型
 * $uiid 账号，有些借口可以不填
 */
function curl($post='',$phone,$type,$uiid='',$return=0){

	if ($phone ==1) {
		$url = 'http://ios-production-2093490103.ap-northeast-1.elb.amazonaws.com/rest/1.2.4/';
		$user_agent="Jonney-iPhone/1.3.2";
	}else {
		$url = 'http://ios-production-2093490103.ap-northeast-1.elb.amazonaws.com/rest/1.2.4/';
		$user_agent="Jonney-iPhone/1.3.2";
	}
	$url .=$type;
	if ($uiid!='') {
		$url .= "?uiid=".$uiid;
	}

	if ($post) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($post))
		);
	}else{
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