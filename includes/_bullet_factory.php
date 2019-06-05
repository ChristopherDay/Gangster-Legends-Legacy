<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_bullet_factory.php"){
exit();
}

if($_POST['Option'] == 1){ $amount = 200; $price = 10000; $time = "+15 minutes";}
if($_POST['Option'] == 2){ $amount = 400; $price = 18000; $time = "+30 minutes";}
if($_POST['Option'] == 3){ $amount = 600; $price = 35000; $time = "+45 minutes";}
if($_POST['Option'] == 4){ $amount = 800; $price = 50000; $time = "+59 minutes 60 seconds";}

if(isset($_POST['Purchase'])){

if ($button_value == $_POST['userdigit']) {

if((time() <= $bullet_time) ) {
echo "The store is currently out of stock.";
}else{

if(empty($_POST['Option'])){
echo $lang_empty_field;
}else{

if($money < $price){
echo "You don't have that much money.";
}else{

$result = mysql_query("UPDATE login SET ammo=ammo+'".mysql_real_escape_string($amount)."', exp=exp+'5', money=money-'".mysql_real_escape_string($price)."', bullet_time='".strtotime ($time)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money = htmlspecialchars($row->money);

if($money < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting bullets.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}

$ammo = $ammo + $amount;
$exp = $exp + 5;
$dissable = true;
echo "You bought ".number_format($amount)." bullets for $ ".number_format($price).",-.";

if(!empty($ref)){

$result = mysql_query("UPDATE login SET ammo=ammo+'25' WHERE name='".mysql_real_escape_string($ref)."'")
or die(mysql_error());

}

}// if not enough money.
}// if empty field.
}// if no in stock.
} else {
echo "The verification code did not match.";
 }// else wrong activation code.
}// if purchase.

?>