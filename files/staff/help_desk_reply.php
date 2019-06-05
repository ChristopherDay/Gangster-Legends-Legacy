<?php if (in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array)){ ?>
<form method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Help Desk.</legend>
<table width="550" border="0" align="center" cellspacing="0">
  <? 
  $result = mysql_query("SELECT help_desk,name FROM login ORDER BY name DESC") or die(mysql_error());
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
// Print out the contents of each row into a table

$row['help_desk'] = nl2br(htmlspecialchars(stripslashes($row['help_desk'])));

if(!empty($row['help_desk'])){


?>
  <tr>
    <td colspan="2" align="center" ><hr class="hr" /></td>
    </tr>
  <tr>
    <td colspan="2" align="left" ><?php echo "<a href=\"page.php?page=view_profile&name=".$row['name']."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a>"; ?> Wrote:</td>
  </tr>
  <tr>
    <td colspan="2" align="center" ><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" ><?php echo $row['help_desk']; ?></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center" ><hr class="hr" /></td>
    </tr>
  <tr>
    <td width="275" align="left" ><?php echo "<a href=\"staff.php?page=help_desk_reply&name=".$row['name']."\" onFocus=\"if(this.blur)this.blur()\">Delete.</a>"; ?></td>
    <td width="275" align="right" ><?php echo "<a href=\"page.php?page=message&name=".$row['name']."&action=helpdesk\" onFocus=\"if(this.blur)this.blur()\">Reply.</a>"; ?></td>
  </tr>
  
  <?php }} // while
// end print out results received.
?>
</table>
</fieldset>
</form>
<?php } ?>

