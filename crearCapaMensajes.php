<?php
include('wialon.php');
$wialon_api = new Wialon();
$jsonData = json_decode(file_get_contents("token"),true);
$token = $jsonData['token'];

	$result =  $wialon_api->login($token);
	$json = json_decode($result, true);
	if(!isset($json['error'])){
		$parametros = array(
	        "layerName" => "viajesViernes241221",
	        "itemId"    => 400213847,
	        "timeFrom"  => 1638403200,
			"timeTo"    => 1638489600,
			"tripDetector" => 1,
			"flags"        => 0,
			"trackWidth"   => 4,
			"trackColor"   => "cc009933",
			"annotations"  => 0,
			"points" 	   => 1,
			"pointColor"   => "cc009933",
			"arrows" 	   => 1
		);

   $res = $wialon_api->render_create_messages_layer($parametros);
   $res2 = json_decode($res, true);
   		
   		echo'Respuesta TRIPS <pre>';
		  print_r($res);
		echo'</pre>';

   	$wialon_api->logout();
	} else {
		echo WialonError::error($json['error']);
	}
?>