<?php
include('wialon.php');
	$wialon_api = new Wialon();

$token = '8faa8f3bcf38c9e05b434111ad3c112a44D495EB9A32F73166B69AC31E8554DFA9382179'; // full access
	//$token = '8faa8f3bcf38c9e05b434111ad3c112aE7211A60A8FE41002752434E08BE7FC8D7473BC8';
 	//  $token = 'cc9cade8247b9101e57d38ed2b2320ef5CBC9E16B74A4F075DB3E64740E8162E5218A973'; 

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
		  print_r($res2);
		echo'</pre>';

   	$wialon_api->logout();
	} else {
		echo WialonError::error($json['error']);
	}
?>