	<script language="JavaScript" type="text/javascript">
		function kenoit(number) 
	{
		var value1 = document.kenotable.value1.value;
		var value2 = document.kenotable.value2.value;
		var value3 = document.kenotable.value3.value;
		var value4 = document.kenotable.value4.value;
		var value5 = document.kenotable.value5.value;
		var value6 = document.kenotable.value6.value;
		var value7 = document.kenotable.value7.value;
		var value8 = document.kenotable.value8.value;
		var value9 = document.kenotable.value9.value;
		var value10 = document.kenotable.value10.value;
		if (value1 == 'NA') { document.kenotable.value1.value = number; value1 = number; return false; }
		if (value2 == 'NA') { document.kenotable.value2.value = number; value2 = number; return false; }
		if (value3 == 'NA') { document.kenotable.value3.value = number; value3 = number; return false; }
		if (value4 == 'NA') { document.kenotable.value4.value = number; value4 = number; return false; }
		if (value5 == 'NA') { document.kenotable.value5.value = number; value5 = number; return false; }
		if (value6 == 'NA') { document.kenotable.value6.value = number; value6 = number; return false; }
		if (value7 == 'NA') { document.kenotable.value7.value = number; value7 = number; return false; }
		if (value8 == 'NA') { document.kenotable.value8.value = number; value8 = number; return false; }
		if (value9 == 'NA') { document.kenotable.value9.value = number; value9 = number; return false; }
		if (value10 == 'NA') { document.kenotable.value10.value = number; value10 = number; return false; }
		if (value10 != 'NA') { alert('You may only select 10 numbers!'); return false; }
	}
	

	var highlightbehavior="TD"

	var ns6=document.getElementById&&!document.all
	var ie=document.all

	function changeto(e,highlightcolor){
	var value10 = document.kenotable.value10.value;
	if(value10 != 'NA'){ return false; }
	source=ie? event.srcElement : e.target
	if (source.tagName=="TABLE")
	return
	while(source.tagName!=highlightbehavior && source.tagName!="HTML")
	source=ns6? source.parentNode : source.parentElement
	if (source.style.backgroundColor!=highlightcolor&&source.id!="ignore")
	source.style.backgroundColor=highlightcolor
	}

</script>
<form method="post" name="kenotable">
<?php 
if($owner == "No Owner." or $casino_state != 0){?>

<fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;"><?php echo "Purchase ".$location_array[$location]." Keno.";?></legend>
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
<legend style="color: #999999; font-weight: bold;"><?php echo $location_array[$location]." Keno.";?></legend>
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
    <td align="left"><?php echo "$ ".number_format($keno_max).",-"; ?></td>
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
    <td colspan="2" align="left"><b>Transfer Keno:</b></td>
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
<legend style="color: #999999; font-weight: bold;"><?php echo $location_array[$location];?> Keno.</legend>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="8" align="center">Select 10 Numbers: </td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[1]; ?>" onclick="kenoit(1)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">1</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[2]; ?>" onclick="kenoit(2)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">2</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[3]; ?>" onclick="kenoit(3)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">3</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[4]; ?>" onclick="kenoit(4)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">4</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[5]; ?>" onclick="kenoit(5)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">5</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[6]; ?>" onclick="kenoit(6)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">6</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[7]; ?>" onclick="kenoit(7)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">7</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[8]; ?>" onclick="kenoit(8)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">8</td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[9]; ?>" onclick="kenoit(9)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">9</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[10]; ?>" onclick="kenoit(10)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">10</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[11]; ?>" onclick="kenoit(11)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">11</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[12]; ?>" onclick="kenoit(12)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">12</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[13]; ?>" onclick="kenoit(13)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">13</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[14]; ?>" onclick="kenoit(14)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">14</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[15]; ?>" onclick="kenoit(15)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">15</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[16]; ?>" onclick="kenoit(16)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">16</td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[17]; ?>" onclick="kenoit(17)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">17</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[18]; ?>" onclick="kenoit(18)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">18</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[19]; ?>" onclick="kenoit(19)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">19</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[20]; ?>" onclick="kenoit(20)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">20</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[21]; ?>" onclick="kenoit(21)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">21</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[22]; ?>" onclick="kenoit(22)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">22</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[23]; ?>" onclick="kenoit(23)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">23</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[24]; ?>" onclick="kenoit(24)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">24</td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[25]; ?>" onclick="kenoit(25)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">25</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[26]; ?>" onclick="kenoit(26)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">26</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[27]; ?>" onclick="kenoit(27)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">27</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[28]; ?>" onclick="kenoit(28)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">28</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[29]; ?>" onclick="kenoit(29)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">29</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[30]; ?>" onclick="kenoit(30)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">30</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[31]; ?>" onclick="kenoit(31)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">31</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[32]; ?>" onclick="kenoit(32)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">32</td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[33]; ?>" onclick="kenoit(33)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">33</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[34]; ?>" onclick="kenoit(34)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">34</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[35]; ?>" onclick="kenoit(35)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">35</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[36]; ?>" onclick="kenoit(36)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">36</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[37]; ?>" onclick="kenoit(37)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">37</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[38]; ?>" onclick="kenoit(38)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">38</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[39]; ?>" onclick="kenoit(39)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">39</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[40]; ?>" onclick="kenoit(40)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">40</td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[41]; ?>" onclick="kenoit(41)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">41</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[42]; ?>" onclick="kenoit(42)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">42</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[43]; ?>" onclick="kenoit(43)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">43</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[44]; ?>" onclick="kenoit(44)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">44</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[45]; ?>" onclick="kenoit(45)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">45</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[46]; ?>" onclick="kenoit(46)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">46</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[47]; ?>" onclick="kenoit(47)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">47</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[48]; ?>" onclick="kenoit(48)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">48</td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[49]; ?>" onclick="kenoit(49)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">49</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[50]; ?>" onclick="kenoit(50)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">50</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[51]; ?>" onclick="kenoit(51)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">51</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[52]; ?>" onclick="kenoit(52)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">52</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[53]; ?>" onclick="kenoit(53)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">53</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[54]; ?>" onclick="kenoit(54)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">54</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[55]; ?>" onclick="kenoit(55)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">55</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[56]; ?>" onclick="kenoit(56)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">56</td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[57]; ?>" onclick="kenoit(57)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">57</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[58]; ?>" onclick="kenoit(58)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">58</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[59]; ?>" onclick="kenoit(59)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">59</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[60]; ?>" onclick="kenoit(60)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">60</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[61]; ?>" onclick="kenoit(61)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">61</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[62]; ?>" onclick="kenoit(62)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">62</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[63]; ?>" onclick="kenoit(63)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">63</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[64]; ?>" onclick="kenoit(64)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">64</td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[65]; ?>" onclick="kenoit(65)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">65</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[66]; ?>" onclick="kenoit(66)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">66</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[67]; ?>" onclick="kenoit(67)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">67</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[68]; ?>" onclick="kenoit(68)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">68</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[69]; ?>" onclick="kenoit(69)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">69</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[70]; ?>" onclick="kenoit(70)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">70</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[71]; ?>" onclick="kenoit(71)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">71</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[72]; ?>" onclick="kenoit(72)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">72</td>
  </tr>
  <tr>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[73]; ?>" onclick="kenoit(73)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">73</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[74]; ?>" onclick="kenoit(74)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">74</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[75]; ?>" onclick="kenoit(75)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">75</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[76]; ?>" onclick="kenoit(76)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">76</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[77]; ?>" onclick="kenoit(77)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">77</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[78]; ?>" onclick="kenoit(78)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">78</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[79]; ?>" onclick="kenoit(79)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">79</td>
    <td width="50" height="25" align="center" bgcolor="<?php echo $c_number_[80]; ?>" onclick="kenoit(80)"  onmousedown="changeto(event, '<?php echo $ksc;?>')">80</td>
  </tr>
  <tr>
    <td colspan="9" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="9" align="left"><b>Owner:</b> <?php 
			  if($owner != "No Owner."){echo "<a href=\"page.php?page=view_profile&name=". $owner ."\" onFocus=\"if(this.blur)this.blur()\">".$owner."</a>"; }else{echo "No Owner.";} ?></td>
  </tr>
  <tr>
    <td colspan="9" align="left"><b>Maximum Bet:</b> <?php echo "$ ".number_format($keno_max).",-"; ?></td>
  </tr>
  <tr>
    <td colspan="9" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="9" align="center">Your Numbers:</td>
  </tr>
  <tr>
    <td colspan="9" align="center"><table width="100%" border="0" cellspacing="0">
      <tr>
        <td align="center"><input name="value1" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value1']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
        <td align="center"><input name="value2" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value2']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
        <td align="center"><input name="value3" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value3']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
        <td align="center"><input name="value4" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value4']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
        <td align="center"><input name="value5" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value5']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
        <td align="center"><input name="value6" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value6']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
        <td align="center"><input name="value7" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value7']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
        <td align="center"><input name="value8" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value8']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
        <td align="center"><input name="value9" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value9']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
        <td align="center"><input name="value10" type="text" class="entryfield" value="<?php if(isset($_POST['Bet'])){ echo $_POST['value10']; }else{ echo "NA"; } ?>" size="4" maxlength="2" readonly="readonly"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="9" align="center"><table width="300" border="0" cellspacing="0">
      <tr>
        <td width="150" align="center"><input name="wager" type="text" class="entryfield" id="wager" value="<?php if(isset($_POST['Bet'])){ echo $_POST['wager']; }else{ echo "$"; } ?>" maxlength="20" /></td>
        <td width="100" align="center"><input name="Bet" type="submit" class="button" id="Bet" value="Bet." onFocus="if(this.blur)this.blur()" /></td>
        <td width="50" align="center"><input name="reset" type="submit" class="button" id="reset" value="Reset." onFocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</fieldset>
<?php 

}//casino mode.
	}// ifowner
  		}// no owner.
  ?>
</form>  