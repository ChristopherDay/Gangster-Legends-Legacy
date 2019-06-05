<?php 
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_detective.php"){
exit();
}	
      
	  
	  
	  
	  
if(isset($_POST['submit'])){
	if($money >= 50000){

$result = mysql_query("UPDATE login SET money=money-'50000' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

	//checken of de username bestaat en of het geen injectie is
	$gangster = strip_tags(stripslashes(mysql_real_escape_string($_POST['user'])));
	$query = 'SELECT name FROM login WHERE name="'.$gangster.'"';
	   $result = mysql_query($query) or die(mysql_error());
	   $rij = mysql_fetch_object($result);
	
	if(count($rij->name)==1){
			
$sQuery = 'INSERT detective(IDUser,user,hours,start_time)VALUES('.$_SESSION['user_id'].',"'.$gangster.'","7200",'.time().')';
    $sResult = mysql_query($sQuery) or die(mysql_error());
      if(count($sResult)==1){
      $oResult =  '<tr><td class="cell"><strong>Your detective is searching for the player.<strong></tr></td>';
      }
}else{
  $oResult = '<tr><td class="cell"><strong>Player does not exist!<strong></tr></td>';
} 
 } else {
 echo "You do not have the required money to hire a detective.";
 }
 }
?>
