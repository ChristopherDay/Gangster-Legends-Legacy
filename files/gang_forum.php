
<script type="text/javascript"> 

function smile(field,text) 
{ 
    document.shout.elements[field].value += " "+text+" "; 
    document.shout.elements[field].focus(); 
}  
</script>
<?

if(empty($gang)){ exit('Only gang members can view the bar.');}

$psql = "SELECT leader FROM gangs WHERE name='".mysql_real_escape_string($gang)."'";
$query = mysql_query($psql) or die(mysql_error());
$row = mysql_fetch_object($query);
$gang_leader = htmlspecialchars($row->leader);


if(isset($_POST['Post'])){

if(empty($_POST['message'])){
echo "You didn't type in a message.";
}else{

if (strlen($_POST['message']) > "250"){
        echo "Your message may not contain more then 250 characters.";
    }else{

$sql = "INSERT INTO shoutbox SET id = '', message = '" .mysql_real_escape_string($_POST['message']). "', name = '" .mysql_real_escape_string($name). "',gang='".mysql_real_escape_string($gang)."',ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."'";
$res = mysql_query($sql);
}// character check.
}// if empty.
}// if isset post.

if(isset($_POST['Delete'])){

if($gang_leader != $name){
echo "You are not allowed to use this function.";
}else{

$id = $_POST['id'];
if(!empty($id)){
//controleerd of id leeg is of niet
$delete = implode(",",$id);
$delete = explode(",",$delete);
//zorg er voor dat alle te wissen velden doormiddel van een for loop makkelijk te wissen is
for($a = 0; !empty($delete[$a]);$a++){
//de for loop
   $sql = "DELETE FROM shoutbox WHERE `id`='".mysql_real_escape_string($delete[$a])."' AND gang='".mysql_real_escape_string($gang)."'";
//de sql query deze moet je dus aan passen!
   $out = mysql_query($sql);
//de sql query uit laten voeren
}
echo "all selected messaged have been deleted.";
}else{
echo "You didn't select any posts.";
}// if nothing selected.
}// if not allowed.
}// if isset.

?>
<form name="shout" method="post">
<fieldset style="color: #000000; border: 1px solid #000000; width: 600px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Shout Box.</legend>
<table width="600" border="0" align="center" cellspacing="0">
  
  <tr>
    <td align="center"><div class="scroll" style="height: 500px;	
width: 99%;	
overflow: auto;	
border: 1px solid #414141;	
background-color: #414141;	
scrollbar-3dlight-color: #414141;
           scrollbar-arrow-color: #000000;
           scrollbar-base-color: #000000;
           scrollbar-darkshadow-color: #666666;
           scrollbar-face-color: #133337;
           scrollbar-highlight-color: #000000;
           scrollbar-shadow-color: #666666 ;"
		   align="left">
          <?php
		   
		   $presult = mysql_query("SELECT * FROM shoutbox WHERE gang='".mysql_real_escape_string($gang)."' ORDER BY id DESC LIMIT 0,75 ") or die(mysql_error()); 
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
if($gang_leader == $name){echo "<input type='checkbox' name='id[$b]' value='".$row['id']."'/>";} echo "<b><a href=\"page.php?page=view_profile&name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['name']."</a> Wrote:</b> ( ".$row['date']." )<br />".$row['message']."<br /><br />";

}// while loop
		   
		   ?>
        </div></td>
  </tr>
  
  
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="center"><textarea name="message" rows="6" class="textbox" id="message"><?php echo htmlspecialchars($_POST['message']); ?></textarea></td>
  </tr>
  <tr>
    <td align="center"><?php smilielist(); // function to show the smilies.?></td>
  </tr>
  <?php if(isset($_POST['Preview'])){ ?>
  <tr>
    <td align="center">Preview:</td>
  </tr>
  <tr>
    <td align="center"><?php 
	
	$preview_message = $_POST['message'];
	
	$preview_message = htmlentities($preview_message);
    $preview_message = nl2br($preview_message); 
    $preview_message = bbcodes($preview_message);
	$preview_message = smilie($preview_message);
	$preview_message = sitefilter($preview_message);
	
	echo $preview_message;
	
	?></td>
  </tr>
  <?php } ?>
  <tr>
    <td align="right"><table width="100%" border="0" align="right" cellspacing="0">
      <tr>
        <td width="150" align="center"><?php if($gang_leader == $name){ echo "<input name=\"Delete\" type=\"submit\" class=\"button\" id=\"Delete\" value=\"Delete Selected.\"  onFocus=\"if(this.blur)this.blur()\" />"; } ?></td>
        <td align="center">&nbsp;</td>
        <td width="100" align="center"><input name="Post" type="submit" class="button" id="Post" value="Post." onFocus="if(this.blur)this.blur()" /></td>
        <td width="100" align="center"><input name="Preview" type="submit" class="button" id="Preview" value="Preview." onFocus="if(this.blur)this.blur()"/></td>
      </tr>
    </table></td>
  </tr>
</table>
</fieldset>
</form>

