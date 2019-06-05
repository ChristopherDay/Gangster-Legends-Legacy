<?php
if($_SERVER['REQUEST_URI'] == "/gang_club.php"){
exit();
}
?>
<table width="550" border="0" align="center" cellspacing="0">
  <tr>
    <td colspan="3" align="center"><fieldset style="color: #000000; border: 1px solid #000000; width: 450px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Members Online. (<?php 
	
	$sql = "SELECT name,state,sitestate FROM login WHERE DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive AND gang='".$gang."' ORDER BY id ASC";
$query = mysql_query($sql);
$count = mysql_num_rows($query);
$i = 1;
	echo $count;
	?>
) </legend>
<table width="450" border="0" align="center" cellspacing="0">
  
  <tr>
    <td align="left"><?php
while($row = mysql_fetch_object($query)) {
 $online_name = htmlspecialchars($row->name);
  
 echo "<a href=\"page.php?page=view_profile&name=". $online_name ."\" onFocus=\"if(this.blur)this.blur()\">".$online_name."</a>";
 
 if($i != $count) {
  echo "<label> - </label>";
 }
 $i++;
}
?></td>
  </tr>
</table>
</fieldset></td>
  </tr>
  <tr>
    <td colspan="3"><label>&nbsp;</label></td>
  </tr>
  <tr>
    <td width="275" align="center" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 275px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Gang Deposit.</legend>
	<table width="275" border="0" cellspacing="0">
      
      <tr>
        <td width="75" align="left"><b>Current:</b></td>
        <td width="200" align="left"><?php echo "$ ".number_format($gang_bank).",-";?></td>
      </tr>
      
      <tr>
        <td width="75" align="left"><b>Amount:</b></td>
        <td width="200" align="center"><input name="amount" type="text" class="entryfield" id="amount" style=' width: 95%; ' value="$"/></td>
      </tr>
      <tr>
        <td align="left"><b>Password:</b></td>
        <td align="center"><input name="password" type="password" class="entryfield" id="password" style=' width: 95%; '/></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><input name="Donate" type="submit" class="button" id="Donate" value="Donate."  onFocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table>
	</fieldset>
	</td>
    <td width="25"><label>&nbsp;</label></td>
    <td width="250" align="left" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Leave Gang.</legend>
	<table width="250" border="0" cellspacing="0">
      
      <tr>
        <td align="left">Leaving <?php echo $gang_name; ?> will cost you:
          <ul>
                <li>Your gun.</li>
            <li>Your protection.</li>
            <li>$ 25,000,- leaving fee. </li>
          </ul></td>
      </tr>
      <tr>
        <td align="right"><input name="Leave" type="submit" class="button" id="Leave" value="Leave Gang." onFocus="if(this.blur)this.blur()"  /></td>
      </tr>
    </table>
	</fieldset>
	</td>
  </tr>
</table>

<?php if($gang_leader == $name){?>
<table width="600" border="0" align="center" cellspacing="0">
  <tr>
    <td width="275" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td width="300" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="275" rowspan="7" align="center" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 275px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Bank Transfers:
(<a href="page.php?page=gang&action=all" onFocus="if(this.blur)this.blur()">View All</a>)
.</legend>
	<table width="275" border="0" align="center" cellspacing="0">
      
      <tr>
        <td colspan="2" align="center"><hr class="hr" /></td>
        </tr>
      <tr>
        <td width="125" align="left"><b>Transaction To/By:</b></td>
        <td width="150" align="left"><b>Amount:</b></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><hr class="hr" /></td>
        </tr>
      <? if ($_GET['action'] != "all"){$Rlimit = "LIMIT 0,5";}
	$result = mysql_query("SELECT * FROM gang_bank WHERE gang='".mysql_real_escape_string($gang_name)."' ORDER BY id DESC ".mysql_real_escape_string($Rlimit)."") or die(mysql_error());
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
// Print out the contents of each row into a table?>
      <tr>
        <td width="125" align="left"><?php echo "<a href=\"page.php?page=view_profile&name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a>"; ?></td>
        <td width="150" align="left"><?php echo "$ ".number_format($row['amount']).",-"; ?></td>
      </tr>
      <?php } // while
// end print out results received.?>
    </table>
	</fieldset>	</td>
    <td width="25" valign="top">&nbsp;</td>
    <td width="300" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Gang Status.</legend>
	<table width="100%" border="0" cellspacing="0">
      
      <tr>
        <td width="50" align="left"><b>Status:</b></td>
        <td width="50" align="center"><?php if($gang_rec == 1){ echo "Yes."; }else{ echo "No."; } ?></td>
        <td width="200" align="center"><select name="rec_status" id="rec_status" class="entryfield">
          <option value="1">Yes.</option>
          <option value="2">No.</option>
        </select>        </td>
      </tr>
      <tr>
        <td colspan="3" align="right"><input name="Update_rec" type="submit" class="button" id="Update_rec" value="Update."  onFocus="if(this.blur)this.blur()"/></td>
      </tr>
      <tr>
        <td colspan="3" align="left"><hr class="hr" /></td>
      </tr>
      <tr>
        <td colspan="3" align="left">Upgrade Gang Size (<?php echo $gang_size; ?>): </td>
      </tr>
      <tr>
        <td colspan="3" align="left"><hr class="hr" /></td>
      </tr>
      <tr>
        <td colspan="2" align="left">25 Members: </td>
        <td align="left">$ 250,000,- </td>
      </tr>
      <tr>
        <td colspan="2" align="left">50 Members: </td>
        <td align="left">$ 500,000,- </td>
      </tr>
      <tr>
        <td colspan="2" align="left">100 Members: </td>
        <td align="left">$ 1,000,000,- </td>
      </tr>
      <tr>
        <td colspan="2" align="left">&nbsp;</td>
        <td align="right"><input name="Upgrade" type="submit" class="button" id="Upgrade" value="Upgrade."  onfocus="if(this.blur)this.blur()"/></td>
      </tr>
    </table>
	</fieldset>	</td>
  </tr>
  <tr>
    <td width="25">&nbsp;</td>
    <td width="300">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Members.</legend>
	<table width="100%" border="0" cellspacing="0">
      
      <tr>
        <td align="center"><select name="members" class="entryfield" id="members">
          <?php    

$sql = "SELECT * FROM login WHERE gang = '".$gang_name."' ORDER BY name DESC LIMIT 0,50"; 
$res = mysql_query($sql) or die(mysql_error()); 
while ($row = mysql_fetch_array($res)) { 
echo "<option value=\"".$row['name']."\">".$row['name']."</option>";	  
}// while loop ?>
        </select></td>
      </tr>
      <tr>
        <td align="right"><input name="Kick" type="submit" class="button" id="Kick" value="Kick."  onFocus="if(this.blur)this.blur()"/></td>
      </tr>
    </table>
	</fieldset></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Applications.</legend>
	<table width="300" border="0" cellspacing="0">
      
      <tr>
        <td colspan="2" align="center"><hr class="hr" /></td>
        </tr>
      <tr>
        <td width="125" align="left"><b>Name:</b></td>
        <td width="150" align="left"><b>Rank:</b></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><hr class="hr" /></td>
        </tr>
      <? 
	$result = mysql_query("SELECT * FROM gang_aply WHERE gang='".mysql_real_escape_string($gang_name)."' ORDER BY name DESC ") or die(mysql_error());
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
// Print out the contents of each row into a table?>
      <tr>
        <td width="125" align="left"><input name="invite_id" type="radio" value="<?php echo $row['name']; ?>" onFocus="if(this.blur)this.blur()" />
              <?php echo "<a href=\"page.php?page=view_profile&name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a>"; ?></td>
        <td width="150" align="left"><label><?php echo $rank_array[$row['rank']]; ?></label></td>
      </tr>
      <?php } // while
// end print out results received.?>
      <tr>
        <td colspan="2" align="right"><input name="Decline" type="submit" class="button" id="Decline" value="Decline." onFocus="if(this.blur)this.blur()" />
            <input name="accept" type="submit" class="button" id="accept" value="accept." onFocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table>
	</fieldset>	</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td align="center" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Swap Leadership.</legend>
	<table width="300" border="0" align="center" cellspacing="0">
      
      <tr>
        <td width="50" align="left"><label>Name:</label></td>
        <td width="275" align="center"><select name="leader" class="entryfield" id="leader">
            <option value="Select.">Select.</option>
            <?php    

$sql = "SELECT * FROM login WHERE gang = '".mysql_real_escape_string($gang_name)."' AND rank!='0' AND rank!='1' AND rank!='2' AND rank!='3' AND rank!='4' AND rank!='5' AND sitestate!='2' AND sitestate!='1' ORDER BY rank DESC"; 
$res = mysql_query($sql) or die(mysql_error()); 
while ($row = mysql_fetch_array($res)) { 
echo "<option value=\"".$row['name']."\">".$row['name']."</option>";	  
}// while loop ?>
        </select></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><input name="Swap" type="submit" class="button" id="Swap" value="Swap." onFocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table>
	</fieldset>	</td>
  </tr>
  
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Hitlist.</legend>
	<table width="300" border="0" align="center" cellspacing="0">
      <tr>
        <td align="left"><b>Target:</b></td>
        <td width="225" align="center"><input name="target" type="text" class="entryfield" maxlength="20"/></td>
      </tr>
      <tr>
        <td align="left"><b>Amount:</b></td>
        <td width="225" align="center"><input name="amount_hitlist" type="text" class="entryfield" id="amount_hitlist" value="$"/></td>
      </tr>
      <tr>
        <td align="left" valign="top"><b>Anonymous:</b></td>
        <td width="225" align="left"><input name="an" type="radio" value="2" id="yes" onfocus="if(this.blur)this.blur()" />
            <label for="yes">Yes. ( + $ 25,000,- ) </label>
            <input name="an" type="radio" value="1" id="no" onfocus="if(this.blur)this.blur()" checked="checked" />
            <label for="no">No.</label></td>
      </tr>
      <tr>
        <td align="left" valign="top"><b>Reason:</b></td>
        <td width="225" align="center"><textarea name="reason" rows="8" class="textbox"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><table width="295" border="0" cellspacing="0">
            <tr>
              <td width="120" align="center"><img src="button.php" alt="Verification." width="120" height="30" /></td>
              <td width="75" align="center"><input name="userdigit" type="text" class="entryfield" style='width: 85%; ' size="5" maxlength="5"<?php echo $disabled; ?>/></td>
              <td width="120" align="center"><input name="Hitlist" type="submit" class="button" id="Hitlist" value="Hitlist." onfocus="if(this.blur)this.blur()" /></td>
            </tr>
        </table></td>
      </tr>
    </table>
	</fieldset>	</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Profile.</legend>
<textarea name="quote_box" cols="50" rows="10" class="textbox" id="quote_box" style='width: 98%;'/>
<?php echo htmlspecialchars(stripslashes($gang_quote)); ?></textarea>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td align="right"><input name="Quote" type="submit" class="button" id="Quote" value="Update Quote." onFocus="if(this.blur)this.blur()" /></td>
  </tr>
</table>
</fieldset></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Profile picture.</legend>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><?php
	
if(empty($gang_picture)){
	echo "No Picture.";
}else{
	echo "<img src=\"http://".$gang_picture."\" style=\" border: 1px #000000 solid;\"/>";		
}// if no Picture.  
		  ?></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td width="50" align="left"><b>Url:</b></td>
    <td align="center"><input name="Url" type="text" class="entryfield" id="Url" value="http://<?php echo $gang_picture; ?>" maxlength="255" /></td>
    <td width="100" align="right"><input name="Update_url" type="submit" class="button" id="Update_url" value="Update." onfocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
</fieldset></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Transfer Money.</legend>
<table width="295" border="0" align="center" cellspacing="0">
  <tr>
    <td width="75"><b>Send to: </b></td>
    <td width="220" align="center"><input name="send_to" type="text" class="entryfield" id="send_to" style=' width: 95%; '/></td>
  </tr>
  <tr>
    <td width="75"><b>Amount: </b></td>
    <td width="220" align="center"><input name="bank_amount" type="text" class="entryfield" id="bank_amount" style=' width: 95%; ' value="$" maxlength="20"/></td>
  </tr>
  <tr>
    <td width="75"><b>Password: </b></td>
    <td width="220" align="center"><input name="password_transfer" type="password" class="entryfield" id="password_transfer" style=' width: 95%; '/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><input name="Send_money" type="submit" class="button" id="Send_money" value="Transfer." onfocus="if(this.blur)this.blur()"/></td>
  </tr>
</table>
    </fieldset>
</td>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top"><fieldset style="color: #000000; border: 1px solid #000000; width: 300px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Change Gang name.</legend>
<table width="300" border="0" cellspacing="0">
  
  <tr>
    <td align="center"><input name="new_name" type="text" class="entryfield" id="new_name" onfocus="if(this.value=='Name')this.value='';" value="Name" /></td>
  </tr>
  <tr>
    <td align="right"><input name="Change" type="submit" class="button" id="Change" value="Change."  onfocus="if(this.blur)this.blur()" />      </td>
  </tr>
</table>
</fieldset></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
	<fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Member Information.</legend>
	<table width="600" border="0" align="center" cellspacing="0">
      
      <tr>
        <td colspan="5" align="center"><hr class="hr" /></td>
        </tr>
      <tr>
        <td width="175"><b>Name:</b></td>
        <td width="100"><b>Rank:</b></td>
        <td width="100"><b>Weapon:</b></td>
        <td width="100"><b>Protection:</b></td>
        <td width="125"><b>Cash:</b></td>
      </tr>
      <tr>
        <td colspan="5" align="center"><hr class="hr" /></td>
        </tr>
      <? 
		$result = mysql_query("SELECT name,rank,armor,weapon,money,health FROM login WHERE gang='".$gang_name."' ORDER BY rank ASC") or die(mysql_error());
	
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
// Print out the contents of each row into a table
?>
      <tr>
        <td width="175" align="left" valign="top"><?php echo "<a href=\"page.php?page=view_profile&name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']." (".$row['health']."%)</a>"; ?></td>
        <td width="100" align="left" valign="top"><?php echo $rank_array[$row['rank']]; ?></td>
        <td width="100" align="left" valign="top"><?php echo $gun_array[$row['weapon']]; ?></td>
        <td width="100" align="left" valign="top"><?php echo $protection_array[$row['armor']]; ?></td>
        <td width="125" align="left" valign="top"><?php echo "$ ".number_format($row['money']).",-"; ?></td>
      </tr>
      <? }// while loop ?>
    </table>
	</fieldset>	</td>
  </tr>
</table>
<?php }// if gang leader ?>
