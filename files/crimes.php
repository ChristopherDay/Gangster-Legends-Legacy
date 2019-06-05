<?php 
	  
if(time() <= $crime_information[6]){
if(!$_POST['Commit']){			
echo "You can do another crime in:<br />".date( "00:i:s", $crime_information[6] - time() );
	}
			}else{	  

echo '<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Crimes.</legend>
<input name="crime" type="radio" value="6" id="crime6"  '.$disabled_5.' onFocus="if(this.blur)this.blur()"/><label for="crime6" >'; 
if($crime_information[4] < 75){echo "<s>";} echo $crime_name[5]; if($crime_information[4] < 75){echo "</s>";} 
echo '</label>
<b>'.$crime_information[5].'% </b><br />
<input name="crime" type="radio" value="5" id="crime5"'.$disabled_4.' onFocus="if(this.blur)this.blur()"/>
<label for="crime5" >';
if($crime_information[3] < 75){echo "<s>";} echo $crime_name[4]; if($crime_information[3] < 75){echo "</s>";} 
echo '</label>
<b>'.$crime_information[4].'%</b><br />
<input name="crime" type="radio" value="4" id="crime4"  '.$disabled_3.' onFocus="if(this.blur)this.blur()"/><label for="crime4" >';
if($crime_information[2] < 75){echo "<s>";} echo $crime_name[3]; if($crime_information[2] < 75){echo "</s>";}
echo '</label>
<b>'.$crime_information[3].'%</b><br />
<input name="crime" type="radio" value="3" id="crime3"  '.$disabled_2.' onFocus="if(this.blur)this.blur()"/><label for="crime3" >';
if($crime_information[1] < 75){echo "<s>";} echo $crime_name[2]; if($crime_information[1] < 75){echo "</s>";} 
echo '</label>
<b> '.$crime_information[2].'% </b><br />
<input name="crime" type="radio" value="2" id="crime2" '.$disabled_1.' onFocus="if(this.blur)this.blur()"/><label for="crime2" >';
if($crime_information[0] < 75){echo "<s>";} echo $crime_name[1]; if($crime_information[0] < 75){echo "</s>";}
echo '</label>
<b> '.$crime_information[1].'%</b><br />
<input name="crime" type="radio" value="1" id="crime1" onFocus="if(this.blur)this.blur()"/><label for="crime1" > 
	  '.$crime_name[0].'
	  </label><b>'.$crime_information[0].'% </b>
    <table width="295" border="0" cellspacing="0">
      <tr>
        <td width="120" align="center"><img src="files/button.php" alt="Verification." width="120" height="30" /></td>
        <td width="100" align="center"><input name="userdigit" type="text" class="entryfield" style=\'width: 85%;\' size="5" maxlength="5"'.$disabled.'/></td>
        <td width="120" align="center"><input name="Commit" type="submit" class="button" value="Commit." onFocus="if(this.blur)this.blur()"/></td>
      </tr>
    </table>
</fieldset>';
} 
echo '</form>';
?>

