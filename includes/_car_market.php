<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_car_market.php"){
exit();
}

if(isset($_POST['Sell'])){

if(empty($_POST['cars'])){
echo "You didn't select a car.";
}else{

$sql = "SELECT * FROM cars WHERE id='".mysql_real_escape_string($_POST['cars'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$owner = htmlspecialchars($row->owner);
$damage = htmlspecialchars($row->damage);
$type = htmlspecialchars($row->type);
$origin = htmlspecialchars($row->origin);
$selling = htmlspecialchars($row->selling);
$car_id = htmlspecialchars($row->id);

if(empty($owner)){
echo "This car doesn't exist.";
}else{

if($owner != $name){
echo "You can only sell your own cars.";
}else{

$_POST['price'] = ereg_replace("[^0-9]",'',$_POST['price']);
$_POST['price'] = round($_POST['price']);

if (ereg('[^0-9]', $_POST['price'])) {
echo "Invalid amount.";
}else {// check if amount is numberic.

if(empty($_POST['price'])){
echo "You didn't enter the price you want for the car.";
}else{

if($selling == "1"){
echo "You are already selling this car.";
}else{

$result = mysql_query("UPDATE cars SET selling='1',sell_price='".mysql_real_escape_string($_POST['price'])."' WHERE id='" .mysql_real_escape_string($_POST['cars']). "'") 
or die(mysql_error());

echo "You are now selling this car for $ ".number_format($_POST['price']).",-";

}// if already selling.
}// if empty price.
}// if invalid amount.
}// if you don't own the car.
}// if car doesn't exist.
}// if no car selected.
}// if isset post sell.

// purchase car.

if(isset($_POST['Purchase'])){

if(empty($_POST['car_select'])){
echo "You didn't select a car.";
}else{

$sql = "SELECT * FROM cars WHERE id='".mysql_real_escape_string($_POST['car_select'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$owner = htmlspecialchars($row->owner);
$price = htmlspecialchars($row->sell_price);
$type = htmlspecialchars($row->type);

if(empty($owner)){
echo "this car is not for sale.";
}else{

// select receivers information.
$sql = "SELECT login_ip FROM login WHERE name='".mysql_real_escape_string($owner)."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$login_ip = htmlspecialchars($row->login_ip);
$login_ip = explode("-", $login_ip);

if($money < $price){
echo "You don't have enough money to purchase that car.";
}else{

if($name == $owner){
echo "You can't buy your own car.";
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


// update buyers money.

$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($price)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

if($result){

$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money_check = htmlspecialchars($row->money);

if($money_check < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting car market.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{


// update receivers money.

$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($price)."' WHERE name='".mysql_real_escape_string($owner). "'") 
or die(mysql_error());

// send message to seller.

$message = "Somebody bought your ".$car_park[$type - 1]." for $ ".number_format($price).",-";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($owner). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET newmail='0' WHERE name='" .mysql_real_escape_string($owner). "'") 
or die(mysql_error());	

// update car.

$result = mysql_query("UPDATE cars SET location='".mysql_real_escape_string($location)."', owner='".mysql_real_escape_string($name)."', selling = '0' WHERE id='" .mysql_real_escape_string($_POST['car_select']). "'") 
or die(mysql_error());

echo "You bought the ".$car_park[$type - 1];
$money = $money - $price;

}// if not exploited.
}// if removed.
}// if dupe 2
}// if dupe.
}// if car is yours.
}// if not enough money.
}// if car is not for sale.
}// if no car selected.
}// if isset post purchase.

if(isset($_POST['Remove'])){

$sql = "SELECT * FROM cars WHERE id='".mysql_real_escape_string($_POST['remove_car'])."' AND selling='1'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$owner = htmlspecialchars($row->owner);

if(empty($owner)){
echo "This car isn't for sale.";
}else{

if($owner != $name){
echo "This is not your car.";
}else{

if($state == "2"){
echo "This car has already been sold.";
}else{

$result = mysql_query("UPDATE cars SET selling='0' WHERE id='" .mysql_real_escape_string($_POST['remove_car']). "'") 
or die(mysql_error());

echo "You took your car back.";

}// if already sold.
}// if its not your car.
}// if car_sale doesn't exist.
}// if isset post remove.

?>