<?php
session_start();
require_once('../inc.php');

token_refresh();

header('Content-Type: application/json;charset=utf-8');

if(isset($_SESSION['finished_contracts'])){
	echo json_encode($_SESSION['finished_contracts']);
} else {
	echo "[]";
}

?>