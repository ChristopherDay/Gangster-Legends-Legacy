<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Prison.</legend>
      <table width="350" border="0" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><hr class="hr" /></td>
        </tr>
        <tr>
          <td width="250"><b>Inmate:</b></td>
          <td width="150"><b>Prison Time:</b></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><hr class="hr" /></td>
        </tr>
		      <?php $result = mysql_query("SELECT jail,name FROM login WHERE jail!='0-0'
		ORDER BY name ASC ") or die(mysql_error());
	
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {

$prison_information = explode("-", $row['jail']);

if((time() < $prison_information[0]) ) {?>
        <tr>
          <td width="250"><input name="Inmate" type="radio" value="<?php echo $row['name']; ?>" onFocus="if(this.blur)this.blur()"/><?php echo "<a href=\"page.php?page=view_profile&name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a>."; ?></td>
          <td width="150"><?php echo "<div id=\"".$row['name']."\">".date( "i:s", $prison_information[0] - time() )."</div>"; ?></td>
        </tr>
	<?php	}
}
?>
        <tr>
          <td colspan="2" align="right"><input name="Bust" type="submit" class="button" id="Bust" value="Break Out." onFocus="if(this.blur)this.blur()"/></td>
        </tr>
      </table>
</fieldset>
</form>