<?php
require_once('header.php');

if(empty($_SESSION['accesstoken-obj'])){//if not logged in redirect to
	header('Location: oauth.php');
} else {
	token_refresh();

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

<script>
function hull_table_refresh() {
	$(\'a[data-toggle="tab"][href="#hullsrp"]\').trigger("shown.bs.tab");
}
</script>
<script src="js/jquery.searchable-1.1.0.min.js"></script>
';


echo '<title>SRP Mailer</title>
</head>
<body>';

echo '
<div class="container-fluid">

	<div class="row">
		<div class="col-md-1 col-md-offset-2">
			<img src="https://image.eveonline.com/Corporation/'.$_SESSION["charinfo"]["corpid"].'_128.png">
		</div>
		<div class="col-md-7 page-header">
			<h1>SRP mailer <small>Mailing tool for SRP-Officers</small></h1>
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


echo '			<div role="tabpanel" class="tab-pane active" id="intro">
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
				</div>';


echo'			<div role="tabpanel" class="tab-pane" id="hullsrp">
					<table class="table table-bordered table-hover" id="hullsrp-table">
						<thead>
						<tr>
						<th>Contract ID</th><th>Reciever</th><th>Time issued</th><th>Status</th>
						</tr>
						</thead>
						<tbody>
						<tr id="no_contracts" class="warning"><td colspan=4> No contracts available! </td></tr>
						</tbody>
					</table>
					<button type="button" class="btn btn-primary" id="contracts_refresh_button" onclick="hull_table_refresh()">Refresh!</button><br />
					<span id="contracts-cached-date">Contracts cached until <strong><span id="contracts-cached-date-text"></span></strong>.</span>
				</div>';


echo '			<div role="tabpanel" class="tab-pane" id="isksrp">
					<div class="input-group" id="isksrp-search-div">
						<span class="input-group-addon" id="isksrp-search-addon">Member-Search:</span>
						<input type="text" class="form-control" id="isksrp-search" placeholder="Character Name" aria-describedby="isksrp-search-addon">
					</div>
					<table class="table table-bordered table-hover" id="isksrp-table">
						<thead>
						<tr>
						<th>Membername</th><th>Member ID</th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>';


echo '			<div role="tabpanel" class="tab-pane" id="messagessrp">
					<div class="input-group">
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
