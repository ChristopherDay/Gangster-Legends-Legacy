<?
$page_url = explode(".", $_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = $page_url[0].".php";

if($_SERVER['REQUEST_URI'] == "/_black_market.php"){
exit();
}

if(isset($_POST['Weapon'])){

if($weapon >= 5){
echo "You already have the best weapon money can buy.";
}else{

if($money < $gun_cost_array[$weapon]){
echo "You don't have enough money to Purchase a ".$gun_array[$weapon+1];
}else{

if(($gun_skill < 100) and ($weapon >= 1)){
echo "You need to train your current weapon first before you can purchase a new one.";
}else{

if($weapon == 0){

$result = mysql_query("UPDATE login SET weapon=weapon+'1',money=money-'".mysql_real_escape_string($gun_cost_array[$weapon])."', gun_skill='0' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

}else{

$result = mysql_query("UPDATE login SET weapon=weapon+'1',money=money-'".mysql_real_escape_string($gun_cost_array[$weapon])."', gun_skill='0' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "' AND gun_skill='100'") 
or die(mysql_error());

}
echo "You bought a ".$gun_array[$weapon+1];

$money = $money - $gun_cost_array[$weapon];
$weapon = $weapon + 1;
$gun_skill = 0;

}// gunskill check.
}// if not enough money.
}// weapon check.
}// if post buy weapon

if(isset($_POST['Protection'])){

if($armor >= 5){
echo "You already have the best protection money can buy.";
}else{

if($money < $protection_cost_array[$armor]){
echo "You don't have enough money to Purchase a ".$protection_array[$armor+1];
}else{

$result = mysql_query("UPDATE login SET armor='".mysql_real_escape_string($armor+1)."',money=money-'".mysql_real_escape_string($protection_cost_array[$armor])."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "' and armor<'5'") 
or die(mysql_error());

echo "You bought a ".$protection_array[$armor+1];

$money = $money - $protection_cost_array[$armor];
$armor = $armor + 1;

}// if not enough money.
}// protection check.
}// if post buy weapon

if(isset($_POST['action'])){

$beer_cost = 1500 * $brewery_level[0];
$whisky_cost = 1500 * $brewery_level[1];
$whine_cost = 1500 * $brewery_level[2];

	if($_POST['type'] == "0"){
		echo "You didn't select wich brewery you wish to upgrade.";
	}else{

		if($_POST['type'] == "1"){

			if($brewery_level[0] >= 20){
				echo "You already have the best Beer Brewery money can buy.";
			}else{

				if($money < $beer_cost){
					echo "You don't have enough money to buy this upgrade.";
				}else{

$brewery_level[0] = $brewery_level[0] + 1;

$new_level = implode("-", $brewery_level);

$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($beer_cost)."',brewery_level='".mysql_real_escape_string($new_level)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$money = $money - $beer_cost;

echo "You bought a new upgrade for your Beer Brewery.";

				}
			}
		}

		if($_POST['type'] == "2"){

			if($brewery_level[1] >= 20){
				echo "You already have the best Whisky Brewery money can buy.";
			}else{

				if($money < $whisky_cost){
					echo "You don't have enough money to buy this upgrade.";
				}else{

$brewery_level[1] = $brewery_level[1] + 1;

$new_level = implode("-", $brewery_level);

$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($whisky_cost)."',brewery_level='".mysql_real_escape_string($new_level)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$money = $money - $whisky_cost;

echo "You bought a new upgrade for your Whisky Brewery.";

				}
			}
		}

if($_POST['type'] == "3"){

if($brewery_level[2] >= 20){
echo "You already have the best Wine Brewery money can buy.";
}else{

if($money < $whine_cost){
echo "You don't have enough money to buy this upgrade.";
}else{

$brewery_level[2] = $brewery_level[2] + 1;

$new_level = implode("-", $brewery_level);

$result = mysql_query("UPDATE login SET money=money-'".mysql_real_escape_string($whine_cost)."',brewery_level='".mysql_real_escape_string($new_level)."' WHERE id='" .mysql_real_escape_string($_SESSION['user_id']). "'") 
or die(mysql_error());

$money = $money - $whine_cost;

echo "You bought a new upgrade for your Wine Brewery.";

				}// money check.
			}// if points only.
		}// if type 3

	}// if no type selected.
}// if post buy brewery update.

?>