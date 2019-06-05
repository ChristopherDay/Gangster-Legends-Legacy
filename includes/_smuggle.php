<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_smuggle.php"){
exit();
}

$smuggle_information = explode("-", $smuggle);

$prices_1 = array("23", "30", "12", "50", "97");
$prices_2 = array("30", "47", "41", "24", "44");
$prices_3 = array("8", "20", "69", "65", "40");
$prices_4 = array("27", "45", "16", "20", "84");
$prices_5 = array("5", "15", "34", "49", "109");
$prices_6 = array("44", "35", "15", "32", "90");
$prices_7 = array("15", "18", "34", "25", "84");
$prices_8 = array("16", "24", "32", "29", "59");
$prices_9 = array("20", "17", "16", "42", "61");

if($location == "1" ){ $prices = $prices_1; }
if($location == "2" ){ $prices = $prices_2; }
if($location == "3" ){ $prices = $prices_3; }
if($location == "4" ){ $prices = $prices_4; }
if($location == "5" ){ $prices = $prices_5; }
if($location == "6" ){ $prices = $prices_6; }
if($location == "7" ){ $prices = $prices_7; }
if($location == "8" ){ $prices = $prices_8; }
if($location == "9" ){ $prices = $prices_9; }

$_POST['item_1'] = ereg_replace("[^0-9]",'',$_POST['item_1']);
$_POST['item_2'] = ereg_replace("[^0-9]",'',$_POST['item_2']);
$_POST['item_3'] = ereg_replace("[^0-9]",'',$_POST['item_3']);
$_POST['item_4'] = ereg_replace("[^0-9]",'',$_POST['item_4']);
$_POST['item_5'] = ereg_replace("[^0-9]",'',$_POST['item_5']);

$_POST['item_1'] = round($_POST['item_1']);
$_POST['item_2'] = round($_POST['item_2']);
$_POST['item_3'] = round($_POST['item_3']);
$_POST['item_4'] = round($_POST['item_4']);
$_POST['item_5'] = round($_POST['item_5']);

$smuggle = array($smuggle_information[0],$smuggle_information[1],$smuggle_information[2],$smuggle_information[3],$smuggle_information[4]);
$smuggle_total = $_POST['item_1'] + $_POST['item_2'] + $_POST['item_3'] + $_POST['item_4'] + $_POST['item_5'] + array_sum($smuggle);
$smuggle_total_count = $_POST['item_1'] + $_POST['item_2'] + $_POST['item_3'] + $_POST['item_4'] + $_POST['item_5'];
$smuggle_costs = ($_POST['item_1'] * $prices[0]) + ($_POST['item_2'] * $prices[1]) + ($_POST['item_3'] * $prices[2]) + ($_POST['item_4'] * $prices[3]) + ($_POST['item_5'] * $prices[4]);

$smuggle_max = ($rank * 2 ) + 2;
$rand_exp = rand(2,4);

if(isset($_POST['Commit'])){

if((time() <= $smuggle_information[5]) ) {
echo "You can only do one transaction per 4 minutes.";
}else{
if( $smuggle_total > $smuggle_max){
echo "You can't smuggle more then ".$smuggle_max." items at once.";
}else{

if($smuggle_costs > $money){
echo "You don't have enough money for the transaction.";
}else{

if(empty($smuggle_total_count)){
echo "You didn't enter any items you wish to purchase";
}else{

$smuggle_information[0] = $smuggle_information[0] + $_POST['item_1'];
$smuggle_information[1] = $smuggle_information[1] + $_POST['item_2'];
$smuggle_information[2] = $smuggle_information[2] + $_POST['item_3'];
$smuggle_information[3] = $smuggle_information[3] + $_POST['item_4'];
$smuggle_information[4] = $smuggle_information[4] + $_POST['item_5'];

$smuggle_information[5] = strtotime ("+4 minutes");

$arrayrates = array($smuggle_information[0], $smuggle_information[1], $smuggle_information[2], $smuggle_information[3], $smuggle_information[4], $smuggle_information[5]);
$newrates = implode("-", $arrayrates);

$result = mysql_query("UPDATE login SET smuggle='".mysql_real_escape_string($newrates)."',exp=exp+'".mysql_real_escape_string($rand_exp)."', money=money-'".mysql_real_escape_string($smuggle_costs)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$exp = $exp + $rand_exp;


$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money = htmlspecialchars($row->money);

	if($money < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting smuggle.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
	}else{
	
echo "Transaction complete. Total costs $ ".$smuggle_costs.",-";
}
}// if empty
}// if not enough money.
}// if amount is to high.
}// check time.
}// if isset post purchase

// sell all

if(isset($_POST['Sell_All'])){

if (prevent_multi_submit()) {

if((time() <= $smuggle_information[5]) ) {
echo "You can only do one transaction per 4 minutes.";
}else{

$smuggle_reward = ($smuggle_information[0] * $prices[0]) + ($smuggle_information[1] * $prices[1]) + ($smuggle_information[2] * $prices[2]) + ($smuggle_information[3] * $prices[3]) + ($smuggle_information[4] * $prices[4]);

if(empty($smuggle_reward)){
echo "You don't have any items to smuggle.";
}else{

$smuggle_information[0] = 0;
$smuggle_information[1] = 0;
$smuggle_information[2] = 0;
$smuggle_information[3] = 0;
$smuggle_information[4] = 0;
$smuggle_information[5] = strtotime ("+4 minutes");

$arrayrates = array($smuggle_information[0], $smuggle_information[1], $smuggle_information[2], $smuggle_information[3], $smuggle_information[4], $smuggle_information[5]);
$newrates = implode("-", $arrayrates);

$result = mysql_query("UPDATE login SET smuggle='".mysql_real_escape_string($newrates)."',exp=exp+'".mysql_real_escape_string($rand_exp)."', money=money+'".mysql_real_escape_string($smuggle_reward)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$exp = $exp + $rand_exp;
$money = $money + $smuggle_reward;

echo "You sold all your items for $ ".number_format($smuggle_reward).",-";

}// if no items.
}// if time.
}else{
echo "This form has already been submitted.";
}
}// if isset sell all.

// sell

if(isset($_POST['Sell'])){

if (prevent_multi_submit()) {

$smuggle_reward = ($_POST['item_1'] * $prices[0]) + ($_POST['item_2'] * $prices[1]) + ($_POST['item_3'] * $prices[2]) + ($_POST['item_4'] * $prices[3]) + ($_POST['item_5'] * $prices[4]);

if(empty($smuggle_reward)){
echo "You didn't select any items or you don't have any.";
}else{

if(($smuggle_information[0] - $_POST['item_1'] < "0") or ($smuggle_information[1] - $_POST['item_2'] < "0") or ($smuggle_information[2] - $_POST['item_3'] < "0") or ($smuggle_information[3] - $_POST['item_4'] < "0") or ($smuggle_information[4] - $_POST['item_5'] < "0")){
echo "You can't sell items that you don't have.";
}else{

$smuggle_information[0] = $smuggle_information[0] - $_POST['item_1'];
$smuggle_information[1] = $smuggle_information[1] - $_POST['item_2'];
$smuggle_information[2] = $smuggle_information[2] - $_POST['item_3'];
$smuggle_information[3] = $smuggle_information[3] - $_POST['item_4'];
$smuggle_information[4] = $smuggle_information[4] - $_POST['item_5'];
$smuggle_information[5] = strtotime ("+4 minutes");

$arrayrates = array($smuggle_information[0], $smuggle_information[1], $smuggle_information[2], $smuggle_information[3], $smuggle_information[4], $smuggle_information[5]);
$newrates = implode("-", $arrayrates);

$result = mysql_query("UPDATE login SET smuggle='".mysql_real_escape_string($newrates)."',exp=exp+'".mysql_real_escape_string($rand_exp)."', money=money+'".mysql_real_escape_string($smuggle_reward)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$exp = $exp + $rand_exp;
$money = $money + $smuggle_reward;

echo "Transaction complete. You received $ ".number_format($smuggle_reward).",-";

}// if empty.
}// You can't sell items that you don't have.
}else{
echo "Its not allowed to sell the same amount of stock twice.";
}
}// if isset sell

$smuggle = array($smuggle_information[0],$smuggle_information[1],$smuggle_information[2],$smuggle_information[3],$smuggle_information[4]);
$smuggle_total = array_sum($smuggle);

?>