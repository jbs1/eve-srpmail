<?php
session_start();
require_once('../inc.php');


token_refresh();

$api_universe = new Swagger\Client\Api\UniverseApi();
$station=$api_universe->getUniverseStationsStationId($_GET["station"], $datasource);
?>

<div id="contrfrm">
<h2>SRP accepted!</h2>

<form>
<input type="hidden" id="contract" name="contract" value="<?php echo $_GET['contid']; ?>"></input>

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
Hello,

I have reviewed and approved your SRP request.
Your replacement ship is avialable at the following station: <url=showinfo:<?php echo $station['type_id']."//".$station['station_id'].">".$station['name'];?></url>

The contract for the ship can be found here: <url=contract:<?php echo $station['system_id']."//".$_GET['contid'];?>>Contract</url>

</textarea>
</div>

<div class="form-group">
<label for="additional-text">Optional comments for the mail</label>
<textarea class="form-control" id="additional-text" name="additional-text" rows="4">
</textarea>
<span class="help-block">To add links they have to be in the format &quot;&lt;url=[target-url]&gt;[some text]&lt;/url&gt;&quot;.</span>
</div>

<div class="form-group">
<textarea class="form-control" id="end-text" name="end-text" rows="4" readonly>
Fly Safe,
<url=showinfo:1377//<?php echo charid(); ?>><?php echo $_SESSION['corpmem'][charid()]; ?></url>
<url=showinfo:2//<?php echo $_SESSION['charinfo']['corpid'];?>><?php echo $_SESSION['charinfo']['corpname'];?></url>
</textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button><button type="button" class="btn btn-warning" id="back">Back</button>

</form>
</div>
