<?php 
$sql = "SELECT * FROM gangs WHERE name='".mysql_real_escape_string($_GET['name'])."'";
$query = mysql_query($sql)  or die(mysql_error());
$row = mysql_fetch_object($query);
$gang_name = htmlspecialchars($row->name);
$gang_members = htmlspecialchars($row->members);
$gang_leader = htmlspecialchars($row->leader);
$gang_quote = htmlspecialchars($row->quote);
$gang_picture = htmlspecialchars($row->picture);

?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Profile for: <?php echo $gang_name; ?>.</legend>
<b>Leader: </b><?php echo "<a href=\"page.php?page=view_profile&name=". $gang_leader ."\" onFocus=\"if(this.blur)this.blur()\">".$gang_leader."</a>"; ?><br />
<b>Members: </b><?php echo $gang_members; ?><br />
<hr class="hr" />
<?php

	$sql = "SELECT name FROM login WHERE  gang='".mysql_real_escape_string($gang_name)."' AND name!='".mysql_real_escape_string($gang_leader)."' ORDER BY name ASC";
$query = mysql_query($sql);
$count = mysql_num_rows($query);
$i = 1;

while($row = mysql_fetch_object($query)) {
 $member_name = htmlspecialchars($row->name);
  
 echo "<a href=\"page.php?page=view_profile&name=". $member_name ."\" onFocus=\"if(this.blur)this.blur()\">".$member_name."</a>";
 
 if($i != $count) {
  echo "<label> - </label>";
 }
 $i++;
}
?>
<hr class="hr" />
</fieldset>
<br />
<?php if(!empty($gang_quote) or !empty($gang_picture)){ ?>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Quote.</legend>
<?php 	

if(!empty($gang_picture)){
	echo "<center><img src=\"http://".$gang_picture."\" border=\"0\" /></center><br />";		
}

$gang_quote = htmlentities($gang_quote);
    $gang_quote = nl2br($gang_quote); 
    $gang_quote = bbcodes($gang_quote);
	$gang_quote = smilie($gang_quote);
	$gang_quote = sitefilter($gang_quote);
	$gang_quote = stripslashes($gang_quote);
	echo $gang_quote; ?>
</fieldset>
<?php } ?> 