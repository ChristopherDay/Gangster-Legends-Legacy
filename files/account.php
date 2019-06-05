<?php
echo '<form method="post">
<table width="600" border="0" align="center" cellspacing="0">
  <tr>
    <td align="center" valign="top">
	<table width="575" border="0" align="center" cellspacing="0">
  <tr>
    <td width="275" align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 275px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Change Password.</legend>
<table width="275" border="0" cellspacing="0">
  <tr>
    <td width="100" align="left"><b>Old Password: </b></td>
    <td width="175" align="center"><input name="Po" type="password" class="entryfield" id="Po" style=\'width: 95%;\' maxlength="20"/></td>
  </tr>
  <tr>
    <td width="100" align="left"><b>New Password: </b></td>
    <td width="175" align="center"><input name="Pn" type="password" class="entryfield" id="Pn" style=\'width: 95%;\' maxlength="20"/></td>
  </tr>
  <tr>
    <td width="100" align="left"><b>Repeat: </b></td>
    <td width="175" align="center"><input name="Pr" type="password" class="entryfield" id="Pr" style=\'width: 95%;\' maxlength="20"/></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input name="Update" type="submit" class="button" id="Update" value="Update." onFocus="if(this.blur)this.blur()"/></td>
    </tr>
</table>
    </fieldset></td>
    <td width="25">&nbsp;</td>
    <td width="275" align="center" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 275px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">ImageShack.</legend>
	<iframe src="http://imageshack.us/iframe.php?txtcolor=FFFFFF&type=blank&size=30" scrolling="no" allowtransparency="true" frameborder="0" width="275" height="100">Update your browser for ImageShack.us!</iframe></fieldset></td>
  </tr>
</table>	</td>
    </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Friends list.</legend>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center">';
if(empty($friends)){
	echo "You don't have any friends.";
}else{
	$friends_list = explode("-", $friends);		 		  
	foreach( $friends_list as $key => $value){
		echo "<input name=\"friend\" type=\"radio\" value=\"".$value."\" onFocus=\"if(this.blur)this.blur()\"><a href=\"page.php?page=view_profile&name=". $value ."\">".$value."</a>";
	}		
}// if no friends.  
		  
	echo '</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td width="50" align="left"><b>Name:</b></td>
    <td align="center"><input name="name" type="text" class="entryfield" id="name" style=\'width: 95%;\' maxlength="20" /></td>
    <td width="100" align="right"><input name="Add_Friend" type="submit" class="button" id="Add_Friend" value="Add Friend." onfocus="if(this.blur)this.blur()" /></td>
    <td width="100" align="right"><input name="Remove" type="submit" class="button" id="Remove" value="Remove." onfocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">
		<fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Message Filter.</legend>
</textarea>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center">';
	
if(empty($filter)){
	echo "You don't have any people blocked.";
}else{
	$filter_list = explode("-", $filter);
	foreach( $filter_list as $key => $value){
		echo "<input name=\"filter_id\" type=\"radio\" value=\"".$value."\" onFocus=\"if(this.blur)this.blur()\"><a href=\"page.php?page=view_profile&name=". $value ."\">".$value."</a>";
	}		
}// if no friends.  
		  
		  echo '</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td width="50" align="left"><b>Name:</b></td>
    <td align="center"><input name="filter_name" type="text" class="entryfield" id="filter_name" style=\'width: 95%;\' maxlength="20" /></td>
    <td width="100" align="right"><input name="Filter" type="submit" class="button" id="Filter" value="Filter." onfocus="if(this.blur)this.blur()" /></td>
    <td width="100" align="right"><input name="Remove_filter" type="submit" class="button" id="Remove_filter" value="Remove." onfocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset>	</td>
  </tr>
  <tr>
    <td width="300" align="center" valign="top">&nbsp;</td>
    </tr>
  <tr>
    <td align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Quote.</legend>
<textarea name="quote_box" cols="50" rows="10" class="textbox" id="quote_box" style=\'width: 98%;\'/>
'.htmlspecialchars(stripslashes($quote)).'</textarea>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td align="right"><input name="Quote" type="submit" class="button" id="Quote" value="Update Quote." onFocus="if(this.blur)this.blur()" /></td>
  </tr>
</table>
</fieldset></td>
    </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Profile picture.</legend>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center">';
	
if(empty($picture)){
	echo "No Picture.";
}else{
	echo "<img src=\"http://".$picture."\" style=\" border: 1px #000000 solid;\"/>";		
}// if no Picture.  
		  echo '</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td width="50" align="left"><b>Url:</b></td>
    <td align="center"><input name="Url" type="text" class="entryfield" id="Url" style=\'width: 95%;\' value="http://'.$picture.'" maxlength="255" /></td>
    <td width="100" align="right"><input name="Update_url" type="submit" class="button" id="Update_url" value="Update." onfocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset>
	</td>
  </tr>
</table>
</form>';
?>