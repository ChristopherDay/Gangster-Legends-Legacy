<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_credits.php"){
exit();
}

$item_cost = array("60", "120", "180", "10", "20", "10", "50", "100", $gun_cost_array[5], $gun_cost_array[6], $protection_cost_array[5], $protection_cost_array[6], "15", "50", "200", "50", "5", "50", "500", "1000", "150", "250", "400");

$no_credit_message = "You don't have that many credits.";

if(isset($_POST['Purchase'])){

if(empty($_POST['item'])){
echo "You didn't select the item you wish to purchase.";
}else{

if($_POST['item'] == "1"){

if($donated >= 2 ){
echo "You already have a Silver Account or higher.";
}else{

if($credits < $item_cost[0]){
echo $no_credit_message;
}else{

$result = mysql_query("UPDATE login SET ammo=ammo+'1000', credits=credits-'60', money=money+'25000', exp=exp+'1000', donated='2' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "' AND donated='1'") 
or die(mysql_error());

$money = $money + 25000;
$exp = $exp + 1000;
$ammo = $ammo + 1000;
$credits = $credits - $item_cost[0];
echo "You now have a Silver Account.";

}// if not enough credits.
}// if already silver.
}// if item is 1

if($_POST['item'] == "2"){

if($donated != 2 ){
echo "You need to have a silver account first.";
}else{

if($donated >= 3 ){
echo "You already have a Gold Account or higher.";
}else{

if($credits < $item_cost[1]){
echo $no_credit_message;
}else{

$result = mysql_query("UPDATE login SET ammo=ammo+'3000', credits=credits-'120', money=money+'100000', exp=exp+'2000', donated='3' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "' AND donated='2'") 
or die(mysql_error());

$money = $money + 100000;
$exp = $exp + 2000;
$ammo = $ammo + 3000;
$credits = $credits - $item_cost[1];
echo "You now have a Gold Account.";

}// if not enough credits.
}// if no silver account.
}// if already silver.
}// if item is 2

if($_POST['item'] == "3"){

if($donated != 3 ){
echo "You need to have a gold account first.";
}else{

if($donated == 4 ){
echo "You already have a Platinum Account.";
}else{

if($credits < $item_cost[2]){
echo $no_credit_message;
}else{

$result = mysql_query("UPDATE login SET ammo=ammo+'6000', credits=credits-'180', money=money+'250000', exp=exp+'5000', donated='4' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "' AND donated='3'") 
or die(mysql_error());

$money = $money + 250000;
$exp = $exp + 5000;
$ammo = $ammo + 6000;
$credits = $credits - $item_cost[2];
echo "You now have a Platinum Account.";

}// if not enough credits.
}// if no silver account.
}// if already silver.
}// if item is 3

if($_POST['item'] == "4"){

if($credits < $item_cost[3]){
echo $no_credit_message;
}else{

if($health == "100"){
echo "You already have 100% health.";
}else{

$result = mysql_query("UPDATE login SET health='100', credits=credits-'".mysql_real_escape_string($item_cost[3])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$health = 100;
$credits = $credits - $item_cost[3];
echo "You recoverd your health to 100%.";

}// health check
}// credit check.

}// if item is 4

if($_POST['item'] == "5"){

if($credits < $item_cost[4]){
echo $no_credit_message;
}else{

if($gun_skill == "100"){
echo "You already have 100% gun skill with your current weapon.";
}else{

$result = mysql_query("UPDATE login SET gun_skill='100', credits=credits-'".mysql_real_escape_string($item_cost[4])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[4];
echo "You received 100% gun skill for your current weapon.";

}// health check
}// credit check.
}// if item is 5

if($_POST['item'] == "6"){

if($credits < $item_cost[5]){
echo $no_credit_message;
}else{

$result = mysql_query("UPDATE login SET ammo=ammo+'400', credits=credits-'".mysql_real_escape_string($item_cost[5])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[5];
$ammo = $ammo + 400;
echo "You received 400 extra bullets.";

}// credit check.
}// if item is 6

if($_POST['item'] == "7"){

if($credits < $item_cost[6]){
echo $no_credit_message;
}else{

$result = mysql_query("UPDATE login SET ammo=ammo+'2500', credits=credits-'".mysql_real_escape_string($item_cost[6])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[6];
$ammo = $ammo + 2500;
echo "You received 2500 extra bullets.";

}// credit check.
}// if item is 7

if($_POST['item'] == "8"){

if($credits < $item_cost[7]){
echo $no_credit_message;
}else{

$result = mysql_query("UPDATE login SET ammo=ammo+'6000', credits=credits-'".mysql_real_escape_string($item_cost[7])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[7];
$ammo = $ammo + 6000;
echo "You received 6000 extra bullets.";

}// credit check.
}// if item is 8

if($_POST['item'] == "9"){

if($credits < $item_cost[8]){
echo $no_credit_message;
}else{

if($weapon < 5){
echo "You first need a ".$gun_array[5]." before you can upgrade to the next weapon.";
}else{

if($weapon >= 6){
echo "You already have a ".$gun_array[6];
}else{ 

if($gun_skill < 100){
echo "You need to train your current weapon first before you can purchase a new one.";
}else{

$result = mysql_query("UPDATE login SET weapon='6', credits=credits-'".mysql_real_escape_string($item_cost[8])."', gun_skill='0' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[8];
$weapon = 6;
echo "You received a ".$gun_array[6];

}// skill check
}// weapon check
}// weapon check.
}// credit check.
}// if item is 9

if($_POST['item'] == "10"){

if($credits < $item_cost[9]){
echo $no_credit_message;
}else{

if($weapon < 6){
echo "You first need a ".$gun_array[6]." Before you can upgrade to the next weapon.";
}else{

if($weapon >= 7){
echo "You already have a ".$gun_array[7];
}else{ 

if($gun_skill < 100){
echo "You need to train your current weapon first before you can purchase a new one.";
}else{

$result = mysql_query("UPDATE login SET weapon='7', credits=credits-'".mysql_real_escape_string($item_cost[9])."', gun_skill='0' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[9];
$weapon = 7;
echo "You received a ".$gun_array[7];
}// skill check
}// weapon check
}// weapon check.
}// credit check.
}// if item is 10

if($_POST['item'] == "11"){

if($credits < $item_cost[10]){
echo $no_credit_message;
}else{

if($armor < 5){
echo "You first need a ".$protection_array[5]." Before you can upgrade to the next protection.";
}else{

if($armor >= 6){
echo "You already have a ".$protection_array[6];
}else{ 

$result = mysql_query("UPDATE login SET armor='6', credits=credits-'".mysql_real_escape_string($item_cost[10])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[10];
$armor = 6;
echo "You received a ".$protection_array[6];

}// armor check
}// armor check.
}// credit check.
}// if item is 11

if($_POST['item'] == "12"){

if($credits < $item_cost[11]){
echo $no_credit_message;
}else{

if($armor < 6){
echo "You first need a ".$protection_array[6]." Before you can upgrade to the next protection.";
}else{

if($armor >= 7){
echo "You already have a ".$protection_array[7];
}else{ 

$result = mysql_query("UPDATE login SET armor='7', credits=credits-'".mysql_real_escape_string($item_cost[11])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[11];
$armor = 7;
echo "You received a ".$protection_array[7];

}// armor check
}// armor check.
}// credit check.
}// if item is 12

if($_POST['item'] == "13"){

if($credits < $item_cost[12]){
echo $no_credit_message;
}else{

$result = mysql_query("UPDATE login SET money=money+'10000', credits=credits-'".mysql_real_escape_string($item_cost[12])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[12];
$money = $money + 10000;
echo "You received $ 10,000,- extra money.";

}// credit check.
}// if item is 13

if($_POST['item'] == "14"){

if($credits < $item_cost[13]){
echo $no_credit_message;
}else{

$result = mysql_query("UPDATE login SET money=money+'50000', credits=credits-'".mysql_real_escape_string($item_cost[13])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[13];
$money = $money + 50000;
echo "You received $ 50,000,- extra money.";

}// credit check.
}// if item is 14

if($_POST['item'] == "15"){

if($credits < $item_cost[14]){
echo $no_credit_message;
}else{

$result = mysql_query("UPDATE login SET money=money+'250000', credits=credits-'".mysql_real_escape_string($item_cost[14])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[14];
$money = $money + 250000;
echo "You received $ 250,000,- extra money.";

}// credit check.
}// if item is 15

if($_POST['item'] == "16"){

if($credits < $item_cost[15]){
echo $no_credit_message;
}else{

if(time() >= $oc_check[1]) {
echo "You don't need to reset your bank robbery timer to do one.";
}else{

$result = mysql_query("UPDATE login SET credits=credits-'".mysql_real_escape_string($item_cost[15])."', oc='0-0' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[15];
echo "Your bank robbery timer has been reset.";

}// time check.
}// credit check.
}// if item is 16

if($_POST['item'] == "17"){

if($credits < $item_cost[16]){
echo $no_credit_message;
}else{

if(time() >= $travel) {
echo "You don't need to reset your travel timer to travel.";
}else{

$result = mysql_query("UPDATE login SET credits=credits-'".mysql_real_escape_string($item_cost[16])."', travel='' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[16];
echo "Your travel timer has been reset.";

}// time check.
}// credit check.
}// if item is 17

if($_POST['item'] == "18"){

if($credits < $item_cost[17]){
echo $no_credit_message;
}else{

if($donated != 4){
echo "This option can only be used by people that have a Platinum Account.";
}else{

$result = mysql_query("UPDATE login SET exp=exp+'1000', credits=credits-'".mysql_real_escape_string($item_cost[17])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[17];
$exp = $exp + 1000;
echo "You received a 1000 extra Experience Points.";

}// gold account check.
}// credit check.
}// if item is 18

if($_POST['item'] == "19"){

if($credits < $item_cost[18]){
echo $no_credit_message;
}else{

if($donated != 4){
echo "This option can only be used by people that have a Platinum Account.";
}else{

$result = mysql_query("UPDATE login SET exp=exp+'12000', credits=credits-'".mysql_real_escape_string($item_cost[18])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[18];
$exp = $exp + 12000;
echo "You received a 12000 extra Experience Points.";

}// gold account check.
}// credit check.
}// if item is 19

if($_POST['item'] == "20"){

if($credits < $item_cost[19]){
echo $no_credit_message;
}else{

if($donated != 4){
echo "This option can only be used by people that have a Platinum Account.";
}else{

$result = mysql_query("UPDATE login SET exp=exp+'25000', credits=credits-'".mysql_real_escape_string($item_cost[19])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$credits = $credits - $item_cost[19];
$exp = $exp + 25000;
echo "You received a 25000 extra Experience Points.";

}// gold account check.
}// credit check.
}// if item is 20

if($_POST['item'] == "21"){

if($credits < $item_cost[20]){
echo $no_credit_message;
}else{

if($bodyguard != 0){
echo "You already have one or more bodyguards.";
}else{

$result = mysql_query("UPDATE login SET bodyguard='1', credits=credits-'".mysql_real_escape_string($item_cost[20])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "' AND bodyguard='0'") 
or die(mysql_error());

$credits = $credits - $item_cost[20];
echo "You hired your first Bodyguard.";
$bodyguard = 1;

}// if higher bodyguard already.
}// credit check.
}// if item is 21

if($_POST['item'] == "22"){

if($credits < $item_cost[21]){
echo $no_credit_message;
}else{

if($bodyguard != 1){
echo "You either have more bodyguards already or you need to hire a first one firsts.";
}else{

$result = mysql_query("UPDATE login SET bodyguard='2', credits=credits-'".mysql_real_escape_string($item_cost[21])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "' AND bodyguard='1'") 
or die(mysql_error());

$credits = $credits - $item_cost[21];
$bodyguard = 2;
echo "You hired your second Bodyguard.";

}// guard check.
}// credit check.
}// if item is 21

if($_POST['item'] == "23"){

if($credits < $item_cost[22]){
echo $no_credit_message;
}else{

if($bodyguard != 2){
echo "You need to hire some other bodyguards first or you have 3 already.";
}else{

$result = mysql_query("UPDATE login SET bodyguard='3', credits=credits-'".mysql_real_escape_string($item_cost[22])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "' AND bodyguard='2'") 
or die(mysql_error());

$credits = $credits - $item_cost[22];
echo "You hired your third Bodyguard.";
$bodyguard = 3;
}// if not hired yet.
}// credit check.
}// if item is 23

$sql = "SELECT credits FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$credit_check = htmlspecialchars($row->credits);

if($credit_check < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting credit page.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}

}// if empty item.
}// if isset.

if(isset($_POST['Transfer'])){

if ($button_value == $_POST['userdigit']) {

// select receivers information.
$sql = "SELECT credits,name,sitestate,login_ip FROM login WHERE name='".mysql_real_escape_string($_POST['sendto'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$receivers_name = htmlspecialchars($row->name);
$receivers_credits = htmlspecialchars($row->credits);
$receivers_state = htmlspecialchars($row->sitestate);
$login_ip = htmlspecialchars($row->login_ip);
$login_ip = explode("-", $login_ip);

if((empty($_POST['sendto'])) or (empty($_POST['amount'])) or (empty($_POST['password']))){ 
echo "You left one or more fields empty.";
} else {// check for empty field

$_POST['amount'] = ereg_replace("[^0-9]",'',$_POST['amount']);
$_POST['amount'] = round($_POST['amount']);

if (ereg('[^0-9]', $_POST['amount'])) {
echo "Invalid amount.";
}else {// check if amount is numberic.

if (empty($receivers_name)){
echo "This person does not seem to exist.";
}else {// check if student exists.

if ($receivers_name == $name){
echo "Why would you want to send credits to yourself?";
}else {// check if receiver is not yourselve.

if ( md5($_POST['password']) != $password ){ 
echo "The given password is incorrect.";
}else {// check bankpass

if($credits < $_POST['amount']){
echo "You don't have that many Credits.";
}else{// check if student has enough money.

if($receivers_state == 1){
echo "Its not allowed to send credits to people that have been banned.";
}else{

if($receivers_state == 2){
echo "Its not allowed to send credits to people that have been Assassinated.";
}else{

if (in_array($_SERVER['REMOTE_ADDR'], $login_ip)) {
echo $lang_if_family;
}else{

$count_prevent = false;
foreach( $your_ip_array as $key => $value){
	if (in_array($value, $login_ip)) {
		$count_prevent = true;
	}
}

if ($count_prevent) {
echo $lang_if_family;
}else{

// remove credits.
$remove_result = mysql_query("UPDATE login SET credits=credits-'".mysql_real_escape_string($_POST['amount'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

if($remove_result){

$sql = "SELECT credits FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$credit_check = htmlspecialchars($row->credits);

if($credit_check < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting credits.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

// add credits.
$result = mysql_query("UPDATE login SET credits=credits+'".mysql_real_escape_string($_POST['amount'])."', newmail='0' WHERE name='".mysql_real_escape_string($receivers_name). "'") 
or die(mysql_error());

if($result){

$sql = "INSERT INTO credit_transactions SET id = '', receiver = '" .mysql_real_escape_string($receivers_name). "', name = '" .mysql_real_escape_string($name). "', amount = '".mysql_real_escape_string($_POST['amount']). "'";
$res = mysql_query($sql);

echo "You sent ".number_format($_POST['amount'])." credits to <a href=\"view_profile.php?name=". $receivers_name ."\" onFocus=\"if(this.blur)this.blur()\">".$receivers_name."</a>.";

$credits = $credits - $_POST['amount'];

}

// send message 

 $message = $name." has send you ".$_POST['amount']." Credits.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($receivers_name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		

}// if exploited.
}else{ echo $error;}// if removed.	
}// if duping 2.
}// if duping.
}// if assassinated.
}// if banned.
}// if enough money.
}// password check.
}// if receiver is name.
}// if student doesn't exist.
}// if amount is not numberic.
}// if empty field.
} else {
echo $lang_no_verification;
}// else wrong activation code.

}// if post is send


if(isset($_POST['recover'])){

$sql = "SELECT name,password,sitestate,credits,credit_sale FROM login WHERE name='".mysql_real_escape_string($_POST['name'])."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$recover_name = htmlspecialchars($row->name);
$recover_pass = htmlspecialchars($row->password);
$recover_state = htmlspecialchars($row->sitestate);
$recover_credits = htmlspecialchars($row->credits);
$sale_credits = htmlspecialchars($row->credit_sale);
$total_credits = $recover_credits + $sale_credits;

	if(empty($recover_name)){
		echo "Invalid Information.";
	}else{

		if($recover_state != 2){
			echo "Credits can only be recoverd from accounts that have been killed.";
		}else{

			if(md5($_POST['pass']) != $recover_pass){
				echo "Invalid Information.";
			}else{

				if($total_credits <= 0){
					echo "This account has no unused Credits left.";
				}else{

$removeresult = mysql_query("UPDATE login SET credits=credits-'".mysql_real_escape_string($recover_credits)."', credit_sale=credit_sale-'".mysql_real_escape_string($sale_credits)."' WHERE name='" .mysql_real_escape_string($recover_name). "'") 
or die(mysql_error());

if($removeresult){

$sql = "SELECT credits,credit_sale FROM login WHERE name='".mysql_real_escape_string($_POST['name'])."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$check_credits = htmlspecialchars($row->credits);
$check_credit_sale = htmlspecialchars($row->credit_sale);

if($check_credits <= 0 or $check_credit_sale <= 0){
echo "This account doesn't have any credits left on it.";
}else{

$result = mysql_query("UPDATE login SET credits=credits+'".mysql_real_escape_string($total_credits)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$sql = "INSERT INTO credit_transactions SET id = '', receiver = '" .mysql_real_escape_string($name). "', name = '" .mysql_real_escape_string($recover_name). "', amount = '".mysql_real_escape_string($total_credits). "'";
$res = mysql_query($sql);

echo "You recoverd ".$total_credits." Credits.";

						}
					}
				}
			}
		}
	}
}

?>