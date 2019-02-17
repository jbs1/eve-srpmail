<?php
require_once(__DIR__.'/../header.php');

header('Content-Type: application/json;charset=utf-8');

$prev_contracts = isset($_COOKIE['finished_contracts'])?$_COOKIE['finished_contracts']:[];

foreach ($_GET["contractids"] as $contractid){
	if(!in_array($contractid, $prev_contracts)){
		$x = sizeof($prev_contracts);//index for new contract
		array_push($prev_contracts,$contractid);
		setcookie("finished_contracts[$x]",$contractid,time()+60*60*24,'/');
	}
}
?>