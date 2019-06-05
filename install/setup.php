<?php include('../safe/connect.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Setup.</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
h1 {
	font-size: 14px;
	color: #333333;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td><h1>Create first Admin. </h1></td>
    </tr>
    <tr>
      <td align="left"><?php
	  
	 if(isset($_POST['Admin'])){
	 	if(!empty($_POST['admin_name'])){
			if(!ereg('[^A-Za-z0-9]', $_POST['admin_name'])){
$sql = "SELECT name FROM login WHERE name='".mysql_real_escape_string($_POST['admin_name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$name = htmlspecialchars($row->name);
$count = mysql_num_rows($query);					
				if($count == 1){
					
$sql = "INSERT INTO sitestats SET id = '1', admins='".mysql_real_escape_string($name)."'";
$res = mysql_query($sql);	

echo $name." has been set as first admin.";				
					
				}else{
					echo "Please create your admin account in the game first.";
				}
			}else{
				echo "Invalid Name only A-Z,a-z and 0-9 is allowed.";
			}
		}else{
			echo "You didn't enter a name to be set as admin.";	
		}
	 }
	  
	  ?></td>
    </tr>
    <tr>
      <td><input name="admin_name" type="text" id="admin_name" /></td>
    </tr>
    <tr>
      <td align="left"><input name="Admin" type="submit" id="Admin" value="Create." /></td>
    </tr>
    <tr>
      <td><h1>Create Locations. </h1></td>
    </tr>
    <tr>
      <td align="left"><?php
	  
	 if(isset($_POST['locations'])){
		for ( $i = 1; $i <= 9; $i++) {
			$sql = "INSERT INTO location SET id = '".$i."'";
			$res = mysql_query($sql);
		}	 	 
			echo "All nine locations have been created.";
	 }
	  
	  ?></td>
    </tr>
    <tr>
      <td align="left"><input name="locations" type="submit" id="locations" value="Create." /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><h1>Delete this file after setup. </h1></td>
    </tr>
  </table>
</form>
</body>
</html>
