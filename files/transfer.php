<form method="post">
<table width="600" border="0" cellspacing="0">
  <tr>
    <td width="300" align="center" valign="top">
<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Transfer Money.</legend>
<table width="295" border="0" align="center" cellspacing="0">
  <tr>
    <td width="75"><b>Send to: </b></td>
    <td width="220" align="center"><input name="sendto" type="text" class="entryfield" id="sendto" style=' width: 95%; '/></td>
  </tr>
  <tr>
    <td width="75"><b>Amount: </b></td>
    <td width="220" align="center"><input name="amount" type="text" class="entryfield" id="amount" style=' width: 95%; ' value="$" maxlength="20"/></td>
  </tr>
  <tr>
    <td width="75"><b>Password: </b></td>
    <td width="220" align="center"><input name="password" type="password" class="entryfield" id="password" style=' width: 95%; '/></td>
  </tr>
</table>
<table width="295" border="0" align="center" cellspacing="0">
  <tr>
    <td width="120" align="center"><img width="120" height="30" src="files/button.php" /></td>
    <td width="75" align="center"><input name="userdigit" type="text" class="entryfield" style=' width: 80%; ' size="5" maxlength="5" /></td>
    <td width="100" align="center"><input name="Transfer" type="submit" class="button" id="Transfer" value="Transfer." onFocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset>
</td>
    <td width="25">&nbsp;</td>
    <td width="275" align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 275px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Last 10 transactions.</legend>
<?php

	$result = mysql_query("SELECT * FROM bank WHERE sendby='".mysql_real_escape_string($name)."' or sendto='".mysql_real_escape_string($name)."' ORDER BY id DESC LIMIT 0,10") or die(mysql_error());
	while($row = mysql_fetch_array( $result )) {
if($row['sendby'] == $name){
echo "You sent <b>$ ".number_format($row['amount']).",-</b> to <a href=\"page.php?page=view_profile&name=". $row['sendto'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['sendto']."</a>.<br />";
}else{
echo "You received <b>$ ".number_format($row['amount']).",-</b> from <a href=\"page.php?page=view_profile&name=". $row['sendby'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['sendby']."</a>.<br />";
}
 } // while

?>
    </fieldset></td>
  </tr>
</table>
</form>