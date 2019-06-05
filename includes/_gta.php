<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_gta.php"){
exit();
}

$gta_information = explode("-", $gta);

if(isset($_POST['Commit'])){

if(empty($_POST['crime'])){
echo "You didn't select the type of crime you wish to do.";
}else{

if ($button_value == $_POST['userdigit']) {

if((time() <= $gta_information[0]) ) {
echo "You can only steal a car once per 4 minutes.";
}else{

if(strlen($_POST['target']) > 20 and $_POST['crime'] == 5){
echo "Invalid Target.";
}else{

if($_POST['crime'] == 5){

$nsql = "SELECT name FROM login WHERE name='".mysql_real_escape_string($_POST['target'])."'";
$query = mysql_query($nsql) or die(mysql_error());
$row = mysql_fetch_object($query);
$target_name = htmlspecialchars($row->name);

}

if((empty($target_name) or $name == $target_name)and $_POST['crime'] == 5){
echo "This target doesn't exist.";
}else{

if ((in_array($target_name, $admin_array) or in_array($target_name, $manager_array))and $_POST['crime'] == 5) { 
echo "Its not allowed to use this function on staff members.";
}else{


if (rand(0,100) <= $gta_information[1]) {

	if($_POST['crime'] == 5){
		
$sql = "SELECT id FROM cars WHERE location = '".mysql_real_escape_string($location)."' and selling!='1' and owner='".mysql_real_escape_string($_POST['target'])."'"; 
$res = mysql_query($sql) or die(mysql_error()); 
$car_array = mysql_fetch_array($res);
$stolen_car = $car_array[array_rand($car_array, 1)];

		if(empty($stolen_car)){
			echo "You failed to steal a car.";
		}else{

$query = "SELECT owner,type FROM cars WHERE id='".mysql_real_escape_string($stolen_car)."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

$result = mysql_query("UPDATE cars SET owner='".mysql_real_escape_string($name)."' WHERE id='" .mysql_real_escape_string($stolen_car). "'") 
or die(mysql_error());

// sending message

$result = mysql_query("UPDATE login SET newmail='0' WHERE name='" .mysql_real_escape_string($_POST['target']). "'") 
or die(mysql_error());

 $message = $name." stole one of your cars.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($_POST['target']). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($_POST['target']). "'";
$res = mysql_query($sql);

echo "You stole a ".$car_park[$row['type'] - 1]." from ".$row['owner'].".";
		}
		
	}else{
srand((double)microtime()*1000000);
$random_car = rand (1,8);
$random_damage = rand (0,100);
$up_percentage = 100 - $random_damage; $value = $car_new_value[$random_car - 1] / 100; $value = round($value) * $up_percentage;

$sql = "INSERT INTO cars SET id = '', owner = '" .mysql_real_escape_string($name). "', type = '" .mysql_real_escape_string($random_car). "', origin = '" .mysql_real_escape_string($location). "', location = '" .mysql_real_escape_string($location). "', damage = '" .mysql_real_escape_string($random_damage). "', value = '" .mysql_real_escape_string($value). "'";
$res = mysql_query($sql);	

echo "You stole a ".$car_park[$random_car - 1];
	}
}else{

if(rand(0,3) == 2){
echo "You failed to steal a car and the cops caught you.";
$enter_jail = true;
}else{ 
echo "You failed to steal a car.";}
}// if failed.

$gta_information[0] = strtotime ("+4 minutes");

if($gta_information[1] <= "75" ){ $gta_information[1] = $gta_information[1] + rand(0,4); }else{ $gta_information[1] = "75"; }
if( $gta_information[1] > "75"){ $gta_information[1] = "75"; }

$arrayrates = array($gta_information[0], $gta_information[1]);
$newrates = implode("-", $arrayrates);

if($enter_jail == true){
$new_exp = $exp + rand(3,6);
$result = mysql_query("UPDATE login SET exp='".mysql_real_escape_string($new_exp)."',gta='".mysql_real_escape_string($newrates)."',jail='".strtotime ("+1 minute")."-1' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

}else{

$new_exp = $exp + rand(3,6);
$result = mysql_query("UPDATE login SET exp='".mysql_real_escape_string($new_exp)."',gta='".mysql_real_escape_string($newrates)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());
}// if jail.
 }// gta time check.
 }// name check.
 }// if staff.
 }
} else {
echo "The verification code did not match.";
 }// else wrong activation code.
 }// if no crime selected.
}// if isset steal car.

// if isset.
if(isset($_POST['action'])){

$query = "SELECT * FROM cars WHERE id='".mysql_real_escape_string($_POST['car'])."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

if(empty($_POST['car'])){
echo "You didn't select a car.";
}else{

if($row['owner'] != $name){
echo "This isn't your car.";
}else{

if($location != $row['location']){
echo "You need to be in the same location as the car is.";
}else{

if($row['selling'] == "1"){
echo "You can't use a car that you are selling at the Car Market.";
}else{

// repair.
if($_POST['action'] == "Repair Car."){

$costs = $car_new_value[$row['type'] - 1] - $row['value'];

if($costs > $money){
echo "You don't have enough money to repair the car.";
}else{

if($row['damage'] == 0 ){
echo "This car hasn't got any damage.";
}else{ 

$result = mysql_query("UPDATE cars SET damage='0', value='".mysql_real_escape_string($car_new_value[$row['type'] - 1])."' WHERE id='" .mysql_real_escape_string($_POST['car']). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($costs)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$money = $money - $costs;
echo "You fixed your ".$car_park[$row['type'] - 1];
}// zero damage check.
}// money check.
}// if repair.

// Dispose car.

if($_POST['action'] == "Dispose Car."){

$dres = mysql_query("DELETE FROM cars WHERE id='" .mysql_real_escape_string($_POST['car']). "'") 
or die(mysql_error());

echo "You disposed yourself of the ".$car_park[$row['type'] - 1];

}

// transport car.

if($_POST['action'] == "Transport Car."){

$result = mysql_query("UPDATE cars SET location='".mysql_real_escape_string($_POST['location'])."' WHERE id='" .mysql_real_escape_string($_POST['car']). "'") 
or die(mysql_error());

echo "You transported your ".$car_park[$row['type'] - 1]." to ".$location_array[$_POST['location']]."";
}// if transport.

// Sell car.

if($_POST['action'] == "Sell Car."){

if($row['type'] >=9){
echo "This car doesn't exist.";
}else{

$dres = mysql_query("DELETE FROM cars WHERE id='" .mysql_real_escape_string($_POST['car']). "'") 
or die(mysql_error());

echo "You sold your ".$car_park[$row['type'] - 1]." for $ ".$row['value'].",-";

$money = $money + $row['value'];
$result = mysql_query("UPDATE login SET money='".mysql_real_escape_string($money)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

}// car parts check.
}

}// car market check.
}// same location check.
}// empty car check.
}// owner check.
}// if isset action.

?>