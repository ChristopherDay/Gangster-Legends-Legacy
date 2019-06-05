<?php
echo '<form method="post">
<table width="550" border="0" align="center" cellspacing="0">
  <tr>
    <td width="300" rowspan="3" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Car Market.</legend>
	<table width="350" border="0" cellspacing="0" class="table">
      
      <tr>
        <td width="25" align="center"><input name="car" id="car_1" type="radio" value="1" onFocus="if(this.blur)this.blur()" /></td>
        <td width="150" align="left"><label for="car_1">'.$car_park[0].'</label></td>
        <td width="25"><input name="car" id="car_2" type="radio" value="2" onFocus="if(this.blur)this.blur()" /></td>
        <td width="150" align="left"><label for="car_2">'.$car_park[1].'</label></td>
      </tr>
      <tr>
        <td width="25" align="center"><input name="car" id="car_3" type="radio" value="3" onFocus="if(this.blur)this.blur()" /></td>
        <td width="150" align="left"><label for="car_3">'.$car_park[2].'</label></td>
        <td width="25"><input name="car" id="car_4" type="radio" value="4" onFocus="if(this.blur)this.blur()" /></td>
        <td width="150" align="left"><label for="car_4">'.$car_park[3].'</label></td>
      </tr>
      <tr>
        <td width="25" align="center"><input name="car" id="car_5" type="radio" value="5" onFocus="if(this.blur)this.blur()" /></td>
        <td width="150" align="left"><label for="car_5">'.$car_park[4].'</label></td>
        <td width="25"><input name="car" id="car_6" type="radio" value="6" onFocus="if(this.blur)this.blur()" /></td>
        <td width="150" align="left"><label for="car_6">'.$car_park[5].'</label></td>
      </tr>
      <tr>
        <td width="25" align="center"><input name="car" id="car_7" type="radio" value="7" onFocus="if(this.blur)this.blur()" /></td>
        <td width="150" align="left"><label for="car_7">'.$car_park[6].'</label></td>
        <td width="25"><input name="car" id="car_8" type="radio" value="8" onFocus="if(this.blur)this.blur()" /></td>
        <td width="150" align="left"><label for="car_8">'.$car_park[7].'</label></td>
      </tr>
      <tr>
        <td colspan="4"><table width="100%" border="0" align="right" cellspacing="0">
          <tr>
            <td align="right"><input name="Search" type="submit" class="button" id="Search" value="Search." onFocus="if(this.blur)this.blur()" /></td>
            </tr>
        </table>		</td>
      </tr>
    </table>
	</fieldset></td>
    <td width="25" rowspan="3">&nbsp;</td>
    <td width="225" align="center" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 225px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Sell Car.</legend>
	<table width="225" border="0" align="center" cellspacing="0">
      
      <tr>
        <td colspan="2" align="center"><select name="cars" class="entryfield" id="cars">';    

$sql = "SELECT * FROM cars WHERE owner='".mysql_real_escape_string($name)."' AND selling='0' ORDER BY id DESC "; 
$res = mysql_query($sql) or die(mysql_error()); 
while ($row = mysql_fetch_array($res)) { 

$car_name = $car_park[$row['type'] - 1];

echo "<option value=\"".$row['id']."\">".$car_name."</option>";	  
}// while loop 
echo '
        </select></td>
      </tr>
      <tr>
        <td width="50">Price:</td>
        <td width="175" align="center"><input name="price" type="text" class="entryfield" id="price" style=\' width: 95%; \' value="$"/></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><input name="Sell" type="submit" class="button" id="Sell" value="Sell." onFocus="if(this.blur)this.blur()" />
          </td>
      </tr>
    </table>
	</fieldset>
	</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="225" align="center" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 225px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Remove Sale.</legend>
	<table width="225" border="0" cellspacing="0" class="table">
      
      <tr>
        <td width="450" colspan="2" align="center"><select name="remove_car" class="entryfield" id="remove_car">';   

$sql = "SELECT * FROM cars WHERE owner='".mysql_real_escape_string($name)."' AND selling='1' ORDER BY id DESC "; 
$res = mysql_query($sql) or die(mysql_error()); 
while ($row = mysql_fetch_array($res)) { 

echo "<option value=\"".$row['id']."\">".$car_park[$row['type'] - 1]."</option>";	  
}// while loop 
        echo '</select></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><input name="Remove" type="submit" class="button" id="Remove" value="Remove." onFocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table>
	</fieldset>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">';
if(isset($_POST['Search'])){ 
  if(empty($_POST['car'])){
	  echo "You didn't select the type of car you wish to purchase.";
  }else{
	  echo' <fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: left; padding: 5px;">
		<legend style="color: #999999; font-weight: bold;">Sales.</legend>
        <table width="600" border="0" cellspacing="0" class="table">
          
          <tr>
            <td colspan="2" align="left"><b>Type:</b></td>
            <td width="125" align="left"><b>Origin:</b></td>
            <td width="125" align="left"><b>Owner:</b></td>
            <td width="150" align="left"><b>Price:</b></td>
          </tr>';

		if($_POST['type'] == "2"){ 
		$_POST['car'] = $_POST['car'] + "8"; 
		}

		$sql = "SELECT * FROM cars WHERE type='".mysql_real_escape_string($_POST['car'])."' AND selling ='1' ORDER BY sell_price DESC "; 
		$res = mysql_query($sql) or die(mysql_error()); 
		while ($row = mysql_fetch_array($res)) {
			echo '<tr>
			<td width="25" align="center"><input name="car_select" type="radio" id="'.$row['id'].'" value="'.$row['id'].'" onFocus="if(this.blur)this.blur()" /></td>
			<td width="175" align="left"><label for="'.$row['id'].'">'.$car_park[$row['type'] - 1].' ( '.$row['damage'].'% )</label></td>
			<td width="125" align="left">'.$location_array[$row['origin']].'</td>
			<td width="125" align="left" onclick="location.href=\'view_profile.php?name='.$row['owner'].'\'"><a href=\"page.php?page=view_profile&name='. $row['owner'] .'\" onFocus=\"if(this.blur)this.blur()\">'.$row['owner'].'</a></td>
			<td width="150" align="left">'."$ ".number_format($row['sell_price']).",-".'></td>
			</tr>';
		}// while loop 
        echo '<tr>
            <td colspan="5" align="right" class="style1"><input name="Purchase" type="submit" class="button" id="Purchase" value="Purchase." onFocus="if(this.blur)this.blur()" />              </td>
          </tr>
        </table>
		</fieldset>';

	}// if no car type selected.
} // if isset post search
echo '</td>
</tr>
</table>
</form>';

?>