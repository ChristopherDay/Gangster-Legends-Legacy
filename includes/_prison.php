<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_prison.php"){
exit();
}

$prison_information = explode("-", $jail);

if(isset($_POST['Bust'])){

if(empty($_POST['Inmate'])){
echo "You didn't select a inmate.";
}else{

$sql = "SELECT jail FROM login WHERE name='".mysql_real_escape_string($_POST['Inmate'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$jail_stats = htmlspecialchars($row->jail);
$jail_stats = explode("-", $jail_stats);

if($jail_stats[1] != 1 ){
echo "This person isn't in prison.";
}else{

if($prison_information[1] == 1){
echo "You can't bust people when you are in prison yourself.";
}else{

if($_POST['Inmate'] == $name){
echo "You can't bust yourself out of prison.";
}else{

if(rand(1,6) == 2){
echo "You busted ".$_POST['Inmate']." from prison.";

$message = $name." has set you free from prison.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($_POST['Inmate']). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		

$result = mysql_query("UPDATE login SET newmail='0',jail='0-0' WHERE name='" .mysql_real_escape_string($_POST['Inmate']). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE login SET exp=exp+'2' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

}else{
echo "You failed to bust ".$bust_name." from prison and got thrown into prison yourself.";

$result = mysql_query("UPDATE login SET jail='".strtotime ("+1 minute")."-1' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

}// if name check.
}// if in jail yourselve.
}// jail check.
}// user check
}// if no inmate selected.
}// if bust.

?>