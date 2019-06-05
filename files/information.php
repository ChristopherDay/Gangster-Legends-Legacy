<fieldset style="color: #000000; border: 1px solid #000000; width: 475px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Casino Information.</legend>
<table width="475" border="0" align="center" cellspacing="0" class="table">
  
  <tr>
    <td width="100" align="left"><b>Location:</b></td>
    <td width="125" align="left"><b>Keno:</b></td>
    <td width="125" align="left"><b>Horse Racing:</b></td>
    <td width="125" align="left"><b>Roulette:</b></td>
  </tr>
  <?php $result = mysql_query("SELECT * FROM location ORDER BY id ASC ") or die(mysql_error());
	
// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
// Print out the contents of each row into a table
?>
  <tr>
    <td width="100" align="left"><label><?php echo $location_array[$row['id']]; ?></label></td>
    <td width="125" align="left" <?php if($row['keno'] <> "No Owner."){ echo "onclick=\"location.href='view_profile.php?name=".$row['keno']."'\" style=\"cursor: pointer;\" ";} ?>><a>
      <label
      onmouseover="this.innerHTML = '<?php echo "$ ".number_format($row['keno_max']).",-"; ?>';"
      onmouseout="this.innerHTML = '<?php echo $row['keno']; ?>';"><?php echo $row['keno']; ?></label>
    </a></td>
    <td width="125" align="left" <?php if($row['rt'] <> "No Owner."){ echo "onclick=\"location.href='view_profile.php?name=".$row['rt']."'\" style=\"cursor: pointer;\" ";} ?>><a>
      <label
      onmouseover="this.innerHTML = '<?php echo "$ ".number_format($row['rt_max']).",-"; ?>';"
      onmouseout="this.innerHTML = '<?php echo $row['rt']; ?>';"><?php echo $row['rt']; ?></label>
    </a></td>
    <td width="125" align="left" <?php if($row['rl'] <> "No Owner."){ echo "onclick=\"location.href='view_profile.php?name=".$row['rl']."'\" style=\"cursor: pointer;\" ";} ?>><a>
      <label
      onmouseover="this.innerHTML = '<?php echo "$ ".number_format($row['rl_max']).",-"; ?>';"
      onmouseout="this.innerHTML = '<?php echo $row['rl']; ?>';"><?php echo $row['rl']; ?></label>
    </a></td>
  </tr>
  <?php  } // while ?>
</table>
</fieldset>

