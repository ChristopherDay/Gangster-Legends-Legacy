<?php 

if(isset($_POST['Send']) and !empty($_POST['message'])){

	if(strlen($_POST['message']) > 500){
		echo "Your message may not contain more then 500 characters.";
	} else {
		$result = mysql_query("UPDATE login SET help_desk='".mysql_real_escape_string($_POST['message'])."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
		or die(mysql_error());
		echo "<b>Your help desk ticket has been send.</b><br />Please have a little bit of patient we will reply to your message as soon as possible.";
	}
}

?>
<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 400px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Help Desk.</legend>
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><b>Note:</b> Sending a second message will delete your first message. </td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="center"><textarea name="message" rows="10" class="textbox"></textarea></td>
  </tr>
  <tr>
    <td align="right"><input name="Send" type="submit" class="button" id="Send" onfocus="if(this.blur)this.blur()" value="Send."/></td>
  </tr>
</table>
</fieldset><br />
<b>Note:</b> Please read the <a href="page.php?page=faq" onfocus="if(this.blur)this.blur()">F.A.Q</a> page before you use the help desk.
</form>

