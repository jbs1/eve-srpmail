<?php
require_once('inc.php');

$url="https://api.eveonline.com/char/Contracts.xml.aspx?characterID=".charid()."&accessToken=".token();
print_r($url)

?>