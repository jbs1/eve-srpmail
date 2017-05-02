<?php
require_once('inc.php');

token_refresh();

$url="https://api.eveonline.com/char/Contracts.xml.aspx?characterID=".charid()."&accessToken=".token();
print_r($url);

print_r(getcontract(charid(),token()));

?>