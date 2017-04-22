<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

token_refresh();

header('Content-Type: application/json;charset=utf-8');
$raw=getcontract(charid(),token());
$json=$raw->result->rowset;
print_r($json)
echo json_encode(getcontract(charid(),token()));

?>