<?php 
include_once('zg_function.php');
$uiid = '1214356F-929F-47A2-A8EE-7CD53FD9276C';
$url='http://ios-production-2093490103.ap-northeast-1.elb.amazonaws.com/rest/1.2.4/playerState?uiid=1214356F-929F-47A2-A8EE-7CD53FD9276C';
$type = 'playerState';
$return=1;
$phone=1;
$ispost=0;
$json=array(
	'uiid'=>$uiid
	);
$json=json_encode($json);
$return_json = curl($ispost,$json,$phone,$type,$return);
$array = json_decode ($return_json,true);

$characters =$array['value']['characters'][0];

$c=array(11107,11110,13102,13104,14102,14105,14106,14107,14108,16101,16103,16105,16106,16107,17106,17107,17210,18305,19108,19109,19110,19201,19203,19204,20102,20103,20105,20106,20107,20109,21104,21108,22108,22109,23106,23109,24103,24108,24110,24111,24201,24202,24203,24204,24307,25108,25110);
$r=array(11106,11108,11109,11202,11204,11206,11209,12109,12203,13103,13106,13107,13110,13111,14103,14109,15106,15107,15109,16104,17108,17109,18106,18107,18108,18110,18208,20104,20108,20110,20202,21101,21102,21103,21106,21109,21110,21204,21205,21206,22106,22107,22110,22111,22201,22202,23105,23107,23108,23110,24105,24205,24207,25107,25109,26103,26104,26105,26108,26109,26111,26204,26205,26207,26209,26306,26307);
$sr=array(11207,15204,18103,18202,20101,26206,26309);
$salelist=array_merge($c,$r,$sr);
foreach ($characters as $key => $value) {
	if ($value['stock']>0) {
		$flag=0;
		foreach ($salelist as $sk => $sv) {
			if ($sv==$value['character_id']) {
				$flag=1;				
			}
		}
		if ($flag==0) {
			unset($characters[$key]);
		}
	}else{
		unset($characters[$key]);
	}
}

$saletype='saleStock';
$ispost=1;
$return=0;
foreach ($characters as $key => $value) {
	$data = array("character_id"=>$value['character_id'],"num"=>$value['stock'],"uiid"=>$uiid);
	$postjson=json_encode($data);
	$request_json = curl($postjson,1,$saletype,'',1);
	$request_json = curl($ispost,$postjson,$phone,$saletype,$return);
}

?>