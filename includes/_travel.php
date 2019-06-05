<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_travel.php"){
exit();
}

				if($location == "1"){$travel_disabled_1 = "disabled='yes'"; 
				$price= array("0","150","125","360","490","275","150","340","210");}
				
				if($location == "2"){$travel_disabled_2 = "disabled='yes'";
				$price= array("150","0","140","350","440","290","150","310","175");}
				
				if($location == "3"){$travel_disabled_3 = "disabled='yes'";
				$price= array("360","350","0","350","300","500","375","175","290");}
				
				if($location == "4"){$travel_disabled_4 = "disabled='yes'";
				$price= array("125","140","360","0","475","275","150","325","175");}
				
				if($location == "5"){$travel_disabled_5 = "disabled='yes'";
				$price= array("275","290","275","500","0","500","260","475","340");}
				
				if($location == "6"){$travel_disabled_6 = "disabled='yes'";
				$price= array("490","440","475","300","500","0","475","275","410");}
				
				if($location == "7"){$travel_disabled_7 = "disabled='yes'";
				$price= array("150","150","150","375","175","260","0","340","200");}
				
				if($location == "8"){$travel_disabled_8 = "disabled='yes'";
				$price= array("340","310","325","175","275","475","340","0","275");}
				
				if($location == "9"){$travel_disabled_9 = "disabled='yes'";
				$price= array("210","175","175","290","410","340","200","275","0");}

if(isset($_POST['Travel'])){

if((time() <= $travel) ) {
echo "There are currently no departures.";
}else{

if($money < $price[$_POST['Location']-1]){
echo "You don't have enough money to travel;";
}else{

if((time() <= $travel_time) ) {
echo "We are really sorry but there are no departure's at the moment.";
}else{

if(($_POST['Location'] > "9") or ( $_POST['Location'] < "1")){
echo "Invalid Location.";
}else{

mysql_query("UPDATE login SET location='".mysql_real_escape_string($_POST['Location'])."',money=money-'".mysql_real_escape_string($price[$_POST['Location']-1])."',travel='".mysql_real_escape_string(strtotime("+59 minutes 59 seconds"))."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$money = $money - $price[$_POST['Location']-1];
$location = $_POST['Location'];

}// if no time.
}// if no money to travel.
}// location check.
}// time check.
}// if post travel.


?>