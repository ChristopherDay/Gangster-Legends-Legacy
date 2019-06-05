<script type="text/javascript"> 

// ADDTEXT 
function smile(field,text) 
{ 
    document.messageform.elements[field].value += " "+text+" "; 
    document.messageform.elements[field].focus(); 
} 
function addname(field,text) 
{ 
    document.messageform.elements[field].value = ""+text+""; 
} 
</script> 
<form id="messageform" name="messageform" method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Send Letter.</legend>
<table width="550" border="0" cellspacing="0">
  <tr>
    <td width="75" align="left"><b>Send to: </b></td>
    <td width="475" align="center"><input name="sendto" type="text" class="entryfield" style='width: 98%; ' value='<?php echo htmlspecialchars($_GET['name']);?>' maxlength="110" /></td>
  </tr>
  <tr>
    <td width="75" align="left" valign="top"><b>Message: </b></td>
    <td width="475" align="center"><textarea name="message" rows="10" class="textbox"style='width: 98%; '><?php 

if($_GET['action'] == "helpdesk" and (in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array))){

$sql = "SELECT help_desk FROM login WHERE name='".mysql_real_escape_string($_GET['name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$help_desk = htmlspecialchars($row->help_desk);

echo "

[hr][b]Your questions was:[/b]

".stripslashes($help_desk);

}


if (!empty($_GET['reply'])){

$query = "SELECT * FROM pm WHERE id='".mysql_real_escape_string($_GET['reply'])."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

if($row['sendto'] != $name){
echo "You are not allowed to view this information.";}
else {
echo "

";// empty line at reply.
echo "[b]".htmlspecialchars($row['sendby'])." wrote:[/b]";
echo "
";
echo htmlspecialchars(stripslashes($row['message']));
}// if not your reply.
}
	?></textarea></td>
  </tr>
</table>
<table width="550" border="0" cellspacing="0">
    <?php   
  if(!empty($friends)){ ?>
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><?php
			$friends = explode("-", $friends);
			$i = 1;

foreach( $friends as $key => $value){
	echo "<a href=\"javascript:addname('sendto','".$value."')\" onFocus=\"if(this.blur)this.blur()\">".$value."</a> 
";

			 	if($i != count($friends)) {
 					echo " || ";
 				}
 					$i++;

	}
		  
		  ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
    </tr>
	<?php } ?>
  <tr>
    <td align="right"><?php smilielist(); // function to show the smilies.?></td>
    <td width="100" align="right"><input name="Send" type="submit" class="button" value="Send."  onFocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset>
<br />
** Send up to 5 people. Separate there names with a dash. **
</form>