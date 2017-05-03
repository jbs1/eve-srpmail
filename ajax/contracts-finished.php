<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

token_refresh();

header('Content-Type: application/json;charset=utf-8');

if(isset($_SESSION['finished_contracts'])){
	echo json_encode($_SESSION['finished_contracts']);
} else {
	echo "[]";
}
print_r($_SESSION['finished_contracts']);

?>