<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_forum_view.php"){
exit();
}

// update topic

if ($_POST['Edit'] == "Edit")
{ 
$datum = date("m-d-y-H:i:s");

$sql = "SELECT naam FROM topics WHERE id = '" .mysql_real_escape_string($_GET['id']). "'"; 
$res = mysql_query($sql) or die(mysql_error()); 
$row = mysql_fetch_array($res);
if ( $row['naam'] != $name and (!in_array($name, $admin_array) and !in_array($name, $manager_array))){
echo "You are not allowed to edit this post.";
}else{

$m_check = str_replace(' ', '', $_POST['message']);
$t_check = str_replace(' ', '', $_POST['topictitle']);

if((empty($m_check)) or (empty($t_check))){ 
echo "All fields need to be filled.";
}else{

if (strlen($_POST['topictitle']) > "50"){
echo "Your subject may not be longer then 50 characters.";
}else{

$result = mysql_query("UPDATE topics SET bericht = '" .mysql_real_escape_string($_POST['message']). "', titel = '" .mysql_real_escape_string($_POST['topictitle']). "' WHERE id = '" .mysql_real_escape_string($_GET['id']). "'") 
or die(mysql_error()); 

echo "Your topic has been updated.";
	
	}// if subject is larger then 50 characters.
	}// if fields are empty.
	}// name check.
	}// if post edit.

// page script.

$amount = 10;

$csql = "SELECT * FROM replys WHERE tid = '" .mysql_real_escape_string($_GET['id']). "' ORDER BY datum DESC"; 
$cres = mysql_query($csql) or die(mysql_error());
$totaltopics = mysql_num_rows($cres);

if (empty($_GET['page'])){
$page = 1;
}else {
$page = $_GET['page'];
}

$min = $amount * ( $page - 1 );
$max = $amount;
if ($min<0) {$min=0;}

$sql = "SELECT * FROM topics WHERE id = '" .mysql_real_escape_string($_GET['id']). "'"; 
$res = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($res);

$datum = date("m-d-y-H:i:s");

if(isset($_POST['Reply'])){

$m_check = str_replace(' ', '', $_POST['message']);

if (empty($m_check)){
echo "You didn't type anything in the message box.";
}
else {

if(!in_array($name, $admin_array) and !in_array($name, $manager_array) and $row['locked'] == "2"){
echo "You can't post in a locked topic.";
}else {

if((time() <= $mute) ) {
echo "You can't reply in topics when you are muted.<br /><b>Time left:</b>".date( "00:i:s", $mute - time() ).".";
}else{

$sql = "INSERT INTO replys SET id = '', naam = '" .mysql_real_escape_string($name). "', bericht = '" .mysql_real_escape_string($_POST['message']). "', datum = '" .mysql_real_escape_string($datum). "', tid = '" .mysql_real_escape_string($_GET['id']). "', topictype = '" .mysql_real_escape_string($_GET['id']). "'";
$res = mysql_query($sql);

$result = mysql_query("UPDATE topics SET datum='" .mysql_real_escape_string($datum). "' WHERE id = '" .mysql_real_escape_string($_GET['id']). "'") 
or die(mysql_error()); 

}// if muted
}// if locked.
}// if empty
}// if post reply

// selecting reply's.

$sql = "SELECT id,titel,bericht,datum,naam FROM topics WHERE id = '" .mysql_real_escape_string($_GET['id']). "'"; 
$res = mysql_query($sql); 
$row = mysql_fetch_array($res); 

// delete reply topic.

if ( $_GET['action'] == "Rreply" and ( in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array))){ 

mysql_query("DELETE FROM replys WHERE id='".mysql_real_escape_string($_GET['rid'])."'") 
or die(mysql_error()); 

echo "Reply Deleted.";

}

// lock topic script.

if (( $_GET['action'] == "lock" ) and ($row['naam'] == $name)){ 

$stresult = mysql_query("UPDATE topics SET locked='2' WHERE id='".mysql_real_escape_string($_GET['id'])."'")
or die(mysql_error());

echo "The topic has been locked.";

}

if(!empty($_GET['mute']) and ( in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array))){

	if(in_array($_GET['mute'], $admin_array) or in_array($_GET['mute'], $manager_array) or in_array($_GET['mute'], $hdo_array)){
		echo "Its not allowed to mute staff members.";
	}else{
echo "".$_GET['mute']." has been muted for one hour.";

mysql_query("UPDATE login SET mute='".mysql_real_escape_string(strtotime("+59 minutes 59 seconds"))."' WHERE name='".mysql_real_escape_string($_GET['mute'])."'") 
or die(mysql_error());
	}
}
?>
