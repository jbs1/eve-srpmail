<?php
require_once('../header.php');

header('Content-Type: application/json;charset=utf-8');


$api_instance = new Swagger\Client\Api\MailApi(null,$config);
$resp = new \Swagger\Client\Model\PostCharactersCharacterIdMailRecipient();
$resp["recipient_type"] = "character";
$resp["recipient_id"] = $_POST["recv"];
$mail = new \Swagger\Client\Model\PostCharactersCharacterIdMailMail();
$mail["subject"] = $_POST["subj"];
$mail["body"] = str_replace(array("\r\n","\r","\n"), "<br>", $_POST["body"]);
$mail["recipients"] = array($resp);

try {
    $result = $api_instance->postCharactersCharacterIdMail(charid(), $mail, $datasource);
    
    /**
    only save in session if successful
	switch/case for special cases such as contract srp for additional after mail actions
	**/
    if(isset($_POST["special"])){
    	switch ($_POST["special"]) {
    		case 'contract':
    			if(!isset($_COOKIE['finished_contracts'])){
					setcookie('finished_contracts[0]',$_POST["contractid"],time()+60*60*24,'/');
				}elseif (!in_array($_POST["contractid"], $_COOKIE['finished_contracts'])){
					$x = sizeof($_COOKIE['finished_contracts']);//index for new contract
					setcookie("finished_contracts[$x]",$_POST["contractid"],time()+60*60*24,'/');
				}
			break;
            case 'isk':
                if(!isset($_COOKIE['finished_payments'])){
                    setcookie('finished_payments[0]',$_POST["paymentid"],time()+60*60*24,'/');
                }elseif (!in_array($_POST["paymentid"], $_COOKIE['finished_payments'])){
                    $x = sizeof($_COOKIE['finished_payments']);//index for new contract
                    setcookie("finished_payments[$x]",$_POST["paymentid"],time()+60*60*24,'/');
                }
            break;
    	}
    }

	print_r(json_encode(array("success"=>true,"return"=>$result)));//setcookie has to be first
} catch (Exception $e) {
	print_r(json_encode(array("success"=>false,"return"=>'Exception when calling MailApi->postCharactersCharacterIdMail: '+$e->getMessage())));
}




?>