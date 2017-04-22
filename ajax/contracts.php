<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

header('Content-Type: application/json;charset=utf-8');
$raw=getcontract(charid(),token());
$json=array();
$json['@attributes']=$raw['result']['@attributes'];
foreach ($raw['result']['row'] as $key => $value) {
	$json['row'][$key]=$value['@attributes'];
}
print_r($json);
print_r(getcontract(charid(),token()));
echo json_encode(getcontract(charid(),token()));

?>