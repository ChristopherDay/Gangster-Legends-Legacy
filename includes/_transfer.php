<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_transfer.php"){
exit();
}
if(isset($_POST['Transfer'])){

if ($button_value == $_POST['userdigit']) {

// select receivers information.
$sql = "SELECT name,login_ip,sitestate,userip FROM login WHERE name='".mysql_real_escape_string($_POST['sendto'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$receivers_name = htmlspecialchars($row->name);
$login_ip = htmlspecialchars($row->login_ip);
$receivers_state = htmlspecialchars($row->sitestate);
$login_ip = explode("-", $login_ip);
$receivers_userip = htmlspecialchars($row->userip);

if((empty($_POST['sendto'])) or (empty($_POST['amount'])) or (empty($_POST['password']))){ 
echo $lang_empty_field;
} else {// check for empty field

$_POST['amount'] = ereg_replace("[^0-9]",'',$_POST['amount']);
$_POST['amount'] = round($_POST['amount']);

if (empty($receivers_name)){
echo $lang_no_user;
}else {// check if student exists.

if ($receivers_name == $name){
echo $lang_self_sent;
}else {// check if receiver is not yourselve.

if ( md5($_POST['password']) != $password ){ 
echo $lang_incorrect_password;
}else {// check bankpass

if($money < $_POST['amount']){
echo $lang_no_money;	
}else{// check if student has enough money.

if (strlen($_POST['amount']) > "10"){
echo $lang_to_high;
}else{

if($receivers_state == 1){
echo $lang_if_banned;
}else{

if($receivers_state == 2){
echo $lang_if_killed;
}else{

if(empty($receivers_userip)){
echo $lang_if_unlogged;
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

$remove_result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($_POST['amount'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

if($remove_result){

$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money = htmlspecialchars($row->money);

if($money < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting bank.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

/////////////////////add money to receivers account//////////////////////	
$send_result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($_POST['amount'])."' WHERE name='".mysql_real_escape_string($receivers_name). "'") 
or die(mysql_error());

/////////////////////////insert into transactions.//////////////////////////////////

$sql = "INSERT INTO bank SET id = '', sendto = '" .mysql_real_escape_string($receivers_name). "', sendby = '" .mysql_real_escape_string($name). "', amount = '".mysql_real_escape_string($_POST['amount']). "'";
$res = mysql_query($sql);

echo "You sent $ ".number_format($_POST['amount']).",- to <a href=\"view_profile.php?name=". $receivers_name ."\" onFocus=\"if(this.blur)this.blur()\">".$receivers_name."</a>.";
}// if exploited.
}else{ echo $error;}// if removed.
}// if unlogged.
}// if duping 2
}// if family.
}// if assassinated.
}// if banned.
}// if the amount is higher then 9.9 bil.
}// if enough money.
}// password check.
}// if receiver is name.
}// if student doesn't exist.
}// if empty field.

} else {
echo $lang_no_verification;
}// else wrong activation code.

}// if post is send
?>