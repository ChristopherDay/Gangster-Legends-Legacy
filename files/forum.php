<script type="text/javascript">  
// ADDTEXT 
function smile(field,text) 
{ 
    document.barform.elements[field].value += " "+text+" "; 
    document.barform.elements[field].focus(); 
} 
</script>

<form method="post" id="barform" name="barform" action="page.php?page=forum&type=<?php echo $_GET['type']; ?>">
<?php if(in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array)){?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 510px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Forum Controls.</legend>
<table width="500" border="0" align="center" cellspacing="0" bordercolor="#000000">
    <tr>
      <td align="center"><input name="action" type="submit" class="button" id="action" value="Lock" onFocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit" class="button" id="action" value="Unlock" onFocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit" class="button" id="action" value="Sticky" onFocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit" class="button" id="action" value="Important" onfocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit" class="button" id="action" value="Remove" onFocus="if(this.blur)this.blur()"/></td>
      </tr>
    <tr>
      <td colspan="2" align="center">
        <select name="type_move" class="entryfield" id="type_move">
          <option value="1" <?php echo $select_1; ?>>Main</option>
          <option value="2" <?php echo $select_2; ?>>Trade</option>
          <option value="3" <?php echo $select_3; ?>>Off Topic</option>
		  <option value="4" <?php echo $select_4; ?>>Bank Robbery</option>
          <option value="5" <?php echo $select_5; ?>>Art</option>
        </select></td>
      <td align="center"><input name="action" type="submit" class="button" id="action" value="Move" onFocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit" class="button" id="action" value="Delete" onFocus="if(this.blur)this.blur()" /></td>
      <td align="center"><input name="action" type="submit" class="button" id="action" value="Clean Forum" onFocus="if(this.blur)this.blur()" /></td>
      </tr>
</table>
</fieldset>
<br />
<?php }// if admin or manager. ?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: center; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Forum.</legend>
<table width="600" border="0" align="center" cellspacing="0" class="table">
  
  <tr>
    <td align="left"><b>Important:</b></td>
    <td align="left">&nbsp;</td>
    <td align="left"><b>Posts:</b></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
    </tr>
 
 <?php
 
 $sql = "SELECT * FROM topics WHERE topicstate = 1 ORDER BY datum DESC"; 
    $res = mysql_query($sql)  or die(mysql_error()); 
     $topicstate = htmlspecialchars($row->topicstate);

/////////////////////////////////////////////////////////

        while ($row = mysql_fetch_array($res)) 
        { 
    // het aantal reacties weergeven
    $nsql = "SELECT tid FROM replys WHERE tid = '" .mysql_real_escape_string($row['id']). "'";            
    $nres = mysql_query($nsql)  or die(mysql_error());
    $msg = mysql_num_rows($nres);
 ?>
  <tr>
    <td colspan="2" align="left" >
	
		<?php if(in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array)){
	echo "<input name=\"topic_id\" type=\"radio\" value=\"".$row['id']."\" onFocus=\"if(this.blur)this.blur()\"/>";
		}?><b>Important:</b> <?php echo "<a href=\"page&page=forum_view&id=" . $row['id'] . "\" onFocus=\"if(this.blur)this.blur()\">" .htmlentities(stripslashes($row['titel'])). "</a>";
	
	if($row['locked'] == 2){
	echo " (Locked)";
	}?>	</td>
    <td width="50" align="left"><?php echo $msg; ?></td>
  </tr>
  
  <?php 
  }// end while loop important.
  
  ?>
  <?php 
  
  // stickys
  
  $sql = "SELECT * FROM topics WHERE topicstate = 2 ORDER BY datum DESC"; 
    $res = mysql_query($sql) or die(mysql_error()); 
     $topicstate = htmlspecialchars($row->topicstate);
 
        while ($row = mysql_fetch_array($res)) 
        { 
    // het aantal reacties weergeven
     $nsql = "SELECT tid FROM replys WHERE tid = '" .mysql_real_escape_string($row['id']). "'";            
    $nres = mysql_query($nsql) or die(mysql_error());
    $msg = mysql_num_rows($nres);
?>

  <tr>
    <td colspan="2" align="left">
	
	<?php	
		if(in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array)){
echo "<input name=\"topic_id\" type=\"radio\" value=\"".$row['id']."\" onFocus=\"if(this.blur)this.blur()\" />";}
		?><b>Sticky:</b> <?php echo "<a href=\"page.php?page=forum_view&id=" . $row['id'] . "\" onFocus=\"if(this.blur)this.blur()\">" .htmlentities(stripslashes($row['titel'])). "</a>";
	
		if($row['locked'] == 2){
	echo " (Locked)";
	}?>	</td >
    <td width="50" align="left"><?php echo $msg; ?></td>
  </tr>
  <?php
  }// end while loop sticky
  ?>

  
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><a href="page.php?page=forum&type=1" onFocus="if(this.blur)this.blur()">Main</a> | <a href="page.php?page=forum&type=2" onFocus="if(this.blur)this.blur()">Trade</a> | <a href="page.php?page=forum&type=3" onFocus="if(this.blur)this.blur()">Off Topic</a> | <a href="page.php?page=forum&type=4" onFocus="if(this.blur)this.blur()">Bank Robbery</a> | <a href="page.php?page=forum&type=5" onFocus="if(this.blur)this.blur()">Art</a></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><b>Started By:</b></td>
    <td width="450" align="left"><b>Topic Title:</b></td>
    <td width="50" align="left"><b>Posts:</b></td>
  </tr>
  <?php 
  
  if(($_GET['type'] != 1 ) and ($_GET['type'] != 2 ) and ($_GET['type'] != 3 ) and ($_GET['type'] != 4 ) and ($_GET['type'] != 5 )){ $_GET['type'] = 1; }
    
  $sql = "SELECT * FROM topics WHERE topicstate = 0 AND type = '".mysql_real_escape_string($_GET['type'])."' ORDER BY datum DESC LIMIT $min,$max"; 
    $res = mysql_query($sql)  or die(mysql_error()); 
$count = mysql_num_rows($res);
	 $topicstate = htmlspecialchars($row->topicstate);

/////////////////////////////////////////////////////////
	$i = 1;
    if (mysql_num_rows($res) >= 1) 
    { $b = 0;						
        while ($row = mysql_fetch_array($res)) 
        { 
		$b = $b + 1;
    // het aantal reacties weergeven
    $nsql = "SELECT tid FROM replys WHERE tid = '" .mysql_real_escape_string($row['id']). "'";            
    $nres = mysql_query($nsql)  or die(mysql_error());
    $msg = mysql_num_rows($nres);
	
  ?>
  <tr>
    <td width="125" align="left">
<?php
	if(in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array)){
echo "<input type='checkbox' name='id[$b]' value='".$row['id']."' onFocus=\"if(this.blur)this.blur()\"/>";}
	echo "<a href=\"page.php?page=view_profile&name=". $row['naam'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['naam']."</a>";
	
	?>
    <td width="450" align="left" onclick="location.href='page.php?page=forum_view&id=<?php echo $row['id']; ?>&amp;type=<?php echo $_GET['type']; ?>'"><?php echo "<a href=\"page.php?page=forum_view&id=" . $row['id'] . "&type=".$_GET['type']."\" onFocus=\"if(this.blur)this.blur()\">" .htmlspecialchars(stripslashes($row['titel'])). "</a>"; 
	
	 if($row['locked'] == 2){
	echo " (Locked)";
	}?>	</td>
    <td width="50" align="left" ><?php echo $msg; ?></td>
  </tr>
  
  <?php
  }	
   } else { ?>
	 
	 <tr bgcolor='#414141' align='center'><td colspan='3'>
     The forum has been cleaned.</td>
	 </tr>

<?php
    }// else bar cleaned.
  
  ?>
</table>
<table width="450" border="0" align="center" cellspacing="0">
  <tr>
    <td width="150" align="left">
    <?php 
	
	if( $page > 1){
	
	$previouspage = $page - 1;
	
	echo "<input type=\"button\" onClick=\"window.location='page.php?page=forum&page=".$previouspage."'\" class=\"button\" value=\"Previous.\">";	
	}
	?></td>
    <td width="150" align="center">&nbsp;<?php 
	
	$numofpages = ceil($totaltopics / $amount); 
	
	?></td>
    <td width="150" align="right"><?php 
	
if($page < $numofpages){ 
    $pagenext = ($page + 1); 
	echo "<input type=\"button\" onClick=\"window.location='page.php?page=forum&page=".$pagenext."'\" class=\"button\" value=\"Next.\">";
} 

	?></td>
  </tr>
</table>
</fieldset>
<br />
<?php if(($_GET['create'] == "create" ) or (isset($_POST['Preview']))){?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 500px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">New Topic.</legend>
<table width="500" border="0" align="center" cellspacing="0">
  
  <tr>
    <td width="75" align="left"><b>Subject:</b></td>
    <td width="425" colspan="2" align="center">
    <input name="topictitle" type="text" class="entryfield" id="topictitle" value="<?php echo htmlspecialchars($_POST['topictitle']); ?>" maxlength="50" />    </td>
  </tr>
  <tr>
    <td align="left"><b>Forum:</b></td>
    <td colspan="2" align="center"><select name="type" class="entryfield" id="type">
          <option value="1" <?php echo $select_1; ?>>Main</option>
          <option value="2" <?php echo $select_2; ?>>Trade</option>
          <option value="3" <?php echo $select_3; ?>>Off Topic</option>
		  <option value="4" <?php echo $select_4; ?>>Organized Crimes</option>
          <option value="5" <?php echo $select_5; ?>>Art</option>
    </select>    </td>
  </tr>
  <tr>
    <td width="75" align="left" valign="top"><b>Message:</b></td>
    <td width="425" colspan="2" align="center">
    <textarea name="message" COLS="50" rows="8" class="textbox" id="message"/><?php if(isset($_POST['Preview'])){ echo htmlspecialchars(stripslashes($_POST['message'])); } ?></textarea></td>
  </tr>
  
  <tr>
    <td colspan="3" align="right">
      <?php smilielist(); // function to show the smilies.?></td>
    </tr>
	<?php if(isset($_POST['Preview'])){?>
  <tr>
    <td colspan="3" align="left"><b>Preview:</b></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><?php 
	
	$preview_message = $_POST['message'];
	
	$preview_message = htmlentities($preview_message);
    $preview_message = nl2br($preview_message); 
    $preview_message = bbcodes($preview_message);
	$preview_message = smilie($preview_message);
	$preview_message = sitefilter($preview_message);
	$preview_message = stripslashes($preview_message);
	echo $preview_message;
	
	?></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr class="hr" /></td>
  </tr>
  <?php }// if preview ?>
  
  <tr>
    <td colspan="3" align="right">
      <table width="200" border="0" align="right" cellspacing="0">
        <tr>
          <td width="100" align="center"><input name="Submit" type="submit" class="button" id="Submit" value="Submit." onFocus="if(this.blur)this.blur()" /></td>
          <td align="center"><input name="Preview" type="submit" class="button" id="Preview" value="Preview." onFocus="if(this.blur)this.blur()" /></td>
        </tr>
      </table></td>
    </tr>
</table>
</fieldset>
<?php }else{ echo "<a href=\"page.php?page=forum&create=create&type=".$_GET['type']."\" onFocus=\"if(this.blur)this.blur()\">Create new topic</a>"; } // if create topic. ?>
</form>