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

foreach ($raw->row as $value) {
	if($value["issuerID"]==charid()&&$value["availability"]=="Private"&&$value["type"]=="ItemExchange"&&strtodate($value["dateIssued"])<strtotime('-18 day')){
		array_push($json,$value);
	}
}

echo json_encode($json);

?>