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
<script src="js/reject-table.js"></script>
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
			<h1>EVE-Uni SRP mailer <small>Mailing tool for SRP-Officers</small></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3" id="art">
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
				<div role="tabpanel" class="tab-pane active" id="intro">
				<p>
					<h3>How it work:</h3>
					You have 3 choices:<br />
					Accept or reject a request or ask the character to resubmit.<br />
					For rejection and resubmission it works similarly, just search for the character in the table, and write an email by clicking on it.<br />
					For accepting an SRP request you first have to create the contract ingame. Then this script will pull your contracts via API.<br />
					It will only show you private Item-Exchange contracts from the last 6 hours from you to any member of your corp,<br />
					as these are the only ones that are relevant. From there on out it is the same process as with rejection/resubmission.<br />
					It will prefil all important things automatically in the template and you can write additional info if you want.<br />
					It will mark the contracts for which you wrote an email in the current session already.
				</p>
				<p>
					<h3>Limitation:</h3>
					<ul>
					<li>The XML API from CCP will at max. only return the last 50 contracts create. This is a hardcoded limit.</li>
					<li>The XML API will cache the results for 20 minutes. This mean, when you just refeshed the contracts on the website
					and then create new contracts it will take 20 minutes until the refesh will pull the new contracts.</li>
					<ul>
						<li>This make it advisable to first create all contracts and then refresh them on this website.</li>
						<li>The time until you can refresh contracts is shown on the website</li>
					</ul>
					<li>Everything on this website is saved in session on the server. This means when you stay inactive for too long or close
					your browser you will have to login again and it will not remember the contracs anymore for which you send email already.</li>
					<ul>
						<li>The session expiry time on the current server is: <b>'.ini_get("session.gc_maxlifetime").'</b> seconds</li>
					</ul>
					<li>If the target station is a Citadel it will not work. So far only Stations work.</li>
					</ul>
				</p>
				<p>
					<h4>Source code:</h4>
					The sourcecode to the mailer can be found <a href="https://github.com/jbs1/eve-srpmail">here</a> together with a list of future plans.
				</p>
				</div>
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
						Contracts cached <strong><span id="contracts-time-cached-sec">0</span></strong> seconds (<span id="contracts-time-cached-time">0</span>)
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
				<div role="tabpanel" class="tab-pane" id="reject">
					<div id="reject-table">
						<div class="input-group">
							<span class="input-group-addon" id="reject-search-addon">Member-Search:</span>
							<input type="text" class="form-control" id="reject-search" placeholder="Character Name" aria-describedby="reject-search-addon">
						</div>
						<table class="table table-bordered table-hover" id="rej-table">
							<thead>
							<tr>
							<th>Membername</th><th>Member ID</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
';


echo '</body>
</html>';


?>
