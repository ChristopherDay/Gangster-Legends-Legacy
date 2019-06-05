<script type="text/javascript"> 
// ADDTEXT 
function smile(field,text) 
{ 
    document.topicform.elements[field].value += " "+text+" "; 
    document.topicform.elements[field].focus(); 
} 
</script>

<form method="post" id="topicform" name="topicform" action="forum_view&id=<?php echo $_GET['id'];?>">

<fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;"><?php echo htmlentities($row['titel'])." - <a href=\"page.php?page=view_profile&name=". $row['naam'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['naam']."</a>";?>
<?php 
	
		if ( $row['naam'] == $name or in_array($name, $admin_array) or in_array($name, $manager_array)){
		
		 $sql = "SELECT * FROM topics WHERE id = '" .mysql_real_escape_string(stripslashes($_GET['id'])). "'"; 
    $res = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($res);
				
if( $row['locked'] == 1){
				
echo "<a href=\"page.php?page=forum_edit&action=edit&id=" . $_GET['id'] . "\" onFocus=\"if(this.blur)this.blur()\"> ( Edit</a>";
echo " - ";
echo "<a href=\"page.php?page=forum_view&action=lock&id=" . $_GET['id'] . "\" onFocus=\"if(this.blur)this.blur()\">Lock Topic )</a>";

	}// if row is locked.
	}// if name is name poster.
	
	?>
</legend>

<?php 
	
	$row['bericht'] = htmlentities($row['bericht']);
    $row['bericht'] = nl2br($row['bericht']); 
    $row['bericht'] = bbcodes($row['bericht']);
	$row['bericht'] = smilie($row['bericht']);
	$row['bericht'] = sitefilter($row['bericht']);
	$row['bericht'] = stripslashes($row['bericht']);

	echo $row['bericht']; ?>
</fieldset>
<br />
<?php

$csql = "SELECT * FROM replys WHERE tid = '" .mysql_real_escape_string($_GET['id']). "' ORDER BY datum DESC LIMIT $min,$max"; 
$cres = mysql_query($csql) or die(mysql_error());
     
while ($row = mysql_fetch_array($cres)){
		?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 550px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">
<?php 
		echo "<a href=\"page.php?page=view_profile&name=". $row['naam'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['naam']."</a> Wrote: ";
			if(in_array($name, $admin_array) or in_array($name, $manager_array) or in_array($name, $hdo_array)){
					
			echo "<a href=\"page.php?page=forum_view&action=Rreply&rid=".$row['id']."&id=" . $_GET['id'] . "\" onFocus=\"if(this.blur)this.blur()\">( x )</a>";
			echo " - ";
			echo "<a href=\"page.php?page=forum_view&mute=".$row['naam']."&id=" . $_GET['id'] . "\" onFocus=\"if(this.blur)this.blur()\">( M )</a>";
			}
	?>
</legend>
<?php 
		$row['bericht'] = htmlentities($row['bericht']);
		$row['bericht'] = nl2br($row['bericht']); 
    	$row['bericht'] = bbcodes($row['bericht']);
		$row['bericht'] = smilie($row['bericht']);
		$row['bericht'] = sitefilter($row['bericht']); 
  		$row['bericht'] = stripslashes($row['bericht']); 

            echo $row['bericht'];
	?>
</fieldset>
<br />
<?php 
}

?>
<br />
<table width="450" border="0" align="center" cellspacing="0">
  <tr>
    <td width="150" align="left"><?php 
	
	if( $page > 1){
	
	$previouspage = $page - 1;
	echo "<input type=\"button\" onClick=\"window.location='page.php?page=forum_view&id=".$_GET['id']."&page=".$previouspage."'\" class=\"button\" value=\"Previous.\" onFocus=\"if(this.blur)this.blur()\">";
	}
	?></td>
    <td width="150" align="center"><?php 
	
	$numofpages = ceil($totaltopics / $amount); 
	
	?></td>
    <td width="150" align="right"><?php 
	
if($page < $numofpages){ 
if(empty($_GET['page'])){ $page == "1";}
$pagenext = $page + 1;
echo "<input type=\"button\" onClick=\"window.location='page.php?page=forum_view&id=".$_GET['id']."&page=".$pagenext."'\" class=\"button\" value=\"Next.\" onFocus=\"if(this.blur)this.blur()\">";
} 

	?></td>
  </tr>
</table>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width:425px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Reply.</legend>

<table width='425' border='0' align='center' cellspacing='0'>
  
  <tr align='left'>
    <td align='center'><textarea name="message" cols="50" rows="10" class="textbox"/><?php if(isset($_POST['Preview'])){ echo htmlspecialchars($_POST['message']); } ?></textarea></td>
  </tr>
  
  <tr>
    <td align='center'><?php smilielist(); // function to show the smilies.?></td>
  </tr>
  <?php if(isset($_POST['Preview'])){ ?>
  <tr>
    <td align='left'><b>Preview:</b></td>
  </tr>
  <tr>
    <td align='center'><hr class="hr" /></td>
  </tr>
  <tr>
    <td align='center'><?php 
	
	$preview_message = $_POST['message'];
	
	$preview_message = htmlentities($preview_message);
    $preview_message = nl2br($preview_message); 
    $preview_message = bbcodes($preview_message);
	$preview_message = smilie($preview_message);
	$preview_message = sitefilter($preview_message);
	
	echo $preview_message;
	
	?></td>
  </tr>
  <tr>
    <td align='center'><hr class="hr" /></td>
  </tr>
  <?php } ?>
  <tr align='left' >
    <td align='center'><table width="200" border="0" align="right" cellspacing="0">
      <tr>
        <td width="100" align="center"><input name="Reply" type="submit" class="button" value="Reply." onFocus="if(this.blur)this.blur()"/></td>
        <td align="center"><input name="Preview" type="submit" class="button" id="Preview" value="Preview." onFocus="if(this.blur)this.blur()"/></td>
      </tr>
    </table></td>
  </tr>
</table>
</fieldset>
</form>