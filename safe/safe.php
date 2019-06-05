<?php

require "config.php";
include "connect.php";
if(isset($_SESSION['user_id'])) {
 // Login ok, update last active
 
 $sql = "UPDATE login SET lastactive=NOW(), counter=counter+1 WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
 mysql_query($sql);
 
}else{
   header("Location: index.php");
     exit();
 }

function prevent_multi_submit($type = "post") {
    $string = "";
    $posted_array = ($type == "get") ? $_GET : $_POST;
    foreach ($posted_array as $val) {
        $string .= $val;
    }
    if (isset($_SESSION['last'])) {
        if ($_SESSION['last'] === md5($string) and time() <= $_SESSION['time'] ) {
            return false;
        } else {
            $_SESSION['last'] = md5($string);
			$_SESSION['time'] = md5(strtotime ("+1 minute"));
            return true;
        }
    } else {
        $_SESSION['last'] = md5($string);
		$_SESSION['time'] = md5(strtotime ("+1 minute"));
        return true;
    }
} 
 
$sql = "SELECT * FROM login WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$id = htmlspecialchars($row->id);
$userip = htmlspecialchars($row->userip);
$name = htmlspecialchars($row->name);
$state = htmlspecialchars($row->state);
$sitestate = htmlspecialchars($row->sitestate);
$password = htmlspecialchars($row->password);
$mail = htmlspecialchars($row->mail);
$money = htmlspecialchars($row->money);
$exp = htmlspecialchars($row->exp);
$rank = htmlspecialchars($row->rank);
$health = htmlspecialchars($row->health);
$weapon = htmlspecialchars($row->weapon);
$gun_skill = htmlspecialchars($row->gun_skill);
$armor = htmlspecialchars($row->armor);
$ammo = htmlspecialchars($row->ammo);
$gang = htmlspecialchars($row->gang);
$messages = htmlspecialchars($row->messages);
$gang = htmlspecialchars($row->gang);
$newmail = htmlspecialchars($row->newmail);
$credits = htmlspecialchars($row->credits);
$bank_money = htmlspecialchars($row->bank);
$location = htmlspecialchars($row->location);
$quote = htmlspecialchars($row->quote);
$donated = htmlspecialchars($row->donated);
$black_jack = htmlspecialchars($row->black_jack);
$button_value = htmlspecialchars($row->button_value);
$button_time = htmlspecialchars($row->button_time);
$crimes = htmlspecialchars($row->crimes);
$smuggle = htmlspecialchars($row->smuggle);
$secret = htmlspecialchars($row->secret);
$url = htmlspecialchars($row->side_url);
$note_pad = htmlspecialchars($row->note_pad);
$travel = htmlspecialchars($row->travel);
$gta = htmlspecialchars($row->gta);
$jail = htmlspecialchars($row->jail);
$bodyguard = htmlspecialchars($row->bodyguard);
$bullet_time = htmlspecialchars($row->bullet_time);
$oc = htmlspecialchars($row->oc);
$ref = htmlspecialchars($row->ref);
$friends = htmlspecialchars($row->friends);
$filter = htmlspecialchars($row->filter);
$picture = htmlspecialchars($row->side_url);
$casino_mode = htmlspecialchars($row->casino);
$counter = htmlspecialchars($row->counter);
$your_ip = htmlspecialchars($row->login_ip);
$war = htmlspecialchars($row->war);
$dice = htmlspecialchars($row->dice);
$dice_info = htmlspecialchars($row->dice_info);
$stock_info = htmlspecialchars($row->stock);
$extortion_name = htmlspecialchars($row->extortion_name);
$extortion_time = htmlspecialchars($row->extortion_time);
$mute = htmlspecialchars($row->mute);
$topic_time = htmlspecialchars($row->topic_time);
$help_desk = htmlspecialchars($row->help_desk);
$blackjack = htmlspecialchars($row->blackjack);
$body = htmlspecialchars($row->body);
$chase = htmlspecialchars($row->chase);
$credit_sale = htmlspecialchars($row->credit_sale);
$credit_price = htmlspecialchars($row->credit_price);
$brewery_stock = htmlspecialchars($row->brewery_stock);
$brewery_level = htmlspecialchars($row->brewery_level);
$brewery_time = htmlspecialchars($row->brewery_time);
$street = htmlspecialchars($row->street);
$char = htmlspecialchars($row->char);

$brewery_level = explode("-", $brewery_level);
$brewery_stock = explode("-", $brewery_stock);
$body = explode("-", $body);
$your_ip_array = explode("-", $your_ip);
$stock_info = explode("-", $stock_info);
$prison_check = explode("-", $jail);
$oc_check = explode("-", $oc);

$sql = "SELECT * FROM sitestats WHERE id='1'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$admins = htmlspecialchars($row->admins);
$managers = htmlspecialchars($row->managers);
$admins_ip = htmlspecialchars($row->admins_ip);
$managers_ip = htmlspecialchars($row->managers_ip);
$page_status = htmlspecialchars($row->status);
$site_locations = htmlspecialchars($row->locations);
$site_protection = htmlspecialchars($row->protection);
$site_protection_price = htmlspecialchars($row->protection_price);
$site_weapon = htmlspecialchars($row->weapon);
$site_weapon_price = htmlspecialchars($row->weapon_price);
$stock_price = htmlspecialchars($row->stock);
$lottery = htmlspecialchars($row->lottery);
$ace_club = htmlspecialchars($row->ace_club);
$hdo = htmlspecialchars($row->hdo);
$site_ranks = htmlspecialchars($row->ranks);
$site_wealth = htmlspecialchars($row->wealth);
$site_cars = htmlspecialchars($row->cars);

$stock_price = explode("-", $stock_price);
$admin_array = explode("-", $admins);
$manager_array = explode("-", $managers);
$hdo_array = explode("-", $hdo);
$admin_ip_array = explode("-", $admins_ip);
$manager_ip_array = explode("-", $managers_ip);
$page_status_array = explode("-", $page_status);
if(!empty($site_locations)){ $location_array = explode("-", $site_locations); }
if(!empty($site_protection)){ $protection_array = explode("-", $site_protection); }
if(!empty($site_protection_price)){ $protection_cost_array = explode("-", $site_protection_price); }
if(!empty($site_weapon)){ $gun_array = explode("-", $site_weapon); }
if(!empty($site_weapon_price)){ $gun_cost_array = explode("-", $site_weapon_price); }
if(!empty($site_ranks)){ $rank_array = explode("-", $site_ranks); }
if(!empty($site_wealth)){ $wealth_array = explode("-", $site_wealth); }
if(!empty($site_cars)){ $car_park = explode("-", $site_cars); }

// ip protection.

if($_SERVER['REMOTE_ADDR'] != $userip){
header("Location: index.php");
     exit();
}


// casino mode.

$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0];

if($casino_mode == 2 and $_SERVER['REQUEST_URI'] != "/keno" and $_SERVER['REQUEST_URI'] != "/horseracing" and $_SERVER['REQUEST_URI'] != "/roulette" and $_SERVER['REQUEST_URI'] != "/war" and $_SERVER['REQUEST_URI'] != "/rps" and $_SERVER['REQUEST_URI'] != "/m_dice" and $_SERVER['REQUEST_URI'] != "/ace_club" and $_SERVER['REQUEST_URI'] != "/blackjack" and $_SERVER['REQUEST_URI'] != "/poker" and $_SERVER['REQUEST_URI'] != "/russian_roulette" and $_SERVER['REQUEST_URI'] != "/lottery"){

$result = mysql_query("UPDATE login SET casino='1' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());
}

// jail.

if((time() > $prison_check[0] ) and ($prison_check[1] == "1")) {

$result = mysql_query("UPDATE login SET jail='0-0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$jail = "0-0";
$prison_check = explode("-", $jail);
}// if jail time is over.

// update button value.

if(time() >= $button_time) {

for ($i = 0; $i < 5; $i++) {
$cnum[$i] = rand(0,9);
}// five random numbers.
$digit = "$cnum[0]$cnum[1]$cnum[2]$cnum[3]$cnum[4]";

$result = mysql_query("UPDATE login SET button_value='".mysql_real_escape_string($digit)."', button_time='".mysql_real_escape_string(strtotime("+1 minute"))."', counter='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'") 
or die(mysql_error());

$set_value_button = true;

}

// rank updater.

// rank 2

if(($rank == "0") and ($exp >= $rank_exp_array[0]) and !empty($rank_exp_array[0])){

$message = "You have been promoted to ".$rank_array[1]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
		
$result = mysql_query("UPDATE login SET rank='1',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());

}

// rank 3

if(($rank == "1") and ($exp >= $rank_exp_array[1]) and !empty($rank_exp_array[1])){

$message = "You have been promoted to ".$rank_array[2]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET rank='2',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 2;
}

//rank 4

if(($rank == "2") and ($exp >= $rank_exp_array[2]) and !empty($rank_exp_array[2])){

$message = "You have been promoted to ".$rank_array[3]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET rank='3',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 3;
}

// rank 5

if(($rank == "3") and ($exp >= $rank_exp_array[3]) and !empty($rank_exp_array[3])){

$message = "You have been promoted to ".$rank_array[4]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);	
			
$result = mysql_query("UPDATE login SET rank='4',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 4;

if(!empty($ref) and empty($page_status_array[11])){

$query = "SELECT login_ip FROM login WHERE name='".mysql_real_escape_string($_POST[$ref])."'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

$login_ip = explode("-", $row['login_ip']);

$count_prevent = false;
foreach( $your_ip_array as $key => $value){
	if (in_array($value, $login_ip)) {
		$count_prevent = true;
	}
}

if ($count_prevent == false) {

$message = "You received $ 10,000,- for the referral of a active member.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($ref). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($ref). "'";
$res = mysql_query($sql);	

$result = mysql_query("UPDATE login SET money=money+'10000',newmail='0' WHERE name='".mysql_real_escape_string($ref)."'")
or die(mysql_error());
}
}
}

//rank 6

if(($rank == "4") and ($exp >= $rank_exp_array[4]) and !empty($rank_exp_array[4])){

$message = "You have been promoted to ".$rank_array[5]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);	
		
$result = mysql_query("UPDATE login SET rank='5',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 5;
}

// rank 7

if(($rank == "5") and ($exp >= $rank_exp_array[5]) and !empty($rank_exp_array[5])){

$message = "You have been promoted to ".$rank_array[6]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
		
$result = mysql_query("UPDATE login SET rank='6',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 6;
}

//rank 8

if(($rank == "6") and ($exp >= $rank_exp_array[6]) and !empty($rank_exp_array[6])){

$message = "You have been promoted to ".$rank_array[7]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);	
			
$result = mysql_query("UPDATE login SET rank='7',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 7;
}

// rank 9

if(($rank == "7") and ($exp >= $rank_exp_array[7]) and !empty($rank_exp_array[7])){

$message = "You have been promoted to ".$rank_array[8]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);	
			
$result = mysql_query("UPDATE login SET rank='8',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 8;
}

// rank 10

if(($rank == "8") and ($exp >= $rank_exp_array[8]) and !empty($rank_exp_array[8])){

$message = "You have been promoted to ".$rank_array[9]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
		
$result = mysql_query("UPDATE login SET rank='9',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 9;
}

// rank 11

if(($rank == "9") and ($exp >= $rank_exp_array[9]) and !empty($rank_exp_array[9])){

$message = "You have been promoted to ".$rank_array[10]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET rank='10',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 10;
}

// rank 12

if(($rank == "10") and ($exp >= $rank_exp_array[10]) and !empty($rank_exp_array[10])){

$message = "You have been promoted to ".$rank_array[11]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
		
$result = mysql_query("UPDATE login SET rank='11',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 11;
}

// rank 13

if(($rank == "11") and ($exp >= $rank_exp_array[11]) and !empty($rank_exp_array[11])){

$message = "You have been promoted to ".$rank_array[12]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET rank='12',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 12;
}


// rank 14

if(($rank == "12") and ($exp >= $rank_exp_array[12]) and !empty($rank_exp_array[12])){

$message = "You have been promoted to ".$rank_array[13]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET rank='13',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 13;
}

// rank 15

if(($rank == "13") and ($exp >= $rank_exp_array[13]) and !empty($rank_exp_array[13])){

$message = "You have been promoted to ".$rank_array[14]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET rank='14',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());
$rank = 14;
}

// rank 16

if(($rank == "14") and ($exp >= $rank_exp_array[14]) and !empty($rank_exp_array[14])){

$message = "You have been promoted to ".$rank_array[15]." Keep on going.";

$sql = "INSERT INTO pm SET id = '', sendto = '" .mysql_real_escape_string($name). "', message = '" .mysql_real_escape_string($message). "', sendby = '" .mysql_real_escape_string($name). "'";
$res = mysql_query($sql);		
			
$result = mysql_query("UPDATE login SET rank='15',newmail='0' WHERE id='".mysql_real_escape_string($_SESSION['user_id'])."'")
or die(mysql_error());

}

//

$lang_empty_field = "You left one or more fields open.";
$lang_no_user = "This person does not seem to exist.";
$lang_self_sent = "Transactions to the same account aren't allowed.";
$lang_incorrect_password = "The given password didn't match.";
$lang_no_money = "You don't have that much money.";
$lang_to_high = "You may not sent more then $ 9,999,999,999.";
$lang_if_banned = "Its not allowed to sent money to people that have been banned.";
$lang_if_killed = "Its not allowed to sent money to people that have been murdered.";
$lang_if_unlogged = "Its not allowed do do transactions with people that havent logged in yet.";
$lang_if_family = "Its not allowed to do transactions with a family account.";
$lang_no_verification = "The verification code did not match.";
$lang_no_gang = "No gang.";


?>