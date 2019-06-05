<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_hitlist.php"){
exit();
}

///////////////////////// buyoff script ///////////////////////////////////
if (isset($_POST['buyoff'])){

$isql = "SELECT amount,target FROM hitlist WHERE id='".mysql_real_escape_string($_POST['target_id'])."'";
$query = mysql_query($isql) or die(mysql_error());
$row = mysql_fetch_object($query);
$amount = htmlspecialchars($row->amount);
$target = htmlspecialchars($row->target);

if(empty($_POST['target_id'])){ 

echo "you didn't select a target.";

}else {

if ($money < $amount ){
echo "You don't have enough money to buy the target off the hitlist.";

}else { 

$dres = mysql_query("DELETE FROM hitlist WHERE id='" .mysql_real_escape_string($_POST['target_id']). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($amount)."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());

$money = $money - $amount;

echo "You successfully bought <a href=\"view_profile.php?name=". $target ."\" onFocus=\"if(this.blur)this.blur()\">".$target."</a> off the hitlist.";


} ///// if empty
} ///// if gold
} ///// if buyoff

/////////////////////////////////////////// add script /////////////////////////////////////

if(isset($_POST['Hitlist'])){
if ($button_value == $_POST['userdigit']) {

$_POST['amount'] = ereg_replace("[^0-9]",'',$_POST['amount']);
$_POST['an'] = ereg_replace("[^0-9]",'',$_POST['an']);
$_POST['amount'] = round($_POST['amount']);

if((empty($_POST['target'])) or (empty($_POST['reason'])) or (empty($_POST['amount']))){ 

echo "All fields need to be filled.";

} else {
$hitlist_cost = $_POST['amount'];
if($_POST['an'] == 2 ){ $hitlist_cost = $hitlist_cost + 25000; }

$nsql = "SELECT name,rank,login_ip FROM login WHERE name='".mysql_real_escape_string($_POST['target'])."' and sitestate='0'";
$query = mysql_query($nsql) or die(mysql_error());
$row = mysql_fetch_object($query);
$targetname = htmlspecialchars($row->name);
$target_rank = htmlspecialchars($row->rank);
$login_ip = htmlspecialchars($row->login_ip);
$login_ip = explode("-", $login_ip);

if (empty($targetname)){
echo "This person doesn't exist.";
}else {

if ($money < $hitlist_cost){
echo "You don't have that much money.";
}
else {

if (strlen($_POST['amount']) > "10"){
echo "You may not hitlist somebody for more then $ 9,999,999,999.";
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


$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($hitlist_cost)."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());

if($result){

$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money_check = htmlspecialchars($row->money);

if($money_check < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting with hitlist.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

$hres = "INSERT INTO hitlist SET id = '', target = '".mysql_real_escape_string($targetname). "', amount = '" .mysql_real_escape_string($_POST['amount']). "', reason = '".mysql_real_escape_string($_POST['reason']). "', paidby = '" .mysql_real_escape_string($name). "', type = '" .mysql_real_escape_string($_POST['an']). "'";
$res = mysql_query($hres);

echo "<a href=\"view_profile.php?name=". $targetname ."\" onFocus=\"if(this.blur)this.blur()\">".$targetname."</a> has been hitlisted.";
			
 $message = "You have been hitlisted.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($targetname). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($targetname). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET newmail='0' WHERE name='" .mysql_real_escape_string($targetname). "'") 
or die(mysql_error());	 

$money = $money - $hitlist_cost;

}// if exploited.
}// if payed.
}// if duping 2
}// if duping.
} //if amount is higher then 9.9 bil. 
} ///////////////// if not enough money.	
} ////////// if no user	
} ///////// if empty
} else {
echo $lang_no_verification;
}// else wrong activation code.
} ////// if button
?>