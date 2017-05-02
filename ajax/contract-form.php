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
?>

<div id="contrfrm">
<h2>SRP accepted!</h2>

<form>
<div class="form-group">
<label for="reciever">Reciever:</label>
<input type="text" class="form-control" id="reciever-text" name="reciever-text" value="<?php echo $_SESSION['corpmem'][$_GET["assignee"]]; ?>" readonly>
</div>
<input type="hidden" id="reciever" name="reciever" value="<?php echo $_GET["assignee"]; ?>"></input>

<div class="form-group">
<label for="subject">Subject:</label>
<input type="text" class="form-control" id="subject" name="subject" value="Your Ship Replacement" readonly>
</div>

<div class="form-group">
<textarea class="form-control" id="intro-text" name="intro-text" rows="8" readonly>
Hello,<br><br>
I have reviewed and approved your SRP request.<br><br>
Your replacement ship is avialable at the following station: <url=showinfo:<?php echo $station['type_id']."//".$station['station_id'].">".$station['name'];?></url><br><br>
The contract for the ship can be found here: <url=contract:<?php echo $station['system_id']."//".$_GET['contid'];?>>Contract</url><br><br>
</textarea>
</div>

<div class="form-group">
<label for="optional-text">Optional comments for the mail</label>
<textarea class="form-control" id="optional-text" name="optional-text" rows="4">
</textarea>
<small id="optional-help" class="form-text text-muted">Use &quot;&lt;br&gt;&quot; to start a new line</small>
</div>

<div class="form-group">
<textarea class="form-control" id="end-text" name="end-text" rows="4" readonly>
<br>Fly Safe,<br>
<url=showinfo:1377//<?php echo charid(); ?>><?php echo $_SESSION['corpmem'][charid()]; ?></url><br>
<url=showinfo:2//917701062>EVE University</url>
</textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
</dif>