<?php
require_once('../header.php');


header('Content-Type: application/json;charset=utf-8');

if(isset($_SESSION['finished_contracts'])){
	echo json_encode($_SESSION['finished_contracts']);
} else {
	echo "[]";
}

?>