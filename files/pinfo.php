<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<fieldset style="color: #000000; border: 1px solid #000000; width: 500px; text-align: left; padding: 5px;"><legend>Casino Information.</legend>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" class="table">
   
<tr>
<center>
<b>Note: You may only own one of each kind of property.
Anyone with more than one will either loose all of them, or be banned. You have been warned.</b>
</center></tr>
  <tr>
    <td width="150" align="left" class="sub"><span class="style1"><b>Location:</b></span></td>
    <td width="125" align="left" class="sub"><span class="style1"><b>Keno:</b></span></td>
    <td width="125" align="left" class="sub"><span class="style1"><b>Horse Racing:</b></span></td>
    <td width="125" align="left" class="sub"><span class="style1"><b>Roulette:</b></span></td>
  </tr>
  <?php
   
  $result = mysql_query("SELECT * FROM location ORDER BY id ASC ") or die(mysql_error());
     
// keeps getting the next row until there are no more to get
    while($row = mysql_fetch_array( $result )) {
// Print out the contents of each row into a table
?>
  <tr>
    <td width="150" align="left" class="cell"><span class="style1">
    <label><?php echo $location_array[$row['id']]; ?></label>
    </span></td>
    <td width="125" align="left" class="cell" <?php if($row['keno'] <> "No Owner."){ echo "onclick=\"location.href='view_profile.php?name=".  $row['keno']."'\" style=\"cursor: pointer;\" ";} ?>><a class="style1">
    <label
    onmouseover="this.innerHTML = '<?php echo money($row['keno_max']); ?>';"
    onmouseout="this.innerHTML = '<?php echo $row['keno']; ?>';"><?php echo $row['keno']; ?></label>
    </a></td>
    <td width="125" align="left" class="cell" <?php if($row['rt'] <> "No Owner."){ echo "onclick=\"location.href='view_profile.php?name=".  $row['rt']."'\" style=\"cursor: pointer;\" ";} ?>><a>
    <label
    onmouseover="this.innerHTML = '<?php echo money($row['rt_max']); ?>';"
    onmouseout="this.innerHTML = '<?php echo $row['rt']; ?>';"><?php echo $row['rt']; ?></label>
    </a></td>
    <td width="125" align="left" class="cell" <?php if($row['rl'] <> "No Owner."){ echo "onclick=\"location.href='view_profile.php?name=".  $row['rl']."'\" style=\"cursor: pointer;\" ";} ?>><a>
    <label
    onmouseover="this.innerHTML = '<?php echo money($row['rl_max']); ?>';"
    onmouseout="this.innerHTML = '<?php echo $row['rl']; ?>';"><?php echo $row['rl']; ?></label>
    </a></td>
  </tr>
  <?php  } // while ?>
</table>
</fieldset>