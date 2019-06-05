<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_horseracing.php"){
exit();
}

// casino mode.

if(isset($_POST['Enter']) and !empty($_POST['casino_password'])){

	if(md5($_POST['casino_password']) == $password){
	
	$result = mysql_query("UPDATE login SET casino='2' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());
	
	$casino_mode = 2;
	}else{
	echo $lang_incorrect_password;
	}

}

$sql = "SELECT rt,rt_max,rt_profit FROM location WHERE id='".mysql_real_escape_string($location)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$owner = htmlspecialchars($row->rt);
$profit = htmlspecialchars($row->rt_profit);
$rt_max = htmlspecialchars($row->rt_max);

$sql = "SELECT sitestate FROM login WHERE name='".mysql_real_escape_string($owner)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$casino_state = htmlspecialchars($row->sitestate);


// purchase casino.

if(isset($_POST['Purchase'])){

if($money < 50000){
echo "You don't have enough money to purchase this casino.";
}else{

if($owner != "No Owner." and $casino_state == 0){
echo "This casino is already owned by somebody.";
}else{

  // update new owner
$result = mysql_query("UPDATE location SET rt='".mysql_real_escape_string($name)."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());
  
  // remove cash
$result = mysql_query("UPDATE login SET money=money-'50000' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

echo "You now own the ".$location_array[$location]." Horse Racing.";

$owner = $name;
$money = $money - 50000;
}// if already owned.
}// if not enough money.
}// if post purchase.

if(isset($_POST['Update'])){ 

$_POST['max_bet'] = ereg_replace("[^0-9]",'',$_POST['max_bet']);

if(empty($_POST['max_bet'])){
echo "You didn't enter a maximum bet for your casino.";
}else{

if($owner != $name ){
echo "You don't own this casino.";
}else{

if($_POST['max_bet'] >= 999999999){
echo "The maximum bet allowed is $ 999,999,999,-";
}else{

if($_POST['max_bet'] < 100){
echo "The Minimum bet allowed is $ 100,-";
}else{

if ( md5($_POST['password_bet']) != $password ){ 
echo $lang_incorrect_password;
}else {

$result = mysql_query("UPDATE location SET rt_max='".mysql_real_escape_string($_POST['max_bet'])."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

echo "Your maximum bet has been updated to $ ".number_format($_POST['max_bet']).",-";

$rt_max = $_POST['max_bet'];

}// password check.
}// mimium bet.
}// if max bet is to high.
}// if not the owner.
}// empty maxim bet.
}// if update.

if(isset($_POST['Transfer'])){

$sql = "SELECT name,sitestate FROM login WHERE name='".mysql_real_escape_string($_POST['name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$new_name = htmlspecialchars($row->name);
$receivers_state = htmlspecialchars($row->sitestate);

if($receivers_state == 1){
echo "Its not allowed to sent properties to people that have been banned.";
}else{

if($receivers_state == 2){
echo "Its not allowed to sent properties to people that have been Assassinated.";
}else{

if(empty($new_name)){
echo $lang_no_user;
}else{

if ( md5($_POST['password']) != $password ){ 
echo $lang_incorrect_password;
}else {

if($owner != $name ){
echo "You don't own this casino.";
}else{

  // update new owner
$result = mysql_query("UPDATE location SET rt='".mysql_real_escape_string($new_name)."', rt_max='100', rt_profit='0' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

$sql = "INSERT INTO casino_trade SET id = '', from = '".mysql_real_escape_string($name)."', to = '".mysql_real_escape_string($new_name)."', location = '".mysql_real_escape_string($location)."', type = 'Horse Racing'";

echo "You sent your Horse Racing to <a href=\"view_profile.php?name=". $new_name ."\" onFocus=\"if(this.blur)this.blur()\">".$new_name."</a>.";
$owner = $new_name;
$rt_max = 100;

}// owner check.
}// if incorrect password.
}// if person doesn't exist.
}}// if banned or killed.
}// if isset post transfer.

if(isset($_POST['Bet']) and $casino_mode == 2){

if(empty($_POST['horse'])){
echo "You didn't select a horse.";
}else{

$_POST['wager'] = ereg_replace("[^0-9]",'',$_POST['wager']);
$_POST['wager'] = round($_POST['wager']);

if(empty($_POST['wager'])){
echo "Empty Wager.";
}else{

if($money < $_POST['wager']){
echo "You don't have that much money.";
}else{

if($_POST['wager'] > $rt_max){
echo "Its not possible to bet more then the maximum bet.";
}else{

if (strlen($_POST['wager']) > "10"){
echo "You may not have a wager higher then $ 9,999,999,999.";
}else{

$horse_1 = array("Horse 2","Horse 3","Horse 4","Horse 5","Horse 6","Horse 7","Horse 8","Horse 9","Horse 10");
$horse_2 = array("Horse 1","Horse 3","Horse 4","Horse 5","Horse 6","Horse 7","Horse 8","Horse 9","Horse 10");
$horse_3 = array("Horse 2","Horse 1","Horse 4","Horse 5","Horse 6","Horse 7","Horse 8","Horse 9","Horse 10");
$horse_4 = array("Horse 2","Horse 3","Horse 1","Horse 5","Horse 6","Horse 7","Horse 8","Horse 9","Horse 10");
$horse_5 = array("Horse 2","Horse 3","Horse 4","Horse 1","Horse 6","Horse 7","Horse 8","Horse 9","Horse 10");
$horse_6 = array("Horse 2","Horse 3","Horse 4","Horse 5","Horse 1","Horse 7","Horse 8","Horse 9","Horse 10");
$horse_7 = array("Horse 2","Horse 3","Horse 4","Horse 5","Horse 6","Horse 1","Horse 8","Horse 9","Horse 10");
$horse_8 = array("Horse 2","Horse 3","Horse 4","Horse 5","Horse 6","Horse 7","Horse 1","Horse 9","Horse 10");
$horse_9 = array("Horse 2","Horse 3","Horse 4","Horse 5","Horse 6","Horse 7","Horse 8","Horse 1","Horse 10");
$horse_10 = array("Horse 2","Horse 3","Horse 4","Horse 5","Horse 6","Horse 7","Horse 8","Horse 9","Horse 1");

if($_POST['horse'] == 1){if(rand(1,3) == 2){ $won = true; $winning_horse = "Horse 1"; $payout = $_POST['wager'] * 2;}else{$won = false; $winning_horse = $horse_1[rand(0,8)];}}

if($_POST['horse'] == 2){if(rand(1,4) == 2){ $won = true; $winning_horse = "Horse 2"; $payout = $_POST['wager'] * 3; }else{$won = false; $winning_horse = $horse_2[rand(0,8)];}}

if($_POST['horse'] == 3){if(rand(1,5) == 2){ $won = true; $winning_horse = "Horse 3"; $payout = $_POST['wager'] * 4;}else{$won = false; $winning_horse = $horse_3[rand(0,8)];}}

if($_POST['horse'] == 4){if(rand(1,6) == 2){ $won = true; $winning_horse = "Horse 4"; $payout = $_POST['wager'] * 5;}else{$won = false; $winning_horse = $horse_4[rand(0,8)];}}

if($_POST['horse'] == 5){if(rand(1,7) == 2){ $won = true; $winning_horse = "Horse 5"; $payout = $_POST['wager'] * 6;}else{$won = false; $winning_horse = $horse_5[rand(0,8)];}}

if($_POST['horse'] == 6){if(rand(1,8) == 2){ $won = true; $winning_horse = "Horse 6"; $payout = $_POST['wager'] * 7;}else{$won = false; $winning_horse = $horse_6[rand(0,8)];}}

if($_POST['horse'] == 7){if(rand(1,9) == 2){ $won = true; $winning_horse = "Horse 7"; $payout = $_POST['wager'] * 8;}else{$won = false; $winning_horse = $horse_7[rand(0,8)];}}

if($_POST['horse'] == 8){if(rand(1,10) == 2){ $won = true; $winning_horse = "Horse 8"; $payout = $_POST['wager'] * 9;}else{$won = false; $winning_horse = $horse_8[rand(0,8)];}}

if($_POST['horse'] == 9){if(rand(1,11) == 2){ $won = true; $winning_horse = "Horse 9"; $payout = $_POST['wager'] * 10;}else{$won = false; $winning_horse = $horse_9[rand(0,8)];}}

if($_POST['horse'] == 10){if(rand(1,12) == 2){ $won = true; $winning_horse = "Horse 10"; $payout = $_POST['wager'] * 11;}else{$won = false; $winning_horse = $horse_10[rand(0,8)];}}

$sql = "SELECT money FROM login WHERE name='".mysql_real_escape_string($owner)."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$owners_money = htmlspecialchars($row->money);

if($won == true){

// update players money.

if($payout - $_POST['wager'] < $owners_money){
echo "You picked the winning Horse and won $ ".number_format($payout).",-";

$new_money = $payout - $_POST['wager'];
$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($new_money)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());
$money = $money + $new_money;

// update profit.

$new_profit = $profit - $payout + $_POST['wager'];
$result = mysql_query("UPDATE location SET rt_profit='".mysql_real_escape_string($new_profit)."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

// remove owners cash.

$result = mysql_query("UPDATE login SET money=money-'".$new_money."' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());

}else{

// remove owners cash.

$result = mysql_query("UPDATE login SET money='0', newmail='0' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());

$message = "You lost your Horse Racing casino. ".$name." won the table.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($owner). "', message = '" .mysql_real_escape_string($message). "', sendby = '".mysql_real_escape_string($owner)."'";
$res = mysql_query($sql);

// update winners money.

$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($owners_money)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE location SET rt='".mysql_real_escape_string($name)."', rt_max='100', rt_profit='0' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

// casino win log.

$sql = "INSERT INTO casino_wins SET id = '', loser = '" .mysql_real_escape_string($owner). "', winner = '" .mysql_real_escape_string($name). "', payout = '".mysql_real_escape_string($payout - $_POST['wager'])."', bet = '".mysql_real_escape_string($_POST['wager'])."', maxbet = '".mysql_real_escape_string($rt_max)."', old_money = '".mysql_real_escape_string($owners_money)."', location = '".mysql_real_escape_string($location)."', type = 'Horse Racing'";
$res = mysql_query($sql);

echo "You won all the owners money and now own this Casino.";
$money = $money + $owners_money;
$owner = $name;

}// if casino got won.
}// if won.

if($won == false){
echo "You picked Horse ".$_POST['horse']." but ".$winning_horse." won. You lost $ ".number_format($_POST['wager']).",-";

// remove players money.

$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($_POST['wager'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

// update profit.

$new_profit = $profit + $_POST['wager'];
$result = mysql_query("UPDATE location SET rt_profit='".mysql_real_escape_string($new_profit)."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

// update owners cash.

$result = mysql_query("UPDATE login SET money=money+'".$_POST['wager']."' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());
}

$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money = htmlspecialchars($row->money);

if($money < 0 ){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting horse Racing.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";

}

}// if wager is to high.
}// if empty horse.
}// if bigger then the maximum bet.
}// if not enough money.
}// if empty wager.
}// if isset.

?>