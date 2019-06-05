<?php if (in_array($name, $admin_array) or in_array($name, $manager_array)){ 

if(isset($_POST['Select'])){ $_GET['name'] = $_POST['name']; }else{ if(!empty($_GET['name'])){$_POST['name'] = $_GET['name']; } }

if (!empty($_GET['delete'])){

$result = mysql_query("UPDATE pm SET del='2' WHERE id='" .mysql_real_escape_string($_GET['delete']). "'")
or die(mysql_error());

}//if delete message

if (isset($_POST['Clean']) and !empty($_POST['name'])){ 

mysql_query("DELETE FROM pm WHERE sendby='" .mysql_real_escape_string($_POST['name']). "'") 
or die(mysql_error());

echo "You cleaned ".$_POST['name']."'s messages.";
} // if clean

?>
<form method="post" action="staff.php?page=mail_check">
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
      <legend style="color: #999999; font-weight: bold;">Mail Check.</legend>
<table width="350" border="0" cellspacing="0">
  
  <tr>
    <td width="250" align="center"><select name="name" class="entryfield" id="name">
      <?php    

$sql = "SELECT name FROM login ORDER BY name ASC"; 
$res = mysql_query($sql) or die(mysql_error()); 
while ($row = mysql_fetch_array($res)) { 
	if($_POST['name'] == $row['name']){
		echo "<option value=\"".$row['name']."\" onfocus=\"if(this.blur)this.blur()\" selected=\"selected\">".$row['name']."</option>";
	}else{
		echo "<option value=\"".$row['name']."\" onfocus=\"if(this.blur)this.blur()\">".$row['name']."</option>";	  
	}
}// while loop ?>
    </select></td>
  </tr>
  <tr>
    <td align="left"><table width="350" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100" align="center"><input name="Clean" type="submit" class="button" id="Clean" value="Clean." onfocus="if(this.blur)this.blur()" /></td>
        <td width="150">&nbsp;</td>
        <td width="100" align="center"><input name="Select" type="submit" class="button" id="Select" value="Select." onfocus="if(this.blur)this.blur()" /></td>
      </tr>
    </table></td>
    </tr>
  
  <tr>
    <td align="center"><hr class="hr" /></td>
    </tr>
	<?php if(isset($_POST['Select']) or isset($_GET['name'])){ ?>  
  <tr>
    <td align="center">
	<table width="350" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100" align="center"><?php

$result = mysql_query("SELECT * FROM pm
WHERE sendby='".mysql_real_escape_string($_POST['name'])."' ORDER BY id DESC") or die(mysql_error());
$totalmail = mysql_num_rows($result);

$amount = 6;
$numofpages = ceil($totalmail / $amount); 
		
if (empty($_GET['p'])){
$page = 1;
}else {
$page = $_GET['p'];
}

$min = $amount * ( $page - 1 );
$max = $amount;
if ($min<0) {$min=0;}
if( $page > 1){
	
$previouspage = $page - 1;
echo "<a href=\"staff.php?page=mail_check&p=".$previouspage."&name=".$_GET['name']."\" onFocus=\"if(this.blur)this.blur()\">Previous.</a>";	
}
		
		?></td>
        <td width="150">&nbsp;</td>
        <td width="100" align="center"><?php
		
		if($page < $numofpages){ 
    $pagenext = ($page + 1); 
	echo "<a href=\"staff.php?page=mail_check&p=".$pagenext."&name=".$_GET['name']."\" onFocus=\"if(this.blur)this.blur()\">Next.</a>";	
}
		
		?></td>
      </tr>
    </table></td>
    </tr>
  
  
  <?php

$result = mysql_query("SELECT * FROM pm
WHERE sendby='".mysql_real_escape_string($_POST['name'])."' ORDER BY id DESC LIMIT $min,$max") or die(mysql_error());
		
	while($row = mysql_fetch_array( $result )) {
		?>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="left"><?php
echo "<a href=\"page.php?page=view_profile&name=". $row['sendby'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['sendby']."</a> wrote: (".$row['time'].") to <a href=\"page.php?page=view_profile&name=". $row['sendto'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['sendto']."</a>.";
	?></td>
  </tr>
  <tr>
    <td align="left"><?
$row['message'] = htmlentities($row['message']);
$row['message'] = nl2br($row['message']); 
$row['message'] = smilie($row['message']); 
$row['message'] = sitefilter($row['message']);
$row['message'] = bbcodes($row['message']);  
$row['message'] = stripslashes($row['message']); 
echo "<label>".$row['message']."</label>";
	?></td>
  </tr>
  <tr>
    <td align="left"><?php 
		echo "<a href=\"staff.php?page=mail_check&delete=". $row['id'] ."&name=".$_GET['name']."\" onFocus=\"if(this.blur)this.blur()\">Delete.</a>";
		 ?></td>
  </tr>
  <?php }} ?>
</table>
</fieldset>
<?php if (in_array($name, $admin_array)){ ?>
<br />
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Delete deleted messages.</legend>
<table width="350" border="0" cellspacing="0">
  

  <tr>
    <td width="250" align="left"><?php
	
	if (isset($_POST['Delete'])){ 

mysql_query("DELETE FROM pm WHERE del='2'") 
or die(mysql_error());

echo "All deleted messages have been deleted.";
}
	
	?></td>
    <td width="100" align="center"><input name="Delete" type="submit" class="button" id="Delete" value="Delete." onfocus="if(this.blur)this.blur()" /></td>
  </tr>
</table>
</fieldset>
<?php } ?>
</form>
<?php } ?>

