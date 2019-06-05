<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_message.php"){
exit();
}

if(isset($_POST['Send'])){

$_POST['sendto'] = str_replace(' ', '', $_POST['sendto']);
$m_check = str_replace(' ', '', $_POST['message']);

	if((empty($m_check)) or (empty($_POST['sendto']))){ 
		echo "You left one or more fields open.";
	}else {

$multi_messages = explode("-", $_POST['sendto']);
$multi_messages = array_unique($multi_messages);

		if(count($multi_messages) > 5){
			echo "5 is the maximum amount of people you are allowed to send to at once.";
		}else{ 

// check name
for ($i = 0; $i < count($multi_messages); $i++) {

$query = "SELECT name,filter FROM login WHERE name='".mysql_real_escape_string($multi_messages[$i])."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

$filter_list = explode("-", $row['filter']);

	if($row['name'] == $name){
		echo "<br />Its not allowed to send a message to yourselve.";
	}else{
		if (in_array($name, $filter_list)) {
   			echo "This person does not wish to receive messages from you.";
		}else{
			if(!empty($row['name'])){
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($row['name']). "', message = '" .mysql_real_escape_string($_POST['message']). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);

				if ($res){
	
	$send_to = "<a href=\"view_profile.php?name=".$row['name']."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a>,";
	echo "<br />Your message to ".$send_to." has been sent.";

$result = mysql_query("UPDATE login SET newmail='0' WHERE name='" .mysql_real_escape_string($row['name']). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE login SET messages=messages+'1' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

// unset new.
if (!empty($_GET['reply'])){
$result = mysql_query("UPDATE pm SET rep='2' WHERE id = '".mysql_real_escape_string($_GET['reply'])."'") 
or die(mysql_error());
}

// helpdesk.

if($_GET['action'] == "helpdesk" and (in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array))){

$result = mysql_query("UPDATE login SET help_desk='' WHERE name='".mysql_real_escape_string($_GET['name'])."'")
or die(mysql_error());

}


}else{
    echo "error! Your message could not be sent.";
}
			}else{
echo "<br />".$multi_messages[$i]." doesn't play ".$site_name.".";
			}
		}
	}
}
		}
	}
}

?>