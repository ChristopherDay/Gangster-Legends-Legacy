<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_murder.php"){
exit();
}

// add shooting range, hospital and travel agency removal to murder.

if(isset($_POST['Murder'])){

$nsql = "SELECT name,rank,health,armor,gang,location,sitestate,bodyguard,login_ip FROM login WHERE name='".mysql_real_escape_string($_POST['target'])."'";
$query = mysql_query($nsql) or die(mysql_error());
$row = mysql_fetch_object($query);
$target_name = htmlspecialchars($row->name);
$target_rank = htmlspecialchars($row->rank);
$target_rank = $target_rank + 1;
$target_health = htmlspecialchars($row->health);
$target_armor = htmlspecialchars($row->armor);
$target_armor = $target_armor + 1;
$target_gang = htmlspecialchars($row->gang);
$target_location = htmlspecialchars($row->location);
$target_state = htmlspecialchars($row->sitestate);
$target_bodyguard = htmlspecialchars($row->bodyguard);
$login_ip = htmlspecialchars($row->login_ip);
$login_ip = explode("-", $login_ip);

$sql = "SELECT id FROM login WHERE DATE_SUB(NOW(),INTERVAL 24 HOUR) <= signup and name ='".mysql_real_escape_string($target_name)."'";
$query = mysql_query($sql) or die(mysql_error());
$timer_target = mysql_num_rows($query);

if($timer_target == 1){
echo "Its not allowed to kill new players for 24 hours.";
}else{

$sql = "SELECT id FROM login WHERE DATE_SUB(NOW(),INTERVAL 24 HOUR) <= signup and name ='".mysql_real_escape_string($name)."'";
$query = mysql_query($sql) or die(mysql_error());
$your_timer = mysql_num_rows($query);

if($your_timer == 1){
echo "Its not allowed to kill withing 24 hours of signup.";
}else{

if($weapon == 0){
echo "You don't have a gun.";
}else{

if($target_location != $location){
echo "Your target isn't located here.";
}else{

if (in_array($_SERVER['REMOTE_ADDR'], $login_ip)) {
echo $lang_if_family;
}else{

$count_prevent = false;
foreach( $your_ip_array as $key => $value){
	if (in_array($value, $login_ip)) {
		$count_prevent = true;
	}
}

if ($count_prevent) {
echo $lang_if_family;
}else{


if(empty($_POST['car'])){
echo "You need to have a car to escape from the crime scene.";
}else{

$_POST['bullets'] = ereg_replace("[^0-9]",'',$_POST['bullets']);
$_POST['bullets'] = round($_POST['bullets']);

if(empty($_POST['bullets'])){
echo "You didn't enter the amount of bullets you wish to fire.";
}else{

if($ammo < $_POST['bullets']){
echo "You don't have that many bullets.";
}else{

if(empty($_POST['target'])){
echo "You didn't enter a target.";
}else{

if (in_array($target_name, $admin_array) or in_array($target_name, $manager_array)) { 
echo "<b style=\"font-size:36px;\">LMAO Noob.</b>";
}else{

if($target_state != 0 ){
echo "Your target is already dead or banned.";
}else{

if($target_bodyguard >= 1 and $_POST['type'] == 1){
echo "This person is protected by bodyguards.";
}else{

if($target_bodyguard == 0 and $_POST['type'] == 2){
echo "This person doesn't have any bodyguards.";
}else{

if($_POST['type'] == 1){

$bb = $target_rank * ( 400 * round($target_rank / 2) ) + ((8 + $target_armor) * (350 * $target_rank) - ($weapon * (350 * $target_rank))) ;
$bullets_needed = round($bb/100) * $target_health;

if($bullets_needed > $_POST['bullets'] ){

//remove bullets.
$result = mysql_query("UPDATE login SET ammo=ammo-'".mysql_real_escape_string($_POST['bullets'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$sql = "SELECT ammo FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$ammo = htmlspecialchars($row->ammo);

if($ammo < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting murder.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

echo "You failed to kill ".$target_name.".";

$new_health = $target_health - round((( $_POST['bullets'] * 100 )/ $bullets_needed));
if($new_health <= 0 ){ $new_health = 1;}

$result = mysql_query("UPDATE login SET health='".mysql_real_escape_string($new_health)."' WHERE name='" .mysql_real_escape_string($target_name). "'") 
or die(mysql_error());

$sql = "INSERT INTO kills SET id = '', target = '" .mysql_real_escape_string($target_name). "', shooter = '" .mysql_real_escape_string($name). "', rank = '".mysql_real_escape_string($target_rank). "', bullets = '".mysql_real_escape_string($_POST['bullets']). "', reason = '".mysql_real_escape_string($_POST['reason']). "', health = '".mysql_real_escape_string($new_health). "', gang = '".mysql_real_escape_string($target_gang). "', state = '2'";
$res = mysql_query($sql);
echo mysql_error();
}// if exploiting.

}else{

//remove bullets.
$result = mysql_query("UPDATE login SET ammo=ammo-'".mysql_real_escape_string($_POST['bullets'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$sql = "SELECT ammo FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$ammo = htmlspecialchars($row->ammo);

if($ammo < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting murder.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

// hitlist check.

$query = "SELECT SUM(amount) FROM hitlist WHERE target='".mysql_real_escape_string($target_name)."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$hitlist_money = $row['SUM(amount)'];

if($hitlist_money > 1){
$rres = mysql_query("DELETE FROM hitlist WHERE target='" .mysql_real_escape_string($target_name). "'") 
or die(mysql_error());

}// delete if hitlisted.

// update shooter.
$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($hitlist_money)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$money = $money + $hitlist_money;

// update target.
$result = mysql_query("UPDATE login SET sitestate='2' WHERE name='" .mysql_real_escape_string($target_name). "'") 
or die(mysql_error());

$sql = "INSERT INTO kills SET id = '', target = '" .mysql_real_escape_string($target_name). "', shooter = '" .mysql_real_escape_string($name). "', rank = '".mysql_real_escape_string($target_rank). "', gang = '".mysql_real_escape_string($target_gang). "', state = '1', bullets = '".mysql_real_escape_string($_POST['bullets']). "', reason = '".mysql_real_escape_string($_POST['reason']). "', money = '".mysql_real_escape_string($hitlist_money). "'";
$res = mysql_query($sql);

// Properties.

$sql = "SELECT rt FROM location WHERE rt='".mysql_real_escape_string($target_name)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$rt = htmlspecialchars($row->rt);

if(!empty($rt)){
$result = mysql_query("UPDATE location SET rt='No Owner.' WHERE rt='".mysql_real_escape_string($target_name)."'") 
or die(mysql_error());
}

$sql = "SELECT rl FROM location WHERE rl='".mysql_real_escape_string($target_name)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$rl = htmlspecialchars($row->rl);

if(!empty($rl)){
$result = mysql_query("UPDATE location SET rl='No Owner.' WHERE rl='".mysql_real_escape_string($target_name)."'") 
or die(mysql_error());
}

$sql = "SELECT keno FROM location WHERE keno='".mysql_real_escape_string($target_name)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$keno = htmlspecialchars($row->keno);

if(!empty($keno)){
$result = mysql_query("UPDATE location SET keno='No Owner.' WHERE keno='".mysql_real_escape_string($target_name)."'") 
or die(mysql_error());
}

$sql = "SELECT bj FROM location WHERE bj='".mysql_real_escape_string($target_name)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$bj = htmlspecialchars($row->bj);

if(!empty($bj)){
$result = mysql_query("UPDATE location SET bj='No Owner.' WHERE bj='".mysql_real_escape_string($target_name)."'") 
or die(mysql_error());
}

$sql = "SELECT hospital FROM location WHERE hospital='".mysql_real_escape_string($target_name)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$hospital = htmlspecialchars($row->hospital);

if(!empty($hospital)){
$result = mysql_query("UPDATE location SET hospital='No Owner.' WHERE hospital='".mysql_real_escape_string($target_name)."'") 
or die(mysql_error());
}

$sql = "SELECT sr FROM location WHERE sr='".mysql_real_escape_string($target_name)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$sr = htmlspecialchars($row->sr);

if(!empty($sr)){
$result = mysql_query("UPDATE location SET sr='No Owner.' WHERE sr='".mysql_real_escape_string($target_name)."'") 
or die(mysql_error());
}

$sql = "SELECT bulletstore FROM location WHERE bulletstore='".mysql_real_escape_string($target_name)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$bulletstore = htmlspecialchars($row->bulletstore);

if(!empty($bulletstore)){
$result = mysql_query("UPDATE location SET bulletstore='No Owner.' WHERE bulletstore='".mysql_real_escape_string($target_name)."'") 
or die(mysql_error());
}

$sql = "SELECT travel FROM location WHERE travel='".mysql_real_escape_string($target_name)."'";
$query = mysql_query($sql);
$row = mysql_fetch_object($query);
$travel = htmlspecialchars($row->travel);

if(!empty($travel)){
$result = mysql_query("UPDATE location SET travel='No Owner.' WHERE travel='".mysql_real_escape_string($target_name)."'") 
or die(mysql_error());
}


// gang stuff.

if(!empty($target_gang)){

$psql = "SELECT leader,members FROM gangs WHERE name='".mysql_real_escape_string($target_gang)."'";
$query = mysql_query($psql) or die(mysql_error());
$row = mysql_fetch_object($query);
$gang_leader = htmlspecialchars($row->leader);
$gang_members = htmlspecialchars($row->members);

$result = mysql_query("UPDATE gangs SET members='".mysql_real_escape_string($gang_members - 1)."' WHERE name='".mysql_real_escape_string($target_gang). "'") 
or die(mysql_error());


if($gang_leader == $target_name){
$sql = "SELECT name FROM login WHERE gang = '".mysql_real_escape_string($target_gang)."' AND rank!='0' AND rank!='1' AND rank!='2' AND rank!='3' AND rank!='4' AND rank!='5' AND sitestate!='2' AND sitestate!='1' ORDER BY rank DESC"; 
$res = mysql_query($sql) or die(mysql_error()); 
$leader_array = mysql_fetch_array($res);

if(!empty($leader_array)){
$new_leader = $leader_array[array_rand($leader_array, 1)];
}else{
$new_leader = "";
}

if(empty($new_leader)){

// delect gang if no gangleader + is left.

$rres = mysql_query("DELETE FROM gangs WHERE name='" .mysql_real_escape_string($target_gang). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE login SET gang='' WHERE gang='" .mysql_real_escape_string($target_gang). "'") 
or die(mysql_error());

}else{
$result = mysql_query("UPDATE gangs SET leader='".mysql_real_escape_string($new_leader)."' WHERE name='".mysql_real_escape_string($target_gang). "'") 
or die(mysql_error());
}// if successor.

}// if leader.
}// if in gang.

echo "You shot ".number_format($_POST['bullets'])." bullets at ".$target_name." He/She died from the shots.";



}// if exploiting.

}// if killed.
}

if($_POST['type'] == 2){
	
	//remove bullets.
$result = mysql_query("UPDATE login SET ammo=ammo-'".mysql_real_escape_string($_POST['bullets'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$sql = "SELECT ammo FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$ammo = htmlspecialchars($row->ammo);

if($ammo < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting murder.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

if($_POST['bullets'] >= 25000){

echo "You killed a bodyguard.";

$result = mysql_query("UPDATE login SET bodyguard='".mysql_real_escape_string($target_bodyguard - 1)."',newmail='0' WHERE name='" .mysql_real_escape_string($target_name). "'") 
or die(mysql_error());

 $message = $name." has killed one of your bodyguards.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($target_name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($target_name). "'";
$res = mysql_query($sql);

}else{

echo "You failed to kill the body guard.";
}
	}
}

}// if no bodyguards.
}// if protected by bodyguards.
}// if already banned or killed.
}// if staff member.
}// if no target.
}// if no ammo.
}// if no bullets.
}}// hour protection.
}// target location check.
}// ip check.
}// ip check.
}// in no car.
}// if no gun.
}// if isset post murder.

?>