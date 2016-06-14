<?php 
include_once('zg_function.php');
$url='http://ios-production-2093490103.ap-northeast-1.elb.amazonaws.com/rest/1.2.4/eventLog?uiid=1214356F-929F-47A2-A8EE-7CD53FD9276C&id=1214356F-929F-47A2-A8EE-7CD53FD9276C&hierarchy=0';
//hierarchy 层级 


$uiid = '1214356F-929F-47A2-A8EE-7CD53FD9276C';
$hierarchy =0;
$json=array(
	'uiid'=>$uiid,
	'id'=>$uiid,
	'hierarchy'=>$hierarchy
	);
$json=json_encode($json);
$type = 'eventLog';
$return =1;
$phone=1;
$return_json = curl($ispost,$json,$phone,$type,$return);

$array = json_decode($return_json,true);
var_dump($array);

?>