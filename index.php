<?php 
include_once("safe/config.php");
include_once("safe/connect.php");

if(isset($_POST['submit'])) {

$sql = "SELECT status,admins_ip FROM sitestats WHERE id='1'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$page_status = htmlspecialchars($row->status);
$page_status_array = explode("-", $page_status);
$admins_ip = htmlspecialchars($row->admins_ip);
$admin_ip_array = explode("-", $admins_ip);

if(!empty($page_status_array[31]) and !in_array($_SERVER['REMOTE_ADDR'], $admin_ip_array)){
$e= htmlspecialchars(stripslashes($page_status_array[31]));
}else{

if(!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,6}$/i", $_POST['mail'])) {
$e= "Invalid Password / Username combination.";
}else{

$query = "SELECT password,id,login_ip,login_count FROM login WHERE mail='".mysql_real_escape_string($_POST['mail'])."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

if(empty($row['id'])){
$e= "Invalid Password / Username combination.";
}else{

if($row['login_count'] >= 5 ){
$e= "You have tried 5 or more false combinations you can reclaim your account with the forgot password option.";
}else{

if(md5($_POST['pass']) != $row['password']){
$e= "Invalid Password / Username combination.";

$update_login = mysql_query("UPDATE login SET login_count=login_count+'1' WHERE mail='".mysql_real_escape_string($_POST['mail'])."'")
or die(mysql_error());

}else{

		if(empty($row['login_ip'])){
		$row['login_ip'] = $_SERVER['REMOTE_ADDR'];
		}else{
		
		$ip_information = explode("-", $row['login_ip']);
		
		if (in_array($_SERVER['REMOTE_ADDR'], $ip_information)) {	
		$row['login_ip'] = $row['login_ip'];
		}else{	
		$row['login_ip'] = $row['login_ip']."-".$_SERVER['REMOTE_ADDR'];
		}
		}

$_SESSION['user_id'] = $row['id'];
 
$result = mysql_query("UPDATE login SET userip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."',login_ip='".mysql_real_escape_string($row['login_ip'])."',login_count='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());

header("Location: page.php?page=news");
exit;
echo '';
}// count check.
}// id check.
}// password check.
}// mail check.
}// disabled check.
}// if isset submit.

include 'theme/indextop.php';

if(isset($_SESSION['user_id']) && $_GET['logout']) {
// if already logged in.
session_unset();
session_destroy(); 
echo "You have been logged out.";
}
if (isset($e)) {echo $e;}

    
echo '<form action="" method="post" name="login" id="login">
	 <table width="450" border="0" align="center" cellspacing="0">
		<tr>
		<td colspan="4" align="center"><strong>demo Account:</strong> EMail:<em>demo@demo.com</em> Pass:<em>123456</em></td>
		</tr>	 
        <tr>
          <td align="right" class="style1"><label>Email: </label></td>
          <td width="150" align="center"><input name="mail" type="text" class="entryfield" id="mail" style=\'width: 95%;\'/></td>
          <td width="60" align="right" class="style1"><label>Password: </label></td>
          <td width="150" align="center"><input name="pass" type="password" class="entryfield" id="pass" style=\'width: 95%; \' maxlength="20"/></td>
        </tr>
        <tr>
          <td height="35" colspan="4" align="center"><table width="100" border="0" cellspacing="0">
              <tr>
                <td align="center"><input name="submit" type="submit" class="button" value="Login." onFocus="if(this.blur)this.blur()" style="background-color:#222222;"/></td>
              </tr>
          </table></td>
        </tr>
      </table>
    </form>';

	
include 'theme/indexbottom.php';

?>