<?php
echo '<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 400px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Credit Auctions.</legend>
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td colspan="2" align="left"><b>Credits:</b></td>
    <td align="left"><b>Price:</b></td>
    <td align="left"><b>Seller:</b></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><hr class="hr" /></td>
    </tr>'; 
  $result = mysql_query("SELECT name,credit_sale,credit_price FROM login WHERE sitestate='0' and credit_sale > '0' ORDER BY name DESC") or die(mysql_error());
while($row = mysql_fetch_array( $result )) {
	echo '
	  <tr>
		<td width="25" align="center"><input name="name" type="radio" value="'.$row['name'].'" onfocus="if(this.blur)this.blur()" /></td>
		<td width="100">'.number_format($row['credit_sale']).'</td>
		<td width="125">$'.number_format($row['credit_price']).',-</td>
		<td width="125">'."<a href=\"page.php?page=view_profile&name=". $row['name']."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a>".'</td>
	  </tr>';
}
  echo '<tr>
    <td colspan="4" align="right"><input name="Purchase" type="submit" class="button" id="Purchase" onfocus="if(this.blur)this.blur()" value="Purchase."/></td>
    </tr>
</table>
</fieldset>';

if($credit_sale == 0 ){
	echo '<br />
	<fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left; padding: 5px;">
	<legend style="color: #999999; font-weight: bold;">Create Auction.</legend>
	<table width="250" border="0" cellspacing="0" cellpadding="2">
	  <tr>
		<td width="50" align="left"><b>Credits:</b></td>
		<td width="200" align="center"><input name="credits" type="text" class="entryfield" id="credits" /></td>
	  </tr>
	  <tr>
		<td width="50" align="left"><b>Price:</b></td>
		<td width="200" align="center"><input name="price" type="text" class="entryfield" id="price" /></td>
	  </tr>
	  <tr>
		<td colspan="2" align="right"><input name="Add" type="submit" class="button" id="Add" onfocus="if(this.blur)this.blur()" value="Add."/></td>
		</tr>
	</table>
	</fieldset>';
}else{
	echo '<br />
	<fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left; padding: 5px;">
	<legend style="color: #999999; font-weight: bold;">Update Auction.</legend>
	<table width="250" border="0" cellspacing="0" cellpadding="2">
	  <tr>
		<td width="50" align="left"><b>Price:</b></td>
		<td width="200" align="center"><input name="price_new" type="text" class="entryfield" id="price_new" /></td>
	  </tr>
	  <tr>
		<td colspan="2" align="right"><input name="Update" type="submit" class="button" id="Update" onfocus="if(this.blur)this.blur()" value="Update."/></td>
		</tr>
	</table>
	</fieldset>';
} 

$query = "SELECT SUM(credits),SUM(money) FROM login WHERE state='0'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if ($row['SUM(money)']>0 && $row['SUM(credits)']>0) {
	$sum=number_format(round($row['SUM(money)']/$row['SUM(credits)']));
} else {
	$sum=0;
}
$pc_price = "$ ".abs($sum).",-";

echo'<br /><b>Note:</b> A auction can\'t be canceld. You may change your price at any given time.
<br /><b>Note:</b> Current credit price is '.$pc_price.' per credit.
</form>';

?>