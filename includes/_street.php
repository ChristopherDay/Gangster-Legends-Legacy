<?php
// lets start off with the varables you will want to change
$chance_of_money = 10;// enter the % chance you want your users to find money 
$money_gain = array('min'=>3, 'max'=>12); // Change the values to what you want the user to find default is MIn: $3 and max: $12
$time_between_each_search = 300; // Change this to what ever time you would like Default is 5 mins.
$multiply_money_by_rank = true; // This will give the user more money if they are a higher rank ;) Change this to false if you dont want this.
$turns = 5; // The ammount of time the user will search.

if ($_GET['search']) {
	if ($street<time()) {
		$i=0;
		$Mgain=0;
		while ($i<$turns) {
			if (rand(1, 100)>$chance_of_money) {
				echo '<span style="color:#f00">You couldent see any money!</span><br>';
			} else {
				if ($multiply_money_by_rank) {
					$rand = (mt_rand($money_gain['min'], $money_gain['max'])*$rank);
				} else {
					$rand = mt_rand($money_gain['min'], $money_gain['max']);
				}
				$Mgain=$Mgain+$rand;
				echo '<span style="color:#090">You found $'.$rand.'!</span><br>';
			}
			$i++;
		}	
		mysql_query("UPDATE `login` SET `money`=`money`+".($Mgain).", `street`=".(time()+$time_between_each_search)." WHERE `id`=".$id);
		$money=$money+$Mgain;
	} else {
		echo 'You can not search yet!';
	}
}

?>