<form method="post">
<?php if (in_array($name, $admin_array) or in_array($name, $manager_array)){ 

$page_array = array("News", "Mailbox", "Send Letter", "Forum", "Account", "Online", "Search", "F.A.Q", "Notepad", "Donate", "Credits", "Referrals", "Crimes", "Auto Theft", "Smuggle", "Hitlist", "Murder", "Bank Robbery", "Car Market", "Gang", "Gang Bar", "Gang Information", "Bullet Store", "Shooting Range", "Hospital", "Travel Agency", "Prison", "Roulette", "Keno", "Horse Racing", "Casino Information", "Login", "Register", "Lost Password", "Transfer", "Black Market", "Profile", "Gang Profile", "War", "Rock Paper Scrissors", "Multiplayer Dice", "Lottery", "Ace Club", "Swiss Bank", "Extortion", "Help Desk", "blackjack", "Police Chase", "Credit Auction", "Car Crusher", "Booze Brewery", "Liqueur Store", "Stock Market");

if(isset($_POST['Update'])){

	if(empty($_POST['page'])){
		echo "You didn't select a page.";
	}else{
		
		$_POST['page'] = $_POST['page'] - 1;
		
		if(empty($page_status_array[$_POST['page']])){
		$page_status_array[$_POST['page']] = $_POST['Reason'];
		echo "The ".$page_array[$_POST['page']]." page has been disabled.";
		}else{
		$page_status_array[$_POST['page']] = "";
		echo "The ".$page_array[$_POST['page']]." page has been Enabled.";
		}
		
$arrayrates = array($page_status_array[0], $page_status_array[1], $page_status_array[2], $page_status_array[3], $page_status_array[4], $page_status_array[5], $page_status_array[6], $page_status_array[7], $page_status_array[8], $page_status_array[9], $page_status_array[10], $page_status_array[11], $page_status_array[12], $page_status_array[13], $page_status_array[14], $page_status_array[15], $page_status_array[16], $page_status_array[17], $page_status_array[18], $page_status_array[19], $page_status_array[20], $page_status_array[21], $page_status_array[22], $page_status_array[23], $page_status_array[24], $page_status_array[25], $page_status_array[26], $page_status_array[27], $page_status_array[28], $page_status_array[29], $page_status_array[30], $page_status_array[31], $page_status_array[32], $page_status_array[33], $page_status_array[34], $page_status_array[35], $page_status_array[36], $page_status_array[37], $page_status_array[38], $page_status_array[39], $page_status_array[40], $page_status_array[41], $page_status_array[42], $page_status_array[43], $page_status_array[44], $page_status_array[45], $page_status_array[46], $page_status_array[47], $page_status_array[48], $page_status_array[49], $page_status_array[50], $page_status_array[51], $page_status_array[52]);
$newrates = implode("-", $arrayrates);

$result = mysql_query("UPDATE sitestats SET status='".mysql_real_escape_string($newrates)."' WHERE id='1'") 
or die(mysql_error());
		
	}
}

?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
      <legend style="color: #999999; font-weight: bold;">Disable Page.</legend>
	  <table width="550" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="1" id="1" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="1" >News.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[0])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="19" id="2" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="2" >Car Market.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[18])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="2" id="3" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="3" >Mailbox.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[1])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="20" id="4" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="4" >Gang.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[19])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="3" id="5" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="5" >Send Letter.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[2])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="21" id="6" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="6" >Gang Bar.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[20])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="4" id="7" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="7" >Forum.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[3])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="22" id="8" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="8" >Gang Information.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[21])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="5" id="9" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="9" >Account.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[4])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="23" id="10" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="10" >Bullet Store.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[22])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="6" id="11" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="11" >Online.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[5])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="24" id="12" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="12" >Shooting Range.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[23])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="7" id="13" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="13" >Search.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[6])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="25" id="14" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="14" >Hospital.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[24])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="8" id="15" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="15" >F.A.Q.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[7])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="26" id="16" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="16" >Travel Agency.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[25])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="9" id="17" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="17" >Notepad.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[8])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="27" id="18" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="18" >Prison.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[26])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="10" id="19" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="19" >Donate.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[9])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="28" id="20" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="20" >Roulette.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[27])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="11" id="21" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="21" >Credits.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[10])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="29" id="22" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="22" >Keno.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[28])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="12" id="23" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="23" >Referrals.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[11])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="30" id="24" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="24" >Horse Racing.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[29])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="13" id="25" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="25" >Crimes.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[12])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="31" id="26" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="26" >Casino Information.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[30])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="14" id="27" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="27" >Auto Theft.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[13])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="32" id="28" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="28" >Login.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[31])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="15" id="29" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="29" >Smuggle.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[14])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="33" id="30" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="30" >Register.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[32])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="16" id="31" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="31" >Hitlist.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[15])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="34" id="32" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="32" >Lost Password.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[33])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="17" id="33" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="33" >Murder.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[16])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="35" id="34" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="34" >Transfer.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[34])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td width="25" align="center"><input name="page" type="radio" value="18" id="35" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="35" >Bank Robbery.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[17])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td width="25" align="center"><input name="page" type="radio" value="36" id="36" onFocus="if(this.blur)this.blur()" /></td>
    <td width="200" align="left"><label for="36" >Black Market.</label></td>
    <td width="50" align="left"><?php if(empty($page_status_array[35])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td align="center"><input name="page" type="radio" value="37" id="37" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="37" >Profile.</label></td>
    <td align="left"><?php if(empty($page_status_array[36])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td align="center"><input name="page" type="radio" value="38" id="38" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="38" >Gang Profile.</label></td>
    <td align="left"><?php if(empty($page_status_array[37])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td align="center"><input name="page" type="radio" value="39" id="39" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="39" >War.</label></td>
    <td align="left"><?php if(empty($page_status_array[38])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td align="center"><input name="page" type="radio" value="40" id="40" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="40">Rock Paper Scissors.</label></td>
    <td align="left"><?php if(empty($page_status_array[39])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td align="center"><input name="page" type="radio" value="41" id="41" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="41" >Multiplayer Dice.</label></td>
    <td align="left"><?php if(empty($page_status_array[40])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td align="center"><input name="page" type="radio" value="42" id="42" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="42">Lottery.</label></td>
    <td align="left"><?php if(empty($page_status_array[41])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td align="center"><input name="page" type="radio" value="43" id="43" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="43">Ace Club.</label></td>
    <td align="left"><?php if(empty($page_status_array[42])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td align="center"><input name="page" type="radio" value="44" id="44" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="44">Swiss Bank.</label></td>
    <td align="left"><?php if(empty($page_status_array[43])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td align="center"><input name="page" type="radio" value="45" id="45" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="45">Extortion.</label></td>
    <td align="left"><?php if(empty($page_status_array[44])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td align="center"><input name="page" type="radio" value="46" id="46" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="46">Help Desk.</label></td>
    <td align="left"><?php if(empty($page_status_array[45])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td align="center"><input name="page" type="radio" value="47" id="47" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="47">Blackjack.</label></td>
    <td align="left"><?php if(empty($page_status_array[46])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td align="center"><input name="page" type="radio" value="48" id="48" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="48">Police Chase. </label></td>
    <td align="left"><?php if(empty($page_status_array[47])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td align="center"><input name="page" type="radio" value="49" id="49" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="49">Credit Auction. </label></td>
    <td align="left"><?php if(empty($page_status_array[48])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td align="center"><input name="page" type="radio" value="50" id="50" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="50">Car Crusher. </label></td>
    <td align="left"><?php if(empty($page_status_array[49])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  
  <tr>
    <td align="center"><input name="page" type="radio" value="51" id="51" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="51">Booze Brewery. </label></td>
    <td align="left"><?php if(empty($page_status_array[50])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td align="center"><input name="page" type="radio" value="52" id="52" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="52">Liqueur Store. </label></td>
    <td align="left"><?php if(empty($page_status_array[51])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
  </tr>
  <tr>
    <td align="center"><input name="page" type="radio" value="53" id="53" onfocus="if(this.blur)this.blur()" /></td>
    <td align="left"><label for="53">Stock Market. </label></td>
    <td align="left"><?php if(empty($page_status_array[52])){ echo "Enabled."; }else{ echo "<b>Disabled.</b>";}?></td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  

  <tr>
    <td colspan="6" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td colspan="6" align="center"><table width="550" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50" align="left"><b>Reason:</b></td>
        <td width="400" align="center"><input name="Reason" type="text" class="entryfield" id="Reason" style='width: 95%; ' maxlength="100" /></td>
        <td width="100" align="center"><input name="Update" type="submit" class="button" id="Update" value="Update." onfocus="if(this.blur)this.blur()"/></td>
      </tr>
    </table></td>
    </tr>
  
  <tr>
    <td colspan="6" align="center"><hr class="hr" /></td>
    </tr>
</table>
</fieldset>
	</form>
<?php } ?>

