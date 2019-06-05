<table width="575" border="0" cellspacing="0">
  <tr>
    <td width="275" align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 275px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Create new gang.</legend>
<table width="275" border="0" cellspacing="0">
  
  <tr>
    <td width="75" align="left"><b>Name:</b></td>
    <td width="200" align="center"><input name="gang_name" type="text" class="entryfield" id="gang_name"/></td>
  </tr>
  <tr>
    <td align="left"><b>Costs:</b></td>
    <td align="left">$ 50,000,-</td>
  </tr>
  <tr>
    <td align="left"><b>Size:</b></td>
    <td align="left">10 Members. </td>
  </tr>
  <tr>
    <td colspan="2" align="right">
      <input name="Create" type="submit" class="button" id="Create" value="Create." onFocus="if(this.blur)this.blur()" /></td>
  </tr>
</table>
</fieldset></td>
    <td width="25" align="center" valign="top">&nbsp;</td>
    <td width="275" align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 275px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Gang Application.</legend>

    <table width="275" border="0" align="center" cellspacing="0">
      
      <tr>
        <td colspan="2" align="center">
          <select name="gang" class="entryfield" id="gang">
            <?php    

$sql = "SELECT name FROM gangs WHERE rec='1' ORDER BY name DESC LIMIT 0,50"; 
$res = mysql_query($sql) or die(mysql_error()); 
while ($row = mysql_fetch_array($res)) { 
echo "<option value=\"".$row['name']."\">".$row['name']."</option>";	  
}// while loop ?>
          </select></td>
      </tr>
      
      <tr>
        <td width="75" align="left"><b>Application:</b></td>
        <td width="200" align="left"><?php 
		
		$sql = "SELECT gang FROM gang_aply WHERE name='".mysql_real_escape_string($name)."'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$apply_gang = htmlspecialchars($row->gang);
		
		if(!empty($apply_gang)){
		echo $apply_gang;
		}else { echo "None.";}
		?></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><input name="Apply" type="submit" class="button" id="Apply" value="Apply" onFocus="if(this.blur)this.blur()"/></td>
      </tr>
    </table>
    </fieldset></td>
  </tr>
</table>
