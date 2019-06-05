<br /><br />
<?php if($newmail == 0){ 
	echo "<a href='mailbox.php' onfocus=\"if(this.blur)this.blur()\"><marquee width=\"100%\">You have a new message.</marquee></a>";}	
	?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: left; padding: 5px;"><legend style="color: #999999; font-weight: bold;">Character Information. ( <?php echo date("H:i:s");  ?> )</legend>
<div style="float:left; width:24%"><b>Name:</b> <?php echo "<a href=\"view_profile.php?name=".$name."\" onFocus=\"if(this.blur)this.blur()\">".$name."</a>";?></div> 
<div style="float:left; width:24%"><b>Class:</b> <?php echo $chars[$char];?></div>
<div style="float:left; width:24%"><b>Location:</b> <?php echo $location_array[$location];?></div> 
<div style="float:left; width:24%"><b>Money:</b> <?php echo "$ ".number_format($money).",-";?></div> 
<div style="float:left; width:24%"><b>Credits:</b> <?php echo number_format($credits);?></div> 
<div style="float:left; width:24%"><b>Exp:</b> <?php echo number_format($exp); ?></div> 
<div style="float:left; width:24%"><b>Health:</b> <?php echo $health."%"; ?></div> 
<div style="float:left; width:24%"><b>Rank:</b> <?php echo $rank_array[$rank];?></div> 
<div style="float:left; width:24%"><b>Weapon:</b> <?php echo $gun_array[$weapon];?></div> 
<div style="float:left; width:24%"><b>Bullets:</b> <?php echo number_format($ammo);?></div> 
<div style="float:left; width:24%"><b>Protection:</b> <?php echo $protection_array[$armor];?></div>
<div style="float:left; width:24%"><b>Gang:</b> <?php 
	if(empty($gang)){ echo $lang_no_gang; }else{ echo "<a href=\"view_gang.php?name=". $gang ."\" onFocus=\"if(this.blur)this.blur()\" >".$gang."</a>"; }?>
</div>
</fieldset><br />
<?php if (in_array($name, $admin_array)){
	   echo "|| <a href=\"staff.php?page=stats\" onFocus=\"if(this.blur)this.blur()\">Site Statistics</a> || 
<a href=\"staff.php?page=help_desk_reply\" onFocus=\"if(this.blur)this.blur()\">Help Desk</a> || 
<a href=\"staff.php?page=staff\" onFocus=\"if(this.blur)this.blur()\">Staff</a> ||
<a href=\"staff.php?page=mail_check\" onFocus=\"if(this.blur)this.blur()\">Mail Check</a> ||
<a href=\"staff.php?page=ban\" onFocus=\"if(this.blur)this.blur()\">Ban</a> ||
<a href=\"staff.php?page=disable\" onFocus=\"if(this.blur)this.blur()\">Disable</a> || 
<a href=\"staff.php?page=settings\" onFocus=\"if(this.blur)this.blur()\">Settings</a> || "; }?>
<?php if (in_array($name, $manager_array)){
	   echo "|| 
<a href=\"staff.php?page=stats\" onFocus=\"if(this.blur)this.blur()\">Site Statistics</a> || 
<a href=\"staff.php?page=help_desk_reply\" onFocus=\"if(this.blur)this.blur()\">Help Desk</a> || 
<a href=\"mail_check\" onFocus=\"if(this.blur)this.blur()\">Mail Check</a> ||
<a href=\"staff.php?page=ban\" onFocus=\"if(this.blur)this.blur()\">Ban</a> ||
<a href=\"staff.php?page=disable\" onFocus=\"if(this.blur)this.blur()\">Disable</a> || 
 "; }?>
<?php if (in_array($name, $hdo_array)){
	   echo "|| 
<a href=\"staff.php?page=help_desk_reply\" onFocus=\"if(this.blur)this.blur()\">Help Desk</a> || ";
 }?>