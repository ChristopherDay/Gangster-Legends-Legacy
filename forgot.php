<?php 
include_once("safe/config.php");
include_once("safe/connect.php");
include 'theme/indextop.php';


echo '<form method="post">
      <br />
	  <table width="350" border="0" align="center" cellspacing="0">
    <tr>
      <td colspan="2" align="center">'; 

	  
	  if(isset($_POST['Submit'])){
	  
	  $sql = "SELECT status FROM sitestats WHERE id='1'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$page_status = htmlspecialchars($row->status);
$page_status_array = explode("-", $page_status);

if(!empty($page_status_array[33])){
echo htmlspecialchars(stripslashes($page_status_array[33]));
}else{
	  
	  $nsql = "SELECT mail,name FROM login WHERE name='".mysql_real_escape_string($_POST['name'])."'";
$query = mysql_query($nsql) or die(mysql_error());
$row = mysql_fetch_object($query);
$name = htmlspecialchars($row->name);
$mail = htmlspecialchars($row->mail);
	  
	  if((empty($_POST['name'])) or (empty($_POST['mail']))){
	  echo "You left one or more fields empty.";
	  }else{
	  
	  if(empty($name)){
	  echo "Invalid information.";
	  }else{
	  
	  if($_POST['mail'] != $mail){
	  echo "Invalid information.";
	  }else{
	  
	  for ($i = 0; $i < 10; $i++) {
$pnum[$i] = rand(0,9);
}

$new_pass = "$pnum[0]$pnum[1]$pnum[2]$pnum[3]$pnum[4]$pnum[5]$pnum[6]$pnum[7]$pnum[8]$pnum[9]";
	  
	  $bericht  = "Your password has been Reset. Please change it to your own ASAP.\n\n";
      $bericht .= "Password: ".$new_pass."\n";
	  $bericht .= "Special Execution Password: ".$new_pass."\n";
      $mail = mail($mail,"Welcome to ".$site_name,$bericht,"From: ".$site_name." <".$site_mail.">");
	  
	  $new_pass = md5($new_pass);
	  $result = mysql_query("UPDATE login SET password='".$new_pass."', login_count='0' WHERE name='" .mysql_real_escape_string($name). "'") 
or die(mysql_error());
	  
	  echo "Your password has been changed check you mail for your new password.";
		
		}// if invalid email.
		}// if invalid name
	  	}// if empty field.
		}// if dissabled.
	  	}// if isset.
	  echo '</td>
    </tr>
	
    <tr>
      <td width="75" align="left">Username:</td>
      <td width="275" align="center"><input name="name" type="text" class="entryfield" id="name" style=\'width: 95%;\' size="20"/></td>
    </tr>
    <tr>
      <td width="75" align="left">Email:</td>
      <td width="275" align="center"><input name="mail" type="text" class="entryfield" id="mail" style=\'width: 95%;\'/></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100" border="0" align="right" cellspacing="0">
          <tr>
            <td align="center"><input name="Submit" type="submit" class="button" value="Submit"onfocus="if(this.blur)this.blur()" /></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>';



include 'theme/indexbottom.php';

?>