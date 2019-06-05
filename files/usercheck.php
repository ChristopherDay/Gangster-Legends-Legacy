<?php if($sitestate == 1){ ?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">You have been banned.</legend>
<b>Banned date:</b><br />
<?php 
$nsql = "SELECT banner,name,date,reason FROM banned WHERE name='".mysql_real_escape_string($name)."'";
$query = mysql_query($nsql) or die(mysql_error());
$row = mysql_fetch_object($query);
$banner = htmlspecialchars($row->banner);
$date = htmlspecialchars($row->date);
$name = htmlspecialchars($row->name);
$reason = htmlspecialchars($row->reason);

echo $date; ?>
<br /><b>Banned By:</b><br />
<?php echo $banner; ?>
<br /><b>Reason:</b><br />
<?php 
		
$reason = htmlentities($reason);
$reason = nl2br($reason); 
echo $reason; ?>
</fieldset>
<?php require("bottom.php"); ?>
<?php exit();} ?>

<?php if($sitestate == 2){ ?>
<?php 
$nsql = "SELECT shooter,target,date FROM kills WHERE target='".mysql_real_escape_string($name)."' and state='1'";
$query = mysql_query($nsql) or die(mysql_error());
$row = mysql_fetch_object($query);
$target = htmlspecialchars($row->target);
$date = htmlspecialchars($row->date);
$shooter = htmlspecialchars($row->shooter);
?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">You have been killed.</legend>
<b>Killed By:</b><br />
<?php echo $shooter; ?>
<br /><b>date:</b><br />
<?php echo $date; ?>
</fieldset>
<?php require("bottom.php"); ?>
<?php exit();} ?>
<?php 

if ($counter >= 40){
 ?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Click limit reached.</legend>
<b>Please limit your clicks.</b>
</fieldset>
<?php require("bottom.php"); ?>
<?php exit();} ?>

<?php 

$page_disable = false;

if($_SERVER['REQUEST_URI'] == "/news" and !empty($page_status_array[0])){ $page_disable = true; $disable_reason = $page_status_array[0]; }
if($_SERVER['REQUEST_URI'] == "/mailbox" and !empty($page_status_array[1])){ $page_disable = true; $disable_reason = $page_status_array[1]; }
if($_SERVER['REQUEST_URI'] == "/message" and !empty($page_status_array[2])){ $page_disable = true; $disable_reason = $page_status_array[2]; }
if($_SERVER['REQUEST_URI'] == "/forum" and !empty($page_status_array[3])){ $page_disable = true; $disable_reason = $page_status_array[3]; }
if($_SERVER['REQUEST_URI'] == "/forum_view" and !empty($page_status_array[3])){ $page_disable = true; $disable_reason = $page_status_array[3]; }
if($_SERVER['REQUEST_URI'] == "/forum_edit" and !empty($page_status_array[3])){ $page_disable = true; $disable_reason = $page_status_array[3]; }
if($_SERVER['REQUEST_URI'] == "/account" and !empty($page_status_array[4])){ $page_disable = true; $disable_reason = $page_status_array[4]; }
if($_SERVER['REQUEST_URI'] == "/online" and !empty($page_status_array[5])){ $page_disable = true; $disable_reason = $page_status_array[5]; }
if($_SERVER['REQUEST_URI'] == "/search" and !empty($page_status_array[6])){ $page_disable = true; $disable_reason = $page_status_array[6]; }
if($_SERVER['REQUEST_URI'] == "/faq" and !empty($page_status_array[7])){ $page_disable = true; $disable_reason = $page_status_array[7]; }
if($_SERVER['REQUEST_URI'] == "/notepad" and !empty($page_status_array[8])){ $page_disable = true; $disable_reason = $page_status_array[8]; }
if($_SERVER['REQUEST_URI'] == "/donate" and !empty($page_status_array[9])){ $page_disable = true; $disable_reason = $page_status_array[9]; }
if($_SERVER['REQUEST_URI'] == "/credits" and !empty($page_status_array[10])){ $page_disable = true; $disable_reason = $page_status_array[10]; }
if($_SERVER['REQUEST_URI'] == "/referrals" and !empty($page_status_array[11])){ $page_disable = true; $disable_reason = $page_status_array[11]; }
if($_SERVER['REQUEST_URI'] == "/crimes" and !empty($page_status_array[12])){ $page_disable = true; $disable_reason = $page_status_array[12]; }
if($_SERVER['REQUEST_URI'] == "/gta" and !empty($page_status_array[13])){ $page_disable = true; $disable_reason = $page_status_array[13]; }
if($_SERVER['REQUEST_URI'] == "/smuggle" and !empty($page_status_array[14])){ $page_disable = true; $disable_reason = $page_status_array[14]; }
if($_SERVER['REQUEST_URI'] == "/hitlist" and !empty($page_status_array[15])){ $page_disable = true; $disable_reason = $page_status_array[15]; }
if($_SERVER['REQUEST_URI'] == "/murder" and !empty($page_status_array[16])){ $page_disable = true; $disable_reason = $page_status_array[16]; }
if($_SERVER['REQUEST_URI'] == "/bank_robbery" and !empty($page_status_array[17])){ $page_disable = true; $disable_reason = $page_status_array[17]; }
if($_SERVER['REQUEST_URI'] == "/bank_robbery_planned" and !empty($page_status_array[3])){ $page_disable = true; $disable_reason = $page_status_array[17]; }
if($_SERVER['REQUEST_URI'] == "/car_market" and !empty($page_status_array[18])){ $page_disable = true; $disable_reason = $page_status_array[18]; }
if($_SERVER['REQUEST_URI'] == "/gang" and !empty($page_status_array[19])){ $page_disable = true; $disable_reason = $page_status_array[19]; }
if($_SERVER['REQUEST_URI'] == "/gang_forum" and !empty($page_status_array[20])){ $page_disable = true; $disable_reason = $page_status_array[20]; }
if($_SERVER['REQUEST_URI'] == "/gang_information" and !empty($page_status_array[21])){ $page_disable = true; $disable_reason = $page_status_array[21]; }
if($_SERVER['REQUEST_URI'] == "/bullet_factory" and !empty($page_status_array[22])){ $page_disable = true; $disable_reason = $page_status_array[22]; }
if($_SERVER['REQUEST_URI'] == "/shooting_range" and !empty($page_status_array[23])){ $page_disable = true; $disable_reason = $page_status_array[23]; }
if($_SERVER['REQUEST_URI'] == "/hospital" and !empty($page_status_array[24])){ $page_disable = true; $disable_reason = $page_status_array[24]; }
if($_SERVER['REQUEST_URI'] == "/travel" and !empty($page_status_array[25])){ $page_disable = true; $disable_reason = $page_status_array[25]; }
if($_SERVER['REQUEST_URI'] == "/prison" and !empty($page_status_array[26])){ $page_disable = true; $disable_reason = $page_status_array[26]; }
if($_SERVER['REQUEST_URI'] == "/roulette" and !empty($page_status_array[27])){ $page_disable = true; $disable_reason = $page_status_array[27]; }
if($_SERVER['REQUEST_URI'] == "/keno" and !empty($page_status_array[28])){ $page_disable = true; $disable_reason = $page_status_array[28]; }
if($_SERVER['REQUEST_URI'] == "/horseracing" and !empty($page_status_array[29])){ $page_disable = true; $disable_reason = $page_status_array[29]; }
if($_SERVER['REQUEST_URI'] == "/information" and !empty($page_status_array[30])){ $page_disable = true; $disable_reason = $page_status_array[30]; }
if($_SERVER['REQUEST_URI'] == "/index" and !empty($page_status_array[31])){ $page_disable = true; $disable_reason = $page_status_array[31]; }
if($_SERVER['REQUEST_URI'] == "/register" and !empty($page_status_array[32])){ $page_disable = true; $disable_reason = $page_status_array[32]; }
if($_SERVER['REQUEST_URI'] == "/forgot" and !empty($page_status_array[33])){ $page_disable = true; $disable_reason = $page_status_array[33]; }
if($_SERVER['REQUEST_URI'] == "/transfer" and !empty($page_status_array[34])){ $page_disable = true; $disable_reason = $page_status_array[34]; }
if($_SERVER['REQUEST_URI'] == "/black_market" and !empty($page_status_array[35])){ $page_disable = true; $disable_reason = $page_status_array[35]; }
if($_SERVER['REQUEST_URI'] == "/view_profile" and !empty($page_status_array[36])){ $page_disable = true; $disable_reason = $page_status_array[36]; }
if($_SERVER['REQUEST_URI'] == "/view_gang" and !empty($page_status_array[37])){ $page_disable = true; $disable_reason = $page_status_array[37]; }
if($_SERVER['REQUEST_URI'] == "/war" and !empty($page_status_array[38])){ $page_disable = true; $disable_reason = $page_status_array[38]; }
if($_SERVER['REQUEST_URI'] == "/rps" and !empty($page_status_array[39])){ $page_disable = true; $disable_reason = $page_status_array[39]; }
if($_SERVER['REQUEST_URI'] == "/m_dice" and !empty($page_status_array[40])){ $page_disable = true; $disable_reason = $page_status_array[40]; }
if($_SERVER['REQUEST_URI'] == "/lottery" and !empty($page_status_array[41])){ $page_disable = true; $disable_reason = $page_status_array[41]; }
if($_SERVER['REQUEST_URI'] == "/ace_club" and !empty($page_status_array[42])){ $page_disable = true; $disable_reason = $page_status_array[42]; }
if($_SERVER['REQUEST_URI'] == "/swiss_bank" and !empty($page_status_array[43])){ $page_disable = true; $disable_reason = $page_status_array[43]; }
if($_SERVER['REQUEST_URI'] == "/extortion" and !empty($page_status_array[44])){ $page_disable = true; $disable_reason = $page_status_array[44]; }
if($_SERVER['REQUEST_URI'] == "/help_desk" and !empty($page_status_array[45])){ $page_disable = true; $disable_reason = $page_status_array[45]; }
if($_SERVER['REQUEST_URI'] == "/blackjack" and !empty($page_status_array[46])){ $page_disable = true; $disable_reason = $page_status_array[46]; }
if($_SERVER['REQUEST_URI'] == "/chase" and !empty($page_status_array[47])){ $page_disable = true; $disable_reason = $page_status_array[47]; }
if($_SERVER['REQUEST_URI'] == "/auction" and !empty($page_status_array[48])){ $page_disable = true; $disable_reason = $page_status_array[48]; }
if($_SERVER['REQUEST_URI'] == "/car_crusher" and !empty($page_status_array[49])){ $page_disable = true; $disable_reason = $page_status_array[49]; }
if($_SERVER['REQUEST_URI'] == "/booze_brewery" and !empty($page_status_array[50])){ $page_disable = true; $disable_reason = $page_status_array[50]; }
if($_SERVER['REQUEST_URI'] == "/liqueur_store" and !empty($page_status_array[51])){ $page_disable = true; $disable_reason = $page_status_array[51]; }
if($_SERVER['REQUEST_URI'] == "/stock_market" and !empty($page_status_array[52])){ $page_disable = true; $disable_reason = $page_status_array[52]; }

// put back url.

$_SERVER['REQUEST_URI'] = implode(".", $page_url);			

if ($page_disable == true){

if (in_array($name, $admin_array) or in_array($name, $manager_array)){
echo "This page has been disabled.";
}else{

?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">This page has been disabled.</legend>
<b>Reason:</b> <?php echo htmlspecialchars(stripslashes($disable_reason)); ?>
</fieldset>
<?php require("bottom.php"); ?>
<?php exit();}
} ?>