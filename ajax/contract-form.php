<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');


token_refresh();
$value=array($_GET["station"],$_GET["assignee"]);

$api_universe = new Swagger\Client\Api\UniverseApi();
$datasource = "tranquility"; // string | The server name you would like data from
$station=$api_universe->getUniverseStationsStationId($_GET["station"], $datasource);
print_r($station);

?>

<div id="contrfrm">
<h2>SRP accepted!</h2>

<form>
<div class="form-group">
<textarea class="form-control" id="intro-text" rows="8" readonly>
Hello,<br><br>
I have reviewed and approved your SRP request.<br><br>
Your replacement ship is avialable at the following station: <url=showinfo:<?php echo $station['type_id']."//".$station['station_id'];?>></url><br><br>
The contract for the ship can be found here: <url=contract:<?php echo $station['system_id']."//".$_GET['contid'];?>>Contract</url><br><br>
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
Fly Safe,<br>
<url=showinfo:1377//<?php echo charid(); ?>><?php echo $_SESSION['corpmem']=>charid(); ?></url>
<br>
<url=showinfo:2//917701062>EVE University</url>
</textarea>
</div>

</form>
</dif>