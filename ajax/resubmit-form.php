<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');


token_refresh();

?>

<div id="rsmbfrm">
<h2>SRP resubmission!</h2>

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
<textarea class="form-control" id="intro-text" name="intro-text" rows="6" readonly>
Hello,

We have recieved your ship replacement request.
However there is at least one issue preventing us from fulfilling your request:

</textarea>
</div>

<div class="form-group">
<label for="additional-text">List the problems and supply the Killboard Link</label>
<textarea class="form-control" id="additional-text" name="additional-text" rows="5">
</textarea>
</div>

<div class="form-group">
<textarea class="form-control" id="end-text" name="end-text" rows="7" readonly>
Fell free to contact me with further information regarding these.
Once resolved, we'll try to issue the new ship as fast as possible.

Fly Safe,
<url=showinfo:1377//<?php echo charid(); ?>><?php echo $_SESSION['corpmem'][charid()]; ?></url>
<url=showinfo:2//917701062>EVE University</url>
</textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button><button type="button" class="btn btn-warning" id="back">Back</button>

</form>
</div>
