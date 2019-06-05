<script type="text/javascript"> 

function smile(field,text) 
{ 
    document.shout.elements[field].value += " "+text+" "; 
    document.shout.elements[field].focus(); 
}  
</script>
<?

if(isset($_POST['Post']) and in_array($name, $admin_array)){

	if(empty($_POST['message'])){
		echo "You didn't type in a message.";
	}else{

$sql = "INSERT INTO news SET id = '', message = '" .mysql_real_escape_string($_POST['message']). "', name = '" .mysql_real_escape_string($name). "',ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."'";
$res = mysql_query($sql);
	}
}

if(isset($_POST['Delete']) and in_array($name, $admin_array) and in_array($_SERVER['REMOTE_ADDR'], $admin_ip_array)){

$id = $_POST['id'];
	if(!empty($id)){
$delete = implode(",",$id);
$delete = explode(",",$delete);
for($a = 0; !empty($delete[$a]);$a++){
   $sql = "DELETE FROM news WHERE `id`='".mysql_real_escape_string($delete[$a])."'";
   $out = mysql_query($sql);
}
		echo "all selected messaged have been deleted.";
	}else{
		echo "You didn't select any posts.";
	}
}

?>
<form name="shout" method="post">
<table width="600" border="0" align="center" cellspacing="0">
  
  <tr>
    <td align="left">
          <?php
		   
$presult = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 0,10 ") or die(mysql_error()); 
$b = 0;
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $presult )) {
// Print out the contents of each row into a table

$row['message'] = htmlentities($row['message']);
$row['message'] = nl2br($row['message']); 
$row['message'] = smilie($row['message']); 
$row['message'] = sitefilter($row['message']);
$row['message'] = bbcodes($row['message']);  
$row['message'] = stripslashes($row['message']);  

$b = $b + 1;
if(in_array($name, $admin_array)){echo "<input type='checkbox' name='id[$b]' value='".$row['id']."' onfocus=\"if(this.blur)this.blur()\"/>";} echo "<a href=\"page.php?page=view_profile&name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a> ( ".$row['date']." )<hr class=\"hr\" />".$row['message']."<br /><br />";

}// while loop
		   
		   ?></td>
  </tr>
  <?php if(in_array($name, $admin_array) and in_array($_SERVER['REMOTE_ADDR'], $admin_ip_array)){ ?>
  <tr>
    <td align="center"><textarea name="message" rows="6" class="textbox" id="message"><?php echo htmlspecialchars($_POST['message']); ?></textarea></td>
  </tr>
  <tr>
    <td align="right"><table width="100%" border="0" align="right" cellspacing="0">
      <tr>
        <td align="center"><?php smilielist(); // function to show the smilies.?></td>
        <td width="100" align="center"><input name="Post" type="submit" class="button" id="Post" value="Post." onFocus="if(this.blur)this.blur()" /></td>
        <td width="100" align="center"><input name="Delete" type="submit" class="button" id="Delete" value="Delete."  onfocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table></td>
  </tr>
  <?php } ?>
</table>
</form>