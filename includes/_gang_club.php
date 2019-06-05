<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_gang_club.php"){
exit();
}

$psql = "SELECT bank,leader,name,size,quote,members,rec,picture FROM gangs WHERE name='".mysql_real_escape_string($gang)."'";
$query = mysql_query($psql) or die(mysql_error());
$row = mysql_fetch_object($query);
$gang_bank = htmlspecialchars($row->bank);
$gang_leader = htmlspecialchars($row->leader);
$gang_name = htmlspecialchars($row->name);
$gang_size = htmlspecialchars($row->size);
$gang_quote = htmlspecialchars($row->quote);
$gang_members = htmlspecialchars($row->members);
$gang_rec = htmlspecialchars($row->rec);
$gang_picture = htmlspecialchars($row->picture);

if(isset($_POST['Send_money']) and $gang_leader == $name){

$_POST['bank_amount'] = ereg_replace("[^0-9]",'',$_POST['bank_amount']);
$_POST['round'] = ereg_replace("[^0-9]",'',$_POST['round']);
$m_check = str_replace(' ', '', $_POST['send_to']);

	if((empty($m_check)) or (empty($_POST['bank_amount'])) or (empty($_POST['password_transfer']))){ 
		echo "One or more fields where left empty.";
	} else {// check for empty field
		if (ereg('[^A-Za-z0-9]', $_POST['send_to'])) {
			echo "Invalid Name only A-Z,a-z and 0-9 is allowed.";
		}else{

// select receivers information.
$sql = "SELECT login_ip,name,sitestate FROM login WHERE name='".mysql_real_escape_string($_POST['send_to'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$receivers_name = htmlspecialchars($row->name);
$receivers_state = htmlspecialchars($row->sitestate);
$login_ip = htmlspecialchars($row->login_ip);
$login_ip = explode("-", $login_ip);

			if (empty($receivers_name)){
				echo "This person does not seem to exist.";
			}else {// check if student exists.

				if ( md5($_POST['password_transfer']) != $password ){ 
					echo "The given password is incorrect.";
				}else {// check bankpass

					if (strlen($_POST['bank_amount']) > "10"){
						echo "You may not sent more then $ 9,999,999,999.";
					}else{

						if($receivers_state == 1 or $receivers_state == 2){
							echo "Its not allowed to send money to people that have been banned or killed.";
						}else{

							if($gang_bank < $_POST['bank_amount']){
								echo "Your gang bank doesn't have that much money in it.";
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

// remove bank money
$result = mysql_query("UPDATE gangs SET bank=bank-'".mysql_real_escape_string($_POST['bank_amount'])."' WHERE name='".mysql_real_escape_string($gang). "'") 
or die(mysql_error());

if($result){

$psql = "SELECT bank FROM gangs WHERE name='".mysql_real_escape_string($gang)."'";
$query = mysql_query($psql) or die(mysql_error());
$row = mysql_fetch_object($query);
$gang_bank = htmlspecialchars($row->bank);

if($gang_bank < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting gang bank.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}

/////////////////////add money to receivers account//////////////////////	
$result = mysql_query("UPDATE login SET money=money+'".mysql_real_escape_string($_POST['bank_amount'])."' WHERE name='".mysql_real_escape_string($receivers_name). "'") 
or die(mysql_error());

// insert transaction.

$sql = "INSERT INTO gang_bank SET id = '', gang = '" .mysql_real_escape_string($gang). "', name = '" .mysql_real_escape_string($receivers_name). "', amount = '-".mysql_real_escape_string($_POST['bank_amount']). "'";
$res = mysql_query($sql);

$sql = "INSERT INTO bank SET id = '', sendto = '" .mysql_real_escape_string($receivers_name). "', sendby = '" .mysql_real_escape_string($name). "', amount = '".mysql_real_escape_string($_POST['bank_amount']). "'";
$res = mysql_query($sql);

echo "You sent $ ".number_format($_POST['bank_amount']).",- to <a href=\"home.php?pageid=900&studentname=". $receivers_name ."\">".$receivers_name."</a>.";
$money = $money + $_POST['bank_amount'];
}// if removed.

									}	
								}
							}
						}
					}
				}
			}
		}
	}
}


if(isset($_POST['Change']) and $gang_leader == $name){

$m_check = str_replace(' ', '', $_POST['new_name']);

	if(empty($m_check)){
		echo "You didn't enter a new name.";
	}else{
		if ((strlen($_POST['new_name']) > "100") or (strlen($_POST['new_name']) < "4")){
			echo "Your Gangs name needs to be between 4 and 100 characters long.";
		}else{
			if (ereg('[^ A-Za-z0-9]', $_POST['new_name'])) {
				echo "Invalid Name only A-Z,a-z and 0-9 is allowed.";
			}else{

$result = mysql_query("UPDATE gangs SET name='".mysql_real_escape_string($_POST['new_name'])."' WHERE name='" .mysql_real_escape_string($gang_name). "'") 
or die(mysql_error());

$result = mysql_query("UPDATE login SET gang='".mysql_real_escape_string($_POST['new_name'])."' WHERE gang='" .mysql_real_escape_string($gang_name). "'") 
or die(mysql_error());

echo $gang." has been changed to ".htmlspecialchars($_POST['new_name']).".";
$gang = $_POST['new_name'];
			}
		}
	}
}


if(isset($_POST['Update_url']) and $gang_leader == $name){

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

$result = mysql_query("UPDATE gangs SET picture='".mysql_real_escape_string($_POST['Url'])."' WHERE name='".mysql_real_escape_string($gang)."'")
or die(mysql_error());

echo "Your Profile picture has been updated.";

$gang_picture = $_POST['Url'];

			}// if image is to big.
		}// if from imageshack.
	}// if not a valid img type.
}// update quote.


if(isset($_POST['Upgrade']) and $gang_leader == $name and $gang_size != 100){

	if($gang_size == 10 ){ $costs = 250000; $new_size = 25;}
	if($gang_size == 25 ){ $costs = 500000; $new_size = 50;}
	if($gang_size == 50 ){ $costs = 1000000; $new_size = 100;}

	if($costs > $gang_bank){
		echo "You don't have that much money in your bank.";
	}else{

$result = mysql_query("UPDATE gangs SET size='".mysql_real_escape_string($new_size)."',bank= bank-'".mysql_real_escape_string($costs)."' WHERE name='".mysql_real_escape_string($gang)."'")
or die(mysql_error());

$gang_bank = $gang_bank - $costs;
$gang_size = $new_size;
	}
}

if(isset($_POST['Update_rec']) and $gang_leader == $name){

	if($_POST['rec_status'] == 1){
$result = mysql_query("UPDATE gangs SET rec='1' WHERE name='".mysql_real_escape_string($gang)."'")
or die(mysql_error());
$gang_rec = 1;
	}else{
$result = mysql_query("UPDATE gangs SET rec='2' WHERE name='".mysql_real_escape_string($gang)."'")
or die(mysql_error());
$gang_rec = 2;
	}
}

if(isset($_POST['Hitlist']) and $gang_leader == $name){
if ($button_value == $_POST['userdigit']) {

$_POST['amount'] = ereg_replace("[^0-9]",'',$_POST['amount_hitlist']);
$_POST['an'] = ereg_replace("[^0-9]",'',$_POST['an']);
$_POST['amount'] = round($_POST['amount_hitlist']);

if((empty($_POST['target'])) or (empty($_POST['reason'])) or (empty($_POST['amount_hitlist']))){ 

echo "All fields need to be filled.";

} else {
$hitlist_cost = $_POST['amount_hitlist'];
if($_POST['an'] == 2 ){ $hitlist_cost = $hitlist_cost + 25000; }

$nsql = "SELECT name,rank,login_ip FROM login WHERE name='".mysql_real_escape_string($_POST['target'])."'";
$query = mysql_query($nsql) or die(mysql_error());
$row = mysql_fetch_object($query);
$targetname = htmlspecialchars($row->name);
$target_rank = htmlspecialchars($row->rank);
$login_ip = htmlspecialchars($row->login_ip);
$login_ip = explode("-", $login_ip);

if (empty($targetname)){
echo "This person doesn't exist.";
}else {

if ($gang_bank < $hitlist_cost){
echo "You don't have that much money in the bank.";
}
else {

if (strlen($_POST['amount_hitlist']) > "10"){
echo "You may not hitlist somebody for more then $ 9,999,999,999.";
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

$result = mysql_query("UPDATE gangs SET bank=bank-'".mysql_real_escape_string($hitlist_cost)."' WHERE name='".mysql_real_escape_string($gang)."'")
or die(mysql_error());

if($result){

$sql = "SELECT bank FROM gangs WHERE name='".mysql_real_escape_string($gang)."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$gang_bank = htmlspecialchars($row->bank);

if($gang_bank < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting with hitlist.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

$hres = "INSERT INTO hitlist SET id = '', target = '".mysql_real_escape_string($targetname). "', amount = '" .mysql_real_escape_string($_POST['amount']). "', reason = '".mysql_real_escape_string($_POST['reason']). "', paidby = '" .mysql_real_escape_string($name). "', type = '" .mysql_real_escape_string($_POST['an']). "'";
$res = mysql_query($hres);

echo "<a href=\"view_profile.php?name=". $targetname ."\" onFocus=\"if(this.blur)this.blur()\">".$targetname."</a> has been hitlisted.";
			
 $message = "You have been hitlisted.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($targetname). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($targetname). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET newmail='0' WHERE name='" .mysql_real_escape_string($targetname). "'") 
or die(mysql_error());	 

}// if exploited.
}// if payed.
}// if duping 2
}// if duping.
} //if amount is higher then 9.9 bil. 
} ///////////////// if not enough money.	
} ////////// if no user	
} ///////// if empty
} else {
echo $lang_no_verification;
}// else wrong activation code.
} ////// if button

if(isset($_POST['Donate'])){

$_POST['amount'] = ereg_replace("[^0-9]",'',$_POST['amount']);
$_POST['amount'] = round($_POST['amount']);

if(empty($_POST['amount'])){
echo "You didn't enter the amount you wish to download.";
}else{

if ( md5($_POST['password']) != $password ){ 
echo $lang_incorrect_password;
}else {

if($_POST['amount'] > $money){
echo "You don't have that much money.";
}else{

/////////////////////remove gold from senders accaunt.////////////////////////
$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($_POST['amount'])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());


$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money = htmlspecialchars($row->money);

if($money < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting gang bank.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

/////////////////////add money to receivers account//////////////////////	
$result = mysql_query("UPDATE gangs SET bank=bank+'".mysql_real_escape_string($_POST['amount'])."' WHERE name='".mysql_real_escape_string($gang). "'") 
or die(mysql_error());


// insert transaction.

$sql = "INSERT INTO gang_bank SET id = '', gang = '" .mysql_real_escape_string($gang). "', name = '" .mysql_real_escape_string($name). "', amount = '".mysql_real_escape_string($_POST['amount']). "'";
$res = mysql_query($sql);

echo "You donated $ ".number_format($_POST['amount']).",- to your gangs bank.";
$gang_bank = $gang_bank + $_POST['amount'];

}// if expoiting
}// password check.
}// if donation is bigger then money.
}// if empty amount.
}// is isset deposit money to crew bank.

if(isset($_POST['Leave'])){

if($name == $gang_leader){
echo "You can't leave a gang when you are the leader.";
}else{

if($money < 25000){
echo "You don't have enough money to leave this gang.";
}else{

// update profile.

$result = mysql_query("UPDATE login SET gang='',weapon='0',armor='0', money=money-'25000' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$sql = "SELECT money FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$money = htmlspecialchars($row->money);

if($money < 0){

$result = mysql_query("UPDATE login SET sitestate='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$sql = "INSERT INTO banned SET id = '', name = '" .mysql_real_escape_string($name). "', banner = '" .mysql_real_escape_string($site_name). "', reason = 'Exploiting gang bank.'";
$res = mysql_query($sql);

echo "You have been banned for exploiting.";
}else{

// update member counts.

$result = mysql_query("UPDATE gangs SET members=members-'1', bank=bank+'25000' WHERE name='".mysql_real_escape_string($gang). "'") 
or die(mysql_error());
		
echo "You left your gang.";
$gang = "";
$armor = 0;
$weapon =0;

}// if exploiting
}// if not enough money.
}// if leader.
}// if isset leave gang.

if(isset($_POST['accept'])){

if(empty($_POST['invite_id'])){
echo "You didn't select a application.";
}else{

// select receivers information.
$sql = "SELECT name FROM login WHERE name='".mysql_real_escape_string($_POST['invite_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$aply_name = htmlspecialchars($row->name);

if(empty($aply_name)){
echo $lang_no_user;
}else{

if($gang_members >= $gang_size){
echo "this gang can't hold more then ".$gang_size." people.";
}else{

// update new members.

$result = mysql_query("UPDATE login SET gang='".mysql_real_escape_string($gang_name)."' WHERE name='" .mysql_real_escape_string($aply_name). "'") 
or die(mysql_error());

// update member counts.

$result = mysql_query("UPDATE gangs SET members=members+'1' WHERE name='".mysql_real_escape_string($gang). "'") 
or die(mysql_error());

// delete aplication.

$rres = mysql_query("DELETE FROM gang_aply WHERE name='" .mysql_real_escape_string($_POST['invite_id']). "'") 
or die(mysql_error());

echo "".$_POST['invite_id']." has been accepted in the gang.";

}// members count
}// if player doesn't exist.
}// if empty select.
}// if isset.

// decline

if(isset($_POST['Decline'])){

// update new members.

$result = mysql_query("UPDATE gang_aply SET gang='You have been declined.' WHERE name='".mysql_real_escape_string($_POST['invite_id']). "'") 
or die(mysql_error());

echo "",$_POST['invite_id']." has been declined.";

}// if isset.

// kick member.

if(isset($_POST['Kick'])){

if($_POST['members'] == $gang_leader){
echo "You can't be kicked from the gang if you are leading it.";
}else{

// update gang and set newmail.

$result = mysql_query("UPDATE login SET gang='', newmail='0' WHERE name='" .mysql_real_escape_string($_POST['members']). "'") 
or die(mysql_error());

// update member counts.

$result = mysql_query("UPDATE gangs SET members=members-'1' WHERE name='".mysql_real_escape_string($gang). "'") 
or die(mysql_error());

$message = "You have been kicked from your gang.";
$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($_POST['members']). "', message = '" .mysql_real_escape_string($message). "', sendby = '".mysql_real_escape_string($name)."'";
$res = mysql_query($sql);		

echo "".$_POST['members']." has been kicked from the gang.";

}// if leader.
}// if isset leave gang.

if(isset($_POST['Quote'])){
echo "Your quote has been updated.";

$result = mysql_query("UPDATE gangs SET quote='".mysql_real_escape_string($_POST['quote_box'])."' WHERE name='" .mysql_real_escape_string($gang). "'") 
or die(mysql_error());

$gang_quote = $_POST['quote_box'];

}// update quote.

if(isset($_POST['Swap'])){

if($gang_leader != $name ){ 
echo "This function can only be used by the Gang Leader.";
}else{

$sql = "SELECT rank,gang FROM login WHERE name='".mysql_real_escape_string($_POST['leader'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$leader_rank = htmlspecialchars($row->rank);
$leader_gang = htmlspecialchars($row->gang);

if(empty($leader_rank)){
echo "There is nobody with that name.";
}else{

if($leader_rank < 6){
echo "The gang leader needs to be ".$rank_array[6]." or higher to lead a gang.";
}else{

if($leader_gang != $gang ){ 
echo "This person isn't in your gang.";
}else{

$result = mysql_query("UPDATE gangs SET leader='".mysql_real_escape_string($_POST['leader'])."' WHERE name='".mysql_real_escape_string($gang)."'")
or die(mysql_error());

echo $_POST['leader']." is now leading ".$gang.".";
include('escaped.php');

}// if in gang check.
}// if to low in rank
}// if person doesn't exist.
}// leader check.
}// if isset.

?>