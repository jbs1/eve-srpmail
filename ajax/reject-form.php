<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');


token_refresh();

?>

<div id="rjctfrm">
<h2>SRP rejected!</h2>

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

Unfortunately we have had to decline your ship replacement request due to one or more reasons:

</textarea>
</div>

<div class="form-group">
<label for="additional-text">List the reasons for rejection and supply the Killboard Link</label>
<textarea class="form-control" id="additional-text" name="additional-text" rows="5">
</textarea>
<span class="help-block">To add links they have to be in the format &quot;&lt;url=[target-url]&gt;[some text]&lt;/url&gt;&quot;.</span>
</div>

<div class="form-group">
<textarea class="form-control" id="end-text" name="end-text" rows="7" readonly>
A declined request won't influence future requests, so feel free to request ships in the future.
<i>Feel free to contact me in case you think this happened in error.</i>

Fly Safe,
<url=showinfo:1377//<?php echo charid(); ?>><?php echo $_SESSION['corpmem'][charid()]; ?></url>
<url=showinfo:2//<?php echo $_SESSION['charinfo']['corpid'];?>><?php echo $_SESSION['charinfo']['corpname'];?></url>
</textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button><button type="button" class="btn btn-warning" id="back">Back</button>

</form>
</div>
