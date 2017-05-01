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
The contract for the ship can be found here: [contract link]<br><br>

<br><br><url=showinfo:57//60014731>Slays VII - Moon 3 - Center for Advanced Studies School</url>
<br><br><url=contract:30003798//117662366>Scythe</url> 
<br><br><url=showinfo:1379//95601269>Palja Kurman</url>
<br><br><url=showinfo:2//917701062>EVE University</url>
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
</dif>