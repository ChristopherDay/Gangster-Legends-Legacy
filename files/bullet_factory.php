<?php 

if(time() <= $bullet_time){
if(!$_POST['Purchase']){			
echo "The store is currently out of stock.<br />".date( "00:i:s", $bullet_time - time() );
	}
			}else{	  

?>
<fieldset style="width:300px; border:1px solid #000;"><legend>Bullet Store</legend>
<form method="post">
<table width="300" border="0" cellpadding="0" cellspacing="2" class="table">
  <tr>
    <td colspan="2" align="left" class="sub"><b>Bullets:</b></td>
    <td width="100" align="left" class="sub"><b>Price:</b></td>
    <td width="75" align="left" class="sub"><b>Time:</b></td>
  </tr>
  
  <tr>
    <td width="25" class="cell"><input name="Option" type="radio" value="1" id="1" onfocus="if(this.blur)this.blur()"/></td>
    <td width="150" align="left" class="cell"><label for="1">200 bullets.</label></td>
    <td width="100" align="left" class="cell"><label for="1">$ 10,000,-</label></td>
    <td width="75" align="left" class="cell"><label for="1">15 Minutes.</label></td>
  </tr>
  <tr>
    <td width="25" class="cell"><input name="Option" type="radio" value="2" id="2" onfocus="if(this.blur)this.blur()"/></td>
    <td width="150" align="left" class="cell"><label for="2">400 bullets.</label></td>
    <td width="100" align="left" class="cell"><label for="2">$ 18,000,-</label></td>
    <td width="75" align="left" class="cell"><label for="2">30 Minutes.</label></td>
  </tr>
  <tr>
    <td width="25" class="cell"><input name="Option" type="radio" value="3" id="3" onfocus="if(this.blur)this.blur()"/></td>
    <td width="150" align="left" class="cell"><label for="3">600 bullets.</label></td>
    <td width="100" align="left" class="cell"><label for="3">$ 35,000,-</label></td>
    <td width="75" align="left" class="cell"><label for="3">45 Minutes.</label></td>
  </tr>
  <tr>
    <td width="25" class="cell"><input name="Option" type="radio" value="4" id="4" onfocus="if(this.blur)this.blur()"/></td>
    <td width="150" align="left" class="cell"><label for="4">800 bullets.</label></td>
    <td width="100" align="left" class="cell"><label for="4">$ 50,000,-</label></td>
    <td width="75" align="left" class="cell"><label for="4">60 Minutes.</label></td>
  </tr>
  <tr>
    <td colspan="4" align="center" class="submit"><?php if($dissable != true ){ ?>
      <table width="295" border="0" cellspacing="0">
        <tr>
          <td width="120" align="center"><img src="files/button.php" alt="Verification." width="120" height="30" /></td>
          <td width="100" align="center"><input name="userdigit" type="text" class="entryfield" style='width: 85%; ' size="5" maxlength="5"<?php echo $disabled; ?>/></td>
          <td width="120" align="center"><input name="Purchase" type="submit" class="button" id="Purchase" onfocus="if(this.blur)this.blur()" value="Purchase."/></td>
        </tr>
      </table>
      <?php } ?></td>
    </tr>
</table>
</form>
</fieldset>
<?php } // if time is up. ?>
