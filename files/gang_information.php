<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Gang List.</legend>
<table width="600" border="0" align="center" cellspacing="0">
  
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td width="225" align="left"><b>Gang Name:</b></td>
    <td width="150" align="left"><b>Gang leader:</b></td>
    <td width="75" align="left"><b>Members:</b></td>
    </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
    </tr>
  <? 
		
		// transfers
				
	$result = mysql_query("SELECT * FROM gangs ORDER BY name ASC ") or die(mysql_error());
	$total_gangs = mysql_num_rows($result);

if($total_gangs == 0){ echo"<tr>
    <td colspan=\"5\" align=\"center\">No Gangs.</td>
  </tr>";}else{

// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
// Print out the contents of each row into a table

?>
  <tr>
    <td width="225" align="left"><?php 
	 echo "<a href=\"page.php?page=view_gang&name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\" >".$row['name']."</a>"; ?></td>
    <td width="150" align="left"><?php 
	 echo "<a href=\"page.php?page=view_profile&name=". $row['leader'] ."\" onFocus=\"if(this.blur)this.blur()\" >".$row['leader']."</a>"; ?></td>
    <td width="75" align="left"><?php echo $row['members']; ?></td>
    </tr>
  <?php }} // while ?>
  <tr>
    <td colspan="3" align="center" bordercolor="#000000"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="3" align="right" bordercolor="#000000"><?php echo $total_gangs."/10 Gangs.";
?></td>
  </tr>
</table>
</fieldset>
</form>