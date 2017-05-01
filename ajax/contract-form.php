<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');


token_refresh();
$value=array($_GET["contID"],$_GET["station"],$_GET["assignee"]);

$api_universe = new Swagger\Client\Api\UniverseApi();
$datasource = "tranquility"; // string | The server name you would like data from
print_r($api_universe->postUniverseNames($value, $datasource));


?>

<h2>forum header</h2>

<form>
<div class="form-group">
<textarea class="form-control" id="intro-text" rows="8" readonly>
vlalsdsa<br>
dsa<br>
sda<br>
dsa<br>
as<br>
a<br>
</textarea>
</div>

<div class="form-group">
<label for="optional-text">Optional comments for the mail</label>
<textarea class="form-control" id="optional-text" rows="5">
</textarea>
<small id="optional-help" class="form-text text-muted">Use &quot;&lt;br&gt;&quot; to start a new line</small>
</div>

<div class="form-group">
<textarea class="form-control" id="end-text" rows="8" readonly>
vlalsdsa<br>
</textarea>
</div>

</form>
