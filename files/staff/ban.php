<?php if (in_array($name, $admin_array) or in_array($name, $manager_array)){ 

if(isset($_POST['Ban'])){

$sql = "SELECT name,sitestate,userip FROM login WHERE name='".mysql_real_escape_string($_POST['ban_name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$banned_name = htmlspecialchars($row->name);
$banned_state = htmlspecialchars($row->sitestate);
$banned_ip = htmlspecialchars($row->userip);

if($_POST['ban_all'] == "1"){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE userip='" .mysql_real_escape_string($banned_ip). "'") 
or die(mysql_error());

echo "all have been banned.";
}else{

if (empty($banned_name)){
echo "This person does not seem to exist.";
}else {

if($banned_state == 1){
echo "This person is already banned.";
}else{

$result = mysql_query("UPDATE login SET sitestate='1' WHERE name='" .mysql_real_escape_string($banned_name). "'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($banned_name). "', banner = '" .mysql_real_escape_string($name). "', reason = '".$_POST['reason']. "'";
$res = mysql_query($sql);

echo $banned_name." has been banned.";

}// if already banned.
}// if user doesn't exist.
}// bat type select.
}// if isset Ban.

if(isset($_POST['Remove_Ban'])){

$sql = "SELECT name,sitestate,userip FROM login WHERE name='".mysql_real_escape_string($_POST['remove_ban_name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$banned_name = htmlspecialchars($row->name);
$banned_state = htmlspecialchars($row->sitestate);
$banned_ip = htmlspecialchars($row->userip);

if (empty($banned_name)){
echo "This person does not seem to exist.";
}else {

if($banned_state == 0){
echo "This person is already Un banned.";
}else{

$result = mysql_query("UPDATE login SET sitestate='0' WHERE name='" .mysql_real_escape_string($banned_name). "'") 
or die(mysql_error());

echo $banned_name." has been Un banned.";

}// if already banned.
}// if user doesn't exist.
}// if isset Ban.


?>
<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Ban Member.</legend>
<table width="350" border="0" cellspacing="0">
  <tr>
    <td align="center"><input name="ban_name" type="text" class="entryfield" id="ban_name" onfocus="if(this.value=='Name')this.value='';" value="Name" /></td>
  </tr>
  <tr>
    <td align="center"><textarea name="reason" rows="6" class="textbox" id="reason">Duping.</textarea></td>
  </tr>
  <tr>
    <td align="left"><input type="checkbox" name="ban_all" value="1" id="ban_all" />
        <label for="ban_all">Ban all on IP.</label></td>
  </tr>
  <tr>
    <td align="right"><input name="Ban" type="submit" class="button" id="Ban" value="Ban." onfocus="if(this.blur)this.blur()" />    </td>
  </tr>
</table>
</fieldset>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">UnBan Member.</legend>
<table width="350" border="0" cellspacing="0">
  <tr>
    <td align="center"><input name="remove_ban_name" type="text" class="entryfield" id="remove_ban_name" onfocus="if(this.value=='Name')this.value='';" value="Name" /></td>
  </tr>
  <tr>
    <td height="27" align="right"><input name="Remove_Ban" type="submit" class="button" id="Remove_Ban" value="Remove Ban." onfocus="if(this.blur)this.blur()" />
    </td>
  </tr>
</table>
</fieldset>
</form>
<?php } ?>
