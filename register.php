<?php 
include_once("safe/config.php");
include_once("safe/connect.php"); 
include 'theme/indextop.php';

echo '
<form id="register" name="register" method="post" action="">
  <table width="400" border="0" align="center" cellspacing="0">
    <tr>
      <td height="20" colspan="2" align="center" valign="middle">';


if(isset($_POST['Register'])){

$sql = "SELECT status FROM sitestats WHERE id='1'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$page_status = htmlspecialchars($row->status);
$page_status_array = explode("-", $page_status);

if(!empty($page_status_array[32])){
echo htmlspecialchars(stripslashes($page_status_array[32]));
}else{

if ((strlen($_POST['password']) > "20") or (strlen($_POST['password']) < "6")){
echo "Your Password needs to be between 6 and 20 characters long.";
}else{

if ((strlen($_POST['name']) > "20") or (strlen($_POST['name']) < "2")){
echo "Your name needs to be between 2 and 20 characters long.";
}else{

if($_POST['mail'] != $_POST['mail_check']){
echo "The 2 given email's didn't match.";
}else{

if($_POST['password'] != $_POST['password_check']){
echo "The 2 given Passwords's didn't match.";
}else{

if(empty($_POST['tos'])){
echo "You need to accept the Terms of Service in order to play Gangster Basics.";
}else{

$sql = "SELECT id FROM login WHERE name='".mysql_real_escape_string($_POST['name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$count = mysql_num_rows($query);
	  
if($count >= "1"){
echo "This username is already taken.";
}else{

$sql = "SELECT id FROM login WHERE mail='".mysql_real_escape_string($_POST['mail'])."'";
$query = mysql_query($sql) or die(mysql_error());
$m_count = mysql_num_rows($query);
	  
if($m_count >= "1"){
echo "This email has already been used.";
}else{

if(!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,6}$/i", $_POST['mail'])) {
echo "Please use a valid email address.";
}else{

if (ereg('[^A-Za-z0-9]', $_POST['name'])) {
echo "Invalid Name only A-Z,a-z and 0-9 is allowed.";
}else{

if (ereg('[^A-Za-z0-9]', $_POST['ref'])) {
echo "Invalid Name only A-Z,a-z and 0-9 is allowed.";
}else{

$sql = "SELECT id FROM login WHERE name='".mysql_real_escape_string($_POST['ref'])."'";
$query = mysql_query($sql) or die(mysql_error());
$a_count = mysql_num_rows($query);
	  
if(empty($a_count) and !empty($_POST['ref'])){
echo "Your referral does not play this game.";
}else{

if(($_POST['location'] > "9") or ( $_POST['location'] < "1")){
echo "Invalid Location.";
}else{
if (!$chars[$_POST['char']]) {
echo "There was an error with your character selection!";
} else {
$pass = md5($_POST['password']);

$sql = "INSERT INTO `login` SET `id`='', `name`='".mysql_real_escape_string($_POST['name'])."', `signup`=NOW(), `password`='".mysql_real_escape_string($pass)."', `state`='0', `mail`='".mysql_real_escape_string($_POST['mail'])."', `location`='".mysql_real_escape_string($_POST['location'])."', `signup_ip`='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."', `ref`='".mysql_real_escape_string($_POST['ref'])."', `char`=".$_POST['char'];
$res = mysql_query($sql);
echo mysql_error();
// send email.

	  $bericht  = "Your account has been activated and your personal information is posted below.\n\n";
      $bericht .= "Username: ".$_POST['name']."\n";
      $bericht .= "Password: ".$_POST['password']."\n";
      $mail = mail($_POST['mail'],"Welcome to ".$site_name,$bericht,"From: ".$site_name." <".$site_mail.">");

echo "Thank you for joining. Your account has been activated.";
} // character check 
}}// referrals check.
}// check if email is used.
}// check if the 2 passwords match.
}// check if valid location.
}// check name characters.
}// check if valid email.
}// check if name is unused.
}// check if accepted to the tos.
}// check if 2 mails are the same.
}// name check.
}// password check.
}// if disabled.
}// if post register.

echo '</td>
    </tr>
    
    <tr>
      <td colspan="2" align="left"><strong>Account Information: </strong></td>
    </tr>
    <tr>
      <td width="130" align="left"><label>Username:</label></td>
      <td align="center"><input name="name" type="text" class="entryfield" id="name" style=\'width: 98%;\' maxlength="20" /></td>
    </tr>
    <tr>
      <td width="130" align="left"><label>Email:</label></td>
      <td align="center"><input name="mail" type="text" class="entryfield" id="mail" style=\'width: 98%;\' /></td>
    </tr>
    <tr>
      <td width="130" align="left">Repeat:</td>
      <td align="center"><input name="mail_check" type="text" class="entryfield" id="mail_check" style=\'width: 98%;\' /></td>
    </tr>
    <tr>
      <td width="130" align="left"><label>Password:</label></td>
      <td align="center"><input name="password" type="password" class="entryfield" id="password" style=\'width: 98%;\' maxlength="20" /></td>
    </tr>
    <tr>
      <td width="130" align="left">Repeat:</td>
      <td align="center"><input name="password_check" type="password" class="entryfield" id="password_check" style=\'width: 98%;\' maxlength="20" /></td>
    </tr>
    <tr>
      <td align="left">Referral:</td>
      <td align="center"><input name="ref" type="text" class="entryfield" id="ref" style=\'width: 98%;\' value="'.$_GET['ref'].'" maxlength="20" /></td>
    </tr>
    <tr>
      <td width="130" align="left"> Location:</td>
      <td align="center"><select name="location" class="entryfield" id="location">
<option value="1">London.</option>
<option value="2">Rome.</option>
<option value="3">Tokyo.</option>
<option value="4">Paris.</option>
<option value="5">Chicago.</option>
<option value="6">Sydney.</option>
<option value="7">Madrid.</option>
<option value="8">Hong Kong.</option>
<option value="9">Moscow.</option></select>      </td>
    </tr>
	<tr>
      <td width="130" align="left"> Character:</td>
      <td align="center">
	  <select name="char" class="entryfield" id="char">';
	  $i=0;
	  foreach ($chars as $var) {
		echo '<option value="'.$i.'">'.$var.'</option>';
	    $i++;
	  }
	  
	 echo '</select>      	
	</td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="130" align="left"><a onClick="tos()">
        <label>Terms of Service:</label>
      </a></td>
      <td align="left"><input name="tos" type="checkbox" id="terms" value="true" onFocus="if(this.blur)this.blur()"/>
          <label for="terms">I have read and agree to the Terms of Service.</label></td>
    </tr>
    
    <tr>
      <td colspan="2" align="right"><input name="Register" type="submit" class="button" id="Register" value="Register." onfocus="if(this.blur)this.blur()"/>      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="tos.php" target="_blank" onfocus="if(this.blur)this.blur()">Terms of Service.</a></td>
    </tr>
    <tr>
      <td colspan="2" align="right">&nbsp;</td>
    </tr>
  </table>
    </form>';
	
include 'theme/indexbottom.php';

?>
