<?php

echo '<form method="post">
<table width="525" border="0" cellspacing="0">
  <tr>
    <td width="250" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Weapons.</legend>

<table width="250" border="0" cellspacing="0">
  
  <tr>
    <td width="50" align="left"><b>Name:</b></td>
    <td width="200" align="left">';
if($weapon <= 4){ 
	echo $gun_array[$weapon+1]; 
}else{ 
	echo "N/A";
}
echo '</td>
  </tr>
  <tr>
    <td width="50" align="left"><b>Costs:</b></td>
    <td width="200" align="left">';
if($weapon <= 4){ 
	echo "$ ".number_format($gun_cost_array[$weapon]).",-"; 
}else{
	echo "N/A";
}
echo '</td>
  </tr>
  <tr>
    <td width="50" align="left"><b>Skill:</b></td>
    <td width="200" align="left">'.$gun_skill.'/100%</td>
  </tr>
  <tr>
    <td colspan="2" align="right">';
if(($weapon <= 4) and ($gun_skill == 100)){ 
	echo "<input name=\"Weapon\" type=\"submit\" class=\"button\" id=\"Weapon\" value=\"Purchase.\" onFocus=\"if(this.blur)this.blur()\" />"; 
}else if( $weapon == 0 ){
	echo"<input name=\"Weapon\" type=\"submit\" class=\"button\" id=\"Weapon\" value=\"Purchase.\" onFocus=\"if(this.blur)this.blur()\" />";
}
echo '</td>
  </tr>
</table>
    </fieldset></td>
    <td width="25" valign="top">&nbsp;</td>
    <td width="250" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Protection.</legend>
<table width="250" border="0" cellspacing="0">
  <tr>
    <td width="50" align="left"><b>Name:</b></td>
    <td width="200" align="left">';
if($armor <= 4){ 
	echo $protection_array[$armor+1]; 
}else{ 	
	echo "N/A";
} 
echo '</td>
  </tr>
  <tr>
    <td width="50" align="left"><b>Costs:</b></td>
    <td width="200" align="left">';
if($armor <= 4){ 
	echo "$ ".number_format($protection_cost_array[$armor]).",-"; 
}else{ 
	echo "N/A";
} 
echo '</td>
  </tr>
  <tr>
    <td colspan="2" align="right">';
if($armor <= 4){ 
echo"<input name=\"Protection\" type=\"submit\" class=\"button\" id=\"Protection\" value=\"Purchase.\" onFocus=\"if(this.blur)this.blur()\" />"; 
}
echo '</td>
  </tr>
</table>
    </fieldset></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
</form>';

?>