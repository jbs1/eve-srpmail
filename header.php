<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
require_once(__DIR__.'/vendor/autoload.php');
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/func.php');

$datasource = "tranquility"; // string | The server name you would like data from

token_refresh();

?>
