<?php
require_once(__DIR__.'/header.php');

if(empty($_SESSION['token'])){//if not logged in redirect to
	header('Location: oauth.php');
} else {

echo '<!DOCTYPE html>
<html>
<head>';

echo'
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- JQuery -->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
';

echo '
<link rel="stylesheet" href="css/loader.css">
<script src="js/corp.js"></script>
<script src="js/srp-hull.js"></script>
<script src="js/srp-isk.js"></script>
<script src="js/srp-messages.js"></script>
<script src="js/loader.js"></script>

<script src="js/jquery.searchable-1.1.0.min.js"></script>
';

echo '<title>SRP Mailer</title>
</head>
<body>';

echo '
<div class="container-fluid">
	<div class="row">
		<div class="col-md-1 col-md-offset-2">
			<img src="https://image.eveonline.com/Corporation/'.$_SESSION["charinfo"]["CorporationID"].'_128.png">
		</div>
		<div class="col-md-7 page-header">
			<h1>SRP Mailer for SRP-Officers <small>'.$mailer_version.'</small></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2" id="loading_status">
			<table>
				<tr id="row_loader"></tr>
				<tr id="row_text"></tr>
			</table>
		</div>
		<div class="col-md-6 col-md-offset-3" id="art">
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#intro" aria-controls="intro" role="tab" data-toggle="tab">Introduction</a></li>
				<li role="presentation"><a href="#hullsrp" aria-controls="hullsrp" role="tab" data-toggle="tab">Hull SRP</a></li>
				<li role="presentation"><a href="#isksrp" aria-controls="isksrp" role="tab" data-toggle="tab">ISK SRP</a></li>
				<li role="presentation"><a href="#messagessrp" aria-controls="messagessrp" role="tab" data-toggle="tab">Messages</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">';

echo '		<div role="tabpanel" class="tab-pane active" id="intro">
				<p>
					<h3>How it works:</h3>
					<ul>
						<li>Hull SRP:</li>
						<ul><li>
							This tab will pull all contracts from you to your corp mates within the last 6 hours. You can select the contract you want to write an email for, by clicking on it.
						</li></ul>
						<li>ISK SRP (indev):</li>
						<ul><li>
							This tab will pull all payments from the configured corp wallet within the last 6 hours. You can select the payments you want to write an email for, by clicking on them.
						</li>
						<li>
							One of these roles is required for this feature: <strong>Accountant/Junior Accountant</strong>
						</li>
						<li>
							The cache timer for wallets is <strong>1 hour</strong>. This means it is best to first make all payments ingame and then refresh the isk srp page.
						</li></ul>
						<li>Messages (indev):</li>
						<ul><li>
							This tab will allow you to select various message templates and send them to your corp mates.
						</li></ul>
					</ul>					
				</p>
				<p>
					<h3>Limitation:</h3>
					<ul>
					<li>Everything on this website is saved in session on the server. Not permanent storage of any kind of data occurs. This means when you stay inactive for too long or close your browser you will have to login again.</li>
					<ul>
						<li>The session expiry time on the current server is: <b>'.ini_get("session.gc_maxlifetime").'</b> seconds</li>
					</ul>
					<li>If the target station is an Upwell structure, Hull SRP will not work. So far only NPC stations work.</li>
					</ul>
				</p>
				<p>
					<h4>Source code:</h4>
					The sourcecode to the mailer can be found on <a href="https://github.com/jbs1/eve-srpmail">Github</a> together with a list of future plans.
				</p>
			</div>';

echo'			<div role="tabpanel" class="tab-pane" id="hullsrp">
					<table class="table table-bordered table-hover" id="hullsrp-table">
						<thead>
						<tr>
						<th>Contract ID</th><th>Receiver</th><th>Time issued</th><th>Station ID</th><th>Status</th>
						</tr>
						</thead>
						<tbody>
						<tr id="no_contracts" class="warning"><td colspan=5> No contracts available! </td></tr>
						</tbody>
					</table>
					<span class="help-block" id="hull_helpblock">When more than one contract to the same person exists, all contracts will be send in one mail!</span>
					<button type="button" class="btn btn-primary" id="hull_refresh_button" onclick="hull_table_refresh()">Refresh!</button><br />
					<span id="contracts-cached-date"></span>
				</div>';

echo '			<div role="tabpanel" class="tab-pane" id="isksrp">
					<table class="table table-bordered table-hover" id="isksrp-table">
						<thead>
						<tr>
						<th>Payment ID</th><th>Receiver</th><th>Time issued</th><th>Amount(ISK)</th><th>Reason</th>
						</tr>
						</thead>
						<tbody>
						<tr id="no_payments" class="warning"><td colspan=5> No payments available! </td></tr>
						</tbody>
					</table>
					<span class="help-block"id="isk_helpblock">When more than one payment to the same person exists, all payments will be send in one mail!</span>
					<button type="button" class="btn btn-primary" id="isk_refresh_button" onclick="isk_table_refresh()">Refresh!</button><br />
					<span id="payments-cached-date"></span>
				</div>';

echo '			<div role="tabpanel" class="tab-pane" id="messagessrp">
					<div class="input-group" id="messagessrp-search-div">
						<span class="input-group-addon" id="messagessrp-search-addon">Member-Search:</span>
						<input type="text" class="form-control" id="messagessrp-search" placeholder="Character Name" aria-describedby="messagessrp-search-addon">
					</div>
					<table class="table table-bordered table-hover" id="messagessrp-table">
						<thead>
						<tr>
						<th>Membername</th><th>Member ID</th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>';

echo '		</div>
		</div>
	</div>
</div>
</body>
</html>';

}

?>
