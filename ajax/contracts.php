<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

token_refresh();

header('Content-Type: application/json;charset=utf-8');
$raw=getcontract(charid(),token());
$json=$raw->result->rowset->attributes();
// print_r($json);

// foreach ($raw->result->rowset->attributes() as $key => $value) {
// 	$json->attributes->$key=$value[0];
// }
print_r($json);
// // // $raw->result->rowset->attributes()
// // $json['attributes']=$raw->result->rowset->attributes();
// // $json['row']=array();
// // print_r($raw->result->rowset);
foreach ($raw->result->rowset->row as $value) {
	array_push($json['row'],$value->attributes());
	// foreach ($value->attributes() as $key => $value) {
	// 	$json['row'][$key]=$value[0];
	// }
}

// print_r($json);
// print_r($raw);
// echo json_encode(getcontract(charid(),token()));

?>