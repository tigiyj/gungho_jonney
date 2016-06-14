<?php 
function curlPostJson($url,$data_string){
	$user_agent="Jonney-iPhone/1.3.2";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Content-Type: application/json',
	    'Content-Length: ' . strlen($data_string))
	);
	$result = curl_exec($ch);
	var_dump($result);
}

$url = 'http://ios-production-2093490103.ap-northeast-1.elb.amazonaws.com/rest/1.2.4/sortie';
/*裏信濃・甲斐  箕輪城
$data_string='{
	"sortie_country_id": 20,
	"character_3": 19206,
	"uiid": "1214356F-929F-47A2-A8EE-7CD53FD9276C",
	"battlefield_id": 201,
	"character_2": 12203,
	"difficulty": 3,
	"tension": 890,
	"strategy_id": 31,
	"character_1": 12101,
	"country_id": 9
}';*/
/*大阪之役
$data_string ='{
	"sortie_country_id": 11,
	"character_3": 26308,
	"uiid": "1214356F-929F-47A2-A8EE-7CD53FD9276C",
	"battlefield_id": 9909,
	"character_2": 27105,
	"difficulty": 1,
	"tension": 483,
	"strategy_id": 32,
	"character_1": 12101,
	"country_id": 9
}';
*/
/*梅雨*/
$data_string = '{"sortie_country_id":9,"character_3":26308,"uiid":"1214356F-929F-47A2-A8EE-7CD53FD9276C","battlefield_id":10269,"character_2":27511,"difficulty":3,"tension":4000,"strategy_id":29,"character_1":12101,"country_id":9}';

/*本能寺
$data_string = '{
	"sortie_country_id": 10,
	"character_3": 25102,
	"uiid": "1214356F-929F-47A2-A8EE-7CD53FD9276C",
	"battlefield_id": 9903,
	"character_2": 25111,
	"difficulty": 3,
	"tension": 890,
	"strategy_id": 8,
	"character_1": 12101,
	"country_id": 9
}';
 */
/*
uiid 账号
character 武将
strategy_id 战术
difficulty 速度
sortie_country_id 就是你出阵的战场所在小地图（比如肥前肥后）
battlefield_id就是地图中具体哪个本（比如绚烂3）
tension是兵粮
country_id是一个废案 （可能最开始想给玩家分国家，后来放弃了）
*/


curlPostJson($url,$data_string);
?>