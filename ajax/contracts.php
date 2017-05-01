<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

token_refresh();

header('Content-Type: application/json;charset=utf-8');
$raw=getcontract(charid(),token())->result->rowset;
$json=array();
$cid=corpid(charid());

//shows only the most recent privat item exchanges issued by the logged in user
foreach ($raw->row as $value) {
	//&&strtotime($value["dateIssued"])>strtotime('-6 hour')
	if($value["issuerID"]==charid()&&$value["availability"]=="Private"&&$value["type"]=="ItemExchange"){
		array_unshift($json,$value);
	}
}

echo json_encode($json);

?>