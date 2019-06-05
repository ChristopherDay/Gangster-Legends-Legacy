<form method="post">
<?php 

if($owner == "No Owner." or $casino_state != 0){?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;"><?php echo "Purchase ".$location_array[$location]." Roulette.";?></legend>
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
<legend style="color: #999999; font-weight: bold;"><?php echo $location_array[$location]." Roulette.";?></legend>
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
    <td align="left"><?php echo "$ ".number_format($rl_max).",-"; ?></td>
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
    <td colspan="2" align="left"><b>Transfer Roulette:</b></td>
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
<fieldset style="color: #000000; border: 1px solid #000000; width: 450px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;"><?php echo $location_array[$location];?> Roulette.</legend>
<table width="450" border="0" align="center" cellspacing="0">
  <tr>
    <td width="30" align="right">1</td>
    <td width="120"><input name="1" type="text" class="entryfield" value="<?php echo $_POST['1']; ?>" size="15" /></td>
    <td width="30" align="right">2</td>
    <td width="120"><input name="2" type="text" class="entryfield" value="<?php echo $_POST['2']; ?>" size="15" /></td>
    <td width="30" align="right">3</td>
    <td width="120"><input name="3" type="text" class="entryfield" value="<?php echo $_POST['3']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">4</td>
    <td width="120"><input name="4" type="text" class="entryfield" id="4" value="<?php echo $_POST['4']; ?>" size="15" /></td>
    <td width="30" align="right">5</td>
    <td width="120"><input name="5" type="text" class="entryfield" id="5" value="<?php echo $_POST['5']; ?>" size="15" /></td>
    <td width="30" align="right">6</td>
    <td width="120"><input name="6" type="text" class="entryfield" id="6" value="<?php echo $_POST['6']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">7</td>
    <td width="120"><input name="7" type="text" class="entryfield" id="7" value="<?php echo $_POST['7']; ?>" size="15" /></td>
    <td width="30" align="right">8</td>
    <td width="120"><input name="8" type="text" class="entryfield" id="8" value="<?php echo $_POST['8']; ?>" size="15" /></td>
    <td width="30" align="right">9</td>
    <td width="120"><input name="9" type="text" class="entryfield" id="9" value="<?php echo $_POST['9']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">10</td>
    <td width="120"><input name="10" type="text" class="entryfield" id="10" value="<?php echo $_POST['10']; ?>" size="15" /></td>
    <td width="30" align="right">11</td>
    <td width="120"><input name="11" type="text" class="entryfield" id="11" value="<?php echo $_POST['11']; ?>" size="15" /></td>
    <td width="30" align="right">12</td>
    <td width="120"><input name="12" type="text" class="entryfield" id="12" value="<?php echo $_POST['12']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">13</td>
    <td width="120"><input name="13" type="text" class="entryfield" id="13" value="<?php echo $_POST['13']; ?>" size="15" /></td>
    <td width="30" align="right">14</td>
    <td width="120"><input name="14" type="text" class="entryfield" id="14" value="<?php echo $_POST['14']; ?>" size="15" /></td>
    <td width="30" align="right">15</td>
    <td width="120"><input name="15" type="text" class="entryfield" id="15" value="<?php echo $_POST['15']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">16</td>
    <td width="120"><input name="16" type="text" class="entryfield" id="16" value="<?php echo $_POST['16']; ?>" size="15" /></td>
    <td width="30" align="right">17</td>
    <td width="120"><input name="17" type="text" class="entryfield" id="17" value="<?php echo $_POST['17']; ?>" size="15" /></td>
    <td width="30" align="right">18</td>
    <td width="120"><input name="18" type="text" class="entryfield" id="18" value="<?php echo $_POST['18']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">19</td>
    <td width="120"><input name="19" type="text" class="entryfield" id="19" value="<?php echo $_POST['19']; ?>" size="15" /></td>
    <td width="30" align="right">20</td>
    <td width="120"><input name="20" type="text" class="entryfield" id="20" value="<?php echo $_POST['20']; ?>" size="15" /></td>
    <td width="30" align="right">21</td>
    <td width="120"><input name="21" type="text" class="entryfield" id="21" value="<?php echo $_POST['21']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">22</td>
    <td width="120"><input name="22" type="text" class="entryfield" id="22" value="<?php echo $_POST['22']; ?>" size="15" /></td>
    <td width="30" align="right">23</td>
    <td width="120"><input name="23" type="text" class="entryfield" id="23" value="<?php echo $_POST['23']; ?>" size="15" /></td>
    <td width="30" align="right">24</td>
    <td width="120"><input name="24" type="text" class="entryfield" id="24" value="<?php echo $_POST['24']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">25</td>
    <td width="120"><input name="25" type="text" class="entryfield" id="25" value="<?php echo $_POST['25']; ?>" size="15" /></td>
    <td width="30" align="right">26</td>
    <td width="120"><input name="26" type="text" class="entryfield" id="26" value="<?php echo $_POST['26']; ?>" size="15" /></td>
    <td width="30" align="right">27</td>
    <td width="120"><input name="27" type="text" class="entryfield" id="27" value="<?php echo $_POST['27']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">28</td>
    <td width="120"><input name="28" type="text" class="entryfield" id="28" value="<?php echo $_POST['28']; ?>" size="15" /></td>
    <td width="30" align="right">29</td>
    <td width="120"><input name="29" type="text" class="entryfield" id="29" value="<?php echo $_POST['29']; ?>" size="15" /></td>
    <td width="30" align="right">30</td>
    <td width="120"><input name="30" type="text" class="entryfield" id="30" value="<?php echo $_POST['30']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">31</td>
    <td width="120"><input name="31" type="text" class="entryfield" id="31" value="<?php echo $_POST['31']; ?>" size="15" /></td>
    <td width="30" align="right">32</td>
    <td width="120"><input name="32" type="text" class="entryfield" id="32" value="<?php echo $_POST['32']; ?>" size="15" /></td>
    <td width="30" align="right">33</td>
    <td width="120"><input name="33" type="text" class="entryfield" id="33" value="<?php echo $_POST['33']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right">34</td>
    <td width="120"><input name="34" type="text" class="entryfield" id="34" value="<?php echo $_POST['34']; ?>" size="15" /></td>
    <td width="30" align="right">35</td>
    <td width="120"><input name="35" type="text" class="entryfield" id="35" value="<?php echo $_POST['35']; ?>" size="15" /></td>
    <td width="30" align="right">36</td>
    <td width="120"><input name="36" type="text" class="entryfield" id="36" value="<?php echo $_POST['36']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right"><label>Red:</label></td>
    <td width="120"><input name="red" type="text" class="entryfield" id="red" value="<?php echo $_POST['red']; ?>" size="15" /></td>
    <td width="30" align="right"><label>Black:</label></td>
    <td width="120"><input name="black" type="text" class="entryfield" id="black" value="<?php echo $_POST['black']; ?>" size="15" /></td>
    <td width="30" align="right"><label>Odd:</label></td>
    <td width="120"><input name="odd" type="text" class="entryfield" id="odd" value="<?php echo $_POST['odd']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right"><label>Even:</label></td>
    <td width="120"><input name="even" type="text" class="entryfield" id="even" value="<?php echo $_POST['even']; ?>" size="15" /></td>
    <td width="30" align="right"><label>1-18:</label></td>
    <td width="120"><input name="1-18" type="text" class="entryfield" id="1-18" value="<?php echo $_POST['1-18']; ?>" size="15" /></td>
    <td width="30" align="right"><label>19-36:</label></td>
    <td width="120"><input name="19-36" type="text" class="entryfield" id="19-36" value="<?php echo $_POST['19-36']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right"><label>1-12:</label></td>
    <td width="120"><input name="1-12" type="text" class="entryfield" id="1-12" value="<?php echo $_POST['1-12']; ?>" size="15" /></td>
    <td width="30" align="right"><label>13-24:</label></td>
    <td width="120"><input name="13-24" type="text" class="entryfield" id="13-24" value="<?php echo $_POST['13-24']; ?>" size="15" /></td>
    <td width="30" align="right"><label>25-36:</label></td>
    <td width="120"><input name="25-36" type="text" class="entryfield" id="25-36" value="<?php echo $_POST['25-36']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td width="30" align="right"><label>1th:</label></td>
    <td width="120"><input name="th" type="text" class="entryfield" id="th" value="<?php echo $_POST['th']; ?>" size="15" /></td>
    <td width="30" align="right"><label>2nd:</label></td>
    <td width="120"><input name="nd" type="text" class="entryfield" id="nd" value="<?php echo $_POST['nd']; ?>" size="15" /></td>
    <td width="30" align="right"><label>3rd:</label></td>
    <td width="120"><input name="rd" type="text" class="entryfield" id="rd" value="<?php echo $_POST['rd']; ?>" size="15" /></td>
  </tr>
  <tr>
    <td colspan="3" align="left"><b>Owner:
      <?php 
			  if($owner != "No Owner."){echo "<a href=\"page.php?page=view_profile&name=". $owner ."\" onFocus=\"if(this.blur)this.blur()\">".$owner."</a>"; }else{echo "No Owner.";} ?>
    </b></td>
    <td rowspan="2" align="center"><input name="Reset" type="reset" class="button" value="Reset" onFocus="if(this.blur)this.blur()"/></td>
    <td colspan="2" rowspan="2" align="center"><input name="Bet" type="submit" class="button" id="Bet" value="Spin The Wheel." onFocus="if(this.blur)this.blur()"/></td>
    </tr>
  <tr>
    <td colspan="3" align="left"><b>Max bet: <?php echo "$ ".number_format($rl_max).",-";?></b></td>
    </tr>
</table>
</fieldset>
<?php 
}// if casino mode.
	}// ifowner
  		}// no owner.
  ?>
