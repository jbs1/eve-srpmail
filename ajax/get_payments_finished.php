<?php
require_once('../header.php');


header('Content-Type: application/json;charset=utf-8');

if(isset($_COOKIE['finished_payments'])){
	echo json_encode($_COOKIE['finished_payments']);
} else {
	echo "[]";
}

?>