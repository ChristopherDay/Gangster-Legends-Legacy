<?

$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_auction.php"){
exit();
}

$_POST['credits'] = ereg_replace("[^0-9]",'',$_POST['credits']);
$_POST['credits'] = round($_POST['credits']);
$_POST['price'] = ereg_replace("[^0-9]",'',$_POST['price']);
$_POST['price'] = round($_POST['price']);
$_POST['price_new'] = ereg_replace("[^0-9]",'',$_POST['price_new']);
$_POST['price_new'] = round($_POST['price_new']);

if(isset($_POST['Add']) and !empty($_POST['price']) and !empty($_POST['credits']) and prevent_multi_submit() and strlen($_POST['price_new']) < 11){
	if($credits < $_POST['credits']){
		echo "You don't have that many credits.";
	}else{
		
$result = mysql_query("UPDATE login SET credits=credits-'".mysql_real_escape_string($_POST['credits'])."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());

$sql = "SELECT credits FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$credits = htmlspecialchars($row->credits);

if($credits < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting Auction.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{
		
		$result = mysql_query("UPDATE login SET credit_sale=credit_sale+'".mysql_real_escape_string($_POST['credits'])."', credit_price = '".mysql_real_escape_string($_POST['price'])."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
		
		$credit_sale = $_POST['credits'];
		echo "Your auction has been added.";
		
		}
	}
}

if(isset($_POST['Update']) and !empty($_POST['price_new']) and strlen($_POST['price_new']) < 11){

$result = mysql_query("UPDATE login SET credit_price = '".mysql_real_escape_string($_POST['price_new'])."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());

echo "Your auction price has been updated.";

}

if(isset($_POST['Purchase']) and prevent_multi_submit() and !empty($_POST['name']) and $_POST['name'] != $name){
	
$sql = "SELECT credit_sale,credit_price,login_ip FROM login WHERE name='".mysql_real_escape_string($_POST['name'])."' and sitestate = '0'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$credit_sale_p = htmlspecialchars($row->credit_sale);
$credit_price_p = htmlspecialchars($row->credit_price);
$login_ip = htmlspecialchars($row->login_ip);
$login_ip = explode("-", $login_ip);


	if(empty($credit_price_p)){
		echo "This person does not seem to exist.";
	}else{
		if(empty($credit_sale_p)){
			echo "This person has no credits for sale.";
		}else{
			if($money < $credit_price_p){
				echo "You don't have enough money to purchase these credits.";
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

				
$result = mysql_query("UPDATE login SET money =money-'".mysql_real_escape_string($credit_price_p)."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
			
$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money = htmlspecialchars($row->money);

if($money < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting with auction.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

$result = mysql_query("UPDATE login SET credit_sale=credit_sale-'".mysql_real_escape_string($credit_sale_p)."' WHERE name='".mysql_real_escape_string($_POST['name'])."'")
or die(mysql_error());

$sql = "SELECT credit_sale FROM login WHERE name='".mysql_real_escape_string($_POST['name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$credit_sale_check = htmlspecialchars($row->credit_sale);

if($credit_sale_check < 0){

$result = mysql_query("UPDATE login SET money =money+'".mysql_real_escape_string($credit_price_p)."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());

$money = $money + $credit_price_p;

echo "This person does not have any credits for sale.";
}else{		

$result = mysql_query("UPDATE login SET credits =credits+'".mysql_real_escape_string($credit_sale_p)."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());	

$result = mysql_query("UPDATE login SET money =money+'".mysql_real_escape_string($credit_price_p)."', newmail='0' WHERE name='".mysql_real_escape_string($_POST['name'])."'")
or die(mysql_error());

$message = "Your credits have been sold.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($_POST['name']). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($_POST['name']). "'";
$res = mysql_query($sql);	

$sql = "INSERT INTO credit_transactions SET id = '', receiver = '" .mysql_real_escape_string($_POST['name']). "', name = '" .mysql_real_escape_string($name). "', amount = '".mysql_real_escape_string($credit_sale_p). "', price='".mysql_real_escape_string($credit_price_p)."'";
$res = mysql_query($sql);	

$credits = $credits + $credit_sale_p;
echo "You used $ ".number_format($credit_price_p).",- to purchase ".number_format($credit_sale_p)." credits.";
}
}
}
}
			}
		}
	}
}

?>