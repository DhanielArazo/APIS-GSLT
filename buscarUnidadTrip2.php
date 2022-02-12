<?php
include('wialon.php');
$wialon_api = new Wialon();
$jsonData = json_decode(file_get_contents("token"),true);
$token = $jsonData['token'];

	$result =  $wialon_api->login($token);
	$json = json_decode($result, true);
  		echo'Respuesta token <pre>';
		  print_r($json);
		echo'</pre>';

	if(!isset($json['error'])){
		$parametros = array(
	       "itemId"      => 400213847,
	       "msgsSource"  => '\"viajes-Viernes241221-400213847\"',
	       "timeFrom"    => 1639029600,
	       "timeTo"      => 1639202340
		);

   $res = $wialon_api->unit_get_trips($parametros);
   $res2 = json_decode($res, true);
   		
   		echo'Respuesta TRIPS <pre>';
		  print_r($res);
		echo'</pre>';

   	$wialon_api->logout();
	} else {
		echo WialonError::error($json['error']);
	}
?>