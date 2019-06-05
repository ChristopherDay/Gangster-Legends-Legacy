<?php

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome.</title>
<link href="theme/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #222222;
}
-->
</style></head>

<body OnLoad="document.login.mail.focus();">
<div align="center">
<table width="800" border="0" align="center" cellspacing="0">
  
  <tr>
    <td><table border="0" align="center" cellspacing="2">
      <tr>
        <td class="off" onmouseover="this.className=\'on\'" onmouseout="this.className=\'off\'" onclick="location.href=\'index.php\'"><a href="index.php" onFocus="if(this.blur)this.blur()">Login.</a></td>
        <td class="off" onmouseover="this.className=\'on\'" onmouseout="this.className=\'off\'" onclick="location.href=\'register.php\'"><a href="register.php" onFocus="if(this.blur)this.blur()">Register.</a></td>
        <td class="off" onmouseover="this.className=\'on\'" onmouseout="this.className=\'off\'" onclick="location.href=\'forgot.php\'"><a href="forgot.php" onFocus="if(this.blur)this.blur()">Forgot Password.</a></td>
		<td class="off" onmouseover="this.className=\'on\'" onmouseout="this.className=\'off\'" onclick="location.href=\'screenshots.php\'"><a href="screenshots.php" onFocus="if(this.blur)this.blur()">Screenshots.</a></td>
		 </tr>
    </table></td>
  </tr>';
  
if (!isset($nopic)) {  
  echo '<tr>
    <td height="250" align="center" valign="middle"><img src="img/index.jpg" alt="Gangster legends" />
    </td>';
} else {
	echo '<br />';
}
  echo '</tr>
  <tr>
    <td align="center" valign="bottom"><form action="" method="post" name="login" id="login">';
	
?>