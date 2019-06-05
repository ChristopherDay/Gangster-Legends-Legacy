<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_gang_create.php"){
exit();
}

if(isset($_POST['Create'])){

$res = "SELECT name FROM gangs";
$tquery = mysql_query($res);
$total_gangs = mysql_num_rows($tquery);

if($total_gangs >= 10){
echo "The maximum amount of gangs is currently set at 10.";
}else{

if($money < "50000"){
echo "You don't have enough money to create a new gang.";
}else{

if ((strlen($_POST['gang_name']) > "100") or (strlen($_POST['gang_name']) < "4")){
echo "Your Gangs name needs to be between 4 and 100 characters long.";
}else{

$sql = "SELECT name FROM gangs WHERE name='".mysql_real_escape_string($_POST['gang_name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$gang_name = htmlspecialchars($row->name);

if(!empty($gang_name)){
echo "There already is a gang with that name.";
}else{

if (ereg('[^ A-Za-z0-9]', $_POST['gang_name'])) {
echo "Invalid Name only A-Z,a-z and 0-9 is allowed.";
}else{

if($rank <= 5){
echo "You need to be a ".$rank_array[6]." to start your own gang.";
}else{

if(!empty($gang)){
echo "You are already in a gang.";
}else{

$sql = "INSERT INTO gangs SET id = '', name = '" .mysql_real_escape_string($_POST['gang_name']). "', leader = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);

$result = mysql_query("UPDATE login SET gang='".mysql_real_escape_string($_POST['gang_name'])."', money=money-'50000' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$money = $money - 50000;
$gang = $_POST['gang_name'];
echo "You have started your own gang.";

}// if not enough credits.
}// if already in a gang.
}// if your rank is to low.
}// character check name.
}// if name already exists.
}// name length check.
}// check if all spots are filled.
} // if post start

if(isset($_POST['Apply'])){

$sql = "SELECT name FROM gangs WHERE name='".mysql_real_escape_string($_POST['gang'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$gang_name = htmlspecialchars($row->name);

if(empty($_POST['gang'])){
echo "You didn't select the gang you wish to join.";
}else{

if(!empty($gang)){
echo "You are already in a gang.";
}else{

if(empty($gang_name)){
echo "This gang doesn't exist.";
}else{

$sql = "SELECT id FROM gang_aply WHERE name='".mysql_real_escape_string($name)."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$apply_id = htmlspecialchars($row->id);

if(!empty($apply_id)){
$rres = mysql_query("DELETE FROM gang_aply WHERE id='" .mysql_real_escape_string($apply_id). "'") 
or die(mysql_error());
}

$sql = "INSERT INTO gang_aply SET id = '', gang = '" .mysql_real_escape_string($_POST['gang']). "', name = '" .mysql_real_escape_string($name). "', rank = '" .mysql_real_escape_string($rank). "'";
$res = mysql_query($sql);

echo "Your application to ".$gang_name." has been sent.";

}// if gang doesn't exist.
}// if you are already in a gang.
}// if no gang selected.
}// if isset aply
?>