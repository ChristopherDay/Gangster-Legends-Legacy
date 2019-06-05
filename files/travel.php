<script type="text/javascript"> 
function actiontimer(){	
	
	if(typeof(skip) == "undefined"){
		
		skip = "set";
		
	} else {
		
		var timeleft = document.getElementById("timeleft").innerHTML;
		
		var time_split = timeleft.split(":");
		
		if(parseInt(time_split[0]) < 10){
			
			time_split[0] = time_split[0].charAt(1);
			
		}
		
		if(parseInt(time_split[1]) < 10){
			
			time_split[1] = time_split[1].charAt(1);
			
		}
		
		if(parseInt(time_split[2]) < 10){
			
			time_split[2] = time_split[2].charAt(1);
			
		}
		
		seconds = parseInt(time_split[2]) + parseInt(time_split[1]*60) + parseInt(time_split[0]*3600);
				
		seconds -= 1;
		
		if(seconds <= 0){
			
			window.location = "http://www.gangsterlegends.com/travel.php"
			return false;
			
		} else {
			
			hours = Math.floor(seconds/3600);
			seconds -= (hours * 3600);
			
			minutes = Math.floor(seconds/60);
			seconds -= (minutes * 60);			
							
			if(hours < 10){
				
				hours = "0" + hours;
				
			}
			
			if(minutes < 10){
				
				minutes = "0" + minutes;
				
			} 
			
			if(seconds < 10){
				
				seconds = "0" + seconds;
			
			}
			
			timeleft = hours + ":" + minutes + ":" + seconds;
			
									
			document.getElementById("timeleft").innerHTML = timeleft;
		}
	  
  }
  
  setTimeout("actiontimer()",1000);
   
}

window.onload = actiontimer;
</script>
<form method="post">
<?php
if(time() <= $travel){
if(!$_POST['Travel']){			
echo "Next departure is in.<br /><div id=\"timeleft\">".date( "00:i:s", $travel - time() )."</div>";
	}
			}else{	

?>

<fieldset style="color: #000000; border: 1px solid #000000; width: 450px; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;"><?php echo $location_array[$location];?> Travel Agency.</legend>

<table width="450" border="0" align="center" cellspacing="0">
  
  <tr>
    <td height="250" colspan="6" align="center" valign="middle"><img src="img/locations/<?php echo $location; ?>.png" width="450" height="250" /></td>
  </tr>
  <?php if(!isset($_POST['Travel'])){ ?>
  
  <tr>
    <td colspan="6" align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td colspan="6" align="center"><b>Select your destination:</b></td>
  </tr>
  <tr>
    <td colspan="6" align="center"><hr class="hr" /></td>
    </tr>
  <tr>
    <td width="100" align="left"><input name="Location" type="radio" value="1" id="location_1" <?php echo $travel_disabled_1; ?> onFocus="if(this.blur)this.blur()"/>
        <label for="location_1"><b>London.</b></label></td>
    <td width="50" align="left"><?php echo "$". number_format($price[0]).",-"; ?></td>
    <td width="100" align="left"><input name="Location" type="radio" value="4" id="location_4" <?php echo $travel_disabled_4; ?> onFocus="if(this.blur)this.blur()"/>
        <label for="location_4"><b>Paris.</b></label></td>
    <td width="50" align="left"><?php echo "$". number_format($price[3]).",-"; ?></td>
    <td width="100" align="left"><input name="Location" type="radio" value="7" id="location_7" <?php echo $travel_disabled_7; ?> onFocus="if(this.blur)this.blur()"/>
        <label for="location_7"><b>Madrid.</b></label></td>
    <td width="50" align="left"><?php echo "$". number_format($price[6]).",-"; ?></td>
  </tr>
  <tr>
    <td width="100" align="left"><input name="Location" type="radio" value="2" id="location_2" <?php echo $travel_disabled_2; ?> onFocus="if(this.blur)this.blur()"/>
        <label for="location_2"><b>Rome.</b></label></td>
    <td width="50" align="left"><?php echo "$". number_format($price[1]).",-"; ?></td>
    <td width="100" align="left"><input name="Location" type="radio" value="5" id="location_5" <?php echo $travel_disabled_5; ?> onFocus="if(this.blur)this.blur()"/>
        <label for="location_5"><b>Chicago.</b></label></td>
    <td width="50" align="left"><?php echo "$". number_format($price[4]).",-"; ?></td>
    <td width="100" align="left" b><input name="Location" type="radio" value="8" id="location_8" <?php echo $travel_disabled_8; ?> onFocus="if(this.blur)this.blur()"/>
        <label for="location_8"><b>Hong Kong.</b></label></td>
    <td width="50" align="left" b><?php echo "$". number_format($price[7]).",-"; ?></td>
  </tr>
  <tr>
    <td width="100" align="left"><input name="Location" type="radio" value="3" id="location_3" <?php echo $travel_disabled_3; ?> onFocus="if(this.blur)this.blur()"/>
        <label for="location_3"><b>Tokyo.</b></label></td>
    <td width="50" align="left"><?php echo "$".number_format($price[2]).",-"; ?></td>
    <td width="100" align="left"><input name="Location" type="radio" value="6" id="location_6" <?php echo $travel_disabled_6; ?> onFocus="if(this.blur)this.blur()"/>
        <label for="location_6"><b>Sydney.</b></label></td>
    <td width="50" align="left"><?php echo "$". number_format($price[5]).",-"; ?></td>
    <td width="100" align="left"><input name="Location" type="radio" value="9" id="location_9" <?php echo $travel_disabled_9; ?> onFocus="if(this.blur)this.blur()"/>
        <label for="location_9"><b>Moscow.</b></label></td>
    <td width="50" align="left"><?php echo "$". number_format($price[8]).",-"; ?></td>
  </tr>
  <tr>
    <td colspan="6" align="right"><input name="Travel" type="submit" class="button" id="Travel" value="Travel" <?php echo $button_disable; ?> onFocus="if(this.blur)this.blur()"/></td>
  </tr>
    <?php }// if isset travel. ?>
</table>
</fieldset>
<?php }// if no travel. ?>
</form>