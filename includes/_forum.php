<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_forum.php"){
exit();
}

// pagenation
$amount = 20;

$nsql = "SELECT * FROM topics WHERE topicstate = '0' and type='".mysql_real_escape_string($_GET['type'])."'";            
$nres = mysql_query($nsql) or die(mysql_error());
$totaltopics = mysql_num_rows($nres);

if (empty($_GET['page'])){
$page = 1;
}else {
$page = $_GET['page'];
}

$min = $amount * ( $page - 1 );
$max = $amount;
if ($min<0) {$min=0;}
if($_GET['type'] == 1){ $select_1 = "selected='selected'";}
if($_GET['type'] == 2){ $select_2 = "selected='selected'";}
if($_GET['type'] == 3){ $select_3 = "selected='selected'";}
if($_GET['type'] == 4){ $select_4 = "selected='selected'";}
if($_GET['type'] == 5){ $select_5 = "selected='selected'";}

// auto clean forum script.

if($totaltopics >= 200){

mysql_query("DELETE FROM topics WHERE topicstate=0") 
or die(mysql_error()); 

mysql_query("DELETE FROM replys WHERE topictype= 0") 
or die(mysql_error()); 
}

if(in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array)){

// clean forum script

if ( $_POST['action'] == "Clean Forum" ){ 
mysql_query("DELETE FROM topics WHERE topicstate=0") 
or die(mysql_error()); 

mysql_query("DELETE FROM replys WHERE topictype= 0") 
or die(mysql_error()); 
}

// delete topic script

if ( $_POST['action'] == "Delete" ){ 

$id = $_POST['id'];
if(!empty($id)){
//controleerd of id leeg is of niet
$delete = implode(",",$id);
$delete = explode(",",$delete);
//zorg er voor dat alle te wissen velden doormiddel van een for loop makkelijk te wissen is
for($a = 0; !empty($delete[$a]);$a++){
mysql_query("DELETE FROM topics WHERE id='".mysql_real_escape_string($delete[$a])."'") 
or die(mysql_error()); 

mysql_query("DELETE FROM replys WHERE tid='".mysql_real_escape_string($delete[$a])."'") 
or die(mysql_error()); 
}// for loop.
}// if nothing selected.
}// if isset.

// sticky script.

if ( $_POST['action'] == "Sticky" ){ 

$id = $_POST['id'];
if(!empty($id)){
//controleerd of id leeg is of niet
$delete = implode(",",$id);
$delete = explode(",",$delete);
//zorg er voor dat alle te wissen velden doormiddel van een for loop makkelijk te wissen is
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET topicstate='2' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

$stresult = mysql_query("UPDATE replys SET topictype='2' WHERE tid='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

// lock topic script.

if ( $_POST['action'] == "Lock" ){ 

$id = $_POST['id'];
if(!empty($id)){
//controleerd of id leeg is of niet
$delete = implode(",",$id);
$delete = explode(",",$delete);
//zorg er voor dat alle te wissen velden doormiddel van een for loop makkelijk te wissen is
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET locked='2' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

// unlock topic script.

if ( $_POST['action'] == "Unlock" ){ 

$id = $_POST['id'];
if(!empty($id)){
//controleerd of id leeg is of niet
$delete = implode(",",$id);
$delete = explode(",",$delete);
//zorg er voor dat alle te wissen velden doormiddel van een for loop makkelijk te wissen is
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET locked='1' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

// important script.

if ( $_POST['action'] == "Important" ){ 

$id = $_POST['id'];
if(!empty($id)){
//controleerd of id leeg is of niet
$delete = implode(",",$id);
$delete = explode(",",$delete);
//zorg er voor dat alle te wissen velden doormiddel van een for loop makkelijk te wissen is
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET topicstate='1' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

$stresult = mysql_query("UPDATE replys SET topictype='1' WHERE tid='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

// remove important/sticky script.

if ( $_POST['action'] == "Remove" ){ 

$stresult = mysql_query("UPDATE topics SET topicstate='0' WHERE id='".mysql_real_escape_string($_POST['topic_id'])."'")
or die(mysql_error());

$stresult = mysql_query("UPDATE replys SET topictype='0' WHERE tid='".mysql_real_escape_string($_POST['topic_id'])."'")
or die(mysql_error());

}

// move topic script.

if ($_POST['action'] == "Move"){ 

$id = $_POST['id'];
if(!empty($id)){
//controleerd of id leeg is of niet
$delete = implode(",",$id);
$delete = explode(",",$delete);
//zorg er voor dat alle te wissen velden doormiddel van een for loop makkelijk te wissen is
for($a = 0; !empty($delete[$a]);$a++){

$stresult = mysql_query("UPDATE topics SET type='".mysql_real_escape_string($_POST['type_move'])."' WHERE id='".mysql_real_escape_string($delete[$a])."'")
or die(mysql_error());

}// for loop.
}// if nothing selected.
}// if isset.

}// if allowed.

// add topic script.

if (isset($_POST['Submit'])){
if (prevent_multi_submit()) {

$m_check = str_replace(' ', '', $_POST['message']);
$t_check = str_replace(' ', '', $_POST['topictitle']);

if((empty($t_check)) or (empty($m_check))){ 
echo "All fields need to be filled.";
}
else {
	
if (strlen($_POST['topictitle']) > "50"){
echo "Your subject may not be longer then 50 characters.";
}else{

if((time() <= $mute) ) {
echo "You can't create new topics when you are muted.<br /><b>Time left:</b>".date( "00:i:s", $mute - time() ).".";
}else{

if((time() <= $topic_time) ) {
echo "You may only create one topic per 2 minutes.<br /><b>Time left:</b>".date( "00:i:s", $topic_time - time() ).".";
}else{

$datum = date("m-d-y-H:i:s");
$sql = "INSERT INTO topics SET id = '', titel = '" .mysql_real_escape_string($_POST['topictitle']). "', bericht = '" .mysql_real_escape_string($_POST['message']). "', datum = '" .mysql_real_escape_string($datum). "', naam = '" .mysql_real_escape_string($name). "', type = '" .mysql_real_escape_string($_POST['type']). "'";
$res = mysql_query($sql);

mysql_query("UPDATE login SET topic_time='".mysql_real_escape_string(strtotime("+2 minutes"))."' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

}// if within 2 minutes.
}// if muted.
}// if subject is to long.
}// if empty field
}else{
echo "Its not allowed to create the same topic twice.";
}// if same topic.
}// if post submit.

?>