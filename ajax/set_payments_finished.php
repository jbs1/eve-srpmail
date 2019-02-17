<?php
require_once(__DIR__.'/../header.php');

header('Content-Type: application/json;charset=utf-8');

$prev_payments = isset($_COOKIE['finished_payments'])?$_COOKIE['finished_payments']:[];

foreach ($_GET["paymentids"] as $paymentid){
	if(!in_array($paymentid, $prev_payments)){
		$x = sizeof($prev_payments);//index for new contract
		array_push($prev_payments,$paymentid);
		setcookie("finished_payments[$x]",$paymentid,time()+60*60*24,'/');
	}
}
?>