<form method="post">
<?php if (in_array($name, $admin_array)){ 

if(isset($_POST['Add_admin'])){

if(empty($_POST['admin'])){
echo "You didn't enter a name.";
}else{

if (in_array($_POST['admin'], $admin_array)) {
   echo "This person is already a admin.";
}else{

$sql = "SELECT name FROM login WHERE name='".mysql_real_escape_string($_POST['admin'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$buddy_name = htmlspecialchars($row->name);

if(empty($buddy_name)){
echo $lang_no_user;
}else{

if(empty($admins)){

$result = mysql_query("UPDATE sitestats SET admins='".mysql_real_escape_string($buddy_name)."' ,admins_ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."' WHERE id='1'") 
or die(mysql_error());

$admins = $buddy_name;

}else{

$new_friend = $admins."-".$buddy_name;
$new_ip = $admins_ip."-".$_SERVER['REMOTE_ADDR'];

$result = mysql_query("UPDATE sitestats SET admins='".mysql_real_escape_string($new_friend)."' ,admins_ip='".mysql_real_escape_string($new_ip)."' WHERE id='1'") 
or die(mysql_error());

$admins = $new_friend;

}

echo "You added ".$buddy_name." as new admin.";

}// if empty field.
}// if exist check.
}// if already in check.
}// if isset.

if(isset($_POST['Remove_admin'])){

if(empty($_POST['admin_name'])){
echo "You didn't select a person to demote from admin.";
}else{

if (!in_array($_POST['admin_name'], $admin_array)) {
   echo "This person isn't a admin.";
}else{

$new_friends = "";
foreach( $admin_array as $key => $value){
if($value != $_POST['admin_name']){
if(empty($new_friends)){
$new_friends = $value;
}else{
$new_friends = $new_friends."-".$value;
}
}
}

$new_ip = "";
foreach( $admin_ip_array as $key => $value){
if($value != $_POST['admin_name']){
if(empty($new_ip)){
$new_ip = $value;
}else{
$new_ip = $new_ip."-".$value;
}
}
}

$result = mysql_query("UPDATE sitestats SET admins='".mysql_real_escape_string($new_friends)."' ,admins_ip='".mysql_real_escape_string($new_ip)."' WHERE id='1'") 
or die(mysql_error());

$admins = $new_friends;

echo "You removed ".$_POST['admin_name']." from his admin position.";

}// if no friend selected.
}// if not in friendslist.
}// if isset.

if(isset($_POST['Add_manager'])){

if(empty($_POST['manager'])){
echo "You didn't enter a name.";
}else{

if (in_array($_POST['manager'], $manager_array)) {
   echo "This person is already a manager.";
}else{

$sql = "SELECT name FROM login WHERE name='".mysql_real_escape_string($_POST['manager'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$buddy_name = htmlspecialchars($row->name);

if(empty($buddy_name)){
echo $lang_no_user;
}else{

if(empty($managers)){

$result = mysql_query("UPDATE sitestats SET managers='".mysql_real_escape_string($buddy_name)."' ,managers_ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."' WHERE id='1'") 
or die(mysql_error());

$managers = $buddy_name;

}else{

$new_friend = $managers."-".$buddy_name;
$new_ip = $managers_ip."-".$_SERVER['REMOTE_ADDR'];

$result = mysql_query("UPDATE sitestats SET managers='".mysql_real_escape_string($new_friend)."' ,managers_ip='".mysql_real_escape_string($new_ip)."' WHERE id='1'") 
or die(mysql_error());

$managers = $new_friend;

}

echo "You added ".$buddy_name." to your managers team.";

}// if empty field.
}// if exist check.
}// if already in check.
}// if isset.

if(isset($_POST['Remove_manager'])){

if(empty($_POST['manager_name'])){
echo "You didn't select a person to demote from manager.";
}else{

if (!in_array($_POST['manager_name'], $manager_array)) {
   echo "This person isn't a manager.";
}else{

$new_friends = "";
foreach( $manager_array as $key => $value){
if($value != $_POST['manager_name']){
if(empty($new_friends)){
$new_friends = $value;
}else{
$new_friends = $new_friends."-".$value;
}
}
}

$new_ip = "";
foreach( $manager_ip_array as $key => $value){
if($value != $_POST['manager_name']){
if(empty($new_ip)){
$new_ip = $value;
}else{
$new_ip = $new_ip."-".$value;
}
}
}

$result = mysql_query("UPDATE sitestats SET managers='".mysql_real_escape_string($new_friends)."' ,managers_ip='".mysql_real_escape_string($new_ip)."' WHERE id='1'") 
or die(mysql_error());

$managers = $new_friends;

echo "You removed ".$_POST['manager_name']." from your manager team.";

}// if no friend selected.
}// if not in friendslist.
}// if isset.

if(isset($_POST['Add_hdo'])){

if(empty($_POST['hdo'])){
echo "You didn't enter a name.";
}else{

if (in_array($_POST['hdo'], $hdo_array)) {
   echo "This person is already a hdo.";
}else{

$sql = "SELECT name FROM login WHERE name='".mysql_real_escape_string($_POST['hdo'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$buddy_name = htmlspecialchars($row->name);

if(empty($buddy_name)){
echo $lang_no_user;
}else{

if(empty($hdo)){

$result = mysql_query("UPDATE sitestats SET hdo='".mysql_real_escape_string($buddy_name)."' WHERE id='1'") 
or die(mysql_error());

$hdo = $buddy_name;

}else{

$new_hdo = $hdo."-".$buddy_name;

$result = mysql_query("UPDATE sitestats SET hdo='".mysql_real_escape_string($new_hdo)."' WHERE id='1'") 
or die(mysql_error());

$hdo = $new_friend;

}

echo "You added ".$buddy_name." to your hdo team.";

}// if empty field.
}// if exist check.
}// if already in check.
}// if isset.

if(isset($_POST['Remove_hdo'])){

if(empty($_POST['hdo_name'])){
echo "You didn't select a person to demote from hdo.";
}else{

if (!in_array($_POST['hdo_name'], $hdo_array)) {
   echo "This person isn't a hdo.";
}else{

$new_friends = "";
foreach( $hdo_array as $key => $value){
if($value != $_POST['hdo_name']){
if(empty($new_friends)){
$new_friends = $value;
}else{
$new_friends = $new_friends."-".$value;
}
}
}

$result = mysql_query("UPDATE sitestats SET hdo='".mysql_real_escape_string($new_friends)."' WHERE id='1'") 
or die(mysql_error());

$hdo = $new_friends;

echo "You removed ".$_POST['manager_name']." from your hdo team.";

}// if no friend selected.
}// if not in friendslist.
}// if isset.


?>

<table width="600" border="0" align="center" cellspacing="0">
  
  <tr>
    <td align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
      <legend style="color: #999999; font-weight: bold;">Admin list.</legend>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <td colspan="4" align="center"><hr class="hr" /></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><?php
	
	if(empty($admins)){
	echo "There are no admins.";
	}else{
	
	$admins_list = explode("-", $admins);
	 		  
foreach( $admins_list as $key => $value){
	echo "<input name=\"admin_name\" type=\"radio\" value=\"".$value."\" onFocus=\"if(this.blur)this.blur()\"><a href=\"view_profile.php?name=". $value ."\">".$value."</a>";

}		
}// if no friends.  
		  ?></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><hr class="hr" /></td>
        </tr>
        <tr>
          <td width="50" align="left"><b>Name:</b></td>
          <td align="center"><input name="admin" type="text" class="entryfield" id="admin" style='width: 95%; ' maxlength="20" /></td>
          <td width="100" align="right"><input name="Add_admin" type="submit" class="button" id="Add_admin" value="Add." onfocus="if(this.blur)this.blur()" /></td>
          <td width="100" align="right"><input name="Remove_admin" type="submit" class="button" id="Remove_admin" value="Remove." onfocus="if(this.blur)this.blur()"/></td>
        </tr>
      </table>
    </fieldset></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
      <legend style="color: #999999; font-weight: bold;">Manager list.</legend>
      </textarea>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <td colspan="4" align="center"><hr class="hr" /></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><?php
	
	if(empty($managers)){
	echo "You don't have any managers.";
	}else{
	
	$managers_list = explode("-", $managers);
	 		  
foreach( $managers_list as $key => $value){
	echo "<input name=\"manager_name\" type=\"radio\" value=\"".$value."\" onFocus=\"if(this.blur)this.blur()\"><a href=\"view_profile.php?name=". $value ."\">".$value."</a>";
}		
}// if no friends.  
		  ?></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><hr class="hr" /></td>
        </tr>
        <tr>
          <td width="50" align="left"><b>Name:</b></td>
          <td align="center"><input name="manager" type="text" class="entryfield" id="manager" style='width: 95%; ' maxlength="20" /></td>
          <td width="100" align="right"><input name="Add_manager" type="submit" class="button" id="Add_manager" onfocus="if(this.blur)this.blur()" value="Add." /></td>
          <td width="100" align="right"><input name="Remove_manager" type="submit" class="button" id="Remove_manager" value="Remove." onfocus="if(this.blur)this.blur()"/></td>
        </tr>
      </table>
    </fieldset></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
      <legend style="color: #999999; font-weight: bold;">Hdo list.</legend>
      </textarea>
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <td colspan="4" align="center"><hr class="hr" /></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><?php
	
	if(empty($hdo)){
	echo "You don't have any hdo's.";
	}else{
	
	$hdo_list = explode("-", $hdo);
	 		  
foreach( $hdo_list as $key => $value){
	echo "<input name=\"hdo_name\" type=\"radio\" value=\"".$value."\" onFocus=\"if(this.blur)this.blur()\"><a href=\"view_profile.php?name=". $value ."\">".$value."</a>";
}		
}// if no friends.  
		  ?></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><hr class="hr" /></td>
        </tr>
        <tr>
          <td width="50" align="left"><b>Name:</b></td>
          <td align="center"><input name="hdo" type="text" class="entryfield" id="hdo" style='width: 95%; ' maxlength="20" /></td>
          <td width="100" align="right"><input name="Add_hdo" type="submit" class="button" id="Add_hdo" onfocus="if(this.blur)this.blur()" value="Add." /></td>
          <td width="100" align="right"><input name="Remove_hdo" type="submit" class="button" id="Remove_hdo" value="Remove." onfocus="if(this.blur)this.blur()"/></td>
        </tr>
      </table>
    </fieldset></td>
  </tr>
</table>
</form>
<?php } ?>

