<form method="post">
<?php if(!isset($_POST['Search'])){ ?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Search Player.</legend>
<table width="350" border="0" cellspacing="0">
  <tr>
    <td width="50" align="left"><b>Name: </b></td>
    <td width="300" align="center">
      <input name="player_name" type="text" id="player_name" style=' width: 95%; ' maxlength="20" / class="entryfield"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top"><b>Search by rank:</b></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top"><hr class="hr" /></td>
    </tr>
  <tr>
    <td colspan="2" align="left" valign="top"><input name="rank" type="radio" value="any" id="any" onFocus="if(this.blur)this.blur()" checked="checked" /><label for="any">Any.</label></td>
  </tr>
      <?php
	
	foreach( $rank_array as $key => $value){

	echo "<tr>
    <td colspan=\"2\" align=\"left\" valign=\"top\"><input name=\"rank\" type=\"radio\" value=\"".$key."\" id=\"".$key."\" onFocus=\"if(this.blur)this.blur()\" /><label for=\"".$key."\">".$value."</label></td>
  </tr>";

	}
	
	?>
      <tr>
        <td colspan="2" align="center"><hr class="hr" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><b>Search by status:</b></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><hr class="hr" /></td>
      </tr>
      <tr>
        <td colspan="2" align="left"><input name="state" type="radio" value="any" id="a" onfocus="if(this.blur)this.blur()" checked="checked" />
          <label for="a">Any.</label></td>
      </tr>
      <tr>
        <td colspan="2" align="left"><input name="state" type="radio" value="alive" id="alive" onfocus="if(this.blur)this.blur()" />
          <label for="alive">Alive.</label></td>
      </tr>
      <tr>
        <td colspan="2" align="left"><input name="state" type="radio" value="dead" id="dead" onfocus="if(this.blur)this.blur()" />
          <label for="dead">Dead.</label></td>
      </tr>
      <tr>
        <td colspan="2" align="left"><input name="state" type="radio" value="banned" id="banned" onfocus="if(this.blur)this.blur()" />
          <label for="banned">Banned.</label></td>
      </tr>
      <tr>
    <td colspan="2" align="right"><input name="Search" type="submit" class="button" id="Search" value="Search." onFocus="if(this.blur)this.blur()"/></td>
    </tr>
</table>
</fieldset>
<?php 

}// searchbox.

$_POST['player_name'] = trim($_POST['player_name']);

if(isset($_POST['Search'])){

if(empty($_POST['player_name'])){ 
echo "Empty search field.";
} else {

if (strlen($_POST['player_name']) > "20"){
echo "The username may not consist out of more then 20 characters.";
}else{

if (ereg('[^A-Za-z0-9]', $_POST['player_name'])) {
echo "Invalid Name only A-Z,a-z and 0-9 is allowed.";
}else{

if($_POST['rank'] != "any"){
$_POST['rank'] = ereg_replace("[^0-9]",'',$_POST['rank']);
$rank_search = "and rank='".$_POST['rank']."'";
}

if($_POST['state'] == "alive"){
$state_search = "and sitestate='o'";
}

if($_POST['state'] == "banned"){
$state_search = "and sitestate='1'";
}

if($_POST['state'] == "dead"){
$state_search = "and sitestate='2'";
}
	
$result = mysql_query("SELECT name,rank FROM login
WHERE name LIKE '".mysql_real_escape_string($_POST['player_name'])."%' ".$rank_search." ".$state_search." $type ORDER BY name ASC Limit 0,30") or die(mysql_error());
	
if (mysql_num_rows($result) == 0){		
echo "There is no player with that name.";
}else {
?>
  <br />
	<fieldset style="color: #000000; border: 1px solid #000000; width: 250px; text-align: left;">
<legend style="color: #999999; font-weight: bold;">Results:</legend>
    <table width="250" border="0" align="center" cellspacing="0">
  
  <tr>
    <td width="125" align="left"><b>Name:</b></td>
    <td width="125" align="left"><b>Rank:</b></td>
    </tr>
  	<?php while($row = mysql_fetch_array( $result )) { ?>
  <tr>
    <td width="125" align="left"><label><?php echo "<a href=\"page.php?page=view_profile&name=". $row['name'] ."\" onFocus=\"if(this.blur)this.blur()\">" . $row['name'] . "</a>"; ?></label></td>
    <td width="125" align="left"><label><?php echo $rank_array[$row['rank']]; ?></label></td>
    </tr>
 <?php  }// while loop ?>
</table>
</fieldset>
<br />*Note: Only the first 30 results are shown.
<?php
}
}
} 
}
}
?>
</form>