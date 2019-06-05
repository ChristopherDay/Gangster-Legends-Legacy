<form method="post">
<table width="300" border="0" align="center" cellspacing="0">
  <tr>
    <td width="75" align="center"><?php 
	
	// page script.

$amount = 6;

$nsql = "SELECT * FROM pm WHERE sendto='".mysql_real_escape_string($name)."' and del='1'";            
$nres = mysql_query($nsql) or die(mysql_error());
$totalmail = mysql_num_rows($nres);

if (empty($_GET['p'])){
$page = 1;
}else {
$page = $_GET['p'];
}

$min = $amount * ( $page - 1 );
$max = $amount;
	
if( $page > 1){
	
$previouspage = $page - 1;
echo "<a href=\"page.php?page=mailbox&p=".$previouspage."\" onFocus=\"if(this.blur)this.blur()\">Previous.</a>";	
}
?></td>
    <td width="75" align="center"><?php 
	
	$numofpages = ceil($totalmail / $amount); 

if(($totalmail >= "1") and (!isset($_POST['Clean']))){ ?>
        <input name="Clean" type="submit" class="button" id="Clean" value="Clean Mailbox." onFocus="if(this.blur)this.blur()"/>
        <?php
}
	?></td>
    <td width="75" align="center">
	<?php if(($totalmail >= "1") and (!isset($_POST['Clean']))){ ?>
	<input name="Delete" type="submit" class="button" id="Delete" value="Delete Selected." onFocus="if(this.blur)this.blur()"/><?php
}
	?></td>
    <td width="75" align="center"><?php 
	
if($page < $numofpages){ 
    $pagenext = ($page + 1); 
	echo "<a href=\"page.php?page=mailbox&p=".$pagenext."\" onFocus=\"if(this.blur)this.blur()\">Next.</a>";	
}

	?></td>
  </tr>
</table>
<?php
$presult = mysql_query("SELECT * FROM pm
WHERE sendto='".mysql_real_escape_string($name)."' and del='1' ORDER BY id DESC LIMIT $min,$amount") or die(mysql_error()); 

if (!isset($_POST['Clean'])){

if ((mysql_num_rows($presult) == 0) and (!isset($_POST['clean']))){
			
echo "You don't have any messages.";
}else {
$b = 0;						
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $presult )) {
// Print out the contents of each row into a table

?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 500px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;"><?php
$b = $b + 1;
if($row['rep'] == 1){
echo "<a href=\"page.php?page=view_profile&name=". $row['sendby'] ."\" onFocus=\"if(this.blur)this.blur()\">|| ".$row['sendby']."</a> wrote: (".$row['time'].") || ";
}else{
echo "<a href=\"page.php?page=view_profile&name=". $row['sendby'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['sendby']."</a> wrote: (".$row['time'].")";
}// if not replyed.
	?></legend>
<?
$row['message'] = htmlentities($row['message']);
$row['message'] = nl2br($row['message']); 
$row['message'] = smilie($row['message']); 
$row['message'] = bbcodes($row['message']); 
$row['message'] = stripslashes($row['message']);   
echo $row['message'];
	?>
<table width="125" border="0" cellspacing="0">
      <tr>
        <td width="25" align="left"><?php echo "<input type='checkbox' name='id[$b]' value='".$row['id']."' onFocus=\"if(this.blur)this.blur()\"/>"; ?></td>
        <td width="50" align="center"><?php
		echo "<a href=\"page.php?page=message&name=". $row['sendby'] ."&reply=". $row['id'] ."\" onFocus=\"if(this.blur)this.blur()\">Reply.</a>";
	?></td>
        <td width="50" align="center"><?php 
		echo "<a href=\"page.php?page=mailbox&delete=". $row['id'] ."\" onFocus=\"if(this.blur)this.blur()\">Delete.</a>";
		 ?></td>
      </tr>
    </table>
</fieldset>

<br />
<?php 
} // if imbox is empty
} // if while
} // if <> clean	?>
</form>
