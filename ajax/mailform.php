<?php
require_once(__DIR__.'/../header.php');
require_once(__DIR__.'/mail-messages.php');

?>

<form id=<?php echo $messages[$_GET['textid']][2]; ?>>

<div class="form-group">
<label for="receiver">Receiver:</label>
<input type="text" class="form-control" id="receiver-text" name="receiver-text" value="<?php echo $_SESSION['corpmem'][$_GET["assignee"]]; ?>" readonly>
</div>
<input type="hidden" id="receiver" name="receiver" value="<?php echo $_GET['assignee']; ?>"></input>

<div class="form-group">
<label for="subject">Subject:</label>
<input type="text" class="form-control" id="subject" name="subject" value="Your Ship Replacement" readonly>
</div>

<div class="form-group">
<label for="mail-body">Mail Body:</label>
<textarea class="form-control" id="mail-body" name="mail-body" rows="15">
<?php eval($messages[$_GET['textid']][0]);?>
</textarea>
<span class="help-block">To add links they have to be in the format &quot;&lt;url=[target-url]&gt;[some text]&lt;/url&gt;&quot;.</span>
</div>

<button type="submit" class="btn btn-primary">Submit</button><button type="button" class="btn btn-warning" id="back">Back</button>

</form>
