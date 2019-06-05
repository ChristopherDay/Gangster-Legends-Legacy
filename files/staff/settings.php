<form method="post">
<?php if (in_array($name, $admin_array)){ 

// Cars.

if(isset($_POST['Update_car'])){

$check = false;

for ($i = 0; $i <= 7; $i++) {
if (empty($_POST['car_'.$i])){ $check = true; }
}

	if($check){
		echo "You left one or more entry fields empty.";
	}else{

$p_arrayrates = array($_POST['car_0'], $_POST['car_1'], $_POST['car_2'], $_POST['car_3'], $_POST['car_4'], $_POST['car_5'], $_POST['car_6'], $_POST['car_7']);
$new_ranks = implode("-", $p_arrayrates);

$result = mysql_query("UPDATE sitestats SET cars='".mysql_real_escape_string($new_ranks)."' WHERE id='1'") 
or die(mysql_error());

$car_park = explode("-", $new_ranks);
echo "Your car names have been changed.";
	}
}


// wealth ranks.

if(isset($_POST['Update_wealth'])){

$check = false;

for ($i = 0; $i <= 9; $i++) {
if (empty($_POST['wealth_'.$i])){ $check = true; }
}

	if($check){
		echo "You left one or more entry fields empty.";
	}else{

$p_arrayrates = array($_POST['wealth_0'], $_POST['wealth_1'], $_POST['wealth_2'], $_POST['wealth_3'], $_POST['wealth_4'], $_POST['wealth_5'], $_POST['wealth_6'], $_POST['wealth_7'], $_POST['wealth_8'], $_POST['wealth_9']);
$new_ranks = implode("-", $p_arrayrates);

$result = mysql_query("UPDATE sitestats SET wealth='".mysql_real_escape_string($new_ranks)."' WHERE id='1'") 
or die(mysql_error());

$wealth_array = explode("-", $new_ranks);
echo "Your wealth ranks have been changed.";
	}
}


// ranks.

if(isset($_POST['Update_ranks'])){

$check = false;

for ($i = 0; $i <= 15; $i++) {
if (empty($_POST['rank_'.$i])){ $check = true; }
}

	if($check){
		echo "You left one or more entry fields empty.";
	}else{

$p_arrayrates = array($_POST['rank_0'], $_POST['rank_1'], $_POST['rank_2'], $_POST['rank_3'], $_POST['rank_4'], $_POST['rank_5'], $_POST['rank_6'], $_POST['rank_7'], $_POST['rank_8'], $_POST['rank_9'], $_POST['rank_10'], $_POST['rank_11'], $_POST['rank_12'], $_POST['rank_13'], $_POST['rank_14'], $_POST['rank_15']);
$new_ranks = implode("-", $p_arrayrates);

$result = mysql_query("UPDATE sitestats SET ranks='".mysql_real_escape_string($new_ranks)."' WHERE id='1'") 
or die(mysql_error());

$rank_array = explode("-", $new_ranks);
echo "Your ranks have been changed.";
	}
}

// protection.

if(isset($_POST['Update_protection'])){

$_POST['protection_price_1'] = ereg_replace("[^0-9]",'',$_POST['protection_price_1']);
$_POST['protection_price_2'] = ereg_replace("[^0-9]",'',$_POST['protection_price_2']);
$_POST['protection_price_3'] = ereg_replace("[^0-9]",'',$_POST['protection_price_3']);
$_POST['protection_price_4'] = ereg_replace("[^0-9]",'',$_POST['protection_price_4']);
$_POST['protection_price_5'] = ereg_replace("[^0-9]",'',$_POST['protection_price_5']);
$_POST['protection_price_6'] = ereg_replace("[^0-9]",'',$_POST['protection_price_6']);
$_POST['protection_price_7'] = ereg_replace("[^0-9]",'',$_POST['protection_price_7']);


	if(empty($_POST['protection_0']) or empty($_POST['protection_1']) or empty($_POST['protection_2']) or empty($_POST['protection_3']) or empty($_POST['protection_4']) or empty($_POST['protection_5']) or empty($_POST['protection_6']) or empty($_POST['protection_7']) or empty($_POST['protection_price_1']) or empty($_POST['protection_price_2']) or empty($_POST['protection_price_3']) or empty($_POST['protection_price_4']) or empty($_POST['protection_price_5']) or empty($_POST['protection_price_6']) or empty($_POST['protection_price_7'])){
		echo "You left one or more entry fields empty.";
	}else{

$p_arrayrates = array($_POST['protection_0'], $_POST['protection_1'], $_POST['protection_2'], $_POST['protection_3'], $_POST['protection_4'], $_POST['protection_5'], $_POST['protection_6'], $_POST['protection_7']);
$p_newrates = implode("-", $p_arrayrates);

$p_p_arrayrates = array($_POST['protection_price_1'], $_POST['protection_price_2'], $_POST['protection_price_3'], $_POST['protection_price_4'], $_POST['protection_price_5'], $_POST['protection_price_6'], $_POST['protection_price_7']);
$p_p_newrates = implode("-", $p_p_arrayrates);

$result = mysql_query("UPDATE sitestats SET protection_price='".mysql_real_escape_string($p_p_newrates)."' , protection='".mysql_real_escape_string($p_newrates)."'WHERE id='1'") 
or die(mysql_error());

$protection_array = explode("-", $p_newrates);
$protection_cost_array = explode("-", $p_p_newrates);
echo "Your protection names and prices have been changed.";
	}
}

// weapon.

if(isset($_POST['Update_weapons'])){

$_POST['gun_price_1'] = ereg_replace("[^0-9]",'',$_POST['gun_price_1']);
$_POST['gun_price_2'] = ereg_replace("[^0-9]",'',$_POST['gun_price_2']);
$_POST['gun_price_3'] = ereg_replace("[^0-9]",'',$_POST['gun_price_3']);
$_POST['gun_price_4'] = ereg_replace("[^0-9]",'',$_POST['gun_price_4']);
$_POST['gun_price_5'] = ereg_replace("[^0-9]",'',$_POST['gun_price_5']);
$_POST['gun_price_6'] = ereg_replace("[^0-9]",'',$_POST['gun_price_6']);
$_POST['gun_price_7'] = ereg_replace("[^0-9]",'',$_POST['gun_price_7']);


	if(empty($_POST['gun_0']) or empty($_POST['gun_1']) or empty($_POST['gun_2']) or empty($_POST['gun_3']) or empty($_POST['gun_4']) or empty($_POST['gun_5']) or empty($_POST['gun_6']) or empty($_POST['gun_7']) or empty($_POST['gun_price_1']) or empty($_POST['gun_price_2']) or empty($_POST['gun_price_3']) or empty($_POST['gun_price_4']) or empty($_POST['gun_price_5']) or empty($_POST['gun_price_6']) or empty($_POST['gun_price_7'])){
		echo "You left one or more entry fields empty.";
	}else{

$p_arrayrates = array($_POST['gun_0'], $_POST['gun_1'], $_POST['gun_2'], $_POST['gun_3'], $_POST['gun_4'], $_POST['gun_5'], $_POST['gun_6'], $_POST['gun_7']);
$p_newrates = implode("-", $p_arrayrates);

$p_p_arrayrates = array($_POST['gun_price_1'], $_POST['gun_price_2'], $_POST['gun_price_3'], $_POST['gun_price_4'], $_POST['gun_price_5'], $_POST['gun_price_6'], $_POST['gun_price_7']);
$p_p_newrates = implode("-", $p_p_arrayrates);

$result = mysql_query("UPDATE sitestats SET weapon_price='".mysql_real_escape_string($p_p_newrates)."' , weapon='".mysql_real_escape_string($p_newrates)."'WHERE id='1'") 
or die(mysql_error());

$gun_array = explode("-", $p_newrates);
$gun_cost_array = explode("-", $p_p_newrates);
echo "Your weapon names and prices have been changed.";
	}
}

// location.

if(isset($_POST['Update_location'])){
	if(empty($_POST['location_1']) or empty($_POST['location_2']) or empty($_POST['location_3']) or empty($_POST['location_4']) or empty($_POST['location_5']) or empty($_POST['location_6']) or empty($_POST['location_7']) or empty($_POST['location_8']) or empty($_POST['location_9'])){
		echo "You left one or more entry fields empty.";
	}else{

$arrayrates = array("Avalanche", $_POST['location_1'], $_POST['location_2'], $_POST['location_3'], $_POST['location_4'], $_POST['location_5'], $_POST['location_6'], $_POST['location_7'], $_POST['location_8'], $_POST['location_9']);
$newrates = implode("-", $arrayrates);

$result = mysql_query("UPDATE sitestats SET locations='".mysql_real_escape_string($newrates)."' WHERE id='1'") 
or die(mysql_error());

$location_array = explode("-", $newrates);
echo "Your location names have been changed.";
	}
}

?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 400px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Cars.</legend>

<table width="400" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td width="200" colspan="2" align="left"><b>Name:</b></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
  </tr>
  <?php
	
	foreach( $car_park as $key => $value){
		
	echo "<tr>
	<td width=\"25\" height=\"20\">#".$key."</td>
    <td width=\"375\"><input name=\"car_".$key."\" type=\"text\" class=\"entryfield\" value=\"".$value."\" /></td>
    </tr>";

	}
	
	?>
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
  </tr>
  
  <tr>
    <td colspan="2" align="right"><input name="Update_car" type="submit" class="button" id="Update_car" onfocus="if(this.blur)this.blur()" value="Update."/></td>
  </tr>
</table>
</fieldset>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 400px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Wealth Ranks.</legend>

<table width="400" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td width="200" colspan="2" align="left"><b>Name:</b></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
  </tr>
  <?php
	
	foreach( $wealth_array as $key => $value){
		
	echo "<tr>
	<td width=\"25\" height=\"20\">#".$key."</td>
    <td width=\"375\"><input name=\"wealth_".$key."\" type=\"text\" class=\"entryfield\" value=\"".$value."\" /></td>
    </tr>";

	}
	
	?>
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
  </tr>
  
  <tr>
    <td colspan="2" align="right"><input name="Update_wealth" type="submit" class="button" id="Update_wealth" onfocus="if(this.blur)this.blur()" value="Update."/></td>
  </tr>
</table>
</fieldset>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 400px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Weapons.</legend>

<table width="400" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td width="200" colspan="2" align="left"><b>Name:</b></td>
    <td width="200" align="left"><b>Price:</b></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <?php
	
	foreach( $gun_array as $key => $value){
	
	if($key == 0){
		$gun_price = "Free.";
	}else{
		if($key == 6 or $key == 7){
			$gun_price = number_format($gun_cost_array[$key -1])." Credits.";
		}else{
			$gun_price = "$ ".number_format($gun_cost_array[$key -1]).",-";
		}
	}
		
	echo "<tr>
	<td width=\"25\" height=\"20\">#".$key."</td>
    <td width=\"175\"><input name=\"gun_".$key."\" type=\"text\" class=\"entryfield\" value=\"".$value."\" /></td>
    <td width=\"200\"><input name=\"gun_price_".$key."\" type=\"text\" class=\"entryfield\" value=\"".$gun_price."\" /></td>
    </tr>";

	}
	
	?>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  
  <tr>
    <td colspan="3" align="right"><input name="Update_weapons" type="submit" class="button" id="Update_weapons" onFocus="if(this.blur)this.blur()" value="Update."/></td>
  </tr>
</table>
</fieldset>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 400px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Protection.</legend>

<table width="400" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td width="200" colspan="2" align="left"><b>Name:</b></td>
    <td width="200" align="left"><b>Price:</b></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <?php
	
	foreach( $protection_array as $key => $value){
	
	if($key == 0){
		$protection_price = "Free.";
	}else{
		if($key == 6 or $key == 7){
			$protection_price = number_format($protection_cost_array[$key -1])." Credits.";
		}else{
			$protection_price = "$ ".number_format($protection_cost_array[$key -1]).",-";
		}
	}
		
	echo "<tr>
	<td width=\"25\" height=\"20\">#".$key."</td>
    <td width=\"175\"><input name=\"protection_".$key."\" type=\"text\" class=\"entryfield\" value=\"".$value."\" /></td>
    <td width=\"200\"><input name=\"protection_price_".$key."\" type=\"text\" class=\"entryfield\" value=\"".$protection_price."\" /></td>
    </tr>";

	}
	
	?>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  
  <tr>
    <td colspan="3" align="right"><input name="Update_protection" type="submit" class="button" id="Update_protection" onFocus="if(this.blur)this.blur()" value="Update."/></td>
  </tr>
</table>
</fieldset>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 400px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Locations.</legend>

<table width="400" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="33%" height="20" align="center"><input name="location_1" type="text" class="entryfield" id="location_1" value="<?php echo $location_array[1]; ?>" /></td>
    <td width="34%" height="20" align="center"><input name="location_4" type="text" class="entryfield" id="location_4" value="<?php echo $location_array[4]; ?>" /></td>
    <td width="33%" height="20" align="center"><input name="location_7" type="text" class="entryfield" id="location_7" value="<?php echo $location_array[7]; ?>" /></td>
  </tr>
  <tr>
    <td width="33%" height="20" align="center"><input name="location_2" type="text" class="entryfield" id="location_2" value="<?php echo $location_array[2]; ?>" /></td>
    <td width="34%" height="20" align="center"><input name="location_5" type="text" class="entryfield" id="location_5" value="<?php echo $location_array[5]; ?>" /></td>
    <td width="33%" height="20" align="center"><input name="location_8" type="text" class="entryfield" id="location_8" value="<?php echo $location_array[8]; ?>" /></td>
  </tr>
  <tr>
    <td width="33%" height="20" align="center"><input name="location_3" type="text" class="entryfield" id="location_3" value="<?php echo $location_array[3]; ?>" /></td>
    <td width="34%" height="20" align="center"><input name="location_6" type="text" class="entryfield" id="location_6" value="<?php echo $location_array[6]; ?>" /></td>
    <td width="33%" height="20" align="center"><input name="location_9" type="text" class="entryfield" id="location_9" value="<?php echo $location_array[9]; ?>" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
    </tr>
  
  <tr>
    <td colspan="3" align="right"><input name="Update_location" type="submit" class="button" id="Update_location" onFocus="if(this.blur)this.blur()" value="Update."/></td>
  </tr>
</table>
</fieldset>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 400px; text-align: left; padding: 5px;">
      <legend style="color: #999999; font-weight: bold;">Ranks.</legend>
	  <table width="400" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td width="400" colspan="2" align="left"><b>Rank:</b></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><hr class="hr" /></td>
    </tr>
		<?php
	
	foreach( $rank_array as $key => $value){
	
	$rank_exp_array[-1] = 0;
	
	echo "<tr>
	<td width=\"25\" height=\"20\">#".($key + 1)."</td>
    <td width=\"375\"><input name=\"rank_".$key."\" type=\"text\" class=\"entryfield\" value=\"".$value."\" /></td></tr>";

	}
	
	?>
        <tr>
          <td colspan="2" align="center"><hr class="hr" /></td>
        </tr>
        
        <tr>
    <td colspan="2" align="right"><input name="Update_ranks" type="submit" class="button" id="Update_ranks" onFocus="if(this.blur)this.blur()" value="Update."/></td>
    </tr>
</table>
	  </fieldset>
	</form>
<?php } ?>

