<form method="post">
<?php 

if($rank >= "2"){
if(time() <= $gta_information[0]){
if(!$_POST['Commit']){			
echo "You need to lay low for a little while.<br />".date( "00:i:s", $gta_information[0] - time() );
	}
			}else{	
?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Auto Theft.</legend>
<table width="295" border="0" align="center" cellspacing="0"> 
      <tr>
        <td colspan="3" align="center"><table width="300" border="0" cellspacing="0" cellpadding="0">

          <tr>
            <td width="25" align="left"><input name="crime" type="radio" value="1" id="1" onfocus="if(this.blur)this.blur()"/></td>
            <td><label for="1" >Car jack from street.</label></td>
            <td width="35">&nbsp;</td>
          </tr>
          <tr>
            <td width="25" align="left"><input name="crime" type="radio" value="2" id="2" onfocus="if(this.blur)this.blur()"/></td>
            <td><label for="3" >Steal from a private parking lot.</label></td>
            <td width="35">&nbsp;</td>
          </tr>
          <tr>
            <td width="25" align="left"><input name="crime" type="radio" value="3" id="3" onfocus="if(this.blur)this.blur()"/></td>
            <td><label for="3" >Pick pocket keys.</label></td>
            <td width="35">&nbsp;</td>
          </tr>
          <tr>
            <td width="25" align="left"><input name="crime" type="radio" value="4" id="4" onfocus="if(this.blur)this.blur()"/></td>
            <td><label for="4" >Steal from a public parking lot.</label></td>
            <td width="35">&nbsp;</td>
          </tr>
          <tr>
            <td width="25" align="left"><input name="crime" type="radio" value="5" id="5" onfocus="if(this.blur)this.blur()"/></td>
            <td><input name="target" type="text" class="entryfield" id="target" onfocus="if(this.value=='Steal from a other player.')this.value='';" value="Steal from a other player." /></td>
            <td width="35">&nbsp;</td>
          </tr>
          
        </table></td>
        </tr>
      <tr>
        <td width="120" align="center"><img src="files/button.php" alt="Verification." width="120" height="30" /></td>
        <td width="100" align="center"><input name="userdigit" type="text" class="entryfield" style='width: 85%; ' size="5" maxlength="5"<?php echo $disabled; ?>/></td>
        <td width="120" align="center"><input name="Commit" type="submit" class="button" value="Commit." onFocus="if(this.blur)this.blur()"/></td>
      </tr>
    </table>
</fieldset>
<br />
<?php }}// if not high enough in rank. ?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Garage.</legend>
<table width="600" border="0" cellspacing="0">
  <tr>
    <td colspan="5" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td width="200" align="left"><b>Car:</b></td>
    <td width="100" align="left"><b>Damage:</b></td>
    <td width="100" align="left"><b>Value:</b></td>
    <td width="100" align="left"><b>Location:</b></td>
    <td width="100" align="left"><b>Origin:</b></td>
  </tr>
  <tr>
    <td colspan="5" align="center"><hr class="hr" /></td>
    </tr>
  <? 
$result = mysql_query("SELECT * FROM cars WHERE owner='".mysql_real_escape_string($name)."' ORDER BY id DESC ") or die(mysql_error());
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
// Print out the contents of each row into a table?>
  <tr>
    <td width="200">
      <input name="car" type="radio" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" onFocus="if(this.blur)this.blur()" />
      <label for="<?php echo $row['id']; ?>"><?php echo $car_park[$row['type'] - 1]; ?><?php if($row['selling'] == "1"){echo "*";}?>
      </label></td>
    <td width="100"><?php echo $row['damage']."%"; ?></td>
    <td width="100"><?php echo "$ ".$row['value'].",-";	
			 ?></td>
    <td width="100"><?php echo $location_array[$row['location']]; 
			if($row['location'] == 10){
			if((time() <= $row['transport_time']) ) {
			echo "(".date( "i:s", $row['transport_time'] - time() ).")";
			}}
			if($row['location'] == 11){
			if((time() <= $row['strip_time']) ) {
			echo "(".date( "i:s", $row['strip_time'] - time() ).")";
			}}?></td>
    <td width="100"><?php echo $location_array[$row['origin']]; ?></td>
  </tr>
     <?php }// while loop ?>       
  <tr>
    <td colspan="5" align="right"><table width="500" border="0" cellspacing="0">
      <tr>
        <td width="100" align="center"><select name="location" class="entryfield" id="location"/>
        <?php if($location != 1){?><option value="1"><?php echo $location_array[1]; ?></option><?php }?>
		<?php if($location != 2){?><option value="2"><?php echo $location_array[2]; ?></option><?php }?>
		<?php if($location != 3){?><option value="3"><?php echo $location_array[3]; ?></option><?php }?>
		<?php if($location != 4){?><option value="4"><?php echo $location_array[4]; ?></option><?php }?>
		<?php if($location != 5){?><option value="5"><?php echo $location_array[5]; ?></option><?php }?>
		<?php if($location != 6){?><option value="6"><?php echo $location_array[6]; ?></option><?php }?>
		<?php if($location != 7){?><option value="7"><?php echo $location_array[7]; ?></option><?php }?>
		<?php if($location != 8){?><option value="8"><?php echo $location_array[8]; ?></option><?php }?>
		<?php if($location != 9){?><option value="9"><?php echo $location_array[9]; ?></option><?php }?>
</select></td>
        <td width="100" align="center"><input name="action" type="submit" class="button" id="action" value="Transport Car." onfocus="if(this.blur)this.blur()" /></td>
        <td width="100" align="center"><input name="action" type="submit" class="button" id="action" value="Sell Car." onFocus="if(this.blur)this.blur()" /></td>
        <td width="100" align="center"><input name="action" type="submit" class="button" id="action" value="Repair Car." onFocus="if(this.blur)this.blur()" /></td>
        <td width="100" align="center"><input name="action" type="submit" class="button" id="action" value="Dispose Car." onFocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</fieldset>
</form>

