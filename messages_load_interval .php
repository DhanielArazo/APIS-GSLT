<?php
include('wialon.php');
$wialon_api = new Wialon();
$jsonData = json_decode(file_get_contents("token"),true);
$token = $jsonData['token'];

	$result =  $wialon_api->login($token);
	$json = json_decode($result, true);
	if(!isset($json['error'])){
		$parametros = array(
	       "itemId"      => 400213847,
	       "timeFrom"    => 1637874000,
	       "timeTo"      => 1638575940,
	       "flags"      => 0,
	       "flagsMask"      => 0xFF00,
	       "loadCount"      => 0xffffffff
	);

   $res = $wialon_api-> messages_load_interval($parametros);
   $res2 = json_decode($res, true);
   		
   		echo'Respuesta  messages_load_interval  <pre>';
		  print_r($res2);
		echo'</pre>';

   	$wialon_api->logout();
	} else {
		echo WialonError::error($json['error']);
	}
?>