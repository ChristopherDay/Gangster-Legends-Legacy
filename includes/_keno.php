<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_keno.php"){
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

$ksc = "#313131";

$sql = "SELECT keno,keno_max,keno_profit FROM location WHERE id='".mysql_real_escape_string($location)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$owner = htmlspecialchars($row->keno);
$profit = htmlspecialchars($row->keno_profit);
$keno_max = htmlspecialchars($row->keno_max);

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
$result = mysql_query("UPDATE location SET keno='".mysql_real_escape_string($name)."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());
  
  // remove cash
$result = mysql_query("UPDATE login SET money=money-'50000' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

echo "You now own the ".$location_array[$location]." Keno.";

$owner = $name;
$money = $money - 50000;
}// if already owned.
}// if not enough money.
}// if post purchase.

if(isset($_POST['Update'])){ 

$_POST['max_bet'] = ereg_replace("[^0-9]",'',$_POST['max_bet']);

if(empty($_POST['max_bet'])){
echo "You didn't enter a maximum bet for your keno.";
}else{

if($owner != $name ){
echo "You don't own this keno.";
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

$result = mysql_query("UPDATE location SET keno_max='".mysql_real_escape_string($_POST['max_bet'])."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

echo "Your maximum bet has been updated to $ ".number_format($_POST['max_bet']).",-";

$keno_max = $_POST['max_bet'];

}
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
echo "You don't own this keno table.";
}else{

  // update new owner
$result = mysql_query("UPDATE location SET keno='".mysql_real_escape_string($new_name)."', keno_max='100', keno_profit='0' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

$sql = "INSERT INTO casino_trade SET id = '', from = '".mysql_real_escape_string($name)."', to = '".mysql_real_escape_string($new_name)."', location = '".mysql_real_escape_string($location)."', type = 'Keno'";

echo "You sent your keno to <a href=\"view_profile.php?name=". $new_name ."\" onFocus=\"if(this.blur)this.blur()\">".$new_name."</a>.";
$owner = $new_name;
$keno_max = 100;

}// owner check.
}// if incorrect password.
}// if person doesn't exist.
}}// if banned or killed.
}// if isset post transfer.

if(isset($_POST['Bet']) and $casino_mode == 2){
// remove non numeric.
$_POST['wager'] = ereg_replace("[^0-9]",'',$_POST['wager']);
$_POST['value1'] = ereg_replace("[^0-9]",'',$_POST['value1']);
$_POST['value2'] = ereg_replace("[^0-9]",'',$_POST['value2']);
$_POST['value3'] = ereg_replace("[^0-9]",'',$_POST['value3']);
$_POST['value4'] = ereg_replace("[^0-9]",'',$_POST['value4']);
$_POST['value5'] = ereg_replace("[^0-9]",'',$_POST['value5']);
$_POST['value6'] = ereg_replace("[^0-9]",'',$_POST['value6']);
$_POST['value7'] = ereg_replace("[^0-9]",'',$_POST['value7']);
$_POST['value8'] = ereg_replace("[^0-9]",'',$_POST['value8']);
$_POST['value9'] = ereg_replace("[^0-9]",'',$_POST['value9']);
$_POST['value10'] = ereg_replace("[^0-9]",'',$_POST['value10']);

$_POST['wager'] = round($_POST['wager']);

// keep select color.
$c_number_[$_POST['value1']] = $ksc;
$c_number_[$_POST['value2']] = $ksc;
$c_number_[$_POST['value3']] = $ksc;
$c_number_[$_POST['value4']] = $ksc;
$c_number_[$_POST['value5']] = $ksc;
$c_number_[$_POST['value6']] = $ksc;
$c_number_[$_POST['value7']] = $ksc;
$c_number_[$_POST['value8']] = $ksc;
$c_number_[$_POST['value9']] = $ksc;
$c_number_[$_POST['value10']] = $ksc;

$wager_array = array( $_POST['value1'], $_POST['value2'], $_POST['value3'], $_POST['value4'], $_POST['value5'], $_POST['value6'], $_POST['value7'], $_POST['value8'], $_POST['value9'], $_POST['value10']);
$wager_array = array_unique ($wager_array);

$input = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80");

$rand_keys = array_rand ($input, 20);

$winners_array = array($input[$rand_keys[0]], $input[$rand_keys[1]], $input[$rand_keys[2]], $input[$rand_keys[3]], $input[$rand_keys[4]], $input[$rand_keys[5]], $input[$rand_keys[6]], $input[$rand_keys[7]], $input[$rand_keys[8]], $input[$rand_keys[9]], $input[$rand_keys[10]], $input[$rand_keys[11]], $input[$rand_keys[12]], $input[$rand_keys[13]], $input[$rand_keys[14]], $input[$rand_keys[15]], $input[$rand_keys[16]], $input[$rand_keys[17]], $input[$rand_keys[18]], $input[$rand_keys[19]]);

for ($i = 1; $i < 81; $i++) {
$c_number_[$i] = "#414141";
}

// winning collors.

$c_number_[$winners_array[0]] = "#9933CC";
$c_number_[$winners_array[1]] = "#9933CC";
$c_number_[$winners_array[2]] = "#9933CC";
$c_number_[$winners_array[3]] = "#9933CC";
$c_number_[$winners_array[4]] = "#9933CC";
$c_number_[$winners_array[5]] = "#9933CC";
$c_number_[$winners_array[6]] = "#9933CC";
$c_number_[$winners_array[7]] = "#9933CC";
$c_number_[$winners_array[8]] = "#9933CC";
$c_number_[$winners_array[9]] = "#9933CC";
$c_number_[$winners_array[10]] = "#9933CC";
$c_number_[$winners_array[11]] = "#9933CC";
$c_number_[$winners_array[12]] = "#9933CC";
$c_number_[$winners_array[13]] = "#9933CC";
$c_number_[$winners_array[14]] = "#9933CC";
$c_number_[$winners_array[15]] = "#9933CC";
$c_number_[$winners_array[16]] = "#9933CC";
$c_number_[$winners_array[17]] = "#9933CC";
$c_number_[$winners_array[18]] = "#9933CC";
$c_number_[$winners_array[19]] = "#9933CC";

if(count($wager_array) < 10){
echo "You didn't select 10 numbers or you picked one or more double numbers.";
}else{

if(empty($_POST['wager'])){
echo "You didn't enter a wager.";
}else{

if($money < $_POST['wager'] ){
echo "You don't have that much money.";
}else{

if($_POST['wager'] > $keno_max){
echo "You can't bet more then the maximum bet.";
}else{

if (strlen($_POST['wager']) > "10"){
echo "You may not have a wager higher then $ 9,999,999,999.";
}else{

$count = 0;
if (in_array($_POST['value1'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value1']] = "#00FF00";}
if (in_array($_POST['value2'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value2']] = "#00FF00";}
if (in_array($_POST['value3'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value3']] = "#00FF00";}
if (in_array($_POST['value4'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value4']] = "#00FF00";}
if (in_array($_POST['value5'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value5']] = "#00FF00";}
if (in_array($_POST['value6'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value6']] = "#00FF00";}
if (in_array($_POST['value7'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value7']] = "#00FF00";}
if (in_array($_POST['value8'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value8']] = "#00FF00";}
if (in_array($_POST['value9'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value9']] = "#00FF00";}
if (in_array($_POST['value10'], $winners_array)) { $count = $count + 1; $c_number_[$_POST['value10']] = "#00FF00";}

if($count == 5 ){ $payout = $_POST['wager'] * 4;}
if($count == 6 ){ $payout = $_POST['wager'] * 23;}
if($count == 7 ){ $payout = $_POST['wager'] * 143;}
if($count == 8 ){ $payout = $_POST['wager'] * 999;}
if($count == 9 ){ $payout = $_POST['wager'] * 4499;}
if($count == 10 ){ $payout = $_POST['wager'] * 9999;}

$sql = "SELECT money FROM login WHERE name='".mysql_real_escape_string($owner)."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$owners_money = htmlspecialchars($row->money);

if($count >= 5){

if($payout < $owners_money){

// remove owners cash.

$result = mysql_query("UPDATE login SET money=money-'".$payout."' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());

$sql = "SELECT money FROM login WHERE name='".mysql_real_escape_string($owner)."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$owners_money = htmlspecialchars($row->money);

if($owners_money < 0){
echo "Invalid bet.";
}else{

//update winners omoney.
$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($payout)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

// update profit.

$result = mysql_query("UPDATE location SET keno_profit=keno_profit-'".mysql_real_escape_string($payout)."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

echo "You matched ".$count." numbers and won $ ".number_format($payout + $_POST['wager']).",-";
$money = $money + $payout + $_POST['wager'];
}// if invalid bet.

}else{

// remove owners cash.

$result = mysql_query("UPDATE login SET money='0', newmail='0' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());

$message = "You lost your Keno. ".$name." won the table.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($owner). "', message = '" .mysql_real_escape_string($message). "', sendby = '".mysql_real_escape_string($owner)."'";
$res = mysql_query($sql);

// update winners money.

$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($owners_money)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE location SET keno='".mysql_real_escape_string($name)."', keno_max='10', keno_profit='0' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

// casino win log.

$sql = "INSERT INTO casino_wins SET id = '', loser = '" .mysql_real_escape_string($owner). "', winner = '" .mysql_real_escape_string($name). "', payout = '".mysql_real_escape_string($payout + $_POST['wager'])."', bet = '".mysql_real_escape_string($_POST['wager'])."', maxbet = '".mysql_real_escape_string($keno_max)."', old_money = '".mysql_real_escape_string($owners_money)."', location = '".mysql_real_escape_string($location)."', type = 'Keno'";
$res = mysql_query($sql);

echo "You won all the owners money and now own this Casino.";
$owner = $name;
$money = $money + $owners_money;
}// if casino got won.
}else {

// update betters money.
$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($_POST['wager'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money_check = htmlspecialchars($row->money);

if($money_check < 0 ){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting keno.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";

}else{

// update owners money.
$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($_POST['wager'])."' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());

// update profit.

$result = mysql_query("UPDATE location SET keno_profit=keno_profit+'".mysql_real_escape_string($_POST['wager'])."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

echo "You matched ".$count." numbers and lost your complete wager";
$money = $money - $_POST['wager'];
}// if exploiting.
}// if lost.

}// if wager is to high.
}// max bet check.
}// money check.
}// if less then 10 numbers
}// if empty wager
}// if isset.

?>