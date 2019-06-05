<?

$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_account.php"){
exit();
}

if(isset($_POST['Add_Friend'])){

$friends_list = explode("-", $friends);

if(empty($_POST['name'])){
echo "You didn't enter a name.";
}else{

if (in_array($_POST['name'], $friends_list)) {
   echo "This person is already in your Friends list.";
}else{

$sql = "SELECT name FROM login WHERE name='".mysql_real_escape_string($_POST['name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$buddy_name = htmlspecialchars($row->name);

if(empty($buddy_name)){
echo $lang_no_user;
}else{

if(empty($friends)){

$result = mysql_query("UPDATE login SET friends='".mysql_real_escape_string($buddy_name)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$friends = $buddy_name;

}else{

$new_friend = $friends."-".$buddy_name;
$result = mysql_query("UPDATE login SET friends='".mysql_real_escape_string($new_friend)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$friends = $new_friend;

}

echo "You added ".$buddy_name." to your friends list.";

}// if empty field.
}// if exist check.
}// if already in check.
}// if isset.

if(isset($_POST['Remove'])){

$friends_list = explode("-", $friends);

if(empty($_POST['friend'])){
echo "You didn't select a friend.";
}else{

if (!in_array($_POST['friend'], $friends_list)) {
   echo "This person isn't in your friends list.";
}else{

$new_friends = "";
foreach( $friends_list as $key => $value){
if($value != $_POST['friend']){
if(empty($new_friends)){
$new_friends = $value;
}else{
$new_friends = $new_friends."-".$value;
}
}
}

$result = mysql_query("UPDATE login SET friends='".mysql_real_escape_string($new_friends)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$friends = $new_friends;

echo "You removed ".$_POST['friend']." from your friends list.";

}// if no friend selected.
}// if not in friendslist.
}// if isset.

if(isset($_POST['Filter'])){

$filter_list = explode("-", $filter);

if(empty($_POST['filter_name'])){
echo "You didn't enter a name.";
}else{

if (in_array($_POST['filter_name'], $filter_list)) {
   echo "This person is already in your filter list.";
}else{

$sql = "SELECT name FROM login WHERE name='".mysql_real_escape_string($_POST['filter_name'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$buddy_name = htmlspecialchars($row->name);

if(empty($buddy_name)){
echo $lang_no_user;
}else{

if(empty($filter)){

$result = mysql_query("UPDATE login SET filter='".mysql_real_escape_string($buddy_name)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$filter = $buddy_name;

}else{

$new_filter = $filter."-".$buddy_name;
$result = mysql_query("UPDATE login SET filter='".mysql_real_escape_string($new_filter)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$filter = $new_filter;

}

echo "You added ".$buddy_name." to your filter list.";

}// if empty field.
}// if exist check.
}// if already in check.
}// if isset.

if(isset($_POST['Remove_filter'])){

$filter_list = explode("-", $filter);

if(empty($_POST['filter_id'])){
echo "You didn't select a friend.";
}else{

if (!in_array($_POST['filter_id'], $filter_list)) {
   echo "This person isn't in your friends list.";
}else{

$new_filter = "";
foreach( $filter_list as $key => $value){
if($value != $_POST['filter_id']){
if(empty($new_filter)){
$new_filter = $value;
}else{
$new_filter = $new_filter."-".$value;
}
}
}

$result = mysql_query("UPDATE login SET filter='".mysql_real_escape_string($new_filter)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$filter = $new_filter;

echo "You removed ".$_POST['filter_id']." from your filter list.";

}// if no friend selected.
}// if not in friendslist.
}// if isset.

if(isset($_POST['Quote'])){
echo "Your quote has been updated.";

$result = mysql_query("UPDATE login SET quote='".mysql_real_escape_string($_POST['quote_box'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$quote = $_POST['quote_box'];

}// update quote.

if(isset($_POST['Update_url'])){

$_POST['Url'] = str_replace(' ', '', $_POST['Url']);
$_POST['Url'] = str_replace('http://', '', $_POST['Url']);
$strip = substr($_POST['Url'], -3);

	if($strip != "gif" and $strip != "jpg" and $strip != "png" and !empty($_POST['Url'])){
		echo 'Only GIF, PNG and JPG Pictures are allowed.';
	}else{

		$url_info = parse_url('http://'.$_POST['Url'] );	
		$info = explode(".",$url_info['host']);		

			if(!in_array('imageshack', $info) and !empty($_POST['Url'])){
				echo "Only pictures from imageshack are allowed.";
echo $url_info['host'];			
			}else{
			
 list($width, $height, $type, $attr) = getimagesize('http://'.$_POST['Url']);

				if($width > 550){
					echo "Error! Your picture may only be 600px or less in width.";
				}else{

$result = mysql_query("UPDATE login SET side_url='".mysql_real_escape_string($_POST['Url'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

echo "Your Profile picture has been updated.";

$picture = $_POST['Url'];

			}// if image is to big.
		}// if from imageshack.
	}// if not a valid img type.
}// update quote.

if (isset($_POST['Update'])){
if ($name='demo') {
	echo 'And why would you want to do this!!!';
} else {
		    $oldpass = md5($_POST['Po']);
		    $newpass = md5($_POST['Pn']);
		    $checkpass = md5($_POST['Pr']);

if ( $oldpass != $password ) {
echo "Invalid Information.";
}else {

if ( $newpass != $checkpass ) {
echo "Invalid Information.";
}else {

if((empty($_POST['Po'])) or (empty($_POST['Pn'])) or (empty($_POST['Pr']))){ 
echo $lang_empty_field;
}
else {

if ((strlen($_POST['Po']) > "20") or (strlen($_POST['Po']) < "6")){
echo "Your Password needs to be between 6 and 20 characters.";
}else{
if ((strlen($_POST['Pn']) > "20") or (strlen($_POST['Pn']) < "6")){
echo "Your Password needs to be between 6 and 20 characters.";
}else{
if ((strlen($_POST['Pr']) > "20") or (strlen($_POST['Pr']) < "6")){
echo "Your Password needs to be between 6 and 20 characters.";
}else{

/////////////////////////// update password //////////////////////////////////

$result = mysql_query("UPDATE login SET password='".mysql_real_escape_string($newpass)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

echo "Your password has been changed.";

} // check characters
} // check characters
} // check characters
} // if field is empty.
} // if new and repeat password don't match
} // if old password is incorrect
} // if demo
} // if post update
?>