<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_crimes.php"){
exit();
}

$crime_information = explode("-", $crimes);

if(isset($_POST['Commit'])){
if ($button_value == $_POST['userdigit']) {

$payout = rand($crime_min_payout[$_POST['crime']], $crime_max_payout[$_POST['crime']]);

if(empty($_POST['crime'])){
echo "You didn't select the type of crime you wish to do.";
}else{

if((time() <= $crime_information[6]) ) {
$ts=tstotime(($crime_information[6]-time()));
echo "You can do another crime in ".$ts['m']." Minutes And ".$ts['s']." Seconds";
}else{
//\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/
if ($crime_information[($_POST['crime']-2)]<75 && $_POST['crime']>1) {
echo "You don't have enough experience to do this type of crime!";
} else {

if (in_array($_POST['crime'], array(1, 2, 3, 4, 5, 6))) {
if (rand(0, 100) <=$crime_information[($_POST['crime']-1)]) {
$suc="yes";
echo str_replace('{money}', $payout, $crime_success_text[$_POST['crime']]);
} else if (rand(1, 3)==1) {
$jail="yes";
echo "You failed to commit the crime and the cops caught you.";
} else {
echo "You failed to commit the crime.";
}
}



$crime_information[($_POST['crime']-1)] = $crime_information[($_POST['crime']-1)] + rand(1, 3);

if($crime_information[0] > 100 ){ $crime_information[0] = 100;}
if($crime_information[1] > 100 ){ $crime_information[1] = 100;}
if($crime_information[2] > 100 ){ $crime_information[2] = 100;}
if($crime_information[3] > 100 ){ $crime_information[3] = 100;}
if($crime_information[4] > 100 ){ $crime_information[4] = 100;}
if($crime_information[5] > 100 ){ $crime_information[5] = 100;}

$crime_information[6] = time()+$crime_time[$_POST['crime']];

$newrates = implode("-", $crime_information);

$rand_exp = rand($crime_min_exp[$_POST['crime']], $crime_max_exp[$_POST['crime']]);

if($suc == "yes"){

$result = mysql_query("UPDATE login SET crimes='".mysql_real_escape_string($newrates)."', exp=exp+'".mysql_real_escape_string($rand_exp)."', money=money+'".mysql_real_escape_string($payout)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

}else{

if($jail == "yes"){ 

$result = mysql_query("UPDATE login SET crimes='".$newrates."', jail='".(time()+$crime_jail_time[$_POST['crime']])."-1' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

 }else{

$result = mysql_query("UPDATE login SET crimes='".$newrates."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());
}// if in jail.
}// if no succes.
// new information.
$exp = $exp + $rand_exp;
$money = $money + $payout;
}// crime check.
}// if within timeout.
}// if empty post crime.
				 } else {
echo $lang_no_verification;
 }// else wrong activation code.

}// if post commit

// dissabling.

if($crime_information[0] < 75 ){$disabled_1 = "disabled='yes'";}
if($crime_information[1] < 75 ){$disabled_2 = "disabled='yes'";}
if($crime_information[2] < 75 ){$disabled_3 = "disabled='yes'";}
if($crime_information[3] < 75 ){$disabled_4 = "disabled='yes'";}
if($crime_information[4] < 75 ){$disabled_5 = "disabled='yes'";}

?>