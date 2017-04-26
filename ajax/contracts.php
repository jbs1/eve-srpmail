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
echo strtotime('-1 hour');
foreach ($raw->row as $value) {
	if($value["issuerID"]==charid()&&$value["availability"]=="Private"&&$value["type"]=="ItemExchange"){
		array_push($json,$value);
	}
}

echo json_encode($json);

?>