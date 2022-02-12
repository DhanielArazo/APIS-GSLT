<?php
include('wialon.php');
$wialon_api = new Wialon();

$jsonData = json_decode(file_get_contents("token"),true);
$token = $jsonData['token'];

	$result0 = $wialon_api;
	$result =  $wialon_api->login($token);
	$json = json_decode($result, true);
	if(!isset($json['error'])){
		$parametros = array(
	      'spec' => array(
  	  	      'itemsType' => 'avl_unit',
			   'propName'  => 'admin_fields',
			   'propValueMask' => '*',
			   'sortType' => 'admin_fields'
		 ),
		  'force'  => 1,
		  'from'   => 0,
		  'to'     => 0,
		  'flags'  => 1|256|8388608
		);
   $res = $wialon_api->core_search_items($parametros);
   $res2 = json_decode($res, true);
   		
   		echo'<pre>';
		  print_r($res2['items']);
		echo'</pre>';

		foreach ($res2['items'] as $keyItems => $valueItems) {
			 if (array_key_exists('uid', $valueItems)) {
 			
                foreach ($valueItems['pflds'] as $keyPFLDS => $valuePFLDS) {
                	if($valueItems['pflds'][$keyPFLDS]['n'] === 'brand'){
					   echo $valueItems['id'].' - '.$valueItems['uid'].' - '.$valueItems['pflds'][$keyPFLDS]['v']. '<br>';
                	}
                }
			 }else{
			 	 foreach ($valueItems['pflds'] as $keyPFLDS => $valuePFLDS) {
                	if($valueItems['pflds'][$keyPFLDS]['n'] === 'brand'){
					   echo $valueItems['id'].' - no tiene UID - '.$valueItems['pflds'][$keyPFLDS]['v']. '<br>';
                	}
                }
			 }
		}



   	$wialon_api->logout();
	} else {
		echo WialonError::error($json['error']);
	}
?>