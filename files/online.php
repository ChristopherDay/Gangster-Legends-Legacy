
<fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Players online in the past 5 minutes.</legend>
<?php

$friends_list = explode("-", $friends);

$sql = "SELECT name,donated FROM login WHERE DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive ORDER BY id ASC";
$query = mysql_query($sql) or die(mysql_error());
$count = mysql_num_rows($query);
$i = 1;
while($row = mysql_fetch_object($query)) {
 $online_name = htmlspecialchars($row->name);
 $online_donated = htmlspecialchars($row->donated);

$class = "normal_online";
if($online_donated == 2){ $class = "silver_online"; }
if($online_donated == 3){ $class = "gold_online"; }
if($online_donated == 4){ $class = "platinum_online"; }
if (in_array($online_name, $friends_list)) {$class = "friend_online";}
if (in_array($online_name, $admin_array)) {$class = "admin_online";}
if (in_array($online_name, $manager_array)) {$class = "mod_online";}
if (in_array($online_name, $hdo_array)) {$class = "hdo_online";}

  echo "<a href=\"page.php?page=view_profile&name=". $online_name ."\" onFocus=\"if(this.blur)this.blur()\"><span class = ".$class.">".$online_name."</span></a>";
 
 if($i != $count) {
  echo "<label> - </label>";
 }
 $i++;
}
echo "<center>Total Online: ".$count."</center>";
?>
</fieldset>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 400px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Online Information.</legend>
<table width="400" border="0" cellspacing="0">
  <tr>
    <td align="left">
	  <b>Administrators</b> will be shown in <b class="admin_online">Lime Green.</b><br />
	  <b>managers</b> will be shown in <b class="mod_online">blue.</b><br />
	  <b>Help Desk Operators</b> will be shown in <b class="hdo_online">Pink.</b><br />
      <b>Silver Accounts</b> will be shown in <b class="silver_online">Silver.</b><br />
      <b>Gold Accounts</b> will be shown in <b class="gold_online">Gold.</b><br />
      <b>Platinum Accounts</b> will be shown in <b class="platinum_online">Black.</b><br />
      <b>Your friends</b> will be shown in <b class="friend_online">Orange.</b><br />
      <b>Other Members</b> will be shown in <b class="normal_online">White.</b></td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="center"><b>Most Online:</b> 
	<?php 
		
		// most online check and update.

$query = "SELECT max_online FROM sitestats WHERE id='1'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

if($count > $row['max_online']){

$result = mysql_query("UPDATE sitestats SET max_online='".mysql_real_escape_string($count)."' WHERE id='1'") 
or die(mysql_error());

$row['max_online'] = $count;
}

echo $row['max_online'];
		
		?></td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><b>Administrators:</b> <?php
	
			$i = 1;
			foreach( $admin_array as $key => $value){
			echo "<a href=\"page.php?page=view_profile&name=". $value ."\" onFocus=\"if(this.blur)this.blur()\">".$value."</a> ";
			
			 	if($i != count($admin_array)) {
 					echo " - ";
 				}
 					$i++;
			}
	
	 ?></td>
  </tr>
  <tr>
    <td align="left"><b>Managers:</b>
      <?php
	
			$i = 1;
			foreach( $manager_array as $key => $value){
			echo "<a href=\"page.php?page=view_profile&name=". $value ."\" onFocus=\"if(this.blur)this.blur()\">".$value."</a> ";
			
			 	if($i != count($manager_array)) {
 					echo " - ";
 				}
 					$i++;
			}
	
	 ?></td>
  </tr>
  <tr>
    <td align="left"><b>Help Desk Operators:</b>
      <?php
	
			$i = 1;
			foreach( $hdo_array as $key => $value){
			echo "<a href=\"page.php?page=view_profile&name=". $value ."\" onFocus=\"if(this.blur)this.blur()\">".$value."</a> ";
			
			 	if($i != count($hdo_array)) {
 					echo " - ";
 				}
 					$i++;
			}
	
	 ?></td>
  </tr>
</table>
</fieldset>
