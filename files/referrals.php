<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 500px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Referrals.</legend>
<table width="500" border="0" cellspacing="0">
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><b>Information:</b></td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left">The more people that play <?php echo $site_name; ?> the more fun it will be. And to make it even more attractive to tell your friends about the game you will receive $ 10,000,- for each active person that signed up with your name as referral. You will receive the gift when he ranks up to Gangster </td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  
  <tr>
    <td align="left"><b>Rewards:</b></td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><ul>
      <li>$ 10,000 for each referral that ranks up to gangster.</li>
      <li>$ 1,000,000 if you have the highest referral count at the end of the month. </li>
      <li>More fun when more people are playing. </li>
    </ul></td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><b>Rules:</b></td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><ul>
      <li>Creating dupe accounts for the reward will not be tolerated.</li>
      <li>All contestants will be checked for dupes once in a while. When dupes are found all accounts will be banned including your main account. You have been warned. </li>
    </ul></td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><b>Referral Link: </b><?php echo $_SERVER['HTTP_HOST']."/register.php?ref=".$name; ?></td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><b>Referral Count: </b><?php 
	
	$sql = "SELECT id FROM login WHERE ref='".mysql_real_escape_string($name)."'";
$query = mysql_query($sql) or die(mysql_error());
$count = mysql_num_rows($query);

echo $count;
	
	?></td>
  </tr>
</table>
</fieldset>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 450px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Referrals Top 10.</legend>
<table width="450" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td width="450"><b>Name:</b></td>
    <td width="450"><b>Referrals:</b></td>
    <td width="450"><b>Earnings:</b></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
    </tr>
	<?php

	$result = mysql_query("SELECT COUNT(name),rank,ref FROM login WHERE rank>='4' and ref!=' ' GROUP BY ref ORDER BY COUNT(name) DESC LIMIT 0,10") or die(mysql_error());
	while($row = mysql_fetch_array( $result )) {
	
	echo"<tr>
    <td width=\"150\"><a href=\"page.php?page=view_profile&name=".htmlentities($row['ref'])."\" onFocus=\"if(this.blur)this.blur()\">".htmlentities($row['ref'])."</td>
    <td width=\"150\">".htmlentities($row['COUNT(name)'])."</td>
    <td width=\"150\">$ ".htmlentities(number_format($row['COUNT(name)'] * 10000)).",-</td>
  </tr>";
	
 } // while

?>
</table>
</fieldset>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 450px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">My Referrals. ( Top 25 are shown. )</legend>
<table width="450" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td width="450"><b>Name:</b></td>
    <td width="450"><b>Rank:</b></td>
    <td width="450"><b>Last Active:</b></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
    </tr>
	<?php

	$result = mysql_query("SELECT name,rank,lastactive FROM login WHERE ref='".mysql_real_escape_string($name)."' ORDER BY rank ASC LIMIT 0,25") or die(mysql_error());
	while($row = mysql_fetch_array( $result )) {
	
	echo"<tr>
    <td width=\"150\"><a href=\"page.php?page=view_profile&name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</td>
    <td width=\"150\">".htmlentities($rank_array[$row['rank']])."</td>
    <td width=\"150\">".htmlentities($row['lastactive'])."</td>
  </tr>";
	
 } // while

?>
</table>
</fieldset>
<br />
<?php if (in_array($name, $admin_array)){

if(isset($_POST['Reset'])){

$result = mysql_query("UPDATE login SET ref=''") 
or die(mysql_error());

echo "The referrals contest has been reset.";

}

echo "<input name=\"Reset\" type=\"submit\" class=\"button\" value=\"Reset.\" onFocus=\"if(this.blur)this.blur()\"/>";
} ?>
</form>
