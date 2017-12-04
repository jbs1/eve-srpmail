<?php
require_once('header.php');
header('Content-Type: application/json;charset=utf-8');

print_r(json_encode(array("session"=>$_SESSION,"cookie"=>$_COOKIE)));

?>