<?php
if(isset($_POST['Write'])){

$result = mysql_query("UPDATE login SET note_pad='".mysql_real_escape_string($_POST['note_pad'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

echo "Your notepad has been updated.";

$note_pad = $_POST['note_pad'];

}// update quote.
?>
<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 500px; text-align: center; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Notepad.</legend>
  <textarea name="note_pad" rows="30" class="textbox" id="note_pad" style='width: 95%;'><?php echo htmlspecialchars(stripslashes($note_pad)); ?></textarea>
  <br />
  <div align="right"><input name="Write" type="submit" class="button" id="Write" value="Write." align="right" onFocus="if(this.blur)this.blur()" /></div>
</fieldset>
</form>

