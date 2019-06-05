<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_roulette.php"){
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

$sql = "SELECT rl,rl_max,rl_profit FROM location WHERE id='".mysql_real_escape_string($location)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$owner = htmlspecialchars($row->rl);
$profit = htmlspecialchars($row->rl_profit);
$rl_max = htmlspecialchars($row->rl_max);

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
$result = mysql_query("UPDATE location SET rl='".mysql_real_escape_string($name)."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());
  
  // remove cash
$result = mysql_query("UPDATE login SET money=money-'50000' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

echo "You now own the ".$location_array[$location]." Roulette.";

$owner = $name;
$money = $money - 50000;
}// if already owned.
}// if not enough money.
}// if post purchase.

if(isset($_POST['Update'])){ 

$_POST['max_bet'] = ereg_replace("[^0-9]",'',$_POST['max_bet']);

if(empty($_POST['max_bet'])){
echo "You didn't enter a maximum bet for your roulette.";
}else{

if($owner != $name ){
echo "You don't own this roulette.";
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

$result = mysql_query("UPDATE location SET rl_max='".mysql_real_escape_string($_POST['max_bet'])."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

echo "Your maximum bet has been updated to $ ".number_format($_POST['max_bet']).",-";

$rl_max = $_POST['max_bet'];
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
echo "You don't own this roulette table.";
}else{

  // update new owner
$result = mysql_query("UPDATE location SET rl='".mysql_real_escape_string($new_name)."', rl_max='100', rl_profit='0' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

$sql = "INSERT INTO casino_trade SET id = '', from = '".mysql_real_escape_string($name)."', to = '".mysql_real_escape_string($new_name)."', location = '".mysql_real_escape_string($location)."', type = 'Roulette'";

echo "You sent your Roulette to <a href=\"view_profile.php?name=". $new_name ."\" onFocus=\"if(this.blur)this.blur()\">".$new_name."</a>.";
$owner = $new_name;
$rl_max = 100;

}// owner check.
}// if incorrect password.
}// if person doesn't exist.
}}// if banned or killed.
}// if isset post transfer.

if(isset($_POST['Bet']) and $casino_mode == 2){

$number = rand(1,36);

for ($i = 0; $i < 37; $i++) {
$_POST[$i] = ereg_replace("[^0-9]",'',$_POST[$i]);
$_POST[$i] = round($_POST[$i]);
}

$_POST['red'] = ereg_replace("[^0-9]",'',$_POST['red']);
$_POST['black'] = ereg_replace("[^0-9]",'',$_POST['black']);
$_POST['odd'] = ereg_replace("[^0-9]",'',$_POST['odd']);
$_POST['even'] = ereg_replace("[^0-9]",'',$_POST['even']);
$_POST['1-18'] = ereg_replace("[^0-9]",'',$_POST['1-18']);
$_POST['19-36'] = ereg_replace("[^0-9]",'',$_POST['19-36']);
$_POST['1-12'] = ereg_replace("[^0-9]",'',$_POST['1-12']);
$_POST['13-24'] = ereg_replace("[^0-9]",'',$_POST['13-24']);
$_POST['25-36'] = ereg_replace("[^0-9]",'',$_POST['25-36']);
$_POST['th'] = ereg_replace("[^0-9]",'',$_POST['th']);
$_POST['nd'] = ereg_replace("[^0-9]",'',$_POST['nd']);
$_POST['rd'] = ereg_replace("[^0-9]",'',$_POST['rd']);

$_POST['red'] = round($_POST['red']);
$_POST['black'] = round($_POST['black']);
$_POST['odd'] = round($_POST['odd']);
$_POST['even'] = round($_POST['even']);
$_POST['1-18'] = round($_POST['1-18']);
$_POST['19-36'] = round($_POST['19-36']);
$_POST['1-12'] = round($_POST['1-12']);
$_POST['13-24'] = round($_POST['13-24']);
$_POST['25-36'] = round($_POST['25-36']);
$_POST['th'] = round($_POST['th']);
$_POST['nd'] = round($_POST['nd']);
$_POST['rd'] = round($_POST['rd']);

$wager = $_POST['1']+$_POST['2']+$_POST['3']+$_POST['4']+$_POST['5']+$_POST['6']+$_POST['7']+$_POST['8']+$_POST['9']+$_POST['10']+$_POST['11']+$_POST['12']+$_POST['13']+$_POST['14']+$_POST['15']+$_POST['16']+$_POST['17']+$_POST['18']+$_POST['19']+$_POST['20']+$_POST['21']+$_POST['22']+$_POST['23']+$_POST['24']+$_POST['25']+$_POST['26']+$_POST['27']+$_POST['28']+$_POST['29']+$_POST['30']+$_POST['31']+$_POST['32']+$_POST['33']+$_POST['34']+$_POST['35']+$_POST['36']+$_POST['red']+$_POST['black']+$_POST['odd']+$_POST['even']+$_POST['1-18']+$_POST['19-36']+$_POST['1-12']+$_POST['13-24']+$_POST['25-36']+$_POST['th']+$_POST['nd']+$_POST['rd'];

if($wager < 10){
echo "You need to bet $ 10,- or higher.";
}else {

if($money < $wager){
echo "You don't have that much money.";
}else{

if($rl_max < $wager){
echo "You can't bet more then the maximum bet.";
}else{

if (strlen($wager) > "10"){
echo "You may not have a wager higher then $ 9,999,999,999.";
}else{

if($owner == "No Owner."){
echo "You can't gamble at a roulette if it has no owner.";
}else{
// calculates all 36 bets.

$won_money = 0;

for ($i = 0; $i <= 37; $i++) {
if ($number == $i){ $won_money = $won_money + $_POST[$i] * 36;}
}

$black = array ("2", "4", "6", "8", "10", "11", "13", "15", "17", "20", "22", "24", "26", "28", "29", "31", "33", "35"); 
$red = array ("1", "3", "5", "7", "9", "12", "14", "16", "18", "19", "21", "23", "25", "27", "30", "32", "34", "36"); 
$one_18 = array ("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18"); 
$nineteen_36 = array ("19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36"); 
$one_12 = array ("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"); 
$twelve_24 = array ("13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"); 
$twentyfour_36 = array ("25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36"); 
$odd = array ("1", "3", "5", "7", "9", "11", "13", "15", "17", "19", "21", "23", "25", "27", "29", "31", "33", "35"); 
$even = array ("2", "4", "6", "8", "10", "12", "14", "16", "18", "20", "22", "24", "26", "28", "30", "32", "34", "36"); 
$th_1 = array ("1", "4", "7", "10", "13", "16", "19", "22", "25", "28", "31", "34"); 
$nd_2 = array ("2", "5", "8", "11", "14", "17", "20", "23", "26", "29", "32", "35"); 
$rd_3 = array ("3", "6", "9", "12", "15", "18", "21", "24", "27", "30", "33", "36"); 


// calculates black bets.

for ($i = 0; $i <= 37; $i++) {
if ($number == $black[$i]){ $won_money = $won_money + $_POST['black'] * 2;}
}

// calculates red bets.

for ($i = 0; $i <= 37; $i++) {
if ($number == $red[$i]){ $won_money = $won_money + $_POST['red'] * 2;}
}

// 1 to 18

for ($i = 0; $i <= 37; $i++) {
if ($number == $one_18[$i]){ $won_money = $won_money + $_POST['1-18'] * 2;}
}

// 19 to 36

for ($i = 0; $i <= 37; $i++) {
if ($number == $nineteen_36[$i]){ $won_money = $won_money + $_POST['19-36'] * 2;}
}

// 1 to 12

for ($i = 0; $i <= 37; $i++) {
if ($number == $one_12[$i]){ $won_money = $won_money + $_POST['1-12'] * 3;}
}

// 13 to 24

for ($i = 0; $i <= 37; $i++) {
if ($number == $twelve_24[$i]){ $won_money = $won_money + $_POST['13-24'] * 3;}
}

// 25 to 36

for ($i = 0; $i <= 37; $i++) {
if ($number == $twentyfour_36[$i]){ $won_money = $won_money + $_POST['25-36'] * 3;}
}

// odd

for ($i = 0; $i <= 37; $i++) {
if ($number == $odd[$i]){ $won_money = $won_money + $_POST['odd'] * 2;}
}

// even

for ($i = 0; $i <= 37; $i++) {
if ($number == $even[$i]){ $won_money = $won_money + $_POST['even'] * 2;}
}

// 1th

for ($i = 0; $i <= 37; $i++) {
if ($number == $th_1[$i]){ $won_money = $won_money + $_POST['th'] * 3;}
}

// 2nd

for ($i = 0; $i <= 37; $i++) {
if ($number == $nd_2[$i]){ $won_money = $won_money + $_POST['nd'] * 3;}
}

// 3rd

for ($i = 0; $i <= 37; $i++) {
if ($number == $rd_3[$i]){ $won_money = $won_money + $_POST['rd'] * 3;}
}

$cash_count = $won_money - $wager;

$sql = "SELECT money FROM login WHERE name='".mysql_real_escape_string($owner)."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$owners_money = htmlspecialchars($row->money);

if($owners_money - $cash_count < 0){

// remove owners cash.

$result = mysql_query("UPDATE login SET money='0', newmail='0' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());

$message = "You lost your roulette. ".$name." won the table.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($owner). "', message = '" .mysql_real_escape_string($message). "', sendby = '".mysql_real_escape_string($owner)."'";
$res = mysql_query($sql);

// casino win log.

$sql = "INSERT INTO casino_wins SET id = '', loser = '" .mysql_real_escape_string($owner). "', winner = '" .mysql_real_escape_string($name). "', payout = '".mysql_real_escape_string($cash_count)."', bet = '".mysql_real_escape_string($wager)."', maxbet = '".mysql_real_escape_string($rl_max)."', old_money = '".mysql_real_escape_string($owners_money)."', location = '".mysql_real_escape_string($location)."', type = 'Roulette'";
$res = mysql_query($sql);

// update winners money.

$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($owners_money)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE location SET rl='".mysql_real_escape_string($name)."', rl_max='100', rl_profit='0' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

echo "You won all the owners money and now own ".$location_array[$location]." Roulette.";
$owner = $name;
$money = $money + $owners_money;
$profit = 0;
$rl_max = 100;
}else{

if($won_money >= "1") { 

$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($cash_count)."' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($cash_count)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

echo "Number ".$number." got picked by the roulette. You won $ ".number_format($won_money).",-.";
$money = $money + $wager;

// update profit.
$result = mysql_query("UPDATE location SET rl_profit=rl_profit-'".mysql_real_escape_string($cash_count)."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

}else{

$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($cash_count)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money_check = htmlspecialchars($row->money);

if($money_check < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting Roulette.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($cash_count)."' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());

echo "Number ".$number." got picked by the roulette. You lost your complete wager.";
$money = $money - $wager;

// update profit.
$result = mysql_query("UPDATE location SET rl_profit=rl_profit-'".mysql_real_escape_string($cash_count)."' WHERE id='".mysql_real_escape_string($location)."'") 
or die(mysql_error());

}// if exploiting.
}
}// if all owners money won.

}// check owner.
}// if wager is to high.
}// max bet check.
}// if not enough money.
}// if invalid bet.
}// if post bet

?>