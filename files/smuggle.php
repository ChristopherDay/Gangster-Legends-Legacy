<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 310px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Smuggle. (<?php echo $smuggle_total."/".$smuggle_max;?>)</legend>
<table width="300" border="0" align="center" cellspacing="0">

<tr>
    <td width="50" align="left"><input name="item_1" type="text" class="entryfield" id="item_1" style='width: 90%; ' value="0" size="5" maxlength="2"/></td>
    <td width="100" align="left">Beer.</td>
    <td width="75" align="left"><?php echo "$ ".$prices[0].",-"; ?></td>
    <td width="75" align="left"><?php echo "Stock: ".$smuggle_information[0]."."; ?></td>
  </tr>
  <tr>
    <td width="50" align="left"><input name="item_2" type="text" class="entryfield" id="item_2" style='width: 90%; ' value="0" size="5" maxlength="2"/></td>
    <td width="100" align="left">Whisky.</td>
    <td width="75" align="left"><?php echo "$ ".$prices[1].",-"; ?></td>
    <td width="75" align="left"><?php echo "Stock: ".$smuggle_information[1]."."; ?></td>
  </tr>
  <tr>
    <td width="50" align="left"><input name="item_3" type="text" class="entryfield" id="item_3" style='width: 90%; ' value="0" size="5" maxlength="2"/></td>
    <td width="100" align="left">Wine.</td>
    <td width="75" align="left"><?php echo "$ ".$prices[2].",-"; ?></td>
    <td width="75" align="left"><?php echo "Stock: ".$smuggle_information[2]."."; ?></td>
  </tr>
  <tr>
    <td width="50" align="left"><input name="item_4" type="text" class="entryfield" id="item_4" style='width: 90%; ' value="0" size="5" maxlength="2"/></td>
    <td width="100" align="left">Cigarette's.</td>
    <td width="75" align="left"><?php echo "$ ".$prices[3].",-"; ?></td>
    <td width="75" align="left"><?php echo "Stock: ".$smuggle_information[3]."."; ?></td>
  </tr>
  <tr>
    <td width="50" align="left"><input name="item_5" type="text" class="entryfield" id="item_5" style='width: 90%; ' value="0" size="5" maxlength="2"/></td>
    <td width="100" align="left">Drugs.</td>
    <td width="75" align="left"><?php echo "$ ".$prices[4].",-"; ?></td>
    <td width="75" align="left"><?php echo "Stock: ".$smuggle_information[4]."."; ?></td>
  </tr>
  
  <tr>
    <td colspan="4" align="center">
	<?php
	if(time() <= $smuggle_information[5]){
echo date( "00:i:s", $smuggle_information[5] - time() )." till next smuggle.";
	}else{
	?>
	<table width="300" border="0" align="center" cellspacing="0">
      <tr>
        <td colspan="3" align="center"><hr class="hr" /></td>
        </tr>
      <tr>
        <td width="100" align="center"><input name="Commit" type="submit" class="button" id="Commit" value="Purchase." onFocus="if(this.blur)this.blur()"/></td>
        <td align="center"><input name="Sell" type="submit" class="button" id="Sell" value="Sell." onFocus="if(this.blur)this.blur()"/></td>
        <td width="100" align="center"><input name="Sell_All" type="submit" class="button" id="Sell_All" value="Sell All." onFocus="if(this.blur)this.blur()"/></td>
      </tr>
      <tr>
        <td colspan="3" align="center"><hr class="hr" /></td>
        </tr>
    </table>
	<?php } ?></td>
  </tr>
</table>
</fieldset>
<br />
|| <a href="page.php?page=smuggle&action=list" onFocus="if(this.blur)this.blur()">Smuggle List</a> || <a href="page.php?page=smuggle&action=info" onFocus="if(this.blur)this.blur()">Information</a> ||
<br />
<?php if($_GET['action'] == "list"){ ?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 500px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Smuggle list.</legend>
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td width="125" align="left"><b>Location:</b></td>
    <td width="75" align="left"><b>Beer:</b></td>
    <td width="75" align="left"><b>Whisky:</b></td>
    <td width="75" align="left"><b>Wine:</b></td>
    <td width="75" align="left"><b>Cigarette's:</b></td>
    <td width="75" align="left"><b>Drugs:</b></td>
  </tr>
  <tr>
    <td colspan="6" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td width="125" align="left"><?php echo $location_array[1].".";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_1[0]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_1[1]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_1[2]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_1[3]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_1[4]).",-";?></td>
  </tr>
  <tr>
    <td width="125" align="left"><?php echo $location_array[2].".";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_2[0]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_2[1]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_2[2]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_2[3]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_2[4]).",-";?></td>
  </tr>
  <tr>
    <td width="125" align="left"><?php echo $location_array[3].".";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_3[0]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_3[1]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_3[2]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_3[3]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_3[4]).",-";?></td>
  </tr>
  <tr>
    <td width="125" align="left"><?php echo $location_array[4].".";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_4[0]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_4[1]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_4[2]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_4[3]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_4[4]).",-";?></td>
  </tr>
  <tr>
    <td width="125" align="left"><?php echo $location_array[5].".";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_5[0]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_5[1]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_5[2]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_5[3]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_5[4]).",-";?></td>
  </tr>
  <tr>
    <td width="125" align="left"><?php echo $location_array[6].".";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_6[0]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_6[1]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_6[2]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_6[3]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_6[4]).",-";?></td>
  </tr>
  <tr>
    <td width="125" align="left"><?php echo $location_array[7].".";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_7[0]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_7[1]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_7[2]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_7[3]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_7[4]).",-";?></td>
  </tr>
  <tr>
    <td width="125" align="left"><?php echo $location_array[8].".";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_8[0]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_8[1]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_8[2]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_8[3]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_8[4]).",-";?></td>
  </tr>
  <tr>
    <td width="125" align="left"><?php echo $location_array[9].".";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_9[0]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_9[1]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_9[2]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_9[3]).",-";?></td>
    <td width="75" align="left"><?php echo "$ ".number_format($prices_9[4]).",-";?></td>
  </tr>
</table>
</fieldset>
<?php }

if($_GET['action'] == "info"){ ?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Information.</legend>
<?php echo nl2br("Here you can stock up on different types of smuggle items. You can make some easy money by stocking up at locations where its <b>cheap</b> and sell at a location where the price is <b>high</b>."); ?>
</fieldset>
<?php } ?>
</form>