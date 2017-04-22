<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

header('Content-Type: application/json;charset=utf-8');
$raw=getcontract(charid(),token());
print_r(getcontract(charid(),token()));
echo json_encode(getcontract(charid(),token()));

?>