<form method="post"><fieldset style="width: 250px; border: 1px solid rgb(0, 0, 0);"><legend>Murder</legend>
<table width="350" border="0" align="center" cellpadding="0" cellspacing="2" class="table"> <tr>
    <td width="75" align="left" class="cell"><b>Target:</b></td>
    <td width="175" align="center" class="cell"><input name="target" type="text" class="entryfield" id="target" maxlength="20"/> </td>
    <td width="100" align="center" class="cell"><select name="type" class="entryfield" id="type" style="width:95%;">
      <option value="1">Target.</option>
      <option value="2">Bodyguard.</option>
    </select></td>
  </tr>
  <tr>
    <td align="left" class="cell"><b>Car:</b></td>
    <td colspan="2" align="center" class="cell"><select name="car" class="entryfield" id="cars">
      <?php    

$sql = "SELECT * FROM cars WHERE owner='".mysql_real_escape_string($name)."' AND selling='0' AND type<='8' AND damage='0' AND location='".mysql_real_escape_string($location)."' ORDER BY id DESC "; 
$res = mysql_query($sql) or die(mysql_error()); 
while ($row = mysql_fetch_array($res)) { 

$car_name = $car_park[$row['type'] - 1];

echo "<option value=\"".$row['id']."\">".$car_name."</option>";	  
}// while loop ?>
    </select></td>
    </tr>
  <tr>
    <td width="75" align="left" class="cell"><b>Bullets:</b></td>
    <td colspan="2" align="center" class="cell"><input name="bullets" type="text" class="entryfield" id="bullets" maxlength="20"/></td>
    </tr>
  <tr>
    <td width="75" align="left" class="cell"><b>Reason:</b></td>
    <td colspan="2" align="center" class="cell"><textarea name="reason" rows="8" class="textbox"></textarea></td>
    </tr>
  <tr>
    <td colspan="3" align="right" class="submit"><input name="Murder" type="submit" class="button" id="Murder" value="Murder Target." style="width:150px;" onFocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset>
<table width="575" border="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">
<fieldset style="width: 250px; border: 1px solid rgb(0, 0, 0);"><legend>Your Murder Attempts</legend>
	<table width="275" border="0" align="center" cellpadding="0" cellspacing="2" class="table">
      <tr>
        <td width="125" align="left" class="sub"><b>Name:</b></td>
        <td width="150" align="left" class="sub"><b>Date:</b></td>
      </tr>
      
      <? 
$result = mysql_query("SELECT target,date,state FROM kills WHERE shooter='".mysql_real_escape_string($name)."' ORDER BY id DESC LIMIT 0,10") or die(mysql_error());
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
?>
      <tr>
        <td width="125" align="left" class="cell"><?php if($row['state'] == 1){ echo "(S)"; }else{ echo "(F)";} echo "<a href=\"page.php?page=view_profile&name=". $row['target'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['target']."</a>"; ?></td>
        <td width="150" align="left" class="cell"><?php echo $row['date']; ?></td>
      </tr>
      <?php }// while loop ?>
    </table>
	</fieldset>
	</td>
    <td width="25" align="center">&nbsp;</td>
    <td align="center" valign="top">
	<fieldset style="width: 250px; border: 1px solid rgb(0, 0, 0);"><legend>Murder Attemts</legend>
	<table width="275" border="0" align="center" cellpadding="0" cellspacing="2" class="table">
      <tr>
        <td width="125" align="left" class="sub"><b>Name:</b></td>
        <td width="150" align="left" class="sub"><b>Date:</b></td>
      </tr>
      
      <? 
$result = mysql_query("SELECT shooter,date FROM kills WHERE target='".mysql_real_escape_string($name)."' ORDER BY id DESC LIMIT 0,10") or die(mysql_error());
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
?>
      <tr>
        <td width="125" align="left" class="cell"><?php echo "<a href=\"page.php?page=view_profile&name=". $row['shooter'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['shooter']."</a>"; ?></td>
        <td width="150" align="left" class="cell"><?php echo $row['date']; ?></td>
      </tr>
      <?php }// while loop ?>
    </table>
	</fieldset>
	</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top" class="temp">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top" class="temp">* Only the last 10 are shown. </td>
  </tr>
</table>
<br />

</form>

