<?php 
$sql = "SELECT * FROM login WHERE name='".mysql_real_escape_string($_GET['name'])."'";
$query = mysql_query($sql)  or die(mysql_error());
$row = mysql_fetch_object($query);
$profile_id = htmlspecialchars($row->id);
$profile_name = htmlspecialchars($row->name);
$profile_rank = htmlspecialchars($row->rank);
$profile_gang = htmlspecialchars($row->gang);
$profile_messages = htmlspecialchars($row->messages);
$profile_quote = htmlspecialchars($row->quote);
$profile_donated = htmlspecialchars($row->donated);
$profile_sitestate = htmlspecialchars($row->sitestate);
$profile_money = htmlspecialchars($row->money);
$profile_picture = htmlspecialchars($row->side_url);
$profile_oc = htmlspecialchars($row->oc);
$profile_lastactive = htmlspecialchars($row->lastactive);

	if(($profile_money >= 0 ) and ( $profile_money <= 10000)){ $profile_money = "Flat Broke.";}
	if(($profile_money > 10000 ) and ( $profile_money <= 25000)){ $profile_money = "Spare Change.";}
	if(($profile_money > 25000 ) and ( $profile_money <= 50000)){ $profile_money = "Poor.";}
	if(($profile_money > 50000 ) and ( $profile_money <= 100000)){ $profile_money = "Saver.";}
	if(($profile_money > 100000 ) and ( $profile_money <= 250000)){ $profile_money = "Investor.";}
	if(($profile_money > 250000 ) and ( $profile_money <= 500000)){ $profile_money = "Wealthy.";}
	if(($profile_money > 500000 ) and ( $profile_money <= 750000)){ $profile_money = "Rich.";}
	if(($profile_money > 750000 ) and ( $profile_money <= 1000000)){ $profile_money = "Extremely Rich.";}
	if(($profile_money > 1000000 ) and ( $profile_money <= 2500000)){ $profile_money = "Dangerously Rich.";}
	if($profile_money > 2500000 ){ $profile_money = "Notoriously Rich.";}
	
	$profile_account = "Normal Account.";
	if($profile_donated == 2){ $profile_account = "Silver Account."; }
	if($profile_donated == 3){ $profile_account = "Gold Account."; }
	if($profile_donated == 4){ $profile_account = "Platinum Account."; }
	if (in_array($profile_name, $admin_array)) {$profile_account = "Admin.";}
	if (in_array($profile_name, $manager_array)) {$profile_account = "Manager.";}

	$profile_state = "Alive.";
	if($profile_sitestate == "2"){$profile_state = "Dead.";}
	if($profile_sitestate == "1"){$profile_state = "Banned.";}
?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Profile for: <?php echo "<a href=\"page.php?page=message&name=". $profile_name ."\" onFocus=\"if(this.blur)this.blur()\">".$profile_name."</a>"; ?>.</legend>
<b>Account: </b><?php echo $profile_account; ?><br />
<b>Rank: </b><?php echo $rank_array[$profile_rank]; ?><br />
<b>Wealth: </b><?php echo $profile_money; ?><br />
<b>Last Online: </b><?php echo $profile_lastactive; ?><br />
<b>Gang: </b><?php 
	if(empty($profile_gang)){ echo "No Gang."; }else{ echo "<a href=\"page.php?page=view_gang&name=". $profile_gang ."\" onFocus=\"if(this.blur)this.blur()\" >".$profile_gang."</a>"; }?>
<br />
<b>Status: </b><?php echo $profile_state; ?> (<?php

$sql = "SELECT id,lastactive FROM login WHERE name='".mysql_real_escape_string($_GET['name'])."' and DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive";
$query = mysql_query($sql)  or die(mysql_error());
$row = mysql_fetch_object($query);
$online_id = htmlspecialchars($row->id);

if(empty($online_id)){echo "<span class = 'ofline'>Offline</span>";}
else{

	$sql = "SELECT lastactive FROM login WHERE name='".mysql_real_escape_string($_GET['name'])."' and DATE_SUB(NOW(),INTERVAL 1 MINUTE) <= lastactive";
$query = mysql_query($sql)  or die(mysql_error());
$row = mysql_fetch_object($query);
$idle = htmlspecialchars($row->lastactive);

	if(empty($idle)){
	echo "<span class = 'idle'>Idle</span>";
	}else{
	echo "<span class = 'online'>Online</span>";
	}
}



?>)<br />
<b>Bank Timer: </b><?php 

$profile_oc_check = explode("-", $profile_oc);

if (!in_array($profile_name, $admin_array) and !in_array($profile_name, $manager_array)) {

if(empty($profile_oc_check[0])){

	if((time() <= $profile_oc_check[1]) ) {			
							$master = $profile_oc_check[1] - time();
		if ($master < 3600) { 
					echo date( "00:i:s", $profile_oc_check[1] - time() );
				} 
				
		if (($master > 3600) and ($master < 86400)){ 
					echo date( "H:i:s", $profile_oc_check[1] - time() - 3600 );
				}
		echo " till next bank robbery.";
	}else{
			echo "Available.";
	}
}else{
echo "Currently doing a bank robbery.";
}

}else{
echo "Not Available.";
}



 ?><br />
<b>Messages: </b><?php echo number_format($profile_messages); ?><br />
</fieldset>
<br />
<?php if(!empty($profile_quote) or !empty($profile_picture)){ ?>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Quote.</legend>
<?php
	
if(!empty($profile_picture)){
	echo "<center><img src=\"http://".$profile_picture."\" border=\"0\" /></center><br />";		
} 	

	$profile_quote = htmlentities($profile_quote);
    $profile_quote = nl2br($profile_quote); 
    $profile_quote = bbcodes($profile_quote);
	$profile_quote = smilie($profile_quote);
	$profile_quote = sitefilter($profile_quote);
	$profile_quote = stripslashes($profile_quote);
	echo $profile_quote; ?>
</fieldset>
<?php } ?>

