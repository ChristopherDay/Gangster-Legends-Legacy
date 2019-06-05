<script type="text/javascript"> 
// ADDTEXT 
function smile(field,text) 
{ 
    document.topicedit.elements[field].value += " "+text+" "; 
    document.topicedit.elements[field].focus(); 
} 
</script> 
<?
require("usercheck.php");
?>
<form method="post" id="topicedit" name="topicedit" action="forum_view.php?id=<?php echo $_GET['id'];?>">
<fieldset style="color: #000000; border: 1px solid #000000; width: 500px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Edit Topic.</legend>
<?php 

$sql = "SELECT * FROM topics WHERE id= '" .mysql_real_escape_string($_GET['id']). "'"; 
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($query);
$bericht = htmlspecialchars($row->bericht);
$titel = htmlspecialchars($row->titel);
$naam = htmlspecialchars($row->naam);

?>
<table width='500' border='0' align='center' cellspacing='0'>



<tr align='left'>
  <td width="75" align='left' valign="middle"><b>Subject:</b></td>
  <td colspan='3' align='center'><input name="topictitle" type="text" class="entryfield" id="topictitle" value="<?php 
if ( $naam == $name or in_array($name, $admin_array) or in_array($name, $manager_array)){
echo htmlentities(stripslashes($titel)); }?>" maxlength="50"/></td>
</tr>
<tr align='left' >
<td width='75' align='left' valign="top"> 
<b>Message:</b></td>  

<td colspan='3' align='center'>
<textarea name="message" COLS="50" rows="15" class="textbox">
<?php 
if ( $naam == $name or in_array($name, $admin_array) or in_array($name, $manager_array)){
echo htmlentities(stripslashes($bericht)); 
}?>
</textarea></td>
</tr>



<tr align='left'>
  <td colspan="4" align='center' valign="middle">
    <?php smilielist(); // function to show the smilies.?></td>
  </tr>
<tr align='left'>

<td colspan="4" align='right' valign="middle"><input name="Edit" type="submit" class="button" value="Edit" onFocus="if(this.blur)this.blur()" />
  </td>  
</tr>	
</table>
</fieldset>
</form>
