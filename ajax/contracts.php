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
	// print_r($value);
	array_push($json,$value->attributes());
}
// 


echo json_encode($json);

?>