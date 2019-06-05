<?php
echo '<form method="post">
<table width="625" border="0" cellspacing="0">
  <tr>
    <td width="300" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Credit shop.</legend>
<table width="300" border="0" cellspacing="0">
  <tr>
    <td colspan="3" align="left"><b>Premium Accounts:</b></td>
  </tr>
  <tr>
    <td align="left"><input name="item" type="radio" value="1" id="1" onFocus="if(this.blur)this.blur()"/></td>
    <td align="left"><label for="1">Silver Account.</label></td>
    <td align="left">'.$item_cost[0]." Credits.".'</td>
  </tr>
  <tr>
    <td align="left"><input name="item" type="radio" value="2" id="2" onFocus="if(this.blur)this.blur()"/></td>
    <td align="left"><label for="2">Gold Account.</label></td>
    <td align="left">'.$item_cost[1]." Credits.".'</td>
  </tr>
  <tr>
    <td align="left"><input name="item" type="radio" value="3" id="3" onFocus="if(this.blur)this.blur()"/></td>
    <td align="left"><label for="3">Platinum Account.</label></td>
    <td align="left">'.$item_cost[2]." Credits.".'</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><b>Account:</b></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="4" id="4" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="4">100%  health.</label></td>
    <td width="100" align="left">'.$item_cost[3]." Credits.".'</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="5" id="5" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="5">100% Weapon Skill.</label></td>
    <td width="100" align="left">'.$item_cost[4]." Credits.".'</td>
  </tr>
  
  <tr>
    <td colspan="3" align="left"><b>Bullets:</b></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="6" id="6" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="6">400 Bullets.</label></td>
    <td width="100" align="left">'.$item_cost[5]." Credits.".'</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="7" id="7" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="7">2,500 Bullets.</label></td>
    <td width="100" align="left">'.$item_cost[6]." Credits.".'</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="8" id="8" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="8">6,000 Bullets.</label></td>
    <td width="100" align="left">'.$item_cost[7]." Credits.".'</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><b>Weapons and Protection:</b></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="9" id="9" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="9">'.$gun_array[6].'</label></td>
    <td width="100" align="left">'.$item_cost[8]." Credits.".'</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="10" id="10" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="10">'.$gun_array[7].'</label></td>
    <td width="100" align="left">'.$item_cost[9]." Credits.".'</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="11" id="11" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="11">'.$protection_array[6].'</label></td>
    <td width="100" align="left">'.$item_cost[10]." Credits.".'</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="12" id="12" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="12">'.$protection_array[7].'</label></td>
    <td width="100" align="left">'.$item_cost[11]." Credits.".'</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><b>Money:</b></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="13" id="13" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="13">$ 10,000,-</label></td>
    <td width="100" align="left">'.$item_cost[12]." Credits.".'</td>
  </tr>
  <tr>
    <td align="center"><input name="item" type="radio" value="14" id="14" onFocus="if(this.blur)this.blur()"/></td>
    <td align="left"><label for="14">$ 50,000,- </label></td>
    <td align="left">'.$item_cost[13]." Credits.".'</td>
  </tr>
  <tr>
    <td align="center"><input name="item" type="radio" value="15" id="15" onFocus="if(this.blur)this.blur()"/></td>
    <td align="left"><label for="15">$ 250,000,- </label></td>
    <td align="left">'.$item_cost[14]." Credits.".'</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><b>Timers:</b></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="16" id="16" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="16">Reset bank robbery timer.</label></td>
    <td width="100" align="left">'.$item_cost[15]." Credits.".'</td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="item" type="radio" value="17" id="17" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="17">Reset Travel Timer.</label></td>
    <td width="100" align="left">'.$item_cost[16]." Credits.".'</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><b>Experience:</b></td>
  </tr>
  <tr>
    <td align="center"><input name="item" type="radio" value="18" id="18" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="18">1000 Experience Points.</label></td>
    <td align="left">'.$item_cost[17]." Credits.".'</td>
  </tr>
  <tr>
    <td align="center"><input name="item" type="radio" value="19" id="19" onFocus="if(this.blur)this.blur()"/></td>
    <td align="left"><label for="19">12.000 Experience Points. </label></td>
    <td align="left">'.$item_cost[18]." Credits.".'</td>
  </tr>
  <tr>
    <td align="center"><input name="item" type="radio" value="20" id="20" onFocus="if(this.blur)this.blur()"/></td>
    <td align="left"><label for="20">25.000 Experience Points. </label></td>
    <td align="left">'.$item_cost[19]." Credits.".'</td>
  </tr>
  <tr>
  <td colspan="3" align="left"><b>Bodyguards:</b></td>
  </tr>
  <tr>
    <td align="center"><input name="item" type="radio" value="21" id="21" onFocus="if(this.blur)this.blur()"/></td>
    <td width="175" align="left"><label for="21">1st Bodyguard.</label></td>
    <td align="left">'.$item_cost[20]." Credits.".'</td>
  </tr>
  <tr>
    <td align="center"><input name="item" type="radio" value="22" id="22" onFocus="if(this.blur)this.blur()"/></td>
    <td align="left"><label for="22">2nd Bodyguard.</label></td>
    <td align="left">'.$item_cost[21]." Credits.".'</td>
  </tr>
  <tr>
    <td align="center"><input name="item" type="radio" value="23" id="23" onFocus="if(this.blur)this.blur()"/></td>
    <td align="left"><label for="23">3rd Bodyguard.</label></td>
    <td align="left">'.$item_cost[22]." Credits.".'</td>
  <tr>
    <td colspan="3" align="right" bgcolor="#414141"><input name="Purchase" type="submit" class="button" id="Purchase" value="Purchase." onFocus="if(this.blur)this.blur()"/>      </td>
  </tr>
</table>
</fieldset>
	</td>
    <td width="25">&nbsp;</td>
    <td width="300" valign="top">
		<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Transfer Credits.</legend>
        <table width="300" border="0" align="center" cellspacing="0" class="table">
          
          <tr>
            <td width="75" align="left"><b>Send to:</b></td>
            <td width="220" colspan="3" align="center"><input name="sendto" type="text" class="entryfield" id="sendto" style=\' width: 95%; \' maxlength="20"/></td>
          </tr>
          <tr>
            <td width="75" align="left"><b>Amount:</b></td>
            <td colspan="3" align="center"><input name="amount" type="text" class="entryfield" id="amount" style=\' width: 95%; \' maxlength="10"/></td>
          </tr>
          <tr>
            <td width="75" align="left"><b>Password:</b></td>
            <td colspan="3" align="center"><input name="password" type="password" class="entryfield" id="password" style=\' width: 95%; \' maxlength="20"/></td>
          </tr>
          <tr>
            <td colspan="4" align="center"><table width="295" border="0" cellspacing="0">
                <tr>
                  <td width="120" align="center"><img width="120" height="30" src="files/button.php" /></td>
                  <td width="75" align="center"><input name="userdigit" type="text" class="entryfield" style=\' width: 80%; \' size="5" maxlength="5" /></td>
                  <td width="100" align="center"><input name="Transfer" type="submit" class="button" id="Transfer" value="Transfer." onFocus="if(this.blur)this.blur()"/></td>
                </tr>
            </table></td>
          </tr>
        </table>
		</fieldset>
		<br />
	<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Last 4 Credit Transactions.
          <a href="page.php?page=credits&action=transfers" onFocus="if(this.blur)this.blur()"> ( View All )</a></legend>
    <table width="300" border="0" align="center" cellspacing="0">
      
      <tr>
        <td colspan="4" align="center"><hr class="hr" /></td>
        </tr>
      <tr>
        <td width="150" align="left"><b>Send to:</b></td>
        <td colspan="3" align="left"><b>Amount:</b></td>
      </tr>
      <tr>
        <td colspan="4" align="center"><hr class="hr" /></td>
        </tr>'; 		
if ($_GET['action'] != "transfers"){$Tlimit = "LIMIT 0,4";}
	$result = mysql_query("SELECT amount,receiver FROM credit_transactions WHERE name='".mysql_real_escape_string($name)."' ORDER BY id DESC ".mysql_real_escape_string($Tlimit)."") or die(mysql_error());
	while($row = mysql_fetch_array( $result )) { 
      echo '<tr>
        <td width="150" align="left">'."<a href=\"page.php?page=view_profile&name=". $row['receiver'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['receiver']."</a>".'</td>
        <td colspan="3" align="left">'.number_format($row['amount']).'</td>
      </tr>';
    } 
    echo '</table>
	</fieldset>
	<br />
	<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Premium Account Info.</legend>
<table width="300" border="0" cellspacing="0">
  <tr>
    <td width="300" align="left"><b>Silver Account:</b></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#414141"><ul>
      <li>Silver Status. </li>
      <li>$ 25,000,-</li>
      <li>1000 Exp points.  </li>
      <li>1000 Bullets. </li>
    </ul></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#414141"><b>Gold Account:</b></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#414141"><ul>
      <li>Gold Status. </li>
      <li>$ 100,000,-</li>
      <li>2000 Exp points.</li>
      <li>3000 bullets.   </li>
    </ul></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#414141"><b>Platinum Account:</b></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#414141"><ul>
      <li>Platinum Status.</li>
      <li>$  250,000,-</li>
      <li>5000 Exp points.</li>
      <li>6000 bullets.  </li>
    </ul></td>
  </tr>
</table>
    </fieldset>
	<br />
	<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Recover Credits.</legend>

    <table width="300" border="0" align="center" cellspacing="0">
      
      <tr>
        <td width="75" align="left"><b>Name:</b></td>
        <td width="225" align="center"><input name="name" type="text" class="entryfield" id="name" /></td>
      </tr>
      <tr>
        <td width="75" align="left"><b>Password:</b></td>
        <td width="225" align="center"><input name="pass" type="password" class="entryfield" id="pass" /></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><input name="recover" type="submit" class="button" id="recover" value="Recover." onFocus="if(this.blur)this.blur()"/>
          </td>
      </tr>
    </table>
	</fieldset>
	</td>
  </tr>
</table>
</form>';

?>