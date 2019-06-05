<form method="post">
<?php 

if($owner == "No Owner." or $casino_state != 0){?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;"><?php echo "Purchase ".$location_array[$location]." Racing.";?></legend>
<table width="250" border="0" cellspacing="0">
  <tr>
    <td width="50"><b>Price:</b></td>
    <td width="100">$ 50,000,- </td>
    <td width="100"><input name="Purchase" type="submit" class="button" id="Purchase" value="Purchase." onfocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset>
<?php }else{ 
if($owner == $name){?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;"><?php echo $location_array[$location]." Horse Racing.";?></legend>
<table width="350" border="0" align="center" cellspacing="0">
  
  <tr>
    <td colspan="2" align="left"><b>Statistics:</b></td>
  </tr>
  <tr>
    <td align="left">Earnings:</td>
    <td align="left"><?php echo "$ ".number_format($profit).",-"; ?></td>
  </tr>
  <tr>
    <td align="left">Maximum Bet: </td>
    <td align="left"><?php echo "$ ".number_format($rt_max).",-"; ?></td>
  </tr>
  
  <tr>
    <td colspan="2" align="left"><b>Options:</b></td>
  </tr>
  <tr>
    <td width="100" align="left">Maximum Bet:</td>
    <td width="250" align="center"><input name="max_bet" type="text" class="entryfield" id="max_bet" style='width: 98%; ' maxlength="20" /></td>
  </tr>
  <tr>
    <td align="left">Password:</td>
    <td align="center"><input name="password_bet" type="password" class="entryfield" id="password_bet" style='width: 98%; ' maxlength="20" /></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input name="Update" type="submit" class="button" id="Update" value="Update."  onFocus="if(this.blur)this.blur()"/></td>
  </tr>
  <tr>
    <td colspan="2" align="left"><b>Transfer Horse Racing:</b></td>
  </tr>
  <tr>
    <td width="100" align="left">Transfer to:</td>
    <td width="250" align="center"><input name="name" type="text" class="entryfield" id="name" style='width: 98%; ' maxlength="20" /></td>
  </tr>
  <tr>
    <td width="100" align="left">Password:</td>
    <td width="250" align="center"><input name="password" type="password" class="entryfield" id="password" style='width: 98%; ' maxlength="20" /></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input name="Transfer" type="submit" class="button" id="Transfer" value="Transfer."  onFocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset>
<?php }else{ 

if($casino_mode == 1){

?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Casino Mode.</legend>
<table width="250" border="0" cellspacing="0">
  <tr>
    <td width="75" align="left"><b>Password:</b></td>
    <td width="175" align="center"><input name="casino_password" type="password" class="entryfield" id="casino_password" /></td>
  </tr>
  <tr>
    <td width="300" colspan="2" align="right"><input name="Enter" type="submit" class="button" id="Enter" value="Enter." onfocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset>

<?php }

if($casino_mode == 2){

?>

<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;"><?php echo $location_array[$location];?> Horse Racing.</legend>
<table width="350" border="0" align="center" cellspacing="0">
  
  <tr>
    <td colspan="2" align="left"><b>Horse:</b></td>
    <td width="100" align="left"><b>Odds:</b></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" <?php if($_POST['horse'] == 1){echo "checked='checked'"; }?> value="1" id="1" onFocus="if(this.blur)this.blur()" /></td>
    <td width="275" align="left"><label for="1">Horse 1</label></td>
    <td width="100" align="left">1:2</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" value="2" <?php if($_POST['horse'] == 2){echo "checked='checked'"; }?> id="2"  onFocus="if(this.blur)this.blur()"></td>
    <td width="275" align="left"><label for="2">Horse 2</label></td>
    <td width="100" align="left">1:3</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" value="3" <?php if($_POST['horse'] == 3){echo "checked='checked'"; }?> id="3" onFocus="if(this.blur)this.blur()"></td>
    <td width="275" align="left"><label for="3">Horse 3</label></td>
    <td width="100" align="left"> 1:4</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" value="4" <?php if($_POST['horse'] == 4){echo "checked='checked'"; }?> id="4" onFocus="if(this.blur)this.blur()"></td>
    <td width="275" align="left"><label for="4">Horse 4</label></td>
    <td width="100" align="left">1:5</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" value="5" <?php if($_POST['horse'] == 5){echo "checked='checked'"; }?> id="5"  onFocus="if(this.blur)this.blur()"></td>
    <td width="275" align="left"><label for="5">Horse 5</label></td>
    <td width="100" align="left">1:6</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" value="6" <?php if($_POST['horse'] == 6){echo "checked='checked'"; }?> id="6"  onFocus="if(this.blur)this.blur()"></td>
    <td width="275" align="left"><label for="6">Horse 6</label></td>
    <td width="100" align="left">1:7</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" value="7" <?php if($_POST['horse'] == 7){echo "checked='checked'"; }?> id="7"  onFocus="if(this.blur)this.blur()"></td>
    <td width="275" align="left"><label for="7">Horse 7</label></td>
    <td width="100" align="left">1:8</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" value="8" <?php if($_POST['horse'] == 8){echo "checked='checked'"; }?> id="8"  onFocus="if(this.blur)this.blur()"></td>
    <td width="275" align="left"><label for="8">Horse 8</label></td>
    <td width="100" align="left">1:9</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" value="9" <?php if($_POST['horse'] == 9){echo "checked='checked'"; }?> id="9"  onFocus="if(this.blur)this.blur()"></td>
    <td width="275" align="left"><label for="9">Horse 9</label></td>
    <td width="100" align="left">1:10</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="horse" type="radio" value="10" <?php if($_POST['horse'] == 10){echo "checked='checked'"; }?> id="10" onFocus="if(this.blur)this.blur()"></td>
    <td width="275" align="left"><label for="10">Horse 10</label></td>
    <td width="100" align="left">1:11</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="3" align="left"><b>Owner:</b>
      <?php 
			  if($owner != "No Owner."){echo "<a href=\"page.php?page=view_profile&name=". $owner ."\" onFocus=\"if(this.blur)this.blur()\">".$owner."</a>"; }else{echo "No Owner.";} ?></td>
  </tr>
  <tr>
    <td colspan="3" align="left"><b>Maximum Bet:</b> <?php echo "$ ".number_format($rt_max).",-"; ?></td>
  </tr>
  <tr>
    <td colspan="3" align="left"><hr class="hr" /></td>
  </tr>
  
  <tr>
    <td colspan="3" align="center"><table width="340" border="0" cellspacing="0">
      <tr>
        <td align="center"><input name="wager" type="text" class="entryfield" id="wager" style="width: 98%" value="<?php if(isset($_POST['Bet'])){ echo $_POST['wager']; }else{ echo "$"; } ?>"/></td>
        <td width="100" align="center"><input name="Bet" type="submit" class="button" id="Bet" value="Place bet."  onFocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</fieldset>
<?php 
		}// if casino mode.
	}// ifowner
  }// no owner.
?>
</form>