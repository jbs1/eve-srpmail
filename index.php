<?php
session_start();
require_once('SwaggerClient-php/autoload.php');
require_once('vendor/autoload.php');
require_once('provider.php');
require_once('inc.php');

if(empty($_SESSION['accesstoken-obj'])){//if not logged in redirect to
	header('Location: oauth.php');
} else {
	token_refresh();
	Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken(token());
}


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
<script src="js/corp.js"></script>
<script src="js/contract-table.js"></script>
<script src="js/resubmit-table.js"></script>
<script>
function refresh() {
	$(\'a[data-toggle="tab"][href="#accept"]\').trigger("shown.bs.tab");
}
</script>
<script src="js/jquery.searchable-1.1.0.min.js"></script>
';


echo '<title>srp mail</title>
</head>
<body>';

echo '
<div class="container-fluid">

	<div class="row">
		<div class="col-md-12 page-header">
			<h1>EVE srp mail <small>An assistant for srp officers</small></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#intro" aria-controls="intro" role="tab" data-toggle="tab">Introduction</a></li>
				<li role="presentation"><a href="#accept" aria-controls="accept" role="tab" data-toggle="tab">Accepting-Message</a></li>
				<li role="presentation"><a href="#resubmit" aria-controls="resubmit" role="tab" data-toggle="tab">Resubmiting-Messages</a></li>
				<li role="presentation"><a href="#reject" aria-controls="reject" role="tab" data-toggle="tab">Rejecting-Messages</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="intro">Here comes an intro text for this tool<br/> Session expirey in seconds:'.ini_get("session.gc_maxlifetime").'</div>
				<div role="tabpanel" class="tab-pane" id="accept">
					<div id="contract-table">
						<table class="table table-bordered table-hover" id="cont-table">
							<thead>
							<tr>
							<th>Contract ID</th><th>Reciever</th><th>Time issued</th><th>Status</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
						<button type="button" class="btn btn-primary" onclick="refresh()">Refresh!</button><br />
						Contracts cached until (sec):<span id="contracts-time-cached">0</span>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="resubmit">
					<div id="resubmit-table">
						<div class="input-group">
							<span class="input-group-addon" id="resubmit-search-addon">Member-Search:</span>
							<input type="text" class="form-control" id="resubmit-search" placeholder="Character Name" aria-describedby="resubmit-search-addon">
						</div>
						<table class="table table-bordered table-hover" id="resub-table">
							<thead>
							<tr>
							<th>Membername</th><th>Member ID</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="reject">reject</div>
			</div>
		</div>
	</div>
</div>
';


echo '</body>
</html>';


?>
