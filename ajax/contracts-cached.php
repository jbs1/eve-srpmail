<?php
require_once('header.php');

if(isset($_SESSION["contracts_cached"])){
	echo $_SESSION["contracts_cached"];
} else {
	echo 0;
}


?>