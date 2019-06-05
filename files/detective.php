<?php 

//checken of er al iemand 5uur heeft zitten wachten op de resulten zo ja verander showResult naar 1
$fQuery = 'SELECT * FROM detective WHERE IDUser = '.$_SESSION['user_id'].' AND showResult = 0'; 
  $fResult = mysql_query($fQuery) or die(mysql_error());
while($oRow = mysql_fetch_array($fResult)){
  if(time() >= $oRow['start_time'] + 7200){
   $showResult = 'UPDATE detective SET showResult = 1 WHERE IDDetective = '.$oRow['IDDetective'].'';
      $rShowResult = mysql_query($showResult) or die(mysql_error());
  }
  //checken of er al een showResult op 1 staat zo niet return message: detective still searching
  if(count($rShowResult)==0){
  $StillSearching .= '<tr><td align="center" class="cell">Your detective is still searching for <strong>'.$oRow['user'].'</strong> 
  </td></tr>';
  }
}

//user ophalen waarbij de resulten zichtbaar mogen zijn
$User = 'SELECT user FROM detective WHERE showResult = 1 AND IDUser = '.$_SESSION['user_id'].'';
  $rUser = mysql_query($User) or die(mysql_error());

//als de user helemaal niks in de DB heeft staan return message: detective has a day off
if(mysql_num_rows($fResult)==0 && mysql_num_rows($rUser)==0){
    $oResult = '<tr><td align="center" class="cell">Your detective has a day off</td></tr>';
}  
//final result
while($rij = mysql_fetch_array($rUser)){
 $sQuery = 'SELECT name,location FROM login WHERE name = "'.$rij['user'].'"';
    $sResult = mysql_query($sQuery) or die(mysql_error());
  while($Result = mysql_fetch_array($sResult)){
      if(count($rUser) > 0){
       $oResult .= '<tr><td align="center" class="cell">Player: <strong>'.$Result['name'].'</strong> has been found in '.$location_array[$Result['location']].'</td></tr>';
      }
    
  }
}  



?>
<fieldset style="width:250px; border:1px solid #000;"><legend>Hire Detective</legend>
<form method="post" action="page.php?page=detective">
<table width="250" border="0" cellpadding="0" cellspacing="2" class="table">
    <tr>
  <td width="100" align="center" class="cell">Find Player:</td>
   <td width="150"class="cell"><input name="user" type="text"  class="entryfield" size="20" /></td>
   </tr>
  <tr>
 </tr>
   <tr>
    <td colspan="2" class="cell"><b>Note:</b> Searching players will take 4 hours, costing you $50,000 per search. </td>
  </tr>
  <tr>
    <td colspan="2" align="right" class="submit"><div align="center">
      <input name="submit" type="submit" class="button" id="submit" onfocus="if(this.blur)this.blur()" value="Search"/>
    </div></td>
  </tr>
</table>
<br />
</form>
</fieldset>

<fieldset style="width:500px;; border:1px solid #000;"><legend>Results</legend>
<table width="100%" border="0" cellpadding="0" cellspacing="2" class="table">
   <tr>
    <td align="left" class="cell"><strong>Note: </strong>Results will disapear once you have shot at the player or the player travels to another location.</td>
  </tr>
  <?= $oResult ?>
  <?= $StillSearching ?>
</table>
</fieldset>