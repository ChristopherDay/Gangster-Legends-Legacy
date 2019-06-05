<form method="post">
<?php if (in_array($name, $admin_array) or in_array($name, $manager_array)){ ?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Site Statistics.</legend>
<table width="600" border="0" align="center" cellspacing="0">
  
  <tr>
    <td width="35%" align="left"><b>Total Members:</b></td>
    <td width="65%" align="left"><?php

$res = "SELECT name FROM login";
$tquery = mysql_query($res) or die(mysql_error());
$total_members = mysql_num_rows($tquery);
echo number_format($total_members);
?></td>
  </tr>
  <tr>
    <td align="left"><b>Members Dead:</b></td>
    <td align="left"><?php 
	
$res = "SELECT name FROM login WHERE sitestate='2'";
$tquery = mysql_query($res) or die(mysql_error());
$totalmembers = mysql_num_rows($tquery);
echo number_format($totalmembers);
	?></td>
  </tr>
  <tr>
    <td align="left"><b>Members Alive:</b></td>
    <td align="left"><?php 

$res = "SELECT name FROM login WHERE sitestate='9'";
$tquery = mysql_query($res);
$totalmembers = mysql_num_rows($tquery);
	
$tres = "SELECT name FROM login WHERE sitestate='0'";
$ttquery = mysql_query($tres);
$atotalmembers = mysql_num_rows($ttquery);
$ttotalmembers= $atotalmembers + $totalmembers;
echo number_format($ttotalmembers);
	
	?></td>
  </tr>
  <tr>
    <td align="left"><b>Members Banned:</b></td>
    <td align="left"><?php 
	
$res = "SELECT name FROM login WHERE sitestate='1'";
$tquery = mysql_query($res);
$totalmembers = mysql_num_rows($tquery);
echo number_format($totalmembers);
	
	?></td>
  </tr>
  <tr>
    <td align="left"><b>Bullets:</b></td>
    <td align="left"><?php 
	
$query = "SELECT SUM(ammo) FROM login WHERE state='0'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
echo number_format($row['SUM(ammo)']);
	
	?></td>
  </tr>
  <tr>
    <td align="left"><b>Credits:</b></td>
    <td align="left"><?php 
	
$query = "SELECT SUM(credits) FROM login WHERE state='0'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
echo number_format($row['SUM(credits)']);
	
	?></td>
  </tr>
  <tr>
    <td align="left"><b>Swiss bank:</b></td>
    <td align="left"><?php 
	
$query = "SELECT SUM(amount) FROM swiss_bank"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$swiss_bank = $row['SUM(amount)'];
echo "$ ".number_format($row['SUM(amount)']).",-";
	
	?></td>
  </tr>
  <tr>
    <td width="35%" align="left"><b>Total Cash:</b></td>
    <td width="65%" align="left"><?php 
	
$query = "SELECT SUM(money) FROM login WHERE sitestate='0'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$cash = $row['SUM(money)'];
echo "$ ".number_format($row['SUM(money)']).",-";
	
	?></td>
  </tr>
  <tr>
    <td width="35%" align="left"><b>Total Gang Money:</b></td>
    <td width="65%" align="left"><?php 
	
$query = "SELECT SUM(bank) FROM gangs"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$gang_money = $row['SUM(bank)'];
echo "$ ".number_format($row['SUM(bank)']).",-";
	
	?></td>
  </tr>
  
  <tr>
    <td width="35%" align="left"><b>Total Money:</b></td>
    <td width="65%" align="left"><?php 
echo "$ ".number_format($cash + $gang_money + $swiss_bank).",-";
	
	?></td>
  </tr>
  <tr>
    <td width="35%" align="left"><b>Most members Online:</b></td>
    <td width="65%" align="left"><?php 

$query = "SELECT max_online FROM sitestats WHERE id='1'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

echo $row['max_online'];
		
		?></td>
  </tr>
</table>
</fieldset>
</form>
<?php } ?>
