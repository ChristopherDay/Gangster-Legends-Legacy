<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_help_desk_reply.php"){
exit();
}

if(!empty($_GET['name'])){

$result = mysql_query("UPDATE login SET help_desk='' WHERE name='".mysql_real_escape_string($_GET['name'])."'")
or die(mysql_error());

}

?>